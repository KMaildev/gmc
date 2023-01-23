@extends('layouts.menus.spare_part')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-12 col-12 mb-lg-0 mb-4">
            <form action="{{ route('spare_part_purchase_invoice.store') }}" method="POST" autocomplete="off" id="create-form">
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
                                                id="SupplierID" name="supplier_id">
                                                <option value="">--Please Select Supplier --</option>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->id ?? '' }}">
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
                                            Remark
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('invoice_remark') is-invalid @enderror"
                                                value="{{ old('invoice_remark') }}" name="invoice_remark">
                                            @error('invoice_remark')
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
                                        <th style="color: white; text-align: center;">Spare Parts No</th>
                                        <th style="color: white; text-align: center;">Description</th>
                                        <th style="color: white; text-align: center;">Purchase Qty</th>
                                        <th style="color: white; text-align: center;">Purchase Price</th>
                                        <th style="color: white; text-align: center;">Amount</th>
                                        <th style="color: white; text-align: center;">Local Price</th>
                                        <th style="color: white; text-align: center;">Import Price</th>
                                        <th style="color: white; text-align: center;">Action</th>
                                    </tr>
                                </thead>

                                <tr>

                                    <td></td>

                                    {{-- Parts No --}}
                                    <td>
                                        <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                            id="PartNo">
                                            <option value="">--Select Parts No --</option>
                                            @foreach ($spare_part_items as $spare_part_item)
                                                <option value="{{ $spare_part_item->id }}">
                                                    {{ $spare_part_item->part_number ?? '' }}
                                                </option>
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
                                            oninput="SetCalculator()" style="text-align: right">
                                    </td>

                                    {{-- Unit Price --}}
                                    <td>
                                        <input type="text" class="form-control" id="UnitPrice" oninput="SetCalculator()"
                                            style="text-align: right">
                                    </td>

                                    {{-- Ks --}}
                                    <td>
                                        <input type="text" class="form-control" id="kyat" style="text-align: right"
                                            readonly>
                                    </td>

                                    {{-- Local Price  --}}
                                    <td>
                                        <input type="text" class="form-control" id="LocalPrice"
                                            style="text-align: right">
                                    </td>

                                    {{-- Import Price  --}}
                                    <td>
                                        <input type="text" class="form-control" id="ImportPrice"
                                            style="text-align: right">
                                    </td>

                                    <td>
                                        <input type="button" value="Add" class="btn btn-sm btn-primary"
                                            onclick="setSaleInvoiceCart()">
                                    </td>
                                </tr>

                                <tbody id="TemporaryPartItemsList">
                                </tbody>

                            </table>
                        </div>


                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Person</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="purchase_persons_id">
                                                <option value="">-- Select Person --</option>
                                                @foreach ($sales_persons as $sales_person)
                                                    <option value="{{ $sales_person->id }}">
                                                        {{ $sales_person->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('purchase_persons_id')
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
            var UnitPrice = document.getElementById("UnitPrice").value;
            var Qty = document.getElementById("Qty").value;
            var TotalKyat = Qty * UnitPrice;
            kyat.value = TotalKyat;
        }


        function SetCalculateDownPayment() {
            var getTotalAmount = document.getElementById("totalAmountSave").value;
            var TotalAmountValue = getTotalAmount;
            var Discount = document.getElementById("Discount").value;
            var netPrice = TotalAmountValue - (TotalAmountValue / 100 * Discount);
            NetPrice.value = netPrice;
        }


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

        $('select[id="PartNo"]').on('change', function() {
            var PartId = $(this).val();
            if (PartId) {
                $.ajax({
                    url: '/get_spare_part_item_ajax/' + PartId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        Description.value = data.item.part_name;
                    }
                });
            }
        });


        function setSaleInvoiceCart() {
            var PartNo = document.getElementById("PartNo").value;
            var UnitPrice = document.getElementById("UnitPrice").value;
            var Qty = document.getElementById("Qty").value;
            var Description = document.getElementById("Description").value;
            var LocalPrice = document.getElementById("LocalPrice").value;
            var ImportPrice = document.getElementById("ImportPrice").value;

            if (PartNo == null || PartNo == "") {
                alert("Please Select Parts No");
                return false;
            } else if (Qty == null || Qty == "" || isNaN(Qty)) {
                alert("Enter Numeric value only.");
                return false;
            } else if (UnitPrice == null || UnitPrice == "" || isNaN(UnitPrice)) {
                alert("Enter Numeric value only.");
                return false;
            }

            var url = '{{ url('add_temporary_part_item') }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    spare_part_item_id: PartNo,
                    Qty: Qty,
                    UnitPrice: UnitPrice,
                    Description: Description,
                    LocalPrice: LocalPrice,
                    ImportPrice: ImportPrice,
                },
                success: function(data) {
                    getTemporaryPartsItems();
                },
                error: function(data) {}
            });
        }


        function getTemporaryPartsItems() {
            var url = '{{ url('get_temporary_part_item') }}';
            $.ajax({
                url: url,
                method: "GET",
                success: function(data) {
                    console.log(data);
                    let sales_items = '';
                    var totalAmount = 0;
                    $.each(JSON.parse(data), function(key, value) {
                        totalAmount += value.qty * value.unit_price;
                        let k = key + 1;
                        sales_items += '<tr>';
                        sales_items += '<td>' + k + '</td>' //Sr.No	


                        // Parts No
                        sales_items += '<td>'
                        sales_items += value.spare_part_item_table.part_number;
                        sales_items += '</td>'

                        // Description
                        sales_items += '<td>'
                        sales_items += value.description;
                        sales_items += '</td>'

                        // Qty
                        sales_items += '<td style="text-align: right;">'
                        sales_items += value.qty;
                        sales_items += '</td>'

                        // Price	
                        sales_items += '<td style="text-align: right;">'
                        sales_items += value.unit_price;
                        sales_items += '</td>'

                        // Ks
                        sales_items += '<td style="text-align: right;">'
                        sales_items += value.qty * value.unit_price;
                        sales_items += '</td>'

                        // local Price
                        sales_items += '<td style="text-align: right;">'
                        sales_items += value.local_price;
                        sales_items += '</td>'

                        // Import Price
                        sales_items += '<td style="text-align: right;">'
                        sales_items += value.import_price;
                        sales_items += '</td>'

                        // Action
                        sales_items += '<td>'
                        sales_items += '<a href="javascript:void(0);" class="remove_item" data-id="' +
                            value.id + '"> Remove</a>'
                        sales_items += '</td>'
                        sales_items += '</tr>';
                    });
                    $('#TemporaryPartItemsList').html(sales_items);
                    totalAmountShow.value = (totalAmount).toLocaleString('en');
                    totalAmountSave.value = totalAmount;
                }
            });
        }

        getTemporaryPartsItems();

        // RemoveItem
        $(document).on("click", ".remove_item", function() {
            var id = $(this).data('id');
            $.ajax({
                url: `/temporary_part_items_remove/${id}`,
                method: "GET",
                success: function(data) {
                    getTemporaryPartsItems();
                }
            });
        });
    </script>
    {!! JsValidator::formRequest('App\Http\Requests\StorePartPurchase', '#create-form') !!}
@endsection
