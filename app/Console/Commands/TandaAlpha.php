<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\data_absen;
use App\Models\User;
use Carbon\Carbon;

class TandaAlpha extends Command
{
    
    protected $signature = 'mark:alpha';
    protected $description = 'menandai siswa tanpa keterangan atau tidak hadir';

    public function handle()
    {
        $current_date = Carbon::now()->setTimezone('Asia/Jakarta');

        // Mendapatkan tahun saat ini
        $year = $current_date->year;

        // Mendapatkan daftar hari libur nasional dan cuti bersama
        $liburs = $this->getLibur($year);

        // Mendapatkan daftar siswa
        $users = User::where('Role', 'siswa')->get();

        foreach ($users as $user) {
            // Memeriksa apakah siswa sudah absen pada tanggal tersebut
            $absensi = data_absen::where('username', $user->username)
                ->whereDate('tanggal', $current_date->format('Y-m-d'))
                ->first();

            // Jika siswa belum absen dan hari tersebut bukan hari libur atau akhir pekan
            if (!$absensi && !$this->isHoliday($current_date, $liburs) && !$this->isWeekend($current_date)) {
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

    protected function getLibur($year)
    {
        // Menyimpan daftar hari libur nasional dan cuti bersama secara statis
        return [
            '2024-01-01', // Tahun Baru Masehi
            '2024-03-11', // Hari Raya Nyepi
            '2024-04-10', // Waisak
            '2024-05-01', // Hari Buruh
            '2024-05-09', // Kenaikan Isa Almasih
            '2024-05-23', // Idul Fitri 1
            '2024-05-24', // Idul Fitri 2
            '2024-06-01', // Hari Lahir Pancasila
            '2024-08-17', // Hari Kemerdekaan
            '2024-12-25', // Natal
            '2024-03-12', // Cuti Bersama Hari Raya Nyepi
            '2024-05-22', // Cuti Bersama Idul Fitri 1
            '2024-05-25', // Cuti Bersama Idul Fitri 2
            '2024-05-26', // Cuti Bersama Idul Fitri 3
            '2024-12-26', // Cuti Bersama Natal
            // Tambahkan hari libur nasional dan cuti bersama lainnya sesuai kebutuhan
        ];
    }

    protected function isHoliday($date, $liburs)
    {
        // Memeriksa apakah tanggal tersebut adalah hari libur atau cuti bersama
        return in_array($date->format('Y-m-d'), $liburs);
    }

    protected function isWeekend($date)
    {
        // Memeriksa apakah tanggal tersebut adalah hari Sabtu atau Minggu
        return $date->isWeekend();
    }
}
