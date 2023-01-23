<?php

namespace App\Http\Controllers\SpareParts;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartSaleInvoice;
use App\Models\Customers;
use App\PartSaleInvoice;
use App\PartSaleItem;
use App\SparePartItem;
use App\TemporaryPartItem;
use App\User;
use Illuminate\Http\Request;

class PartSaleInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $part_sale_invoices = PartSaleInvoice::all();
        return view('spare_parts.sale_invoice.index', compact('part_sale_invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spare_part_items = SparePartItem::all();
        $customers = Customers::all();
        $sales_persons = User::all();
        return view('spare_parts.sale_invoice.create', compact('spare_part_items', 'customers', 'sales_persons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartSaleInvoice $request)
    {

        $session_id = session()->getId();
        $temporary_part_items = TemporaryPartItem::where('session_id', $session_id)->get();
        $wordCount = $temporary_part_items->count();

        if ($wordCount > 0) {
            $sale_invoice = new PartSaleInvoice();
            $sale_invoice->customer_id = $request->customer_id;
            $sale_invoice->invoice_no = $request->invoice_no;
            $sale_invoice->invoice_date = $request->invoice_date;
            $sale_invoice->showroom_name = $request->showroom_name;
            $sale_invoice->invoice_remark = $request->invoice_remark;
            $sale_invoice->sales_type = $request->sales_type;
            $sale_invoice->sales_persons_id = $request->sales_persons_id;
            $sale_invoice->user_id = auth()->user()->id ?? 0;

            $sale_invoice->total_amount = 0;
            $sale_invoice->tax = $request->tax ?? 0;
            $sale_invoice->discount = $request->discount ?? 0;
            $sale_invoice->save();
            $part_sale_invoices = $sale_invoice->id;


            foreach ($temporary_part_items as $key => $value) {
                $insert[$key]['part_sale_invoice_id'] = $part_sale_invoices;
                $insert[$key]['spare_part_item_id'] = $value['spare_part_item_id'];
                $insert[$key]['qty'] = $value['qty'];
                $insert[$key]['unit_price'] = $value['unit_price'];
                $insert[$key]['description'] = $value['description'];
                $insert[$key]['invoice_date'] = $request->invoice_date;
                $insert[$key]['user_id'] = auth()->user()->id ?? 0;
                $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
                $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
            }
            PartSaleItem::insert($insert);

            TemporaryPartItem::where('session_id', session()->getId())->delete();
            return redirect()->back()->with('success', 'Your processing has been completed.');
        }

        return redirect()->back()->with('error', 'Something went wrong please try again.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales_invoice_edit = PartSaleInvoice::findOrFail($id);

        $spare_part_items = SparePartItem::all();
        $customers = Customers::all();
        $sales_persons = User::all();

        return view('spare_parts.sale_invoice.show', compact('spare_part_items', 'customers', 'sales_persons', 'sales_invoice_edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales_invoice_edit = PartSaleInvoice::findOrFail($id);

        $spare_part_items = SparePartItem::all();
        $customers = Customers::all();
        $sales_persons = User::all();

        return view('spare_parts.sale_invoice.edit', compact('spare_part_items', 'customers', 'sales_persons', 'sales_invoice_edit'));
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

        $sale_invoice = PartSaleInvoice::findOrFail($id);
        $sale_invoice->customer_id = $request->customer_id;
        $sale_invoice->invoice_no = $request->invoice_no;
        $sale_invoice->invoice_date = $request->invoice_date;
        $sale_invoice->showroom_name = $request->showroom_name;
        $sale_invoice->invoice_remark = $request->invoice_remark;
        $sale_invoice->sales_type = $request->sales_type;
        $sale_invoice->sales_persons_id = $request->sales_persons_id;
        $sale_invoice->user_id = auth()->user()->id ?? 0;

        $sale_invoice->total_amount = 0;
        $sale_invoice->tax = $request->tax ?? 0;
        $sale_invoice->discount = $request->discount ?? 0;
        $sale_invoice->update();
        $part_sale_invoices = $sale_invoice->id;


        $session_id = session()->getId();
        $temporary_part_items = TemporaryPartItem::where('session_id', $session_id)->get();
        $wordCount = $temporary_part_items->count();
        if ($wordCount > 0) {
            foreach ($temporary_part_items as $key => $value) {
                $insert[$key]['part_sale_invoice_id'] = $part_sale_invoices;
                $insert[$key]['spare_part_item_id'] = $value['spare_part_item_id'];
                $insert[$key]['qty'] = $value['qty'];
                $insert[$key]['unit_price'] = $value['unit_price'];
                $insert[$key]['description'] = $value['description'];
                $insert[$key]['invoice_date'] = $request->invoice_date;
                $insert[$key]['user_id'] = auth()->user()->id ?? 0;
                $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
                $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
            }
            PartSaleItem::insert($insert);
            TemporaryPartItem::where('session_id', session()->getId())->delete();
        }
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
        $sale_invoice = PartSaleInvoice::findOrFail($id);
        $sale_invoice->delete();
        PartSaleItem::where('part_sale_invoice_id', $id)->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }
}
