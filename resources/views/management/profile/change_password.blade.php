@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}" />
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12 col-lg-8">
            <div class="row">
                <div class="col-12">

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            @include('layouts.includes.alert')
                            <!-- About User -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <p style="color: red;">
                                        The password of the currently account change
                                    </p>
                                    <form action="{{ route('changepassword.update', $employee->id) }}" method="POST"
                                        autocomplete="off" id="edit-form" role="form">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3 row">
                                            <label for="html5-text-input" class="col-md-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-9">
                                                <input class="form-control @error('password') is-invalid @enderror"
                                                    type="password" name="password" value="{{ old('password') }}" />
                                                @error('password')
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="html5-search-input" class="col-md-3 col-form-label"></label>
                                            <div class="col-md-9">
                                                <button type="submit" class="btn btn-secondary">Change</button>
                                                <a href="{{ route('home') }}" class="btn btn-success">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--/ About User -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdatePassword', '#edit-form') !!}
@endsection
