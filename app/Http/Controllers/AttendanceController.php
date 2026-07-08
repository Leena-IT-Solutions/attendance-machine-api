<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'employee_code' => 'required|string',
            'employee_name' => 'required|string',
            'scan_date' => 'required|date',
            'scan_time' => 'required'
        ]);

        $userId = Auth::id();
        $code = $request->employee_code;
        $date = $request->scan_date;

        $existingRecords = AttendanceRecord::where('user_id', $userId)
            ->where('employee_code', $code)
            ->where('scan_date', $date)
            ->orderBy('id', 'asc')
            ->get();

        if ($existingRecords->count() < 2) {
            AttendanceRecord::create([
                'user_id' => $userId,
                'employee_code' => $code,
                'employee_name' => $request->employee_name,
                'scan_date' => $date,
                'scan_time' => $request->scan_time
            ]);
        } else {
            $existingRecords->last()->update([
                'scan_time' => $request->scan_time
            ]);
        }

        return response()->json(['status' => 'success']);
    }

    public function download(Request $request)
    {
        $month = $request->query('month', date('m'));
        $year = $request->query('year', date('Y'));
        
        $fileName = "Attendance_Report_{$year}_{$month}.xlsx";
        
        return \Maatwebsite\Excel\Facades\Excel::download(
            new \App\Exports\AttendanceExport(Auth::id(), $month, $year), 
            $fileName
        );
    }
}
}
