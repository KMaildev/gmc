<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShippingChassisManagement;
use App\Imports\ShippingChassisManagementImport;
use App\Models\ArrivalInformation;
use App\Models\ArrivalItem;
use App\Models\Brand;
use App\Models\PurchaseOrder;
use App\Models\ShippingChassisManagement;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ChassisManagementController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arrival_item = ArrivalItem::findOrFail($id);

        $purchase_order_id = $arrival_item->purchase_order_id;
        $purchase_order = PurchaseOrder::findOrFail($purchase_order_id);

        $supplier_id = $purchase_order->supplier_id;
        if ($supplier_id == 0) {
            $supplier = [];
        } else {
            $supplier = Supplier::findOrFail($supplier_id);
        }

        $arrival_information_id = $arrival_item->arrival_information_id;
        $arrival_information = ArrivalInformation::findOrFail($arrival_information_id);

        $shipping_chassis_managements = ShippingChassisManagement::where('arrival_item_id', $id)->get();

        return view('inventory.chassis_management.show', compact('purchase_order', 'supplier', 'arrival_information', 'arrival_item', 'shipping_chassis_managements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ShippingChassisManagement::findOrFail($id);
        return view('inventory.chassis_management.edit', compact('product'));
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
        $user_id = auth()->user()->id;
        $product = ShippingChassisManagement::findOrFail($id);
        $product->product = $request->product;
        $product->type = $request->type;
        $product->model_no = $request->model_no;
        $product->model_year = $request->model_year;
        $product->configuration = $request->configuration;
        $product->body_color = $request->body_color;
        $product->interior_color = $request->interior_color;
        $product->engine_power = $request->engine_power;
        $product->chassis_no = $request->chassis_no;
        $product->engine_no = $request->engine_no;
        $product->weight = $request->weight;
        $product->door = $request->door;
        $product->seater = $request->seater;
        $product->vehicle_no = $request->vehicle_no;
        $product->quantity = $request->quantity;
        $product->remark = $request->remark;
        $product->user_id = $user_id ?? 0;
        $product->brand_name = $request->brand_name;
        $product->commodity = $request->commodity;
        $product->id_no = $request->id_no;
        $product->update();
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
        $product = ShippingChassisManagement::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }

    public function CreateChassisManagement($id = null)
    {
        $arrival_item = ArrivalItem::findOrFail($id);

        $purchase_order_id = $arrival_item->purchase_order_id;
        $purchase_order = PurchaseOrder::findOrFail($purchase_order_id);

        $supplier_id = $purchase_order->supplier_id;
        if ($supplier_id == 0) {
            $supplier = [];
        } else {
            $supplier = Supplier::findOrFail($supplier_id);
        }

        $arrival_information_id = $arrival_item->arrival_information_id;
        $arrival_information = ArrivalInformation::findOrFail($arrival_information_id);

        return view('inventory.chassis_management.create', compact('purchase_order', 'supplier', 'arrival_information', 'arrival_item'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function importShippingChassisManagement(StoreShippingChassisManagement $request)
    {
        $arrival_item_id = $request->arrival_item_id;
        $purchase_item_id = $request->purchase_item_id;
        $purchase_order_id = $request->purchase_order_id;
        $arrival_information_id = $request->arrival_information_id;

        Excel::import(new ShippingChassisManagementImport($arrival_item_id, $purchase_item_id, $purchase_order_id, $arrival_information_id), request()->file('file'));
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }
}
