<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class Reset extends Command
{
    protected $signature = 'mark:reset';
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $siswas = User::where('Role','siswa')->get();

        foreach ($siswas as $siswa) {
            if ($siswa->kehadiran == 'sudah') {
                $siswa->update(['kehadiran' => 'belum']);
            }
        }
    }
}
