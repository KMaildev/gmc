<tr style="background-color: #e1dcdc; color: black; text-align: center;">

    <td>
        {{ $key + 1 }}
    </td>

    <td>
        {{ $sales_invoice->invoice_no }}
    </td>

    <td>
        {{ $sales_invoice->invoice_date }}
    </td>

    <td>
        {{ $sales_invoice->customers_table->company_name ?? '' }}
    </td>

    <td>
        {{ $sales_invoice->sales_type ?? '' }}
    </td>

    <td>
        {{ $sales_invoice->showroom_name ?? '' }}
    </td>

    <td>
        {{ $sales_invoice->invoice_remark ?? '' }}
    </td>

    <td>
        {{ $sales_invoice->users_table->name ?? '' }}
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
                        <a class="dropdown-item" href="{{ route('spare_part_sale_invoice.show', $sales_invoice->id) }}" target="_blank">
                            View Invoice
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ route('spare_part_sale_invoice.edit', $sales_invoice->id) }}">
                            Edit
                        </a>
                    </li>

                    <li>
                        <form action="{{ route('spare_part_sale_invoice.destroy', $sales_invoice->id) }}"
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
