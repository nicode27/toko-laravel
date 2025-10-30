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
        Schema::table('absens_karyawan', function (Blueprint $table) {
// Tambahkan kolom 'keterangan' setelah kolom 'status'
        $table->text('keterangan')->nullable()->after('status');
    });//
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absens_karyawan', function (Blueprint $table) {
            //
            $table->dropColumn('keterangan');
        });
    }
};
