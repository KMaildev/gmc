@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card mb-4">
                <h5 class="card-header">Sub Account</h5>
                <div class="card-body">

                    <form action="{{ route('subaccount.update', $edit->id) }}" method="POST" autocomplete="off"
                        id="edit-form" role="form">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label" for="MainAccount">Main Account Code</label>
                            <div class="col-md-9">
                                <select id="MainAccount" class="select2 form-select form-select-lg" data-allow-clear="true"
                                    name="main_account_code">
                                    <option value="">--Please Select Main Account Code--</option>
                                    @foreach ($chartof_accounts as $chartof_account)
                                        <option value="{{ $chartof_account->id }}"
                                            @if ($chartof_account->id == $edit->chartof_account_id) selected @endif>
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
                                    <input type="text"
                                        class="form-control @error('sub_account_number') is-invalid @enderror"
                                        value="{{ $edit->coa_number }}" name="sub_account_number" />
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
                                    name="description" value="{{ $edit->description }}" />
                                @error('description')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="html5-text-input" class="col-md-3 col-form-label">Opening Balance</label>
                            <div class="col-md-9">
                                <input class="form-control @error('opening_balance') is-invalid @enderror" type="text"
                                    name="opening_balance" value="{{ $edit->account_opening_balance }}" />
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
                                    name="opening_balance_date" value="{{ $edit->opening_balance_date }}" />
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

                        <input id="accountTypeId" type="hidden" readonly name="account_type" />
                        <input id="accountClassificationId" type="hidden" readonly name="account_classification_id" />

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateSubAccount', '#edit-form') !!}

    <script type="text/javascript">
        var mainAccountName = document.getElementById("mainAccountName");
        var accountTypeId = document.getElementById("accountTypeId");
        var accountClassificationId = document.getElementById("accountClassificationId");

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
                        }
                    });
                }
            });

            autoCallAjax();
        });


        function autoCallAjax() {
            var mainAccountCode = {{ $edit->id }};
            $.ajax({
                url: '/chartofaccountdependent/ajax/' + mainAccountCode,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    mainAccountName.value = data.description;
                    accountTypeId.value = data.account_type_id;
                    accountClassificationId.value = data.account_classification_id;
                }
            });
        }
    </script>
@endsection
