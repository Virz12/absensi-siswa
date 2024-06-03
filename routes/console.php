<?php

use Illuminate\Support\Facades\Schedule;


Schedule::command('mark:alpha')->timezone('Asia/Jakarta')->dailyAt('16.00');