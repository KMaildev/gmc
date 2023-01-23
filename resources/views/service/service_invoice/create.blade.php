@extends('layouts.menus.service')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
            <form action="{{ route('service_invoice.store') }}" method="POST" autocomplete="off" id="create-form">
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
                                            Vin Number
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('vin_number') is-invalid @enderror"
                                                value="{{ old('vin_number') }}" name="vin_number">
                                            @error('vin_number')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label" for="basic-default-name">
                                            Reg: Number
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('reg_number') is-invalid @enderror"
                                                value="{{ old('reg_number') }}" name="reg_number">
                                            @error('reg_number')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                </dl>
                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">

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
                                        <label class="col-sm-3 col-form-label">
                                            Time In
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('time_in') is-invalid @enderror"
                                                value="{{ old('time_in') }}" name="time_in">
                                            @error('time_in')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Time Out
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control form-control-sm @error('time_out') is-invalid @enderror"
                                                value="{{ old('time_out') }}" name="time_out">
                                            @error('time_out')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            Types of Service
                                        </label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-sm" data-allow-clear="false"
                                                name="types_of_service_id">
                                                <option value="">--Select Types of Service --</option>
                                                @foreach ($types_of_service as $types_of_servic)
                                                    <option value="{{ $types_of_servic->id }}">
                                                        {{ $types_of_servic->types_of_service ?? '' }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('types_of_service_id')
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
                                        <th style="color: white; text-align: center;">Description</th>
                                        <th style="color: white; text-align: center;">Quantity</th>
                                        <th style="color: white; text-align: center;">Unit Price</th>
                                        <th style="color: white; text-align: center;">Total Price </th>
                                        <th style="color: white; text-align: center;">Remark </th>
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
                                                    {{ $spare_part_item->part_name ?? '' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('chessi_no')
                                            <div class="invalid-feedback"> {{ $message }} </div>
                                        @enderror

                                        <input type="hidden" class="form-control" id="Description">
                                    </td>



                                    {{-- Qty --}}
                                    <td>
                                        <input type="text" class="form-control" required id="Qty"
                                            oninput="SetCalculator()" style="text-align: right">
                                    </td>

                                    {{-- Unit Price --}}
                                    <td>
                                        <input type="text" class="form-control" id="UnitPrice"
                                            oninput="SetCalculator()" style="text-align: right">
                                    </td>

                                    {{-- Total Price  --}}
                                    <td>
                                        <input type="text" class="form-control" id="kyat"
                                            style="text-align: right" readonly>
                                    </td>

                                    {{-- Remark --}}
                                    <td>
                                        <input type="text" class="form-control" id="Remark"
                                            style="text-align: right">
                                    </td>

                                    <td>
                                        <input type="button" value="Add" class="btn btn-primary"
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
                                                name="sales_persons_id">
                                                <option value="">-- Select Person --</option>
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
                                </dl>
                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Sub Total
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm"
                                                style="text-align:right;" id="subTotal">

                                            <input type="hidden" value="0" name="sub_total" id="subTotalShow">
                                        </div>
                                    </div>


                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Tax
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="Tax" name="tax"
                                                    oninput="calcTax()" style="text-align:right;" value="0">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">
                                                        %
                                                    </span>
                                                </div>
                                                @error('tax')
                                                    <div class="invalid-feedback"> {{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <label class="col-sm-4 col-form-label">
                                            Total
                                        </label>
                                        <div class="col-sm-8">
                                            <div class="input-group input-group-sm">
                                                <input type="text"
                                                    class="form-control form-control-sm @error('total') is-invalid @enderror"
                                                    name="total" style="text-align:right;" value="0"
                                                    id="Total" />
                                            </div>
                                            @error('total')
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
        var subTotal = document.getElementById("subTotal");
        var subTotalShow = document.getElementById("subTotalShow");

        // Qty * Price
        function SetCalculator() {
            var UnitPrice = document.getElementById("UnitPrice").value;
            var Qty = document.getElementById("Qty").value;
            var TotalKyat = Qty * UnitPrice;
            kyat.value = TotalKyat;
        }

        function calcTax() {
            var subTotalShow = document.getElementById("subTotalShow").value;
            var Tax = document.getElementById("Tax").value;
            var total = subTotalShow * Tax / 100;
            Total.value = total;
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
            var Remark = document.getElementById("Remark").value;

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
                    Remark: Remark,
                },
                success: function(data) {
                    getTemporaryPartsItems();
                },
                error: function(data) {
                    console.log(data);
                }
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

                        // Price	
                        sales_items += '<td style="text-align: right;">'
                        sales_items += value.remark;
                        sales_items += '</td>'

                        // Action
                        sales_items += '<td>'
                        sales_items += '<a href="javascript:void(0);" class="remove_item" data-id="' +
                            value.id + '"> Remove</a>'
                        sales_items += '</td>'
                        sales_items += '</tr>';
                    });
                    $('#TemporaryPartItemsList').html(sales_items);
                    subTotal.value = (totalAmount).toLocaleString('en');
                    subTotalShow.value = totalAmount;
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreServiceInvoice', '#create-form') !!}
@endsection
