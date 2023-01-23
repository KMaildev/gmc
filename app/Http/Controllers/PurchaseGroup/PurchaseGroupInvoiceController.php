<?php

namespace App\Http\Controllers\PurchaseGroup;

use App\Http\Controllers\Controller;
use App\Models\PurchaseItem;
use App\Models\PurchaseOrder;
use App\TemporaryPurchaseGroupItem;
use App\User;
use Illuminate\Http\Request;

class PurchaseGroupInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchase_group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sales_persons = User::all();
        $purchase_orders = PurchaseOrder::all();
        $purchase_order_id = null;
        return view('purchase_group.create', compact('sales_persons', 'purchase_orders', 'purchase_order_id'));
    }


    public function purchase_group_invoice_create($purchase_order_id = null)
    {
        $sales_persons = User::all();
        $purchase_orders = PurchaseOrder::all();
        $purchase_order_data = PurchaseOrder::findOrFail($purchase_order_id);
        $purchase_items = PurchaseItem::where('purchase_order_id', $purchase_order_id)->get();
        $purchase_order_id = $purchase_order_id;

        $session_id = session()->getId();
        $temporary_purchase_group_items = TemporaryPurchaseGroupItem::where('session_id', $session_id)->get();
        return view('purchase_group.create', compact('sales_persons', 'purchase_orders', 'purchase_order_data', 'purchase_items', 'purchase_order_id', 'temporary_purchase_group_items'));
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
        $item_count = TemporaryPurchaseGroupItem::where('session_id', $session_id)->count();
        if ($item_count > 0) {
            $temporary_purchase_group_items = TemporaryPurchaseGroupItem::where('session_id', $session_id)->get();

            $purchase_order = new PurchaseOrder();
            $purchase_order->supplier_id = 0;
            $purchase_order->purchase_no = $request->purchase_no;
            $purchase_order->purchase_date = $request->purchase_date;
            $purchase_order->purchase_representative_id = $request->purchase_representative_id;
            $purchase_order->user_id = auth()->user()->id ?? 0;
            $purchase_order->total_amount = $request->total_amount;
            $purchase_order->order_status = $request->order_status;
            $purchase_order->invoice_status = 'group_invoice';
            $purchase_order->save();
            $purchase_order_id = $purchase_order->id;

            foreach ($temporary_purchase_group_items as $key => $value) {
                $insert[$key]['brand_id'] = $value['brand_id'];
                $insert[$key]['type_of_model_id'] = $value['type_of_model_id'];
                $insert[$key]['qty'] = $value['qty'];
                $insert[$key]['cif_usd'] = $value['cif_usd'];
                $insert[$key]['description'] = $value['description'];
                $insert[$key]['purchase_order_id'] = $purchase_order_id;
                $insert[$key]['purchase_order_original_id'] = $value['purchase_order_id'];
                $insert[$key]['purchase_item_id'] = $value['purchase_item_id'];
                $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
                $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
            }

            PurchaseItem::insert($insert);
            TemporaryPurchaseGroupItem::where('session_id', session()->getId())->delete();
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
