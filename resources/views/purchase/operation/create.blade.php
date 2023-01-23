@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-12 col-12 mb-lg-0 mb-4">
            <form action="{{ route('purchase_operation.store') }}" method="POST" autocomplete="off" id="create-form">
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
                                            Date
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('operation_date') is-invalid @enderror"
                                                name="operation_date">
                                            @error('operation_date')
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

                                        <th style="color: white; text-align: center; width: 5%;">
                                            Product Name
                                        </th>

                                        <th style="color: white; text-align: center; width: 2%;">
                                            Models
                                        </th>

                                        <th style="color: white; text-align: center; width: 3%;">
                                            Order <br> Quantity
                                        </th>

                                        <th style="color: white; text-align: center; width: 3%;">
                                            CIF Yangon <br> ( USD )
                                        </th>

                                        <th style="color: white; text-align: center; width: 5%;">
                                            Amount <br> USD
                                        </th>

                                        <th style="color: white; text-align: center; width: 15%;">
                                            <input type="text" class="form-control" list="particular" name="particular">
                                            <datalist id="particular">
                                                <option value="Deposit (USD)">
                                                <option value="Balance Units">
                                                <option value="Order Quantity">
                                                <option value="Allocation-1">
                                                <option value="Allocation-2">
                                                <option value="Allocation-3">
                                            </datalist>
                                        </th>

                                        <th style="color: white; text-align: center; width: 15%;">
                                            <input type="text" class="form-control" list="payment_operation"
                                                name="payment_operation">
                                            <datalist id="payment_operation">
                                                <option value="30% Payment">
                                                <option value="70% Payment">
                                                <option value="Deposit (USD)">
                                                <option value="1st Payment">
                                                <option value="2nd Payment">
                                                <option value="3rd Payment">
                                                <option value="4th Payment">
                                            </datalist>
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Amount <br> USD
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Exchange <br> Rate
                                        </th>

                                        <th style="color: white; text-align: center; width: 10%;">
                                            Total <br> MMK
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

                                            {{-- Particular --}}
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control ParticularQty"
                                                        placeholder="QTY" style="text-align: right; width: 5%;"
                                                        data-id="{{ $purchase_item->id }}"
                                                        name="inputFields[{{ $item }}][particular_qty]">
                                                </div>
                                            </td>

                                            {{-- Payment Operation --}}
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" class="form-control PaymentOperationAmount"
                                                        placeholder="Amount" style="text-align: right; width: 20%;"
                                                        name="inputFields[{{ $item }}][payment_operation_amount]">
                                                </div>
                                            </td>

                                            <td>
                                                <input type="text" class="form-control TotalAmountValue"
                                                    id="PaymentAmount_{{ $purchase_item->id }}"
                                                    style="text-align: right">
                                            </td>

                                            <td>
                                                <input type="text" class="form-control EntryExchange"
                                                    data-id="{{ $purchase_item->id }}"
                                                    name="inputFields[{{ $item }}][exchange_rate]"
                                                    style="text-align: right">
                                            </td>

                                            <td>
                                                <input type="text" class="form-control"
                                                    id="TotalAmount_{{ $purchase_item->id }}" style="text-align: right">
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
                                            <select class="form-select" name="operation_status">
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
    <script>
        var particular_qty = 0;
        var input_id = 0;
        $(document).on("keyup", ".ParticularQty", function() {
            input_id = $(this).data('id');
            particular_qty = $(this).val();
            if (particular_qty == null || particular_qty == "" || isNaN(particular_qty)) {
                alert("Enter Numeric value only.");
                return false;
            }
            setCalculateOperationAmount()
        });

        var PaymentOperationAmount = 0;
        $(document).on("keyup", ".PaymentOperationAmount", function() {
            PaymentOperationAmount = $(this).val();
            if (PaymentOperationAmount == null || PaymentOperationAmount == "" || isNaN(PaymentOperationAmount)) {
                // alert("Enter Numeric value only.");
                return false;
            }
            setCalculateOperationAmount()
        });


        var EntryExchange = 0;
        $(document).on("keyup", ".EntryExchange", function() {
            EntryExchange = $(this).val();
            setCalculateOperationAmount()
        });



        function setCalculateOperationAmount() {
            var amount_input_id = input_id;
            var total_particular_qty = particular_qty;
            var total_payment_operation_amount = PaymentOperationAmount;
            var total = total_particular_qty * total_payment_operation_amount;
            document.getElementById("PaymentAmount_" + amount_input_id).value = total;

            var TotalEntryExchange = EntryExchange;
            var GetTotalMMK = TotalEntryExchange * total
            document.getElementById("TotalAmount_" + amount_input_id).value = GetTotalMMK;
        }
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\StorePurchaseOperationInfo', '#create-form') !!}
@endsection
