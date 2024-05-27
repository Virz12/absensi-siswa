<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_absen extends Model
{
    use HasFactory;

    protected $table = 'data_absen';

    protected $fillable = [
        'id',
        'hari',
        'tanggal',
        'username',
        'waktu_masuk',
        'waktu_pulang',
        'status_kehadiran',
    ];
}
