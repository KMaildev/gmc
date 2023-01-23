<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemporarySalesItems;
use App\Models\TemporarySalesItem;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class SaleInvoiceCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session_id = session()->getId();
        $temporary_sales_items = TemporarySalesItem::with('products_table')->orderBy('id')->where('session_id', $session_id)->get();
        echo json_encode($temporary_sales_items);
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
    public function store(StoreTemporarySalesItems $request)
    {
        $temp = new TemporarySalesItem();
        $temp->product_id = $request->ChessiNO;
        $temp->qty = $request->Qty;
        $temp->price = $request->Price;
        $temp->description = $request->Description;
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
    }

    public function temporary_sales_items_remove($id)
    {
        $temp = TemporarySalesItem::findOrFail($id);
        $temp->delete();
        return json_encode(array(
            "statusCode" => 200,
        ));
        // return redirect()->back()->with('success', 'Deleted successfully.');
    }


    public function temporary_sales_items_delete($id)
    {
        $temp = TemporarySalesItem::findOrFail($id);
        $temp->delete();
        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}
