@extends('layouts.menus.accounting')
@section('content')
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <div class="row justify-content-center">
        <h5>
            Cash Receipt Journal
        </h5>

        <table style="margin-bottom: 1px !important;">
            <thead class="tbbg">
                <th style="color: white; text-align: center; width: 1%;">
                    Sr
                </th>

                <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                    Invoice
                </th>

                <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                    Invoice Date
                </th>

                <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                    Customer <br> Name-Account Debited
                </th>

                <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                    Post Ref.
                </th>

                <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                    Cash-Debited
                </th>

                <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                    Cash-Credit
                </th>

                <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                    Sales <br> Discount -Debited
                </th>

                <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                    Sales <br> Discount -Credit
                </th>

                <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                    AR <br> (Vehicle )-Debit
                </th>

                <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                    AR <br> (Vehicle )-Credited
                </th>

                {{-- <th style="color: white; background-color: #2e696e; text-align: center; widht: 20%">
                    Payment
                </th> --}}

                <th style="color: white; background-color: #2e696e; text-align: center; widht: 20%">
                    Refund - Debit
                </th>

                <th style="color: white; background-color: #2e696e; text-align: center; widht: 20%">
                    Refund - Credit
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
                            {{ $sales_invoice->customers_table->name ?? '' }}
                        </td>

                        <td style="text-align: center;">
                            {{ $sales_invoice->post_ref ?? '' }}
                        </td>

                        {{-- Cash-Debited --}}
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

                        {{-- Cash-Credit --}}
                        <td style="text-align: right; font-weight: bold;">
                            0
                        </td>

                        {{-- Sales Discount -Debited --}}
                        <td style="text-align: right; font-weight: bold;">
                            {{ $sales_invoice->sales_invoices_payments_table->discount ?? 0 }}
                        </td>

                        {{-- Sales Discount -Credit --}}
                        <td style="text-align: right; font-weight: bold;">
                            0
                        </td>

                        {{-- AR (Vehicle )-Debit --}}
                        <td style="text-align: right; font-weight: bold;">
                            @php
                                $ar_debit = [];
                            @endphp
                            @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                @php
                                    $cash_book_cash_out = $cash_books->cash_out;
                                    $cash_book_bank_out = $cash_books->bank_out;
                                    $TotalBankCashRefund = $cash_book_cash_out + $cash_book_bank_out;
                                    $ar_debit[] = $TotalBankCashRefund;
                                @endphp
                            @endforeach
                            @php
                                $ar_debit_total = array_sum($ar_debit);
                                echo number_format($ar_debit_total, 2);
                            @endphp
                        </td>

                        {{-- AR (Vehicle )-Credited --}}
                        <td style="text-align: right; font-weight: bold;">
                            @php
                                echo number_format($CashBookCreditTotal, 2);
                            @endphp
                        </td>

                        {{-- Payment --}}
                        <td style="text-align: right; font-weight: bold;">
                            0
                            {{-- @include('accounting.cash_collection.table.payment_received_table') --}}
                        </td>

                        {{-- Refund --}}
                        <td style="text-align: right; font-weight: bold;">
                            @php
                                echo number_format($ar_debit_total, 2);
                            @endphp
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
@endsection
