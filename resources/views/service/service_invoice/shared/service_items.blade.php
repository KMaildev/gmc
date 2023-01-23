<tr style="background-color: #DDEBF7; color: black; text-align: center;">
    <td colspan="6"></td>
    <td>
        Description
    </td>

    <td>
        Unit Price
    </td>

    <td>
        Qty
    </td>

    <td>
        Total Price
    </td>
    <td>
        Remark
    </td>
</tr>

@php
    $total_unit_price = [];
    $total_qty = [];
    $total_ks = [];
@endphp
@foreach ($service_invoice->service_invoice_items as $item_key => $service_invoice_item)
    <tr style="border: 1px solid black;">
        <td style="text-align: center;">
            {{ $item_key + 1 }}
        </td>

        <td colspan="4"></td>

        <td style="text-align: center;">
            {{ $service_invoice_item->service_invoice_items->part_number ?? '' }}
        </td>

        <td style="text-align: center;">
            {{ $service_invoice_item->description ?? '' }}
        </td>

        <td style="text-align: right;">
            @php
                $unit_price = $service_invoice_item->unit_price ?? 0;
                echo number_format($unit_price, 2);
                $total_unit_price[] = $unit_price;
            @endphp
        </td>

        <td style="text-align: right;">
            @php
                $qty = $service_invoice_item->qty ?? 0;
                echo number_format($qty);
                $total_qty[] = $qty;
            @endphp
        </td>


        <td style="text-align: right;">
            @php
                $ks = $unit_price * $qty;
                echo number_format($ks, 2);
                $total_ks[] = $ks;
            @endphp
        </td>


        <td style="text-align: right;">
            {{ $service_invoice_item->remark ?? '' }}
        </td>
    </tr>
@endforeach
<tr>
    <td style="font-weight: bold">
        Total
    </td>

    <td colspan="6"></td>
    <td style="text-align: right">
        @php
            $total_unit_price = array_sum($total_unit_price);
            echo number_format($total_unit_price, 2);
        @endphp
    </td>

    <td style="text-align: right">
        @php
            $total_qty = array_sum($total_qty);
            echo number_format($total_qty);
        @endphp
    </td>

    <td style="text-align: right">
        @php
            $total_ks = array_sum($total_ks);
            echo number_format($total_ks, 2);
        @endphp
    </td>
</tr>
