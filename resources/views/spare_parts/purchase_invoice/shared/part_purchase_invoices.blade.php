<tr style="background-color: #e1dcdc; color: black; text-align: center;">

    <td>
        {{ $key + 1 }}
    </td>

    <td>
        {{ $part_purchase_invoice->invoice_no }}
    </td>

    <td>
        {{ $part_purchase_invoice->invoice_date }}
    </td>

    <td>
        {{ $part_purchase_invoice->supplier_table->name ?? '' }}
    </td>

    <td>
        {{ $part_purchase_invoice->invoice_remark ?? '' }}
    </td>

    <td>
        {{ $part_purchase_invoice->users_table->name ?? '' }}
    </td>

    <td style="text-align: center;">
        <div class="demo-inline-spacing">
            <div class="btn-group">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">

                    <li hidden>
                        <a class="dropdown-item"
                            href="{{ route('spare_part_sale_invoice.edit', $part_purchase_invoice->id) }}">
                            Edit
                        </a>
                    </li>

                    <li>
                        <form action="{{ route('spare_part_purchase_invoice.destroy', $part_purchase_invoice->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="dropdown-item del_confirm" id="confirm-text"
                                data-toggle="tooltip">Delete</button>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </td>
</tr>
