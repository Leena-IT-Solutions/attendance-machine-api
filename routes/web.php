<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy.policy');


Route::get('/download-apk', function () {
    $path = public_path('app-release.apk');
    if (!file_exists($path)) {
        abort(404, 'APK file not found. Please build the app first.');
    }
    return response()->download($path, 'attendance-machine.apk', [
        'Content-Type' => 'application/vnd.android.package-archive',
    ]);
})->name('download.apk');

Route::get('/dashboard', function () {
    // Historic user data (count by month)
    $userStats = \App\Models\User::where('role', 'user')
        ->selectRaw('COUNT(*) as count, MONTHNAME(created_at) as month, MONTH(created_at) as month_num')
        ->groupBy('month', 'month_num')
        ->orderBy('month_num')
        ->get();

    $totalEmployees = \App\Models\Employee::count();
    $totalUsers = \App\Models\User::where('role', 'user')->count();

    return view('dashboard', compact('userStats', 'totalEmployees', 'totalUsers'));
})->middleware(['auth', 'admin'])->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/prune-attendance', function () {
        $cutoffDate = \Carbon\Carbon::now()->subDays(95)->toDateString();
        $deleted = \App\Models\AttendanceRecord::where('scan_date', '<', $cutoffDate)->delete();
        return back()->with('status', "Successfully pruned {$deleted} attendance records older than 95 days (before {$cutoffDate}).");
    })->name('prune.attendance');
});

require __DIR__.'/auth.php';
