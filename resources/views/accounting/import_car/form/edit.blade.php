<form class="card-body" action="{{ route('import_car.update', $product_edit->id) }}" method="POST"
    autocomplete="off" id="edit-form">
    @csrf
    @method('PUT')
    <tr>
        <td></td>
        {{-- Commodity --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('commodity') is-invalid @enderror"
                name="commodity" value="{{ $product_edit->commodity }}" />
            @error('commodity')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- ID No --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('id_no') is-invalid @enderror"
                name="id_no" value="{{ $product_edit->id_no }}" />
            @error('id_no')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- A/U --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('unit') is-invalid @enderror"
                name="unit" value="{{ $product_edit->unit }}" />
            @error('unit')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Qty --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('quantity') is-invalid @enderror"
                name="quantity" value="{{ $product_edit->quantity }}" />
            @error('quantity')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>


        {{-- Rate USD --}}
        <td></td>

        {{-- Amount USD --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('amount_usd') is-invalid @enderror"
                name="amount_usd" value="{{ $product_edit->amount_usd }}" />
            @error('amount_usd')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Exchange Rate --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('exchange_rate') is-invalid @enderror"
                name="exchange_rate" value="{{ $product_edit->exchange_rate }}" />
            @error('exchange_rate')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Con; Kyats --}}
        <td></td>

        {{-- Adjustment Value AD --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('adjustment_value_ad') is-invalid @enderror"
                name="adjustment_value_ad" value="{{ $product_edit->adjustment_value_ad }}" />
            @error('adjustment_value_ad')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Total Value --}}
        <td></td>

        {{-- Import Duty & Other Tax --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('import_duty_other_tax_percent') is-invalid @enderror"
                name="import_duty_other_tax_percent" value="{{ $product_edit->import_duty_other_tax_percent }}" />
            @error('import_duty_other_tax_percent')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Commercial tax --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('commercial_tax_percent') is-invalid @enderror"
                name="commercial_tax_percent" value="{{ $product_edit->commercial_tax_percent }}" />
            @error('commercial_tax_percent')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Maccs Service Fee --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('maccs_service_fee') is-invalid @enderror"
                name="maccs_service_fee" value="{{ $product_edit->maccs_service_fee }}" />
            @error('maccs_service_fee')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Security Fee --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('security_fee') is-invalid @enderror"
                name="security_fee" value="{{ $product_edit->security_fee }}" />
            @error('security_fee')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>


        {{-- Redemption Fine --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('redemption_fine') is-invalid @enderror"
                name="redemption_fine" value="{{ $product_edit->redemption_fine }}" />
            @error('redemption_fine')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- AV Rates --}}
        <td></td>

        {{-- AV Value Kyats --}}
        <td></td>

        {{-- Advance Tax --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('advance_tax_percent') is-invalid @enderror"
                name="advance_tax_percent" value="{{ $product_edit->advance_tax_percent }}" />
            @error('advance_tax_percent')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Advance Tax --}}
        <td></td>

        {{-- Custom Duty --}}
        <td></td>

        <td>
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </td>
    </tr>
</form>
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateImportCar', '#edit-form') !!}
@endsection
