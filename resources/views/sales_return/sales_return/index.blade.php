@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Sales Return
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <a href="{{ route('sales_return.create') }}" class="dt-button create-new btn btn-primary btn-sm">
                                <span>
                                    <i class="bx bx-plus me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Create</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <table class="table table-bordered main-table py-5" style="margin-bottom: 1px !important;"
                        id="tbl_exporttable_to_xls">
                        <thead class="tbbg">
                            <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                Sr.No
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Invoice No.
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Company Name
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Return Date
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Return Person
                            </th>

                            <th colspan="4" style="background-color: #296166;"></th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Action
                            </th>

                        </thead>
                        <tbody class="table-border-bottom-0 row_position" id="tablecontents">
                            @foreach ($sales_returns as $key => $sales_return)
                                <tr style="background-color: #b7b5b5; color: black; text-align: center;">

                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        {{ $sales_return->sales_invoices_table->invoice_no ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_return->sales_invoices_table->customers_table->name ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_return->return_date }}
                                    </td>

                                    <td>
                                        {{ $sales_return->users_table->name ?? '' }}
                                    </td>

                                    <td colspan="4"></td>

                                    <td style="text-align: center;">
                                        <div class="demo-inline-spacing">
                                            <div class="btn-group">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('sales_return.edit', $sales_return->sales_invoice_id) }}">
                                                            Edit
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr style="background-color: #D3DCE3; color: black">
                                    <td style="text-align: center;">
                                        #
                                    </td>

                                    <td style="text-align: center;">
                                        Brand Name
                                    </td>

                                    <td style="text-align: center;">
                                        Type
                                    </td>

                                    <td style="text-align: center;">
                                        Model
                                    </td>

                                    <td style="text-align: center;">
                                        Color
                                    </td>

                                    <td style="text-align: center;">
                                        Chassis No.
                                    </td>

                                    <td style="text-align: center;">
                                        Vehicle No.
                                    </td>

                                    <td style="text-align: center;">
                                        Qty
                                    </td>

                                    <td style="text-align: center;">
                                        Unit Price
                                    </td>

                                    <td style="text-align: center;">
                                        Return Value
                                    </td>
                                </tr>

                                @php
                                    $total_qty = [];
                                    $total_unit_price = [];
                                    $total_return_value = [];
                                @endphp
                                @foreach ($sales_return->sale_return_items_table as $item_key => $sales_return_items)
                                    <tr style="border: 1px solid black;">

                                        <td style="text-align: center;">
                                            {{ $item_key + 1 }}
                                        </td>

                                        <td style="text-align: center;">
                                            {{ $sales_return_items->products_table->brand_name ?? '' }}
                                        </td>

                                        <td style="text-align: center;">
                                            {{ $sales_return_items->products_table->type ?? '' }}
                                        </td>

                                        <td style="text-align: center;">
                                            {{ $sales_return_items->products_table->product ?? '' }}
                                        </td>

                                        <td style="text-align: center;">
                                            {{ $sales_return_items->products_table->body_color ?? '' }}
                                        </td>

                                        <td style="text-align: center;">
                                            {{ $sales_return_items->products_table->chessi_no ?? '' }}
                                        </td>

                                        <td style="text-align: center;">
                                            {{ $sales_return_items->products_table->vehicle_no ?? '' }}
                                        </td>

                                        <td style="text-align: right; font-weight: bold;">
                                            {{ $sales_return_items->qty ?? 0 }}
                                        </td>

                                        <td style="text-align: right; font-weight: bold;">
                                            @php
                                                echo number_format($sales_return_items->unit_price, 2);
                                            @endphp
                                        </td>

                                        <td style="text-align: right; font-weight: bold;">
                                            @php
                                                $qty = $sales_return_items->qty;
                                                $unit_price = $sales_return_items->unit_price;
                                                $return_value = $qty * $unit_price;
                                                echo number_format($return_value, 2);
                                                $total_qty[] = $qty;
                                                $total_unit_price[] = $unit_price;
                                                $total_return_value[] = $return_value;
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach
                                <tr style="background-color: #D3DCE3; color: black; text-align: right;">
                                    <td colspan="7"></td>
                                    <td>
                                        @php
                                            $qty_total = array_sum($total_qty);
                                            echo number_format($qty_total);
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            $unit_price_total = array_sum($total_unit_price);
                                            echo number_format($unit_price_total, 2);
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            $return_value_total = array_sum($total_return_value);
                                            echo number_format($return_value_total, 2);
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

@section('script')
@endsection
