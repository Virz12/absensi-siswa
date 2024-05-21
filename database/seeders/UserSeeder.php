<?php

namespace Database\Seeders;

use App\Models\user;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $data_siswa = [
            [
                'id' => '1',
                'username' => 'rifqi',
                'Role' => 'siswa',
                'telefone' => '',
                'password' => bcrypt('rfq1611')
            ],[
                'id' => '2',
                'username' => 'virgi',
                'Role' => 'siswa',
                'telefone' => '',
                'password' => bcrypt('virz')
            ],[
                'id' => '3',
                'username' => 'fajar',
                'Role' => 'siswa',
                'telefone' => '',
                'password' => bcrypt('fazar')
            ],[
                'id' => '4',
                'username' => 'zulfan',
                'Role' => 'siswa',
                'telefone' => '',
                'password' => bcrypt('panjul')
            ]
        ];

        $data_Admin = [
            [
                'id' => '5',
                'username' => 'admin',
                'Role' => 'admin',
                'telefone' => '',
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
