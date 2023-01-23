@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12 col-lg-10">
            <div class="row">
                <div class="col-xxl">
                    <div class="card mb-4">
                        <h5 class="card-header">
                            Cash Book
                        </h5>
                        <form class="card-body" action="{{ route('cashbook.update', $cash_book->id) }}" method="POST"
                            autocomplete="off" id="edit-form">
                            @csrf
                            @method('PUT')
                            <h6 class="mb-b fw-normal">1. Cash Book Info</h6>
                            <div class="row mb-3">

                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="date"
                                            style="font-weight: bold">Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control @error('date') is-invalid @enderror"
                                                name="date" id="cashDateField" value="{{ $cash_book->cash_book_date }}" />
                                            @error('date')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="date"
                                            style="font-weight: bold">Month</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('month') is-invalid @enderror"
                                                name="month" id="Month" />
                                            @error('month')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="date"
                                            style="font-weight: bold">Year</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('year') is-invalid @enderror"
                                                name="year" id="Year" />
                                            @error('year')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="iv_no"
                                            style="font-weight: bold">IV-No</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('iv_one') is-invalid @enderror"
                                                name="iv_one" value="{{ $cash_book->iv_one }}" />
                                            @error('iv_one')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="iv_no2"
                                            style="font-weight: bold">IV-No 2</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('iv_two') is-invalid @enderror"
                                                name="iv_two" value="{{ $cash_book->iv_two }}" />
                                            @error('iv_two')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="account_code"
                                            style="font-weight: bold">A/C Code</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-lg" data-allow-clear="true"
                                                name="account_code">
                                                <option value="">--Please Select A/C Code --</option>
                                                @foreach ($chartof_accounts as $chartof_account)
                                                    <option value="{{ $chartof_account->id }}"
                                                        @if ($cash_book->account_code_id == $chartof_account->id) selected @endif>
                                                        {{ $chartof_account->coa_number }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('account_code')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="date"
                                            style="font-weight: bold">A/C Head</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="accountHead" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="date"
                                            style="font-weight: bold">A/C Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="accountName" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="row">
                                        <label class="col-sm-1 col-form-label text-sm-end" for="iv_no"
                                            style="font-weight: bold">Description</label>
                                        <div class="col-sm-11">
                                            <input type="text"
                                                class="form-control @error('description') is-invalid @enderror"
                                                name="description" value="{{ $cash_book->description }}" />
                                            @error('description')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4 mx-n4" />
                            <h6 class="mb-3 fw-normal">2. Bank and Cash Info</h6>
                            <div class="row mb-3">

                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="date"
                                            style="font-weight: bold">Cash</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-lg" data-allow-clear="true"
                                                name="cash_account">
                                                <option value="">--Please Select Cash --</option>
                                                @foreach ($chartof_accounts as $chartof_account)
                                                    <option value="{{ $chartof_account->id }}"
                                                        @if ($cash_book->cash_account_id == $chartof_account->id) selected @endif>
                                                        {{ $chartof_account->coa_number }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('cash_account')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="date"
                                            style="font-weight: bold">Bank</label>
                                        <div class="col-sm-9">
                                            <select class="select2 form-select form-select-lg" data-allow-clear="true"
                                                name="bank_account">
                                                <option value="">--Please Select Bank --</option>
                                                @foreach ($chartof_accounts as $chartof_account)
                                                    <option value="{{ $chartof_account->id }}"
                                                        @if ($cash_book->bank_account == $chartof_account->id) selected @endif>
                                                        {{ $chartof_account->coa_number }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('bank_account')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="date"
                                            style="font-weight: bold">Bank Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="bankName" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="date"
                                            style="font-weight: bold">Cash In</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control  @error('cash_in') is-invalid @enderror"
                                                name="cash_in" value="{{ $cash_book->cash_in }}" />
                                            @error('cash_in')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="date"
                                            style="font-weight: bold">Bank In</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('bank_in') is-invalid @enderror"
                                                name="bank_in" value="{{ $cash_book->bank_in }}" />
                                            @error('bank_in')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="date"
                                            style="font-weight: bold">Cash Out</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('cash_out') is-invalid @enderror"
                                                name="cash_out" value="{{ $cash_book->cash_out }}" />
                                            @error('cash_out')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label text-sm-end" for="date"
                                            style="font-weight: bold">Bank Out</label>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('bank_out') is-invalid @enderror"
                                                name="bank_out" value="{{ $cash_book->bank_out }}" />
                                            @error('bank_out')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4">
                                <div class="row justify-content-end">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary me-sm-2 me-1">Save</button>
                                        <a href="{{ route('cashbook.index') }}"
                                            class="btn btn-label-secondary">Cancel</a>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" class="form-control" id="account_type_id" name="account_type_id"
                                required />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateCashBook', '#edit-form') !!}

    <script type="text/javascript">
        var accountHead = document.getElementById("accountHead");
        var accountName = document.getElementById("accountName");
        var bankName = document.getElementById("bankName");
        var Month = document.getElementById("Month");
        var Year = document.getElementById("Year");
        var account_type_id = document.getElementById("account_type_id");

        // auto call 
        $(document).ready(function() {
            updateCashBookDate();
        });
        // auto call 

        // Account Code Head and Name Start
        $(document).ready(function() {
            $('select[name="account_code"]').on('change', function() {
                var mainAccountCode = $(this).val();
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
            var mainAccountCode = {{ $cash_book->account_code_id }};
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

        // Bank and bank name
        $(document).ready(function() {
            $('select[name="bank_account"]').on('change', function() {
                var mainAccountCode = $(this).val();
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
            var bank_account_id = {{ $cash_book->bank_account }};
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
            Month.value = {{ $cash_book->month }};
            Year.value = {{ $cash_book->year }};
        }
        // Date Month and Year End
    </script>
@endsection
