<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Produk</title>
</head>
<body>
    <h1>Detail Produk: {{ $produk->nama }}</h1>
    <ul>
        <li>ID Kategori: {{ $produk->id_kategori }}</li>
        <li>Kuantitas (Qty): {{ $produk->qty }}</li>
        <li>Harga Beli: Rp {{ number_format($produk->harga_beli) }}</li>
        <li>Harga Jual: Rp {{ number_format($produk->harga_jual) }}</li>
    </ul>
    <a href="/produk">Kembali ke Index</a>
    <form method="POST" action="/produk/1">
    @csrf          
    @method('DELETE') <button type="submit">Hapus Produk Ini</button>
</form>
</body>
</html>