@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Trial
                        </h5>
                        @include('reporting.trial.filter_action')
                    </div>
                </div>


                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                        aria-labelledby="HeadersCol" tabindex="0">
                        <span>
                            {{ $start_date ?? '' }}
                            to
                            {{ $end_date ?? '' }}
                        </span>
                        <table class="table-bordered main-table" style="margin-bottom: 10px">
                            <thead class="tbbg">
                                <tr>
                                    <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                        No
                                    </th>

                                    <th style="background-color: #296166; color: white; text-align: center; width: 7%;">
                                        IS/BS
                                    </th>

                                    <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        Heading
                                    </th>

                                    <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        Account Heading
                                    </th>

                                    <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        DR
                                    </th>

                                    <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        CR
                                    </th>

                                    <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        DR
                                    </th>

                                    <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        CR
                                    </th>

                                    <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        DR
                                    </th>

                                    <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        CR
                                    </th>

                                    <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        DR
                                    </th>

                                    <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                        CR
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="table-border-bottom-0" id="tablecontents">
                                @foreach ($trials as $key => $trial)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td>
                                            @if ($trial->account_type_table->financial_statement == 'BalanceSheet')
                                                BS
                                            @else
                                                IS
                                            @endif
                                        </td>

                                        <td>
                                            {{ $trial->account_classifications_table->name ?? '' }}
                                        </td>

                                        <td>
                                            {{ $trial->description ?? '' }}
                                        </td>

                                        {{-- Opening DR --}}
                                        <td style="text-align: right;">
                                            @php
                                                $opening_dr_total = [];
                                                foreach ($openings as $opening) {
                                                    if ($trial->id == $opening->account_code_id) {
                                                        $opening_dr_cash_in = $opening->cash_in;
                                                        $opening_dr_bank_in = $opening->bank_in;
                                                        $opening_dr_total[] = $opening_dr_cash_in + $opening_dr_bank_in;
                                                    }
                                                }
                                                $opening_dr_total = array_sum($opening_dr_total);
                                                echo number_format($opening_dr_total, session('decimal'));
                                            @endphp
                                        </td>

                                        {{-- Opening CR --}}
                                        <td style="text-align: right;">
                                            @php
                                                $opening_cr_total = [];
                                                foreach ($openings as $opening) {
                                                    if ($trial->id == $opening->account_code_id) {
                                                        $opening_dr_cash_out = $opening->cash_out;
                                                        $opening_dr_bank_out = $opening->bank_out;
                                                        $opening_cr_total[] = $opening_dr_cash_out + $opening_dr_bank_out;
                                                    }
                                                }
                                                $opening_cr_total = array_sum($opening_cr_total);
                                                echo number_format($opening_cr_total, session('decimal'));
                                            @endphp
                                        </td>


                                        {{-- DTY Cash Trial DR  --}}
                                        <td style="text-align: right">
                                            @php
                                                $cash_trial_dr_total = [];
                                                foreach ($cash_trials as $cash_trial) {
                                                    if ($trial->id == $cash_trial->account_code_id) {
                                                        $cash_trial_dr_cash_in = $cash_trial->cash_in;
                                                        $cash_trial_dr_bank_in = $cash_trial->bank_in;
                                                        $cash_trial_dr_total[] = $cash_trial_dr_cash_in + $cash_trial_dr_bank_in;
                                                    }
                                                }
                                                $cash_trial_dr_total = array_sum($cash_trial_dr_total);
                                                echo number_format($cash_trial_dr_total, session('decimal'));
                                            @endphp
                                        </td>

                                        {{-- DTY Cash Trial CR  --}}
                                        <td style="text-align: right">
                                            @php
                                                $cash_trial_cr_total = [];
                                                foreach ($cash_trials as $cash_trial) {
                                                    if ($trial->id == $cash_trial->account_code_id) {
                                                        $cash_trial_dr_cash_out = $cash_trial->cash_out;
                                                        $cash_trial_dr_bank_out = $cash_trial->bank_out;
                                                        $cash_trial_cr_total[] = $cash_trial_dr_cash_out + $cash_trial_dr_bank_out;
                                                    }
                                                }
                                                $cash_trial_cr_total = array_sum($cash_trial_cr_total);
                                                echo number_format($cash_trial_cr_total, session('decimal'));
                                            @endphp
                                        </td>

                                        {{-- JV DR --}}
                                        <td style="text-align: right">
                                            @php
                                                $journal_item_dr_total = [];
                                                foreach ($journal_items as $journal_item) {
                                                    if ($trial->id == $journal_item->chartof_account_id) {
                                                        $journal_item_debit = $journal_item->debit;
                                                        $journal_item_dr_total[] = $journal_item_debit;
                                                    }
                                                }
                                                $journal_item_dr_total = array_sum($journal_item_dr_total);
                                                echo number_format($journal_item_dr_total, session('decimal'));
                                            @endphp
                                        </td>

                                        {{-- JV CR --}}
                                        <td style="text-align: right">
                                            @php
                                                $journal_item_cr_total = [];
                                                foreach ($journal_items as $journal_item) {
                                                    if ($trial->id == $journal_item->chartof_account_id) {
                                                        $journal_item_credit = $journal_item->credit;
                                                        $journal_item_cr_total[] = $journal_item_credit;
                                                    }
                                                }
                                                $journal_item_cr_total = array_sum($journal_item_cr_total);
                                                echo number_format($journal_item_cr_total, session('decimal'));
                                            @endphp
                                        </td>


                                        {{-- DR Total  --}}
                                        <td style="text-align: right">
                                            @php
                                                $dr_all_total = $opening_dr_total + $cash_trial_dr_total + $journal_item_dr_total;
                                                echo number_format($dr_all_total, session('decimal'));
                                            @endphp
                                        </td>

                                        {{-- CR Total  --}}
                                        <td style="text-align: right">
                                            @php
                                                $cr_all_total = $opening_cr_total + $cash_trial_cr_total + $journal_item_cr_total;
                                                echo number_format($cr_all_total, session('decimal'));
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
