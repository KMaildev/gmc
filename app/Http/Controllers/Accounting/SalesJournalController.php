<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalesJournal;
use App\Http\Requests\UpdateSalesJournal;
use App\Models\SalesInvoices;
use App\Models\SalesJournal;
use Illuminate\Http\Request;

class SalesJournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales_invoices = SalesInvoices::orderBy('id')->where('hp_or_dealer', 'dealer')->get();
        return view('accounting.sales_journal.index', compact('sales_invoices'));
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
    public function store(StoreSalesJournal $request)
    {
        $sale_journal = new SalesJournal();
        $sale_journal->sales_journal_date = $request->sales_journal_date;
        $sale_journal->customer_id = $request->customer_id;
        $sale_journal->sales_invoice_id = $request->sales_invoice_id;
        $sale_journal->post_ref = $request->post_ref;
        $sale_journal->debited = $request->debited;
        $sale_journal->credited = $request->credited;
        $sale_journal->user_id = auth()->user()->id ?? 0;
        $sale_journal->save();
        return redirect()->back()->with('success', 'Process is completed.');
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
        $sales_journals = SalesJournal::all();

        // For Edit Data 
        $sales_journal_data = SalesJournal::findOrFail($id);
        return view('accounting.sales_journal.index', compact('form_status', 'form_sales_invoices', 'sales_journals', 'sales_journal_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesJournal $request, $id)
    {
        $sale_journal = SalesJournal::findOrFail($id);
        $sale_journal->sales_journal_date = $request->sales_journal_date;
        $sale_journal->customer_id = $request->customer_id;
        $sale_journal->sales_invoice_id = $request->sales_invoice_id;
        $sale_journal->post_ref = $request->post_ref;
        $sale_journal->debited = $request->debited;
        $sale_journal->credited = $request->credited;
        $sale_journal->user_id = auth()->user()->id ?? 0;
        $sale_journal->update();
        return redirect()->route('sales_journal.index')->with('success', 'Process is completed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = SalesJournal::findOrFail($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Process is completed.');
    }


    /**
     * Get Ajax Request and restun Data
     *
     * @return \Illuminate\Http\Response
     */
    public function get_sales_journals($id)
    {
        $sales_journals_data = SalesJournal::where('sales_invoice_id', $id)->first();
        return json_encode($sales_journals_data);
    }
}
