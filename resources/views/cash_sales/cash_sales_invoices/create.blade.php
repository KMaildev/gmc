@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
            <form action="{{ route('cash_sales_invoices.store') }}" method="POST" autocomplete="off" id="create-form">
                @csrf
                <div class="card invoice-preview-card">
                    <div class="card-body">

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                id="CustomerID" name="customer_id">
                                                <option value="">--Please Select Customer --</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">
                                                        {{ $customer->name ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('customer_id')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">ID NO</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('id_no') is-invalid @enderror"
                                                value="{{ old('id_no') }}" name="id_no">
                                            @error('id_no')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Address">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">PH</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Ph">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">E-Mail
                                            Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Email">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            Post Ref.
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('post_ref') is-invalid @enderror"
                                                value="{{ old('post_ref') }}" name="post_ref">
                                            @error('post_ref')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </dl>
                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Invoice No</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('invoice_no') is-invalid @enderror"
                                                value="{{ old('invoice_no') }}" name="invoice_no">
                                            @error('invoice_no')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('invoice_date') is-invalid @enderror"
                                                value="{{ old('invoice_date') }}" name="invoice_date">
                                            @error('invoice_date')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Showroom Name
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('showroom_name') is-invalid @enderror"
                                                value="{{ old('showroom_name') }}" name="showroom_name">
                                            @error('showroom_name')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Sales Type</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('sales_type') is-invalid @enderror"
                                                value="{{ old('sales_type') }}" name="sales_type">
                                            @error('sales_type')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Payment Term</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('payment_team') is-invalid @enderror"
                                                value="{{ old('payment_team') }}" name="payment_team">
                                            @error('payment_team')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </dl>
                            </div>
                        </div>
                        <hr class="mx-n4" />

                        <div class="row">
                            <table class="table table-bordered table-sm">
                                <thead class="tbbg">
                                    <tr>
                                        <th style="color: white; text-align: center; width: 1%;">Sr.No</th>
                                        <th style="color: white; text-align: center;">Model</th>
                                        <th style="color: white; text-align: center;">Chassis No.& Vehicle No.</th>
                                        <th style="color: white; text-align: center;">Description</th>
                                        <th style="color: white; text-align: center;">Qty</th>
                                        <th style="color: white; text-align: center;">Price</th>
                                        <th style="color: white; text-align: center;">Amount (MMK)</th>
                                        <th style="color: white; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tr>

                                    <td></td>

                                    {{-- Model --}}
                                    <td>
                                        <input type="text" class="form-control" id="Model">
                                    </td>

                                    {{-- Chassis No.& Vehicle No --}}
                                    <td>
                                        <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                            id="ChessiNO">
                                            <option value="">--Select Chassis No --</option>
                                            @foreach ($products as $product)
                                                @php
                                                    $sales_items = $product->sales_items_table->product_id ?? 0;
                                                @endphp
                                                @if ($sales_items != $product->id)
                                                    <option value="{{ $product->id }}">
                                                        {{ $product->chessi_no }}
                                                    </option>
                                                @endif
                                                @php
                                                    $sales_return_items = $product->sales_return_items_table->products_table ?? '';
                                                @endphp
                                                @if ($sales_return_items)
                                                    <option value="{{ $sales_return_items->id }}">
                                                        {{ $sales_return_items->chessi_no }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('chessi_no')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </td>

                                    {{-- Description --}}
                                    <td>
                                        <input type="text" class="form-control" id="Description">
                                    </td>

                                    {{-- Qty --}}
                                    <td>
                                        <input type="text" class="form-control" required id="Qty"
                                            oninput="SetCalculator()" />
                                    </td>

                                    {{-- Price --}}
                                    <td>
                                        <input type="text" class="form-control" id="UnitPrice"
                                            oninput="SetCalculator()">
                                    </td>

                                    {{-- Amount --}}
                                    <td>
                                        <input type="text" class="form-control" id="TotalAmount">
                                    </td>

                                    <td>
                                        <input type="button" value="Add" class="btn btn-sm btn-primary"
                                            onclick="setSaleInvoiceCart()">
                                    </td>
                                </tr>

                                <tbody id="TemporarySalesItemsList">
                                    @php
                                        $amount_total = [];
                                    @endphp
                                </tbody>
                            </table>
                        </div>


                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Sales Person</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="sales_persons_id">
                                                <option value="">-- Select Sales Person --</option>
                                                @foreach ($sales_persons as $sales_person)
                                                    <option value="{{ $sales_person->id }}">
                                                        {{ $sales_person->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('sales_persons_id')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            Delivery Date
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('delivery_date') is-invalid @enderror"
                                                value="{{ old('delivery_date') }}" name="delivery_date">
                                            @error('delivery_date')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </dl>
                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Total Amount
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm"
                                                style="text-align:right;" id="totalAmountShow">
                                            <input type="hidden" value="0" name="total_amount"
                                                id="totalAmountSave">
                                        </div>
                                    </div>


                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Discount
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('discount') is-invalid @enderror"
                                                    name="discount" style="text-align:right;" value="0"
                                                    id="Discount" oninput="SetCalculateDownPayment()" />
                                            </div>
                                            @error('discount')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            BALANCE TO BE PAY
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control form-control-sm @error('balance_to_be_pay') is-invalid @enderror"
                                                name="balance_to_be_pay" id="BalanceToPay" style="text-align:right;" />
                                            @error('balance_to_be_pay')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            TOTAL BALANCE TO BE PAY DATE
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('balance_to_pay_date') is-invalid @enderror"
                                                name="balance_to_pay_date" id="BalanceToPayDate"
                                                style="text-align:right;" />
                                            @error('balance_to_pay_date')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary" style='float: right;'>
                                                Save
                                            </button>
                                        </div>
                                    </div>

                                </dl>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var totalAmountShow = document.getElementById("totalAmountShow");
        var totalAmountSave = document.getElementById("totalAmountSave");

        // Qty * Price
        function SetCalculator() {
            var Qty = document.getElementById("Qty").value;
            var UnitPrice = document.getElementById("UnitPrice").value;
            var AmountTotal = Qty * UnitPrice;
            TotalAmount.value = AmountTotal;
        }

        function SetCalculateDownPayment() {
            var getTotalAmount = document.getElementById("totalAmountSave").value;
            var TotalAmountValue = getTotalAmount;
            var Discount = document.getElementById("Discount").value;
            BalanceToPay.value = TotalAmountValue - Discount;
        }


        function setSaleInvoiceCart() {
            var ChessiNO = document.getElementById("ChessiNO").value;
            var Qty = document.getElementById("Qty").value;
            var UnitPrice = document.getElementById("UnitPrice").value;
            var Description = document.getElementById("Description").value;

            if (ChessiNO == null || ChessiNO == "") {
                alert("Chassis No.& Vehicle No.");
                return false;
            } else if (Qty == null || Qty == "" || isNaN(Qty)) {
                alert("Enter Numeric value only.");
                return false;
            } else if (UnitPrice == null || UnitPrice == "" || isNaN(UnitPrice)) {
                alert("Enter Numeric value only.");
                return false;
            }

            var url = '{{ url('add_cart_temporary') }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    ChessiNO: ChessiNO,
                    Qty: Qty,
                    Price: UnitPrice,
                    Description: Description,
                },
                success: function(data) {
                    getTemporarySalesItems();
                },
                error: function(data) {}
            });
        }

        $('select[id="CustomerID"]').on('change', function() {
            var customerID = $(this).val();
            if (customerID) {
                $.ajax({
                    url: '/get_customer_ajax/' + customerID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        Address.value = data.address;
                        Ph.value = data.phone;
                        Email.value = data.email;
                        DealerCode.value = data.dealer_code;
                    }
                });
            }
        });

        $('select[id="ChessiNO"]').on('change', function() {
            var ChessiNO = $(this).val();
            if (ChessiNO) {
                $.ajax({
                    url: '/get_products_ajax/' + ChessiNO,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        Model.value = data.product;
                    }
                });
            }
        });


        function getTemporarySalesItems() {
            var url = '{{ url('get_temporary_sales_items') }}';
            $.ajax({
                url: url,
                method: "GET",
                success: function(data) {
                    let sales_items = '';
                    var totalAmount = 0;
                    $.each(JSON.parse(data), function(key, value) {
                        totalAmount += value.qty * value.price;
                        let k = key + 1;
                        sales_items += '<tr>';
                        sales_items += '<td>' + k + '</td>' //Sr.No	


                        // Model 
                        sales_items += '<td>'
                        sales_items += value.products_table.model_no;
                        sales_items += '</td>'

                        // Chassis No.& Vehicle No
                        sales_items += '<td>'
                        sales_items += value.products_table.chessi_no;

                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][product_id]" value="' + value.products_table.id + '" required />'

                        sales_items += '</td>'

                        // Description
                        sales_items += '<td>'
                        sales_items += value.description;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][description]" value="' + value.description + '" required />'
                        sales_items += '</td>'

                        // Qty
                        sales_items += '<td>'
                        sales_items += value.qty;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][qty]" value="' + value.qty + '" required />'
                        sales_items += '</td>'

                        // Price	
                        sales_items += '<td>'
                        sales_items += value.price;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][price]" value="' + value.price + '" required />'
                        sales_items += '</td>'

                        // Amount
                        sales_items += '<td>'
                        sales_items += value.qty * value.price;
                        sales_items += '</td>'

                        // Action
                        sales_items += '<td>'
                        sales_items += '<a href="javascript:void(0);" class="remove_item" data-id="' +
                            value.id + '"> Remove</a>'
                        sales_items += '</td>'
                        sales_items += '</tr>';
                    });
                    $('#TemporarySalesItemsList').html(sales_items);
                    totalAmountShow.value = (totalAmount).toLocaleString('en');
                    totalAmountSave.value = totalAmount;
                }
            });
        }

        getTemporarySalesItems();

        // RemoveItem
        $(document).on("click", ".remove_item", function() {
            var id = $(this).data('id');
            $.ajax({
                url: `/temporary_sales_items_remove/${id}`,
                method: "GET",
                success: function(data) {
                    getTemporarySalesItems();
                }
            });
        });
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreCashSaleInvoices', '#create-form') !!}
@endsection
