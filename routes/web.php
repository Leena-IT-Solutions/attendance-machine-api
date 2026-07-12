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
    $path = public_path('attendance-machine.apk');
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

    Route::get('/git-info', function () {
        try {
            $basePath = base_path();
            $currentUser = trim(shell_exec('whoami') ?? 'unknown');
            $gitDir = $basePath . '/.git';
            $gitExists = file_exists($gitDir);
            $gitReadable = $gitExists ? is_readable($gitDir) : false;

            $commitHash = trim(shell_exec('git -c safe.directory="' . $basePath . '" rev-parse --short HEAD') ?? '');
            $commitMessage = trim(shell_exec('git -c safe.directory="' . $basePath . '" log -1 --pretty=%B') ?? '');
            $branch = trim(shell_exec('git -c safe.directory="' . $basePath . '" rev-parse --abbrev-ref HEAD') ?? '');
            $commitDate = trim(shell_exec('git -c safe.directory="' . $basePath . '" log -1 --date=format:"%Y-%m-%d %H:%M:%S" --pretty=%cd') ?? '');
            $commitRelative = trim(shell_exec('git -c safe.directory="' . $basePath . '" log -1 --date=relative --pretty=%cd') ?? '');
            $remotes = trim(shell_exec('git -c safe.directory="' . $basePath . '" remote -v') ?? 'None');

            return response()->json([
                'success' => true,
                'branch' => ($branch && $branch !== 'HEAD') ? $branch : 'main',
                'commit_hash' => $commitHash ?: 'N/A',
                'commit_message' => $commitMessage ? strtok($commitMessage, "\n") : 'Git not initialized or not accessible',
                'commit_date' => $commitDate ?: 'N/A',
                'commit_relative' => $commitRelative ?: 'N/A',
                'diagnostics' => [
                    'php_user' => $currentUser,
                    'git_dir_exists' => $gitExists,
                    'git_dir_readable' => $gitReadable,
                    'remotes' => $remotes
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    })->name('git.info');

    Route::post('/git-update', function () {
        $basePath = base_path();
        
        $branch = trim(shell_exec('git -c safe.directory="' . $basePath . '" rev-parse --abbrev-ref HEAD') ?? 'main');
        if ($branch === 'HEAD' || empty($branch) || $branch === 'Unknown') {
            $branch = 'main';
        }
        
        $commands = [
            'git -c safe.directory="' . $basePath . '" reset --hard HEAD 2>&1',
            'git -c safe.directory="' . $basePath . '" pull origin ' . $branch . ' 2>&1',
            'php artisan migrate --force 2>&1',
            'php artisan optimize:clear 2>&1',
        ];

        $output = ["Starting update process on branch '{$branch}'...\n"];
        $success = true;

        foreach ($commands as $command) {
            $output[] = "$ " . $command;
            $cmdOutput = [];
            $status = null;
            exec("cd " . $basePath . " && " . $command, $cmdOutput, $status);
            $output[] = implode("\n", $cmdOutput);
            $output[] = "Exit Code: " . $status . "\n";
            if ($status !== 0) {
                $success = false;
            }
        }

        if (function_exists('opcache_reset')) {
            opcache_reset();
            $output[] = "OPcache reset successfully.\n";
        }

        return response()->json([
            'success' => $success,
            'output' => implode("\n", $output),
        ]);
    })->name('git.update');
});

require __DIR__.'/auth.php';
