@extends('layouts.menus.spare_part')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Spare Parts Purchase
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <a href="{{ route('spare_part_purchase_invoice.create') }}"
                                class="dt-button create-new btn btn-primary btn-sm">
                                <i class="bx bx-plus me-sm-2"></i>
                                <span class="d-none d-sm-inline-block">Create</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <table class="table table-bordered main-table py-5" style="margin-bottom: 1px !important;"
                        id="tbl_exporttable_to_xls">
                        <thead class="tbbg">

                            <th style="background-color: #296166; color: white; text-align: center; width: 1%;">
                                Sr.No
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Invoice No.
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Date
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Supplier
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Remark
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Purchase Person
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Action
                            </th>

                        </thead>

                        <tbody class="table-border-bottom-0 row_position" id="tablecontents">
                            @foreach ($part_purchase_invoices as $key => $part_purchase_invoice)
                            @include('spare_parts.purchase_invoice.shared.part_purchase_invoices')
                            @include('spare_parts.purchase_invoice.shared.part_purchase_items')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
