<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Profil Toko</title>
</head>
<body>
    <h1>Selamat Datang di {{ $namaToko }}</h1>
    
    <p>Toko kami beroperasi sejak tahun {{ $tahun }}.</p>
    
    <h2>Informasi Kontak:</h2>
    <p>Alamat: {{ $alamat }}</p>

    <hr>
    
    @if ($tahun >= 2024)
        <p>Kami adalah toko modern dan terbaru.</p>
    @else
        <p>Kami adalah toko legendaris!</p>
    @endif

</body>
</html>