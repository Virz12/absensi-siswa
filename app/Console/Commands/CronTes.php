<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\data_absen;
use App\Models\User;
use Carbon\Carbon;

class CronTes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mark:alpha';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'deskripsi alpha';

    /**
     * Execute the console command.
     */

    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle()
    {
        $current_date = Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d');
        $users = user::where('Role','siswa');

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

        info('All students who did not absen masuk have been marked as alpha.');
    }
}
