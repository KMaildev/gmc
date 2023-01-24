<link rel="stylesheet" href="{{ asset('assets/css/cash_book_form.css') }}" />
<form action="{{ route('cashbook.store') }}" method="POST" autocomplete="off" id="create-form">
    @csrf
    <tr>
        <td></td>
        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm date_picker @error('date') is-invalid @enderror"
                name="date" id="cashDateField" required />
            @error('date')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('month') is-invalid @enderror"
                name="month" id="Month" readonly required />
            @error('month')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('year') is-invalid @enderror"
                name="year" id="Year" readonly required />
            @error('year')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('iv_one') is-invalid @enderror"
                name="iv_one" />
            @error('iv_one')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Sale Type --}}
        <td>
            <select class="select3 form-select form-select-sm" id="SaleType">
                <option value="">-- Sale Type --</option>
                <option value="dealer">Dealer Invoice</option>
                <option value="hp">HP Invoice</option>
                <option value="cash_sale">Cash Sale Invoice</option>
                <option value="purchase_orders">Purchase Invoice</option>
            </select>
        </td>

        <!-- INV TWO -->
        <td>
            <select class="select2 form-select form-select-sm" data-allow-clear="false" id="SaleInvoiceId">
                <option value="">--Please Select Invoice --</option>
            </select>
            @error('account_code')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td hidden>
            <input type="text" class="form-control-custom input-text-center form-control-sm" name="iv_two"
                value="" />
            @error('iv_two')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        {{-- Principle/Interest --}}
        <td>
            <span id="PrincipleInterest">
                <select class="select3 form-select form-select-sm" data-allow-clear="false" id="PrincipleAndInterest">
                    <option value="">-- Select Type --</option>
                    <option value="down_payment">Down Payment</option>
                    <option value="Principle">Principle</option>
                    <option value="Interest">Interest</option>
                    <option value="service_fee">Service Fee</option>
                </select>
            </span>
        </td>

        {{-- Purchase Invoice --}}
        <td>
            <select class="select3 form-select form-select-sm" data-allow-clear="false" name="purchase_order_id">
                <option value="">-- Select Pruchase IV --</option>
                @foreach ($purchase_orders as $purchase_order)
                    <option value="{{ $purchase_order->id }}">
                        {{ $purchase_order->purchase_no ?? '' }}
                    </option>
                @endforeach
            </select>
        </td>

        {{-- SP Purchase --}}
        <td>
            <select class="select3 form-select form-select-sm" name="part_purchase_id">
                <option value="">
                    --SP Purchase--
                </option>
                @foreach ($part_purchases as $part_purchase)
                    <option value="{{ $part_purchase->id }}">
                        {{ $part_purchase->invoice_no ?? '' }}
                    </option>
                @endforeach
            </select>
        </td>

        <td>
            <select class="select3 form-select form-select-sm" name="part_sale_invoice_id">
                <option value="">
                    --SP Sales Invoice--
                </option>
                @foreach ($part_sale_invoices as $part_sale_invoice)
                    <option value="{{ $part_sale_invoice->id }}">
                        {{ $part_sale_invoice->invoice_no ?? '' }}
                    </option>
                @endforeach
            </select>
        </td>

        <td>
            <select class="select3 form-select form-select-sm" name="service_invoice_id">
                <option value="">
                    --Service Invoice--
                </option>
                @foreach ($service_invoices as $service_invoice)
                    <option value="{{ $service_invoice->id }}">
                        {{ $service_invoice->invoice_no ?? '' }}
                    </option>
                @endforeach
            </select>
        </td>

        <td>
            <select class="select2 form-select form-select-sm" data-allow-clear="false" id="AccountCodeSelect">
                <option value="">--Please Select A/C Code --</option>
                @foreach ($chartof_accounts as $chartof_account)
                    <option value="{{ $chartof_account->id }}">
                        {{ $chartof_account->coa_number }}
                    </option>
                @endforeach
            </select>
            @error('account_code')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm" id="accountHead"
                readonly />
        </td>

        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm" id="accountName"
                readonly />
        </td>

        <td>
            <center>
                <input type="text"
                    class="form-control-custom input-text-center form-control-sm @error('description') is-invalid @enderror"
                    name="description" style="padding-left: 100px; padding-right: 100px" />
                @error('description')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </center>
        </td>


        <td>
            <select class="select2 form-select form-select-sm" data-allow-clear="false" id="CashAccountSelect">
                <option value="">--Please Select Cash --</option>
                @foreach ($chartof_accounts as $chartof_account)
                    @if ($chartof_account->id == 1)
                        <option value="{{ $chartof_account->id }}">
                            {{ $chartof_account->coa_number }}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('cash_account')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm  @error('cash_in') is-invalid @enderror"
                name="cash_in" value="0" />
            @error('cash_in')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('cash_out') is-invalid @enderror"
                name="cash_out" value="0" />
            @error('cash_out')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td></td>

        <td>
            <select class="select2 form-select form-select-sm" data-allow-clear="false" id="BankAccountSelect">
                <option value="">--Please Select Bank --</option>
                @foreach ($chartof_accounts as $chartof_account)
                    @if ($chartof_account->chartof_account_id == 2)
                        <option value="{{ $chartof_account->id }}">
                            {{ $chartof_account->coa_number }}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('bank_account')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('bank_in') is-invalid @enderror"
                name="bank_in" value="0" />
            @error('bank_in')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('bank_out') is-invalid @enderror"
                name="bank_out" value="0" />
            @error('bank_out')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td></td>
        <td></td>
        <td></td>

        <td>
            <input type="text" class="form-control-custom input-text-center" id="bankName" />
        </td>

        <td>
            <button type="submit" class="btn btn-info btn-sm" style="width: 100%;">
                Save
            </button>
        </td>
    </tr>

    <input type="hidden" class="form-control" id="account_type_id" name="account_type_id" />
    <input type="hidden" name="account_code" id="AccountCode">
    <input type="hidden" name="cash_account" id="CashAccount">
    <input type="hidden" name="bank_account" id="BankAccount">
    <input type="hidden" name="sales_invoice_id" id="SaleInvoiceIdValue" value="0">
    <input type="hidden" name="sale_type" id="SaleTypeValue">
    <input type="hidden" name="principle_interest" id="PrincipleAndInterestValue">
