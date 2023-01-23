<table class="table">
    <thead>
        <tr>
            <th style="width: 1%">#</th>
            <th style="width: 3vh; text-align: center;">Date</th>
            <th style="width: 3vh; text-align: center;">Month</th>
            <th style="width: 3vh; text-align: center;">Year</th>
            <th style="width: 3vh; text-align: center;">IV-No</th>
            <th style="width: 3vh; text-align: center;">IV-No2</th>
            <th style="width: 3vh; text-align: center;">A/C Code</th>
            <th style="width: 3vh; text-align: center;">A/C Head</th>
            <th style="width: 3vh; text-align: center;">A/C Name</th>
            <th style="width: 3vh; text-align: center;">Description</th>
            <th style="width: 3vh; text-align: center;">Cash AC</th>
            <th style="width: 3vh; text-align: center;">Cash-In</th>
            <th style="width: 3vh; text-align: center;">Cash-Out</th>
            <th style="width: 3vh; text-align: center;">Cash-Balance</th>
            <th style="width: 3vh; text-align: center;">Bank AC</th>
            <th style="width: 3vh; text-align: center;">Bank-In</th>
            <th style="width: 3vh; text-align: center;">Bank-Out</th>
            <th style="width: 3vh; text-align: center;">Bank-Balance</th>
            <th style="width: 3vh; text-align: center;">Deposit(Cash+Bank)</th>
            <th style="width: 3vh; text-align: center;">Withdraw(Cash+Bank)</th>
            <th style="width: 3vh; text-align: center;">Bank Name</th>
        </tr>
    </thead>
    <tbody>
        <?php $deposit = 0; ?>
        <?php $withdraw = 0; ?>
        <?php $closing_cash_balance = 0; //8898194.85   8889694.85 ?>
        <?php $closing_bank_balance = 0; //606246564.14 ?>

        @php
            $cash_daily_closing_balance = $closing_cash_balance;
        @endphp
        @php
            $bank_daily_closing_balance = $closing_bank_balance;
        @endphp

        {{-- Closing Clash and Bank Balance --}}
        @foreach ($beforeFirstDays as $key => $beforeFirstDay)
            @php
                // Cash
                $daily_cash_past = $cash_daily_closing_balance;
                $cash_daily_closing_balance = $daily_cash_past + ($beforeFirstDay->cash_in - $beforeFirstDay->cash_out);
                
                // Bank
                $daily_bank_past = $bank_daily_closing_balance;
                $bank_daily_closing_balance = $daily_bank_past + ($beforeFirstDay->bank_in - $beforeFirstDay->bank_out);
            @endphp
        @endforeach

        @foreach ($cash_books as $key => $cash_book)
            <tr>
                <td style="text-align: center;">
                    {{ $key + 1 }}
                </td>

                <td style="text-align: center;">
                    {{ $cash_book->cash_book_date }}
                </td>

                <td style="text-align: center;">
                    {{ $cash_book->month }}
                </td>

                <td style="text-align: center;">
                    {{ $cash_book->year }}
                </td>

                <td style="text-align: center;">
                    {{ $cash_book->iv_one }}
                </td>

                <td style="text-align: center;">
                    {{ $cash_book->iv_two }}
                </td>

                <td style="text-align: center;">
                    {{ $cash_book->chartof_account_table->coa_number ?? '' }}
                </td>

                <td style="text-align: center;">
                    {{ $cash_book->account_types_table->description ?? '' }}
                </td>

                <td style="text-align: center;">
                    {{ $cash_book->chartof_account_table->description ?? '' }}
                </td>

                <td style="text-align: center;">
                    {{ $cash_book->description }}
                </td>

                <td style="text-align: center;">
                    {{ $cash_book->get_cash_account->coa_number ?? '' }}
                </td>


                <td style="text-align: right;">
                    {{ number_format($cash_book->cash_in, 2) }}
                </td>

                <td style="text-align: right;">
                    {{ number_format($cash_book->cash_out, 2) }}
                </td>

                {{-- cash balance --}}
                <td style="text-align: right;">
                    @php
                        $daily_cash_past = $cash_daily_closing_balance;
                        $cash_daily_closing_balance = $daily_cash_past + ($cash_book->cash_in - $cash_book->cash_out);
                        echo number_format($cash_daily_closing_balance, 2);
                    @endphp
                </td>

                <td style="text-align: center;">
                    {{ $cash_book->get_bank_account->coa_number ?? '' }}
                </td>

                <td style="text-align: right;">
                    {{ number_format($cash_book->bank_in, 2) }}
                </td>

                <td style="text-align: right;">
                    {{ number_format($cash_book->bank_out, 2) }}
                </td>

                {{-- bank balance --}}
                <td style="text-align: right;">
                    @php
                        $daily_bank_past = $bank_daily_closing_balance;
                        $bank_daily_closing_balance = $daily_bank_past + ($cash_book->bank_in - $cash_book->bank_out);
                        echo number_format($bank_daily_closing_balance, 2);
                    @endphp
                </td>

                {{-- Deposit(Cash+Bank) --}}
                <td style="text-align: right;">
                    <?php
                    $deposit = $cash_book->cash_in + $cash_book->bank_in;
                    echo number_format($deposit, 2);
                    ?>
                </td>

                {{-- Withdraw(Cash+Bank) --}}
                <td style="text-align: right">
                    <?php
                    $withdraw = $cash_book->cash_out + $cash_book->bank_out;
                    echo number_format($withdraw, 2);
                    ?>
                </td>

                <td style="text-align: center;">
                    {{ $cash_book->get_bank_account->description ?? '' }}
                </td>
            </tr>
        @endforeach
    </tbody>
    <tr>
        <td colspan="11">Total:</td>
        {{-- Cash Calculator --}}
        <td style="text-align: right; font-weight: bold">
            {{ number_format($cash_books->sum('cash_in'), 2) }}
        </td>
        <td style="text-align: right; font-weight: bold">
            {{ number_format($cash_books->sum('cash_out'), 2) }}
        </td>

        <td></td>

        <td></td>
        {{-- Bank Calculator --}}
        <td style="text-align: right; font-weight: bold">
            {{ number_format($cash_books->sum('bank_in'), 2) }}
        </td>

        <td style="text-align: right; font-weight: bold">
            {{ number_format($cash_books->sum('bank_out'), 2) }}
        </td>

        <td></td>

        {{-- Deposit(Cash+Bank) --}}
        <td style="text-align: right; font-weight: bold">
            {{ number_format($cash_books->sum('cash_in') + $cash_books->sum('bank_in'), 2) }}
        </td>

        {{-- Withdraw(Cash+Bank) --}}
        <td style="text-align: right; font-weight: bold">
            {{ number_format($cash_books->sum('cash_out') + $cash_books->sum('bank_out'), 2) }}
        </td>

        <th></th>
    </tr>
</table>
