<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Models\Pesanan;
use App\Models\Buku;
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\ExpirePesanan;



Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command(ExpirePesanan::class)
    ->everyMinute();
