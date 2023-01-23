<table style="width: 100%; border: 1px solid;">
    <tr>
        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
            @php
                $cash_book_cash_out = $cash_books->cash_out;
                $cash_book_bank_out = $cash_books->bank_out;
                $TotalBankCashRefund = $cash_book_cash_out + $cash_book_bank_out;
                if ($TotalBankCashRefund <= 0) {
                    continue;
                }
            @endphp
            <td style="font-size: 12px; text-align: center;">
                Refund
            </td>
            <td style="font-size: 12px;">
                Refund Date
            </td>
        @endforeach
    </tr>
    <tr>
        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
            @php
                $cash_book_cash_out = $cash_books->cash_out;
                $cash_book_bank_out = $cash_books->bank_out;
                $TotalBankCashRefund = $cash_book_cash_out + $cash_book_bank_out;
                if ($TotalBankCashRefund <= 0) {
                    continue;
                }
            @endphp
            <td style="font-size: 12px; text-align: right; font-weight: bold;">
                @php
                    echo number_format($TotalBankCashRefund, 2);
                @endphp
            </td>
            <td style="font-size: 12px;">
                {{ $cash_books->cash_book_date ?? '' }}
            </td>
        @endforeach
    </tr>
</table>
