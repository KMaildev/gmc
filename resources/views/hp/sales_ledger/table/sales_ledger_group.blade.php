<table class="" style="margin-bottom: 1px !important;">
    <thead class="tbbg">
        <tr>
            <td rowspan="2" style="color: white; text-align: center; width: 1%;">
                Sr.No
            </td>
            <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                Dealer Name
            </td>
            <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                Revenue
            </td>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
            $total_amounts = [];
            $i = 1;
        @endphp
        @foreach ($sales_invoices_groups as $k => $sales_invoices_group)
            @if ($sales_invoices_group->customers_table->dealer_or_hp == 'hp')
                <tr>
                    <td>
                        {{ $i++ }}
                    </td>

                    <td>
                        {{ $sales_invoices_group->customers_table->company_name ?? '' }}
                    </td>

                    <td style="text-align: right; font-weight: bold;">
                        {{ number_format($sales_invoices_group->total_amount, 2) }}
                        @php
                            $total_amounts[] = $sales_invoices_group->total_amount;
                        @endphp
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
    <tr>
        <td colspan="2">
            Total:
        </td>
        <td style="text-align: right; font-weight: bold;">
            @php
                $total_amounts = array_sum($total_amounts);
                echo number_format($total_amounts, 2);
            @endphp
        </td>
    </tr>
</table>
