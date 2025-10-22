<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;
use App\Http\Controllers\ProfilController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/welcome', function () {
//     echo "Welcome";
// });

// Untuk menampilkan/mengambil data
// Route::get('/index',function() {
//     echo "Uji coba route dengan method GET";
// }
// );

// Tambahkan Route ini agar URL /produk memanggil fungsi index di ProdukController
Route::get('/produk', [produkController::class, 'index']); //

// Untuk mengirim 
Route::post('/store', function(){
    return "Data berhasil ditambahkan ke store dummy masuk database";
});

Route::get('/produk/{id}', [produkController::class, 'show']);

Route::post('/produk', [produkController::class, 'store']);

Route::put('/produk/{id}', [produkController::class, 'update']);

Route::delete('/produk/{id}', [produkController::class, 'destroy']);

Route::get('/show/{id}', function ($id) {
    // Variabel $id akan diisi dengan nilai dari URL (misalnya 17)
    echo "Nilai Parameter Adalah " . $id; 
});

Route::get('/edit/{nama}', function ($nama) { 
    echo "Nilai Parameter Adalah " . $nama;
})->where('nama', '[A-Za-z]+'); // Hanya menerima huruf A-Z atau a-z

// 1. Route Tujuan (target) - Punya Nama
Route::get('/url-sekarang/buat-data-baru', function () {
    return 'Ini adalah halaman form CREATE produk.';
})->name('create'); // Nama Route adalah 'create'

// 2. Route Sumber (source) - Digunakan untuk menampilkan link
Route::get('/index', function () {
    // Di sinilah kita menggunakan Named Route untuk membuat link
    $link = route('create'); // Ini akan menghasilkan URL '/url-sekarang/buat-data-baru'
    
    // Tampilkan link tersebut
    echo 'Akses Route dengan nama: <a href="' . $link . '">Link ke Halaman Create</a>';
    
    // Contoh di materi Anda:
    echo '<a href="' . route('create') . '">Akses Route dengan nama </a>';
})->name('index');


// Route::get menerima 2 parameter utama:
// 1. URI: '/produk'
// 2. Array: [Nama_Controller::class, 'Nama_Method']
Route::get('/produk', [produkController::class, 'index']);


// Tambahkan Route baru:
Route::get('/profil', [ProfilController::class, 'info']);