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
            $table->string('hari'); 
            $table->date('tanggal'); 
            $table->string('username'); 
            $table->time('waktu_masuk')->nullable(); 
            $table->time('waktu_pulang')->nullable(); 
            $table->string('status_kehadiran'); 
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
