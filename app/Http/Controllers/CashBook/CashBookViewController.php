<?php

namespace App\Http\Controllers\CashBook;

use App\Accounting\CashBook;
use App\Accounting\ChartofAccount;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCashBook;
use App\Http\Requests\UpdateCashBookVeiwUpdate;
use App\Models\PurchaseOrder;
use App\Models\SalesInvoices;
use App\PartPurchase;
use App\PartSaleInvoice;
use App\ServiceInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashBookViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $chartof_accounts = ChartofAccount::orderBy('coa_number', 'ASC')->get();
        $sales_invoices = SalesInvoices::all();
        $purchase_orders = PurchaseOrder::all();

        $part_purchases = PartPurchase::all();
        $part_sale_invoices = PartSaleInvoice::all();
        $service_invoices = ServiceInvoice::all();

        $cash_book_form_status = 'is_create';
        // Closing Clash and Bank Balance
        $from_date = '2019-06-01';
        $beforeFirstDays = DB::table('cash_books')
            ->whereDate('cash_book_date', '<', $from_date)
            ->get();

        $page = $request->page ?? 10;
        $from_date = '2019-06-01'; //date('Y-m-d', strtotime('first day of this month'));
        $to_date = date('Y-m-d', strtotime('last day of this month'));

        $cash_books = CashBook::offset(0)->limit($page)
            ->whereBetween('cash_book_date', [$from_date, $to_date])
            ->orderBy('cash_book_date', 'ASC')
            ->get();

        if ($request->ajax()) {
            $view = view('cashbook_view.table_render', compact('cash_books', 'beforeFirstDays'))->render();
            return response()->json(['html' => $view]);
        }

        return view('cashbook_view.index', compact('cash_books', 'beforeFirstDays', 'chartof_accounts', 'cash_book_form_status', 'sales_invoices', 'purchase_orders', 'part_purchases', 'part_sale_invoices', 'service_invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCashBook $request)
    {
        $cash_book = new CashBook();
        $cash_book->cash_book_date = $request->date;
        $cash_book->month = $request->month;
        $cash_book->year = $request->year;
        $cash_book->iv_one = $request->iv_one;
        $cash_book->iv_two = $request->iv_two;
        $cash_book->account_code_id = $request->account_code ?? 0;
        $cash_book->account_type_id = $request->account_type_id ?? 0;
        $cash_book->description = $request->description;
        $cash_book->cash_account_id = $request->cash_account ?? 0;
        $cash_book->bank_account = $request->bank_account ?? 0;
        $cash_book->cash_in = $request->cash_in ?? 0;
        $cash_book->cash_out = $request->cash_out ?? 0;
        $cash_book->bank_in = $request->bank_in ?? 0;
        $cash_book->bank_out = $request->bank_out ?? 0;
        $cash_book->sales_invoice_id = $request->sales_invoice_id;
        $cash_book->sale_type = $request->sale_type;
        $cash_book->principle_interest = $request->principle_interest;
        $cash_book->purchase_order_id = $request->purchase_order_id;
        $cash_book->part_purchase_id = $request->part_purchase_id;
        $cash_book->part_sale_invoice_id = $request->part_sale_invoice_id;
        $cash_book->service_invoice_id = $request->service_invoice_id;
        $cash_book->user_id = auth()->user()->id;
        $cash_book->save();
        return json_encode(array(
            "statusCode" => 200,
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chartof_accounts = ChartofAccount::orderBy('coa_number', 'ASC')->get();
        $sales_invoices = SalesInvoices::all();
        $purchase_orders = PurchaseOrder::all();
        $edit_cash_book_data = CashBook::findOrFail($id);

        $part_purchases = PartPurchase::all();
        $part_sale_invoices = PartSaleInvoice::all();
        $service_invoices = ServiceInvoice::all();

        $view = view('cashbook_view.form.edit_render_form', compact('chartof_accounts', 'sales_invoices', 'purchase_orders', 'edit_cash_book_data', 'part_purchases', 'part_sale_invoices', 'service_invoices'))->render();
        return response()->json(['html' => $view]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashBookVeiwUpdate $request)
    {
        $cash_books_id = $request->cash_books_id;
        $cash_book = CashBook::findOrFail($cash_books_id);
        $cash_book->cash_book_date = $request->date;
        $cash_book->month = $request->month;
        $cash_book->year = $request->year;
        $cash_book->iv_one = $request->iv_one;
        $cash_book->iv_two = $request->iv_two;
        $cash_book->account_code_id = $request->account_code ?? 0;
        $cash_book->account_type_id = $request->account_type_id ?? 0;
        $cash_book->description = $request->description;
        $cash_book->cash_account_id = $request->cash_account ?? 0;
        $cash_book->bank_account = $request->bank_account ?? 0;
        $cash_book->cash_in = $request->cash_in ?? 0;
        $cash_book->cash_out = $request->cash_out ?? 0;
        $cash_book->bank_in = $request->bank_in ?? 0;
        $cash_book->bank_out = $request->bank_out ?? 0;
        $cash_book->sales_invoice_id = $request->sales_invoice_id;
        $cash_book->sale_type = $request->sale_type;
        $cash_book->principle_interest = $request->principle_interest;
        $cash_book->purchase_order_id = $request->purchase_order_id;
        $cash_book->part_purchase_id = $request->part_purchase_id;
        $cash_book->part_sale_invoice_id = $request->part_sale_invoice_id;
        $cash_book->service_invoice_id = $request->service_invoice_id;
        $cash_book->user_id = auth()->user()->id;
        $cash_book->update();
        return json_encode(array(
            "statusCode" => 200,
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
