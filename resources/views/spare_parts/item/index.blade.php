@extends('layouts.menus.spare_part')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title header-elements">
                        <h5 class="m-0 me-2">
                            Item
                        </h5>
                        <div class="card-title-elements ms-auto">
                            <a href="{{ route('spare_part_item.create') }}"
                                class="dt-button create-new btn btn-primary btn-sm">
                                <i class="bx bx-plus me-sm-2"></i>
                                <span class="d-none d-sm-inline-block">Create</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive text-nowrap rowheaders table-scroll outer-wrapper">
                    <table class="table table-bordered main-table">
                        <thead style="background-color: #2e696e;">

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 1%;">
                                No
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 1%;">
                                Date
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Spare Part Number
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Spare Parts Name
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 1%;">
                                Opening Qty
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 10%;">
                                Remark
                            </th>

                            <th style="color: white; background-color: #2e696e; text-align: center; width: 1%;">
                                Actions
                            </th>

                        </thead>

                        <tbody>
                            @foreach ($spare_part_items as $key => $item)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>
                                        @php
                                            $create_at = $item->created_at;
                                            $explode_date = explode(' ', $create_at);
                                            echo $explode_date[0];
                                        @endphp
                                    </td>

                                    <td>
                                        {{ $item->part_number ?? '' }}
                                    </td>

                                    <td>
                                        {{ $item->part_name ?? '' }}
                                    </td>

                                    <td style="text-align: right;">
                                        {{ $item->opening_qty ?? 0 }}
                                    </td>

                                    <td>
                                        {{ $item->remark ?? '' }}
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu">

                                                <li>
                                                    <a class="dropdown-item"
                                                        href="{{ route('spare_part_item.edit', $item->id) }}">Edit</a>
                                                </li>

                                                <li>
                                                    <form action="{{ route('spare_part_item.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="dropdown-item del_confirm"
                                                            id="confirm-text" data-toggle="tooltip">Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
