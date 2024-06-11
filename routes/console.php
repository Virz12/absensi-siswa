<?php

use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\TandaAlpha;
use App\Console\Commands\Reset;

Schedule::command('mark:alpha')->timezone('Asia/Jakarta')
                                ->dailyAt('12.30');

Schedule::command('mark:reset')->timezone('Asia/Jakarta')
                                ->daily();