</form>

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreCashBook', '#create-form') !!}
    <script script type="text/javascript">
        var accountHead = document.getElementById("accountHead");
        var accountName = document.getElementById("accountName");
        var bankName = document.getElementById("bankName");
        var Month = document.getElementById("Month");
        var Year = document.getElementById("Year");
        var account_type_id = document.getElementById("account_type_id");
        var AccountCode = document.getElementById("AccountCode");
        var CashAccount = document.getElementById("CashAccount");
        var BankAccount = document.getElementById("BankAccount");

        $(document).ready(function() {
            $('select[id="AccountCodeSelect"]').on('change', function() {
                var mainAccountCode = $(this).val();
                AccountCode.value = mainAccountCode;
                if (mainAccountCode) {
                    $.ajax({
                        url: '/chartofaccountdependent/ajax/' + mainAccountCode,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            accountName.value = data.description;
                            getAccountType(data.account_type_id);
                        }
                    });
                }

            });
        });

        function getAccountType(id) {
            var accountTypeId = id;
            if (accountTypeId) {
                $.ajax({
                    url: '/accounttypedependent/ajax/' + accountTypeId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        accountHead.value = data.description;
                        account_type_id.value = data.id;
                    }
                });
            }
        }


        $(document).ready(function() {
            $('select[id="CashAccountSelect"]').on('change', function() {
                CashAccount.value = $(this).val();
            });
        });


        $(document).ready(function() {
            $('select[id="SaleInvoiceId"]').on('change', function() {
                SaleInvoiceIdValue.value = $(this).val();
            });
        });


        $(document).ready(function() {
            $('select[id="BankAccountSelect"]').on('change', function() {
                var mainAccountCode = $(this).val();
                BankAccount.value = mainAccountCode;
                if (mainAccountCode) {
                    $.ajax({
                        url: '/chartofaccountdependent/ajax/' + mainAccountCode,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            bankName.value = data.description;
                        }
                    });
                }

            });
        });


        $(document).ready(function() {
            function getCashBookDate(e) {
                var dateArr = e.srcElement.value.split('-');
                if (dateArr.length > 1) {
                    Month.value = dateArr[1];
                    Year.value = dateArr[0];
                    console.log(dateArr[1] + '/' + dateArr[2] + '/' + dateArr[0]);
                }
            }
            document.getElementById("cashDateField").addEventListener("blur", getCashBookDate)
        });


        $(document).ready(function() {
            $('select[id="SaleType"]').on('change', function() {
                var SaleTypeValue = $(this).val();
                document.getElementById("SaleTypeValue").value = SaleTypeValue;

                if (SaleTypeValue === 'hp') {
                    $("#PrincipleInterest").show();
                } else {
                    $("#PrincipleInterest").hide();
                }

                $.ajax({
                    url: '/get_sales_invoices_ajax/' + SaleTypeValue,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#SaleInvoiceId').empty();
                            $('#SaleInvoiceId').append($('<option>', {
                                text: "--Please Select Invoice--"
                            }));
                            $.each(data, function(key, value) {
                                $('#SaleInvoiceId').append($('<option>', {
                                    value: value.id,
                                    text: value.invoice_no
                                }));
                            });
                        } else {
                            $('#SaleInvoiceId').empty();
                        }
                    }
                });
            });
            $("#PrincipleInterest").hide();
        });


        $(document).ready(function() {
            $('select[id="PrincipleAndInterest"]').on('change', function() {
                document.getElementById("PrincipleAndInterestValue").value = $(this).val();
            });
        });
    </script>
@endsection
