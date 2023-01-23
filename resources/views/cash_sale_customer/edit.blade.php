@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12 col-lg-10">
            <div class="col">
                <h6 class="mt-4">
                    Edit Customer
                </h6>
                <div class="card mb-3">

                    <div class="card-header border-bottom">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#form-tabs-personal"
                                    role="tab" aria-selected="true">Cash Sale Customer</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="form-tabs-personal" role="tabpanel">
                            <form class="card-body" autocomplete="off"
                                action="{{ route('customer.update', $customer->id) }}" method="POST" id="edit-form">
                                @csrf
                                @method('PUT')

                                <input type="hidden" value="cash_sale" name="dealer_or_hp">
                                <input type="hidden" value="{{ $customer->dealer_customer_id ?? 0 }}"
                                    name="dealer_customer_id">

                                <h6 class="mb-3 fw-normal">1. Personal Info</h6>

                                <div class="row g-3">

                                    <div class="col-md-3">
                                        <label class="form-label" for="formtabs-username">Owner Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $customer->name }}" />
                                        @error('name')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="formtabs-username">Company Name</label>
                                        <input type="text"
                                            class="form-control @error('company_name') is-invalid @enderror"
                                            name="company_name" value="{{ $customer->company_name }}" />
                                        @error('company_name')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>



                                    <div class="col-md-3">
                                        <label class="form-label" for="formtabs-username">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            name="city" value="{{ $customer->city }}" />
                                        @error('city')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>


                                    <div class="col-md-3">
                                        <label class="form-label" for="formtabs-email">Phone</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ $customer->phone }}" />
                                            @error('phone')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="formtabs-email">Email</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ $customer->email }}" />
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
                                                    name="address" value="{{ $customer->address }}" />
                                                @error('address')
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="formtabs-username">Description</label>
                                        <input type="text"
                                            class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ $customer->description }}" />
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
    {!! JsValidator::formRequest('App\Http\Requests\UpdateCustomer', '#edit-form') !!}
@endsection
