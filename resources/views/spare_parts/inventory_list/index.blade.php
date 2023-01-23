@extends('layouts.menus.spare_part')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Inventory List
                        </h5>
                        @include('spare_parts.inventory_list.shared.filter_action')
                    </div>
                </div>
                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                        aria-labelledby="HeadersCol" tabindex="0">
                        <table class="table table-bordered main-table" style="margin-bottom: 10px">
                            @include('spare_parts.inventory_list.shared.thead')

                            <tbody>
                                @php
                                    $closing_qty_total = 0;
                                @endphp
                                @foreach ($spare_part_items as $key => $spare_part_item)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $spare_part_item->part_number ?? '' }}
                                        </td>

                                        <td>
                                            {{ $spare_part_item->part_name ?? '' }}
                                        </td>

                                        {{-- Local Price  --}}
                                        <td style="text-align: right">
                                            @php
                                                $local_price = $spare_part_item->part_purchase_items_table->sum('local_price');
                                                echo number_format($local_price, 2);
                                            @endphp
                                        </td>

                                        {{-- Import Price  --}}
                                        <td style="text-align: right">
                                            @php
                                                $import_price = $spare_part_item->part_purchase_items_table->sum('import_price');
                                                echo number_format($import_price, 2);
                                            @endphp
                                        </td>

                                        {{-- Opening Quantity --}}
                                        <td style="text-align: right">
                                            @php
                                                // Manual Insert Opening Quantity
                                                $manual_opening_qty = [];
                                                foreach ($manual_entry_opening_spare_part_items as $manual_entry_opening_spare_part_item) {
                                                    if ($spare_part_item->id == $manual_entry_opening_spare_part_item->id) {
                                                        $manual_opening_qty[] = $manual_entry_opening_spare_part_item->opening_qty ?? 0;
                                                    }
                                                }
                                                $manual_opening_qty = array_sum($manual_opening_qty);
                                                // Manual Insert Opening Quantity End
                                                
                                                if ($manual_opening_qty) {
                                                    $opening_qty = $manual_opening_qty;
                                                } else {
                                                    // Previous Manual Insert Opening Quantity
                                                    $previous_manual_opening_qty = [];
                                                    foreach ($previous_month_manual_entry_opening_spare_part_items as $previous_month_manual_entry_opening_spare_part_item) {
                                                        if ($spare_part_item->id == $previous_month_manual_entry_opening_spare_part_item->id) {
                                                            $previous_manual_opening_qty[] = $previous_month_manual_entry_opening_spare_part_item->opening_qty ?? 0;
                                                        }
                                                    }
                                                    $previous_manual_opening_qty = array_sum($previous_manual_opening_qty);
                                                    // End Previous Manual Insert Opening Quantity
                                                
                                                    // Previous Pruchase Qty
                                                    $previous_month_purchase_qty = [];
                                                    $previous_month_sale_qty = [];
                                                    foreach ($previous_month_spare_part_items as $key => $previous_month_spare_part_item) {
                                                        if ($spare_part_item->id == $previous_month_spare_part_item->id) {
                                                            $previous_month_purchase_qty[] = $previous_month_spare_part_item->part_purchase_items_table->sum('qty');
                                                            $previous_month_sale_qty[] = $previous_month_spare_part_item->part_sale_items_table->sum('qty');
                                                        }
                                                    }
                                                    $previous_month_purchase_qty = array_sum($previous_month_purchase_qty);
                                                    $previous_month_sale_qty = array_sum($previous_month_sale_qty);
                                                    // End Previous Pruchase Qty
                                                
                                                    $opening_qty = $previous_manual_opening_qty + $previous_month_purchase_qty - $previous_month_sale_qty;
                                                }
                                                echo $opening_qty;
                                            @endphp
                                        </td>

                                        {{-- Opening Value MMK	--}}
                                        <td style="text-align: right">
                                            @php
                                                $opening_value_mmk = $local_price * $opening_qty;
                                                echo number_format($opening_value_mmk, 2);
                                            @endphp
                                        </td>

                                        {{-- Opening Value USD	--}}
                                        <td style="text-align: right">
                                            @php
                                                $opening_value_usd = $import_price * $opening_qty;
                                                echo number_format($opening_value_usd, 2);
                                            @endphp
                                        </td>

                                        {{-- Purchase Qty --}}
                                        <td style="text-align: right">
                                            @php
                                                $purchase_qty = $spare_part_item->part_purchase_items_table->sum('qty');
                                                echo number_format($purchase_qty);
                                            @endphp
                                        </td>

                                        {{-- Purchase Price --}}
                                        <td style="text-align: right">
                                            @php
                                                $purchase_price = $spare_part_item->part_purchase_items_table->sum('unit_price');
                                                echo number_format($purchase_price, 2);
                                            @endphp
                                        </td>

                                        {{-- Purchase Amount --}}
                                        <td style="text-align: right">
                                            @php
                                                $purchase_amount = $purchase_qty * $purchase_price;
                                                echo number_format($purchase_amount, 2);
                                            @endphp
                                        </td>

                                        {{-- Sales Quantity --}}
                                        <td style="text-align: right">
                                            @php
                                                $sale_qty = $spare_part_item->part_sale_items_table->sum('qty');
                                                echo number_format($sale_qty);
                                            @endphp
                                        </td>

                                        {{-- Sales Price --}}
                                        <td style="text-align: right">
                                            @php
                                                $sale_price = $spare_part_item->part_sale_items_table->sum('unit_price');
                                                echo number_format($sale_price);
                                            @endphp
                                        </td>

                                        {{-- Sales Amount --}}
                                        <td style="text-align: right">
                                            @php
                                                $sale_amount = $sale_qty * $sale_price;
                                                echo number_format($sale_amount, 2);
                                            @endphp
                                        </td>

                                        {{-- Closing Quantity --}}
                                        <td style="text-align: right">
                                            @php
                                                $closing_qty = $opening_qty + $purchase_qty - $sale_qty;
                                                echo number_format($closing_qty);
                                            @endphp
                                        </td>

                                        {{-- Closing Value MMK --}}
                                        <td style="text-align: right">
                                            @php
                                                $closing_value_mmk = $closing_qty * $local_price;
                                                echo number_format($closing_value_mmk, 2);
                                            @endphp
                                        </td>

                                        {{-- Closing Value USD --}}
                                        <td style="text-align: right">
                                            @php
                                                $closing_value_usd = $closing_qty * $import_price;
                                                echo number_format($closing_value_usd, 2);
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
