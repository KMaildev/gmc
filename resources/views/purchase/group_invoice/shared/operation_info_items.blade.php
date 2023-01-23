@foreach ($purchase_order->purchase_operation_infos_table as $key => $purchase_operation_info)
    <tr style="background-color: #DDEBF7; color: black;">
        <td style="text-align: center; width: 1%;">
            #
        </td>

        <td></td>
        <td></td>

        <td style="text-align: center">
            {{ $purchase_operation_info->operation_date ?? '' }}
        </td>

        <td style="text-align: center">
            {{ $purchase_operation_info->particular ?? '' }}
        </td>

        {{-- Amount USD --}}
        <td style="text-align: center">
            {{ $purchase_operation_info->payment_operation ?? '' }}
        </td>

        <td style="text-align: center">
            Amount USD
        </td>

        <td style="text-align: center">
            Exchange Rate
        </td>

        <td style="text-align: center">
            Total MMK
        </td>


        <td style="text-align: center; color: red;">
            {{ $purchase_operation_info->operation_status ?? '' }}
        </td>


        <td style="text-align: center">
            <div class="demo-inline-spacing">
                <div class="btn-group">
                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item"
                                href="{{ route('group_invoice_operation.edit', $purchase_operation_info->id) }}">
                                Edit Operation
                            </a>
                        </li>

                        <li>
                            <form action="{{ route('purchase_operation.destroy', $purchase_operation_info->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="dropdown-item del_confirm" id="confirm-text">
                                    Delete Operation
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </td>
    </tr>

    {{-- Operation Items --}}
    @php
        $total_particular_qty = [];
        $total_payment_operation_amount = [];
        $total_amount_usd = [];
        $total_exchange_rate = [];
        $total_total_mmk = [];
    @endphp
    @foreach ($purchase_operation_info->purchase_operation_items_table as $key => $purchase_operation_item)
        <tr>
            <td>
                {{ $key + 1 }}
            </td>

            <td></td>

            <td style="text-align: center">
                {{ $purchase_operation_item->purchase_items_table->brands_table->name ?? '' }}
            </td>

            <td style="text-align: center">
                {{ $purchase_operation_item->purchase_items_table->type_of_models_table->title ?? '' }}
            </td>

            <td style="text-align: right">
                @php
                    $particular_qty = $purchase_operation_item->particular_qty ?? 0;
                    echo $particular_qty;
                    $total_particular_qty[] = $particular_qty;
                @endphp
            </td>

            {{-- Operation Amount Total --}}
            <td style="text-align: right">
                @php
                    $payment_operation_amount = $purchase_operation_item->payment_operation_amount ?? 0;
                    echo number_format($payment_operation_amount, 2);
                    $total_payment_operation_amount[] = $payment_operation_amount;
                @endphp
            </td>

            {{-- Amount USD --}}
            <td style="text-align: right">
                @php
                    $amount_usd = $particular_qty * $payment_operation_amount;
                    echo number_format($amount_usd, 2);
                    $total_amount_usd[] = $amount_usd;
                @endphp
            </td>

            {{-- Exchange Rate --}}
            <td style="text-align: right">
                @php
                    $exchange_rate = $purchase_operation_item->exchange_rate ?? 0;
                    echo number_format($exchange_rate, 2);
                    $total_exchange_rate[] = $exchange_rate;
                @endphp
            </td>

            {{-- Total MMK --}}
            <td style="text-align: right">
                @php
                    $total_mmk = $amount_usd * $exchange_rate;
                    echo number_format($total_mmk, 2);
                    $total_total_mmk[] = $total_mmk;
                @endphp
            </td>

            <td></td>
            <td></td>
        </tr>
    @endforeach
    <tr style="background-color: #FEF2CC;">
        <td colspan="4">
            Total
        </td>

        <td style="text-align: right">
            @php
                $total_particular_qty = array_sum($total_particular_qty);
                echo $total_particular_qty;
            @endphp
        </td>

        {{-- Operation Amount Total --}}
        <td style="text-align: right">
            @php
                $total_payment_operation_amount = array_sum($total_payment_operation_amount);
                echo number_format($total_payment_operation_amount, 2);
            @endphp
        </td>

        {{-- Amount USD --}}
        <td style="text-align: right">
            @php
                $total_amount_usd = array_sum($total_amount_usd);
                echo number_format($total_amount_usd, 2);
            @endphp
        </td>

        {{-- Total Exchange Rate --}}
        <td style="text-align: right">
            @php
                $total_exchange_rate = array_sum($total_exchange_rate);
                echo number_format($total_exchange_rate, 2);
            @endphp
        </td>

        {{-- Total MMK --}}
        <td style="text-align: right">
            @php
                $total_total_mmk = array_sum($total_total_mmk);
                echo number_format($total_total_mmk, 2);
            @endphp
        </td>

        <td></td>
        <td></td>
    </tr>
@endforeach
