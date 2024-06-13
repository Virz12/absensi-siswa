<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\data_absen;
use App\Models\User;
use GuzzleHttp\Client;
use Carbon\Carbon;

class TandaAlpha extends Command
{
    
    protected $signature = 'mark:alpha';
    protected $description = 'deskripsi alpha';

    protected $client;
    protected $apiKey;

    public function __construct()
    {
        parent::__construct();
        $this->client = new Client(['base_uri' => 'https://kalenderindonesia.com/api/fc9be4be87630496/libur/masehi/2024']);
        $this->apiKey = 'fc9be4be87630496'; // Ganti dengan API key Anda
    }
    
    public function handle()
    {
        $current_date = Carbon::now()->setTimezone('Asia/Jakarta');
        $year = $current_date->year;

        // Get holidays data from the API
        $liburs = $this->getLibur($year);

        $users = user::where('Role','siswa')->get();
        foreach ($users as $user) {
            $absensi = data_absen::where('username', $user->username)
                                    ->whereDate('tanggal', $current_date->format('Y-m-d'))
                                    ->first();

            if (!$absensi && !$this->isHoliday($current_date, $liburs) && !$this->isWeekend($current_date)) {
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

    protected function getLibur($year)
    {
        $response = $this->client->get("holiday", [
            'query' => [
                'api_key' => $this->apiKey,
                'year' => $year,
                'country' => 'ID',
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data['holiday'] ?? [];
    }

    protected function isHoliday($date, $liburs)
    {
        $formattedDate = $date->format('Y-m-d');

        // Memeriksa apakah tanggal tersebut adalah hari libur
        foreach ($liburs as $libur) {
            if ($libur['date'] == $formattedDate) {
                return true;
            }
        }

        return false;
    }

    protected function isWeekend($date)
    {
        // Memeriksa apakah tanggal tersebut adalah hari Sabtu atau Minggu
        return $date->isWeekend();
    }
}
