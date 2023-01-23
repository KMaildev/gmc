@extends('layouts.menus.accounting')
@section('content')
    <style>
        .none-border {
            border-style: none;
        }
    </style>
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            HP Sales Invoice
                        </h5>
                    </div>

                    <div class="col-md-4 col-sm-12 col-lg-4">
                        <table style="width:100%">
                            <tr>
                                <th style="color: red;">
                                    Customer Name
                                </th>
                                <th colspan="2" style="text-align: center; color: red;">
                                    {{ $sales_invoice->customers_table->name ?? '' }}
                                </th>
                            </tr>
                            <tr>
                                <th style="color: red;">
                                    Brand Name
                                </th>
                                <th colspan="2" style="text-align: center; color: red;">
                                    {{ $sales_invoice->hp_sales_sales_items_table->products_table->brand_name ?? '' }}
                                    {{ $sales_invoice->hp_sales_sales_items_table->products_table->product ?? '' }}
                                </th>
                            </tr>
                            <tr>
                                <th style="color: red;">
                                    Sale Price
                                </th>
                                <th style="text-align: center">
                                    100%
                                </th>
                                <th style="text-align: right; color: red;">
                                    @php
                                        $sale_price = $sales_invoice->sales_invoices_payments_table->total_amount ?? 0;
                                        echo number_format($sale_price, 2);
                                    @endphp
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Loan
                                </th>
                                <th style="text-align: center; color: red;">
                                    @php
                                        $hp_loan_percentage = $sales_invoice->sales_invoices_payments_table->hp_loan_percentage ?? 0;
                                        echo $hp_loan_percentage;
                                        echo '%';
                                    @endphp
                                </th>
                                <th style="text-align: right">
                                    @php
                                        $hp_loan_amount = $sales_invoice->sales_invoices_payments_table->hp_loan_amount ?? 0;
                                        echo number_format($hp_loan_amount, 2);
                                    @endphp
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Downpayment
                                </th>
                                <th style="text-align: center">
                                    @php
                                        $hp_loan_percentage = $sales_invoice->sales_invoices_payments_table->hp_loan_percentage ?? 0;
                                        echo 100 - $hp_loan_percentage;
                                        echo '%';
                                    @endphp
                                </th>
                                <th style="text-align: right">
                                    @php
                                        $hp_loan_amount = $sales_invoice->sales_invoices_payments_table->hp_loan_amount ?? 0;
                                        $downpayment_amount = $sale_price - $hp_loan_amount;
                                        echo number_format($downpayment_amount, 2);
                                    @endphp
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Interest Rate
                                </th>

                                <th colspan="2" style="text-align: center">
                                    {{ $sales_invoice->sales_invoices_payments_table->hp_interest_rate_percentage ?? '' }}
                                    %
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Commission Fees
                                </th>
                                <th colspan="2" style="text-align: center">
                                    @php
                                        $hp_commission_fees = $sales_invoice->sales_invoices_payments_table->hp_commission_fees ?? 0;
                                        echo number_format($hp_commission_fees, 2);
                                    @endphp
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Tenor
                                </th>
                                <th colspan="2" style="text-align: center">
                                    @php
                                        $hp_tenor = $sales_invoice->sales_invoices_payments_table->hp_tenor ?? 0;
                                        echo $hp_tenor;
                                    @endphp
                                    Months (Monthly)
                                </th>
                            </tr>
                        </table>
                        <br><br>

                        <table style="width:100%;">
                            <tr>
                                <th class="none-border">
                                    A/C Opening
                                </th>
                                <th colspan="2" style="text-align: right" class="none-border">
                                    @php
                                        $hp_account_opening = $sales_invoice->sales_invoices_payments_table->hp_account_opening ?? 0;
                                        echo number_format($hp_account_opening, 2);
                                    @endphp
                                </th>
                            </tr>
                            <tr>
                                <th class="none-border">
                                    Document Fees
                                </th>
                                <th colspan="2" style="text-align: right" class="none-border">
                                    @php
                                        $hp_document_fees = $sales_invoice->sales_invoices_payments_table->hp_document_fees ?? 0;
                                        echo number_format($hp_document_fees, 2);
                                    @endphp
                                </th>
                            </tr>
                            <tr>
                                <th class="none-border">
                                    Stamp Duty
                                </th>
                                <th colspan="2" style="text-align: right" class="none-border">
                                    @php
                                        $hp_stamp_duty = $sales_invoice->sales_invoices_payments_table->hp_stamp_duty_amount ?? 0;
                                        echo number_format($hp_stamp_duty, 2);
                                    @endphp
                                </th>
                            </tr>
                            <tr>
                                <th class="none-border">
                                    Downpayment
                                </th>
                                <th colspan="2" style="text-align: right" class="none-border">
                                    @php
                                        echo number_format($downpayment_amount, 2);
                                    @endphp
                                </th>
                            </tr>
                            <tr>
                                <th class="none-border">
                                    Insurance
                                </th>
                                <th colspan="2" style="text-align: right" class="none-border">
                                    @php
                                        $hp_insurance = $sales_invoice->sales_invoices_payments_table->hp_insurance_amount ?? 0;
                                        echo number_format($hp_insurance, 2);
                                    @endphp
                                </th>
                            </tr>
                            <tr>
                                <th class="none-border">
                                    Commission
                                </th>
                                <th colspan="2" style="text-align: right" class="none-border">
                                    @php
                                        $hp_commission = $sales_invoice->sales_invoices_payments_table->hp_commission ?? 0;
                                        echo number_format($hp_commission, 2);
                                    @endphp
                                </th>
                            </tr>
                            <tr>
                                <th class="none-border">
                                    Service Charges
                                </th>
                                <th colspan="2" style="text-align: right" class="none-border">
                                    @php
                                        $hp_service_charges = $sales_invoice->sales_invoices_payments_table->hp_service_charges_amount ?? 0;
                                        echo number_format($hp_service_charges, 2);
                                    @endphp
                                </th>
                            </tr>
                            <tr>
                                <th class="none-border">
                                    Total Downpayment
                                </th>
                                <th colspan="2"
                                    style="text-align: right; border-bottom: double; border-top: 2px solid #677788;"
                                    class="none-border">
                                    @php
                                        $hp_total_downpayment = $sales_invoice->sales_invoices_payments_table->hp_total_downpayment ?? 0;
                                        echo number_format($hp_total_downpayment, 2);
                                    @endphp
                                </th>
                            </tr>
                        </table>

                        <br>
                        <table style="width:100%;">
                            <tr>
                                <th class="none-border">
                                    Monthly Payment (Principle + Interest )
                                </th>
                                <th colspan="2" style="text-align: right; color: red;" class="none-border">
                                    @php
                                        $hp_monthly_payment = $sales_invoice->sales_invoices_payments_table->hp_monthly_payment ?? 0;
                                        echo number_format($hp_monthly_payment, 2);
                                    @endphp
                                </th>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-12 col-sm-12 col-lg-12 py-5">
                        <div class="row">
                            <span style="font-weight: bold">
                                ({{ $sales_invoice->payment_team ?? '' }})
                            </span>
                            <table style="width: 50%">
                                <tr>
                                    <th style="width: 2%; text-align: center;">
                                        Sr
                                    </th>
                                    <th style="width: 10%; text-align: center;">
                                        Due Date
                                    </th>
                                    <th style="width: 10%; text-align: center;">
                                        Principle
                                    </th>
                                    <th style="width: 10%; text-align: center;">
                                        Interest
                                    </th>
                                    <th style="width: 10%; text-align: center;">
                                        Total
                                    </th>
                                    <th style="width: 10%; text-align: center;">
                                        HP Balance
                                    </th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="width: 10%; text-align: right;">
                                        @php
                                            echo number_format($hp_loan_amount, 2);
                                        @endphp
                                    </td>
                                </tr>
                                @php
                                    // Repayment Due Date
                                    function addMonths($date, $months)
                                    {
                                        $orig_day = $date->format('d');
                                        $date->modify('+' . $months . ' months');
                                        while ($date->format('d') < $orig_day && $date->format('d') < 5) {
                                            $date->modify('-1 day');
                                        }
                                    }
                                    
                                    $number_of_month = $sales_invoice->sales_invoices_payments_table->hp_tenor ?? 0;
                                    $start_date = $sales_invoice->invoice_date;
                                    $interest_rate = $sales_invoice->sales_invoices_payments_table->hp_interest_rate_percentage ?? 0;
                                    $balance = $sales_invoice->sales_invoices_payments_table->hp_loan_amount ?? 0;
                                    $monthly_payment = $sales_invoice->sales_invoices_payments_table->hp_monthly_payment ?? 0;
                                    
                                    // Total
                                    $TotalPrincipal = [];
                                    $TotalInterest = [];
                                @endphp
                                @for ($month = 0; $month < $number_of_month; $month++)
                                    @php
                                        $interest = ($balance * $interest_rate) / 1200;
                                        $principal = $monthly_payment - $interest;
                                        $balance -= $principal;
                                        
                                        // Total
                                        $TotalPrincipal[] = $principal;
                                        $TotalInterest[] = $interest;
                                        $Total = [];
                                    @endphp
                                    <tr>
                                        <td style="text-align: center">
                                            @php
                                                echo $month + 1;
                                            @endphp
                                        </td>

                                        <td style="text-align: center">
                                            @php
                                                $d = new DateTime($start_date);
                                                addmonths($d, $month);
                                                echo $d->format('Y-m-d');
                                            @endphp
                                        </td>

                                        <td style="text-align: right">
                                            @php
                                                echo number_format($principal, 2);
                                            @endphp
                                        </td>

                                        <td style="text-align: right">
                                            @php
                                                echo number_format($interest, 2);
                                            @endphp
                                        </td>

                                        <td style="text-align: right">
                                            @php
                                                $total = $principal + $interest;
                                                echo number_format($total, 2);
                                                $Total[] = $total;
                                            @endphp
                                        </td>

                                        <td style="text-align: right">
                                            @php
                                                echo number_format($balance, 2);
                                            @endphp
                                        </td>
                                    </tr>
                                @endfor
                                <tr>
                                    <td colspan="2">
                                        Total
                                    </td>

                                    {{-- Principle --}}
                                    <td style="text-align: right">
                                        @php
                                            $TotalPrincipal = array_sum($TotalPrincipal);
                                            echo number_format($TotalPrincipal, 2);
                                        @endphp
                                    </td>

                                    {{-- Interest --}}
                                    <td style="text-align: right">
                                        @php
                                            $TotalInterest = array_sum($TotalInterest);
                                            echo number_format($TotalInterest, 2);
                                        @endphp
                                    </td>

                                    {{-- Total --}}
                                    <td style="text-align: right">
                                        @php
                                            $Total = array_sum($Total);
                                            echo number_format($Total, 2);
                                        @endphp
                                    </td>

                                    <td></td>
                                </tr>
                            </table>


                            {{-- Recieve Date --}}
                            <table style="width: 7%;">
                                <thead>
                                    <tr>
                                        <th style="width: 10%; text-align: center;">
                                            Recieve Date
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                        @php
                                            if ($cash_books->principle_interest == 'Interest') {
                                                continue;
                                            }
                                        @endphp
                                        <tr>
                                            <td style="text-align: center">
                                                @if ($cash_books->principle_interest == 'Principle')
                                                    {{ $cash_books->cash_book_date ?? '' }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </thead>
                                <tbody></tbody>
                            </table>

                            {{-- Principle --}}
                            <table style="width: 10%;">
                                <thead>
                                    <tr>
                                        <th style="width: 10%; text-align: center;">
                                            Principle
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                        @php
                                            if ($cash_books->principle_interest == 'Interest') {
                                                continue;
                                            }
                                            $cash_book_cash_in = $cash_books->cash_in;
                                            $cash_book_bank_in = $cash_books->bank_in;
                                            $TotalBankCash = $cash_book_cash_in + $cash_book_bank_in;
                                        @endphp
                                        <tr>
                                            <td style="text-align: right">
                                                @if ($cash_books->principle_interest == 'Principle')
                                                    {{ number_format($TotalBankCash ?? 0, 2) }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </thead>
                                <tbody></tbody>
                            </table>

                            {{-- Interest --}}
                            <table style="width: 10%;">
                                <thead>
                                    <tr>
                                        <th style="width: 10%; text-align: center;">
                                            Interest
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                        @php
                                            if ($cash_books->principle_interest == 'Principle') {
                                                continue;
                                            }
                                            $cash_book_cash_in = $cash_books->cash_in;
                                            $cash_book_bank_in = $cash_books->bank_in;
                                            $TotalBankCash = $cash_book_cash_in + $cash_book_bank_in;
                                        @endphp
                                        <tr>
                                            <td style="text-align: right">
                                                @if ($cash_books->principle_interest == 'Interest')
                                                    {{ number_format($TotalBankCash ?? 0, 2) }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </thead>
                                <tbody></tbody>
                            </table>

                            {{-- Total --}}
                            <table style="width: 10%;">
                                <thead>
                                    <tr>
                                        <th style="width: 10%; text-align: center;">
                                            Total
                                        </th>
                                        <th style="width: 5%; font-size: 9px; text-align: center;">
                                            Principle Balance
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><br></td>
                                        <td><br></td>
                                    </tr>
                                    @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                        @php
                                            $cash_book_cash_in = $cash_books->cash_in;
                                            $cash_book_bank_in = $cash_books->bank_in;
                                            $TotalBankCash = $cash_book_cash_in + $cash_book_bank_in;
                                        @endphp
                                        <tr>
                                            @if ($cash_books->principle_interest == 'Principle')
                                                @php
                                                    $PrincipleTotal = $TotalBankCash ?? 0;
                                                @endphp
                                            @endif

                                            @if ($cash_books->principle_interest == 'Interest')
                                                @php
                                                    $InterestTotal = $TotalBankCash ?? 0;
                                                @endphp
                                            @endif

                                            @if ($cash_books->principle_interest == 'Interest')
                                                <td style="text-align: right">
                                                    @php
                                                        $TotalPrinciple = $PrincipleTotal ?? 0;
                                                        $TotalInterest = $InterestTotal ?? 0;
                                                        $TotalPrincipleInterest = $TotalPrinciple + $TotalInterest;
                                                        echo number_format($TotalPrincipleInterest, 2);
                                                    @endphp
                                                </td>

                                                <td>
                                                    100000000
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
