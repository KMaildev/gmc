@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            HP Cash Book
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
                                        {{ $sales_invoice->customers_table->company_name ?? '' }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $sales_invoice->post_ref ?? '' }}
                                    </td>

                                    {{-- Debit --}}
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
                                            $TotalDebitAmount = $amount_total;
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
