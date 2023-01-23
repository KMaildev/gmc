@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card mb-4">
                <h5 class="card-header">Sub Account</h5>
                <div class="card-body">

                    <form action="{{ route('subaccount.store') }}" method="POST" autocomplete="off" id="create-form"
                        role="form">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label" for="MainAccount">Main Account Code</label>
                            <div class="col-md-9">
                                <select id="MainAccount" class="select2 form-select form-select-lg" data-allow-clear="true"
                                    name="main_account_code">
                                    <option value="">--Please Select Main Account Code--</option>
                                    @foreach ($chartof_accounts as $chartof_account)
                                        <option value="{{ $chartof_account->id }}">
                                            {{ $chartof_account->coa_number }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('customer')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Main Account Name</label>
                            <div class="col-md-9">
                                <input id="mainAccountName"
                                    class="form-control @error('main_account_name') is-invalid @enderror" type="text"
                                    readonly />
                                @error('main_account_name')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Sub Account Number</label>
                            <div class="col-md-9">
                                <div class="input-group">

                                    <span class="input-group-text ac_number" id="ac_number"></span>
                                    <input type="hidden" id="ac_number_hidden" name="sub_account_number">

                                    <input type="text"
                                        class="form-control @error('sub_account_number') is-invalid @enderror"
                                        oninput="getValue();" id="sub_account_number" />
                                    @error('sub_account_number')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Description</label>
                            <div class="col-md-9">
                                <input class="form-control @error('description') is-invalid @enderror" type="text"
                                    name="description" value="{{ old('description') }}" />
                                @error('description')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Opening Balance</label>
                            <div class="col-md-9">
                                <input class="form-control @error('opening_balance') is-invalid @enderror" type="text"
                                    name="opening_balance"
                                    value="{{ old('opening_balance') ? old('opening_balance') : 0 }}" />
                                @error('opening_balance')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">
                                Opening Balance as At Date
                            </label>
                            <div class="col-md-9">
                                <input class="form-control @error('opening_balance_date') is-invalid @enderror" type="date"
                                    name="opening_balance_date" />
                                @error('opening_balance_date')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="html5-search-input" class="col-md-3 col-form-label"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-danger">Save</button>
                                <a href="{{ route('subaccount.index') }}" class="btn btn-success">Cancel</a>
                            </div>
                        </div>

                        <input id="accountTypeId" type="text" readonly name="account_type" hidden />
                        <input id="accountClassificationId" type="text" readonly name="account_classification_id" hidden />

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreSubAccount', '#create-form') !!}

    <script type="text/javascript">
        var mainAccountName = document.getElementById("mainAccountName");
        var accountTypeId = document.getElementById("accountTypeId");
        var ac_number_hidden = document.getElementById("ac_number_hidden");

        $(document).ready(function() {
            $('select[name="main_account_code"]').on('change', function() {
                var mainAccountCode = $(this).val();
                if (mainAccountCode) {
                    $.ajax({
                        url: '/chartofaccountdependent/ajax/' + mainAccountCode,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            mainAccountName.value = data.description;
                            accountTypeId.value = data.account_type_id;
                            accountClassificationId.value = data.account_classification_id;

                            let text = data.coa_number
                            let acnumber = text.charAt(0);
                            document.getElementById("ac_number").innerHTML = acnumber + '-';
                        }
                    });
                }

            });
        });

        function getValue() {
            var ac_number = document.querySelector(".ac_number").innerHTML;
            var sub_account_number = document.getElementById("sub_account_number").value;
            var classify_acnumber = ac_number + sub_account_number;
            ac_number_hidden.value = classify_acnumber;
        }
    </script>
@endsection
