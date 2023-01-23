@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            HP Account Receivable
                        </h5>
                    </div>
                </div>

                <div class="">
                    <table class="" style="margin-bottom: 1px !important;">
                        <thead class="tbbg">
                            <tr>
                                <td rowspan="2" style="color: white; text-align: center; width: 1%;">
                                    No
                                </td>
                                <td rowspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Name
                                </td>
                                <td rowspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Debit
                                </td>
                                <td colspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Credit
                                </td>
                                <td colspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Balance
                                </td>
                            </tr>
                            <tr>
                                <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Down Payment
                                </td>
                                <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Principal
                                </td>

                                <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Debit
                                </td>
                                <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Credit
                                </td>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php
                                $DebitTotal = [];
                                $CreditDownPaymentTotal = [];
                                $CreditPrincipleTotal = [];
                                $BalanceDebitTotal = [];
                            @endphp
                            @foreach ($sales_invoices as $key => $sales_invoice)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $sales_invoice->customers_table->name ?? '' }}
                                    </td>

                                    {{-- Debit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $sale_total_amount = $sales_invoice->sales_invoices_payments_table->total_amount;
                                            echo number_format($sale_total_amount, 2);
                                            $DebitTotal[] = $sale_total_amount;
                                        @endphp
                                    </td>

                                    {{-- Credit Down Payment --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalCreditDownPayment = [];
                                        @endphp
                                        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                            @if ($cash_books->principle_interest == 'down_payment')
                                                @php
                                                    $cash_book_cash_in = $cash_books->cash_in;
                                                    $cash_book_bank_in = $cash_books->bank_in;
                                                    $BankCashInTotal = $cash_book_cash_in + $cash_book_bank_in;
                                                    $TotalCreditDownPayment[] = $BankCashInTotal;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            $TotalCreditDownPayment = array_sum($TotalCreditDownPayment);
                                            echo number_format($TotalCreditDownPayment, 2);
                                            $CreditDownPaymentTotal[] = $TotalCreditDownPayment;
                                        @endphp
                                    </td>

                                    {{-- Credit Principal --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalCreditPrinciple = [];
                                        @endphp
                                        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                            @if ($cash_books->principle_interest == 'Principle')
                                                @php
                                                    $cash_book_cash_in = $cash_books->cash_in;
                                                    $cash_book_bank_in = $cash_books->bank_in;
                                                    $BankCashInTotal = $cash_book_cash_in + $cash_book_bank_in;
                                                    $TotalCreditPrinciple[] = $BankCashInTotal;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            $TotalCreditPrinciple = array_sum($TotalCreditPrinciple);
                                            echo number_format($TotalCreditPrinciple, 2);
                                            $CreditPrincipleTotal[] = $TotalCreditPrinciple;
                                        @endphp
                                    </td>

                                    {{-- Balance Debit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalBalanceDebit = $sale_total_amount - $TotalCreditDownPayment - $TotalCreditPrinciple;
                                            echo number_format($TotalBalanceDebit, 2);
                                            $BalanceDebitTotal[] = $TotalBalanceDebit;
                                        @endphp
                                    </td>

                                    <td style="text-align: right; font-weight: bold;">

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="2">Total:</td>
                            <td style="text-align: right; font-weight: bold;">
                                @php
                                    $TotalDebit = array_sum($DebitTotal);
                                    echo number_format($TotalDebit, 2);
                                @endphp
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                @php
                                    $CreditDownPaymentTotal = array_sum($CreditDownPaymentTotal);
                                    echo number_format($CreditDownPaymentTotal, 2);
                                @endphp
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                @php
                                    $CreditPrincipleTotal = array_sum($CreditPrincipleTotal);
                                    echo number_format($CreditPrincipleTotal, 2);
                                @endphp
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                @php
                                    $BalanceDebitTotal = array_sum($BalanceDebitTotal);
                                    echo number_format($BalanceDebitTotal, 2);
                                @endphp
                            </td>
                            <td style="text-align: right; font-weight: bold;">

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
