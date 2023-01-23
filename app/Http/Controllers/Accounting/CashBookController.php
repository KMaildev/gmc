<?php

namespace App\Http\Controllers\Accounting;

use App\Accounting\CashBook;
use App\Accounting\ChartofAccount;
use App\Exports\CashBookExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCashBook;
use App\Http\Requests\UpdateCashBook;
use App\Models\PurchaseOrder;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SalesInvoices;

class CashBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_invoices = SalesInvoices::all();
        $purchase_orders = PurchaseOrder::all();


        $chartof_accounts = ChartofAccount::orderBy('coa_number', 'ASC')->get();
        $cash_book_form_status = 'is_create';

        $cash_books = CashBook::orderBy('cash_book_date', 'ASC')->get();
        // $cash_books = CashBook::orderBy('cash_book_date', 'ASC')->get();
        if (request('search')) {
            $cash_books = CashBook::where(function ($query) {
                $query->where('iv_one', 'Like', '%' . request('search') . '%');
                $query->orWhere('iv_two', 'Like', '%' . request('search') . '%');
                $query->orWhere('description', 'Like', '%' . request('search') . '%');
            })->get();
        }

        if (request('from_date') && request('to_date')) {
            $cash_books = CashBook::whereBetween('cash_book_date', [request('from_date'), request('to_date')])->get();
            // Closing Clash and Bank Balance
            $from_date = request('from_date');
            $to_date = request('to_date');

            $beforeFirstDays = DB::table('cash_books')
                ->whereDate('cash_book_date', '<', $from_date)
                ->get();
        } else {
            $from_date = '2019-06-01'; //date('Y-m-d', strtotime('first day of this month'));
            $to_date = date('Y-m-d', strtotime('last day of this month'));
            $cash_books = CashBook::whereBetween('cash_book_date', [$from_date, $to_date])->orderBy('cash_book_date', 'ASC')->get();
            // Closing Clash and Bank Balance
            $beforeFirstDays = DB::table('cash_books')
                ->whereDate('cash_book_date', '<', $from_date)
                ->get();
            // ->get();
        }
        $filter_date = ['from_date' => $from_date, 'to_date' => $to_date];
        return view('accounting.cash_book.index', compact('cash_books', 'chartof_accounts', 'beforeFirstDays', 'cash_book_form_status', 'filter_date', 'sales_invoices', 'purchase_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chartof_accounts = ChartofAccount::orderBy('coa_number', 'ASC')->get();
        return view('accounting.cash_book.create', compact('chartof_accounts'));
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
        $cash_book->user_id = auth()->user()->id;
        $cash_book->save();
        return redirect()->back()->with('success', 'Your processing has been completed.');
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
        // $cash_book = CashBook::findOrFail($id);
        // return view('accounting.cash_book.edit', compact('chartof_accounts', 'cash_book'));
        $sales_invoices = SalesInvoices::all();
        $chartof_accounts = ChartofAccount::orderBy('coa_number', 'asc')->get();
        $cash_books = CashBook::orderBy('id', 'DESC')->paginate(100);
        $edit_cash_book_data = CashBook::findOrFail($id);
        $cash_book_form_status = 'is_edit';

        $from_date = '2019-06-01'; //date('Y-m-d', strtotime('first day of this month'));
        $to_date = date('Y-m-d', strtotime('last day of this month'));
        $cash_books = CashBook::whereBetween('cash_book_date', [$from_date, $to_date])->paginate(100);

        // Closing Clash and Bank Balance
        $beforeFirstDays = DB::table('cash_books')
            ->whereDate('cash_book_date', '<', $from_date)
            ->get();

        $filter_date = ['from_date' => $from_date, 'to_date' => $to_date];
        return view('accounting.cash_book.index', compact('cash_books', 'chartof_accounts', 'edit_cash_book_data', 'beforeFirstDays', 'cash_book_form_status', 'filter_date', 'sales_invoices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashBook $request, $id)
    {
        $cash_book = CashBook::findOrFail($id);
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
        $cash_book->user_id = auth()->user()->id;
        $cash_book->save();
        return redirect()->route('cashbook.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cash_book = CashBook::findOrFail($id);
        $cash_book->delete();
        return redirect()->back()->with('success', 'Deleted successfully.');
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function cashbook_export()
    {

        $chartof_accounts = ChartofAccount::orderBy('coa_number', 'ASC')->get();
        $cash_books = CashBook::orderBy('cash_book_date', 'ASC')->get();
        if (request('search')) {
            $cash_books = CashBook::where(function ($query) {
                $query->where('iv_one', 'Like', '%' . request('search') . '%');
                $query->orWhere('iv_two', 'Like', '%' . request('search') . '%');
                $query->orWhere('description', 'Like', '%' . request('search') . '%');
            })->paginate(500);
        }

        if (request('from_date') && request('to_date')) {
            $cash_books = CashBook::whereBetween('cash_book_date', [request('from_date'), request('to_date')])->paginate(500);

            // Closing Clash and Bank Balance
            $from_date = request('from_date');
            $to_date = request('to_date');

            $beforeFirstDays = DB::table('cash_books')
                ->whereDate('cash_book_date', '<', $from_date)
                ->get();
        } else {
            $from_date = '2019-06-01'; //date('Y-m-d', strtotime('first day of this month'));
            $to_date = date('Y-m-d', strtotime('last day of this month'));
            $cash_books = CashBook::whereBetween('cash_book_date', [$from_date, $to_date])->orderBy('cash_book_date', 'ASC')->paginate(500);

            // Closing Clash and Bank Balance
            $beforeFirstDays = DB::table('cash_books')
                ->whereDate('cash_book_date', '<', $from_date)
                ->get();
        }

        return Excel::download(new CashBookExport($chartof_accounts, $cash_books, $beforeFirstDays), 'cash_book_' . date("Y-m-d H:i:s") . '.xlsx');
    }
}
