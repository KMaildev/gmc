@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">List of Suppliers</h5>
                        <div class="card-title-elements ms-auto">
                            @include('layouts.includes.export')

                            <a href="{{ route('supplier.create') }}" class="dt-button create-new btn btn-primary btn-sm">
                                <span>
                                    <i class="bx bx-plus me-sm-2"></i>
                                    <span class="d-none d-sm-inline-block">Create</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll" role="region" aria-labelledby="HeadersCol"
                    tabindex="0">
                    <table class="table table-bordered main-table py-5" id="export_excel">
                        <thead class="tbbg">
                            <th style="color: white; text-align: center; width: 1%;">#</th>
                            <th style="color: white; text-align: center;">Name</th>
                            <th style="color: white; text-align: center;">Phone</th>
                            <th style="color: white; text-align: center;">Email</th>
                            <th style="color: white; text-align: center;">Address</th>
                            <th style="color: white; text-align: center;">Description</th>
                            <th style="color: white; text-align: center;">Action</th>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($suppliers as $key => $supplier)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $supplier->name }}
                                    </td>
                                    <td>
                                        {{ $supplier->phone }}
                                    </td>
                                    <td>
                                        {{ $supplier->email }}
                                    </td>
                                    <td>
                                        {{ $supplier->address }}
                                    </td>
                                    <td>
                                        {{ $supplier->description }}
                                    </td>
                                    <td>
                                        <div class="demo-inline-spacing">
                                            <div class="btn-group">
                                                <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu">

                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('supplier.edit', $supplier->id) }}">Edit</a>
                                                    </li>

                                                    <li>
                                                        <form action="{{ route('supplier.destroy', $supplier->id) }}"
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
