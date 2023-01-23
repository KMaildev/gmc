@extends('layouts.menus.accounting')
@section('content')
    <style>
        .table-outer-wrapper {
            max-width: fit-content;
            max-height: fit-content;
        }

        .another-table-wrapper {
            overflow-y: scroll;
            overflow-x: scroll;
            height: fit-content;
            max-height: 66.4vh;
            margin-top: 22px;
        }

        table,
        td,
        th {
            border: 1px solid;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
    <div class="row justify-content-center">

        @include('accounting.cash_book.shared.search', [
            'chartof_accounts' => $chartof_accounts,
        ])

        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">Cash Book</h5>
                        <div class="card-title-elements ms-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('cashbook_export') }}">Excel
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <p style="color: red">
                        @php
                            echo $filter_date['from_date'];
                            echo '～';
                            echo $filter_date['to_date'];
                        @endphp
                    </p>
                </div>

                <div class="table-outer-wrapper">
                    <div class="another-table-wrapper">
                        <table>
                            <thead class="tbbg">
                                <th
                                    style="color: white; background-color: #2e696e; text-align: center; width: 1%; height: 50px;">
                                    #
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Date
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Month
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Year
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    IV-No
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Sale Type
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    IV-No2
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Principle/Interest/Other
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Purchase IV
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    A/C Code
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    A/C Head
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    A/C Name
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Description
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Cash AC
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Cash-In
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Cash-Out
                                </th>
                                <th
                                    style="color: white; background-color: #2e696e; text-align: center; padding-right: 50px; padding-left: 50px;">
                                    Cash-Balance
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Bank AC
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Bank-In
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Bank-Out
                                </th>

                                <th
                                    style="color: white; background-color: #2e696e; text-align: center; padding-right: 50px; padding-left: 50px;">
                                    Bank-Balance
                                </th>

                                <th
                                    style="color: white; background-color: #2e696e; text-align: center; padding-right: 50px; padding-left: 50px;">
                                    Deposit(Cash+Bank)
                                </th>

                                <th
                                    style="color: white; background-color: #2e696e; text-align: center; padding-right: 50px; padding-left: 50px;">
                                    Withdraw(Cash+Bank)
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Bank Name
                                </th>

                                <th style="color: white; background-color: #2e696e; text-align: center;">
                                    Action
                                </th>
                            </thead>
                            <tbody class="table-border-bottom-0 t">

                                {{-- cash book create --}}
                                @if ($cash_book_form_status == 'is_create')
                                    @include('accounting.cash_book.form.create_form', [
                                        'chartof_accounts' => $chartof_accounts,
                                        'sales_invoices' => $sales_invoices,
                                    ])
                                @elseif ($cash_book_form_status == 'is_edit')
                                    @include('accounting.cash_book.form.edit_form', [
                                        'chartof_accounts' => $chartof_accounts,
                                        'edit_cash_book_data' => $edit_cash_book_data,
                                    ])
                                @endif

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

                                        <td></td>

                                        <td style="text-align: center;">
                                            {{ $cash_book->sales_invoices_table->invoice_no ?? $cash_book->iv_two }}
                                        </td>

                                        <td></td>

                                        {{-- Pruchase INV --}}
                                        <td style="text-align: center">
                                            {{ $cash_book->purchase_orders_table->purchase_no ?? '' }}
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
                                                    <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu">

                                                        <li>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="alert('Coming')">Detail</a>
                                                        </li>

                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('cashbook.edit', $cash_book->id) }}">Edit</a>
                                                        </li>

                                                        <li>
                                                            <form action="{{ route('cashbook.destroy', $cash_book->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="dropdown-item del_confirm"
                                                                    id="confirm-text" data-toggle="tooltip">Delete</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
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
                                <th></th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
