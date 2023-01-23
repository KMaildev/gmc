<table style="width: 100%; border: 1px solid;">
    <tr>
        @php
            $pay_time = 1;
        @endphp
        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
            @php
                $cash_book_cash_in = $cash_books->cash_in;
                $cash_book_bank_in = $cash_books->bank_in;
                $TotalBankCash = $cash_book_cash_in + $cash_book_bank_in;
                if ($TotalBankCash <= 0) {
                    continue;
                }
            @endphp
            @php
                $payment_time = $pay_time++;
            @endphp
            <td style="font-size: 12px; text-align: center;">
                @if ($payment_time == 1)
                    {{ $payment_time }}st Payment
                @elseif ($payment_time == 2)
                    {{ $payment_time }}nd Payment
                @elseif ($payment_time == 3)
                    {{ $payment_time }}rd Payment
                @elseif ($payment_time >= 4 && $payment_time <= 10)
                    {{ $payment_time }}th Payment
                @else
                    Respectively
                @endif
            </td>
            <td style="font-size: 12px;">
                Received Date
            </td>
        @endforeach
    </tr>
    <tr>
        @foreach ($sales_invoice->cash_books_table as $key => $cash_books)
            @php
                $cash_book_cash_in = $cash_books->cash_in;
                $cash_book_bank_in = $cash_books->bank_in;
                $TotalBankCash = $cash_book_cash_in + $cash_book_bank_in;
                if ($TotalBankCash <= 0) {
                    continue;
                }
            @endphp
            <td style="font-size: 12px; text-align: right; font-weight: bold;">
                @php
                    echo number_format($TotalBankCash, 2);
                @endphp
            </td>
            <td style="font-size: 12px;">
                {{ $cash_books->cash_book_date ?? '' }}
            </td>
        @endforeach
    </tr>
</table>
