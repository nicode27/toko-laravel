<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up(): void
{
    // 1. Anda HARUS membungkusnya dengan Schema::create()
    // 2. 'absens_karyawan' adalah nama tabel yang akan dibuat
    // 3. Gunakan 'Blueprint $table' (pakai 'a')
    Schema::create('absens_karyawan', function (Blueprint $table) {
        
        // 4. Gunakan '$table->id()' (pakai 'a' dan '->')
        $table->id();

        // 5. Ganti semua '$tabel' menjadi '$table'
        $table->foreignId('karyawan_id')
              ->constrained('karyawan')
              ->onDelete('cascade');
        $table->date('tanggal');
        $table->time('jam_masuk')->nullable();
        $table->time('jam_keluar')->nullable();
        $table->enum('status', ['hadir', 'sakit', 'izin', 'alpha'])->default('hadir');
        
        // Laravel akan otomatis menambahkan created_at dan updated_at
        // jika Anda mau
        $table->timestamps(); 
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
