<?php

namespace App\Http\Controllers\SpareParts;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemporaryPartItem;
use App\TemporaryPartItem;
use Illuminate\Http\Request;

class TemporaryPartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session_id = session()->getId();
        $temporary_part_items = TemporaryPartItem::with('spare_part_item_table')->orderBy('id')->where('session_id', $session_id)->get();
        echo json_encode($temporary_part_items);
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
    public function store(StoreTemporaryPartItem $request)
    {
        $temp = new TemporaryPartItem();
        $temp->spare_part_item_id = $request->spare_part_item_id;
        $temp->qty = $request->Qty;
        $temp->unit_price = $request->UnitPrice;
        $temp->description = $request->Description ?? '';
        $temp->remark = $request->Remark ?? '';
        $temp->local_price = $request->LocalPrice ?? 0;
        $temp->import_price = $request->ImportPrice ?? '';
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

    public function remove($id = null)
    {
        $temp = TemporaryPartItem::findOrFail($id);
        $temp->delete();
        return json_encode(array(
            "statusCode" => 200,
        ));
    }
}
