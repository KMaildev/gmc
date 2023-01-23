@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Cash Trial
                        </h5>
                        @include('reporting.cash_trial.filter_action')
                    </div>
                </div>

                <span style="font-weight: bold;">
                    {{ $start_date ?? '' }}
                    to
                    {{ $end_date ?? '' }}
                </span>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                        aria-labelledby="HeadersCol" tabindex="0">

                        <table class="table-bordered main-table" style="margin-bottom: 10px">

                            <thead class="tbbg">
                                <tr>
                                    <td rowspan="2"
                                        style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                        Sr.No
                                    </td>

                                    <td rowspan="2"
                                        style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    </td>

                                    <td colspan="1"
                                        style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        Deposit
                                    </td>

                                    <td colspan="1"
                                        style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        Withdraw
                                    </td>
                                </tr>

                                <tr>
                                    <td style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        MMK
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        MMK
                                    </td>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" id="tablecontents">

                                {{-- Opening Balance (Bank) --}}
                                <tr>
                                    <td>
                                        1
                                    </td>

                                    <td>
                                        Opening Balance (Bank)
                                    </td>

                                    <td style="text-align: right">
                                        @php
                                            $total_opening_balance_bank_in = [];
                                        @endphp
                                        @foreach ($opening_balance_banks as $key => $opening_balance_bank)
                                            @php
                                                $bank_in = $opening_balance_bank->cash_books_table->sum('bank_in');
                                                $total_in = $bank_in;
                                                $total_opening_balance_bank_in[] = $total_in;
                                            @endphp
                                        @endforeach
                                        @php
                                            $total_opening_balance_bank_in = array_sum($total_opening_balance_bank_in);
                                            echo number_format($total_opening_balance_bank_in, session('decimal'));
                                        @endphp
                                    </td>

                                    <td style="text-align: right">
                                        @php
                                            $total_opening_balance_bank_out = [];
                                        @endphp
                                        @foreach ($opening_balance_banks as $key => $opening_balance_bank)
                                            @php
                                                $bank_out = $opening_balance_bank->cash_books_table->sum('bank_out');
                                                $total_out = $bank_out;
                                                $total_opening_balance_bank_out[] = $total_out;
                                            @endphp
                                        @endforeach
                                        @php
                                            $total_opening_balance_bank_out = array_sum($total_opening_balance_bank_out);
                                            echo number_format($total_opening_balance_bank_out, session('decimal'));
                                        @endphp
                                    </td>
                                </tr>


                                {{-- Opening Balance (Cash) --}}
                                <tr>
                                    <td>
                                        2
                                    </td>

                                    <td>
                                        Opening Balance (Cash)
                                    </td>

                                    <td style="text-align: right">
                                        @php
                                            $total_opening_balance_cash_in = [];
                                        @endphp
                                        @foreach ($opening_balance_cashs as $key => $opening_balance_cash)
                                            @php
                                                $cash_in = $opening_balance_cash->cash_books_table->sum('cash_in');
                                                $total_in = $cash_in;
                                                $total_opening_balance_cash_in[] = $total_in;
                                            @endphp
                                        @endforeach
                                        @php
                                            $total_opening_balance_cash_in = array_sum($total_opening_balance_cash_in);
                                            echo number_format($total_opening_balance_cash_in, session('decimal'));
                                        @endphp
                                    </td>

                                    <td style="text-align: right">
                                        @php
                                            $total_opening_balance_cash_out = [];
                                        @endphp
                                        @foreach ($opening_balance_cashs as $key => $opening_balance_cash)
                                            @php
                                                $cash_out = $opening_balance_cash->cash_books_table->sum('cash_out');
                                                $total_out = $cash_out;
                                                $total_opening_balance_cash_out[] = $total_out;
                                            @endphp
                                        @endforeach
                                        @php
                                            $total_opening_balance_cash_out = array_sum($total_opening_balance_cash_out);
                                            echo number_format($total_opening_balance_cash_out, session('decimal'));
                                        @endphp
                                    </td>
                                </tr>


                                <tr>
                                    <td colspan="4"><br></td>
                                </tr>


                                {{-- All Account  --}}
                                @foreach ($cash_trials as $key => $cash_trial)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $cash_trial->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_in = $cash_trial->cash_books_table->sum('cash_in');
                                                $bank_in = $cash_trial->cash_books_table->sum('bank_in');
                                                $total_in = $cash_in + $bank_in;
                                                echo number_format($total_in, session('decimal'));
                                            @endphp
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_out = $cash_trial->cash_books_table->sum('cash_out');
                                                $bank_out = $cash_trial->cash_books_table->sum('bank_out');
                                                $total_out = $cash_out + $bank_out;
                                                echo number_format($total_out, session('decimal'));
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach


                                <tr>
                                    <td colspan="4"><br></td>
                                </tr>



                                {{-- Closing Balance (Bank) --}}
                                <tr>
                                    <td>
                                        1
                                    </td>

                                    <td>
                                        Closing Balance (Bank)
                                    </td>

                                    <td style="text-align: right">
                                        @php
                                            $total_closing_balance_bank_in = [];
                                        @endphp
                                        @foreach ($closing_balance_banks as $key => $closing_balance_bank)
                                            @php
                                                $bank_in = $closing_balance_bank->cash_books_table->sum('bank_in');
                                                $total_in = $bank_in;
                                                $total_closing_balance_bank_in[] = $total_in;
                                            @endphp
                                        @endforeach
                                        @php
                                            $total_closing_balance_bank_in = array_sum($total_closing_balance_bank_in);
                                            echo number_format($total_closing_balance_bank_in, session('decimal'));
                                        @endphp
                                    </td>

                                    <td style="text-align: right">
                                        @php
                                            $total_closing_balance_bank_out = [];
                                        @endphp
                                        @foreach ($closing_balance_banks as $key => $closing_balance_bank)
                                            @php
                                                $bank_out = $closing_balance_bank->cash_books_table->sum('bank_out');
                                                $total_out = $bank_out;
                                                $total_closing_balance_bank_out[] = $total_out;
                                            @endphp
                                        @endforeach
                                        @php
                                            $total_closing_balance_bank_out = array_sum($total_closing_balance_bank_out);
                                            echo number_format($total_closing_balance_bank_out, session('decimal'));
                                        @endphp
                                    </td>
                                </tr>






                                {{-- Closing Balance (Cash) --}}
                                <tr>
                                    <td>
                                        2
                                    </td>

                                    <td>
                                        Closing Balance (Cash)
                                    </td>

                                    <td style="text-align: right">
                                        @php
                                            $total_closing_balance_cash_in = [];
                                        @endphp
                                        @foreach ($closing_balance_cashs as $key => $closing_balance_cash)
                                            @php
                                                $cash_in = $closing_balance_cash->cash_books_table->sum('cash_in');
                                                $total_in = $cash_in;
                                                $total_closing_balance_cash_in[] = $total_in;
                                            @endphp
                                        @endforeach
                                        @php
                                            $total_closing_balance_cash_in = array_sum($total_closing_balance_cash_in);
                                            echo number_format($total_closing_balance_cash_in, session('decimal'));
                                        @endphp
                                    </td>

                                    <td style="text-align: right">
                                        @php
                                            $total_closing_balance_cash_out = [];
                                        @endphp
                                        @foreach ($closing_balance_cashs as $key => $closing_balance_cash)
                                            @php
                                                $cash_out = $closing_balance_cash->cash_books_table->sum('cash_out');
                                                $total_out = $cash_out;
                                                $total_closing_balance_cash_out[] = $total_out;
                                            @endphp
                                        @endforeach
                                        @php
                                            $total_closing_balance_cash_out = array_sum($total_closing_balance_cash_out);
                                            echo number_format($total_closing_balance_cash_out, session('decimal'));
                                        @endphp
                                    </td>
                                </tr>


                            </tbody>

                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
