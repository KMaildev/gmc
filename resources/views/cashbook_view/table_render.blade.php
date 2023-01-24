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
            {{ ucfirst($cash_book->sale_type ?? '') }}
        </td>

        <td style="text-align: center;">
            {{ $cash_book->sales_invoices_table->invoice_no ?? $cash_book->iv_two }}
        </td>

        <td></td>

        {{-- Pruchase INV --}}
        <td style="text-align: center">
            {{ $cash_book->purchase_orders_table->purchase_no ?? '' }}
        </td>

        {{-- SP Purchase	 --}}
        <td style="text-align: center">
            {{ $cash_book->part_purchases_table->invoice_no ?? '' }}
        </td>

        {{-- SP Sales Invoice --}}
        <td style="text-align: center">
            {{ $cash_book->part_sale_invoices_table->invoice_no ?? '' }}
        </td>

        {{-- Service Invoice --}}
        <td style="text-align: center">
            {{ $cash_book->service_invoice_table->invoice_no ?? '' }}
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
            <span class="short">
                @php
                    echo substr($cash_book->description, 0, 17);
                @endphp
            </span>
            <span class="more">
                {{ $cash_book->description }}
            </span>
            <a href="#" class="rm">More</a>
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

        <td style="text-align: center;">
            <div class="demo-inline-spacing">
                <div class="btn-group">
                    <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item" href="javascript:void(0);"
                                onclick="editCashBook({{ $cash_book->id }})">
                                Edit
                            </a>
                        </li>

                        <li>
                            <form action="{{ route('cashbook.destroy', $cash_book->id) }}" method="POST">
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
@endforeach
