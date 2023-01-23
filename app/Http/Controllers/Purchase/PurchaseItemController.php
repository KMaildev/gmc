<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\PurchaseItem;
use Illuminate\Http\Request;

class PurchaseItemController extends Controller
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
    }


    public function purchase_item_remove($id)
    {
        $purchase_item = PurchaseItem::findOrFail($id);
        $purchase_item->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }


    public function getPurchaseItemsAjax($id = null)
    {
        $purchase_items = PurchaseItem::with('type_of_models_table')
            ->where('purchase_order_id', $id)->get();

        $purchase_item = PurchaseItem::with('brands_table')
            ->where('purchase_order_id', $id)->first();

        return json_encode(array(
            "purchase_items" => $purchase_items,
            "purchase_item" => $purchase_item,
            "statusCode" => 200,
        ));
    }


    public function getPurchaseItemsDetailAjax($id = null)
    {
        $purchase_item = PurchaseItem::findOrFail($id);

        return json_encode(array(
            "purchase_item" => $purchase_item,
            "statusCode" => 200,
        ));
    }
}
