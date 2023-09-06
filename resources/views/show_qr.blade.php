<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show QR Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/qr.css') }}">
    
</head>
<body>
    <div class="container mt-5">
        <h1>Show QR Code</h1>
        <div class="alert alert-info">
            <p>Scan the QR code to open the Short URL.</p>
            <p>Original Link: <a href="{{ $originalLink }}" target="_blank">{{ $originalLink }}</a></p>
        </div>
        <div class="text-center">
            {{ $qrCode }}
        </div>
        <div class="text-center mt-3">
            <a href="/" class="circular-button">Back</a>
        </div>
    </div>

    
    
</body>
</html>
