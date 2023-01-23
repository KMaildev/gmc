<div class="row">
    <hr>
    <span style="color: red">
        Balance Qty.
    </span>
    <table class="table table-bordered table-sm">
        <thead class="tbbg">
            <tr>
                <th style="color: white; text-align: center; width: 1%;">Sr</th>
                <th style="color: white; text-align: center; width: 10%;">Purchase No</th>
                <th style="color: white; text-align: center; width: 10%;">Product</th>
                <th style="color: white; text-align: center; width: 10%;">Models</th>
                <th style="color: white; text-align: center; width: 10%;">Order Quantity</th>
                <th style="color: white; text-align: center; width: 10%;">Balance Units</th>
                <th style="color: white; text-align: center; width: 10%;">Deposit(USD)</th>
                <th style="color: white; text-align: center; width: 10%;">Amount USD</th>
                <th style="color: white; text-align: center; width: 10%;">CIF Yangon(USD)</th>
                <th style="color: white; text-align: center; width: 10%;">Amount</th>
                <th style="color: white; text-align: center; width: 5%;">Balance Qty</th>
                <th style="color: white; text-align: center; width: 5%;">Action</th>
            </tr>
        </thead>

        <tbody>
            @php
                $total_balance_qty = [];
                $all_total_balanced_advance_payment = [];
            @endphp
            @foreach ($temporary_purchase_group_items as $key => $temporary_purchase_group_item)
                @php
                    $total_shipping_qty = $temporary_purchase_group_item->purchase_item->arrival_items_table->sum('shipping_qty');
                    $purchase_item_qty = $temporary_purchase_group_item->purchase_item->qty ?? 0;
                    $balance_units = $purchase_item_qty - $total_shipping_qty;
                @endphp

                <tr>
                    <td>
                        {{ $key + 1 }}
                    </td>

                    <td>
                        {{ $temporary_purchase_group_item->purchase_order_table->purchase_no ?? '' }}
                    </td>

                    <td>
                        {{ $temporary_purchase_group_item->brands_table->name ?? '' }}
                    </td>

                    {{-- Models --}}
                    <td style="text-align: center">
                        {{ $temporary_purchase_group_item->type_of_models_table->title ?? '' }}
                    </td>

                    {{-- Order Quantity --}}
                    <td style="text-align: right">
                        {{ $temporary_purchase_group_item->purchase_item->qty ?? 0 }}
                    </td>

                    {{-- Balance Units --}}
                    <td style="text-align: right">
                        @php
                            echo $balance_units;
                        @endphp
                    </td>

                    {{-- Deposit(USD) --}}
                    <td style="text-align: right">
                        @php
                            $balanced_deposit_usd = $temporary_purchase_group_item->purchase_item->purchase_operation_items_table->payment_operation_amount ?? 0;
                            echo number_format($balanced_deposit_usd, 2);
                        @endphp
                    </td>

                    {{-- Amount USD	 --}}
                    <td style="text-align: right">
                        @php
                            $balanced_total_advance_payment = $balance_units * $balanced_deposit_usd;
                            echo number_format($balanced_total_advance_payment, 2);
                        @endphp
                    </td>

                    {{-- CIF Yangon(USD) --}}
                    <td style="text-align: right">
                        {{ number_format($temporary_purchase_group_item->cif_usd, 2) }}
                    </td>

                    {{-- Amount --}}
                    <td style="text-align: right">
                        @php
                            $balanced_total_advance_payment = $balance_units * $temporary_purchase_group_item->cif_usd;
                            echo number_format($balanced_total_advance_payment, 2);
                            $all_total_balanced_advance_payment[] = $balanced_total_advance_payment;
                        @endphp
                    </td>

                    {{-- Qty --}}
                    <td style="text-align: right">
                        @php
                            echo $temporary_purchase_group_item->qty ?? 0;
                            $total_balance_qty[] = $temporary_purchase_group_item->qty ?? 0;
                        @endphp
                    </td>

                    <td>
                        <a href="{{ route('delete_temporary_purchase_group_items', $temporary_purchase_group_item->id) }}"
                            class="btn btn-danger btn-sm">
                            Remove
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tr>
            <td colspan="9">
                Total
            </td>

            <td style="text-align: right">
                @php
                    $all_total_balanced_advance_payment = array_sum($all_total_balanced_advance_payment);
                    echo number_format($all_total_balanced_advance_payment, 2);
                @endphp
            </td>

            <td style="text-align: right">
                @php
                    $total_balance_qty = array_sum($total_balance_qty);
                    echo $total_balance_qty;
                @endphp
            </td>

            <td></td>
        </tr>
    </table>
</div>

<div class="row p-sm-3 p-0">
    <div class="col-md-6"></div>

    <div class="col-md-6">
        <dl class="row mb-2">

            <div class="row mb-1">
                <label class="col-sm-4 col-form-label">
                    Total Amount
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" style="text-align:right;"
                        value="{{ number_format($all_total_balanced_advance_payment ?? 0, 2) }}">
                    <input type="hidden" value="{{ $all_total_balanced_advance_payment ?? 0 }}" name="total_amount">
                </div>
            </div>

            <div class="row mb-1">
                <label class="col-sm-4 col-form-label">
                    Status
                </label>
                <div class="col-sm-8">
                    <select class="form-select" name="order_status">
                        <option value="Group Invoice">
                            Group Invoice
                        </option>
                    </select>
                </div>
            </div>

            <div class="row mb-1">
                <label class="col-sm-4 col-form-label">
                    Representative
                </label>
                <div class="col-sm-8">
                    <select class="select2 form-select form-select-sm" data-allow-clear="false"
                        name="purchase_representative_id">
                        <option value="">-- Select Representative --</option>
                        @foreach ($sales_persons as $sales_person)
                            <option value="{{ $sales_person->id }}">
                                {{ $sales_person->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('purchase_representative_id')
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
