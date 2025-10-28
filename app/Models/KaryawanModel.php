<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'tmpt_lahir',
        'tgl_lahir',
        'alamat',
        'no_hp',
    ];
}