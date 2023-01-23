@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">

        @include('accounting.daily_report.shared.search')

        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">Daily Report</h5>
                        <div class="card-title-elements ms-auto">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Export
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#" onclick="alert('Coming Soon')">
                                            Excel
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <p style="text-align: center;">
                    Myanmar Great Motor Co;Ltd Cash&Bank Statement
                    @php
                        echo $date;
                    @endphp
                </p>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-sm" style="margin-bottom: 0!important;">
                        <thead class="tbbg">
                            <tr>
                                <th style="color: white; text-align: center; width: 1%;">#</th>
                                <th style="color: white; text-align: center; width: 40%">Cash in Hand</th>
                                <th style="color: white; text-align: center; width: 20%">MMK(Income)</th>
                                <th style="color: white; text-align: center; width: 20%">MMK(Expenses)</th>
                                <th style="color: white; text-align: center; width: 20%">Balance</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @php
                                $i = 2;
                                $cash_in_total = 0;
                                $cash_out_total = 0;
                                
                                $closing_cash_balance = 0;
                                $cash_daily_closing_balance = $closing_cash_balance;
                            @endphp

                            {{-- Closing Clash and Bank Balance --}}
                            @foreach ($beforeFirstDays as $key => $beforeFirstDay)
                                @php
                                    // Cash
                                    $daily_cash_past = $cash_daily_closing_balance;
                                    $cash_daily_closing_balance = $daily_cash_past + ($beforeFirstDay->cash_in - $beforeFirstDay->cash_out);
                                @endphp
                            @endforeach

                            {{-- For Closing Balance --}}
                            <tr>
                                <td>1</td>
                                <td>Closing Balance</td>
                                <td></td>
                                <td></td>
                                <td style="text-align: right;">
                                    @php
                                        echo number_format($cash_daily_closing_balance, 2);
                                    @endphp
                                </td>
                            </tr>

                            @foreach ($cash_books as $key => $cash_book)
                                @if ($cash_book->cash_account_id == 1)
                                    <tr>
                                        <td style="text-align: center;">
                                            {{ $i++ }}
                                        </td>

                                        <td style="text-align: left;">
                                            {{ $cash_book->description }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                echo number_format($cash_book->cash_in, 2);
                                                $cash_in_total += $cash_book->cash_in;
                                            @endphp
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                echo number_format($cash_book->cash_out, 2);
                                                $cash_out_total += $cash_book->cash_out;
                                            @endphp
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tr style="background-color: #bdd7ee">
                            <td colspan="2" style="font-weight: bold; color: black">
                                @php
                                    echo $date;
                                @endphp
                                Cash Total Income&Expenses
                            </td>
                            <td style="text-align: right; font-weight: bold; color: black">
                                {{ number_format($cash_in_total, 2) }}
                            </td>
                            <td style="text-align: right; font-weight: bold; color: black">
                                {{ number_format($cash_out_total, 2) }}
                            </td>
                            <td style="text-align: right; font-weight: bold; color: black">
                                @php
                                    $cash_balance = $cash_daily_closing_balance + ($cash_in_total - $cash_out_total);
                                    echo number_format($cash_balance, 2);
                                @endphp
                            </td>
                        </tr>
                    </table>


                    <table class="table table-bordered table-sm">
                        <thead class="tbbg">
                            <tr>
                                <th style="color: white; text-align: center; width: 1%;">#</th>
                                <th style="color: white; text-align: center; width: 40%">BANK</th>
                                <th style="color: white; text-align: center; width: 20%">MMK(Income)</th>
                                <th style="color: white; text-align: center; width: 20%">MMK(Expenses)</th>
                                <th style="color: white; text-align: center; width: 20%">Balance</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @php
                                $i = 2;
                                $bank_in_total = 0;
                                $bank_out_total = 0;
                                
                                $closing_bank_balance = 0;
                                $bank_daily_closing_balance = $closing_bank_balance;
                            @endphp

                            {{-- Closing Clash and Bank Balance --}}
                            @foreach ($beforeFirstDays as $key => $beforeFirstDay)
                                @php
                                    // Cash
                                    $daily_bank_past = $bank_daily_closing_balance;
                                    $bank_daily_closing_balance = $daily_bank_past + ($beforeFirstDay->bank_in - $beforeFirstDay->bank_out);
                                @endphp
                            @endforeach

                            {{-- For Closing Balance --}}
                            <tr>
                                <td>1</td>
                                <td>Closing Balance</td>
                                <td></td>
                                <td></td>
                                <td style="text-align: right;">
                                    @php
                                        echo number_format($bank_daily_closing_balance, 2);
                                    @endphp
                                </td>
                            </tr>

                            @foreach ($cash_books as $key => $cash_book)
                                @if ($cash_book->cash_account_id == 2)
                                    <tr>
                                        <td style="text-align: center;">
                                            {{ $i++ }}
                                        </td>

                                        <td style="text-align: left;">
                                            {{ $cash_book->description }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                echo number_format($cash_book->bank_in, 2);
                                                $bank_in_total += $cash_book->bank_in;
                                            @endphp
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                echo number_format($cash_book->bank_out, 2);
                                                $bank_out_total += $cash_book->bank_out;
                                            @endphp
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tr style="background-color: #bdd7ee">
                            <td colspan="2" style="font-weight: bold; color: black">
                                @php
                                    echo $date;
                                @endphp
                                Bank Total Income&Expenses
                            </td>
                            <td style="text-align: right; font-weight: bold; color: black">
                                {{ number_format($bank_in_total, 2) }}
                            </td>
                            <td style="text-align: right; font-weight: bold; color: black">
                                {{ number_format($bank_out_total, 2) }}
                            </td>
                            <td style="text-align: right; font-weight: bold; color: black">
                                @php
                                    $bank_balance = $bank_daily_closing_balance + ($bank_in_total - $bank_out_total);
                                    echo number_format($bank_balance, 2);
                                @endphp
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
