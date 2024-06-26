<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $data_siswa = [
            [
                'id' => '1',
                'username' => 'rifqi',
                'Role' => 'siswa',
                'nama_depan' => '',
                'nama_belakang' => '',
                'telepon' => '',
                'nama_sekolah' =>'',
                'jenis_kelamin' => '',
                'status' => 'Aktif',
                'password' => bcrypt('rafiq')
            ],[
                'id' => '2',
                'username' => 'virgi',
                'Role' => 'siswa',
                'nama_depan' => '',
                'nama_belakang' => '',
                'telepon' => '',
                'nama_sekolah' =>'',
                'jenis_kelamin' => '',
                'status' => 'Aktif',
                'password' => bcrypt('virz')
            ],[
                'id' => '3',
                'username' => 'fajar',
                'Role' => 'siswa',
                'nama_depan' => '',
                'nama_belakang' => '',
                'telepon' => '',
                'nama_sekolah' =>'',
                'jenis_kelamin' => '',
                'status' => 'Aktif',
                'password' => bcrypt('fazar')
            ],[
                'id' => '4',
                'username' => 'zulfan',
                'Role' => 'siswa',
                'nama_depan' => '',
                'nama_belakang' => '',
                'telepon' => '',
                'nama_sekolah' =>'',
                'jenis_kelamin' => '',
                'status' => 'Aktif',
                'password' => bcrypt('panjul')
            ]
        ];

        $data_Admin = [
            [
                'id' => '5',
                'username' => 'admin',
                'Role' => 'admin',
                'nama_depan' => '',
                'nama_belakang' => '',
                'telepon' => '',
                'nama_sekolah' =>'',
                'jenis_kelamin' => '',
                'status' => 'Aktif',
                'password' => bcrypt('admin')
            ]
        ];

        foreach($data_siswa as $data) {
            user::create($data);
        }

        foreach($data_Admin as $data) {
            user::create($data);
        }
    }
}
