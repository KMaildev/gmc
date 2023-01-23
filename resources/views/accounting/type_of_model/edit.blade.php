@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card mb-4">
                <h5 class="card-header">
                    Type of Model
                </h5>
                <div class="card-body">

                    <form action="{{ route('type_of_models.update', $type_of_model->id) }}" method="POST" autocomplete="off"
                        id="create-form" role="form">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Brand
                            </label>
                            <div class="col-md-9">
                                <select name="brand_id" class="form-control">
                                    <option value="">-------</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id ?? 0 }}"
                                            @if ($brand->id == $type_of_model->brand_id) selected @endif>
                                            {{ $brand->name ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Model
                            </label>
                            <div class="col-md-9">
                                <input class="form-control @error('title') is-invalid @enderror" type="text"
                                    name="title" value="{{ $type_of_model->title ?? '' }}" />
                                @error('title')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('type_of_models.index') }}" class="btn btn-success">Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreTypeOfModel', '#create-form') !!}
@endsection
