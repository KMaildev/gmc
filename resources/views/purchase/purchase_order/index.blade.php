@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Purchase Order
                        </h5>
                        <div class="card-title-elements ms-auto">
                            @can('hp_sales_invoice_create')
                                <a href="{{ route('purchase_order.create') }}"
                                    class="dt-button create-new btn btn-primary btn-sm">
                                    <span>
                                        <i class="bx bx-plus me-sm-2"></i>
                                        <span class="d-none d-sm-inline-block">Create</span>
                                    </span>
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <table class="table table-bordered main-table py-5" style="margin-bottom: 1px !important;"
                        id="tbl_exporttable_to_xls">
                        <thead class="">
                            <th style="background-color: #2e696e; color: white; text-align: center; width: 1%;">
                                Sr
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Purchase No
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Date
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                                Particular
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                            </th>
                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                            </th>
                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                            </th>
                            <th style="background-color: #2e696e; color: white; text-align: center; width: 10%;">
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 2%;">
                                Status
                            </th>

                            <th style="background-color: #2e696e; color: white; text-align: center; width: 1%;">
                                Actions
                            </th>
                        </thead>

                        <tbody class="table-border-bottom-0">
                            @foreach ($purchase_orders as $key => $purchase_order)
                                {{-- Purchase Order & Order Items --}}
                                @include('purchase.purchase_order.shared.order_info_items')

                                {{-- Operation Info & Items --}}
                                @include('purchase.purchase_order.shared.operation_info_items')

                                {{-- Arrived --}}
                                @include('purchase.purchase_order.shared.arrival_info_items')

                                {{-- Arrived Balance Unit  --}}
                                @include('purchase.purchase_order.shared.arrival_balance_unit')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
