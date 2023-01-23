<form class="card-body" autocomplete="off" action="{{ route('spare_part_item.store') }}" method="POST" id="create-form">
    @csrf
    <div class="row g-3">

        <div class="col-md-4">
            <label class="form-label">
                Date
            </label>
            <input type="text" class="form-control date_picker @error('create_date') is-invalid @enderror"
                name="create_date" />
            @error('create_date')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label">
                Spare Part Number
            </label>
            <input type="text" class="form-control @error('part_number') is-invalid @enderror" name="part_number" />
            @error('part_number')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label">Spare Part Name</label>
            <input type="text" class="form-control @error('part_name') is-invalid @enderror" name="part_name"
                value="{{ old('part_name') }}" />
            @error('part_name')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label">
                Opening Qty
            </label>
            <input type="text" class="form-control @error('opening_qty') is-invalid @enderror" name="opening_qty" />
            @error('opening_qty')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

        <div class="col-md-4">
            <label class="form-label">Remark</label>
            <input type="text" class="form-control @error('remark') is-invalid @enderror" name="remark"
                value="{{ old('remark') }}" />
            @error('remark')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>

    </div>
    <div class="pt-4">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Save</button>
    </div>
</form>
