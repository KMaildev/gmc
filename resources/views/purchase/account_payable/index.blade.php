@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Account Payable
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
                                    Purchase No
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
                            @foreach ($purchase_orders as $key => $purchase_order)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        {{ $purchase_order->purchase_date ?? '' }}
                                    </td>

                                    <td>
                                        {{ $purchase_order->purchase_no ?? '' }}
                                    </td>

                                    {{-- Debit  --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $CashBookDebitTotal = [];
                                        @endphp
                                        @foreach ($purchase_order->cash_books_table as $cash_books)
                                            @php
                                                $cash_book_cash_out = $cash_books->cash_out;
                                                $cash_book_bank_out = $cash_books->bank_out;
                                                $TotalBankCash = $cash_book_cash_out + $cash_book_bank_out;
                                                $CashBookDebitTotal[] = $TotalBankCash;
                                            @endphp
                                        @endforeach
                                        @php
                                            $CashBookDebitTotal = array_sum($CashBookDebitTotal);
                                            echo number_format($CashBookDebitTotal, 2);
                                            $DebitTotal[] = $CashBookDebitTotal;
                                        @endphp
                                    </td>


                                    {{-- Credit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        {{-- Purchase Inv Total Amount  --}}
                                        @php
                                            $total_amount_USD = [];
                                        @endphp
                                        @foreach ($purchase_order->purchase_items_table as $key => $purchase_item)
                                            @php
                                                $qty = $purchase_item->qty ?? 0;
                                                $cif_usd = $purchase_item->cif_usd ?? 0;
                                                $amount_usd = $qty * $cif_usd;
                                                $total_amount_USD[] = $amount_usd;
                                            @endphp
                                        @endforeach
                                        @php
                                            $total_amount_USD = array_sum($total_amount_USD);
                                            $totalCredit = $total_amount_USD - $CashBookDebitTotal;
                                            echo number_format($totalCredit, 2);
                                            $CreditTotal[] = $totalCredit;
                                        @endphp
                                    </td>

                                    {{-- Balance Debit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $BalanceDebit = $total_amount_USD - $CashBookDebitTotal;
                                            if ($BalanceDebit < 0) {
                                                echo number_format($BalanceDebit, 2);
                                                $BalanceDebitTotal[] = $BalanceDebit;
                                            }
                                        @endphp
                                    </td>

                                    {{-- Balance Credit --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            if ($BalanceDebit > 0) {
                                                echo number_format($BalanceDebit, 2);
                                                $BalanceCreditTotal[] = $BalanceDebit;
                                            }
                                        @endphp
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3">Total:</td>
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
