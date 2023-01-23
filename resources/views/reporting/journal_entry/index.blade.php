@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Journal
                        </h5>

                        @include('reporting.journal_entry.filter_action')
                    </div>
                </div>


                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                        aria-labelledby="HeadersCol" tabindex="0">

                        <table class="table-bordered main-table" style="margin-bottom: 10px">

                            <thead class="tbbg">
                                <tr>
                                    <td style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                        No
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                        Account
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                        DR
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                        CR
                                    </td>

                                    <td style="background-color: #296166; color: white; text-align: left; width: 10%;">
                                        Remark
                                    </td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($journal_entries as $key => $journal_entry)
                                    <tr style="background-color: #92CF50;">
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td colspan="4" style="text-align: center; color: black">
                                            {{ $journal_entry->title ?? '' }}
                                        </td>
                                    </tr>
                                    @foreach ($journal_entry->journal_items_table as $journal_item)
                                        <tr>
                                            <td></td>

                                            @if ($journal_item->debit != 0)
                                                <td>
                                                    {{ $journal_item->chart_of_accounts_table->description ?? '' }}
                                                </td>
                                            @else
                                                <td style="text-align: right;">
                                                    {{ $journal_item->chart_of_accounts_table->description ?? '' }}
                                                </td>
                                            @endif

                                            <td style="text-align: right">
                                                {{ $journal_item->debit ?? '' }}
                                            </td>

                                            <td style="text-align: right">
                                                {{ $journal_item->credit ?? '' }}
                                            </td>

                                            <td style="text-align: right">
                                                {{ $journal_item->remark ?? '' }}
                                            </td>

                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
