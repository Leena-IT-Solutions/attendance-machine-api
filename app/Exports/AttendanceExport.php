<?php

namespace App\Exports;

use App\Models\AttendanceRecord;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Collection;

class AttendanceExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $userId;
    protected $month;
    protected $year;

    public function __construct($userId, $month = null, $year = null)
    {
        $this->userId = $userId;
        $this->month = $month ?: date('m');
        $this->year = $year ?: date('Y');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = \App\Models\User::find($this->userId);
        $monthStartDate = $user->month_start_date ?? 1;

        // Calculate dynamic cycle start and end dates
        if ($monthStartDate == 1) {
            $startDate = \Carbon\Carbon::create($this->year, $this->month, 1)->startOfDay();
            $endDate = \Carbon\Carbon::create($this->year, $this->month, 1)->endOfMonth()->endOfDay();
        } else {
            $startDate = \Carbon\Carbon::create($this->year, $this->month, $monthStartDate)->subMonth()->startOfDay();
            $endDate = \Carbon\Carbon::create($this->year, $this->month, $monthStartDate)->subDay()->endOfDay();
        }

        // Generate date array
        $dates = [];
        $current = $startDate->copy();
        while ($current->lessThanOrEqualTo($endDate)) {
            $dates[] = $current->toDateString();
            $current->addDay();
        }

        $employees = \App\Models\Employee::where('user_id', $this->userId)->orderBy('name')->get();
        $finalData = new Collection();

        foreach ($employees as $employee) {
            $row = [
                'name' => $employee->name,
                'code' => $employee->code,
            ];

            $totalLop = 0.0;
            $totalLate = 0;

            foreach ($dates as $dateString) {
                // Fetch attendance records for this employee on this date
                $dayRecords = AttendanceRecord::where('user_id', $this->userId)
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
                    $lateMin = \App\Helpers\AttendanceReportHelper::calculateLateMinutes($firstPunch);
                    $lop = \App\Helpers\AttendanceReportHelper::calculateLop($status, $lateMin);
                } else if ($status === 'Absent') {
                    $lop = 1.0;
                }

                $totalLop += $lop;
                $totalLate += $lateMin;

                // Format cell contents
                if ($status === 'Working') {
                    $cellText = "Working\n" . substr($firstPunch, 0, 5) . "  " . ($lastPunch !== '---' ? substr($lastPunch, 0, 5) : '---');
                    if ($lateMin > 0) {
                        $cellText .= "\nL: {$lateMin}m\nLOP: " . number_format($lop, 2);
                    }
                } else if ($status === 'Absent') {
                    $cellText = "Absent\nLOP: 1.00";
                } else {
                    $cellText = $status;
                }

                $row[$dateString] = $cellText;
            }

            $row['total_lop'] = number_format($totalLop, 2);
            $row['total_late'] = $totalLate . 'm';

            $finalData->push($row);
        }

        return $finalData;
    }

    public function headings(): array
    {
        $user = \App\Models\User::find($this->userId);
        $monthStartDate = $user->month_start_date ?? 1;

        if ($monthStartDate == 1) {
            $startDate = \Carbon\Carbon::create($this->year, $this->month, 1)->startOfDay();
            $endDate = \Carbon\Carbon::create($this->year, $this->month, 1)->endOfMonth()->endOfDay();
        } else {
            $startDate = \Carbon\Carbon::create($this->year, $this->month, $monthStartDate)->subMonth()->startOfDay();
            $endDate = \Carbon\Carbon::create($this->year, $this->month, $monthStartDate)->subDay()->endOfDay();
        }

        $headers = ['Employee Name', 'Code'];
        $current = $startDate->copy();
        while ($current->lessThanOrEqualTo($endDate)) {
            $headers[] = $current->format('d');
            $current->addDay();
        }

        $headers[] = 'Total LOP';
        $headers[] = 'Total Late Min';

        return $headers;
    }

    public function map($row): array
    {
        return array_values($row);
    }

    public function styles(Worksheet $sheet)
    {
        // Enable WrapText for wrap formatting and set alignments
        $sheet->getStyle($sheet->calculateWorksheetDimension())->getAlignment()->setWrapText(true);
        $sheet->getStyle($sheet->calculateWorksheetDimension())->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle($sheet->calculateWorksheetDimension())->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        // Left align Employee Name and Code
        $sheet->getStyle('A:B')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

        return [
            // Header style: Bold font, white text, Indigo background
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '3F51B5']
                ],
            ],
        ];
    }
}
