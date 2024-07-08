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
                <label for="image">Upload Image</label>
                <input type="file" class="form-control" name="image" id="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Process Image</button>
        </form>

        @isset($found)
            <div class="mt-5">
                <h4>Search Result:</h4>
                @if ($found)
                    <div class="alert alert-success">Text found in the image!</div>
                @else
                    <div class="alert alert-danger">Text not found in the image.</div>
                @endif
            </div>
        @endisset
    </div>
</body>
</html>
