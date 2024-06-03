<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_siswa extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'data_siswas';

     protected $fillable = [
         'id',
         'username',
         'password',
         'Role',
         'telefone',
         'jenis_kelamin',
         'status',
     ];
}
