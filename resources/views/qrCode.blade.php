<!DOCTYPE html>
<html>

<head>
    <title>How to Generate QR Code in Laravel</title>

</head>

<body>
    <form action="{{route('pdfDownload')}}" method="POST">
        @csrf
        <button> Download</button>
    </form>
    <div class="visible-print text-center">
        <h1>Laravel - QR Code Generator Example</h1>
        <div class="qr-container">
            {{ $qr }}
            <div class="qr-label">Scan the QR code</div>
        </div>
        <p>Example By Ahmed</p>
    </div>

</body>

</html>
