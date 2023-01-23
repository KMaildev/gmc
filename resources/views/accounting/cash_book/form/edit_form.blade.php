<link rel="stylesheet" href="{{ asset('assets/css/cash_book_form.css') }}" />
<form class="card-body" action="{{ route('cashbook.update', $edit_cash_book_data->id) }}" method="POST" autocomplete="off"
    id="edit-form">
    @csrf
    @method('PUT')
    <tr>

        <td></td>
        <td>
            <input type="date"
                class="form-control-custom input-text-center form-control-sm @error('date') is-invalid @enderror"
                name="date" id="cashDateField" value="{{ $edit_cash_book_data->cash_book_date }}" />
            @error('date')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('month') is-invalid @enderror"
                name="month" id="Month" readonly />
            @error('month')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('year') is-invalid @enderror"
                name="year" id="Year" readonly />
            @error('year')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('iv_one') is-invalid @enderror"
                name="iv_one" value="{{ $edit_cash_book_data->iv_one }}" />
            @error('iv_one')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <!-- TWO INV -->
        <td>
            <select class="select2 form-select form-select-sm" data-allow-clear="false" id="SaleInvoiceId">
                <option value="">--Please Select Invoice --</option>
                @foreach ($sales_invoices as $sales_invoice)
                    <option value="{{ $sales_invoice->id }}" @if ($edit_cash_book_data->sales_invoice_id == $sales_invoice->id) selected @endif>
                        {{ $sales_invoice->invoice_no ?? '' }}
                    </option>
                @endforeach
            </select>
            @error('account_code')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td hidden>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('iv_two') is-invalid @enderror"
                name="iv_two" value="{{ $edit_cash_book_data->iv_two }}" />
            @error('iv_two')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <select class="select2 form-select form-select-sm" data-allow-clear="false" id="AccountCodeSelect">
                <option value="">--Please Select A/C Code --</option>
                @foreach ($chartof_accounts as $chartof_account)
                    <option value="{{ $chartof_account->id }}" @if ($edit_cash_book_data->account_code_id == $chartof_account->id) selected @endif>
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
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('description') is-invalid @enderror"
                name="description" value="{{ $edit_cash_book_data->description }}" />
            @error('description')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>


        <td>
            <select class="select2 form-select form-select-sm" data-allow-clear="false" id="CashAccountSelect"
                name="cash_account">
                <option value="">--Please Select Cash --</option>
                @foreach ($chartof_accounts as $chartof_account)
                    @if ($chartof_account->id == 1)
                        <option value="{{ $chartof_account->id }}" @if ($edit_cash_book_data->cash_account_id == $chartof_account->id) selected @endif>
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
                name="cash_in" value="{{ $edit_cash_book_data->cash_in }}" />
            @error('cash_in')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('cash_out') is-invalid @enderror"
                name="cash_out" value="{{ $edit_cash_book_data->cash_out }}" />
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
                        <option value="{{ $chartof_account->id }}" @if ($edit_cash_book_data->bank_account == $chartof_account->id) selected @endif>
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
                name="bank_in" value="{{ $edit_cash_book_data->bank_in }}" />
            @error('bank_in')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td>
            <input type="text"
                class="form-control-custom input-text-center form-control-sm @error('bank_out') is-invalid @enderror"
                name="bank_out" value="{{ $edit_cash_book_data->bank_out }}" />
            @error('bank_out')
                <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </td>

        <td></td>
        <td></td>
        <td></td>

        <td>
            <input type="text" class="form-control-custom input-text-center form-control-sm" id="bankName" />
        </td>

        <td>
            <button type="submit" class="btn btn-primary btn-sm">Save</button>
        </td>

    </tr>

    <input type="hidden" class="form-control" id="account_type_id" name="account_type_id" />
    <input type="hidden" name="account_code" id="AccountCode">
    <input type="hidden" name="cash_account" id="CashAccount">
    <input type="hidden" name="bank_account" id="BankAccount">

    <input type="hidden" name="sales_invoice_id" id="SaleInvoiceIdValue"
        value="{{ $edit_cash_book_data->sales_invoice_id ?? 0 }}">
</form>

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateCashBook', '#edit-form') !!}

    <script type="text/javascript">
        var accountHead = document.getElementById("accountHead");
        var accountName = document.getElementById("accountName");
        var bankName = document.getElementById("bankName");
        var Month = document.getElementById("Month");
        var Year = document.getElementById("Year");

        var account_type_id = document.getElementById("account_type_id");
        var AccountCode = document.getElementById("AccountCode");
        var CashAccount = document.getElementById("CashAccount");
        var BankAccount = document.getElementById("BankAccount");

        // auto call 
        $(document).ready(function() {
            updateCashBookDate();
            CashAccountAutoCall();
        });
        // auto call 

        // Account Code Head and Name Start
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

            autoCallAjax();
        });

        function autoCallAjax() {
            var mainAccountCode = {{ $edit_cash_book_data->account_code_id }};
            AccountCode.value = mainAccountCode;
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
        // Account Code Head and Name Start


        // Cash Account 
        $(document).ready(function() {
            $('select[id="CashAccountSelect"]').on('change', function() {
                CashAccount.value = $(this).val();
            });
        });

        // Sale Inv ID
        $(document).ready(function() {
            $('select[id="SaleInvoiceId"]').on('change', function() {
                SaleInvoiceIdValue.value = $(this).val();
            });
        });

        function CashAccountAutoCall() {
            var cash_account_id = {{ $edit_cash_book_data->cash_account_id }};
            CashAccount.value = cash_account_id;
        }

        // Bank and bank name
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

            autoCallAjaxBankAccount();
        });

        function autoCallAjaxBankAccount() {
            var bank_account_id = {{ $edit_cash_book_data->bank_account }};
            BankAccount.value = bank_account_id;
            $.ajax({
                url: '/chartofaccountdependent/ajax/' + bank_account_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    bankName.value = data.description;
                }
            });
        }
        // Bank and bank name End


        // Date Month and Year Start
        function getCashBookDate(e) {
            var dateArr = e.srcElement.value.split('-');
            if (dateArr.length > 1) {
                Month.value = dateArr[1];
                Year.value = dateArr[0];
                console.log(dateArr[1] + '/' + dateArr[2] + '/' + dateArr[0]);
            }
        }
        document.getElementById("cashDateField").addEventListener("blur", getCashBookDate)

        function updateCashBookDate() {
            Month.value = {{ $edit_cash_book_data->month }};
            Year.value = {{ $edit_cash_book_data->year }};
        }
        // Date Month and Year End
    </script>
@endsection
