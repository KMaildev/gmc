@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">

                    <div class="row p-sm-3 p-0">
                        <div class="col-md-6">
                            <dl class="row mb-2">

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('customer_id') is-invalid @enderror"
                                            name="customer_id"
                                            value="{{ $sales_invoice_edit->customers_table->name ?? '' }}" readonly>
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
                                            name="id_no" value="{{ $sales_invoice_edit->id_no }}" readonly>
                                        @error('id_no')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="Address" readonly>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">PH</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="Ph" readonly>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label" for="basic-default-name">E-Mail
                                        Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="Email" readonly>
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
                                            value="{{ $sales_invoice_edit->invoice_no }}" name="invoice_no" readonly>
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
                                            value="{{ $sales_invoice_edit->invoice_date }}" name="invoice_date" readonly>
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
                                            value="{{ $sales_invoice_edit->showroom_name }}" name="showroom_name" readonly>
                                        @error('showroom_name')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label">Dealer Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="DealerCode" readonly>
                                    </div>
                                </div>

                                <div class="row mb-1">
                                    <label class="col-sm-3 col-form-label">Sales Type</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('sales_type') is-invalid @enderror"
                                            value="{{ $sales_invoice_edit->sales_type }}" name="sales_type" readonly>
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
                                            value="{{ $sales_invoice_edit->payment_team }}" name="payment_team" readonly>
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
                        <span style="color: red;">
                            Select Return Chassis No & Vehicle No.
                        </span>
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
                            <tbody>
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
                                            @endphp
                                        </td>

                                        <td style="text-align: center;">
                                            <a href="{{ route('save_sales_return_item', $sales_items_edit->id) }}"
                                                class="btn btn-primary btn-sm">
                                                Return
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <br>
                        <span style="color: red;">
                            Return Chassis No & Vehicle No.
                        </span>
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
                            <tbody>
                                @foreach ($sales_return_items as $item => $sales_items_edit)
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
                                            <input type="text" value="{{ $sales_items_edit->description ?? '' }}"
                                                class="form-control update_description"
                                                data-id="{{ $sales_items_edit->id }}">
                                        </td>

                                        <td style="text-align: right; font-weight: bold;">
                                            {{ $sales_items_edit->qty ?? 0 }}
                                        </td>

                                        <td style="text-align: left; font-weight: bold;">
                                            <input type="text" value="{{ $sales_items_edit->unit_price ?? 0 }}"
                                                class="form-control update_unit_price"
                                                data-id="{{ $sales_items_edit->id }}" style="text-align:right;">
                                        </td>

                                        <td style="text-align: right; font-weight: bold;">
                                            @php
                                                $item_total_amount = $sales_items_edit->qty * $sales_items_edit->unit_price ?? 0;
                                                echo number_format($item_total_amount, 2);
                                            @endphp
                                        </td>

                                        <td style="text-align: center;">
                                            <a href="" class="btn btn-primary btn-sm">
                                                Update
                                            </a>

                                            <a href="{{ route('remove_sales_return_item', $sales_items_edit->id) }}"
                                                class="text-danger">
                                                Remove
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    <form action="{{ route('sales_return.update', $sales_return_edit->id) }}" method="POST"
                        autocomplete="off" id="create-form">
                        @csrf
                        @method('PUT')
                        <div class="row p-sm-3">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <dl class="row">

                                    <input type="hidden" class="@error('sales_invoice_id') is-invalid @enderror"
                                        value="{{ $sales_invoice_edit->id }}" name="sales_invoice_id">

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Return Date
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('return_date') is-invalid @enderror"
                                                value="{{ $sales_return_edit->return_date ?? '' }}" name="return_date">
                                            @error('return_date')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Return Person
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="sales_return_person_id">
                                                <option value="">-- Select Return Person --</option>
                                                @foreach ($sales_persons as $sales_person)
                                                    <option value="{{ $sales_person->id }}"
                                                        @if ($sales_person->id == $sales_return_edit->sales_return_person_id) selected @endif>
                                                        {{ $sales_person->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('sales_return_person_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1 py-2">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary" style='float: right;'>
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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


            // update_description
            $(document).on("keyup", ".update_description", function() {
                var id = $(this).data('id');
                var description = $(this).val();

                var url = '{{ url('update_sales_return_item_description') }}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {
                        sales_return_item_id: id,
                        sale_return_description: description,
                    },
                    success: function(data) {},
                    error: function(data) {}
                });
            });


            // update_unit_price
            $(document).on("keyup", ".update_unit_price", function() {
                var id = $(this).data('id');
                var unit_price = $(this).val();

                var url = '{{ url('update_sales_return_item_unit_price') }}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: 'POST',
                    url: url,
                    data: {
                        sales_return_item_id: id,
                        sale_return_unit_price: unit_price,
                    },
                    success: function(data) {},
                    error: function(data) {}
                });
            });
        });
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreSalesReturn', '#create-form') !!}
@endsection
