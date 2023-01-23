@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
            <form action="{{ route('sales_invoices.update', $sales_invoice_edit->id) }}" method="POST" autocomplete="off"
                id="create-form">
                @csrf
                @method('PUT')
                <div class="card invoice-preview-card">
                    <div class="card-body">

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                id="CustomerID" name="customer_id">
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
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">ID NO</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('id_no') is-invalid @enderror"
                                                name="id_no" value="{{ $sales_invoice_edit->id_no }}">
                                            @error('id_no')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Address">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">PH</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Ph">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">E-Mail
                                            Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Email">
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
                                                value="{{ $sales_invoice_edit->invoice_no }}" name="invoice_no">
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
                                                value="{{ $sales_invoice_edit->invoice_date }}" name="invoice_date">
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
                                                value="{{ $sales_invoice_edit->showroom_name }}" name="showroom_name">
                                            @error('showroom_name')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Dealer Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="DealerCode">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Sales Type</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('sales_type') is-invalid @enderror"
                                                value="{{ $sales_invoice_edit->sales_type }}" name="sales_type">
                                            @error('sales_type')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Payment Team</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('payment_team') is-invalid @enderror"
                                                value="{{ $sales_invoice_edit->payment_team }}" name="payment_team">
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
                                            <option value="">--Please Select Chessi No --</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">
                                                    {{ $product->chessi_no }}
                                                </option>
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
                                <tbody>
                                    {{-- temporary_sales_item --}}
                                    @php
                                        $amount_total = [];
                                    @endphp
                                    @foreach ($temporary_sales_items as $key => $temporary_sales_item)
                                        <tr>
                                            <td>
                                                {{ $key + 1 }}
                                            </td>

                                            <td>
                                                {{ $temporary_sales_item->products_table->model_no ?? '' }}
                                            </td>

                                            <td>
                                                {{ $temporary_sales_item->products_table->chessi_no ?? '' }}
                                                <input type="hidden"
                                                    name="productFields[{{ $key + 1 }}][product_id]"
                                                    value="{{ $temporary_sales_item->products_table->id ?? '0' }}"
                                                    required />
                                            </td>

                                            <td>
                                                {{ $temporary_sales_item->description ?? '' }}
                                                <input type="hidden"
                                                    name="productFields[{{ $key + 1 }}][description]"
                                                    value="{{ $temporary_sales_item->description }}" />
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                {{ $temporary_sales_item->qty ?? 0 }}
                                                <input type="hidden" name="productFields[{{ $key + 1 }}][qty]"
                                                    value="{{ $temporary_sales_item->qty ?? '0' }}" required />
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                {{ number_format($temporary_sales_item->price, 2) }}
                                                <input type="hidden" name="productFields[{{ $key + 1 }}][price]"
                                                    value="{{ $temporary_sales_item->price ?? '0' }}" required />
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                @php
                                                    $total_amount = $temporary_sales_item->qty * $temporary_sales_item->price ?? 0;
                                                    echo number_format($total_amount, 2);
                                                    $amount_total[] = $total_amount;
                                                @endphp
                                            </td>

                                            <td>
                                                <a href="{{ route('temporary_sales_items_remove', $temporary_sales_item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    Remove
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach


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
                                                    class="btn btn-danger btn-sm">
                                                    Remove
                                                </a>
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
                                        <label class="col-sm-3 col-form-label">Sales Person</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="sales_persons_id">
                                                <option value="">--Please Select Sales Person --</option>
                                                @foreach ($sales_persons as $sales_person)
                                                    <option value="{{ $sales_person->id }}"
                                                        @if ($sales_person->id == $sales_invoice_edit->sales_persons_id) selected @endif>
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
                                                value="{{ $sales_invoice_edit->delivery_date }}" name="delivery_date">
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
                                            @php
                                                $total_amount = array_sum($amount_total);
                                            @endphp
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ number_format($total_amount, 2) }}" style="text-align:right;">
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
                                                value="{{ $sales_invoices_payments_edit->down_payment ?? 0 }}" />
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
                                                    value="{{ $sales_invoices_payments_edit->dealer_ercentage ?? 0 }}" />
                                                <span class="input-group-text sm">%</span>
                                            </div>
                                            @error('dealer_percentage')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Discount
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('discount') is-invalid @enderror"
                                                    name="discount" style="text-align:right;" value="" />
                                            </div>
                                            @error('discount')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            BALANCE TO BE PAY
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control form-control-sm @error('balance_to_be_pay') is-invalid @enderror"
                                                name="balance_to_be_pay" id="BalanceToPay" style="text-align:right;" />
                                            @error('balance_to_be_pay')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            TOTAL BALANCE TO BE PAY DATE
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('balance_to_pay_date') is-invalid @enderror"
                                                name="balance_to_pay_date" id="BalanceToPayDate"
                                                style="text-align:right;" />
                                            @error('balance_to_pay_date')
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
        function SetCalculator() {
            var Qty = document.getElementById("Qty").value;
            var UnitPrice = document.getElementById("UnitPrice").value;
            var AmountTotal = Qty * UnitPrice;
            TotalAmount.value = AmountTotal;
        }

        function SetCalculateDownPayment() {
            var TotalAmountValue = {{ $total_amount }};
            var DownPayment = document.getElementById("DownPayment").value;
            var DealerPercentage = document.getElementById("DealerPercentage").value;
            var DealerPercentageValue = TotalAmountValue / 100 * DealerPercentage;
            BalanceToPay.value = TotalAmountValue - DownPayment - DealerPercentageValue;
        }

        function setSaleInvoiceCart() {
            var ChessiNO = document.getElementById("ChessiNO").value;
            var Qty = document.getElementById("Qty").value;
            var UnitPrice = document.getElementById("UnitPrice").value;
            var Description = document.getElementById("Description").value;
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
                    location.reload();
                },
                error: function(data) {
                    location.reload();
                }
            });
        }

        $(document).ready(function() {

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
                        }
                    });
                }
            });

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

            $('select[id="ChessiNO"]').on('change', function() {
                var ChessiNO = $(this).val();
                if (ChessiNO) {
                    $.ajax({
                        url: '/get_products_ajax/' + ChessiNO,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            Model.value = data.model_no;
                        }
                    });
                }
            });

            getCustomerAjaxAuto();
        });
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\UpdateSalesInvoices', '#create-form') !!}
@endsection
