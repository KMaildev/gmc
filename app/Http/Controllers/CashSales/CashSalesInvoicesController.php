<?php

namespace App\Http\Controllers\CashSales;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCashSaleInvoices;
use App\Http\Requests\UpdateCashSale;
use App\Models\Customers;
use App\Models\Products;
use App\Models\SalesInvoices;
use App\Models\SalesInvoicesPayments;
use App\Models\SalesItems;
use App\Models\TemporarySalesItem;
use App\User;
use Illuminate\Http\Request;

class CashSalesInvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_invoices = SalesInvoices::orderBy('id')->where('hp_or_dealer', 'cash_sale')->get();
        return view('cash_sales.cash_sales_invoices.index', compact('sales_invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $session_id = session()->getId();
        $customers = Customers::orderBy('id')->where('dealer_or_hp', 'cash_sale')->get();
        $products = Products::all();
        $sales_persons = User::all();
        $temporary_sales_items = TemporarySalesItem::orderBy('id')->where('session_id', $session_id)->get();
        return view('cash_sales.cash_sales_invoices.create', compact('customers', 'products', 'temporary_sales_items', 'sales_persons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCashSaleInvoices $request)
    {
        $sale_invoice = new SalesInvoices();
        $sale_invoice->customer_id = $request->customer_id;
        $sale_invoice->invoice_no = $request->invoice_no;
        $sale_invoice->invoice_date = $request->invoice_date;
        $sale_invoice->id_no = $request->id_no;
        $sale_invoice->showroom_name = $request->showroom_name;
        $sale_invoice->sales_type = $request->sales_type;
        $sale_invoice->payment_team = $request->payment_team;
        $sale_invoice->sales_persons_id = $request->sales_persons_id;
        $sale_invoice->delivery_date = $request->delivery_date;
        $sale_invoice->post_ref = $request->post_ref;
        $sale_invoice->user_id = auth()->user()->id ?? 0;
        $sale_invoice->hp_or_dealer = 'cash_sale';
        $sale_invoice->save();
        $sale_invoice_id = $sale_invoice->id;

        if ($request->productFields) {
            foreach ($request->productFields as $key => $value) {
                $insert[$key]['product_id'] = $value['product_id'];
                $insert[$key]['qty'] = $value['qty'];
                $insert[$key]['unit_price'] = $value['price'];
                $insert[$key]['description'] = $value['description'];
                $insert[$key]['sales_invoice_id'] = $sale_invoice_id;
                $insert[$key]['sale_types'] = 'cash_sale';
                $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
                $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
            }
            SalesItems::insert($insert);
        }

        $sale_inv_payment = new SalesInvoicesPayments();
        $sale_inv_payment->total_amount = $request->total_amount;
        $sale_inv_payment->down_payment = 0;
        $sale_inv_payment->discount = $request->discount;
        $sale_inv_payment->dealer_ercentage = 0;
        $sale_inv_payment->balance_to_be_pay = $request->balance_to_be_pay ?? 0;
        $sale_inv_payment->balance_to_pay_be_date = $request->balance_to_pay_be_date;
        $sale_inv_payment->sales_invoice_id = $sale_invoice_id;
        $sale_inv_payment->customer_id = $request->customer_id;
        $sale_inv_payment->save();

        TemporarySalesItem::where('session_id', session()->getId())->delete();
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
        $sales_invoice = SalesInvoices::findOrFail($id);
        $sales_items = SalesItems::orderBy('id')->where('sales_invoice_id', $id)->get();
        $sales_invoices_payment = SalesInvoicesPayments::where('sales_invoice_id', $id)->first();
        return view('cash_sales.cash_sales_invoices.show', compact('sales_invoice', 'sales_items', 'sales_invoices_payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session_id = session()->getId();
        $customers = Customers::all();
        $products = Products::all();
        $sales_persons = User::all();
        $temporary_sales_items = TemporarySalesItem::orderBy('id')->where('session_id', $session_id)->get();


        // Edit 
        $sales_invoice_edit = SalesInvoices::findOrFail($id);
        $sales_items_edits = SalesItems::orderBy('id')->where('sales_invoice_id', $id)->get();
        $sales_invoices_payments_edit = SalesInvoicesPayments::where('sales_invoice_id', $id)->first();
        return view('cash_sales.cash_sales_invoices.edit', compact('sales_invoice_edit', 'sales_items_edits', 'sales_invoices_payments_edit', 'customers', 'products', 'temporary_sales_items', 'sales_persons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashSale $request, $id)
    {
        $sale_invoice = SalesInvoices::findOrFail($id);
        $sale_invoice->customer_id = $request->customer_id;
        $sale_invoice->invoice_no = $request->invoice_no;
        $sale_invoice->invoice_date = $request->invoice_date;
        $sale_invoice->id_no = $request->id_no;
        $sale_invoice->showroom_name = $request->showroom_name;
        $sale_invoice->sales_type = $request->sales_type;
        $sale_invoice->payment_team = $request->payment_team;
        $sale_invoice->sales_persons_id = $request->sales_persons_id;
        $sale_invoice->delivery_date = $request->delivery_date;
        $sale_invoice->post_ref = $request->post_ref;
        $sale_invoice->user_id = auth()->user()->id ?? 0;
        $sale_invoice->hp_or_dealer = 'cash_sale';
        $sale_invoice->update();
        $sale_invoice_id = $sale_invoice->id;

        if ($request->productFields) {
            foreach ($request->productFields as $key => $value) {
                $insert[$key]['product_id'] = $value['product_id'];
                $insert[$key]['qty'] = $value['qty'];
                $insert[$key]['unit_price'] = $value['price'];
                $insert[$key]['description'] = $value['description'];
                $insert[$key]['sales_invoice_id'] = $sale_invoice_id;
                $insert[$key]['sale_types'] = 'cash_sale';
                $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
                $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
            }
            SalesItems::insert($insert);
        }

        $sales_invoices_payments_id = $request->sales_invoices_payments_id;

        $sale_inv_payment = SalesInvoicesPayments::findOrFail($sales_invoices_payments_id);
        $sale_inv_payment->total_amount = $request->total_amount;
        $sale_inv_payment->down_payment = 0;
        $sale_inv_payment->discount = $request->discount;
        $sale_inv_payment->dealer_ercentage = 0;
        $sale_inv_payment->balance_to_be_pay = $request->balance_to_be_pay ?? 0;
        $sale_inv_payment->balance_to_pay_be_date = $request->balance_to_pay_be_date;
        $sale_inv_payment->sales_invoice_id = $sale_invoice_id;
        $sale_inv_payment->customer_id = $request->customer_id;
        $sale_inv_payment->update();

        TemporarySalesItem::where('session_id', session()->getId())->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
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
