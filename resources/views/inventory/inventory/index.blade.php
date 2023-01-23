@extends('layouts.menus.inventory')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Inventory
                        </h5>
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <table class="table table-bordered main-table">
                        <thead style="background-color: #2e696e;">

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 1%;">
                                Sr.No
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Product Name
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Models
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                "MGM" WAREHOUSE
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Sale Returned
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Total
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                "MGM Installment" / HP
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Dealer
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Cash Sales
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Total Sale
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                "MGM" WAREHOUSE
                            </th>


                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Total
                            </th>

                        </thead>

                        <tbody class="table-border-bottom-0">
                            @foreach ($arrival_informations as $key => $arrival_information)
                                {{-- arrival_information --}}
                                @include('inventory.inventory.shared.arrival_information')

                                {{-- qty_management --}}
                                @php
                                    $total_shipping_qty = [];
                                    $total_sale_return_qty = [];
                                    $total_warehouse_plus_return = [];
                                    $total_hp_sale_item_qty = [];
                                    $total_dealer_sale_item_qty = [];
                                    $total_cash_sale_sale_item_qty = [];
                                    $total_sales = [];
                                    $total_warehouse_balance = [];
                                    $all_total_sale_warehouse_balance = [];
                                @endphp
                                @foreach ($arrival_information->arrival_items_table as $key => $arrival_items)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td style="text-align: center;">
                                            {{ $arrival_items->purchase_items_table->brands_table->name ?? '' }}
                                        </td>

                                        <td style="text-align: center;">
                                            {{ $arrival_items->purchase_items_table->type_of_models_table->title ?? '' }}
                                        </td>

                                        {{-- "MGM" WAREHOUSE --}}
                                        <td style="text-align: right;">
                                            @php
                                                $shipping_qty = $arrival_items->shipping_qty ?? 0;
                                                echo $shipping_qty;
                                                $total_shipping_qty[] = $shipping_qty;
                                            @endphp
                                        </td>

                                        {{-- Sale Returned --}}
                                        <td style="text-align: right;">
                                            @php
                                                $sale_item_return_qty = [];
                                            @endphp
                                            @foreach ($arrival_items->shipping_chassis_management_table as $shipping_chassis_management)
                                                @foreach ($shipping_chassis_management->products_table ?? '' as $product)
                                                    @foreach ($product->sales_return_items_table_for_inventory as $sales_return_items)
                                                        @php
                                                            $sale_item_return_qty[] = $sales_return_items->qty;
                                                        @endphp
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                            @php
                                                $sale_item_return_qty = array_sum($sale_item_return_qty);
                                                echo $sale_item_return_qty;
                                                $total_sale_return_qty[] = $sale_item_return_qty;
                                            @endphp
                                        </td>


                                        {{-- Total  --}}
                                        <td style="text-align: right;">
                                            @php
                                                $warehouse_plus_return = $shipping_qty + $sale_item_return_qty;
                                                echo $warehouse_plus_return;
                                                $total_warehouse_plus_return[] = $warehouse_plus_return;
                                            @endphp
                                        </td>

                                        {{-- "MGM Installment" / HP --}}
                                        <td style="text-align: right;">
                                            @php
                                                $hp_sale_item_qty = [];
                                            @endphp
                                            @foreach ($arrival_items->shipping_chassis_management_table as $shipping_chassis_management)
                                                @foreach ($shipping_chassis_management->products_table ?? '' as $product)
                                                    @foreach ($product->sales_items_table_for_inventory as $sales_items)
                                                        @if ($sales_items->sale_types == 'hp')
                                                            @php
                                                                $hp_sale_item_qty[] = $sales_items->qty;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                            @php
                                                $hp_sale_item_qty = array_sum($hp_sale_item_qty);
                                                echo $hp_sale_item_qty;
                                                $total_hp_sale_item_qty[] = $hp_sale_item_qty;
                                            @endphp
                                        </td>


                                        {{-- Dealer --}}
                                        <td style="text-align: right;">
                                            @php
                                                $dealer_sale_item_qty = [];
                                            @endphp
                                            @foreach ($arrival_items->shipping_chassis_management_table as $shipping_chassis_management)
                                                @foreach ($shipping_chassis_management->products_table ?? '' as $product)
                                                    @foreach ($product->sales_items_table_for_inventory as $sales_items)
                                                        @if ($sales_items->sale_types == 'dealer')
                                                            @php
                                                                $dealer_sale_item_qty[] = $sales_items->qty;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                            @php
                                                $dealer_sale_item_qty = array_sum($dealer_sale_item_qty);
                                                echo $dealer_sale_item_qty;
                                                $total_dealer_sale_item_qty[] = $dealer_sale_item_qty;
                                            @endphp
                                        </td>


                                        {{-- Cash Sales --}}
                                        <td style="text-align: right;">
                                            @php
                                                $cash_sale_sale_item_qty = [];
                                            @endphp
                                            @foreach ($arrival_items->shipping_chassis_management_table as $shipping_chassis_management)
                                                @foreach ($shipping_chassis_management->products_table ?? '' as $product)
                                                    @foreach ($product->sales_items_table_for_inventory as $sales_items)
                                                        @if ($sales_items->sale_types == 'cash_sale')
                                                            @php
                                                                $cash_sale_sale_item_qty[] = $sales_items->qty;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                            @php
                                                $cash_sale_sale_item_qty = array_sum($cash_sale_sale_item_qty);
                                                echo $cash_sale_sale_item_qty;
                                                $total_cash_sale_sale_item_qty[] = $cash_sale_sale_item_qty;
                                            @endphp
                                        </td>

                                        {{-- Total Sale --}}
                                        <td style="text-align: right;">
                                            @php
                                                $total_sale = $hp_sale_item_qty + $dealer_sale_item_qty + $cash_sale_sale_item_qty;
                                                echo $total_sale;
                                                $total_sales[] = $total_sale;
                                            @endphp
                                        </td>


                                        {{-- "MGM" WAREHOUSE --}}
                                        <td style="text-align: right;">
                                            @php
                                                $warehouse_balance = $warehouse_plus_return - $total_sale;
                                                echo $warehouse_balance;
                                                $total_warehouse_balance[] = $warehouse_balance;
                                            @endphp
                                        </td>

                                        {{-- Total --}}
                                        <td style="text-align: right;">
                                            @php
                                                $total_sale_warehouse_balance = $total_sale + $warehouse_balance;
                                                echo $total_sale_warehouse_balance;
                                                $all_total_sale_warehouse_balance[] = $total_sale_warehouse_balance;
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach

                                <tr style="background-color: #FEF2CC;">
                                    <td colspan="3">
                                        Total:
                                    </td>

                                    {{-- "MGM" WAREHOUSE --}}
                                    <td style="text-align: right;">
                                        @php
                                            $total_shipping_qty = array_sum($total_shipping_qty);
                                            echo $total_shipping_qty;
                                        @endphp
                                    </td>

                                    {{-- Sale Returned --}}
                                    <td style="text-align: right;">
                                        @php
                                            $total_sale_return_qty = array_sum($total_sale_return_qty);
                                            echo $total_sale_return_qty;
                                        @endphp
                                    </td>

                                    {{-- Total  --}}
                                    <td style="text-align: right;">
                                        @php
                                            $total_warehouse_plus_return = array_sum($total_warehouse_plus_return);
                                            echo $total_warehouse_plus_return;
                                        @endphp
                                    </td>


                                    {{-- "MGM Installment" / HP	 --}}
                                    <td style="text-align: right;">
                                        @php
                                            $total_hp_sale_item_qty = array_sum($total_hp_sale_item_qty);
                                            echo $total_hp_sale_item_qty;
                                        @endphp
                                    </td>


                                    {{-- Dealer --}}
                                    <td style="text-align: right;">
                                        @php
                                            $total_dealer_sale_item_qty = array_sum($total_dealer_sale_item_qty);
                                            echo $total_dealer_sale_item_qty;
                                        @endphp
                                    </td>

                                    {{-- Cash Sales	 --}}
                                    <td style="text-align: right;">
                                        @php
                                            $total_cash_sale_sale_item_qty = array_sum($total_cash_sale_sale_item_qty);
                                            echo $total_cash_sale_sale_item_qty;
                                        @endphp
                                    </td>


                                    {{-- Total Sale --}}
                                    <td style="text-align: right;">
                                        @php
                                            $total_sales = array_sum($total_sales);
                                            echo $total_sales;
                                        @endphp
                                    </td>


                                    {{-- "MGM" WAREHOUSE	--}}
                                    <td style="text-align: right;">
                                        @php
                                            $total_warehouse_balance = array_sum($total_warehouse_balance);
                                            echo $total_warehouse_balance;
                                        @endphp
                                    </td>


                                    {{-- "MGM" WAREHOUSE	--}}
                                    <td style="text-align: right;">
                                        @php
                                            $all_total_sale_warehouse_balance = array_sum($all_total_sale_warehouse_balance);
                                            echo $all_total_sale_warehouse_balance;
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
@endsection
