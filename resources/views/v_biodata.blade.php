<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Passing Data Array</title>
</head>
<body>
    <h1>PEMROGRAMAN WEB LANJUT</h1>
    <br>
    <p>Nama: {{ $nama }}</p>
    <p>Makananan Kesukaan</p>
    <ul>
        @foreach($makanan as $m)
        <li>{{ $m }}</li>
        @endforeach
    </ul>
</body>
</html>