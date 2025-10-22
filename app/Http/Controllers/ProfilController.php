<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller // Nama Class Baru
{
    public function info() // Method baru, kita beri nama 'info'
    {
        // Data yang akan dikirim ke View
        $namaToko = 'TOKO LARAVEL MART';
        $alamat = 'Jalan Kode PHP Blok A No. 12';
        $tahun = 2024;
        
        // Memuat View 'toko/profil' dan mengirim tiga variabel data
        return view('toko.profil', compact('namaToko', 'alamat', 'tahun'));
    }
}