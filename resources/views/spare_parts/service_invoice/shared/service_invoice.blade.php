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
</tr>
