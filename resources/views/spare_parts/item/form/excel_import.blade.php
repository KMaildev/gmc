<form action="{{ route('spare_part_item_import') }}" method="POST" enctype="multipart/form-data" id="import-form">
    @csrf

    <input type="file" name="file" class="form-control" accept=".xlsx, .csv" required>
    <br>
    <p style="color: red;">
        Only insert up to 50 records at a time.
    </p>
    <a href="{{ asset('data/item_import.xlsx') }}" class="btn btn-primary text-white" download="">
        <i class="fa fa-download"></i>
        Simple File Download
    </a>

    <button type="submit" class="btn btn-success text-white">
        <i class="fa fa-check"></i>
        Upload
    </button>
</form>
