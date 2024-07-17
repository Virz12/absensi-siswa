<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\data_libur;
use Carbon\Carbon;

class DataLiburSeeder extends Seeder
{
    public function run(): void
    {
        $liburs = [
            // ['tanggal' => '2024-01-01', 'keterangan' => 'Tahun Baru Masehi'],
            // ['tanggal' => '2024-03-11', 'keterangan' => 'Hari Raya Nyepi'],
            // ['tanggal' => '2024-04-10', 'keterangan' => 'Waisak'],
            // ['tanggal' => '2024-05-01', 'keterangan' => 'Hari Buruh'],
            // ['tanggal' => '2024-05-09', 'keterangan' => 'Kenaikan Isa Almasih'],
            // ['tanggal' => '2024-05-23', 'keterangan' => 'Idul Fitri 1'],
            // ['tanggal' => '2024-05-24', 'keterangan' => 'Idul Fitri 2'],
            // ['tanggal' => '2024-06-01', 'keterangan' => 'Hari Lahir Pancasila'],
            // ['tanggal' => '2024-08-17', 'keterangan' => 'Hari Kemerdekaan'],
            // ['tanggal' => '2024-12-25', 'keterangan' => 'Natal'],
            // ['tanggal' => '2024-03-12', 'keterangan' => 'Cuti Bersama Hari Raya Nyepi'],
            // ['tanggal' => '2024-05-22', 'keterangan' => 'Cuti Bersama Idul Fitri 1'],
            // ['tanggal' => '2024-05-25', 'keterangan' => 'Cuti Bersama Idul Fitri 2'],
            // ['tanggal' => '2024-05-26', 'keterangan' => 'Cuti Bersama Idul Fitri 3'],
            // ['tanggal' => '2024-12-26', 'keterangan' => 'Cuti Bersama Natal'],
        ];

        foreach ($liburs as $libur) {
            data_libur::create([
                'tanggal' => Carbon::parse($libur['tanggal']),
                'keterangan' => $libur['keterangan'],
            ]);
        }
    }
}
