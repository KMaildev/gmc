<?php

namespace App\Http\Controllers\SpareParts;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSparePartItem;
use App\Http\Requests\UpdateSparePartItem;
use App\Imports\SparePartItemImport;
use App\SparePartItem;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spare_part_items = SparePartItem::all();
        return view('spare_parts.item.index', compact('spare_part_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spare_parts.item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSparePartItem $request)
    {
        $part_item = new SparePartItem();
        $part_item->part_number = $request->part_number;
        $part_item->part_name = $request->part_name;
        $part_item->remark = $request->remark;
        $part_item->create_date = $request->create_date;
        $part_item->opening_qty = $request->opening_qty ?? 0;
        $part_item->user_id = auth()->user()->id;
        $part_item->save();
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
        $part_item = SparePartItem::findOrFail($id);
        return view('spare_parts.item.edit', compact('part_item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSparePartItem $request, $id)
    {
        $part_item = SparePartItem::findOrFail($id);
        $part_item->part_number = $request->part_number;
        $part_item->part_name = $request->part_name;
        $part_item->remark = $request->remark;
        $part_item->create_date = $request->create_date;
        $part_item->opening_qty = $request->opening_qty ?? 0;
        $part_item->user_id = auth()->user()->id;
        $part_item->update();
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
        $part_item = SparePartItem::findOrFail($id);
        $part_item->delete();
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function item_import()
    {
        Excel::import(new SparePartItemImport, request()->file('file'));
        return redirect()->back()->with('success', 'Your processing has been completed.');
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function getSparePartItemAjax($id = null)
    {
        $item = SparePartItem::findOrFail($id);
        return json_encode(array(
            "item" => $item,
            "statusCode" => 200,
        ));
    }
}
