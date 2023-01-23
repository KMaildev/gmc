@extends('layouts.menus.spare_part')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">Service Invoice</h5>
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
                                Customer
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Vin Number
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Reg: Number
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Time In
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Time Out
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Types of Service
                            </th>

                            <th style="background-color: #296166; color: white; text-align: center; width: 10%;">
                                Sale Person
                            </th>
                        </thead>

                        <tbody class="table-border-bottom-0 row_position" id="tablecontents">
                            @foreach ($service_invoices as $key => $service_invoice)
                                @include('spare_parts.service_invoice.shared.service_invoice')
                                @include('spare_parts.service_invoice.shared.service_items')
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
