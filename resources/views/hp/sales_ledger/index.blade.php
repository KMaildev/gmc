@extends('layouts.menus.accounting')
@section('content')
    <div class="row">

        <div class="col-md-8 col-sm-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            HP Sales Ledger
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <a href="#" class="dt-button create-new btn btn-success btn-sm"
                                onclick="alert('Build in progress')">
                                <span>
                                    <i class="bx bx-file me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">
                                        Excel
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="">
                    @include('hp.sales_ledger.table.sales_ledger_list', [
                        'sales_invoices' => $sales_invoices,
                    ])
                </div>
            </div>
        </div>


        <div class="col-md-4 col-sm-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            HP Sales Ledger Group
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <a href="#" class="dt-button create-new btn btn-success btn-sm"
                                onclick="alert('Build in progress')">
                                <span>
                                    <i class="bx bx-file me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">
                                        Excel
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="">
                    @include('hp.sales_ledger.table.sales_ledger_group', [
                        'sales_invoices' => $sales_invoices,
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
