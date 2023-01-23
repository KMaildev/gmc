<tr style="background-color: #DDEBF7; color: black; text-align: center;">
    <td></td>
    <td>
        Parts No
    </td>

    <td>
        Description
    </td>

    <td>
        Qty
    </td>

    <td>
        Purchase Price
    </td>

    <td>
        Amount
    </td>
    <td></td>
</tr>

@php
    $total_unit_price = [];
    $total_qty = [];
    $total_ks = [];
@endphp
@foreach ($part_purchase_invoice->part_purchase_items_table as $item_key => $part_purchase_item)
    <tr style="border: 1px solid black;">
        <td style="text-align: center;">
            {{ $item_key + 1 }}
        </td>

        <td></td>

        <td style="text-align: center;">
            {{ $part_purchase_item->spare_part_items_table->part_number ?? '' }}
        </td>

        <td style="text-align: center;">
            {{ $part_purchase_item->description ?? '' }}
        </td>


        <td style="text-align: right;">
            @php
                $qty = $part_purchase_item->qty ?? 0;
                echo number_format($qty);
                $total_qty[] = $qty;
            @endphp
        </td>

        <td style="text-align: right;">
            @php
                $unit_price = $part_purchase_item->unit_price ?? 0;
                echo number_format($unit_price, 2);
                $total_unit_price[] = $unit_price;
            @endphp
        </td>


        <td style="text-align: right;">
            @php
                $ks = $unit_price * $qty;
                echo number_format($ks, 2);
                $total_ks[] = $ks;
            @endphp
        </td>
    </tr>
@endforeach

<tr>
    <td style="font-weight: bold">
        Total
    </td>

    <td colspan="3"></td>

    <td style="text-align: right">
        @php
            $total_qty = array_sum($total_qty);
            echo number_format($total_qty);
        @endphp
    </td>

    <td style="text-align: right">
        @php
            $total_unit_price = array_sum($total_unit_price);
            echo number_format($total_unit_price, 2);
        @endphp
    </td>


    <td style="text-align: right">
        @php
            $total_ks = array_sum($total_ks);
            echo number_format($total_ks, 2);
        @endphp
    </td>
</tr>
