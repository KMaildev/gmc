@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Purchase Journal
                        </h5>
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <table class="table table-bordered main-table py-5" style="margin-bottom: 1px !important;"
                        id="tbl_exporttable_to_xls">
                        <thead class="">
                            <th style="background-color: #2e696e; color: white; text-align: center; width: 1%;">
                                Sr
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Purchase No
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Date
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Supplier
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Description
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Debited
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Credit
                            </th>
                        </thead>

                        <tbody class="table-border-bottom-0">
                            @php
                                $total_cash_bank_in = [];
                                $total_cash_bank_out = [];
                            @endphp
                            @foreach ($cash_book_with_purhcase_orders as $cash_book_with_purhcase_order)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $cash_book_with_purhcase_order->purchase_orders_table->purchase_no ?? '' }}
                                    </td>

                                    <td>
                                        {{ $cash_book_with_purhcase_order->cash_book_date ?? '' }}
                                    </td>

                                    <td>
                                        {{ $cash_book_with_purhcase_order->purchase_orders_table->supplier_table->name ?? '' }}
                                    </td>

                                    <td>
                                        {{ $cash_book_with_purhcase_order->description ?? '' }}
                                    </td>

                                    <td style="text-align: right">
                                        @php
                                            $cash_in = $cash_book_with_purhcase_order->cash_in ?? 0;
                                            $bank_in = $cash_book_with_purhcase_order->bank_in ?? 0;
                                            $cash_bank_in_total = $cash_in + $bank_in;
                                            echo number_format($cash_bank_in_total, 2);
                                            $total_cash_bank_in[] = $cash_bank_in_total;
                                        @endphp
                                    </td>

                                    <td style="text-align: right">
                                        @php
                                            $cash_out = $cash_book_with_purhcase_order->cash_out ?? 0;
                                            $bank_out = $cash_book_with_purhcase_order->bank_out ?? 0;
                                            $cash_bank_out_total = $cash_out + $bank_out;
                                            echo number_format($cash_bank_out_total, 2);
                                            $total_cash_bank_out[] = $cash_bank_out_total;
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="5">
                                Total:
                            </td>

                            <td style="text-align: right">
                                @php
                                    $total_cash_bank_in = array_sum($total_cash_bank_in);
                                    echo number_format($total_cash_bank_in, 2);
                                @endphp
                            </td>

                            <td style="text-align: right">
                                @php
                                    $total_cash_bank_out = array_sum($total_cash_bank_out);
                                    echo number_format($total_cash_bank_out, 2);
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
