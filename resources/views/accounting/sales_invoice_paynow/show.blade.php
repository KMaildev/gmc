@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
            <div class="col-md-12">
                <a href="{{ route('sales_invoices.index') }}" class="dt-button create-new btn btn-primary btn-sm">
                    <span>
                        <i class="fa fa-arrow-left me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">
                            Back
                        </span>
                    </span>
                </a>

                <a href="#" class="dt-button create-new btn btn-success btn-sm" onclick="alert('Build in progress')">
                    <span>
                        <i class="bx bx-file me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">
                            Excel
                        </span>
                    </span>
                </a>
                <hr>
            </div>
            <form action="{{ route('sale_pay_now.store') }}" method="POST" autocomplete="off" id="create-form">
                @csrf
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Name
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                id="CustomerID" name="customer_id" disabled>
                                                <option value="">--Please Select Customer --</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}"
                                                        @if ($customer->id == $sales_invoice_edit->customer_id) selected @endif>
                                                        {{ $customer->company_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('customer_id')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            ID NO
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('id_no') is-invalid @enderror"
                                                name="id_no" value="{{ $sales_invoice_edit->id_no }}" disabled>
                                            @error('id_no')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            Address
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Address"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            PH
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Ph"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            E-Mail Address
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Email"
                                                disabled>
                                        </div>
                                    </div>
                                </dl>
                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Invoice No
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('invoice_no') is-invalid @enderror"
                                                value="{{ $sales_invoice_edit->invoice_no }}" name="invoice_no" disabled>
                                            @error('invoice_no')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Date
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('invoice_date') is-invalid @enderror"
                                                value="{{ $sales_invoice_edit->invoice_date }}" name="invoice_date"
                                                disabled>
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
                                                value="{{ $sales_invoice_edit->showroom_name }}" name="showroom_name"
                                                disabled>
                                            @error('showroom_name')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Dealer Code
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="DealerCode"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Sales Type
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('sales_type') is-invalid @enderror"
                                                value="{{ $sales_invoice_edit->sales_type }}" name="sales_type" disabled>
                                            @error('sales_type')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Payment Team
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('payment_team') is-invalid @enderror"
                                                value="{{ $sales_invoice_edit->payment_team }}" name="payment_team"
                                                disabled>
                                            @error('payment_team')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <hr class="mx-n4" />


                        <div class="row">
                            <span style="font-weight: bold">
                                Items
                            </span>
                            <table class="table table-bordered table-sm">
                                <thead class="tbbg">
                                    <tr>
                                        <th style="color: white; text-align: center; width: 1%;">
                                            Sr.No
                                        </th>
                                        <th style="color: white; text-align: center;">
                                            Model
                                        </th>
                                        <th style="color: white; text-align: center;">
                                            Chassis No.& Vehicle No.
                                        </th>
                                        <th style="color: white; text-align: center;">
                                            Description
                                        </th>
                                        <th style="color: white; text-align: center;">
                                            Qty
                                        </th>
                                        <th style="color: white; text-align: center;">
                                            Price
                                        </th>
                                        <th style="color: white; text-align: center;">
                                            Amount (MMK)
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tr>
                                    <td colspan="6">
                                        Total:
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_amount_table = array_sum($amount_total);
                                            echo number_format($total_amount_table, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="row">
                            <span style="font-weight: bold">
                                Payment History
                            </span>
                            <table class="table table-bordered table-sm">
                                <thead class="tbbg">
                                    <tr>
                                        <th style="color: white; text-align: center; width: 1%;">
                                            Sr.No
                                        </th>
                                        <th style="color: white; text-align: center; widht: 7%;">
                                            Receive By
                                        </th>
                                        <th style="color: white; text-align: center; widht: 10%;">
                                            Remark
                                        </th>
                                        <th style="color: white; text-align: center; widht: 7%;">
                                            Received Date
                                        </th>
                                        <th style="color: white; text-align: center; widht: 10%;">
                                            Amount
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $TotalReceiveAmount = [];
                                    @endphp
                                    @foreach ($sales_invoice_edit->cash_books_table as $key => $cash_books)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>
                                            <td>
                                                {{ $cash_books->user_table->name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $cash_books->description ?? '' }}
                                            </td>
                                            <td>
                                                {{ $cash_books->cash_book_date ?? '' }}
                                            </td>
                                            <td style="text-align: right; font-weight: bold;">
                                                @php
                                                    $cash_book_cash_in = $cash_books->cash_in;
                                                    $cash_book_bank_in = $cash_books->bank_in;
                                                    $TotalBankCash = $cash_book_cash_in + $cash_book_bank_in;
                                                    $TotalReceiveAmount[] = $TotalBankCash;
                                                    echo number_format($TotalBankCash, 2);
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tr>
                                    <td colspan="4">
                                        Total:
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $ReceiveAmountTotal = array_sum($TotalReceiveAmount);
                                            echo number_format($ReceiveAmountTotal, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Sale Person
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="receive_by" disabled>
                                                @foreach ($sales_persons as $sales_person)
                                                    <option value="{{ $sales_person->id }}"
                                                        @if ($sales_person->id == $sales_invoice_edit->sales_persons_id) selected @endif>
                                                        {{ $sales_person->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('receive_by')
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
                                                value="{{ $sales_invoice_edit->delivery_date }}" name="delivery_date"
                                                disabled>
                                            @error('delivery_date')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </dl>
                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Total Amount
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm"
                                                style="text-align:right;" disabled
                                                value="{{ number_format($total_amount_table) }}">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            DOWN PAYMENT
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="hidden" value="{{ $sales_invoices_payments_edit->id }}"
                                                name="sales_invoices_payments_id">
                                            <input type="text"
                                                class="form-control form-control-sm @error('down_payment') is-invalid @enderror"
                                                name="down_payment" id="DownPayment" style="text-align:right;"
                                                oninput="SetCalculateDownPayment()"
                                                value="{{ $sales_invoices_payments_edit->down_payment ?? 0 }}" disabled />
                                            @error('down_payment')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Dealer %
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('dealer_percentage') is-invalid @enderror"
                                                    name="dealer_percentage" id="DealerPercentage"
                                                    style="text-align:right;" oninput="SetCalculateDownPayment()"
                                                    value="{{ $sales_invoices_payments_edit->dealer_ercentage ?? 0 }}"
                                                    disabled />
                                                <span class="input-group-text sm">%</span>
                                            </div>
                                            @error('dealer_percentage')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Paid Amount
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" name="pay_amount"
                                                style="text-align:right;" disabled
                                                value="{{ number_format($ReceiveAmountTotal, 2) }}" />
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label" style="font-weight: bold;">
                                            BALANCE TO BE PAY
                                        </label>
                                        <div class="col-sm-8">
                                            @php
                                                $balance_to_be_pay = $total_amount_table - $ReceiveAmountTotal;
                                            @endphp
                                            <input type="text" class="form-control form-control-sm" name="pay_amount"
                                                style="text-align:right;" disabled
                                                value="{{ number_format($balance_to_be_pay, 2) }}" />
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
        $(document).ready(function() {
            function getCustomerAjaxAuto() {
                var customerID = '{{ $sales_invoice_edit->customer_id }}'
                $.ajax({
                    url: '/get_customer_ajax/' + customerID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        Address.value = data.address;
                        Ph.value = data.phone;
                        Email.value = data.email;
                        DealerCode.value = data.dealer_code;
                    }
                });
            }
            getCustomerAjaxAuto();
        });
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreSalePayNow', '#create-form') !!}
@endsection
