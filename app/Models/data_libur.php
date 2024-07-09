<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_libur extends Model
{
    use HasFactory;
    protected $table = 'data_libur';

    protected $fillable = [
        'id',
        'tanggal',
        'keterangan',
    ];
}
