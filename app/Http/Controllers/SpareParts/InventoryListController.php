<?php

namespace App\Http\Controllers\SpareParts;

use App\Http\Controllers\Controller;
use App\SparePartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryListController extends Controller
{
    public function index(Request $request)
    {

        $start_date = $request->start_date ?? '2022-01-01';
        $end_date = $request->end_date ?? '2022-01-31';

        // Manual Entry Opening Spare Part 
        $manual_entry_opening_spare_part_items = DB::table('spare_part_items')->where(function ($query) use ($start_date, $end_date) {
            $query->where('create_date', '>=', $start_date);
            $query->where('create_date', '<=', $end_date);
        })->get();

        // Get All Spare Part Items 
        $spare_part_items = SparePartItem::with(['part_sale_items_table' => function ($query) use ($start_date, $end_date) {
            $query->whereDate('invoice_date', '>=', $start_date);
            $query->whereDate('invoice_date', '<=', $end_date);
        }])->with(['part_purchase_items_table' => function ($query) use ($start_date, $end_date) {
            $query->whereDate('invoice_date', '>=', $start_date);
            $query->whereDate('invoice_date', '<=', $end_date);
        }])->get();


        $previous_start_date = date("Y-m-d", strtotime("-1 month", strtotime(request("start_date"))));
        $previous_end_date = date("Y-m-d", strtotime("last day of previous month", strtotime(request("end_date"))));

        //Previous Month Manual Entry Opening Spare Part 
        $previous_month_manual_entry_opening_spare_part_items = DB::table('spare_part_items')->where(function ($query) use ($previous_start_date, $previous_end_date) {
            // $query->where('create_date', '>=', $previous_start_date);
            $query->where('create_date', '<=', $previous_end_date);
        })->get();

        // Previous Spare Part Items 
        $previous_month_spare_part_items = SparePartItem::with(['part_sale_items_table' => function ($query) use ($previous_start_date, $previous_end_date) {
            // $query->where('invoice_date', '>=', $previous_start_date);
            $query->where('invoice_date', '<=', $previous_end_date);
        }])->with(['part_purchase_items_table' => function ($query) use ($previous_start_date, $previous_end_date) {
            // $query->where('invoice_date', '>=', $previous_start_date);
            $query->where('invoice_date', '<=', $previous_end_date);
        }])->get();


        // return $previous_month_spare_part_items;
        return view('spare_parts.inventory_list.index', compact('spare_part_items', 'manual_entry_opening_spare_part_items', 'previous_month_manual_entry_opening_spare_part_items', 'previous_month_spare_part_items'));
    }
}
