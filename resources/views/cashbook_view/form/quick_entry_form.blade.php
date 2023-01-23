<div class="modal fade" id="quickEntryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <form class="store_cashbook">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Cash Book
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="" style="margin-bottom: 2px; width: 100%;">
                        <thead>
                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Date
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Month
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Year
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                IV-No
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Sale Type
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                IV-No2
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Principle/Interest/Other
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Purchase IV
                            </th>
                        </thead>

                        <tbody>
                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm date_picker @error('date') is-invalid @enderror"
                                    name="date" id="cashDateFieldQuick" required value="" />
                                @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>

                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm @error('month') is-invalid @enderror"
                                    name="month" id="MonthQuick" readonly required />
                                @error('month')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm @error('year') is-invalid @enderror"
                                    name="year" id="YearQuick" readonly required />
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
                                <select class="form-select form-select-sm" id="SaleTypeQuick">
                                    <option value="">-- Sale Type --</option>
                                    <option value="dealer">Dealer Invoice</option>
                                    <option value="hp">HP Invoice</option>
                                    <option value="cash_sale">Cash Sale Invoice</option>
                                    <option value="purchase_orders">Purchase Invoice</option>
                                </select>
                            </td>

                            <!-- INV TWO -->
                            <td>
                                <select class="form-select form-select-sm" data-allow-clear="false"
                                    id="SaleInvoiceIdQuick">
                                    <option value="">--Select Invoice --</option>
                                </select>
                                @error('account_code')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            <td hidden>
                                <input type="text" class="form-control-custom input-text-center form-control-sm"
                                    name="iv_two" value="" />
                                @error('iv_two')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>

                            {{-- Principle/Interest --}}
                            <td>
                                <span id="PrincipleInterestQuick">
                                    <select class=" form-select form-select-sm" data-allow-clear="false"
                                        id="PrincipleAndInterestQuick">
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
                                <select class="form-select form-select-sm" data-allow-clear="false"
                                    name="purchase_order_id">
                                    <option value="">-- Select Pruchase IV --</option>
                                    @foreach ($purchase_orders as $purchase_order)
                                        <option value="{{ $purchase_order->id }}">
                                            {{ $purchase_order->purchase_no ?? '' }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tbody>
                    </table>

                    <table class="" style="margin-bottom: 2px; width: 100%;">
                        <thead>
                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                A/C Code
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                A/C Head
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                A/C Name
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Description
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Cash AC
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Cash-In
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Cash-Out
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Balance
                            </th>
                        </thead>

                        <tbody>
                            <td>
                                <select class="form-select form-select-sm" data-allow-clear="false"
                                    id="AccountCodeSelectQuick">
                                    <option value="">--Select A/C Code --</option>
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
                                <input type="text" class="form-control-custom input-text-center form-control-sm"
                                    id="accountHeadQuick" readonly />
                            </td>

                            <td>
                                <input type="text" class="form-control-custom input-text-center form-control-sm"
                                    id="accountNameQuick" readonly />
                            </td>

                            <td>
                                <input type="text"
                                    class="form-control-custom input-text-center form-control-sm @error('description') is-invalid @enderror"
                                    name="description" />
                                @error('description')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </td>


                            <td>
                                <select class="form-select form-select-sm" data-allow-clear="false"
                                    id="CashAccountSelectQuick">
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
                        </tbody>
                    </table>

                    <table style="margin-bottom: 2px; width: 100%;">
                        <thead>
                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Bank AC
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Bank-In
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Bank-Out
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Bank-Balance
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Deposit(Cash+Bank)
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Withdraw(Cash+Bank)
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center;">
                                Bank Name
                            </th>
                        </thead>

                        <tbody>
                            <td>
                                <select class="form-select form-select-sm" data-allow-clear="false"
                                    id="BankAccountSelectQuick">
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
                                <input type="text" class="form-control-custom input-text-center"
                                    id="bankNameQuick" />
                            </td>

                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

                <input type="hidden" class="form-control" id="account_type_idQuick" name="account_type_id" />
                <input type="hidden" name="account_code" id="AccountCodeQuick">
                <input type="hidden" name="cash_account" id="CashAccountQuick">
                <input type="hidden" name="bank_account" id="BankAccountQuick">
                <input type="hidden" name="sales_invoice_id" id="SaleInvoiceIdValueQuick" value="0">
                <input type="hidden" name="sale_type" id="SaleTypeValueQuick">
                <input type="hidden" name="principle_interest" id="PrincipleAndInterestValueQuick">
            </form>
        </div>
    </div>
</div>

<script script type="text/javascript">
    var accountHeadQuick = document.getElementById("accountHeadQuick");
    var accountNameQuick = document.getElementById("accountNameQuick");
    var bankNameQuick = document.getElementById("bankNameQuick");
    var MonthQuick = document.getElementById("MonthQuick");
    var YearQuick = document.getElementById("YearQuick");
    var account_type_idQuick = document.getElementById("account_type_idQuick");
    var AccountCodeQuick = document.getElementById("AccountCodeQuick");
    var CashAccountQuick = document.getElementById("CashAccountQuick");
    var BankAccountQuick = document.getElementById("BankAccountQuick");

    $(document).ready(function() {
        $('select[id="AccountCodeSelectQuick"]').on('change', function() {
            var mainAccountCode = $(this).val();
            AccountCode.value = mainAccountCode;
            if (mainAccountCode) {
                $.ajax({
                    url: '/chartofaccountdependent/ajax/' + mainAccountCode,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        accountNameQuick.value = data.description;
                        getAccountTypeQuick(data.account_type_id);
                    }
                });
            }

        });
    });

    function getAccountTypeQuick(id) {
        var accountTypeId = id;
        if (accountTypeId) {
            $.ajax({
                url: '/accounttypedependent/ajax/' + accountTypeId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    accountHeadQuick.value = data.description;
                    account_type_idQuick.value = data.id;
                }
            });
        }
    }


    $(document).ready(function() {
        $('select[id="CashAccountSelect"]').on('change', function() {
            CashAccountQuick.value = $(this).val();
        });
    });


    $(document).ready(function() {
        $('select[id="SaleInvoiceId"]').on('change', function() {
            SaleInvoiceIdValueQuick.value = $(this).val();
        });
    });


    $(document).ready(function() {
        $('select[id="BankAccountSelectQuick"]').on('change', function() {
            var mainAccountCode = $(this).val();
            BankAccountQuick.value = mainAccountCode;
            if (mainAccountCode) {
                $.ajax({
                    url: '/chartofaccountdependent/ajax/' + mainAccountCode,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        bankNameQuick.value = data.description;
                    }
                });
            }

        });
    });


    $(document).ready(function() {
        function getCashBookDateQuick(e) {
            var dateArr = e.srcElement.value.split('-');
            if (dateArr.length > 1) {
                MonthQuick.value = dateArr[1];
                YearQuick.value = dateArr[0];
            }
        }
        document.getElementById("cashDateFieldQuick").addEventListener("blur", getCashBookDateQuick)
    });


    $(document).ready(function() {
        $('select[id="SaleTypeQuick"]').on('change', function() {
            var SaleTypeValue = $(this).val();
            document.getElementById("SaleTypeValueQuick").value = SaleTypeValue;

            if (SaleTypeValue === 'hp') {
                $("#PrincipleInterestQuick").show();
            } else {
                $("#PrincipleInterestQuick").hide();
            }

            $.ajax({
                url: '/get_sales_invoices_ajax/' + SaleTypeValue,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    if (data) {
                        $('#SaleInvoiceIdQuick').empty();
                        $('#SaleInvoiceIdQuick').append($('<option>', {
                            text: "--Please Select Invoice--"
                        }));
                        $.each(data, function(key, value) {
                            $('#SaleInvoiceIdQuick').append($('<option>', {
                                value: value.id,
                                text: value.invoice_no
                            }));
                        });
                    } else {
                        $('#SaleInvoiceIdQuick').empty();
                    }
                }
            });
        });
        $("#PrincipleInterestQuick").hide();
    });

    $(document).ready(function() {
        $('select[id="PrincipleAndInterestQuick"]').on('change', function() {
            document.getElementById("PrincipleAndInterestValueQuick").value = $(this).val();
        });
    });
