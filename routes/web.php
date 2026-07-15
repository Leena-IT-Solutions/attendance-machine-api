<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestPosts = \App\Models\BlogPost::latest()->take(3)->get();
    return view('welcome', compact('latestPosts'));
})->name('welcome');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy.policy');

Route::get('/terms-of-service', function () {
    return view('terms-of-service');
})->name('terms');

Route::get('/refund-policy', function () {
    return view('refund-policy');
})->name('refund');

Route::get('/features', function () {
    return view('features');
})->name('features');

Route::get('/industries', function () {
    return view('industries');
})->name('industries');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/demo', function () {
    return view('demo');
})->name('demo');

Route::get('/reports', function () {
    return view('reports');
})->name('reports');

Route::get('/api-integration', function () {
    return view('api-integration');
})->name('api.integration');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/blog', function () {
    $posts = \App\Models\BlogPost::latest()->get();
    return view('blog', compact('posts'));
})->name('blog');

Route::get('/blog/{slug}', function ($slug) {
    $post = \App\Models\BlogPost::where('slug', $slug)->firstOrFail();
    return view('blog.detail', compact('post'));
})->name('blog.detail');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::prefix('features')->group(function () {
    Route::get('/face-recognition', function () {
        return view('features.face-recognition');
    })->name('features.detail.face-recognition');

    Route::get('/employee-management', function () {
        return view('features.employee-management');
    })->name('features.detail.employee-management');

    Route::get('/reports', function () {
        return view('features.reports');
    })->name('features.detail.reports');

    Route::get('/api', function () {
        return view('features.api');
    })->name('features.detail.api');

    Route::get('/payroll', function () {
        return view('features.payroll');
    })->name('features.detail.payroll');

    Route::get('/company-matrix', function () {
        return view('features.company-matrix');
    })->name('features.detail.company-matrix');

    Route::get('/employee-performance', function () {
        return view('features.employee-performance');
    })->name('features.detail.employee-performance');

    Route::get('/pdf-export', function () {
        return view('features.pdf-export');
    })->name('features.detail.pdf-export');

    Route::get('/excel-export', function () {
        return view('features.excel-export');
    })->name('features.detail.excel-export');

    Route::get('/shift-management', function () {
        return view('features.shift-management');
    })->name('features.detail.shift-management');
});

Route::prefix('industries')->group(function () {
    Route::get('/schools', function () {
        return view('industries.schools');
    })->name('industries.detail.schools');

    Route::get('/hospitals', function () {
        return view('industries.hospitals');
    })->name('industries.detail.hospitals');

    Route::get('/factories', function () {
        return view('industries.factories');
    })->name('industries.detail.factories');

    Route::get('/manufacturing', function () {
        return view('industries.manufacturing');
    })->name('industries.detail.manufacturing');

    Route::get('/hotels', function () {
        return view('industries.hotels');
    })->name('industries.detail.hotels');

    Route::get('/offices', function () {
        return view('industries.offices');
    })->name('industries.detail.offices');

    Route::get('/warehouses', function () {
        return view('industries.warehouses');
    })->name('industries.detail.warehouses');

    Route::get('/construction', function () {
        return view('industries.construction');
    })->name('industries.detail.construction');

    Route::get('/retail', function () {
        return view('industries.retail');
    })->name('industries.detail.retail');

    Route::get('/transport', function () {
        return view('industries.transport');
    })->name('industries.detail.transport');
});


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
    Route::resource('blogs', \App\Http\Controllers\BlogPostController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/prune-attendance', function () {
        $cutoffDate = \Carbon\Carbon::now()->subDays(95)->toDateString();
        $deleted = \App\Models\AttendanceRecord::where('scan_date', '<', $cutoffDate)->delete();
        return back()->with('status', "Successfully pruned {$deleted} attendance records older than 95 days (before {$cutoffDate}).");
    })->name('prune.attendance');

    Route::get('/employees/{code}/attendance', function ($code) {
        $records = \App\Models\AttendanceRecord::where('employee_code', $code)
            ->orderBy('scan_date', 'desc')
            ->orderBy('scan_time', 'desc')
            ->get();
            
        return response()->json([
            'success' => true,
            'records' => $records->map(function ($record) {
                return [
                    'scan_date' => \Carbon\Carbon::parse($record->scan_date)->format('M d, Y'),
                    'scan_time' => \Carbon\Carbon::parse($record->scan_time)->format('h:i A'),
                    'day_name' => \Carbon\Carbon::parse($record->scan_date)->format('l'),
                ];
            })
        ]);
    })->name('employees.attendance');


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
