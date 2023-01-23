@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">List of Products</h5>
                        <div class="card-title-elements ms-auto">
                            <a href="{{ route('products.create') }}" class="dt-button create-new btn btn-primary btn-sm">
                                <span>
                                    <i class="bx bx-plus me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Create</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" role="region"
                    aria-labelledby="HeadersCol" tabindex="0">
                    <table class="table table-bordered main-table" id="export_excel">
                        <thead class="tbbg">
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 1%;">Sr.No</th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Brand Name
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Product
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Type</th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Model No
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Model Year
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Configuration</th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Engine
                                Power</th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Chessi No
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Engine No.
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Weight
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Door</th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Seater</th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Vehicle No.
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Quantity
                            </th>
                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">Action</th>
                        </thead>
                        <tbody class="table-border-bottom-0 row_position" id="tablecontents">
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td style="text-align: center;">
                                        {{ $key + 1 }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $product->brand_name ?? '-' }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $product->product }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $product->type }}
                                    </td>
                                    <td style="text-align: right;">
                                        {{ $product->model_no }}
                                    </td>
                                    <td style="text-align: right;">
                                        {{ $product->model_year }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $product->configuration }}
                                    </td>
                                    <td style="text-align: right;">
                                        {{ $product->engine_power }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $product->chessi_no }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $product->engine_no }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $product->weight }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $product->door }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $product->seater }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $product->vehicle_no }}
                                    </td>
                                    <td style="text-align: center;">
                                        {{ $product->quantity }}
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
                                                            href="{{ route('products.edit', $product->id) }}">Edit</a>
                                                    </li>

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('products.show', $product->id) }}">Detail</a>
                                                    </li>

                                                    <li>
                                                        <form action="{{ route('products.destroy', $product->id) }}"
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
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
