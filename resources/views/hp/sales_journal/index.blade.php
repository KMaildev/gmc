@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            HP Sales Journal
                        </h5>
                    </div>
                </div>

                <div class="">
                    <table class="" style="margin-bottom: 1px !important;">
                        <thead class="tbbg">
                            <th style="color: white; text-align: center; width: 1%;">
                                Sr.No
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Invoice No.
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Date
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Customer Name-Account Debited
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Post Ref.
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Account Receivable ( Vehicle )-Debited
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Revenue (Vehicle)-Credited
                            </th>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php
                                $AccountReceivableTotal = [];
                                $RevenueTotal = [];
                            @endphp
                            @foreach ($sales_invoices as $key => $sales_invoice)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $sales_invoice->invoice_no ?? '' }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $sales_invoice->invoice_date ?? '' }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $sales_invoice->customers_table->company_name ?? '' }}
                                    </td>


                                    <td style="text-align: center;">
                                        {{ $sales_invoice->post_ref ?? '' }}
                                    </td>

                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_amount = [];
                                        @endphp
                                        @foreach ($sales_invoice->sales_items_table as $sales_items)
                                            @php
                                                $qty = $sales_items->qty;
                                                $unit_price = $sales_items->unit_price;
                                                $sale_value = $qty * $unit_price;
                                                $total_amount[] = $sale_value;
                                            @endphp
                                        @endforeach
                                        @php
                                            $amount_total = array_sum($total_amount);
                                            echo number_format($amount_total, 2);
                                            $AccountReceivableTotal[] = $amount_total;
                                        @endphp
                                    </td>

                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $amount_total = array_sum($total_amount);
                                            echo number_format($amount_total, 2);
                                            $RevenueTotal[] = $amount_total;
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="5">Total:</td>
                            <td style="text-align: right; font-weight: bold;">
                                @php
                                    $TotalAccountReceivable = array_sum($AccountReceivableTotal);
                                    echo number_format($TotalAccountReceivable, 2);
                                @endphp
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                @php
                                    $TotalRevenue = array_sum($RevenueTotal);
                                    echo number_format($TotalRevenue, 2);
                                @endphp
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
