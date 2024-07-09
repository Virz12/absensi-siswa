<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\data_absen;
use App\Models\data_libur;
use App\Models\User;
use Carbon\Carbon;

class TandaAlpha extends Command
{
    
    protected $signature = 'mark:alpha';
    protected $description = 'menandai siswa tanpa keterangan atau tidak hadir';

    public function handle()
    {
        $current_date = Carbon::now()->setTimezone('Asia/Jakarta');
        $year = $current_date->year;

        $liburs = $this->AmbilLibur($year);

        $users = User::where('Role', 'siswa')->get();

        foreach ($users as $user) {
            $absensi = data_absen::where('username', $user->username)
                ->whereDate('tanggal', $current_date->format('Y-m-d'))
                ->first();

            if (!$absensi && !$this->Libur($current_date, $liburs) && !$this->AkhirPekan($current_date)) {
                data_absen::create([
                    'username' => $user->username,
                    'hari' => $current_date->isoFormat('dddd'),
                    'tanggal' => $current_date,
                    'status_kehadiran' => 'Alpha',
                ]);
                User::where('username', $user->username)->update(['kehadiran' => 'sudah']);
            }
        }
    }

    protected function AmbilLibur($year)
    {
        return data_libur::all()->pluck('tanggal')->toArray();
    }

    protected function Libur($date, $liburs)
    {
        return in_array($date->format('Y-m-d'), $liburs);
    }

    protected function AkhirPekan($date)
    {
        return $date->isWeekend();
    }
}
