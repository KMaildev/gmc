@extends('layouts.menus.service')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card mb-4">
                <h5 class="card-header">Types of Service</h5>
                <div class="card-body">

                    <form action="{{ route('types_of_service.update', $types_of_service->id) }}" method="POST"
                        autocomplete="off" id="create-form" role="form">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Types of Service</label>
                            <div class="col-md-9">
                                <input class="form-control @error('types_of_service') is-invalid @enderror" type="text"
                                    name="types_of_service" value="{{ $types_of_service->types_of_service ?? '' }}" />
                                @error('types_of_service')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('types_of_service.index') }}" class="btn btn-success">Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreTypesOfService', '#create-form') !!}
@endsection
