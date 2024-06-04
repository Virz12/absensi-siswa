<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\data_absen;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CronTes extends Command
{
    
    protected $signature = 'mark:alpha';
    protected $description = 'deskripsi alpha';

    
    public function handle()
    {
        $current_date = Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d');
        $users = user::where('Role','siswa')->get();

        foreach ($users as $user) {
            $absensi = data_absen::where('username', $user->username)
                                ->where('tanggal', $current_date)
                                ->where('status_kehadiran', 'Hadir')
                                ->first();
            if (!$absensi) {
                data_absen::create([
                    'username' => $user->username,
                    'hari' => Carbon::now()->isoFormat('dddd'),
                    'tanggal' => $current_date,
                    'status_kehadiran' => 'alpha',
                ]);
            }
            
        }
    }
}
