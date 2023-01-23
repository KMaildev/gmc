@extends('layouts.menus.accounting')
@section('content')
    <div class="row justify-content-center outer-wrapper">
        <div class="col-md-12 col-sm-12 col-lg-12 inner-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Cashbook 
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <div class="card-header-elements ms-auto">
                                <input type="text" class="form-control form-control-sm" placeholder="Search" />
                            </div>

                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#quickEntryModal">
                                Quick Entry
                            </button>
                        </div>
                    </div>
                </div>

                @include('cashbook_view.form.quick_entry_form', [
                    'chartof_accounts' => $chartof_accounts,
                    'sales_invoices' => $sales_invoices,
                ])

                {{-- onscroll="scrollLoadData()" --}}
                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper" onscroll="scrollLoadData()">
                    <table class="table-bordered main-table py-5" style="margin-bottom: 1px !important;"
                        id="tbl_exporttable_to_xls">
                        @include('cashbook_view.table_header')

                        @if ($cash_book_form_status == 'is_create')
                            @include('accounting.cash_book.form.create_form', [
                                'chartof_accounts' => $chartof_accounts,
                                'sales_invoices' => $sales_invoices,
                            ])
                        @endif

                        <tbody class="mytbody table-border-bottom-0" id="post-data">
                            @include('cashbook_view.table_render')
                        </tbody>
                    </table>

                    <div class="ajax-load text-center" style="display:none">
                        <p>
                            <img src="{{ asset('media/loading.gif') }}" style="width: 30px;">
                            Load More Data...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('cashbook_view.form.quick_edit_form', [
        'chartof_accounts' => $chartof_accounts,
        'sales_invoices' => $sales_invoices,
    ])
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
<script>
    function loadMoreData(page) {
        $.ajax({
                url: '?page=' + page,
                type: 'get',
                beforeSend: function() {
                    $(".ajax-load").show();
                }
            })
            .done(function(data) {
                console.log(data)
                if (data.html == "") {
                    $('.ajax-load').html("No more data!");
                    return;
                }
                $('.ajax-load').hide();
                // $("#post-data").append(data.html);
                $('#post-data').html(data.html);
            })
            // Call back function
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                // alert("Server not responding.....");
            });
    }

    var page = 1;

    function scrollLoadData() {
        page += 20;
        loadMoreData(page);
    }

    function editCashBook(id) {
        $('#quickEditModal').modal('show');

        var url = '{{ url('cash_book_quick_edit') }}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: 'GET',
            url: url,
            url: `${url}/${id}`,
            success: function(data) {
                $('#quickEditFormData').html(data.html);
            },
            error: function(data) {}
        });
    }
</script>
