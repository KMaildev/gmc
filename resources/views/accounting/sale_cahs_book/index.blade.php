@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Cash Book
                        </h5>
                    </div>
                </div>

                <div class="">
                    <table class="" style="margin-bottom: 1px !important;">
                        <thead class="tbbg">
                            <tr>
                                <td rowspan="2" style="color: white; text-align: center; width: 1%;">
                                    Sr.No
                                </td>
                                <td rowspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Date
                                </td>
                                <td rowspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Dealer Name
                                </td>
                                <td rowspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Post Ref.
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
                                        {{ $sales_invoice->invoice_date ?? '' }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $sales_invoice->customers_table->company_name ?? '' }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $sales_invoice->post_ref ?? '' }}
                                    </td>

                                    {{-- Debit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                            @php
                                                $cash_book_cash_in = $cash_books->cash_in;
                                                $cash_book_bank_in = $cash_books->bank_in;
                                                $BankCashInTotal = $cash_book_cash_in + $cash_book_bank_in;
                                                $TotalBankCashIn[] = $BankCashInTotal;
                                            @endphp
                                        @endforeach
                                        @php
                                            $BankCashInTotal = array_sum($TotalBankCashIn);
                                            echo number_format($BankCashInTotal, 2);
                                            $DebitTotal[] = $BankCashInTotal;
                                        @endphp
                                    </td>

                                    {{-- Credit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalBankCashOut = [];
                                        @endphp
                                        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                            @php
                                                $cash_book_cash_out = $cash_books->cash_out;
                                                $cash_book_bank_out = $cash_books->bank_out;
                                                $BankCashOutTotal = $cash_book_cash_out + $cash_book_bank_out;
                                                $TotalBankCashOut[] = $BankCashOutTotal;
                                            @endphp
                                        @endforeach
                                        @php
                                            $BankCashOutTotal = array_sum($TotalBankCashOut);
                                            echo number_format($BankCashOutTotal, 2);
                                            $CreditTotal[] = $BankCashOutTotal;
                                        @endphp
                                    </td>

                                    {{-- Balance Debit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalDebitAmount = $BankCashInTotal;
                                            $TotalBankInCashOut = $BankCashOutTotal;
                                            $BalanceDebit = $TotalDebitAmount - $TotalBankInCashOut;
                                            if ($BalanceDebit > 0) {
                                                echo number_format($BalanceDebit, 2);
                                                $BalanceDebitTotal[] = $BalanceDebit;
                                            }
                                        @endphp
                                    </td>

                                    {{-- Balance Debit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @if ($BalanceDebit < 0)
                                            {{ number_format(abs($BalanceDebit), 2) }}
                                            @php
                                                $BalanceCreditTotal[] = $BalanceDebit;
                                            @endphp
                                        @endif
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
