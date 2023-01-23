@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Refund
                        </h5>
                    </div>
                </div>

                <div class="">
                    <table class="" style="margin-bottom: 1px !important;">
                        <thead class="tbbg">
                            <th style="color: white; text-align: center; width: 1%;">
                                Sr.No
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Invoice No.
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Customer Name
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Refund
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Refund Date
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; widht: 10%">
                                Action
                            </th>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if ($form_status == 'is_create')
                                @include('accounting.refund.form.create_form')
                            @elseif ($form_status == 'is_edit')
                                @include('accounting.refund.form.edit_form')
                            @endif

                            @foreach ($sale_refunds as $key => $sale_refund)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        {{ $sale_refund->sales_invoice_table->invoice_no ?? '' }}
                                    </td>

                                    <td>
                                        {{ $sale_refund->sales_invoice_table->customers_table->name ?? '' }}
                                    </td>

                                    <td style="text-align: right; font-weight: bold">
                                        {{ number_format($sale_refund->refund, 2) }}
                                    </td>

                                    <td>
                                        {{ $sale_refund->refund_date ?? '' }}
                                    </td>

                                    <td style="text-align: center;">
                                        <div class="demo-inline-spacing">
                                            <div class="btn-group">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('sale_refund.edit', $sale_refund->id) }}">Edit</a>
                                                    </li>

                                                    <li>
                                                        <form
                                                            action="{{ route('sale_refund.destroy', $sale_refund->id) }}"
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
                        </tbody>
                        <tr>
                            <td colspan="3">Total:</td>
                            <td style="text-align: right; font-weight: bold">
                                {{ number_format($sale_refunds->sum('refund'), 2) }}
                            </td>
                            <td colspan="2"></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
