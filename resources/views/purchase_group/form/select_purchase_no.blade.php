<div class="row">
    <div class="col-md-6">
        <dl class="row mb-2">
            <div class="row mb-1">
                <label class="col-sm-3 col-form-label" style="color: red">
                    Select Purchase No
                </label>
                <div class="col-sm-9">
                    <select class="select2 form-select form-select" data-allow-clear="false"
                        onchange="top.location.href = this.options[this.selectedIndex].value">
                        <option value="{{ route('purchase_group_invoice_create', 0) }}">
                            Select Purchase No
                        </option>
                        @foreach ($purchase_orders as $purchase_order)
                            <option value="{{ route('purchase_group_invoice_create', $purchase_order->id) }}">
                                {{ $purchase_order->purchase_no ?? '' }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </dl>
    </div>
</div>
