<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        // Auto-setup for NativePHP device: run migrations and create default user
        if ($this->runningOnDevice()) {
            $this->setupDevice();
        }
    }

    private function runningOnDevice(): bool
    {
        // NativePHP serves the app locally; web server uses the real domain
        return request()->getHost() === '127.0.0.1'
            || str_contains(config('app.url', ''), '127.0.0.1');
    }

    private function setupDevice(): void
    {
        try {
            if (!Schema::hasTable('users')) {
                Artisan::call('migrate', ['--force' => true]);
            }
        } catch (\Throwable $e) {
            // Silently fail — don't break the request if setup fails
        }
    }
}
