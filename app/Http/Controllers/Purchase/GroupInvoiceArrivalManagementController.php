<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\ArrivalInformation;
use App\Models\ArrivalItem;
use App\Models\PurchaseItem;
use App\Models\PurchaseOrder;
use App\User;
use Illuminate\Http\Request;

class GroupInvoiceArrivalManagementController extends Controller
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

    public function group_invoice_arrival_management_create($id)
    {
        $purchase_order = PurchaseOrder::findOrFail($id);
        $purchase_items = PurchaseItem::where('purchase_order_id', $id)->get();
        $users = User::all();

        return view('purchase.group_invoice_arrival_management.create', compact('purchase_order', 'purchase_items', 'users'));
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
        $arrival_info = ArrivalInformation::findOrFail($id);
        $arrival_items = ArrivalItem::where('arrival_information_id', $id)->get();

        $purchase_order_id = $arrival_info->purchase_order_id;
        $purchase_order = PurchaseOrder::findOrFail($purchase_order_id);
        $users = User::all();

        return view('purchase.group_invoice_arrival_management.edit', compact('purchase_order', 'users', 'arrival_info', 'arrival_items'));
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
}
