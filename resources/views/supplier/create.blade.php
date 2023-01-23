@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12 col-lg-10">
            <div class="col">
                <h6 class="mt-4">
                    Create New Dealer Customer
                </h6>
                <div class="card mb-3">
                    <div class="card-header border-bottom">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#form-tabs-personal"
                                    role="tab" aria-selected="true">Import Excel</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link " data-bs-toggle="tab" data-bs-target="#form-tabs-account"
                                    role="tab" aria-selected="false">Manual Insert</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        {{-- Manual Insert --}}
                        <div class="tab-pane fade active show" id="form-tabs-personal" role="tabpanel">
                            <span class="badge bg-label-success">
                                Import Excel
                            </span>

                            <form action="{{ route('supplier_import') }}" method="POST" enctype="multipart/form-data"
                                id="import-form">
                                @csrf

                                <input type="file" name="file" class="form-control" accept=".xlsx, .csv">
                                <br>
                                <p style="color: red;">
                                    Only insert up to 50 records at a time.
                                </p>
                                <a href="{{ asset('data/supplier_import.xlsx') }}" class="btn btn-primary text-white"
                                    download="">
                                    <i class="fa fa-download"></i>
                                    Simple File Download
                                </a>

                                <button type="submit" class="btn btn-success text-white">
                                    <i class="fa fa-check"></i>
                                    Upload
                                </button>
                            </form>

                        </div>

                        {{-- Manual Insert --}}
                        <div class="tab-pane fade" id="form-tabs-account" role="tabpanel">
                            <span class="badge bg-label-success">
                                Manual Insert
                            </span>

                            <form class="card-body" autocomplete="off" action="{{ route('supplier.store') }}"
                                method="POST" id="create-form">
                                @csrf
                                <h6 class="mb-3 fw-normal">1. Personal Info</h6>

                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label class="form-label" for="formtabs-username">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3" hidden>
                                        <label class="form-label" for="formtabs-username">Company</label>
                                        <input type="text" class="form-control @error('company') is-invalid @enderror"
                                            name="company" value="{{ old('company') }}" />
                                        @error('company')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label" for="formtabs-email">Phone</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone') }}" />
                                            @error('phone')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="formtabs-email">Email</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" />
                                            @error('email')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-password-toggle">
                                            <label class="form-label" for="formtabs-password">Address</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    name="address" value="{{ old('address') }}" />
                                                @error('address')
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="formtabs-username">Description or Remark</label>
                                        <input type="text" class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ old('description') }}" />
                                        @error('description')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="pt-4">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Save</button>
                                    <a href="{{ route('supplier.index') }}" class="btn btn-label-secondary">Cancel</a>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreSupplier', '#create-form') !!}
    {!! JsValidator::formRequest('App\Http\Requests\StoreImportSupplier', '#import-form') !!}
@endsection
