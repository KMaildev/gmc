<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTemporaryPurchaseGroupItem;
use App\Models\PurchaseItem;
use App\TemporaryPurchaseGroupItem;
use Illuminate\Http\Request;

class TemporaryPurchaseGroupItemContriller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session_id = session()->getId();
        $temporary_purchase_items = TemporaryPurchaseGroupItem::with('purchase_order_table', 'purchase_item', 'brands_table', 'type_of_models_table')
            ->where('session_id', $session_id)
            ->get();
        echo json_encode($temporary_purchase_items);
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
        $purchase_item_id = $request->purchase_item_id;
        $purchaseItem = PurchaseItem::findOrFail($purchase_item_id);
        $brand_id = $purchaseItem->brand_id;
        $type_of_model_id = $purchaseItem->type_of_model_id;
        $purchase_order_id = $purchaseItem->purchase_order_id;

        $temp = new TemporaryPurchaseGroupItem();
        $temp->purchase_order_id = $purchase_order_id;
        $temp->purchase_item_id = $purchase_item_id;
        $temp->brand_id = $brand_id;
        $temp->type_of_model_id = $type_of_model_id;
        $temp->qty = $request->qty;
        $temp->cif_usd = $request->cif_usd;
        $temp->description = $request->description ?? '';
        $temp->session_id = session()->getId();
        $temp->user_id = auth()->user()->id ?? 0;
        $temp->save();
        return json_encode(array(
            "statusCode" => 200,
        ));
    }

    public function add_temporary_purchase_group_item(AddTemporaryPurchaseGroupItem $request)
    {
        $purchase_item_id = $request->purchase_item_id;
        $purchaseItem = PurchaseItem::findOrFail($purchase_item_id);
        $brand_id = $purchaseItem->brand_id;
        $type_of_model_id = $purchaseItem->type_of_model_id;
        $purchase_order_id = $purchaseItem->purchase_order_id;

        $temp = new TemporaryPurchaseGroupItem();
        $temp->purchase_order_id = $purchase_order_id;
        $temp->purchase_item_id = $purchase_item_id;
        $temp->brand_id = $brand_id;
        $temp->type_of_model_id = $type_of_model_id;
        $temp->qty = $request->qty;
        $temp->cif_usd = $request->cif_usd;
        $temp->description = $request->description ?? '';
        $temp->session_id = session()->getId();
        $temp->user_id = auth()->user()->id ?? 0;
        $temp->save();
        return json_encode(array(
            "statusCode" => 200,
        ));
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

    public function remove($id)
    {
        $temp = TemporaryPurchaseGroupItem::findOrFail($id);
        $temp->delete();
        return json_encode(array(
            "statusCode" => 200,
        ));
    }

    public function delete($id)
    {
        $temp = TemporaryPurchaseGroupItem::findOrFail($id);
        $temp->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }
}
