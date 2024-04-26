<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i < 1; $i++) {
            $number = rand(10000, 999999);
            $number2 = rand(10000, 999999);
            $number3 = rand(10000, 999999);


            Siswa::create([
                'nama' => 'Virgi',
                'nis' => $number,
                'jenis_kelamin' => 'Pria',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2006-09-12',
                'alamat' => 'Jln. Bla Bla No.12',
                'no_telp' => '8978569768'
            ]);

            Siswa::create([
                'nama' => 'Fajar',
                'nis' => $number2,
                'jenis_kelamin' => 'Pria',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2007-03-13',
                'alamat' => 'Jln. Xixixi No.09',
                'no_telp' => '908796754'
            ]);

            Siswa::create([
                'nama' => 'Zulfan',
                'nis' => $number3,
                'jenis_kelamin' => 'Pria',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2006-5-06',
                'alamat' => 'Jln. Apa tu man No.06',
                'no_telp' => '0908674567'
            ]);
        }
    }
}
