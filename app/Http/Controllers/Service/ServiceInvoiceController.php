<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\ServiceInvoice;
use App\ServiceInvoiceItem;
use App\SparePartItem;
use App\TemporaryPartItem;
use App\TypesOfService;
use App\User;
use Illuminate\Http\Request;

class ServiceInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_invoices = ServiceInvoice::all();
        return view('service.service_invoice.index', compact('service_invoices'));
    }

    public function spare_part_service_invoice()
    {
        $service_invoices = ServiceInvoice::all();
        return view('spare_parts.service_invoice.index', compact('service_invoices'));
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
        $types_of_service = TypesOfService::all();
        return view('service.service_invoice.create', compact('spare_part_items', 'customers', 'sales_persons', 'types_of_service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session_id = session()->getId();
        $temporary_part_items = TemporaryPartItem::where('session_id', $session_id)->get();
        $wordCount = $temporary_part_items->count();

        if ($wordCount > 0) {
            $service_inv = new ServiceInvoice();
            $service_inv->customer_id = $request->customer_id;
            $service_inv->vin_number = $request->vin_number;
            $service_inv->reg_number = $request->reg_number;
            $service_inv->invoice_date = $request->invoice_date;
            $service_inv->invoice_no = $request->invoice_no;
            $service_inv->time_in = $request->time_in;
            $service_inv->time_out = $request->time_out;
            $service_inv->types_of_service_id = $request->types_of_service_id;
            $service_inv->sales_persons_id = $request->sales_persons_id;
            $service_inv->sub_total = $request->sub_total;
            $service_inv->tax = $request->tax;
            $service_inv->user_id = auth()->user()->id ?? 0;
            $service_inv->save();
            $service_inv_id = $service_inv->id;

            foreach ($temporary_part_items as $key => $value) {
                $insert[$key]['service_invoice_id'] = $service_inv_id;
                $insert[$key]['spare_part_item_id'] = $value['spare_part_item_id'];
                $insert[$key]['qty'] = $value['qty'];
                $insert[$key]['unit_price'] = $value['unit_price'];
                $insert[$key]['description'] = $value['description'];
                $insert[$key]['remark'] = $value['remark'];
                $insert[$key]['user_id'] = auth()->user()->id ?? 0;
                $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
                $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
            }
            ServiceInvoiceItem::insert($insert);

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
}
