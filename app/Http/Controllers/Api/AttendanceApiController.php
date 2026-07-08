<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AttendanceRecord;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceApiController extends Controller
{
    public function sync(Request $request)
    {
        $employees = $request->user()->employees()->with('shift')->get(['id', 'name', 'code', 'photo', 'face_signature', 'shift_id'])->map(function ($emp) {
            return [
                'id'        => $emp->id,
                'name'      => $emp->name,
                'code'      => $emp->code,
                'photo_url' => $emp->photo ? asset('storage/' . $emp->photo) : null,
                'face_signature' => $emp->face_signature,
                'shift_id'  => $emp->shift_id,
                'shift' => $emp->shift ? [
                    'id' => $emp->shift->id,
                    'name' => $emp->shift->name,
                    'start_time' => substr($emp->shift->start_time, 0, 5),
                    'end_time' => substr($emp->shift->end_time, 0, 5),
                ] : null,
            ];
        });

        $shifts = $request->user()->shifts()->get(['id', 'name', 'start_time', 'end_time'])->map(function ($shift) {
            return [
                'id' => $shift->id,
                'name' => $shift->name,
                'start_time' => substr($shift->start_time, 0, 5),
                'end_time' => substr($shift->end_time, 0, 5),
            ];
        });

        $user = $request->user();
        return response()->json([
            'employees' => $employees,
            'shifts' => $shifts,
            'month_start_date' => $user->month_start_date,
            'subscription_active' => (bool)$user->subscription_active,
            'subscription_tier' => $user->subscription_tier,
            'subscription_expires_at' => $user->subscription_expires_at ? $user->subscription_expires_at->toDateTimeString() : null,
            'max_employees' => $user->max_employees,
            'settings' => [
                'match_threshold' => $user->match_threshold ?? 0.80,
                'show_mask_warning' => $user->show_mask_warning ?? true,
                'camera_resolution' => $user->camera_resolution ?? 'medium',
                'enable_blink_liveness' => $user->enable_blink_liveness ?? true,
                'require_scanner_auth' => $user->require_scanner_auth ?? true,
                'kiosk_pin' => $user->kiosk_pin ?? '',
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_code' => 'required|string',
            'employee_name' => 'required|string',
            'scan_date' => 'required|date',
            'scan_time' => 'required'
        ]);

        $userId = $request->user()->id;
        $code = $request->employee_code;
        $date = $request->scan_date;

        // Count existing records for this employee today
        $existingRecords = AttendanceRecord::where('user_id', $userId)
            ->where('employee_code', $code)
            ->where('scan_date', $date)
            ->orderBy('id', 'asc')
            ->get();

        if ($existingRecords->count() < 2) {
            // Create first (IN) or second (OUT) record
            $record = AttendanceRecord::create([
                'user_id' => $userId,
                'employee_code' => $code,
                'employee_name' => $request->employee_name,
                'scan_date' => $date,
                'scan_time' => $request->scan_time
            ]);
        } else {
            // Update the latest (OUT) record
            $record = $existingRecords->last();
            $record->update([
                'scan_time' => $request->scan_time
            ]);
        }

        return response()->json([
            'status' => 'success',
            'record' => $record,
            'type' => $existingRecords->count() == 0 ? 'IN' : 'OUT'
        ]);
    }

    public function recognize(Request $request)
    {
        $request->validate([
            'photo_base64' => 'required|string',
            'scan_date' => 'nullable|date',
            'scan_time' => 'nullable'
        ]);

        $userId = $request->user()->id;
        $base64Image = $request->input('photo_base64');
        $date = $request->input('scan_date', date('Y-m-d'));
        $time = $request->input('scan_time', date('H:i:s'));

        // 1. Fetch all employees with face signatures for this operator
        $employees = Employee::where('user_id', $userId)
            ->whereNotNull('face_signature')
            ->get(['id', 'name', 'code', 'photo', 'face_signature']);

        if ($employees->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No registered employees with face signatures found.'
            ], 404);
        }

        // 2. Format candidates for the microservice
        $candidates = [];
        foreach ($employees as $emp) {
            if (is_array($emp->face_signature) || is_object($emp->face_signature)) {
                $signatures = array_values((array) $emp->face_signature);
                $candidates[] = [
                    'code' => $emp->code,
                    'signatures' => $signatures
                ];
            }
        }

        if (empty($candidates)) {
            return response()->json([
                'status' => 'error',
                'message' => 'No valid biometric templates found.'
            ], 404);
        }

        // 3. Request face search from Python microservice
        try {
            $faceService = app(\App\Services\FaceRecognitionService::class);
            $result = $faceService->searchFace($base64Image, $candidates);

            if (!$result || !($result['recognized'] ?? false) || empty($result['best_match_code'])) {
                return response()->json([
                    'status' => 'mismatch',
                    'message' => 'Face not recognized'
                ], 422);
            }

            $matchedCode = $result['best_match_code'];

            // Find matching employee
            $employee = Employee::where('user_id', $userId)
                ->where('code', $matchedCode)
                ->first();

            if (!$employee) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Recognized employee code not found in local database.'
                ], 404);
            }

            // 4. Save attendance record
            $existingRecords = AttendanceRecord::where('user_id', $userId)
                ->where('employee_code', $employee->code)
                ->where('scan_date', $date)
                ->orderBy('id', 'asc')
                ->get();

            if ($existingRecords->count() < 2) {
                // Create first (IN) or second (OUT) record
                $record = AttendanceRecord::create([
                    'user_id' => $userId,
                    'employee_code' => $employee->code,
                    'employee_name' => $employee->name,
                    'scan_date' => $date,
                    'scan_time' => $time
                ]);
            } else {
                // Update the latest (OUT) record
                $record = $existingRecords->last();
                $record->update([
                    'scan_time' => $time
                ]);
            }

            // Forward to external API if configured
            $user = $request->user();
            if ($user && $user->attendance_api_url) {
                try {
                    $payload = [
                        'employee_code' => $employee->code,
                        'p_date' => $date,
                        'p_time' => $time,
                    ];

                    $headers = [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ];

                    if ($user->api_token) {
                        $headers['Authorization'] = 'Bearer ' . $user->api_token;
                    }

                    \Illuminate\Support\Facades\Http::withHeaders($headers)
                        ->post($user->attendance_api_url, $payload);
                        
                } catch (\Exception $e) {
                    \Illuminate\Support\Facades\Log::error("Failed to forward attendance to external API: " . $e->getMessage());
                }
            }

            return response()->json([
                'status' => 'success',
                'record' => $record,
                'employee' => [
                    'name' => $employee->name,
                    'code' => $employee->code,
                    'photo_url' => $employee->photo ? asset('storage/' . $employee->photo) : null,
                ],
                'type' => $existingRecords->count() == 0 ? 'IN' : 'OUT',
                'similarity' => $result['similarity'] ?? 0.0
            ]);

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Recognition endpoint failure: " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Face recognition service is temporarily unavailable.'
            ], 503);
        }
    }

    public function download(Request $request)
    {
        $month = $request->query('month', date('m'));
        $year = $request->query('year', date('Y'));
        
        return \Maatwebsite\Excel\Facades\Excel::download(
            new \App\Exports\AttendanceExport($request->user()->id, $month, $year), 
            "Attendance_Report_{$year}_{$month}.xlsx"
        );
    }

    public function summary(Request $request)
    {
        $month = $request->query('month', date('m'));
        $year = $request->query('year', date('Y'));

        $data = $this->getSummaryData($request->user(), $month, $year);

        return response()->json([
            'status' => 'success',
            'start_date' => $data['startDate']->toDateString(),
            'end_date' => $data['endDate']->toDateString(),
            'summary' => $data['summary'],
            'logs' => $data['records'],
        ]);
    }

    public function downloadPdf(Request $request)
    {
        $month = $request->query('month', date('m'));
        $year = $request->query('year', date('Y'));
        $user = $request->user();

        list($startDate, $endDate) = $this->calculateCycleDates($user, $month, $year);

        // Generate date array
        $dates = [];
        $current = $startDate->copy();
        while ($current->lessThanOrEqualTo($endDate)) {
            $dates[] = $current->toDateString();
            $current->addDay();
        }

        $employees = \App\Models\Employee::with('shift')->where('user_id', $user->id)->orderBy('name')->get();
        $matrix = [];

        foreach ($employees as $employee) {
            $row = [
                'name' => $employee->name,
                'code' => $employee->code,
                'days' => [],
            ];

            $totalLop = 0.0;
            $totalLate = 0;

            foreach ($dates as $dateString) {
                $dayRecords = AttendanceRecord::where('user_id', $user->id)
                    ->where('employee_code', $employee->code)
                    ->where('scan_date', $dateString)
                    ->orderBy('scan_time', 'asc')
                    ->get();

                $status = \App\Helpers\AttendanceReportHelper::calculateDailyStatus($dateString, $dayRecords, $user);
                $firstPunch = $dayRecords->first() ? $dayRecords->first()->scan_time : '---';
                $lastPunch = $dayRecords->count() > 1 ? $dayRecords->last()->scan_time : '---';

                $lateMin = 0;
                $lop = 0.0;

                if ($status === 'Working') {
                    $shiftStart = $employee->shift ? $employee->shift->start_time : '07:30:00';
                    $lateMin = \App\Helpers\AttendanceReportHelper::calculateLateMinutes($firstPunch, $shiftStart);
                    $lop = \App\Helpers\AttendanceReportHelper::calculateLop($status, $lateMin);
                } else if ($status === 'Absent') {
                    $lop = 1.0;
                }

                $totalLop += $lop;
                $totalLate += $lateMin;

                $row['days'][$dateString] = [
                    'status' => $status,
                    'in' => $firstPunch !== '---' ? substr($firstPunch, 0, 5) : null,
                    'out' => $lastPunch !== '---' ? substr($lastPunch, 0, 5) : null,
                    'late' => $lateMin,
                    'lop' => $lop,
                ];
            }

            $row['total_lop'] = number_format($totalLop, 2);
            $row['total_late'] = $totalLate;
            $matrix[] = $row;
        }

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.attendance_pdf', [
            'user' => $user,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'dates' => $dates,
            'matrix' => $matrix,
            'month' => $month,
            'year' => $year,
        ])->setPaper('a3', 'landscape');

        return $pdf->download("Attendance_Report_{$year}_{$month}.pdf");
    }

    public function deleteCycle(Request $request)
    {
        $request->validate([
            'month' => 'required|integer|between:1,12',
            'year' => 'required|integer|between:2000,2100',
        ]);

        $month = $request->input('month');
        $year = $request->input('year');
        $user = $request->user();

        list($startDate, $endDate) = $this->calculateCycleDates($user, $month, $year);

        $deletedCount = AttendanceRecord::where('user_id', $user->id)
            ->whereBetween('scan_date', [$startDate->toDateString(), $endDate->toDateString()])
            ->delete();

        return response()->json([
            'status' => 'success',
            'message' => "Successfully deleted {$deletedCount} attendance records for the selected cycle.",
            'deleted_count' => $deletedCount
        ]);
    }

    private function calculateCycleDates($user, $month, $year)
    {
        $monthStartDate = $user->month_start_date ?? 1;

        if ($monthStartDate == 1) {
            $startDate = \Carbon\Carbon::create($year, $month, 1)->startOfDay();
            $endDate = \Carbon\Carbon::create($year, $month, 1)->endOfMonth()->endOfDay();
        } else {
            $startDate = \Carbon\Carbon::create($year, $month, $monthStartDate)->subMonth()->startOfDay();
            $endDate = \Carbon\Carbon::create($year, $month, $monthStartDate)->subDay()->endOfDay();
        }

        return [$startDate, $endDate];
    }

    private function getSummaryData($user, $month, $year)
    {
        list($startDate, $endDate) = $this->calculateCycleDates($user, $month, $year);

        $totalEmployees = \App\Models\Employee::where('user_id', $user->id)->count();

        $records = AttendanceRecord::where('user_id', $user->id)
            ->whereBetween('scan_date', [$startDate->toDateString(), $endDate->toDateString()])
            ->orderBy('employee_code')
            ->orderBy('scan_date')
            ->orderBy('scan_time')
            ->get();

        $grouped = $records->groupBy(function($item) {
            return $item->employee_code . '_' . $item->scan_date;
        });

        $aggregatedRows = [];
        $uniqueEmployeesPresent = [];

        foreach ($grouped as $key => $items) {
            $first = $items->first();
            $last = $items->count() > 1 ? $items->last() : null;

            $uniqueEmployeesPresent[$first->employee_code] = true;

            $hours = '---';
            if ($first && $last) {
                $in = \Carbon\Carbon::parse($first->scan_date . ' ' . $first->scan_time);
                $out = \Carbon\Carbon::parse($last->scan_date . ' ' . $last->scan_time);
                $diff = $in->diff($out);
                $hours = sprintf('%02d:%02d', $diff->h + ($diff->days * 24), $diff->i);
            }

            $aggregatedRows[] = [
                'name' => $first->employee_name,
                'code' => $first->employee_code,
                'date' => $first->scan_date,
                'in'   => $first->scan_time,
                'out'  => $last ? $last->scan_time : '---',
                'hours' => $hours,
                'status' => $last ? 'Present' : 'Single Punch',
            ];
        }

        $presentCount = count($uniqueEmployeesPresent);
        $attendanceRate = $totalEmployees > 0 ? ($presentCount / $totalEmployees) * 100 : 0.0;

        return [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'records' => $aggregatedRows,
            'summary' => [
                'total_employees' => $totalEmployees,
                'present_employees' => $presentCount,
                'absent_employees' => max(0, $totalEmployees - $presentCount),
                'attendance_rate' => $attendanceRate,
                'total_punches' => $records->count(),
            ]
        ];
    }

    public function employeeReport(Request $request, $code)
    {
        $month = $request->query('month', date('m'));
        $year = $request->query('year', date('Y'));

        $data = $this->getEmployeeReportData($request->user(), $code, $month, $year);

        return response()->json([
            'status' => 'success',
            'employee' => [
                'name' => $data['employee']->name,
                'code' => $data['employee']->code,
            ],
            'start_date' => $data['startDate']->toDateString(),
            'end_date' => $data['endDate']->toDateString(),
            'summary' => $data['summary'],
            'ledger' => $data['ledger'],
        ]);
    }

    public function downloadEmployeePdf(Request $request, $code)
    {
        $month = $request->query('month', date('m'));
        $year = $request->query('year', date('Y'));
        $user = $request->user();

        $data = $this->getEmployeeReportData($user, $code, $month, $year);

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('reports.employee_pdf', [
            'user' => $user,
            'employee' => $data['employee'],
            'startDate' => $data['startDate'],
            'endDate' => $data['endDate'],
            'ledger' => $data['ledger'],
            'summary' => $data['summary'],
        ]);

        return $pdf->download("Performance_Report_{$code}_{$year}_{$month}.pdf");
    }

    private function getEmployeeReportData($user, $code, $month, $year)
    {
        $employee = \App\Models\Employee::with('shift')->where('user_id', $user->id)
            ->where('code', $code)
            ->firstOrFail();

        $monthStartDate = $user->month_start_date ?? 1;

        // Calculate dynamic cycle start and end dates
        if ($monthStartDate == 1) {
            $startDate = \Carbon\Carbon::create($year, $month, 1)->startOfDay();
            $endDate = \Carbon\Carbon::create($year, $month, 1)->endOfMonth()->endOfDay();
        } else {
            $startDate = \Carbon\Carbon::create($year, $month, $monthStartDate)->subMonth()->startOfDay();
            $endDate = \Carbon\Carbon::create($year, $month, $monthStartDate)->subDay()->endOfDay();
        }

        // Generate date array
        $dates = [];
        $current = $startDate->copy();
        while ($current->lessThanOrEqualTo($endDate)) {
            $dates[] = $current->toDateString();
            $current->addDay();
        }

        $ledger = [];
        $totalLop = 0.0;
        $totalLate = 0;
        $presentDays = 0;
        $absentDays = 0;

        foreach ($dates as $dateString) {
            $dayRecords = AttendanceRecord::where('user_id', $user->id)
                ->where('employee_code', $code)
                ->where('scan_date', $dateString)
                ->orderBy('scan_time', 'asc')
                ->get();

            $status = \App\Helpers\AttendanceReportHelper::calculateDailyStatus($dateString, $dayRecords, $user);
            $firstPunch = $dayRecords->first() ? $dayRecords->first()->scan_time : '---';
            $lastPunch = $dayRecords->count() > 1 ? $dayRecords->last()->scan_time : '---';

            $lateMin = 0;
            $lop = 0.0;

            if ($status === 'Working') {
                $shiftStart = $employee->shift ? $employee->shift->start_time : '07:30:00';
                $lateMin = \App\Helpers\AttendanceReportHelper::calculateLateMinutes($firstPunch, $shiftStart);
                $lop = \App\Helpers\AttendanceReportHelper::calculateLop($status, $lateMin);
                $presentDays++;
            } else if ($status === 'Absent') {
                $lop = 1.0;
                $absentDays++;
            }

            $totalLop += $lop;
            $totalLate += $lateMin;

            $ledger[] = [
                'date' => $dateString,
                'status' => $status,
                'in' => $firstPunch,
                'out' => $lastPunch,
                'late_min' => $lateMin,
                'lop' => $lop,
            ];
        }

        return [
            'employee' => $employee,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'ledger' => $ledger,
            'summary' => [
                'total_days' => count($dates),
                'present_days' => $presentDays,
                'absent_days' => $absentDays,
                'late_minutes' => $totalLate,
                'total_lop' => $totalLop,
            ]
        ];
    }
}
