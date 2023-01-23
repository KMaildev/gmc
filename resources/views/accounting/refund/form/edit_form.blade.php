<form action="{{ route('sale_refund.update', $refund_edit->id) }}" method="POST" autocomplete="off" id="edit-form">
    @csrf
    @method('PUT')
    <tr>
        <td></td>

        <td>
            <select class="select2 form-select form-select-sm @error('sales_invoice_id') is-invalid @enderror"
                data-allow-clear="false" id="SalesInvoiceID" name="sales_invoice_id" required>
                <option value="">-- Invoice No --</option>
                @foreach ($form_sales_invoices as $form_sales_invoice)
                    <option value="{{ $form_sales_invoice->id }}" @if ($form_sales_invoice->id == $refund_edit->sales_invoice_id) selected @endif>
                        {{ $form_sales_invoice->invoice_no }}
                    </option>
                @endforeach
            </select>
            @error('sales_invoice_id')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td></td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('refund_amount') is-invalid @enderror"
                style="width: 100%" name="refund_amount" value="{{ $refund_edit->refund }}" />
            @error('refund_amount')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm date_picker  @error('refund_date') is-invalid @enderror"
                name="refund_date" style="width: 100%" value="{{ $refund_edit->refund_date }}" />
            @error('refund_date')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td style="text-align: center">
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </td>
    </tr>
</form>

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateSaleRefunds', '#edit-form') !!}
@endsection
