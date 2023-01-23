<div class="col-md-12 col-sm-12 col-lg-12">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row gx-3 gy-2 align-items-center">

                <div class="col-md-12 col-lg-12">
                    <div class="form-check form-check-inline mt-3">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SearchRadio"
                            value="Search" checked>
                        <label class="form-check-label" for="SearchRadio">Search</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="FilterSearchRadio"
                            value="FilterSearch">
                        <label class="form-check-label" for="FilterSearchRadio">
                            Filter Search
                        </label>
                    </div>
                </div>



                {{-- Search --}}
                <div class="col-md-12" id="Search">
                    <form action="{{ route('cashbook.index') }}" autocomplete="off" method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label" for="selectType">Search</label>
                                <input type="text" class="form-control form-control-sm" name="search">
                            </div>

                            <div class="col-md-3">
                                <label class="form-label" for="showToastPlacement">&nbsp;</label>
                                <button type="submit" id="showToastAnimation"
                                    class="btn btn-primary btn-sm d-block">Search</button>
                            </div>
                        </div>
                    </form>
                </div>


                {{-- Filter Search --}}
                <div class="col-md-12" id="FilterSearch">
                    <form action="{{ route('cashbook.index') }}" method="GET" autocomplete="off">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-label" for="selectType">Start Date</label>
                                <input type="text" class="form-control form-control-sm date_picker" name="from_date">
                            </div>

                            <div class="col-md-2">
                                <label class="form-label" for="selectAnimation">End Date</label>
                                <input type="text" class="form-control form-control-sm date_picker" name="to_date">
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
