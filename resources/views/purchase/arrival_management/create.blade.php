@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-12 col-12 mb-lg-0 mb-4">
            <form action="{{ route('arrival_management.store') }}" method="POST" autocomplete="off" id="create-form">
                @csrf

                <input type="hidden" value="{{ $purchase_order->id }}" required name="purchase_order_id">

                <div class="card invoice-preview-card">
                    <div class="card-body">

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $supplier->name ?? '' }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $supplier->address ?? '' }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">PH</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm"
                                                value="{{ $supplier->phone ?? '' }}" readonly>
                                        </div>
                                    </div>
                                </dl>
                            </div>

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
                                                name="arrival_date">
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
                                    @foreach ($purchase_items as $item => $purchase_item)
                                        <tr>
                                            <input type="hidden" name="inputFields[{{ $item }}][purchase_item_id]"
                                                value="{{ $purchase_item->id }}">
                                            <td>
                                                {{ $item + 1 }}
                                            </td>

                                            <td>
                                                {{ $purchase_item->brands_table->name ?? '' }}
                                            </td>

                                            <td>
                                                {{ $purchase_item->type_of_models_table->title ?? '' }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                {{ $purchase_item->qty ?? 0 }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                {{ number_format($purchase_item->cif_usd, 2) }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                @php
                                                    $item_total_amount = $purchase_item->qty * $purchase_item->cif_usd ?? 0;
                                                    echo number_format($item_total_amount, 2);
                                                    $amount_total[] = $item_total_amount;
                                                @endphp
                                            </td>

                                            {{-- Shipping Quantity --}}
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="QTY"
                                                        style="text-align: right; width: 5%;"
                                                        name="inputFields[{{ $item }}][shipping_qty]">
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
                                                name="remark">
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
                                                    <option value="{{ $sales_person->id }}">
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
                                                <option value="Arrived">
                                                    Arrived
                                                </option>
                                                <option value="Paid">
                                                    Paid
                                                </option>
                                                <option value="Balanced">
                                                    Balanced
                                                </option>
                                                <option value="Shipped">
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreArrivalInformation', '#create-form') !!}
@endsection
