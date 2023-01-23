{{-- Invoice --}}
<tr>
    <td style="background-color: #F6B733; text-align: center;">
        {{ $key + 1 }}
    </td>

    <td style="text-align: center;">
        {{ $purchase_order->purchase_no ?? '' }}
    </td>

    <td style="text-align: center;">
        {{ $purchase_order->purchase_date ?? '' }}
    </td>

    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>

    <td style="text-align: center;">
        {{ $purchase_order->order_status ?? '' }}
    </td>

    <td style="text-align: center;">
        <div class="demo-inline-spacing">
            <div class="btn-group">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">

                    <li>
                        <a class="dropdown-item" href="{{ route('purchase_operation_create', $purchase_order->id) }}">
                            Operation
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('arrival_management_create', $purchase_order->id) }}">
                            Arrival Management
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('purchase_order.edit', $purchase_order->id) }}">
                            Edit Invoice
                        </a>
                    </li>

                    <li>
                        <form action="{{ route('purchase_order.destroy', $purchase_order->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="dropdown-item del_confirm" id="confirm-text">
                                Delete Invoice
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </td>
</tr>

{{-- Products Info --}}
<tr style=" background-color: #DDEBF7; color: black">
    <td style="text-align: center; width: 1%;">
        #
    </td>
    <td style="text-align: center; width: 10%;">
        Product Name
    </td>

    <td style="text-align: center; width: 10%;">
        Models
    </td>

    <td style="text-align: center; width: 10%;">
        Order Quantity
    </td>

    <td style="text-align: center; width: 10%;">
        CIF Yangon ( USD )
    </td>

    <td style="text-align: center; width: 10%;">
        Amount USD
    </td>

    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>

{{-- Products Items --}}
@php
    $total_order_qty = [];
    $total_CIF_USD = [];
    $total_amount_USD = [];
@endphp
@foreach ($purchase_order->purchase_items_table as $key => $purchase_item)
    <tr>
        <td style="text-align: center">
            {{ $key + 1 }}
        </td>

        <td style="text-align: center">
            {{ $purchase_item->brands_table->name ?? '' }}
        </td>

        <td style="text-align: center">
            {{ $purchase_item->type_of_models_table->title ?? '' }}
        </td>

        <td style="text-align: right">
            {{ $purchase_item->qty ?? 0 }}
        </td>

        <td style="text-align: right">
            {{ number_format($purchase_item->cif_usd, 2) }}
        </td>

        <td style="text-align: right">
            @php
                $qty = $purchase_item->qty ?? 0;
                $cif_usd = $purchase_item->cif_usd ?? 0;
                $amount_usd = $qty * $cif_usd;
                echo number_format($amount_usd, 2);
                $total_order_qty[] = $qty;
                $total_CIF_USD[] = $cif_usd;
                $total_amount_USD[] = $amount_usd;
            @endphp
        </td>

        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
@endforeach

{{-- Product Payment Tootal --}}
<tr style="background-color: #FEF2CC;">
    <td style="text-align: center; width: 1%;">
        Total
    </td>
    <td colspan="2"></td>

    {{-- Total Order Quantity --}}
    <td style="text-align: right">
        @php
            $total_order_qty = array_sum($total_order_qty);
            echo number_format($total_order_qty);
        @endphp
    </td>

    {{-- Total CIF Yangon ( USD ) --}}
    <td style="text-align: right">
        <span hidden>
            @php
                $total_CIF_USD = array_sum($total_CIF_USD);
                echo number_format($total_CIF_USD, 2);
            @endphp
        </span>
    </td>

    {{-- Amount USD --}}
    <td style="text-align: right">
        @php
            $total_amount_USD = array_sum($total_amount_USD);
            echo number_format($total_amount_USD, 2);
        @endphp
    </td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
