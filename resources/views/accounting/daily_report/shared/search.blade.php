<div class="col-md-12 col-sm-12 col-lg-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row gx-3 gy-2 align-items-center">
                <div class="col-md-12">
                    <form action="{{ route('daily_report.index') }}" method="GET" autocomplete="off">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-label" for="selectType">Start Date</label>
                                <input type="text" class="form-control form-control-sm date_picker" name="from_date">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label" for="showToastPlacement">&nbsp;</label>
                                <button type="submit" id="showToastAnimation"
                                    class="btn btn-primary btn-sm d-block">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
