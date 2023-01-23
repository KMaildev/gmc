<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSaleRefunds;
use App\Http\Requests\UpdateSaleRefunds;
use App\Models\CashCollection;
use App\Models\SalesInvoices;
use App\Models\SaleRefund;
use Illuminate\Http\Request;

class SaleRefundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // For Form
        $form_status = 'is_create';
        $form_sales_invoices = SalesInvoices::all();

        // For List 
        $sale_refunds = SaleRefund::all();
        return view('accounting.refund.index', compact('form_status', 'form_sales_invoices', 'sale_refunds'));
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
    public function store(StoreSaleRefunds $request)
    {
        $sale_resund = new SaleRefund();
        $sale_resund->sales_invoice_id = $request->sales_invoice_id;
        $sale_resund->refund = $request->refund_amount;
        $sale_resund->refund_date = $request->refund_date;
        $sale_resund->user_id = auth()->user()->id ?? 0;
        $sale_resund->save();
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
        // For Form
        $form_status = 'is_edit';
        $form_sales_invoices = SalesInvoices::all();

        // For List 
        $sale_refunds = SaleRefund::all();

        // Edit 
        $refund_edit = SaleRefund::findOrFail($id);
        return view('accounting.refund.index', compact('form_status', 'form_sales_invoices', 'sale_refunds', 'refund_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleRefunds $request, $id)
    {
        $sale_refund = SaleRefund::findOrFail($id);
        $sale_refund->sales_invoice_id = $request->sales_invoice_id;
        $sale_refund->refund = $request->refund_amount;
        $sale_refund->refund_date = $request->refund_date;
        $sale_refund->user_id = auth()->user()->id ?? 0;
        $sale_refund->save();
        return redirect()->route('sale_refund.index')->with('success', 'Process is completed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $refund = SaleRefund::findOrFail($id);
        $refund->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }
}
