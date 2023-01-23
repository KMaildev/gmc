@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-10 col-12 mb-lg-0 mb-4">
            <form action="{{ route('purchase_order.update', $purchase_order->id) }}" method="POST" autocomplete="off"
                id="create-form">
                @csrf
                @method('PUT')
                <div class="card invoice-preview-card">
                    <div class="card-body">

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                id="SupplierID" name="supplier_id">
                                                <option value="">--Please Select Supplier --</option>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id ?? '' }}"
                                                        @if ($supplier->id == $purchase_order->supplier_id) selected @endif>
                                                        {{ $supplier->name ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('supplier_id')
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
                                </dl>
                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Invoice No.
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('purchase_no') is-invalid @enderror"
                                                value="{{ $purchase_order->purchase_no ?? '' }}" name="purchase_no">
                                            @error('purchase_no')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('purchase_date') is-invalid @enderror"
                                                value="{{ $purchase_order->purchase_date ?? '' }}" name="purchase_date">
                                            @error('purchase_date')
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
                                        <th style="color: white; text-align: center;">Product Name</th>
                                        <th style="color: white; text-align: center;">Models</th>
                                        <th style="color: white; text-align: center;">Description</th>
                                        <th style="color: white; text-align: center;">Order Quantity</th>
                                        <th style="color: white; text-align: center;">CIF Yangon ( USD )</th>
                                        <th style="color: white; text-align: center;">Amount USD</th>
                                        <th style="color: white; text-align: center;">Action</th>
                                    </tr>
                                </thead>

                                <tr>

                                    <td></td>

                                    {{-- Product Name --}}
                                    <td>
                                        <select class="form-select" id="BrandId">
                                            <option value="">--Select Product Name --</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">
                                                    {{ $brand->name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror
                                    </td>

                                    {{-- Models --}}
                                    <td>
                                        <div id="Models">
                                            <select class="form-select" style="width: 170px;">
                                                <option value="">--Please Select--</option>
                                            </select>
                                        </div>
                                    </td>


                                    {{-- Description --}}
                                    <td>
                                        <input type="text" class="form-control" id="Description">
                                    </td>

                                    {{-- Order Quantity --}}
                                    <td>
                                        <input type="text" class="form-control" required id="Qty"
                                            oninput="SetCalculator()" />
                                    </td>

                                    {{-- CIF Yangon ( USD ) --}}
                                    <td>
                                        <input type="text" class="form-control" id="CIFUSD" oninput="SetCalculator()">
                                    </td>

                                    {{-- Amount USD --}}
                                    <td>
                                        <input type="text" class="form-control" id="TotalAmountUSD">
                                    </td>

                                    <td>
                                        <input type="button" value="Add" class="btn btn-sm btn-primary"
                                            onclick="setPurchaseInvoiceCart()">
                                    </td>
                                </tr>

                                <tbody id="TemporaryPurchaseItemsList">
                                    @php
                                        $amount_total = [];
                                    @endphp
                                </tbody>

                                <tbody>
                                    @php
                                        $amount_total = [];
                                    @endphp
                                    @foreach ($purchase_items as $item => $purchase_item)
                                        <tr>
                                            <td>
                                                {{ $item + 1 }}
                                            </td>

                                            <td>
                                                {{ $purchase_item->brands_table->name ?? '' }}
                                            </td>

                                            <td>
                                                {{ $purchase_item->type_of_models_table->title ?? '' }}
                                            </td>

                                            <td>
                                                {{ $purchase_item->description ?? '' }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                {{ $purchase_item->qty ?? 0 }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                {{ number_format($purchase_item->cif_usd, 2) }}
                                            </td>

                                            <td style="text-align: right; font-weight: bold;">
                                                @php
                                                    $item_total_amount = $purchase_item->qty * $purchase_item->cif_usd ?? 0;
                                                    echo number_format($item_total_amount, 2);
                                                    $amount_total[] = $item_total_amount;
                                                @endphp
                                            </td>

                                            <td>
                                                <a href="{{ route('purchase_item_remove', $purchase_item->id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    Remove
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Purchase Representative
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="purchase_representative_id">
                                                <option value="">-- Select Purchase Representative --</option>
                                                @foreach ($sales_persons as $sales_person)
                                                    <option value="{{ $sales_person->id }}"
                                                        @if ($sales_person->id == $purchase_order->purchase_representative_id) selected @endif>
                                                        {{ $sales_person->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('purchase_representative_id')
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
                                            @php
                                                $total_amount = array_sum($amount_total);
                                            @endphp
                                            <input type="text" class="form-control form-control-sm"
                                                style="text-align: right;" value="{{ number_format($total_amount, 2) }}">

                                            <input type="hidden" value="{{ $total_amount }}" name="total_amount"
                                                id="totalAmountSave">
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Status
                                        </label>
                                        <div class="col-sm-8">
                                            <select class="form-select" name="order_status">
                                                <option value="Ordered">
                                                    Ordered
                                                </option>
                                            </select>
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

        $('select[id="BrandId"]').on('change', function() {
            var BrandId = $(this).val();
            if (BrandId) {
                $.ajax({
                    url: '/get_type_of_models_ajax/' + BrandId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        let models =
                            '<select id="type_of_model_id" name="type_of_model_id" class="form-select" style="width: 170px;">';
                        $.each(data, function(key, value) {
                            var id = value.id;
                            var value = value.title;
                            models += '<option value=' + id + '>' + value + '</option>';
                        });
                        models += '</select>';
                        $('#Models').html(models);
                    }

                });
            } else {
                let models = '<select class="form-select" style="width: 170px;">';
                models += '<option>--Please Select--</option>';
                models += '</select>';
                $('#Models').html(models);
            }
        });


        // Qty * Price
        function SetCalculator() {
            var Qty = document.getElementById("Qty").value;
            var CIFUSD = document.getElementById("CIFUSD").value;
            var AmountTotal = Qty * CIFUSD;
            TotalAmountUSD.value = AmountTotal;
        }

        function setPurchaseInvoiceCart() {
            var brand_id = document.getElementById("BrandId").value;
            var type_of_model_id = document.getElementById("type_of_model_id").value;
            var qty = document.getElementById("Qty").value;
            var cif_usd = document.getElementById("CIFUSD").value;
            var description = document.getElementById("Description").value;

            if (brand_id == null || brand_id == "") {
                alert("Please Select Product Name");
                return false;
            } else if (type_of_model_id == null || type_of_model_id == "") {
                alert("Please Select Models");
                return false;
            } else if (qty == null || qty == "" || isNaN(qty)) {
                alert("Enter Numeric value only.");
                return false;
            } else if (cif_usd == null || cif_usd == "" || isNaN(cif_usd)) {
                alert("Enter Numeric value only.");
                return false;
            }

            var url = '{{ url('store_temporary_purchase_item') }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    brand_id: brand_id,
                    type_of_model_id: type_of_model_id,
                    qty: qty,
                    cif_usd: cif_usd,
                    description: description,
                },
                success: function(data) {
                    getTemporaryPurchaseItems();
                },
                error: function(data) {}
            });
        }


        function getTemporaryPurchaseItems() {
            var url = '{{ url('get_temporary_purchase_items') }}';
            $.ajax({
                url: url,
                method: "GET",
                success: function(data) {
                    console.log(data);
                    let sales_items = '';
                    var totalAmount = 0;
                    $.each(JSON.parse(data), function(key, value) {
                        totalAmount += value.qty * value.cif_usd;
                        let k = key + 1;
                        sales_items += '<tr>';
                        sales_items += '<td>' + k + '</td>' //Sr.No	


                        // Product Name	 
                        sales_items += '<td>'
                        sales_items += value.brands_table.name;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][brand_id]" value="' + value.brand_id + '" required />'
                        sales_items += '</td>'

                        // Models
                        sales_items += '<td>'
                        sales_items += value.type_of_models_table.title;

                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][type_of_model_id]" value="' + value.type_of_model_id + '" required />'

                        sales_items += '</td>'

                        // Description
                        sales_items += '<td>'
                        sales_items += value.description;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][description]" value="' + value.description + '" required />'
                        sales_items += '</td>'

                        // Order Quantity	
                        sales_items += '<td>'
                        sales_items += value.qty;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][qty]" value="' + value.qty + '" required />'
                        sales_items += '</td>'

                        // CIF Yangon ( USD )		
                        sales_items += '<td>'
                        sales_items += value.cif_usd;
                        sales_items += '<input type="hidden" name="productFields[' + k +
                            '][cif_usd]" value="' + value.cif_usd + '" required />'
                        sales_items += '</td>'

                        // Amount USD	
                        sales_items += '<td>'
                        sales_items += value.qty * value.cif_usd;
                        sales_items += '</td>'

                        // Action
                        sales_items += '<td>'
                        sales_items += '<a href="javascript:void(0);" class="remove_item" data-id="' +
                            value.id + '"> Remove</a>'
                        sales_items += '</td>'
                        sales_items += '</tr>';
                    });
                    $('#TemporaryPurchaseItemsList').html(sales_items);
                    totalAmountShow.value = (totalAmount).toLocaleString('en');
                    totalAmountSave.value = totalAmount;
                }
            });
        }

        getTemporaryPurchaseItems();

        // RemoveItem
        $(document).on("click", ".remove_item", function() {
            var id = $(this).data('id');
            $.ajax({
                url: `/remove_temporary_purchase_items/${id}`,
                method: "GET",
                success: function(data) {
                    getTemporaryPurchaseItems();
                }
            });
        });

        $('select[id="SupplierID"]').on('change', function() {
            var supplierID = $(this).val();
            if (supplierID) {
                $.ajax({
                    url: '/get_supplier_ajax/' + supplierID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        Address.value = data.address;
                        Ph.value = data.phone;
                    }
                });
            }
        });

        function getSupplierAjaxAuto() {
            var supplierID = '{{ $purchase_order->supplier_id }}'
            if (supplierID) {
                $.ajax({
                    url: '/get_supplier_ajax/' + supplierID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        Address.value = data.address;
                        Ph.value = data.phone;
                    }
                });
            }
        }
        getSupplierAjaxAuto();
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\UpdatePurchaseOrder', '#create-form') !!}
@endsection
