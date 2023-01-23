<tr style="background-color: #e1dcdc; color: black; text-align: center;">

    <td>
        {{ $key + 1 }}
    </td>

    <td>
        {{ $service_invoice->invoice_no }}
    </td>

    <td>
        {{ $service_invoice->invoice_date }}
    </td>

    <td>
        {{ $service_invoice->customers_table->company_name ?? '' }}
    </td>

    <td>
        {{ $service_invoice->vin_number ?? '' }}
    </td>

    <td>
        {{ $service_invoice->reg_number ?? '' }}
    </td>

    <td>
        {{ $service_invoice->time_in ?? '' }}
    </td>

    <td>
        {{ $service_invoice->time_out ?? '' }}
    </td>

    <td>
        {{ $service_invoice->types_of_service_table->types_of_service ?? '' }}
    </td>

    <td>
        {{ $service_invoice->users_table->name ?? '' }}
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
                        <a class="dropdown-item" href="#" target="_blank">
                            View Invoice
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            Edit
                        </a>
                    </li>

                    <li>
                        <form action="#" method="POST">
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
