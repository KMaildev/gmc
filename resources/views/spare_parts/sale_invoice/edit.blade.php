@extends('layouts.menus.spare_part')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
            <form action="{{ route('spare_part_sale_invoice.update', $sales_invoice_edit->id) }}" method="POST"
                autocomplete="off" id="create-form">
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
                                                id="CustomerID" name="customer_id">
                                                <option value="">--Please Select Customer --</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}"
                                                        @if ($customer->id == $sales_invoice_edit->customer_id) selected @endif>
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
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            E-Mail Address
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" id="Email">
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
                                                value="{{ $sales_invoice_edit->invoice_no }}" name="invoice_no">
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
                                                value="{{ $sales_invoice_edit->invoice_date }}" name="invoice_date">
                                            @error('invoice_date')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Sales Type</label>
                                        <div class="col-sm-9">

                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="sales_type">
                                                <option value="">--Select Sales Type --</option>

                                                <option value="Warranty" @if ('Warranty' == $sales_invoice_edit->sales_type) selected @endif>
                                                    Warranty
                                                </option>

                                                <option value="FOC" @if ('FOC' == $sales_invoice_edit->sales_type) selected @endif>
                                                    FOC
                                                </option>

                                                <option value="Issue" @if ('Issue' == $sales_invoice_edit->sales_type) selected @endif>
                                                    Issue
                                                </option>

                                                <option value="Damage" @if ('Damage' == $sales_invoice_edit->sales_type) selected @endif>
                                                    Damage
                                                </option>

                                                <option value="Credit" @if ('Credit' == $sales_invoice_edit->sales_type) selected @endif>
                                                    Credit
                                                </option>

                                            </select>
                                            @error('sales_type')
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
                                                value="{{ $sales_invoice_edit->showroom_name }}" name="showroom_name">
                                            @error('showroom_name')
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
                                                value="{{ $sales_invoice_edit->invoice_remark }}" name="invoice_remark">
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
                                        <th style="color: white; text-align: center;">Parts No</th>
                                        <th style="color: white; text-align: center;">Description</th>
                                        <th style="color: white; text-align: center;">Unit Price</th>
                                        <th style="color: white; text-align: center;">Qty</th>
                                        <th style="color: white; text-align: center;">Ks</th>
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

                                    {{-- Unit Price --}}
                                    <td>
                                        <input type="text" class="form-control" id="UnitPrice"
                                            oninput="SetCalculator()" style="text-align: right">
                                    </td>

                                    {{-- Qty --}}
                                    <td>
                                        <input type="text" class="form-control" required id="Qty"
                                            oninput="SetCalculator()" style="text-align: right">
                                    </td>

                                    {{-- Ks --}}
                                    <td>
                                        <input type="text" class="form-control" id="kyat"
                                            style="text-align: right" readonly>
                                    </td>

                                    <td>
                                        <input type="button" value="Add" class="btn btn-sm btn-primary"
                                            onclick="setSaleInvoiceCart()">
                                    </td>
                                </tr>

                                <tbody id="TemporaryPartItemsList">
                                </tbody>

                                @php
                                    $total_unit_price = [];
                                    $total_qty = [];
                                    $total_ks = [];
                                @endphp
                                @foreach ($sales_invoice_edit->part_sale_items_table as $item_key => $part_sale_item)
                                    <tr style="border: 1px solid black;">
                                        <td>
                                            {{ $item_key + 1 }}
                                        </td>

                                        <td>
                                            {{ $part_sale_item->spare_part_items_table->part_number ?? '' }}
                                        </td>

                                        <td>
                                            {{ $part_sale_item->description ?? '' }}
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $unit_price = $part_sale_item->unit_price ?? 0;
                                                echo number_format($unit_price, 2);
                                                $total_unit_price[] = $unit_price;
                                            @endphp
                                        </td>

                                        <td style="text-align: right;">
                                            @php
                                                $qty = $part_sale_item->qty ?? 0;
                                                echo number_format($qty);
                                                $total_qty[] = $qty;
                                            @endphp
                                        </td>


                                        <td style="text-align: right;">
                                            @php
                                                $ks = $unit_price * $qty;
                                                echo number_format($ks, 2);
                                                $total_ks[] = $ks;
                                            @endphp
                                        </td>


                                        <td style="text-align: center">
                                            <a href="{{ route('remove_part_sale_items', $part_sale_item->id) }}">
                                                Remove
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>


                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">Person</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="sales_persons_id">
                                                <option value="">-- Select Person --</option>
                                                @foreach ($sales_persons as $sales_person)
                                                    <option value="{{ $sales_person->id }}"
                                                        @if ($sales_person->id == $sales_invoice_edit->sales_persons_id) selected @endif>
                                                        {{ $sales_person->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('sales_persons_id')
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
                                                $total_amount = array_sum($total_ks);
                                            @endphp

                                            <input type="text" class="form-control form-control-sm"
                                                style="text-align:right;" value="{{ number_format($total_amount, 2) }}">

                                            <input type="hidden" value="{{ $total_amount }}" name="total_amount"
                                                id="totalAmountSave">
                                        </div>
                                    </div>


                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Tax
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control form-control-sm @error('tax') is-invalid @enderror"
                                                name="tax" id="BalanceToPay" style="text-align:right;"
                                                value="{{ $sales_invoice_edit->tax ?? 0 }}" />
                                            @error('tax')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
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
                                                    name="discount" style="text-align:right;"
                                                    value="{{ $sales_invoice_edit->discount ?? 0 }}" id="Discount"
                                                    oninput="SetCalculateDownPayment()" />

                                                <span class="input-group-text" id="basic-addon2">%</span>
                                            </div>


                                            @error('discount')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Net Price
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('net_price') is-invalid @enderror"
                                                    name="net_price" style="text-align:right;" value="0"
                                                    id="NetPrice" />
                                            </div>
                                            @error('net_price')
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
            var UnitPrice = document.getElementById("UnitPrice").value;
            var Qty = document.getElementById("Qty").value;
            var TotalKyat = Qty * UnitPrice;
            kyat.value = TotalKyat;
        }
        SetCalculator();


        function SetCalculateDownPayment() {
            var getTotalAmount = document.getElementById("totalAmountSave").value;
            var TotalAmountValue = getTotalAmount;
            var Discount = document.getElementById("Discount").value;
            var netPrice = TotalAmountValue - (TotalAmountValue / 100 * Discount);
            NetPrice.value = netPrice;
        }
        SetCalculateDownPayment();


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

        function getCustomerAjaxAuto() {
            var customerID = '{{ $sales_invoice_edit->customer_id }}'
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
        getCustomerAjaxAuto();

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

                        // Action
                        sales_items += '<td style="text-align: center;">'
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
    {!! JsValidator::formRequest('App\Http\Requests\StorePartSaleInvoice', '#create-form') !!}
@endsection
