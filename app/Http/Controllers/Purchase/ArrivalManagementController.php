<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArrivalInformation;
use App\Http\Requests\UpdateArrivalInformation;
use App\Http\Requests\UpdateArrivalItems;
use App\Models\ArrivalInformation;
use App\Models\ArrivalItem;
use App\Models\PurchaseItem;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\User;
use Illuminate\Http\Request;

class ArrivalManagementController extends Controller
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
        //
    }

    public function arrival_management_create($id)
    {
        $purchase_order = PurchaseOrder::findOrFail($id);
        $purchase_items = PurchaseItem::where('purchase_order_id', $id)->get();
        $supplier_id = $purchase_order->supplier_id;
        $supplier = Supplier::findOrFail($supplier_id);
        $users = User::all();

        return view('purchase.arrival_management.create', compact('supplier', 'purchase_order', 'purchase_items', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArrivalInformation $request)
    {
        $arrival_info = new ArrivalInformation();
        $arrival_info->arrival_date = $request->arrival_date;
        $arrival_info->remark = $request->remark;
        $arrival_info->arrival_status = $request->arrival_status;
        $arrival_info->purchase_order_id = $request->purchase_order_id;
        $arrival_info->user_id = $request->user_id;
        $arrival_info->save();

        $arrival_information_id = $arrival_info->id;
        $purchase_order_id = $request->purchase_order_id;
        $arrival_date = $request->arrival_date;

        foreach ($request->inputFields as $key => $value) {
            if ($value['shipping_qty'] != NULL || $value['shipping_qty'] != 0) {
                $insert[$key]['shipping_qty'] = $value['shipping_qty'];
                $insert[$key]['arrival_date'] = $arrival_date;
                $insert[$key]['purchase_item_id'] = $value['purchase_item_id'];
                $insert[$key]['purchase_order_id'] = $purchase_order_id;
                $insert[$key]['arrival_information_id'] = $arrival_information_id;
                $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
                $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
            }
        }
        ArrivalItem::insert($insert);
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
        $arrival_info = ArrivalInformation::findOrFail($id);
        $arrival_items = ArrivalItem::where('arrival_information_id', $id)->get();

        $purchase_order_id = $arrival_info->purchase_order_id;
        $purchase_order = PurchaseOrder::findOrFail($purchase_order_id);
        $supplier_id = $purchase_order->supplier_id;
        $supplier = Supplier::findOrFail($supplier_id);
        $users = User::all();

        return view('purchase.arrival_management.edit', compact('supplier', 'purchase_order', 'users', 'arrival_info', 'arrival_items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArrivalInformation $request, $id)
    {
        $arrival_info = ArrivalInformation::findOrFail($id);
        $arrival_info->arrival_date = $request->arrival_date;
        $arrival_info->remark = $request->remark;
        $arrival_info->arrival_status = $request->arrival_status;
        $arrival_info->purchase_order_id = $request->purchase_order_id;
        $arrival_info->user_id = $request->user_id;
        $arrival_info->update();
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
        $arrival_info = ArrivalInformation::findOrFail($id);
        $arrival_info->delete();

        ArrivalItem::where('arrival_information_id', $id)->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }


    public function UpdateArrivalItems(UpdateArrivalItems $request)
    {
        $id = $request->arrival_item_id;
        $arrival_items = ArrivalItem::findOrFail($id);
        $arrival_items->shipping_qty = $request->shipping_qty;
        $arrival_items->update();
        return json_encode(array(
            "statusCode" => 200,
        ));
    }
}
