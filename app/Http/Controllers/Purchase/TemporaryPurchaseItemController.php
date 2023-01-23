<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemporaryPurchaseItem;
use App\Models\TemporaryPurchaseItem;
use Illuminate\Http\Request;

class TemporaryPurchaseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session_id = session()->getId();
        $temporary_purchase_items = TemporaryPurchaseItem::with('brands_table')
            ->with('type_of_models_table')
            ->orderBy('id')
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
    public function store(StoreTemporaryPurchaseItem $request)
    {
        $temp = new TemporaryPurchaseItem();
        $temp->brand_id = $request->brand_id;
        $temp->type_of_model_id = $request->type_of_model_id;
        $temp->description = $request->description;
        $temp->qty = $request->qty;
        $temp->cif_usd = $request->cif_usd;
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

    public function remove_temporary_purchase_items($id)
    {
        $temp = TemporaryPurchaseItem::findOrFail($id);
        $temp->delete();
        return json_encode(array(
            "statusCode" => 200,
        ));
    }
}
