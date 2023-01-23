@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            HP Interest Suspense AC
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
                                <td rowspan="2"
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
                                $CreditTotal = [];
                                $BalanceDebitTotal = [];
                                $BalanceCreditTotal = [];
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
                                            $DebitTotal[] = $TotalDebitInterest;
                                        @endphp
                                    </td>

                                    {{-- Credit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_interest = $sales_invoice->sales_invoices_payments_table->total_interest ?? 0;
                                            echo number_format($total_interest, 2);
                                            $CreditTotal[] = $total_interest;
                                        @endphp
                                    </td>

                                    {{-- Balance Debit --}}
                                    <td style="text-align: right; font-weight: bold;">

                                    </td>

                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_balance_credit = $total_interest - $TotalDebitInterest;
                                            echo number_format($total_balance_credit, 2);
                                            $BalanceCreditTotal[] = $total_interest;
                                        @endphp
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
                                    $TotalCredit = array_sum($CreditTotal);
                                    echo number_format($TotalCredit, 2);
                                @endphp
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                @php
                                    $TotalBalanceDebit = array_sum($BalanceDebitTotal);
                                    echo number_format($TotalBalanceDebit, 2);
                                @endphp
                            </td>
                            <td style="text-align: right; font-weight: bold;">
                                @php
                                    $TotalBalanceCredit = array_sum($BalanceCreditTotal);
                                @endphp
                                {{ number_format(abs($TotalBalanceCredit), 2) }}
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
