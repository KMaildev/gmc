<tr style="background-color: #DDEBF7;">
    <td>
        {{ $key + 1 }}
    </td>

    <td colspan="11" style="text-align: center">
        Myanmar Great Motor Co.,Ltd Vehicle List for
        {{ $arrival_information->arrival_date ?? '' }}
        <span style="font-weight: bold">
            ({{ $arrival_information->arrival_items_table->sum('shipping_qty') }} Unit)
        </span>
    </td>
</tr>