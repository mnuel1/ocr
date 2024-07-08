<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel OCR</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Laravel OCR Application</h2>
        <form action="{{ route('process') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="searchText">Text to Search</label>
                <input type="text" class="form-control" name="searchText" id="searchText" required>
            </div>
            <div class="form-group">
                <label for="file">Upload Image or PDF</label>
                <input type="file" class="form-control" name="file" id="file" accept="image/*,application/pdf" required>
            </div>
            <button type="submit" class="btn btn-primary">Process File</button>
        </form>

        @isset($found)
            <div class="mt-5">
                <h4>Search Result:</h4>
                @if ($found)
                    <div class="alert alert-success">Text found in the file!</div>
                @else
                    <div class="alert alert-danger">Text not found in the file.</div>
                @endif
            </div>
        @endisset
    </div>
</body>
</html>
