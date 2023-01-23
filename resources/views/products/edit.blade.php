@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-9 col-sm-12">
            <div class="card mb-4">
                <h5 class="card-header">Product</h5>
                <form class="card-body" autocomplete="off" action="{{ route('products.update', $product->id) }}"
                    method="POST" id="edit-form">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label" for="multicol-country">Brand</label>
                            <select class="select2 form-select" data-allow-clear="true" name="brand_id">
                                <option value="">Select</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" @if ($brand->id == $product->brand_id) selected @endif>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Brand Name</label>
                            <input type="text" class="form-control @error('brand_name') is-invalid @enderror"
                                name="brand_name" value="{{ $product->brand_name }}" />
                            @error('brand_name')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Product</label>
                            <input type="text" class="form-control @error('product') is-invalid @enderror" name="product"
                                value="{{ $product->product }}" />
                            @error('product')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Type</label>
                            <input type="text" class="form-control @error('type') is-invalid @enderror" name="type"
                                value="{{ $product->type }}" />
                            @error('type')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Model No</label>
                            <input type="text" class="form-control @error('model_no') is-invalid @enderror" name="model_no"
                                value="{{ $product->model_no }}" />
                            @error('model_no')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Model Year</label>
                            <input type="text" class="form-control @error('model_year') is-invalid @enderror"
                                name="model_year" value="{{ $product->model_year }}" />
                            @error('model_year')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Configuration</label>
                            <input type="text" class="form-control @error('configuration') is-invalid @enderror"
                                name="configuration" value="{{ $product->configuration }}" />
                            @error('configuration')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Body Color</label>
                            <input type="text" class="form-control @error('body_color') is-invalid @enderror"
                                name="body_color" value="{{ $product->body_color }}" />
                            @error('body_color')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Interior Color</label>
                            <input type="text" class="form-control @error('interior_color') is-invalid @enderror"
                                name="interior_color" value="{{ $product->interior_color }}" />
                            @error('interior_color')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Engine Power</label>
                            <input type="text" class="form-control @error('engine_power') is-invalid @enderror"
                                name="engine_power" value="{{ $product->engine_power }}" />
                            @error('engine_power')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Chessi No</label>
                            <input type="text" class="form-control @error('chessi_no') is-invalid @enderror"
                                name="chessi_no" value="{{ $product->chessi_no }}" />
                            @error('chessi_no')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Engine No</label>
                            <input type="text" class="form-control @error('engine_no') is-invalid @enderror"
                                name="engine_no" value="{{ $product->engine_no }}" />
                            @error('engine_no')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Weight</label>
                            <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight"
                                value="{{ $product->weight }}" />
                            @error('weight')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Door</label>
                            <input type="text" class="form-control @error('door') is-invalid @enderror" name="door"
                                value="{{ $product->door }}" />
                            @error('door')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Seater</label>
                            <input type="text" class="form-control @error('seater') is-invalid @enderror" name="seater"
                                value="{{ $product->seater }}" />
                            @error('seater')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Vehicle No</label>
                            <input type="text" class="form-control @error('vehicle_no') is-invalid @enderror"
                                name="vehicle_no" value="{{ $product->vehicle_no }}" />
                            @error('vehicle_no')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Quantity</label>
                            <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                value="{{ $product->quantity }}" />
                            @error('quantity')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Commodity</label>
                            <input type="text" class="form-control @error('commodity') is-invalid @enderror"
                                name="commodity" value="{{ $product->commodity }}" />
                            @error('commodity')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">ID No</label>
                            <input type="text" class="form-control @error('id_no') is-invalid @enderror" name="id_no"
                                value="{{ $product->id_no }}" />
                            @error('id_no')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">A/U</label>
                            <input type="text" class="form-control @error('unit') is-invalid @enderror" name="unit"
                                value="{{ $product->unit }}" />
                            @error('unit')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Amount USD</label>
                            <input type="text" class="form-control @error('amount_usd') is-invalid @enderror"
                                name="amount_usd" value="{{ $product->amount_usd }}" />
                            @error('amount_usd')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Exchange Rate</label>
                            <input type="text" class="form-control @error('exchange_rate') is-invalid @enderror"
                                name="exchange_rate" value="{{ $product->exchange_rate }}" />
                            @error('exchange_rate')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Adjustment Value AD</label>
                            <input type="text" class="form-control @error('adjustment_value_ad') is-invalid @enderror"
                                name="adjustment_value_ad" value="{{ $product->adjustment_value_ad }}" />
                            @error('adjustment_value_ad')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Import Duty And Other Tax Percent</label>
                            <input type="text"
                                class="form-control @error('import_duty_other_tax_percent') is-invalid @enderror"
                                name="import_duty_other_tax_percent"
                                value="{{ $product->import_duty_other_tax_percent }}" />
                            @error('import_duty_other_tax_percent')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Commercial Tax Percent</label>
                            <input type="text" class="form-control @error('commercial_tax_percent') is-invalid @enderror"
                                name="commercial_tax_percent" value="{{ $product->commercial_tax_percent }}" />
                            @error('commercial_tax_percent')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Maccs Service Fee</label>
                            <input type="text" class="form-control @error('maccs_service_fee') is-invalid @enderror"
                                name="maccs_service_fee" value="{{ $product->maccs_service_fee }}" />
                            @error('maccs_service_fee')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>


                        <div class="col-md-6">
                            <label class="form-label">Security Fee</label>
                            <input type="text" class="form-control @error('security_fee') is-invalid @enderror"
                                name="security_fee" value="{{ $product->security_fee }}" />
                            @error('security_fee')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Redemption Fine</label>
                            <input type="text" class="form-control @error('redemption_fine') is-invalid @enderror"
                                name="redemption_fine" value="{{ $product->redemption_fine }}" />
                            @error('redemption_fine')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Advance Tax Percent</label>
                            <input type="text" class="form-control @error('advance_tax_percent') is-invalid @enderror"
                                name="advance_tax_percent" value="{{ $product->advance_tax_percent }}" />
                            @error('advance_tax_percent')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label class="form-label">Remark</label>
                            <input type="text" class="form-control @error('remark') is-invalid @enderror" name="remark"
                                value="{{ $product->remark }}" />
                            @error('remark')
                                <div class="invalid-feedback"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Save</button>
                        <a href="{{ route('products.index') }}" class="btn btn-label-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateProducts', '#edit-form') !!}
@endsection
