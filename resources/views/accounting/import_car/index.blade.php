@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">Import Car List</h5>
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
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <table class="table table-bordered main-table py-5" style="margin-bottom: 1px !important;"
                        id="tbl_exporttable_to_xls">
                        <thead class="tbbg">
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 1%;">
                                #
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Commodity
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                ID No
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                A/U
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Qty
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Rate USD
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Amount USD
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Exchange Rate
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Con; Kyats
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Adjustment Value AD
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Total Value
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Import Duty & Other Tax
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Commercial tax
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Maccs Service Fee
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Security Fee
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Redemption Fine
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                AV Rates
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                AV Value Kyats
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Advance Tax
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Total Expenses
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Custom Duty
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Action
                            </th>

                        </thead>
                        <tbody class="table-border-bottom-0 t">
                            @if ($form_status == 'is_edit')
                                @include('accounting.import_car.form.edit', [
                                    'product_edit' => $product_edit,
                                ])
                            @endif

                            @php
                                $i = 1;
                            @endphp
                            @foreach ($products as $id_no => $product_lists)
                                {{-- Commodity and ID NO --}}
                                <tr style="background-color: white">

                                    <td style="background-color: green; color: white; font-weight: bold;">
                                        {{ $i++ }}
                                    </td>

                                    @foreach (explode('explode_id_commodity', $id_no) as $row)
                                        <td
                                            style="background-color: green; color: white; font-weight: bold; text-align: left;">
                                            {{ $row }}
                                        </td>
                                    @endforeach

                                    <td colspan="19" style="background-color: green; color: white;"></td>
                                </tr>

                                @php
                                    $con_kyats_value_total = [];
                                    $import_duty_other_tax_value_total = [];
                                    $commercial_tax_value_total = [];
                                    $av_value_kyats_total = [];
                                    $av_value_tax_percent_value_total = [];
                                    $total_expense_value_total = [];
                                    $custom_duty_value_total = [];
                                @endphp
                                @foreach ($product_lists as $key => $product_list)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>

                                        <td style="text-align: left;">
                                            {{ $product_list->chessi_no ?? '' }}
                                        </td>

                                        <td style="text-align: left;">
                                            {{ $product_list->brand_name ?? '' }}
                                        </td>

                                        <td style="text-align: left;">
                                            {{ $product_list->unit ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            {{ $product_list->quantity ?? '' }}
                                        </td>

                                        {{-- Rate USD --}}
                                        <td style="text-align: right;">
                                            @if ($product_list->quantity == 0)
                                                @php
                                                    $quantity = 1;
                                                @endphp
                                            @else
                                                @php
                                                    $quantity = $product_list->quantity;
                                                @endphp
                                            @endif
                                            {{ number_format($product_list->amount_usd / $quantity, 2) }}
                                        </td>

                                        {{-- Amount USD --}}
                                        <td style="text-align: right;">
                                            {{ number_format($product_list->amount_usd, 2) }}
                                        </td>

                                        {{-- Exchange Rate --}}
                                        <td style="text-align: right;">
                                            {{ number_format($product_list->exchange_rate, 2) }}
                                        </td>

                                        {{-- Con; Kyats --}}
                                        <td style="text-align: right;">
                                            @php
                                                $con_kyats_value = $product_list->amount_usd * $product_list->exchange_rate;
                                                echo number_format($con_kyats_value, 2);
                                                $con_kyats_value_total[] = $con_kyats_value;
                                            @endphp
                                        </td>

                                        {{-- Adjustment Value AD --}}
                                        <td style="text-align: right;">
                                            @php
                                                $adjustment_value_ad_value = $product_list->adjustment_value_ad;
                                                echo number_format($adjustment_value_ad_value, 2);
                                            @endphp
                                        </td>

                                        {{-- Total Value --}}
                                        <td style="text-align: right;">
                                            @php
                                                $total_value = $product_list->amount_usd + $product_list->adjustment_value_ad;
                                                echo number_format($total_value, 2);
                                            @endphp
                                        </td>

                                        {{-- Import Duty & Other Tax --}}
                                        <td style="text-align: right;">
                                            @php
                                                $con_kyats_value = $product_list->amount_usd * $product_list->exchange_rate;
                                                $import_duty_other_tax_percent_value = $product_list->import_duty_other_tax_percent;
                                                $import_duty_other_tax_value = $con_kyats_value * ($import_duty_other_tax_percent_value / 100);
                                                echo number_format($import_duty_other_tax_value, 2);
                                                $import_duty_other_tax_value_total[] = $import_duty_other_tax_value;
                                            @endphp
                                        </td>

                                        {{-- Commercial tax --}}
                                        <td style="text-align: right;">
                                            @php
                                                $import_duty_other_tax_percent_value = $product_list->import_duty_other_tax_percent;
                                                $commercial_tax_value = ($con_kyats_value + $import_duty_other_tax_value) * ($product_list->commercial_tax_percent / 100);
                                                echo number_format($commercial_tax_value, 2);
                                                $commercial_tax_value_total[] = $commercial_tax_value;
                                            @endphp
                                        </td>

                                        {{-- Maccs Service Fee --}}
                                        <td style="text-align: right;">
                                            @php
                                                $maccs_service_fee_value = $product_list->maccs_service_fee;
                                                echo number_format($maccs_service_fee_value, 2);
                                            @endphp
                                        </td>

                                        {{-- security_fee --}}
                                        <td style="text-align: right;">
                                            @php
                                                $security_fee_value = $product_list->security_fee;
                                                echo number_format($security_fee_value, 2);
                                            @endphp
                                        </td>

                                        {{-- Redemption Fine --}}
                                        <td style="text-align: right;">
                                            @php
                                                $redemption_fine_value = $product_list->redemption_fine;
                                                echo number_format($redemption_fine_value, 2);
                                            @endphp
                                        </td>

                                        {{-- AV Rates --}}
                                        <td style="text-align: right;">
                                            @php
                                                $av_rates_value = $product_list->exchange_rate;
                                                echo number_format($av_rates_value, 2);
                                            @endphp
                                        </td>

                                        {{-- AV Value Kyats --}}
                                        <td style="text-align: right;">
                                            @php
                                                $av_value_kyats = ($product_list->amount_usd + $product_list->adjustment_value_ad) * $product_list->exchange_rate;
                                                echo number_format($av_value_kyats, 2);
                                                $av_value_kyats_total[] = $av_value_kyats;
                                            @endphp
                                        </td>

                                        {{-- Advance Tax --}}
                                        <td style="text-align: right;">
                                            @php
                                                $av_value_tax_percent_value = $av_value_kyats * ($product_list->advance_tax_percent / 100);
                                                echo number_format($av_value_tax_percent_value, 2);
                                                $av_value_tax_percent_value_total[] = $av_value_tax_percent_value;
                                            @endphp
                                        </td>

                                        {{-- Total Expenses --}}
                                        <td style="text-align: right;">
                                            @php
                                                $total_expense_value = $import_duty_other_tax_value + $commercial_tax_value + $maccs_service_fee_value + $security_fee_value + $redemption_fine_value + $av_value_tax_percent_value;
                                                echo number_format($total_expense_value, 2);
                                                $total_expense_value_total[] = $total_expense_value;
                                            @endphp
                                        </td>

                                        {{-- Custom Duty --}}
                                        <td style="text-align: right;">
                                            @php
                                                $custom_duty_value = $import_duty_other_tax_value + $commercial_tax_value + $av_value_tax_percent_value + $maccs_service_fee_value;
                                                echo number_format($custom_duty_value, 2);
                                                $custom_duty_value_total[] = $custom_duty_value;
                                            @endphp
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
                                                            <a class="dropdown-item"
                                                                href="{{ route('import_car.edit', $product_list->id) }}">Edit</a>
                                                        </li>

                                                        <li>
                                                            <form
                                                                action="{{ route('products.destroy', $product_list->id) }}"
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
                                <tr>
                                    <td colspan="18"></td>
                                    {{-- Advance Tax --}}
                                    <td style="text-align: right; font-weight: bold; color: red;">
                                        {{ number_format(array_sum($av_value_tax_percent_value_total), 2) }}
                                    </td>

                                    {{-- Total Expenses --}}
                                    <td style="text-align: right; font-weight: bold; color: red;">
                                        {{ number_format(array_sum($av_value_tax_percent_value_total), 2) }}
                                    </td>
                                    {{-- Custom Duty --}}
                                    <td style="text-align: right; font-weight: bold; color: red;">
                                        {{ number_format(array_sum($av_value_tax_percent_value_total), 2) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    {{-- Qty --}}
                                    <td style="text-align: right; font-weight: bold">
                                        {{ number_format($product_lists->sum('quantity'), 2) }}
                                    </td>

                                    {{-- Rate USD --}}
                                    <td></td>

                                    {{-- Amount USD --}}
                                    <td style="text-align: right; font-weight: bold">
                                        {{ number_format($product_lists->sum('amount_usd'), 2) }}
                                    </td>

                                    {{-- Exchange Rate --}}
                                    <td></td>

                                    {{-- Con; Kyats --}}
                                    <td style="text-align: right; font-weight: bold">
                                        {{ number_format(array_sum($con_kyats_value_total), 2) }}
                                    </td>

                                    {{-- Adjustment Value AD --}}
                                    <td></td>

                                    {{-- Total Value --}}
                                    <td style="text-align: right; font-weight: bold">
                                        {{ number_format($product_lists->sum('amount_usd') + $product_lists->sum('adjustment_value_ad'), 2) }}
                                    </td>

                                    {{-- Import Duty & Other Tax --}}
                                    <td style="text-align: right; font-weight: bold">
                                        {{ number_format(array_sum($import_duty_other_tax_value_total), 2) }}
                                    </td>

                                    {{-- Commercial tax --}}
                                    <td style="text-align: right; font-weight: bold">
                                        {{ number_format(array_sum($commercial_tax_value_total), 2) }}
                                    </td>

                                    {{-- Maccs Service Fee --}}
                                    <td style="text-align: right; font-weight: bold">
                                        {{ number_format($product_lists->sum('maccs_service_fee'), 2) }}
                                    </td>

                                    {{-- Security Fee --}}
                                    <td style="text-align: right; font-weight: bold">
                                        {{ number_format($product_lists->sum('security_fee'), 2) }}
                                    </td>

                                    {{-- Redemption Fine --}}
                                    <td style="text-align: right; font-weight: bold">
                                        {{ number_format($product_lists->sum('redemption_fine'), 2) }}
                                    </td>

                                    {{-- AV Rates --}}
                                    <td></td>

                                    {{-- Redemption Fine --}}
                                    <td style="text-align: right; font-weight: bold">
                                        {{ number_format(array_sum($av_value_kyats_total), 2) }}
                                    </td>

                                    {{-- Advance Tax --}}
                                    <td style="text-align: right; font-weight: bold">
                                        {{ number_format(array_sum($av_value_tax_percent_value_total), 2) }}
                                    </td>

                                    {{-- Total Expenses --}}
                                    <td style="text-align: right; font-weight: bold">
                                        @php
                                            $total_expense_value_balance = array_sum($total_expense_value_total);
                                            echo number_format($total_expense_value_balance, 2);
                                        @endphp
                                    </td>

                                    {{-- Custom Duty --}}
                                    <td style="text-align: right; font-weight: bold">
                                        @php
                                            $custom_duty_value_balance = array_sum($custom_duty_value_total);
                                            echo number_format($custom_duty_value_balance, 2);
                                        @endphp
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="pseduo-track"></div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
