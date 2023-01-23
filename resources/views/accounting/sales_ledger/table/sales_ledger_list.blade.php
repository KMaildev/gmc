<table class="" style="margin-bottom: 1px !important;">
    <thead class="tbbg">
        <tr>
            <td rowspan="2" style="color: white; text-align: center; width: 1%;">
                Sr.No
            </td>
            <td rowspan="2" style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                Date
            </td>
            <td rowspan="2" style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                Dealer Name
            </td>
            <td rowspan="2" style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                Post Ref.
            </td>
            <td rowspan="2" style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                Debit
            </td>
            <td rowspan="2" style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                Credit
            </td>
            <td colspan="2" style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                Balance
            </td>
        </tr>
        <tr>
            <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                Debit
            </td>
            <td style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                Credit
            </td>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
            $DebitTotal = [];
            $CreditTotal = [];
        @endphp
        @foreach ($sales_invoices as $key => $sales_invoice)
            <tr>
                <td>
                    {{ $key + 1 }}
                </td>

                <td style="text-align: center;">
                    {{ $sales_invoice->invoice_date ?? '' }}
                </td>

                <td style="text-align: center;">
                    {{ $sales_invoice->customers_table->company_name ?? '' }}
                </td>

                <td style="text-align: center;">
                    {{ $sales_invoice->post_ref ?? '' }}
                </td>

                <td style="text-align: right; font-weight: bold;">
                    @php
                        $total_amount = [];
                    @endphp
                    @foreach ($sales_invoice->sales_items_table as $sales_items)
                        @php
                            $qty = $sales_items->qty;
                            $unit_price = $sales_items->unit_price;
                            $sale_value = $qty * $unit_price;
                            $total_amount[] = $sale_value;
                        @endphp
                    @endforeach
                    @php
                        $amount_total = array_sum($total_amount);
                    @endphp
                </td>

                <td style="text-align: right; font-weight: bold;">
                    @php
                        $amount_total = array_sum($total_amount);
                        echo number_format($amount_total, 2);
                        $CreditTotal[] = $amount_total;
                    @endphp
                </td>

                <td style="text-align: right; font-weight: bold;">
                    0
                </td>

                <td style="text-align: right; font-weight: bold;">
                    0
                </td>
            </tr>
        @endforeach
    </tbody>
    <tr>
        <td colspan="4">Total:</td>
        <td style="text-align: right; font-weight: bold;">
            0
        </td>
        <td style="text-align: right; font-weight: bold;">
            @php
                $TotalCredit = array_sum($CreditTotal);
                echo number_format($TotalCredit, 2);
            @endphp
        </td>
        <td style="text-align: right; font-weight: bold;">
            0
        </td>
        <td style="text-align: right; font-weight: bold;">
            0
        </td>
    </tr>
</table>