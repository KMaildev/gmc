@extends('layouts.menus.spare_part')
@section('content')
    <div class="row justify-content-center">

        <div class="col-md-9 col-lg-9 col-sm-12">
            <h6 class="text-muted">Create Item</h6>
            <div class="card shadow-none border mb-3">
                <div class="card-header border-bottom">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-within-card-active" aria-controls="navs-within-card-active"
                                aria-selected="true">
                                Create Item
                            </button>
                        </li>
                        <li class="nav-item" hidden>
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-within-card-link" aria-controls="navs-within-card-link"
                                aria-selected="false">
                                Create Item [Import Excel]
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-within-card-active" role="tabpanel">
                        @include('spare_parts.item.form.manual_create')
                    </div>

                    <div class="tab-pane fade" id="navs-within-card-link" role="tabpanel">
                        @include('spare_parts.item.form.excel_import')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreSparePartItem', '#create-form') !!}
    {!! JsValidator::formRequest('App\Http\Requests\StoreImportProducts', '#import-form') !!}
@endsection
