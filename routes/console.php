<?php

use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\CronTes;

Schedule::command('mark:alpha')->timezone('Asia/Jakarta')
                                ->dailyAt('12.00');