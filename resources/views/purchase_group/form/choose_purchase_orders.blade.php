<div class="row">
    <span style="color: red">
        Select Balance Qty.
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
            @foreach ($purchase_items as $key => $purchase_item)
                @php
                    $id = $purchase_item->id;
                    $purchase_item_qty = $purchase_item->qty ?? 0;

                    $total_shipping_qty = $purchase_item->arrival_items_table->sum('shipping_qty');
                    $balance_units = $purchase_item_qty - $total_shipping_qty;
                @endphp
                @if ($balance_units > 0)
                    <tr>
                        <td style="text-align: center">
                            {{ $key + 1 }}
                        </td>

                        {{-- Purchase No --}}
                        <td style="text-align: center">
                            {{ $purchase_order_data->purchase_no ?? '' }}
                        </td>

                        {{-- Product --}}
                        <td style="text-align: center">
                            {{ $purchase_item->brands_table->name ?? '' }}
                        </td>

                        {{-- Models --}}
                        <td style="text-align: center">
                            {{ $purchase_item->type_of_models_table->title ?? '' }}
                        </td>

                        {{-- Order Quantity --}}
                        <td style="text-align: right">
                            {{ $purchase_item->qty ?? 0 }}
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
                                $balanced_deposit_usd = $purchase_item->purchase_operation_items_table->payment_operation_amount ?? 0;
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
                            {{ number_format($purchase_item->cif_usd, 2) }}
                        </td>

                        {{-- Amount --}}
                        <td style="text-align: right">
                            @php
                                $balanced_total_advance_payment = $balance_units * $purchase_item->cif_usd;
                                echo number_format($balanced_total_advance_payment, 2);
                            @endphp
                        </td>

                        {{-- Qty --}}
                        <td style="text-align: right">
                            {{ $balance_units ?? 0 }}
                        </td>

                        {{-- Action --}}
                        <td>
                            @php
                                $cif_usd = $purchase_item->cif_usd;
                            @endphp
                            <input type="button" class="btn btn-primary btn-sm" value="Add"
                                onclick="setPurchaseGroupInvoiceCart({{ $id }},{{ $balance_units }}, {{ $cif_usd }})">
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>


@section('script')
    <script>
        function setPurchaseGroupInvoiceCart(purchase_item_id, balance_units, cif_usd) {
            var url = '{{ url('add_temporary_purchase_group_item') }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    purchase_item_id: purchase_item_id,
                    qty: balance_units,
                    cif_usd: cif_usd,
                },
                success: function(data) {
                    location.reload();
                },
                error: function(data) {}
            });
        }
    </script>
@endsection
