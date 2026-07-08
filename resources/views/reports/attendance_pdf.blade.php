<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>All Employee Attendance Matrix</title>
    <style>
        @page {
            size: A3 landscape;
            margin: 15px 20px;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #2C3E50;
            font-size: 7.5px;
            line-height: 1.2;
            margin: 0;
            padding: 0;
        }
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
            border-bottom: 2px solid #3F51B5;
            padding-bottom: 6px;
        }
        .header-table td {
            vertical-align: middle;
            border: none;
            padding: 0;
        }
        .header-title {
            font-size: 18px;
            font-weight: bold;
            color: #1A237E;
        }
        .header-subtitle {
            font-size: 10px;
            color: #555;
            margin-top: 3px;
        }
        .meta-text {
            text-align: right;
            font-size: 8px;
            color: #555;
            line-height: 1.3;
        }
        
        .matrix-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-bottom: 15px;
        }
        .matrix-table th {
            background-color: #3F51B5;
            color: #FFFFFF;
            font-weight: bold;
            text-align: center;
            border: 1px solid #C5CAE9;
            padding: 5px 2px;
            font-size: 8px;
            text-transform: uppercase;
        }
        .matrix-table td {
            border: 1px solid #D1D5DB;
            text-align: center;
            vertical-align: middle;
            padding: 4px 1px;
            word-wrap: break-word;
        }
        .emp-cell {
            text-align: left !important;
            padding-left: 5px !important;
            background-color: #F9FAFB;
        }
        .emp-name {
            font-size: 7.5px;
            font-weight: bold;
            color: #111827;
            display: block;
        }
        .emp-code {
            font-size: 6px;
            color: #6B7280;
            margin-top: 1px;
        }
        
        /* Status styles */
        .status-working {
            background-color: #FFFFFF;
        }
        .status-absent {
            background-color: #FEE2E2;
            color: #991B1B;
        }
        .status-holiday {
            background-color: #FEF3C7;
            color: #92400E;
        }
        .status-weekoff {
            background-color: #F3F4F6;
            color: #4B5563;
        }
        
        .cell-status-text {
            font-weight: bold;
            font-size: 6.5px;
        }
        .status-holiday .cell-status-text {
            font-style: italic;
        }
        
        .cell-punches {
            color: #2563EB;
            font-family: monospace;
            font-size: 6px;
            margin-top: 1px;
        }
        .cell-late {
            color: #DC2626;
            font-weight: bold;
            font-size: 5.5px;
            margin-top: 1px;
        }
        .cell-lop {
            color: #DC2626;
            font-weight: 500;
            font-size: 5.5px;
        }
        
        .summary-cell-lop {
            font-weight: bold;
            color: #1D4ED8;
            font-size: 8px;
            background-color: #EFF6FF;
        }
        .summary-cell-late {
            font-weight: bold;
            color: #B91C1C;
            font-size: 8px;
            background-color: #FEF2F2;
        }
        
        /* Footer & Legands */
        .footer-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        .footer-table td {
            width: 50%;
            vertical-align: bottom;
            border: none;
            padding: 0;
        }
        .signature-line {
            width: 180px;
            border-bottom: 1px solid #4B5563;
            margin-bottom: 4px;
        }
        .signature-title {
            font-size: 8px;
            color: #4B5563;
            font-weight: bold;
        }
        
        .legend-container {
            margin-top: 10px;
            border: 1px dashed #D1D5DB;
            padding: 6px 10px;
            background-color: #F9FAFB;
            border-radius: 4px;
        }
        .legend-title {
            font-weight: bold;
            color: #374151;
            margin-bottom: 4px;
            font-size: 7.5px;
        }
        .legend-item {
            display: inline-block;
            margin-right: 15px;
            font-size: 7px;
        }
        .legend-box {
            display: inline-block;
            width: 8px;
            height: 8px;
            vertical-align: middle;
            margin-right: 4px;
            border: 1px solid #D1D5DB;
        }
    </style>
