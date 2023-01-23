@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            HP Sales Invoices
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <a href="#" class="dt-button create-new btn btn-success btn-sm"
                                onclick="alert('Build in progress')">
                                <span>
                                    <i class="bx bx-file me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">
                                        Excel
                                    </span>
                                </span>
                            </a>

                            @can('hp_sales_invoice_create')
                                <a href="{{ route('hp_sales_invoices.create') }}"
                                    class="dt-button create-new btn btn-primary btn-sm">
                                    <span>
                                        <i class="bx bx-plus me-sm-2"></i>
                                        <span class="d-none d-sm-inline-block">Create</span>
                                    </span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <table class="table table-bordered main-table py-5" style="margin-bottom: 1px !important;"
                        id="tbl_exporttable_to_xls">
                        <thead class="tbbg">

                            <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                No.
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                HP Customer Name
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Dealer
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Purchase Date
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Invoice
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Year
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Model
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Vehicle Type
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Chassis No.
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Sale Price
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Downpayment
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                HP Principle
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Received
                            </th>
                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Receivable
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                HP Interest
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Received
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Receivable
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Balance
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Total Sale
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Down Percentage
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Balance
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                A/C Opening
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Document Fee
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Stamp Duty
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Insurance
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Commission
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Service Charges
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                HP Service Fee
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                HP Invoice Price
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Total Received
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Actions
                            </th>

                        </thead>
                        <tbody class="table-border-bottom-0 row_position" id="tablecontents">
                            @foreach ($sales_invoices as $key => $sales_invoice)
                                <tr style="background-color: white;">
                                    <td class="sticky-col first-col">
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->customers_table->name ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->customers_table->customers_table->name ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->invoice_date }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->invoice_no }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->hp_sales_sales_items_table->products_table->model_year ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->hp_sales_sales_items_table->products_table->product ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->hp_sales_sales_items_table->products_table->type ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sales_invoice->hp_sales_sales_items_table->products_table->chessi_no ?? '' }}
                                    </td>

                                    {{-- Sale Price --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $sale_price = $sales_invoice->sales_invoices_payments_table->total_amount ?? 0;
                                            echo number_format($sale_price, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Downpayment --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $hp_total_downpayment = $sales_invoice->sales_invoices_payments_table->hp_loan_amount ?? 0;
                                            echo number_format($hp_total_downpayment, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- HP Principle --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_principle = $sales_invoice->sales_invoices_payments_table->total_principle ?? 0;
                                            echo number_format($total_principle, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Principle Receice --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalReceivePrinciple = [];
                                        @endphp
                                        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                            @if ($cash_books->principle_interest == 'Principle')
                                                @php
                                                    $cash_book_cash_in = $cash_books->cash_in;
                                                    $cash_book_bank_in = $cash_books->bank_in;
                                                    $BankCashInTotal = $cash_book_cash_in + $cash_book_bank_in;
                                                    $TotalReceivePrinciple[] = $BankCashInTotal;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            $TotalReceivePrinciple = array_sum($TotalReceivePrinciple);
                                            echo number_format($TotalReceivePrinciple, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Principle Balance --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_hp_principle = $sales_invoice->sales_invoices_payments_table->total_principle ?? 0;
                                            $PrincipleBalance = $total_hp_principle - $TotalReceivePrinciple;
                                            echo number_format($PrincipleBalance, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- HP Interest --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_hp_interest = $sales_invoice->sales_invoices_payments_table->total_interest ?? 0;
                                            echo number_format($total_hp_interest, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Interest Receice --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalReceiveInterest = [];
                                        @endphp
                                        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
                                            @if ($cash_books->principle_interest == 'Interest')
                                                @php
                                                    $cash_book_cash_in = $cash_books->cash_in;
                                                    $cash_book_bank_in = $cash_books->bank_in;
                                                    $BankCashInTotal = $cash_book_cash_in + $cash_book_bank_in;
                                                    $TotalReceiveInterest[] = $BankCashInTotal;
                                                @endphp
                                            @endif
                                        @endforeach
                                        @php
                                            $TotalReceiveInterest = array_sum($TotalReceiveInterest);
                                            echo number_format($TotalReceiveInterest, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Interest Balance --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalInterestBalance = $total_hp_interest - $TotalReceiveInterest;
                                            echo number_format($TotalInterestBalance, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Balance --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalBalance = $PrincipleBalance + $TotalInterestBalance;
                                            echo number_format($TotalBalance, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Total Sale --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $TotalSale = $hp_total_downpayment + $total_principle + $total_hp_interest;
                                            echo number_format($TotalSale, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Down Percentage --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $hp_loan_percentage = $sales_invoice->sales_invoices_payments_table->hp_loan_percentage ?? 0;
                                            echo 100 - $hp_loan_percentage;
                                            echo '%';
                                        @endphp
                                    </td>

                                    {{-- Balance --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $HpBalance = $TotalSale - $TotalInterestBalance;
                                            echo number_format($HpBalance, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- A/C Opening --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $hp_account_opening = $sales_invoice->sales_invoices_payments_table->hp_account_opening ?? 0;
                                            echo number_format($hp_account_opening, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Document Fee --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $hp_document_fees = $sales_invoice->sales_invoices_payments_table->hp_document_fees ?? 0;
                                            echo number_format($hp_document_fees, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Stamp Duty --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $hp_stamp_duty_amount = $sales_invoice->sales_invoices_payments_table->hp_stamp_duty_amount ?? 0;
                                            echo number_format($hp_stamp_duty_amount, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Insurance --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $hp_insurance_amount = $sales_invoice->sales_invoices_payments_table->hp_insurance_amount ?? 0;
                                            echo number_format($hp_insurance_amount, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Commission --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $hp_commission = $sales_invoice->sales_invoices_payments_table->hp_commission ?? 0;
                                            echo number_format($hp_commission, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Service Charges --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $hp_service_charges_amount = $sales_invoice->sales_invoices_payments_table->hp_service_charges_amount ?? 0;
                                            echo number_format($hp_service_charges_amount, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- HP Service Fee --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $hp_total_services_fees = $sales_invoice->sales_invoices_payments_table->hp_total_services_fees ?? 0;
                                            echo number_format($hp_total_services_fees, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- HP Invoice Price --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $HPInvoicePrice = $hp_total_downpayment + $total_principle + $total_hp_interest + $hp_total_services_fees;
                                            echo number_format($HPInvoicePrice, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Total Received --}}
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $HPTotalReceived = $hp_total_downpayment + $TotalReceivePrinciple + $TotalReceiveInterest + $hp_total_services_fees;
                                            echo number_format($HPTotalReceived, session('decimal'));
                                        @endphp
                                    </td>

                                    {{-- Actions --}}
                                    <td>
                                        <div class="demo-inline-spacing">
                                            <div class="btn-group">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('hp_invoice_view', $sales_invoice->id) }}"
                                                            target="_blank">
                                                            Invoice
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('hp_sales_invoices.show', $sales_invoice->id) }}">
                                                            Payment Table
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('hp_sales_invoices.edit', $sales_invoice->id) }}">
                                                            Edit
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
