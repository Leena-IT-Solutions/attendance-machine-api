<?php

namespace App\Helpers;

use Carbon\Carbon;

class AttendanceReportHelper
{
    /**
     * Determine the status of a specific day for an employee.
     */
    public static function calculateDailyStatus($date, $records, $user = null)
    {
        if ($records->isNotEmpty()) {
            return 'Working';
        }

        $carbonDate = Carbon::parse($date);

        // Specific national/state holidays in April 2026 as per shared report
        $holidays = [
            '2026-04-03', // Good Friday
            '2026-04-04', // Holiday Saturday
            '2026-04-14', // Ambedkar Jayanti
            '2026-04-23', // Festival Holiday
        ];

        if (in_array($carbonDate->toDateString(), $holidays)) {
            return 'Holiday';
        }

        // Sunday is always Weekoff
        if ($carbonDate->isSunday()) {
            return 'Weekoff';
        }

        // 4th Saturday of April 2026 (25th April) is Weekoff
        if ($carbonDate->isSaturday()) {
            $dayOfMonth = $carbonDate->day;
            // 4th Saturday falls between day 22 and 28
            if ($dayOfMonth >= 22 && $dayOfMonth <= 28) {
                return 'Weekoff';
            }
        }

        // Standard weekdays with no scans are marked as Absent
        return 'Absent';
    }

    /**
     * Calculate late minutes relative to shift start (default 07:30 AM).
     */
    public static function calculateLateMinutes($scanTime, $shiftStart = '07:30:00')
    {
        if (!$scanTime || $scanTime === '---') {
            return 0;
        }

        $punchIn = Carbon::parse($scanTime);
        $shift = Carbon::parse($punchIn->toDateString() . ' ' . $shiftStart);

        if ($punchIn->greaterThan($shift)) {
            return abs($punchIn->diffInMinutes($shift));
        }

        return 0;
    }

    /**
     * Replicates Loss of Pay (LOP) calculations:
     * - Absent = 1.0 LOP
     * - Late = late_minutes * 0.0025 LOP
     */
    public static function calculateLop($status, $lateMinutes)
    {
        if ($status === 'Absent') {
            return 1.0;
        }

        if ($status === 'Working' && $lateMinutes > 0) {
            // e.g. 4 minutes delay * 0.0025 = 0.01 LOP
            return round($lateMinutes * 0.0025, 2);
        }

        return 0.0;
    }
}
