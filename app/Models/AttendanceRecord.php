<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    protected $fillable = [
        'user_id',
        'employee_code',
        'employee_name',
        'scan_date',
        'scan_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
