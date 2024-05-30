<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\data_absen;
use App\Models\User;
use Carbon\Carbon;

class tandaAlpha extends Command
{

    protected $signature = 'absen:mark';
    protected $description = 'menandakan alpha';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $current_time = Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d');
        $siswas = user::where('role', 'siswa');

        foreach ($siswas as $siswa) {
            $absensi = data_absen::where('username', $siswa->username)
                                ->where('tanggal', $current_time)
                                ->where('status_kehadiran', 'masuk')
                                ->first();

            if (!$absensi) {
                data_absen::create([
                    'nama' => $siswa->usernmae,
                    'hari' => Carbon::now()->isoFormat('dddd'),
                    'tanggal' => $current_time,
                    'status_kehadiran' => 'alpha',
                ]);
            }
        }

        $this->info('siswa yang tidak hadir di tandai alpha.');
    }
}
