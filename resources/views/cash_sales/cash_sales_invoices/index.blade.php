@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Cash Sales Invoices
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <a href="#" class="dt-button create-new btn btn-success btn-sm"
                                onclick="alert('Build in progress')">
                                <span>
                                    <i class="bx bx-file me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">
                                        Excel
                                    </span>
                                </span>
                            </a>

                            @can('dealer_sales_invoice_create')
                                <a href="{{ route('cash_sales_invoices.create') }}"
                                    class="dt-button create-new btn btn-primary btn-sm">
                                    <span>
                                        <i class="bx bx-plus me-sm-2"></i>
                                        <span class="d-none d-sm-inline-block">Create</span>
                                    </span>
                                </a>
                            @endcan
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
                                Date
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Name
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Status
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Date
                            </th>

                            <th colspan="3"
                                style="background-color: #296166; color: white; text-align: center; width: 10%;">
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Action
                            </th>

                        </thead>
                        <tbody class="table-border-bottom-0 row_position" id="tablecontents">
                            @foreach ($sales_invoices as $key => $sales_invoice)
                                <tr style="background-color: #b7b5b5; color: black; text-align: center;">

                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->invoice_no }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->invoice_date }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->customers_table->company_name ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->customers_table->name ?? '' }}
                                    </td>

                                    <td>
                                        Status
                                    </td>

                                    <td>
                                        Date
                                    </td>

                                    <td colspan="2"></td>

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
                                                            href="{{ route('cash_sales_invoices.show', $sales_invoice->id) }}"
                                                            target="_blank">
                                                            View Invoice
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('cash_sales_invoices.edit', $sales_invoice->id) }}">
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
                                        Sales Value
                                    </td>
                                </tr>
                                @php
                                    $total_amount = [];
                                @endphp
                                @foreach ($sales_invoice->sales_items_table as $item_key => $sales_items)
                                    <tr style="border: 1px solid black;">
                                        <td style="text-align: center;">
                                            {{ $item_key + 1 }}
                                        </td>
                                        <td style="text-align: center;">
                                            {{ $sales_items->products_table->brand_name ?? '' }}
                                        </td>
                                        <td style="text-align: center;">
                                            {{ $sales_items->products_table->type ?? '' }}
                                        </td>
                                        <td style="text-align: center;">
                                            {{ $sales_items->products_table->product ?? '' }}
                                        </td>
                                        <td style="text-align: center;">
                                            {{ $sales_items->products_table->body_color ?? '' }}
                                        </td>
                                        <td style="text-align: center;">
                                            {{ $sales_items->products_table->chessi_no ?? '' }}
                                        </td>
                                        <td style="text-align: center;">
                                            {{ $sales_items->products_table->vehicle_no ?? '' }}
                                        </td>
                                        <td style="text-align: right; font-weight: bold;">
                                            {{ $sales_items->qty ?? 0 }}
                                        </td>
                                        <td style="text-align: right; font-weight: bold;">
                                            @php
                                                echo number_format($sales_items->unit_price, 2);
                                            @endphp
                                        </td>
                                        <td style="text-align: right; font-weight: bold;">
                                            @php
                                                $qty = $sales_items->qty;
                                                $unit_price = $sales_items->unit_price;
                                                $sale_value = $qty * $unit_price;
                                                echo number_format($sale_value, 2);
                                                $total_amount[] = $sale_value;
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach

                                <tr style="background-color: #D3DCE3; color: black; text-align: right;">
                                    <td colspan="7"></td>
                                    <td>
                                        Total Amount
                                    </td>
                                    <td>
                                        Discount
                                    </td>
                                    <td>
                                        Balance to Pay
                                    </td>
                                </tr>

                                <tr style="color: black; text-align: center;">
                                    <td colspan="7"></td>
                                    {{-- Total Amount --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $amount_total = array_sum($total_amount);
                                            echo number_format($amount_total, 2);
                                        @endphp
                                    </td>

                                    {{-- Discount --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $discount = $sales_invoice->sales_invoices_payments_table->discount ?? 0;
                                            echo number_format($discount, 2);
                                        @endphp
                                    </td>

                                    {{-- Balance to Pay --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $balance_to_pay = $amount_total - $discount;
                                            echo number_format($balance_to_pay, 2);
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
