@extends('layouts.menus.accounting')
@section('content')
    <div class="row invoice-add justify-content-center">
        <div class="col-lg-9 col-12 mb-lg-0 mb-4">
            <form id="journalForm" action="{{ route('journal_entry.store') }}" method="POST" autocomplete="off"
                id="create-form">
                @csrf
                <div class="card invoice-preview-card">
                    <div class="card-body">

                        <div class="row p-sm-3 p-0">
                            <div class="col-md-6">
                                <dl class="row mb-2">

                                    <div class="row mb-1">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">
                                            Title
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                class="form-control form-control-sm @error('title') is-invalid @enderror"
                                                value="{{ old('title') }}" name="title"
                                                placeholder="Show Room Rental (ASE) for November'2022">
                                            @error('title')
                                                <div class="invalid-feedback"> {{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                </dl>
                            </div>

                            <div class="col-md-6">
                                <dl class="row mb-2">

                                    <div class="row mb-1">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">
                                            Date
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                class="date_picker form-control form-control-sm @error('entry_date') is-invalid @enderror"
                                                value="{{ old('entry_date') }}" name="entry_date">
                                            @error('entry_date')
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
                                        <th style="color: white; text-align: center; width: 1%;">No</th>
                                        <th style="color: white; text-align: center;">A/C Code</th>
                                        <th style="color: white; text-align: center;">A/C Head </th>
                                        <th style="color: white; text-align: center;">A/C Name </th>
                                        <th style="color: white; text-align: center;">DR</th>
                                        <th style="color: white; text-align: center;">CR</th>
                                        <th style="color: white; text-align: center;">Remark</th>
                                        <th style="color: white; text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tr>

                                    <td></td>

                                    {{-- AC Code --}}
                                    <td>
                                        <select class="form-select form-select-sm select2" data-allow-clear="false"
                                            id="AccountCodeSelect">
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

                                    {{-- AC Head --}}
                                    <td>
                                        <input type="text" class="form-control" id="accountHead">
                                        <input type="hidden" class="form-control" id="ac_code">
                                        <input type="hidden" class="form-control" id="chartof_account_id">
                                        <input type="hidden" class="form-control" id="account_type_id">
                                    </td>

                                    {{-- AC Name --}}
                                    <td>
                                        <input type="text" class="form-control" id="accountName">
                                    </td>

                                    {{-- DR --}}
                                    <td>
                                        <input type="text" class="form-control" id="Dr" value="0"
                                            style="text-align: right;" />
                                    </td>

                                    {{-- CR --}}
                                    <td>
                                        <input type="text" class="form-control" id="Cr" value="0"
                                            style="text-align: right;" />
                                    </td>

                                    {{-- Remark --}}
                                    <td>
                                        <input type="text" class="form-control" id="Remark">
                                    </td>

                                    <td>
                                        <input type="button" value="Add" class="btn btn-sm btn-primary"
                                            onclick="setCart()">
                                    </td>
                                </tr>

                                <tbody id="TempLists">
                                </tbody>
                                <tr>
                                    <td colspan="4">
                                        Total
                                    </td>
                                    <td>
                                        <input type="text" id="drTotal" class="form-control"
                                            style="text-align: right;">
                                    </td>
                                    <td>
                                        <input type="text" id="crTotal" class="form-control"
                                            style="text-align: right;">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="row mb-1">
                                    <div class="col-sm-12">
                                        <button onclick="formSubmit()" type="button" class="btn btn-primary"
                                            style='float: right;'>
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreCashSaleInvoices', '#create-form') !!}

    <script>
        $(document).ready(function() {
            $('select[id="AccountCodeSelect"]').on('change', function() {
                var mainAccountCode = $(this).val();
                chartof_account_id.value = $(this).val();
                if (mainAccountCode) {
                    $.ajax({
                        url: '/chartofaccountdependent/ajax/' + mainAccountCode,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            accountName.value = data.description;
                            ac_code.value = data.coa_number;
                            getAccountType(data.account_type_id);
                        }
                    });
                }

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
        });


        function setCart() {
            var chartof_account_id = document.getElementById("chartof_account_id").value;
            var ac_code = document.getElementById("ac_code").value;
            var account_type_id = document.getElementById("account_type_id").value;
            var accountHead = document.getElementById("accountHead").value;
            var accountName = document.getElementById("accountName").value;
            var Dr = document.getElementById("Dr").value;
            var Cr = document.getElementById("Cr").value;
            var Remark = document.getElementById("Remark").value;


            if (chartof_account_id == '' || chartof_account_id == null) {
                alert("Select A/C Code.");
                return false;
            }

            if (isNaN(Dr)) {
                alert("Enter Numeric value only.");
                return false;
            }

            if (isNaN(Cr)) {
                alert("Enter Numeric value only.");
                return false;
            }

            var url = '{{ url('add_cart_temp_journal_entry') }}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: url,
                data: {
                    chartof_account_id: chartof_account_id,
                    ac_code: ac_code,
                    account_type_id: account_type_id,
                    ac_head: accountHead,
                    ac_name: accountName,
                    dr: Dr,
                    cr: Cr,
                    remark: Remark,
                },
                success: function(data) {
                    getTemporarySalesItems();
                },
                error: function(data) {}
            });
        }


        function getTemporarySalesItems() {
            var url = '{{ url('get_cart_temp_journal_entry') }}';
            $.ajax({
                url: url,
                method: "GET",
                success: function(data) {
                    let temp_lists = '';
                    var dr_total = 0;
                    var cr_total = 0;
                    $.each(JSON.parse(data), function(key, value) {
                        dr_total += +value.dr;
                        cr_total += +value.cr;
                        let k = key + 1;
                        temp_lists += '<tr>';
                        temp_lists += '<td>' + k + '</td>'

                        // A/C Code 
                        temp_lists += '<td>'
                        temp_lists += value.ac_code;
                        temp_lists += '</td>'

                        temp_lists += '<td>'
                        temp_lists += value.ac_head;
                        temp_lists += '</td>'

                        temp_lists += '<td>'
                        temp_lists += value.ac_name;
                        temp_lists += '</td>'

                        // DR
                        temp_lists += '<td style="text-align: right;">'
                        temp_lists += value.dr;
                        temp_lists += '</td>'

                        // cr	
                        temp_lists += '<td style="text-align: right;">'
                        temp_lists += value.cr;
                        temp_lists += '</td>'

                        // remark
                        temp_lists += '<td>'
                        temp_lists += value.remark;
                        temp_lists += '</td>'

                        // Action
                        temp_lists += '<td>'
                        temp_lists += '<a href="javascript:void(0);" class="remove_item" data-id="' +
                            value.id + '"> Remove</a>'
                        temp_lists += '</td>'
                        temp_lists += '</tr>';
                    });
                    $('#TempLists').html(temp_lists);
                    drTotal.value = dr_total;
                    crTotal.value = cr_total;
                }
            });
        }

        getTemporarySalesItems();

        $(document).on("click", ".remove_item", function() {
            var id = $(this).data('id');
            $.ajax({
                url: `/remove_cart_temp_journal_entry/${id}`,
                method: "GET",
                success: function(data) {
                    getTemporarySalesItems();
                }
            });
        });

        function formSubmit() {
            var drTotal = document.getElementById("drTotal").value;
            var crTotal = document.getElementById("crTotal").value;
            if (drTotal == crTotal) {
                document.getElementById("journalForm").submit();
            } else {
                alert('Cannot create unbalanced journal entry.');
            }

        }
    </script>
@endsection
