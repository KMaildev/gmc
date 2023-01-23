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

                            <form action="{{ route('dealer_customer_import') }}" method="POST"
                                enctype="multipart/form-data" id="import-form">
                                @csrf

                                <input type="file" name="file" class="form-control" accept=".xlsx, .csv">
                                <br>
                                <p style="color: red;">
                                    *Dealer Customer Only
                                </p>
                                <p style="color: red;">
                                    Only insert up to 50 records at a time.
                                </p>
                                <a href="{{ asset('data/dealer_customer_import.xlsx') }}"
                                    class="btn btn-primary text-white" download="">
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
                            <form class="card-body" autocomplete="off" action="{{ route('customer.store') }}"
                                method="POST" id="create-form">
                                @csrf

                                <input type="hidden" value="dealer" name="dealer_or_hp">
                                <input type="hidden" value="0" name="dealer_customer_id">

                                <h6 class="mb-3 fw-normal">1. Personal Info</h6>

                                <div class="row g-3">

                                    <div class="col-md-3">
                                        <label class="form-label" for="formtabs-username">Owner Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="formtabs-username">Company Name</label>
                                        <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                            name="company_name" value="{{ old('company_name') }}" />
                                        @error('company_name')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="formtabs-username">Dealer Code</label>
                                        <input type="text" class="form-control @error('dealer_code') is-invalid @enderror"
                                            name="dealer_code" value="{{ old('dealer_code') }}" />
                                        @error('dealer_code')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>


                                    <div class="col-md-3">
                                        <label class="form-label" for="formtabs-username">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            name="city" value="{{ old('city') }}" />
                                        @error('city')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>


                                    <div class="col-md-3">
                                        <label class="form-label" for="formtabs-email">Phone</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone') }}" />
                                            @error('phone')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
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
                                        <label class="form-label" for="formtabs-username">Description</label>
                                        <input type="text" class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ old('description') }}" />
                                        @error('description')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="pt-4">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Save</button>
                                    <a href="{{ route('customer.index') }}" class="btn btn-label-secondary">Cancel</a>
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreCustomer', '#create-form') !!}
    {!! JsValidator::formRequest('App\Http\Requests\StoreImportCustomer', '#import-form') !!}
@endsection
