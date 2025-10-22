<?php
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\barang; // Harus diimport jika ingin menggunakan model
class produkController extends Controller
{
    // 1. READ (GET) - Index
    // URL: /produk 
    public function index()
    {
        $produk = 'Botol Minum 1000ml';
        return view('produk/index', compact('produk')); 
    } 
    // 2. READ (GET) - Show
    // URL: /produk/{id}
    public function show($id)
    {
        $produk = barang::find($id);

        if ($produk) {
            // Asumsi view 'produk/detail.blade.php' sudah dibuat
            return view('produk.detail', ['produk' => $produk]); 
        } else {
            return response('Produk ID ' . $id . ' tidak ditemukan', 404);
        }
    } 
    // 3. CREATE (POST) - Store
    // URL: /produk
    public function store(Request $request)
    {
        // 1. Membuat instance Model baru
        $new_product = new barang;
        // 2. Mengambil data dari Request (Contoh saja, asumsikan data ada)
        // PERHATIAN: Anda perlu membuat Form HTML untuk menguji ini!
        $new_product->nama = $request->input('nama_produk'); 
        $new_product->id_kategori = $request->input('id_kategori', 1); // Default ke 1
        $new_product->qty = $request->input('kuantitas');
        $new_product->harga_beli = $request->input('harga_beli');
        $new_product->harga_jual = $request->input('harga_jual');
        // 3. Menyimpan data (Create) ke database
        $new_product->save(); 

        // Memberikan respons berhasil
        return response('Produk baru berhasil disimpan: ' . $new_product->nama, 201);
    }   

public function update(Request $request, $id) 
{
    // 1. Cari data lama
    $produk = barang::find($id);
    
    if (!$produk) {
        return response('Produk ID ' . $id . ' tidak ditemukan', 404);
    }
    
    // 2. Memperbarui atribut (Misalnya, mengubah nama dan kuantitas)
    // Anda harus mengirim data ini saat pengujian
    $produk->nama = $request->input('nama_baru'); 
    $produk->qty = $request->input('qty_baru');
    
    // 3. Menyimpan perubahan (Update)
    $produk->save();
    
    return response('Produk ID ' . $id . ' berhasil diperbarui menjadi: ' . $produk->nama, 200);
}
public function destroy($id) 
{
    // 1. Cari data berdasarkan ID (Contoh kita pakai ID 1)
    $produk = barang::find($id);
    
    if (!$produk) {
        return response('Produk ID ' . $id . ' tidak ditemukan', 404);
    }

    // 2. Menghapus data
    $produk->delete(); 
    
    // Memberikan pesan sukses
    return response('Produk ID ' . $id . ' berhasil dihapus', 200);
}

}