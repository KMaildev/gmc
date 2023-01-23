@extends('layouts.menus.spare_part')
@section('content')
    <div class="row justify-content-center">

        <div class="col-md-9 col-lg-9 col-sm-12">
            <h1 class="" style="font-weight: bold;">Edit Item</h1>

            <form class="card-body" autocomplete="off" action="{{ route('spare_part_item.update', $part_item->id) }}"
                method="POST" id="create-form">
                @csrf
                @method('PUT')
                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">
                            Date
                        </label>
                        <input type="text" class="form-control date_picker @error('create_date') is-invalid @enderror"
                            name="create_date" value="{{ $part_item->create_date ?? '' }}"/>
                        @error('create_date')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">
                            Spare Part Number
                        </label>
                        <input type="text" class="form-control @error('part_number') is-invalid @enderror"
                            name="part_number" value="{{ $part_item->part_number ?? '' }}" />
                        @error('part_number')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Spare Part Name</label>
                        <input type="text" class="form-control @error('part_name') is-invalid @enderror" name="part_name"
                            value="{{ $part_item->part_name ?? '' }}" />
                        @error('part_name')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">
                            Opening Qty
                        </label>
                        <input type="text" class="form-control @error('opening_qty') is-invalid @enderror"
                            name="opening_qty" value="{{ $part_item->opening_qty ?? 0 }}" />
                        @error('opening_qty')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Remark</label>
                        <input type="text" class="form-control @error('remark') is-invalid @enderror" name="remark"
                            value="{{ $part_item->remark ?? '' }}" />
                        @error('remark')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                </div>
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Save</button>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateSparePartItem', '#create-form') !!}
@endsection
