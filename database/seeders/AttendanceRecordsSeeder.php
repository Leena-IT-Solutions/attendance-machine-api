<?php

namespace Database\Seeders;

use App\Models\AttendanceRecord;
use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AttendanceRecordsSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Get default admin user (Acme Industries)
        $user = User::where('email', 'acme@example.com')->first();
        if (!$user) {
            return;
        }

        // 2. Get all 10 employees
        $employees = Employee::where('user_id', $user->id)->get();
        if ($employees->isEmpty()) {
            return;
        }

        // 3. Clear existing attendance records for June and July 2026 to prevent duplication
        AttendanceRecord::where('user_id', $user->id)
            ->whereBetween('scan_date', ['2026-06-01', '2026-07-31'])
            ->delete();

        // 4. Generate dates for June and July 2026
        $startDate = Carbon::create(2026, 6, 1)->startOfDay();
        $endDate = Carbon::create(2026, 7, 31)->endOfDay();
        
        $dates = [];
        $current = $startDate->copy();
        while ($current->lessThanOrEqualTo($endDate)) {
            $dates[] = $current->toDateString();
            $current->addDay();
        }

        // 5. Seed punches
        foreach ($dates as $dateString) {
            $carbonDate = Carbon::parse($dateString);
            
            // Sundays are weekly off
            if ($carbonDate->isSunday()) {
                continue;
            }

            foreach ($employees as $index => $employee) {
                // Introduce realistic absenteeism patterns
                // Employee index 3 (Deepa Nair) is absent more frequently
                // Employee index 7 (Anjali Verma) has a few absences
                $absenceChance = 4; // default 4% chance
                if ($index === 3) {
                    $absenceChance = 15; // 15% chance
                } elseif ($index === 7) {
                    $absenceChance = 10; // 10% chance
                }

                if (rand(1, 100) <= $absenceChance) {
                    // Absent, do not write punch records for today
                    continue;
                }

                // Determine if late (approx 20% chance of arriving after 07:30:00)
                $isLate = (rand(1, 100) <= 20);

                if ($isLate) {
                    // Late arrival: 07:31:00 to 08:15:00
                    $inHour = 7;
                    $inMinute = rand(31, 59);
                    if ($inMinute > 45 && rand(0, 1)) {
                        $inHour = 8;
                        $inMinute = rand(0, 15);
                    }
                } else {
                    // On time arrival: 07:15:00 to 07:30:00
                    $inHour = 7;
                    $inMinute = rand(15, 30);
                }

                $inSecond = rand(0, 59);
                $inTime = sprintf('%02d:%02d:%02d', $inHour, $inMinute, $inSecond);

                // Out punch: 16:30:00 to 17:05:00 (approx 8.5 to 9 hours later)
                $outHour = 16;
                $outMinute = rand(30, 59);
                if ($outMinute > 50 && rand(0, 1)) {
                    $outHour = 17;
                    $outMinute = rand(0, 5);
                }
                $outSecond = rand(0, 59);
                $outTime = sprintf('%02d:%02d:%02d', $outHour, $outMinute, $outSecond);

                // Create In Punch
                AttendanceRecord::create([
                    'user_id' => $user->id,
                    'employee_code' => $employee->code,
                    'employee_name' => $employee->name,
                    'scan_date' => $dateString,
                    'scan_time' => $inTime
                ]);

                // Create Out Punch
                AttendanceRecord::create([
                    'user_id' => $user->id,
                    'employee_code' => $employee->code,
                    'employee_name' => $employee->name,
                    'scan_date' => $dateString,
                    'scan_time' => $outTime
                ]);
            }
        }
    }
}