</head>
<body>

    @php
        $totalDays = count($dates);
        $empWidth = 8.5; // percentage for employee name
        $summaryWidth = 4.5; // percentage for summaries
        $dayWidth = (100 - $empWidth - ($summaryWidth * 2)) / $totalDays; // individual day column percentage
    @endphp

    <table class="header-table">
        <tr>
            <td>
                <div class="header-title">{{ $user->name }}</div>
                <div class="header-subtitle">ALL EMPLOYEE ATTENDANCE & LOSS OF PAY (LOP) MATRIX</div>
            </td>
            <td class="meta-text">
                <strong>Reporting Period:</strong> {{ \Carbon\Carbon::parse($startDate)->format('d M Y') }} - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}<br>
                <strong>Shift Timing:</strong> Standard (07:30 AM Shift Start)<br>
                <strong>Generated On:</strong> {{ now()->format('d M Y, h:i A') }}
            </td>
        </tr>
    </table>

    <table class="matrix-table">
        <thead>
            <tr>
                <th style="width: {{ $empWidth }}%; text-align: left; padding-left: 5px;">Employee Details</th>
                @foreach($dates as $dateString)
                    <th style="width: {{ $dayWidth }}%;">{{ \Carbon\Carbon::parse($dateString)->format('d') }}</th>
                @endforeach
                <th style="width: {{ $summaryWidth }}%;">Total LOP</th>
                <th style="width: {{ $summaryWidth }}%;">Total Late</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matrix as $row)
                <tr>
                    <td class="emp-cell">
                        <span class="emp-name">{{ $row['name'] }}</span>
                        <span class="emp-code">#{{ $row['code'] }}</span>
                    </td>
                    @foreach($dates as $dateString)
                        @php
                            $day = $row['days'][$dateString];
                            $statusClass = '';
                            if ($day['status'] === 'Working') {
                                $statusClass = 'status-working';
                            } elseif ($day['status'] === 'Absent') {
                                $statusClass = 'status-absent';
                            } elseif ($day['status'] === 'Holiday') {
                                $statusClass = 'status-holiday';
                            } elseif ($day['status'] === 'Weekoff') {
                                $statusClass = 'status-weekoff';
                            }
                        @endphp
                        <td class="{{ $statusClass }}">
                            @if($day['status'] === 'Working')
                                <span class="cell-status-text">Working</span>
                                @if($day['in'])
                                    <div class="cell-punches">{{ $day['in'] }}<br>{{ $day['out'] ?: '---' }}</div>
                                @endif
                                @if($day['late'] > 0)
                                    <div class="cell-late">L: {{ $day['late'] }}m</div>
                                    <div class="cell-lop">LOP: {{ number_format($day['lop'], 2) }}</div>
                                @endif
                            @elseif($day['status'] === 'Absent')
                                <span class="cell-status-text">Absent</span>
                                <div class="cell-lop" style="margin-top: 1px; font-weight: bold;">LOP: 1.00</div>
                            @elseif($day['status'] === 'Holiday')
                                <span class="cell-status-text">Holiday</span>
                            @elseif($day['status'] === 'Weekoff')
                                <span class="cell-status-text">Weekoff</span>
                            @endif
                        </td>
                    @endforeach
                    <td class="summary-cell-lop">{{ $row['total_lop'] }}</td>
                    <td class="summary-cell-late">{{ $row['total_late'] }}m</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="legend-container">
        <div class="legend-title">LEGEND & STATUS SUMMARY</div>
        <div>
            <div class="legend-item">
                <span class="legend-box" style="background-color: #FFFFFF;"></span>
                <strong>Working:</strong> Present with active punches. Late punches attract LOP (late minutes &times; 0.0025).
            </div>
            <div class="legend-item">
                <span class="legend-box" style="background-color: #FEE2E2; border-color: #FCA5A5;"></span>
                <strong>Absent:</strong> Full day LOP (1.00 deduction applies).
            </div>
            <div class="legend-item">
                <span class="legend-box" style="background-color: #FEF3C7; border-color: #FDE68A;"></span>
                <strong>Holiday:</strong> Declared National/State Holiday (0.00 LOP).
            </div>
            <div class="legend-item">
                <span class="legend-box" style="background-color: #F3F4F6; border-color: #E5E7EB;"></span>
                <strong>Weekoff:</strong> Weekly scheduled off day (0.00 LOP).
            </div>
        </div>
    </div>

    <table class="footer-table">
        <tr>
            <td>
                <div class="signature-line"></div>
                <div class="signature-title">Prepared By (Operator)</div>
            </td>
            <td style="text-align: right;">
                <div class="signature-line" style="margin-left: auto;"></div>
                <div class="signature-title" style="padding-right: 20px;">Authorized Signatory (HR / HOD)</div>
            </td>
        </tr>
    </table>

</body>
</html>
