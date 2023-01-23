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
                                    role="tab" aria-selected="true">HP</button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="form-tabs-personal" role="tabpanel">
                            <form class="card-body" autocomplete="off"
                                action="{{ route('hp_customer.update', $customer->id) }}" method="POST" id="edit-form">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="hp" name="dealer_or_hp">
                                <h6 class="mb-3 fw-normal">1. Personal Info</h6>

                                <div class="row g-3">

                                    <div class="col-md-4">
                                        <label class="form-label" for="formtabs-username">Customer Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $customer->name }}" />
                                        @error('name')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="formtabs-username">Dealer Name</label>
                                        <select class="select2 form-select" data-allow-clear="true"
                                            name="dealer_customer_id">
                                            @foreach ($dealer_customers as $dealer_customer)
                                                <option value="{{ $dealer_customer->id }}"
                                                    @if ($dealer_customer->id == $customer->dealer_customer_id) selected @endif>
                                                    {{ $dealer_customer->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('dealer_customer_id')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label" for="formtabs-username">Owner Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            value="" id="ownerName" />
                                    </div>

                                    <div class="col-md-4" hidden>
                                        <label class="form-label" for="formtabs-username">Company Name</label>
                                        <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                            name="company_name" value="{{ $customer->company_name }}" />
                                        @error('company_name')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4" hidden>
                                        <label class="form-label" for="formtabs-username">Dealer Code</label>
                                        <input type="text" class="form-control @error('dealer_code') is-invalid @enderror"
                                            name="dealer_code" value="{{ $customer->dealer_code }}" />
                                        @error('dealer_code')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label" for="formtabs-username">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            name="city" value="{{ $customer->city }}" />
                                        @error('city')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label class="form-label" for="formtabs-email">Phone</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ $customer->phone }}" />
                                            @error('phone')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
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
                                        <input type="text" class="form-control @error('description') is-invalid @enderror"
                                            name="description" value="{{ $customer->description }}" />
                                        @error('description')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="pt-4">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Save</button>
                                    <a href="{{ route('hp_customer.index') }}" class="btn btn-label-secondary">Cancel</a>
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
    {!! JsValidator::formRequest('App\Http\Requests\UpdateHpCustomer', '#edit-form') !!}
    <script>
    $(document).ready(function() {
        var ownerName = document.getElementById("ownerName");
        $('select[name="dealer_customer_id"]').on('change', function() {
            var customerID = $(this).val();
            if (customerID) {
                $.ajax({
                    url: '/get_customer_ajax/' + customerID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        ownerName.value = data.name;
                    }
                });
            }
        });

        autoCallAjax();
        function autoCallAjax() {
            var customerID = {{ $customer->dealer_customer_id }};
            $.ajax({
                url: '/get_customer_ajax/' + customerID,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    ownerName.value = data.name;
                }
            });
        }
    });


    
</script>
@endsection
