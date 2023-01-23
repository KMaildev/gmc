@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
            <form action="{{ route('sale_pay_now.store') }}" method="POST" autocomplete="off" id="create-form">
                @csrf
                <input type="hidden" value="{{ $sales_invoice_edit->id }}" name="sales_invoice_id">
                <input type="hidden" value="{{ $sales_invoices_payments_edit->id }}" name="sales_invoices_payment_id">

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
                            </table>
                        </div>

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Receive By
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="receive_by">
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
                                            Received Date
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('received_date') is-invalid @enderror"
                                                value="{{ $sales_invoice_edit->delivery_date }}" name="received_date">
                                            @error('received_date')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Status
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="form-select form-select-sm" data-allow-clear="false"
                                                name="payment_status">
                                                <option value="">
                                                    --Select Status--
                                                </option>
                                                <option value="In_Payment">
                                                    In Payment
                                                </option>
                                                <option value="Paid">
                                                    Paid
                                                </option>
                                            </select>
                                            @error('payment_status')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Payment Time
                                        </label>
                                        <div class="col-sm-9">
                                            <input list="payment_time" type="text"
                                                class="form-control form-control-sm @error('payment_time') is-invalid @enderror"
                                                name="payment_time">
                                            <datalist id="payment_time">
                                                <option value="1st Payment">
                                                <option value="2nd Payment">
                                                <option value="Final Payment">
                                            </datalist>
                                            @error('payment_time')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            Remark
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('remark') is-invalid @enderror"
                                                value="" name="remark">
                                            @error('remark')
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
                                            @php
                                                $total_amount = array_sum($amount_total);
                                            @endphp
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ number_format($total_amount, 2) }}" style="text-align:right;"
                                                disabled>
                                            <input type="hidden" value="{{ $total_amount }}" name="total_amount">
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
                                                value="{{ $sales_invoices_payments_edit->down_payment ?? 0 }}"
                                                disabled />
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
                                                    value="{{ $sales_invoices_payments_edit->dealer_percentage ?? 0 }}"
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
                                                style="text-align:right;" disabled value="{{ $sale_pay_nows }}" />
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            (Pay) Amount
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control form-control-sm @error('pay_amount') is-invalid @enderror"
                                                name="pay_amount" id="BalanceToPay" style="text-align:right;" />
                                            @error('pay_amount')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary mb-3" style='float: right;'>
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
