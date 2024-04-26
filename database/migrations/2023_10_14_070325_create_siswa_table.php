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
        Schema::create('siswa', function (Blueprint $table) {
            $table->primary('nis');
            $table->string('nis', 20);
            $table->string('nama', 50);
            $table->string('jenis_kelamin', 10);
            $table->string('tempat_lahir', 30);
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('no_telp', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
