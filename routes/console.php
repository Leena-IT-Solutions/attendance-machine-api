<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Keep 95 days of attendance records backup on the server by pruning older records daily
Illuminate\Support\Facades\Schedule::call(function () {
    $cutoffDate = Carbon\Carbon::now()->subDays(95)->toDateString();
    $deleted = \App\Models\AttendanceRecord::where('scan_date', '<', $cutoffDate)->delete();
    logger()->info("Scheduled Cleanup: Pruned {$deleted} attendance records older than 95 days (before {$cutoffDate}).");
})->daily();
