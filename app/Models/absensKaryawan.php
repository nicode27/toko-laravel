<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensKaryawan extends Model
{
    use HasFactory; // <-- Tambahkan ini jika belum ada

    protected $table = 'absens_karyawan';
    
    // Perbarui $fillable Anda menjadi seperti ini
    protected $fillable = [
        'karyawan_id', // <-- TAMBAHKAN INI
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'status',
        'keterangan',
    ];

    public function karyawan()
    {
        return $this->belongsTo(KaryawanModel::class, 'karyawan_id');
    }
}