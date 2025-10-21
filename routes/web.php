<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\produkController;

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

