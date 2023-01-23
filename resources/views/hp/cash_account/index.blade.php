@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Cash Account
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
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 7%">
                                    Name
                                </td>
                                <td colspan="4"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Debit
                                </td>
                                <td rowspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Credit
                                </td>
                                <td colspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Total
                                </td>
                            </tr>
                            <tr>
                                <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Down Payment
                                </td>

                                <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Pricipal
                                </td>

                                <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Interest
                                </td>

                                <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Service Fee
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
                                $DebitDownPaymentTotal = [];
                                $DebitPrincipleTotal = [];
                                $DebitInterestTotal = [];
                                $DebitServiceFeeTotal = [];
                                $DebitTotal = [];
                            @endphp
                            @foreach ($sales_invoices as $key => $sales_invoice)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $sales_invoice->customers_table->name ?? '' }}
                                    </td>

                                    {{-- Debit Down Payment --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalDebitDownPayment = [];
                                        @endphp
                                        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                            @if ($cash_books->principle_interest == 'down_payment')
                                                @php
                                                    $cash_book_cash_in = $cash_books->cash_in;
                                                    $cash_book_bank_in = $cash_books->bank_in;
                                                    $BankCashInTotal = $cash_book_cash_in + $cash_book_bank_in;
                                                    $TotalDebitDownPayment[] = $BankCashInTotal;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            $TotalDebitDownPayment = array_sum($TotalDebitDownPayment);
                                            echo number_format($TotalDebitDownPayment, 2);
                                            $DebitDownPaymentTotal[] = $TotalDebitDownPayment;
                                        @endphp
                                    </td>

                                    {{-- Debit Pricipal --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalDebitPrinciple = [];
                                        @endphp
                                        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                            @if ($cash_books->principle_interest == 'Principle')
                                                @php
                                                    $cash_book_cash_in = $cash_books->cash_in;
                                                    $cash_book_bank_in = $cash_books->bank_in;
                                                    $BankCashInTotal = $cash_book_cash_in + $cash_book_bank_in;
                                                    $TotalDebitPrinciple[] = $BankCashInTotal;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            $TotalDebitPrinciple = array_sum($TotalDebitPrinciple);
                                            echo number_format($TotalDebitPrinciple, 2);
                                            $DebitPrincipleTotal[] = $TotalDebitPrinciple;
                                        @endphp
                                    </td>

                                    {{-- Debit Interest --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalDebitInterest = [];
                                        @endphp
                                        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                            @if ($cash_books->principle_interest == 'Interest')
                                                @php
                                                    $cash_book_cash_in = $cash_books->cash_in;
                                                    $cash_book_bank_in = $cash_books->bank_in;
                                                    $BankCashInTotal = $cash_book_cash_in + $cash_book_bank_in;
                                                    $TotalDebitInterest[] = $BankCashInTotal;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            $TotalDebitInterest = array_sum($TotalDebitInterest);
                                            echo number_format($TotalDebitInterest, 2);
                                            $DebitInterestTotal[] = $TotalDebitInterest;
                                        @endphp
                                    </td>

                                    {{-- Debit Service Fee --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalDebitServiceFee = [];
                                        @endphp
                                        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                            @if ($cash_books->principle_interest == 'service_fee')
                                                @php
                                                    $cash_book_cash_in = $cash_books->cash_in;
                                                    $cash_book_bank_in = $cash_books->bank_in;
                                                    $BankCashInTotal = $cash_book_cash_in + $cash_book_bank_in;
                                                    $TotalDebitServiceFee[] = $BankCashInTotal;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            $TotalDebitServiceFee = array_sum($TotalDebitServiceFee);
                                            echo number_format($TotalDebitServiceFee, 2);
                                            $DebitServiceFeeTotal[] = $TotalDebitServiceFee;
                                        @endphp
                                    </td>


                                    {{-- Credit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                    </td>

                                    {{-- Total Debit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalDebit = $TotalDebitDownPayment + $TotalDebitPrinciple + $TotalDebitInterest + $TotalDebitServiceFee;
                                            echo number_format($TotalDebit, 2);
                                            $DebitTotal[] = $TotalDebitServiceFee;
                                        @endphp
                                    </td>

                                    {{-- Credit --}}
                                    <td style="text-align: right; font-weight: bold;">
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
