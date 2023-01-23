<?php

namespace App\Http\Controllers\SalesReturn;

use App\Http\Controllers\Controller;
use App\Models\SalesItems;
use App\Models\SalesReturnItem;
use Illuminate\Http\Request;

class SalesReturnItemController extends Controller
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

    public function SaveSalesReturnItem($id)
    {
        $sales_items = SalesItems::findOrFail($id);

        $sales_return_item = new SalesReturnItem();
        $sales_return_item->product_id = $sales_items->product_id ?? '';
        $sales_return_item->qty = $sales_items->qty ?? 0;
        $sales_return_item->unit_price = $sales_items->unit_price ?? 0;
        $sales_return_item->sales_invoice_id = $sales_items->sales_invoice_id ?? 0;
        $sales_return_item->description = $sales_items->description;
        $sales_return_item->save();
        return redirect()->back();
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



    public function RemoveSalesReturnItem($id)
    {
        $dep = SalesReturnItem::findOrFail($id);
        $dep->delete();
        return redirect()->back()->with('success', 'Deleted successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_sales_return_item_description(Request $request)
    {
        $id = $request->sales_return_item_id;
        $sale_return_description = $request->sale_return_description;

        $temp = SalesReturnItem::findOrFail($id);
        $temp->description = $sale_return_description;
        $temp->update();
        return json_encode(array(
            "statusCode" => 200,
        ));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_sales_return_item_unit_price(Request $request)
    {
        $id = $request->sales_return_item_id;
        $sale_return_unit_price = $request->sale_return_unit_price;

        $temp = SalesReturnItem::findOrFail($id);
        $temp->unit_price = $sale_return_unit_price;
        $temp->update();
        return json_encode(array(
            "statusCode" => 200,
        ));
    }
}
