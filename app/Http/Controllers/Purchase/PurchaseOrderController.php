<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseOrder;
use App\Http\Requests\UpdatePurchaseOrder;
use App\Models\Brand;
use App\Models\Products;
use App\Models\PurchaseItem;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\Models\TemporaryPurchaseItem;
use App\User;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_orders = PurchaseOrder::where('invoice_status', NULL)->get();
        return view('purchase.purchase_order.index', compact('purchase_orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $sales_persons = User::all();

        $brands = Brand::all();
        return view('purchase.purchase_order.create', compact('suppliers', 'brands', 'sales_persons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseOrder $request)
    {
        $purchase_order = new PurchaseOrder();
        $purchase_order->supplier_id = $request->supplier_id;
        $purchase_order->purchase_no = $request->purchase_no;
        $purchase_order->purchase_date = $request->purchase_date;
        $purchase_order->purchase_representative_id = $request->purchase_representative_id;
        $purchase_order->user_id = auth()->user()->id ?? 0;
        $purchase_order->total_amount = $request->total_amount;
        $purchase_order->order_status = $request->order_status;
        $purchase_order->save();
        $purchase_order_id = $purchase_order->id;

        foreach ($request->productFields as $key => $value) {
            $insert[$key]['brand_id'] = $value['brand_id'];
            $insert[$key]['type_of_model_id'] = $value['type_of_model_id'];
            $insert[$key]['qty'] = $value['qty'];
            $insert[$key]['cif_usd'] = $value['cif_usd'];
            $insert[$key]['description'] = $value['description'];
            $insert[$key]['purchase_order_id'] = $purchase_order_id;
            $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
            $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
        }
        PurchaseItem::insert($insert);
        TemporaryPurchaseItem::where('session_id', session()->getId())->delete();
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
        $suppliers = Supplier::all();
        $sales_persons = User::all();
        $brands = Brand::all();

        $purchase_order = PurchaseOrder::findOrFail($id);
        $purchase_items = PurchaseItem::where('purchase_order_id', $id)->get();
        return view('purchase.purchase_order.edit', compact('suppliers', 'brands', 'sales_persons', 'purchase_order', 'purchase_items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchaseOrder $request, $id)
    {
        $purchase_order = PurchaseOrder::findOrFail($id);
        $purchase_order->supplier_id = $request->supplier_id;
        $purchase_order->purchase_no = $request->purchase_no;
        $purchase_order->purchase_date = $request->purchase_date;
        $purchase_order->purchase_representative_id = $request->purchase_representative_id;
        $purchase_order->user_id = auth()->user()->id ?? 0;
        $purchase_order->total_amount = $request->total_amount;
        $purchase_order->order_status = $request->order_status;
        $purchase_order->update();
        $purchase_order_id = $purchase_order->id;

        if ($request->productFields) {
            foreach ($request->productFields as $key => $value) {
                $insert[$key]['brand_id'] = $value['brand_id'];
                $insert[$key]['type_of_model_id'] = $value['type_of_model_id'];
                $insert[$key]['qty'] = $value['qty'];
                $insert[$key]['cif_usd'] = $value['cif_usd'];
                $insert[$key]['description'] = $value['description'];
                $insert[$key]['purchase_order_id'] = $purchase_order_id;
                $insert[$key]['created_at'] =  date('Y-m-d H:i:s');
                $insert[$key]['updated_at'] =  date('Y-m-d H:i:s');
            }
            PurchaseItem::insert($insert);
        }
        TemporaryPurchaseItem::where('session_id', session()->getId())->delete();
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
        $purchase_order = PurchaseOrder::findOrFail($id);
        $purchase_order->delete();

        PurchaseItem::where('purchase_order_id', $id)->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }
}
