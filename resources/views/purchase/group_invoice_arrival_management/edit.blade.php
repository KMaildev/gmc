@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-12 col-12 mb-lg-0 mb-4">
            <form action="{{ route('arrival_management.update', $arrival_info->id) }}" method="POST" autocomplete="off"
                id="edit-form">
                @csrf
                @method('PUT')

                <input type="hidden" value="{{ $purchase_order->id }}" required name="purchase_order_id">

                <div class="card invoice-preview-card">
                    <div class="card-body">

                        <div class="row p-sm-3 p-0">

                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Invoice No.
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('purchase_no') is-invalid @enderror"
                                                value="{{ $purchase_order->purchase_no ?? '' }}" name="purchase_no"
                                                readonly>
                                            @error('purchase_no')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Invoice Date
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="date_picker form-control form-control-sm"
                                                value="{{ $purchase_order->purchase_date ?? '' }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Arrival Date
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('arrival_date') is-invalid @enderror"
                                                name="arrival_date" value="{{ $arrival_info->arrival_date ?? '' }}">
                                            @error('arrival_date')
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
                                            Sr
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Product Name
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Models
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Order Quantity
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            CIF Yangon ( USD )
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Amount USD
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Shipping Quantity
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $amount_total = [];
                                    @endphp
                                    @foreach ($arrival_items as $item => $arrival_item)
                                        <tr>
                                            <input type="hidden" name="inputFields[{{ $item }}][purchase_item_id]"
                                                value="{{ $arrival_item->purchase_items_table->id }}">
                                            <td>
                                                {{ $item + 1 }}
                                            </td>

                                            <td>
                                                {{ $arrival_item->purchase_items_table->brands_table->name ?? '' }}
                                            </td>

                                            <td>
                                                {{ $arrival_item->purchase_items_table->type_of_models_table->title ?? '' }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                {{ $arrival_item->purchase_items_table->qty ?? 0 }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                {{ number_format($arrival_item->purchase_items_table->cif_usd, 2) }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                @php
                                                    $item_total_amount = $arrival_item->purchase_items_table->qty * $arrival_item->purchase_items_table->cif_usd ?? 0;
                                                    echo number_format($item_total_amount, 2);
                                                    $amount_total[] = $item_total_amount;
                                                @endphp
                                            </td>

                                            {{-- Shipping Quantity --}}
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control shipping_quantity"
                                                        placeholder="QTY" style="text-align: right; width: 5%;"
                                                        name="inputFields[{{ $item }}][shipping_qty]"
                                                        value="{{ $arrival_item->shipping_qty ?? 0 }}"
                                                        data-id="{{ $arrival_item->id }}">
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6"></div>

                            <div class="col-md-6">
                                <dl class="row mb-2">

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Remark
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control form-control-sm @error('remark') is-invalid @enderror"
                                                name="remark" value="{{ $arrival_info->remark ?? '' }}">
                                            @error('remark')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Users
                                        </label>
                                        <div class="col-sm-8">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="user_id">
                                                <option value="">-- Select Users --</option>
                                                @foreach ($users as $sales_person)
                                                    <option value="{{ $sales_person->id }}"
                                                        @if ($sales_person->id == $arrival_info->user_id) selected @endif>
                                                        {{ $sales_person->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Status
                                        </label>
                                        <div class="col-sm-8">
                                            <select class="form-select" name="arrival_status">
                                                <option value="Arrived" @if ('Arrived' == $arrival_info->arrival_status) selected @endif>
                                                    Arrived
                                                </option>
                                                <option value="Paid" @if ('Paid' == $arrival_info->arrival_status) selected @endif>
                                                    Paid
                                                </option>
                                                <option value="Balanced" @if ('Balanced' == $arrival_info->arrival_status) selected @endif>
                                                    Balanced
                                                </option>
                                                <option value="Shipped" @if ('Shipped' == $arrival_info->arrival_status) selected @endif>
                                                    Shipped
                                                </option>
                                            </select>
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
    {!! JsValidator::formRequest('App\Http\Requests\UpdateArrivalInformation', '#edit-form') !!}
    <script>
        $(document).on("keyup", ".shipping_quantity", function() {
            var arrival_item_id = $(this).data('id');
            var shipping_qty = $(this).val();
            if (shipping_qty == null || shipping_qty == "" || isNaN(shipping_qty)) {
                alert("Enter Numeric value only.");
                return false;
            }


            var url = '{{ url('update_arrival_items') }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    arrival_item_id: arrival_item_id,
                    shipping_qty: shipping_qty,
                },
                success: function(data) {
                    console.log("Ok")
                },
                error: function(data) {
                    console.log("Error")
                }
            });
        });
    </script>
@endsection
