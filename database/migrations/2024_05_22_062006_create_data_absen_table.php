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
        Schema::create('data_absen', function (Blueprint $table) {
            $table->id();
            $table->string('hari'); // Hari
            $table->date('tanggal'); // Tanggal 
            $table->string('username'); // Nama siswa
            $table->time('waktu_masuk')->nullable(); // Waktu masuk
            $table->time('waktu_pulang')->nullable(); // Waktu pulang
            $table->string('status_kehadiran'); // Status kehadiran (masuk, pulang, izin, sakit)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_absen');
    }
};
