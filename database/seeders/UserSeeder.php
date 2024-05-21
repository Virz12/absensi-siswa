<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'Nama'=>'Admin',
                'password'=>bcrypt('Admin'),
                'Role'=>'Admin',
            ],[
                'Nama'=>'User',
                'password'=>bcrypt('User'),
                'Role'=>'User',
            ],
        ];
        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
