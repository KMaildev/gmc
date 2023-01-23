@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Sales Journal
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
                                AR-Debited
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                AR-Credit
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Revenue Debit
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Revenue Credited
                            </th>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php
                                $AccountReceivableTotal = [];
                                $RevenueCredited = [];
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

                                    {{-- AR-Debited --}}
                                    <td style="text-align: right; font-weight: bold;">

                                        @php
                                            $BankCashOutTotal = [];
                                        @endphp
                                        @foreach ($sales_invoice->cash_books_table as $cash_books)
                                            @php
                                                $cash_book_cash_out = $cash_books->cash_out;
                                                $cash_book_bank_out = $cash_books->bank_out;
                                                $TotalBankCashOut = $cash_book_cash_out + $cash_book_bank_out;
                                                $BankCashOutTotal[] = $TotalBankCashOut;
                                            @endphp
                                        @endforeach

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
                                            $BankCashOutTotal = array_sum($BankCashOutTotal);
                                            $total_amounts = $amount_total - $BankCashOutTotal;
                                            echo number_format($total_amounts, 2);
                                            $AccountReceivableTotal[] = $total_amounts;
                                        @endphp
                                    </td>

                                    {{-- AR-Credit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        0
                                    </td>

                                    <td style="text-align: right; font-weight: bold;">
                                        0
                                    </td>

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
                                            $RevenueCredited[] = $CashBookCreditTotal;
                                            echo number_format($CashBookCreditTotal, 2);
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
                            <td style="text-align: right; font-weight: bold;"></td>
                            <td style="text-align: right; font-weight: bold;"></td>
                            <td style="text-align: right; font-weight: bold;">
                                @php
                                    $TotalRevenueCredited = array_sum($RevenueCredited);
                                    echo number_format($TotalRevenueCredited, 2);
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
