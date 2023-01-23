@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Hire Purchaser Account
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
                                    Date
                                </td>
                                <td rowspan="2"
                                    style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                    Name
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
                                        {{ $sales_invoice->customers_table->name ?? '' }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $sales_invoice->post_ref ?? '' }}
                                    </td>

                                    {{-- Debit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_principle = $sales_invoice->sales_invoices_payments_table->total_principle ?? 0;
                                            $total_interest = $sales_invoice->sales_invoices_payments_table->total_interest ?? 0;
                                            $hp_total_downpayment = $sales_invoice->sales_invoices_payments_table->hp_total_downpayment ?? 0;
                                            $total_principle_interest = $total_principle + $total_interest + $hp_total_downpayment;
                                            echo number_format($total_principle_interest, 2);
                                            $DebitTotal[] = $total_principle_interest;
                                        @endphp
                                    </td>

                                    {{-- Credit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalBankCashIn = [];
                                        @endphp
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
                                            $CreditTotal[] = $BankCashInTotal;
                                        @endphp
                                    </td>

                                    {{-- Balance Debit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $balance_debit = $total_principle_interest - $BankCashInTotal;
                                            echo number_format($balance_debit, 2);
                                            $BalanceDebitTotal[] = $balance_debit;
                                        @endphp
                                    </td>

                                    <td style="text-align: right; font-weight: bold;">

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="4">Total:</td>
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
