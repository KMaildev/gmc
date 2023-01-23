<div class="card-title-elements ms-auto">

    <form action="{{ route('cash_trial.index') }}" method="get">
        <div class="input-group">
            <span class="input-group-text">
                Date Filter
            </span>
            <input type="text" class="form-control date_picker" name="start_date" value="{{ $start_date }}">
            <input type="text" class="form-control date_picker" name="end_date" value="{{ $end_date }}">
            <input type="submit" class="btn btn-info" value="Search">
        </div>
    </form>

    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Filters
        </button>
        <ul class="dropdown-menu" style="">

            <li>
                <a class="dropdown-item" href="javascript:void(0);">
                    This Week
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="javascript:void(0);">
                    Last Week
                </a>
            </li>
            <hr class="dropdown-divider">

            <li>
                <a class="dropdown-item" href="javascript:void(0);">
                    This Month
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="javascript:void(0);">
                    Last Month
                </a>
            </li>
            <hr class="dropdown-divider">
            <li>
                <a class="dropdown-item" href="javascript:void(0);">
                    Current Year
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="javascript:void(0);">
                    Last Year
                </a>
            </li>
        </ul>
    </div>

    <a href="" class="btn btn-danger">
        <i class="fa fa-file-pdf"></i>
        PDF
    </a>

    <a href="" class="btn btn-success">
        <i class="fa fa-file-excel"></i>
        Excel
    </a>
</div>
