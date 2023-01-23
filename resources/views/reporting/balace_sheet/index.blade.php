@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Balance Sheet
                        </h5>

                        @include('reporting.balace_sheet.filter_action')
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                        aria-labelledby="HeadersCol" tabindex="0">

                        <table class="table-bordered main-table" style="margin-bottom: 10px">

                            {{-- FIXED ASSETS --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    FIXED ASSETS
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                    MMK
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                    MMK
                                </th>
                            </thead>
                            <tbody class="table-border-bottom-0" id="tablecontents">
                                @php
                                    $all_total_non_current_asset = [];
                                @endphp
                                @foreach ($non_current_assets as $key => $non_current_asset)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $non_current_asset->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_out = $non_current_asset->cash_books_table->sum('cash_out');
                                                $bank_out = $non_current_asset->cash_books_table->sum('bank_out');
                                                $total_credit = $cash_out + $bank_out;
                                                
                                                $total_non_current_asset = $total_credit;
                                                echo number_format($total_non_current_asset, 2);
                                                $all_total_non_current_asset[] = $total_non_current_asset;
                                            @endphp
                                        </td>

                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">
                                        Total
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $all_total_non_current_asset = array_sum($all_total_non_current_asset);
                                            echo number_format($all_total_non_current_asset, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>


                            {{-- CURRENT ASSETS  --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    CURRENT ASSETS
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                </th>
                            </thead>
                            <tbody class="table-border-bottom-0" id="tablecontents">
                                @php
                                    $all_total_current_asset = [];
                                @endphp
                                @foreach ($current_assets as $key => $current_asset)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $current_asset->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_out = $current_asset->cash_books_table->sum('cash_out');
                                                $bank_out = $current_asset->cash_books_table->sum('bank_out');
                                                $total_credit = $cash_out + $bank_out;
                                                
                                                $total_current_asset = $total_credit;
                                                echo number_format($total_current_asset, 2);
                                                $all_total_current_asset[] = $total_current_asset;
                                            @endphp
                                        </td>

                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">
                                        Total
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $all_total_all_total_current_asset = array_sum($all_total_current_asset);
                                            echo number_format($all_total_all_total_current_asset, 2);
                                        @endphp
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        TOTAL ASSETS
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $all_total_assets = $all_total_non_current_asset + $all_total_all_total_current_asset;
                                            echo number_format($all_total_assets, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>


                            {{-- EQUITY --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    EQUITY
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                </th>
                            </thead>

                            <tbody class="table-border-bottom-0" id="tablecontents">
                                @php
                                    $all_total_equity = [];
                                @endphp
                                @foreach ($equities as $key => $equity)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $equity->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_in = $equity->cash_books_table->sum('cash_in');
                                                $bank_in = $equity->cash_books_table->sum('bank_in');
                                                $total_debit = $cash_in + $bank_in;
                                                
                                                $total_equity = $total_debit;
                                                echo number_format($total_equity, 2);
                                                $all_total_equity[] = $total_equity;
                                            @endphp
                                        </td>

                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">
                                        Total
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $all_totaltotal_equity = array_sum($all_total_equity);
                                            echo number_format($all_totaltotal_equity, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>


                            {{-- LIABILITIES  --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    LIABILITIES
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                </th>

                                <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                </th>
                            </thead>

                            <tbody class="table-border-bottom-0" id="tablecontents">
                                @php
                                    $all_total_liabilitie = [];
                                @endphp
                                @foreach ($liabilities as $key => $liabilitie)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $liabilitie->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_in = $liabilitie->cash_books_table->sum('cash_in');
                                                $bank_in = $liabilitie->cash_books_table->sum('bank_in');
                                                $total_debit = $cash_in + $bank_in;
                                                
                                                $total_liabilitie = $total_debit;
                                                echo number_format($total_liabilitie, 2);
                                                $all_total_liabilitie[] = $total_liabilitie;
                                            @endphp
                                        </td>

                                        <td></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">
                                        Total
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $all_total_liabilitie = array_sum($all_total_liabilitie);
                                            echo number_format($all_total_liabilitie, 2);
                                        @endphp
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        TOTAL EQUITY & LIABILITIES
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_equity_liabilities = $all_totaltotal_equity + $all_total_liabilitie;
                                            echo number_format($total_equity_liabilities, 2);
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
