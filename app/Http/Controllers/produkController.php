<?php
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\barang; // Harus diimport jika ingin menggunakan model
class produkController extends Controller
{
    // Method ini akan dipanggil oleh Route
    // public function index()
    // {
    //     return 'Mengakses Fungsi di Controller menggunakan route';
    // }
    public function index()
    {
        // 1. Data yang akan ditampilkan
        $produk = 'Botol Minum 1000ml'; 

        // 2. Perintah untuk memuat View dan mengirim data:
        // Mencari file: resources/views/produk/index.blade.php
        // Mengirim variabel $produk
        return view('produk/index', compact('produk')); 
    }
}