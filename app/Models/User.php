<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

#[Fillable(['name', 'email', 'phone', 'password', 'role', 'attendance_api_url', 'api_token', 'sync_token', 'month_start_date', 'match_threshold', 'show_mask_warning', 'camera_resolution', 'enable_blink_liveness', 'require_scanner_auth', 'kiosk_pin', 'subscription_platform', 'subscription_tier', 'subscription_active', 'subscription_expires_at', 'max_employees', 'purchase_token', 'original_transaction_id'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function attendanceRecords()
    {
        return $this->hasMany(AttendanceRecord::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

    protected $attributes = [
        'max_employees' => 2,
        'subscription_tier' => 'free',
        'subscription_active' => false,
        'match_threshold' => 0.80,
        'show_mask_warning' => true,
        'camera_resolution' => 'medium',
        'enable_blink_liveness' => true,
        'require_scanner_auth' => true,
        'attendance_api_url' => null,
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'match_threshold' => 'double',
            'show_mask_warning' => 'boolean',
            'enable_blink_liveness' => 'boolean',
            'require_scanner_auth' => 'boolean',
            'subscription_active' => 'boolean',
        ];
    }
}
