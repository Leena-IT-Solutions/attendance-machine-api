# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

Face recognition employee attendance app built with Laravel 13 + PHP 8.3. Uses face-api.js (TensorFlow.js) for client-side face detection via webcam, offline-first attendance posting, and NativePHP for mobile packaging.

## Commands

```bash
# Setup from scratch
composer setup          # install deps, generate key, migrate, build assets

# Development (runs all services concurrently)
composer dev            # Laravel server + queue + pail log viewer + Vite

# Individual services
php artisan serve
npm run dev             # Vite hot reload
php artisan queue:listen

# Build
npm run build           # Production frontend assets

# Testing
composer test           # PHPUnit with config cache cleared
php artisan test --filter=TestName

# Linting
./vendor/bin/pint

# Database
php artisan migrate
php artisan migrate:fresh --seed
php artisan storage:link   # Required once — links public/storage
```

## Architecture

### Core Flow

1. **Admin** logs into web UI → manages employees (name, code, photo)
2. **Scanner operator** opens Dashboard → browser accesses webcam → face-api.js detects faces
3. Matched employee attendance is POSTed to a configurable external API URL (`users.attendance_api_url`)
4. If offline, attendance is queued in `localStorage` → auto-retried when online
5. A local copy is also saved to `attendance_records` table for Excel report generation

### Key Design Decisions

**Per-user API endpoint**: Each `User` has `attendance_api_url` and `api_token` fields. The dashboard posts `{ employee_code, p_date, p_time }` to this URL with `Authorization: Bearer api_token`, enabling multi-tenant deployments.

**Offline-first (JavaScript)**: `/api/employees/sync` returns JSON of all employees; the dashboard caches them in `localStorage`. Failed attendance submissions go into an `attendance_outbox` array in `localStorage` and are retried on reconnect.

**Face recognition is client-side only**: face-api.js v0.22.2 runs entirely in the browser using CDN-loaded TensorFlow.js models (`tinyFaceDetector`, `faceLandmark68Net`, `faceRecognitionNet`). The scanner builds a `FaceMatcher` from cached employee photo descriptors, running detection every 800ms. **The current implementation does real descriptor comparison** via `findBestMatch()` against employee photo embeddings loaded from URLs.

**60-second scan cooldown**: Implemented via a `lastScanned` Map keyed by employee code — prevents duplicate records within the same minute.

**Dual attendance save**: Every successful scan POSTs to the external `attendance_api_url` AND to `/attendance/local-save` (saves to `attendance_records` DB table for Excel reports).

**Month-start reporting cycle**: `users.month_start_date` (e.g., `26`) defines when a reporting cycle starts. The dashboard shows download links for the current and previous month cycles.

### Database

- `users` — machine operators; `attendance_api_url`, `api_token`, `sync_token`, `month_start_date`
- `employees` — scanned persons; `code` is unique identifier sent to external API; `photo` is storage path; `user_id` FK (nullable, null-on-delete)
- `attendance_records` — local attendance log; `user_id` FK (cascade delete), `employee_code`, `employee_name`, `scan_date`, `scan_time`
- Standard Laravel tables: `sessions`, `cache`, `jobs` (all database-backed)

### Key Files

| File | Purpose |
|------|---------|
| `resources/views/dashboard.blade.php` | All face-scanning logic (face-api.js, offline sync, attendance posting) — 530+ lines |
| `app/Http/Controllers/EmployeeController.php` | Employee CRUD + `list()` JSON endpoint for sync |
| `app/Http/Controllers/AttendanceController.php` | `store()` saves locally; `download()` generates Excel XML report |
| `app/Http/Controllers/ProfileController.php` | Profile + `attendance_api_url`, `api_token`, `month_start_date` config |
| `routes/web.php` | All named routes |
| `nativephp/` | Separate mirrored Laravel instance for Android/iOS builds |

### Routes

```
GET  /dashboard                    # Scanner (auth + verified)
GET  /api/employees/sync           # JSON employee list for offline cache (auth)
POST /attendance/local-save        # Save attendance to DB (auth)
GET  /attendance/report/{month?}   # Download Excel report (auth)
resource /employees                # CRUD (index, create, store, edit, update, destroy)
PATCH /profile                     # Update profile + API config
DELETE /profile                    # Delete account
GET  /download-apk                 # APK download (public)
```

### Authorization Pattern

No Laravel Policies are used. `EmployeeController` has an inline `authorizeEmployee()` helper that checks `employee->user_id === auth()->id()` and aborts 403 if mismatched.

### Storage

Employee photos upload to `storage/app/public/photos/` via `Storage::disk('public')`. Run `php artisan storage:link` once to expose via `/storage/photos/` URL.

### NativePHP Mobile

`nativephp/` is a **separate but mirrored** Laravel instance used for Android/iOS builds. It contains its own `android/` (Gradle) and `ios/` (Xcode) project directories, `binaries/` (PHP CLI, Java SDK), and build logs. Changes to app logic must be mirrored to `nativephp/` for mobile builds. Config in `nativephp.json` (requires PHP 8.3, no ICU).

### Stack

- **Backend**: Laravel 13, PHP 8.3, Eloquent, Laravel Breeze (auth)
- **Frontend**: Blade, Tailwind CSS, Alpine.js, Vite
- **Face ML**: face-api.js v0.22.2 (CDN), TensorFlow.js models loaded from CDN on demand
- **Mobile**: NativePHP (wraps app as Android/iOS) — config in `nativephp.json`
- **DB**: SQLite (dev default), configurable to MySQL/PostgreSQL
- **Queue/Cache/Session**: Database-backed drivers
- **Reporting**: Excel XML format via `AttendanceController::download()`
