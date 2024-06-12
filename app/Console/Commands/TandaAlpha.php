<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\data_absen;
use App\Models\User;
use Carbon\Carbon;

class TandaAlpha extends Command
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
                                ->orderByRaw("FIELD(status_kehadiran, 'Hadir', 'Sakit', 'Izin')")
                                ->first();
            if (!$absensi) {
                data_absen::create([
                    'username' => $user->username,
                    'hari' => Carbon::now()->isoFormat('dddd'),
                    'tanggal' => $current_date,
                    'status_kehadiran' => 'Alpha',
                ]);
                user::where('username', $user->username)->update(['kehadiran' => 'sudah']);
            }
            
        }
    }
}
