<?php

namespace App\Http\Controllers\SalesReturn;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalesReturn;
use App\Models\Customers;
use App\Models\Products;
use App\Models\SalesInvoices;
use App\Models\SalesInvoicesPayments;
use App\Models\SalesItems;
use App\Models\SalesReturn;
use App\Models\SalesReturnItem;
use App\Models\TemporarySalesItem;
use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class SalesReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_returns = SalesReturn::all();
        return view('sales_return.sales_return.index', compact('sales_returns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sales_invoices = SalesInvoices::all();
        return view('sales_return.sales_return.create', compact('sales_invoices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SelectReturnInvoice($id)
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

        $sales_return_items = SalesReturnItem::orderBy('id')->where('sales_invoice_id', $id)->get();
        return view('sales_return.sales_return.select_return_invoice', compact('sales_invoice_edit', 'sales_items_edits', 'sales_invoices_payments_edit', 'customers', 'products', 'temporary_sales_items', 'sales_persons', 'sales_return_items'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesReturn $request)
    {
        $sale_return = new SalesReturn();
        $sale_return->sales_invoice_id = $request->sales_invoice_id ?? 0;
        $sale_return->sales_return_person_id = $request->sales_return_person_id ?? 0;
        $sale_return->return_date = $request->return_date ?? 0;
        $sale_return->save();
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
        $session_id = session()->getId();
        $customers = Customers::all();
        $products = Products::all();
        $sales_persons = User::all();
        $temporary_sales_items = TemporarySalesItem::orderBy('id')->where('session_id', $session_id)->get();

        // Edit 
        $sales_invoice_edit = SalesInvoices::findOrFail($id);
        $sales_items_edits = SalesItems::orderBy('id')->where('sales_invoice_id', $id)->get();
        $sales_invoices_payments_edit = SalesInvoicesPayments::where('sales_invoice_id', $id)->first();

        $sales_return_items = SalesReturnItem::orderBy('id')->where('sales_invoice_id', $id)->get();

        $sale_inv_id = $sales_invoice_edit->id;
        $sales_return_edit = SalesReturn::where('sales_invoice_id', $sale_inv_id)->first();
        return view('sales_return.sales_return.edit', compact('sales_invoice_edit', 'sales_items_edits', 'sales_invoices_payments_edit', 'customers', 'products', 'temporary_sales_items', 'sales_persons', 'sales_return_items', 'sales_return_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sale_return = SalesReturn::findOrFail($id);
        $sale_return->sales_invoice_id = $request->sales_invoice_id ?? 0;
        $sale_return->sales_return_person_id = $request->sales_return_person_id ?? 0;
        $sale_return->return_date = $request->return_date ?? 0;
        $sale_return->update();
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
