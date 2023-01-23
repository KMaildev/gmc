@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">Bank Form</h5>
                        <div class="card-title-elements ms-auto">
                            <div class="card-header-elements ms-auto">
                                <input type="text" class="form-control form-control-sm" placeholder="Search" />
                            </div>

                            @include('layouts.includes.export')
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered table-sm">
                        <thead class="tbbg">
                            <tr>
                                <th style="color: white; text-align: center; width: 1%;">#</th>
                                <th style="color: white; text-align: center;">Bank</th>
                                <th style="color: white; text-align: center;">Opening Balance</th>
                                <th style="color: white; text-align: center;">Bank In</th>
                                <th style="color: white; text-align: center;">Bank Out</th>
                                <th style="color: white; text-align: center;">Closing Balance</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($chartof_accounts as $key => $chartof_account)
                                <tr>
                                    <td style="text-align: center;">
                                        {{ $key + 1 }}
                                    </td>

                                    <td style="text-align: center;">
                                        {{ $chartof_account->description }}
                                    </td>

                                    <td style="text-align: right;">
                                        {{ number_format($chartof_account->account_opening_balance, 2) }}
                                    </td>

                                    <td style="text-align: right;">
                                        {{ number_format(0, 2) }}
                                    </td>

                                    <td style="text-align: right;">
                                        {{ number_format(0, 2) }}
                                    </td>

                                    <td style="text-align: right;">
                                        {{ number_format(0, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <th colspan="2">Total</th>
                            <th style="text-align: right; font-weight: bold">
                                {{ number_format($chartof_accounts->sum('account_opening_balance'), 2) }}
                            </th>
                        </tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
