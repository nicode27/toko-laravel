<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensKaryawan extends Model
{
    protected $table = 'absens_karyawan';
    protected $fillable = [
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'status',
        'keterangan',
    ];
    //relasi ke model karyawan
    public function karyawan(){
        return $this->belongsTo(KaryawanModel::class, 'karyawan_id');
}
}
