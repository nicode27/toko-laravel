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

        Schema::create('karyawan', function (Blueprint $table) {
            $table->id(); // auto-increment primary key
            $table->string('nama'); // nama lengkap karyawan
            $table->string('tmpt_lahir')->nullable(); // tempat lahir
            $table->date('tgl_lahir')->nullable(); // tanggal lahir
            $table->text('alamat')->nullable(); // alamat lengkap
            $table->string('no_hp')->nullable(); // nomor handphone
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('Karyawan');
    }
};