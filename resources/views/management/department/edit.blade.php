@extends('layouts.menus.management')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card mb-4">
                <h5 class="card-header">Department</h5>
                <div class="card-body">

                    <form action="{{ route('department.update', $department->id) }}" method="POST" autocomplete="off"
                        id="edit-form" role="form">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Title</label>
                            <div class="col-md-9">
                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                    value="{{ $department->title }}" />
                                @error('title')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-secondary">Save</button>
                                <a href="{{ route('department.index') }}" class="btn btn-success">Cancel</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateDepartment', '#create-form') !!}
@endsection
@endsection
