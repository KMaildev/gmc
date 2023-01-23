@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            HP Cash Receipt Journal
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
                                Invoice Date
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Customer Name-Account Debited
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Post Ref.
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Cash-Debited
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Sales Discount -Debited
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                AR (Vehicle )-Credited
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 20%">
                                Payment
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 20%">
                                Refund
                            </th>
                        </thead>
                        <tbody class="table-border-bottom-0">
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

                                    {{-- Cash-Debited --}}
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
                                            $DebitTotal[] = $amount_total;
                                        @endphp
                                    </td>

                                    {{-- Sales Discount -Debited --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        {{ $sales_invoice->sales_invoices_payments_table->discount ?? 0 }}
                                    </td>

                                    {{-- AR (Vehicle )-Credited --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $CashBookCreditTotal = [];
                                        @endphp
                                        @foreach ($sales_invoice->cash_books_table as $cash_books)
                                            @php
                                                $cash_book_cash_in = $cash_books->cash_in;
                                                $cash_book_bank_in = $cash_books->bank_in;
                                                $TotalBankCash = $cash_book_cash_in + $cash_book_bank_in;
                                                $CashBookCreditTotal[] = $TotalBankCash;
                                            @endphp
                                        @endforeach
                                        @php
                                            $CashBookCreditTotal = array_sum($CashBookCreditTotal);
                                            echo number_format($CashBookCreditTotal, 2);
                                        @endphp
                                    </td>

                                    {{-- Payment --}}
                                    <td>
                                        @include('hp.cash_collection.table.payment_received_table')
                                    </td>

                                    {{-- Refund --}}
                                    <td>
                                        @include('hp.cash_collection.table.refund_table')
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
