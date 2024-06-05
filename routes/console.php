<?php

use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\TandaAlpha;

Schedule::command('mark:alpha')->timezone('Asia/Jakarta')
                                ->dailyAt('12.00');