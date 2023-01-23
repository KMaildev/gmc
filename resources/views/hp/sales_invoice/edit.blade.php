@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
            <form action="{{ route('hp_sales_invoices.update', $sales_invoice->id) }}" method="POST" autocomplete="off"
                id="edit-form">
                @csrf
                @method('PUT')

                <input type="hidden" value="{{ $sales_invoices_payment->id }}" name="sales_invoices_payment_id">
                <input type="hidden" name="customer_id" value="{{ $sales_invoice->customers_table->id ?? 0 }}" required>

                <div class="card invoice-preview-card">
                    <div class="card-body">

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">

                                    <input type="hidden" value="hp" name="dealer_or_hp">

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            Name
                                        </label>
                                        <div class="col-sm-9">

                                            <input type="text" class="form-control form-control-sm" name="name"
                                                value="{{ $sales_invoice->customers_table->name ?? '' }}">
                                        </div>
                                    </div>


                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            Dealer
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="dealer_customer_id">
                                                <option value="">--Please Select Customer --</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}"
                                                        @if ($customer->id == $sales_invoice->customers_table->dealer_customer_id ?? 0) selected @endif>
                                                        {{ $customer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">ID NO</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('id_no') is-invalid @enderror"
                                                value="{{ $sales_invoice->customers_table->id_no ?? '' }}" name="id_no">
                                            @error('id_no')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Address"
                                                name="address" value="{{ $sales_invoice->customers_table->address ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">PH</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Ph"
                                                name="phone" value="{{ $sales_invoice->customers_table->phone ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            E-Mail Address
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Email"
                                                name="email" value="{{ $sales_invoice->customers_table->email ?? '' }}">
                                        </div>
                                    </div>

                                </dl>
                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Invoice No</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('invoice_no') is-invalid @enderror"
                                                value="{{ $sales_invoice->invoice_no ?? '' }}" name="invoice_no">
                                            @error('invoice_no')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('invoice_date') is-invalid @enderror"
                                                value="{{ $sales_invoice->invoice_date ?? '' }}" name="invoice_date">
                                            @error('invoice_date')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Showroom Name
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('showroom_name') is-invalid @enderror"
                                                value="{{ $sales_invoice->showroom_name ?? '' }}" name="showroom_name">
                                            @error('showroom_name')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Dealer Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="DealerCode"
                                                value="{{ $sales_invoice->customers_table->dealer_code ?? '' }}">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Sales Type</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('sales_type') is-invalid @enderror"
                                                value="{{ $sales_invoice->sales_type ?? '' }}" name="sales_type">
                                            @error('sales_type')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Payment Term</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('payment_team') is-invalid @enderror"
                                                value="{{ $sales_invoice->payment_team ?? '' }}" name="payment_team">
                                            @error('payment_team')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            Post Ref.
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('post_ref') is-invalid @enderror"
                                                value="{{ $sales_invoice->post_ref ?? '' }}" name="post_ref">
                                            @error('post_ref')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <hr class="mx-n4" />

                        <div class="row">
                            <table class="table table-bordered table-sm">
                                <thead class="tbbg">
                                    <tr>
                                        <th style="color: white; text-align: center; width: 1%;">Sr.No</th>
                                        <th style="color: white; text-align: center;">Model</th>
                                        <th style="color: white; text-align: center;">Chassis No.& Vehicle No.</th>
                                        <th style="color: white; text-align: center;">Description</th>
                                        <th style="color: white; text-align: center;">Qty</th>
                                        <th style="color: white; text-align: center;">Price</th>
                                        <th style="color: white; text-align: center;">Amount (MMK)</th>
                                        <th style="color: white; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tr>

                                    <td></td>

                                    {{-- Model --}}
                                    <td>
                                        <input type="text" class="form-control" id="Model">
                                    </td>

                                    {{-- Chassis No.& Vehicle No --}}
                                    <td>
                                        <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                            id="ChessiNO">
                                            <option value="">--Select Chassis No --</option>
                                            @foreach ($products as $product)
                                                @php
                                                    $sales_items = $product->sales_items_table->product_id ?? 0;
                                                @endphp
                                                @if ($sales_items != $product->id)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->chessi_no }}
                                                    </option>
                                                @endif
                                                @php
                                                    $sales_return_items = $product->sales_return_items_table->products_table ?? '';
                                                @endphp
                                                @if ($sales_return_items)
                                                    <option value="{{ $sales_return_items->id }}">
                                                        {{ $sales_return_items->chessi_no }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('chessi_no')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </td>

                                    {{-- Description --}}
                                    <td>
                                        <input type="text" class="form-control" id="Description">
                                    </td>

                                    {{-- Qty --}}
                                    <td>
                                        <input type="text" class="form-control" required id="Qty"
                                            oninput="SetCalculator()" />
                                    </td>

                                    {{-- Price --}}
                                    <td>
                                        <input type="text" class="form-control" id="UnitPrice"
                                            oninput="SetCalculator()">
                                    </td>

                                    {{-- Amount --}}
                                    <td>
                                        <input type="text" class="form-control" id="TotalAmount">
                                    </td>

                                    <td>
                                        <input type="button" value="Add" class="btn btn-sm btn-primary"
                                            onclick="setSaleInvoiceCart()">
                                    </td>
                                </tr>

                                <tbody id="TemporarySalesItemsList"></tbody>

                                @php
                                    $amount_total = [];
                                @endphp
                                @foreach ($sales_items_edits as $item => $sales_items_edit)
                                    <tr>
                                        <td>
                                            {{ $item + 1 }}
                                        </td>
                                        <td>
                                            {{ $sales_items_edit->products_table->model_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sales_items_edit->products_table->chessi_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $sales_items_edit->description ?? '' }}
                                        </td>
                                        <td style="text-align: right; font-weight: bold;">
                                            {{ $sales_items_edit->qty ?? 0 }}
                                        </td>
                                        <td style="text-align: right; font-weight: bold;">
                                            {{ number_format($sales_items_edit->unit_price, 2) }}
                                        </td>
                                        <td style="text-align: right; font-weight: bold;">
                                            @php
                                                $item_total_amount = $sales_items_edit->qty * $sales_items_edit->unit_price ?? 0;
                                                echo number_format($item_total_amount, 2);
                                                $amount_total[] = $item_total_amount;
                                            @endphp
                                        </td>

                                        <td>
                                            <a href="{{ route('sales_items_remove', $sales_items_edit->id) }}"
                                                class="">
                                                Remove
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Sales Person</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="sales_persons_id">
                                                <option value="">-- Select Sales Person --</option>
                                                @foreach ($sales_persons as $sales_person)
                                                    <option value="{{ $sales_person->id }}"
                                                        @if ($sales_person->id == $sales_invoice->sales_persons_id) selected @endif>
                                                        {{ $sales_person->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('sales_persons_id')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            Delivery Date
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('delivery_date') is-invalid @enderror"
                                                value="{{ $sales_invoice_edit->delivery_date ?? '' }}"
                                                name="delivery_date">
                                            @error('delivery_date')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>


                                </dl>
                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">

                                    {{-- Sale Price --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Sale Price
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                @php
                                                    $EditTotalAmountValue = array_sum($amount_total);
                                                @endphp

                                                <input type="hidden" id="EditTotalAmount"
                                                    value="{{ $EditTotalAmountValue }}">

                                                <input type="text" class="form-control form-control-sm"
                                                    style="text-align: right;" id="totalAmountShow">

                                                <input type="hidden" name="total_amount" id="totalAmountSave">

                                                @error('total_amount')
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror

                                                <span class="input-group-text sm btn btn-primary"
                                                    onclick="CalculatePaymentMethod()">
                                                    Calc
                                                </span>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- Loan --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Loan
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('hp_loan_percentage') is-invalid @enderror"
                                                    style="text-align:right;" name="hp_loan_percentage"
                                                    id="HpLoanPercentage" oninput="CalculatePaymentMethod()"
                                                    value="{{ $sales_invoices_payment->hp_loan_percentage ?? 0 }}">

                                                <span class="input-group-text sm">%</span>

                                                <input type="text" class="form-control form-control-sm"
                                                    style="text-align:right;" id="HpLoanAmount" name="hp_loan_amount"
                                                    value="{{ old('hp_loan_amount') }}">
                                            </div>
                                            @error('hp_loan_percentage')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Downpayment --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Downpayment
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('hp_downpayment_percentage') is-invalid @enderror"
                                                    style="text-align:right;" id="HpDownpaymentPercentage"
                                                    name="hp_downpayment_percentage"
                                                    value="{{ old('hp_downpayment_percentage') }}" readonly>

                                                <span class="input-group-text sm">%</span>

                                                <input type="text" class="form-control form-control-sm"
                                                    style="text-align:right;" id="HpDownpaymentAmount" readonly>

                                                @error('hp_downpayment_percentage')
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Interest Rate --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Interest Rate
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('hp_interest_rate_percentage') is-invalid @enderror"
                                                    name="hp_interest_rate_percentage" id="HpInterestRatePercentage"
                                                    style="text-align:right;" oninput="CalculatePaymentMethod()"
                                                    name="hp_interest_rate_percentage"
                                                    value="{{ $sales_invoices_payment->hp_interest_rate_percentage ?? 0 }}" />
                                                <span class="input-group-text sm">%</span>
                                            </div>
                                            @error('hp_interest_rate_percentage')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Tenor --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Tenor
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('hp_tenor') is-invalid @enderror"
                                                    name="hp_tenor" id="Tenor" style="text-align:right;"
                                                    value="{{ $sales_invoices_payment->hp_tenor ?? 0 }}"
                                                    oninput="CalculatePaymentMethod()" name="hp_tenor"
                                                    value="{{ old('hp_tenor') }}" />
                                                <span class="input-group-text sm">Months</span>
                                            </div>
                                            @error('hp_tenor')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- A/C Opening --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            A/C Opening
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control form-control-sm @error('hp_account_opening') is-invalid @enderror"
                                                style="text-align:right;" name="hp_account_opening" id="AccountOpening"
                                                oninput="CalculatePaymentMethod()"
                                                value="{{ $sales_invoices_payment->hp_account_opening ?? 0 }}" />
                                            @error('hp_account_opening')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Document Fees --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Document Fees
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control form-control-sm @error('hp_document_fees') is-invalid @enderror"
                                                style="text-align:right;" name="hp_document_fees" id="DocumentFees"
                                                oninput="CalculatePaymentMethod()"
                                                value="{{ $sales_invoices_payment->hp_document_fees ?? 0 }}" />
                                            @error('hp_document_fees')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Downpayment --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Downpayment
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control form-control-sm @error('hp_downpayment') is-invalid @enderror"
                                                style="text-align:right;" id="AnotherDownpaymentAmount">
                                        </div>
                                    </div>

                                    {{-- Stamp Duty --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Stamp Duty
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('hp_stamp_duty') is-invalid @enderror"
                                                    style="text-align:right;" name="hp_stamp_duty" id="StampDuty"
                                                    oninput="CalculatePaymentMethod()"
                                                    value="{{ $sales_invoices_payment->hp_stamp_duty ?? 0 }}" />

                                                @error('hp_downpayment_percentage')
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror

                                                <span class="input-group-text sm">%</span>
                                                <input type="text" class="form-control form-control-sm"
                                                    style="text-align:right;" id="StampDutyAmount"
                                                    name="hp_stamp_duty_amount" readonly>
                                                @error('hp_stamp_duty_amount')
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Insurance --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Insurance
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('hp_insurance') is-invalid @enderror"
                                                    style="text-align:right;" name="hp_insurance" id="Insurance"
                                                    oninput="CalculatePaymentMethod()" name="hp_insurance"
                                                    value="{{ $sales_invoices_payment->hp_insurance ?? 0 }}" />
                                                @error('hp_insurance')
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror
                                                <span class="input-group-text sm">%</span>
                                                <input type="text" class="form-control form-control-sm"
                                                    style="text-align:right;" id="HpInsuranceAmount"
                                                    name="hp_insurance_amount" readonly>
                                                @error('hp_insurance_amount')
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Commission Fees --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Commission Fees
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('hp_commission_fees') is-invalid @enderror"
                                                    name="hp_commission_fees" id="HpCommissionFees"
                                                    style="text-align:right;" name="hp_commission_fees"
                                                    value="{{ $sales_invoices_payment->hp_commission_fees ?? 0 }}"
                                                    oninput="CalculatePaymentMethod()" />

                                                <span class="input-group-text sm">%</span>

                                                <input type="text"
                                                    class="form-control form-control-sm @error('hp_commission') is-invalid @enderror"
                                                    style="text-align:right;" name="hp_commission" id="Commission"
                                                    value="{{ old('hp_commission') }}" readonly />
                                            </div>
                                            @error('hp_commission_fees')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Service Charges --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Service Charges
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('hp_service_charges') is-invalid @enderror"
                                                    style="text-align:right;" name="hp_service_charges"
                                                    id="ServiceCharges" oninput="CalculatePaymentMethod()"
                                                    value="{{ $sales_invoices_payment->hp_service_charges ?? 0 }}" />

                                                @error('hp_service_charges')
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror
                                                <span class="input-group-text sm">%</span>

                                                <input type="text"
                                                    class="form-control form-control-sm @error('hp_service_charges_amount') is-invalid @enderror"
                                                    style="text-align:right;" name="hp_service_charges_amount"
                                                    id="HpServiceChargesAmount"
                                                    value="{{ old('hp_service_charges_amount') }}" readonly />
                                            </div>
                                            @error('hp_service_charges_amount')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Total Services Fees --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Total Services Fees
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control form-control-sm @error('hp_total_services_fees') is-invalid @enderror"
                                                style="text-align:right;" name="hp_total_services_fees"
                                                id="TotalServicesFees" value="{{ old('hp_total_services_fees') }}">
                                            @error('hp_total_services_fees')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Total Downpayment --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Total Downpayment
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control form-control-sm @error('hp_total_downpayment') is-invalid @enderror"
                                                style="text-align:right;" name="hp_total_downpayment"
                                                id="TotalDownpayment" value="{{ old('hp_total_downpayment') }}">
                                            @error('hp_total_downpayment')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Monthly Payment (Principle + Interest ) --}}
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Monthly Payment (Principle + Interest )
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control form-control-sm @error('hp_monthly_payment') is-invalid @enderror"
                                                style="text-align:right;" name="hp_monthly_payment"
                                                id="MonthlyPaymentValue" value="{{ old('hp_monthly_payment') }}">
                                            @error('hp_monthly_payment')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary" style='float: right;'>
                                                Save
                                            </button>
                                        </div>
                                    </div>

                                </dl>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var totalAmountShow = document.getElementById("totalAmountShow");

        // Loan
        function CalculatePaymentMethod() {
            var getTotalAmount = document.getElementById("totalAmountSave").value;
            var hpLoanPercentage = document.getElementById("HpLoanPercentage").value;
            var hpInterestRatePercentage = document.getElementById("HpInterestRatePercentage").value;

            var Laon = getTotalAmount / 100 * hpLoanPercentage;
            var hpDownpaymentPercentage = 100 - hpLoanPercentage;
            var hpDownpaymentAmount = getTotalAmount - Laon;
            document.getElementById("HpLoanAmount").value = Laon;
            document.getElementById("HpDownpaymentPercentage").value = hpDownpaymentPercentage;
            document.getElementById("HpDownpaymentAmount").value = hpDownpaymentAmount;
            document.getElementById("AnotherDownpaymentAmount").value = hpDownpaymentAmount;


            var HpInterestRatePercentage = document.getElementById("HpInterestRatePercentage").value;
            var Tenor = document.getElementById("Tenor").value;
            var r = (HpInterestRatePercentage / 100);
            var pmt = PMT(r / 12, Tenor, Laon);
            MonthlyPaymentValue.value = pmt.toFixed(2);


            // Clear 
            var AccountOpening = document.getElementById("AccountOpening").value;
            var DocumentFees = document.getElementById("DocumentFees").value;
            var StampDuty = document.getElementById("StampDuty").value;
            var Insurance = document.getElementById("Insurance").value;
            var HpCommissionFees = document.getElementById("HpCommissionFees").value;
            var ServiceCharges = document.getElementById("ServiceCharges").value;

            var StampDutyTotalAmount = Laon * StampDuty / 100;
            document.getElementById("StampDutyAmount").value = StampDutyTotalAmount;

            var HpInsuranceTotalAmount = getTotalAmount * Insurance / 100;
            document.getElementById("HpInsuranceAmount").value = HpInsuranceTotalAmount;

            var HpCommissionFeesAmount = Laon * HpCommissionFees / 100;
            document.getElementById("Commission").value = HpCommissionFeesAmount;

            var ServiceChargesAmount = Laon * ServiceCharges / 100;
            document.getElementById("HpServiceChargesAmount").value = ServiceChargesAmount;

            var HpTotalServicesFees = parseFloat(AccountOpening) + parseFloat(DocumentFees) + parseFloat(
                    StampDutyTotalAmount) + parseFloat(HpInsuranceTotalAmount) +
                parseFloat(HpCommissionFeesAmount) + parseFloat(ServiceChargesAmount);
            document.getElementById("TotalServicesFees").value = HpTotalServicesFees;

            var HPTotalDownpayment = parseFloat(AccountOpening) + parseFloat(DocumentFees) + parseFloat(
                    StampDutyTotalAmount) + parseFloat(HpInsuranceTotalAmount) +
                parseFloat(HpCommissionFeesAmount) + parseFloat(ServiceChargesAmount) + parseFloat(hpDownpaymentAmount);
            document.getElementById("TotalDownpayment").value = HPTotalDownpayment;
        }
        CalculatePaymentMethod();


        function PMT(ir, np, pv, fv = 0) {
            // ir: interest rate
            // np: number of payment
            // pv: present value or loan amount
            // fv: future value. default is 0
            var presentValueInterstFector = Math.pow((1 + ir), np);
            var pmt = ir * pv * (presentValueInterstFector + fv) / (presentValueInterstFector - 1);
            return pmt;
        }


        // Qty * Price
        function SetCalculator() {
            var Qty = document.getElementById("Qty").value;
            var UnitPrice = document.getElementById("UnitPrice").value;
            var AmountTotal = Qty * UnitPrice;
            TotalAmount.value = AmountTotal;
        }
        // SetCalculator()



        function SetCalculateDownPayment() {
            var getTotalAmount = document.getElementById("totalAmountSave").value;
            var TotalAmountValue = getTotalAmount;
            var DownPayment = document.getElementById("DownPayment").value;
            var DealerPercentage = document.getElementById("DealerPercentage").value;
            var DealerPercentageValue = TotalAmountValue / 100 * DealerPercentage;
            BalanceToPay.value = TotalAmountValue - DownPayment - DealerPercentageValue;
        }
        // SetCalculateDownPayment();

        function setSaleInvoiceCart() {
            var ChessiNO = document.getElementById("ChessiNO").value;
            var Qty = document.getElementById("Qty").value;
            var UnitPrice = document.getElementById("UnitPrice").value;
            var Description = document.getElementById("Description").value;

            if (ChessiNO == null || ChessiNO == "") {
                alert("Chassis No.& Vehicle No.");
                return false;
            } else if (Qty == null || Qty == "" || isNaN(Qty)) {
                alert("Enter Numeric value only.");
                return false;
            } else if (UnitPrice == null || UnitPrice == "" || isNaN(UnitPrice)) {
                alert("Enter Numeric value only.");
                return false;
            }

            var url = '{{ url('add_cart_temporary') }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    ChessiNO: ChessiNO,
                    Qty: Qty,
                    Price: UnitPrice,
                    Description: Description,
                },
                success: function(data) {
                    getTemporarySalesItems();
                },
                error: function(data) {}
            });
        }

        $('select[id="CustomerID"]').on('change', function() {
            var customerID = $(this).val();
            if (customerID) {
                $.ajax({
                    url: '/get_customer_ajax/' + customerID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        Address.value = data.address;
                        Ph.value = data.phone;
                        Email.value = data.email;
                        DealerCode.value = data.dealer_code;
                        getDealerCustomer(data.dealer_customer_id)
                    }
                });
            }
        });

        $('select[id="ChessiNO"]').on('change', function() {
            var ChessiNO = $(this).val();
            if (ChessiNO) {
                $.ajax({
                    url: '/get_products_ajax/' + ChessiNO,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        Model.value = data.product;
                    }
                });
            }
        });



        function getTemporarySalesItems() {
            var url = '{{ url('get_temporary_sales_items') }}';
            $.ajax({
                url: url,
                method: "GET",
                success: function(data) {
                    let sales_items = '';
                    var totalAmount = 0;
                    $.each(JSON.parse(data), function(key, value) {
                        totalAmount += value.qty * value.price;
                        let k = key + 1;
                        sales_items += '<tr>';
                        sales_items += '<td>' + k + '</td>' //Sr.No	


                        // Model 
                        sales_items += '<td>'
                        sales_items += value.products_table.model_no;
                        sales_items += '</td>'

                        // Chassis No.& Vehicle No
                        sales_items += '<td>'
                        sales_items += value.products_table.chessi_no;

                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][product_id]" value="' + value.products_table.id + '" required />'

                        sales_items += '</td>'

                        // Description
                        sales_items += '<td>'
                        sales_items += value.description;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][description]" value="' + value.description + '" required />'
                        sales_items += '</td>'

                        // Qty
                        sales_items += '<td>'
                        sales_items += value.qty;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][qty]" value="' + value.qty + '" required />'
                        sales_items += '</td>'

                        // Price	
                        sales_items += '<td>'
                        sales_items += value.price;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][price]" value="' + value.price + '" required />'
                        sales_items += '</td>'

                        // Amount
                        sales_items += '<td>'
                        sales_items += value.qty * value.price;
                        sales_items += '</td>'

                        // Action
                        sales_items += '<td>'
                        sales_items += '<a href="javascript:void(0);" class="remove_item" data-id="' +
                            value.id + '"> Remove</a>'
                        sales_items += '</td>'
                        sales_items += '</tr>';
                    });
                    $('#TemporarySalesItemsList').html(sales_items);
                    let EditOldTotalAmount = document.getElementById("EditTotalAmount").value;
                    let AllTotalAmount = totalAmount + Number(EditOldTotalAmount);
                    totalAmountShow.value = (AllTotalAmount).toLocaleString('en');
                    totalAmountSave.value = AllTotalAmount;
                }
            });
        }
        getTemporarySalesItems();


        // RemoveItem
        $(document).on("click", ".remove_item", function() {
            var id = $(this).data('id');
            $.ajax({
                url: `/temporary_sales_items_remove/${id}`,
                method: "GET",
                success: function(data) {
                    getTemporarySalesItems();
                }
            });
        });


        function getDealerCustomer(dealer_customer_id) {
            if (dealer_customer_id) {
                $.ajax({
                    url: '/get_dealer_customer_ajax/' + dealer_customer_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        Dealer.value = data.name;
                    }
                });
            }
        }
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\UpdateHpSalesInvoices', '#edit-form') !!}
@endsection
