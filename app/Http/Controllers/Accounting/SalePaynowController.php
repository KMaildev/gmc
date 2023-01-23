<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalePayNow;
use App\Models\Customers;
use App\Models\Products;
use App\Models\SalePayNow;
use App\Models\SalesInvoices;
use App\Models\SalesInvoicesPayments;
use App\Models\SalesItems;
use App\Models\TemporarySalesItem;
use App\User;
use Illuminate\Http\Request;

class SalePaynowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalePayNow $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = Customers::all();
        $sales_persons = User::all();

        // Edit 
        $sales_invoice_edit = SalesInvoices::findOrFail($id);
        $sales_items_edits = SalesItems::orderBy('id')->where('sales_invoice_id', $id)->get();
        $sales_invoices_payments_edit = SalesInvoicesPayments::where('sales_invoice_id', $id)->first();
        return view('accounting.sales_invoice_paynow.show', compact('sales_invoice_edit', 'sales_items_edits', 'sales_invoices_payments_edit', 'customers',  'sales_persons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function salePayNow($id)
    {
    }
}