</script>


<script>
    $('.store_cashbook').submit(function(e) {
        e.preventDefault();
        let form = $(this);
        const cash_book_date = form.find("input[name=date]").val();
        const month = form.find("input[name=month]").val();
        const year = form.find("input[name=year]").val();
        const iv_one = form.find("input[name=iv_one]").val();
        const iv_two = form.find("input[name=iv_two]").val();
        const account_code_id = form.find("input[name=account_code]").val();
        const account_type_id = form.find("input[name=account_type_id]").val();
        const description = form.find("input[name=description]").val();
        const cash_account_id = form.find("input[name=cash_account]").val();
        const bank_account = form.find("input[name=bank_account]").val();
        const cash_in = form.find("input[name=cash_in]").val();
        const cash_out = form.find("input[name=cash_out]").val();
        const bank_in = form.find("input[name=bank_in]").val();
        const bank_out = form.find("input[name=bank_out]").val();
        const sales_invoice_id = form.find("input[name=sales_invoice_id]").val();
        const sale_type = form.find("input[name=sale_type]").val();
        const principle_interest = form.find("input[name=principle_interest]").val();
        const purchase_order_id = form.find("input[name=purchase_order_id]").val();
        console.log(form)
        console.log(month)
        console.log(year)

        if (cash_book_date == null || cash_book_date == "" || month == null || month == "" || year == null ||
            year == "") {
            error_alert('Something went wrong please try again.')
            return false;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = '{{ url('cash_book_ajax_store') }}';
        $.ajax({
            method: 'POST',
            url: url,
            data: {
                "_token": "{{ csrf_token() }}",
                date: cash_book_date,
                month: month,
                year: year,
                iv_one: iv_one,
                iv_two: iv_two,
                account_code_id: account_code_id,
                account_type_id: account_type_id,
                description: description,
                cash_account_id: cash_account_id,
                bank_account: bank_account,
                cash_in: cash_in,
                cash_out: cash_out,
                bank_in: bank_in,
                bank_out: bank_out,
                sales_invoice_id: sales_invoice_id,
                sale_type: sale_type,
                rinciple_interest: principle_interest,
                purchase_order_id: purchase_order_id,
            },
            success: function(data) {
                success_alert('Your processing has been completed.')
            },
            error: function(data) {
                console.log(data)
            }
        });
    })
</script>
