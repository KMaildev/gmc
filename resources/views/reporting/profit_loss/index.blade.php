@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Profit and Loss
                        </h5>
                        @include('reporting.profit_loss.filter_action')
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <span>
                        {{ $start_date ?? '' }}
                        to
                        {{ $end_date ?? '' }}
                    </span>
                    <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                        aria-labelledby="HeadersCol" tabindex="0">
                        <table class="table-bordered main-table" style="margin-bottom: 10px">
                            {{-- Revenue --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    Revenue
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
                                    $all_total_revenue = [];
                                @endphp
                                @foreach ($revenues as $key => $revenue)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $revenue->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_in = $revenue->cash_books_table->sum('cash_in');
                                                $bank_in = $revenue->cash_books_table->sum('bank_in');
                                                $total_debit = $cash_in + $bank_in;
                                                
                                                $total_revenue = $total_debit;
                                                echo number_format($total_revenue, 2);
                                                $all_total_revenue[] = $total_revenue;
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
                                            $all_total_revenue = array_sum($all_total_revenue);
                                            echo number_format($all_total_revenue, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>



                            {{-- Cost of Sale --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    Cost of Sale
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
                                    $all_total_cost_of_sale = [];
                                @endphp
                                @foreach ($cost_of_sales as $key => $cost_of_sale)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $cost_of_sale->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_out = $cost_of_sale->cash_books_table->sum('cash_out');
                                                $bank_out = $cost_of_sale->cash_books_table->sum('bank_out');
                                                $total_credit = $cash_out + $bank_out;
                                                
                                                $total_cost_of_sale = $total_credit;
                                                echo number_format($total_cost_of_sale, 2);
                                                $all_total_cost_of_sale[] = $total_cost_of_sale;
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
                                            $all_total_cost_of_sale = array_sum($all_total_cost_of_sale);
                                            echo number_format($all_total_cost_of_sale, 2);
                                        @endphp
                                    </td>
                                </tr>


                                <tr>
                                    <td colspan="3">
                                        Gross Profit
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_gross_profit = $all_total_revenue - $all_total_cost_of_sale;
                                            echo number_format($total_gross_profit, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>



                            {{-- Other Income --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    Other Income
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
                                    $all_total_other_incomes = [];
                                @endphp
                                @foreach ($other_incomes as $key => $other_incomes)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $other_incomes->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_in = $other_incomes->cash_books_table->sum('cash_in');
                                                $bank_in = $other_incomes->cash_books_table->sum('bank_in');
                                                $total_debit = $cash_in + $bank_in;
                                                $total_other_incomes = $total_debit;
                                                echo number_format($total_other_incomes, 2);
                                                $all_total_other_incomes[] = $total_other_incomes;
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
                                            $all_total_other_incomes = array_sum($all_total_other_incomes);
                                            echo number_format($all_total_other_incomes, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>




                            {{-- Operations Expenses --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    Operations Expenses
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
                                    $all_total_operation_expense = [];
                                @endphp
                                @foreach ($operation_expenses as $key => $operation_expense)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $operation_expense->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_out = $operation_expense->cash_books_table->sum('cash_out');
                                                $bank_out = $operation_expense->cash_books_table->sum('bank_out');
                                                $total_credit = $cash_out + $bank_out;
                                                
                                                $total_operation_expense = $total_credit;
                                                echo number_format($total_operation_expense, 2);
                                                $all_total_operation_expense[] = $total_operation_expense;
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
                                            $all_total_operation_expense = array_sum($all_total_operation_expense);
                                            echo number_format($all_total_operation_expense, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>




                            {{-- Administration Expenses --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    Administration Expenses
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
                                    $all_total_administration_expense = [];
                                @endphp
                                @foreach ($administration_expenses as $key => $administration_expense)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $administration_expense->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_out = $administration_expense->cash_books_table->sum('cash_out');
                                                $bank_out = $administration_expense->cash_books_table->sum('bank_out');
                                                $total_credit = $cash_out + $bank_out;
                                                
                                                $total_administration_expense = $total_credit;
                                                echo number_format($total_administration_expense, 2);
                                                $all_total_administration_expense[] = $total_administration_expense;
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
                                            $all_total_administration_expense = array_sum($all_total_administration_expense);
                                            echo number_format($all_total_administration_expense, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>


                            {{-- Marketing Expenses --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    Marketing Expenses
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
                                    $all_total_marketing_expense = [];
                                @endphp
                                @foreach ($marketing_expenses as $key => $marketing_expense)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $marketing_expense->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_out = $marketing_expense->cash_books_table->sum('cash_out');
                                                $bank_out = $marketing_expense->cash_books_table->sum('bank_out');
                                                $total_credit = $cash_out + $bank_out;
                                                
                                                $total_marketing_expense = $total_credit;
                                                echo number_format($total_marketing_expense, 2);
                                                $all_total_marketing_expense[] = $total_marketing_expense;
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
                                            $all_total_marketing_expense = array_sum($all_total_marketing_expense);
                                            echo number_format($all_total_marketing_expense, 2);
                                        @endphp
                                    </td>
                                </tr>
                            </tbody>


                            {{-- Finance Costs --}}
                            <thead class="tbbg">
                                <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                    #
                                </th>

                                <th style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                    Finance Costs
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
                                    $all_total_finance_cost = [];
                                @endphp
                                @foreach ($finance_costs as $key => $finance_cost)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            {{ $finance_cost->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $cash_out = $finance_cost->cash_books_table->sum('cash_out');
                                                $bank_out = $finance_cost->cash_books_table->sum('bank_out');
                                                $total_credit = $cash_out + $bank_out;
                                                
                                                $total_finance_cost = $total_credit;
                                                echo number_format($total_finance_cost, 2);
                                                $all_total_finance_cost[] = $total_finance_cost;
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
                                            $all_total_finance_cost = array_sum($all_total_finance_cost);
                                            echo number_format($all_total_finance_cost, 2);
                                        @endphp
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        Profit before Tax
                                    </td>
                                    <td style="text-align: right; font-weight: bold;">
                                        @php
                                            $total_profit_before_tax = $total_gross_profit + $all_total_other_incomes - $all_total_operation_expense - $all_total_administration_expense - $all_total_marketing_expense - $all_total_finance_cost;
                                            echo number_format($total_profit_before_tax, 4);
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
