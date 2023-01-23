<link rel="stylesheet" href="{{ asset('assets/css/cash_book_form.css') }}" />
<form action="{{ route('sales_invoices.store') }}" method="POST" autocomplete="off" id="create-form">
    @csrf
    <tr>
        <td></td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('invoice_no') is-invalid @enderror"
                name="invoice_no" />
            @error('invoice_no')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm date_picker @error('invoice_date') is-invalid @enderror"
                name="invoice_date" />
            @error('invoice_date')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Company Name --}}
        <td>
            <select class="select2 form-select form-select-sm" data-allow-clear="false" id="CustomerID">
                <option value="">--Please Select Customer --</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">
                        {{ $customer->company_name }}
                    </option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Dealer Name --}}
        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm " id="DealerName" readonly />
        </td>

        {{-- Brand Name --}}
        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm" id="BrandName" readonly />
        </td>

        {{-- Type --}}
        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm" id="Type" readonly />
        </td>

        {{-- Model --}}
        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm" id="Model" readonly />
        </td>

        {{-- Color --}}
        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm" id="Color" readonly />
        </td>

        {{-- Chassis No. --}}
        <td>
            <select class="select2 form-select form-select-sm" data-allow-clear="false" id="ChessiNO">
                <option value="">--Please Select Chessi No --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->chessi_no }}
                    </option>
                @endforeach
            </select>
            @error('chessi_no')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Vehicle No. --}}
        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm" id="VehicleNO" readonly />
        </td>


        {{-- Qty --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('qty') is-invalid @enderror"
                name="qty" id="Qty" oninput="SetCalculator()" />
            @error('qty')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Unit Price --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('unit_price') is-invalid @enderror"
                name="unit_price" id="UnitPrice" oninput="SetCalculator()" />
            @error('unit_price')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Sales Value --}}
        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm" value="0" id="SaleValue"
                readonly />
        </td>

        {{-- Total Amount --}}
        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm" value="0" id="TotalAmount"
                readonly />
        </td>

        {{-- Down Payment --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('down_payment') is-invalid @enderror"
                name="down_payment" id="DownPayment" oninput="SetCalculator()" />
            @error('down_payment')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Discount --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('discount') is-invalid @enderror"
                name="discount" id="Discount" oninput="SetCalculator()" />
            @error('discount')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Dealer Percentage --}}
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('dealer_percentage') is-invalid @enderror"
                name="dealer_percentage" value="0" id="DealerPercentage" oninput="SetCalculator()" />
            @error('dealer_percentage')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Balance to Pay --}}
        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm" value="0" id="BalanceToPay"
                readonly />
        </td>

        <td>
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </td>

    </tr>

    <input type="hidden" id="setCustomerId" required name="customer_id">
    <input type="hidden" id="setChessiNo" required name="chessi_no">
</form>

@section('script')
    <script>
        function SetCalculator() {
            var Qty = document.getElementById("Qty").value;
            var UnitPrice = document.getElementById("UnitPrice").value;
            var DownPayment = document.getElementById("DownPayment").value;
            var Discount = document.getElementById("Discount").value;
            var DealerPercentage = document.getElementById("DealerPercentage").value;

            SaleValue.value = Qty * UnitPrice;
            TotalAmount.value = Qty * UnitPrice;
            var AmountTotal = Qty * UnitPrice;
            BalanceToPay.value = AmountTotal - DownPayment - Discount - DealerPercentage;
        }


        $(document).ready(function() {

            $('select[id="CustomerID"]').on('change', function() {
                var customerID = $(this).val();
                setCustomerId.value = customerID;
                if (customerID) {
                    $.ajax({
                        url: '/get_customer_ajax/' + customerID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            DealerName.value = data.name;
                        }
                    });
                }
            });


            $('select[id="ChessiNO"]').on('change', function() {
                var ChessiNO = $(this).val();
                setChessiNo.value = ChessiNO;
                if (ChessiNO) {
                    $.ajax({
                        url: '/get_products_ajax/' + ChessiNO,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            BrandName.value = data.brand_name;
                            Type.value = data.type;
                            Model.value = data.model_no;
                            Color.value = data.body_color;
                            VehicleNO.value = data.vehicle_no;
                        }
                    });
                }
            });
        });
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreSalesInvoices', '#create-form') !!}
@endsection
