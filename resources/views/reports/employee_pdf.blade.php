<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Employee Performance Summary</title>
    <style>
        @page {
            size: A4 portrait;
            margin: 15px 20px;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333333;
            font-size: 8px;
            line-height: 1.25;
            margin: 0;
            padding: 0;
        }
        .header {
            margin-bottom: 8px;
            border-bottom: 1px dashed #C5CAE9;
            padding-bottom: 4px;
        }
        .header table {
            width: 100%;
            border-collapse: collapse;
        }
        .header td {
            vertical-align: middle;
            border: none;
        }
        .logo-text-title {
            font-size: 15px;
            font-weight: bold;
            color: #1A237E;
            margin: 0;
            text-transform: capitalize;
            letter-spacing: 0.5px;
        }
        .logo-text-subtitle {
            font-size: 8px;
            font-weight: bold;
            color: #7986CB;
            letter-spacing: 1px;
            margin-top: 2px;
            text-transform: uppercase;
        }
        .header-logo {
            width: 32px;
            height: 32px;
            border: 1px solid #CCCCCC;
            text-align: center;
            vertical-align: middle;
            font-size: 18px;
            color: #CCCCCC;
        }
        .profile-section {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            border: 1px solid #E0E0E0;
            border-radius: 4px;
            background-color: #FAFAFA;
        }
        .profile-section td {
            padding: 5px 10px;
            width: 33.33%;
            border-right: 1px solid #E0E0E0;
            vertical-align: top;
        }
        .profile-section td:last-child {
            border-right: none;
        }
        .profile-label {
            font-size: 7px;
            color: #9E9E9E;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }
        .profile-value {
            font-size: 10px;
            font-weight: bold;
            color: #212121;
        }
        .profile-subtext {
            font-size: 7.5px;
            color: #616161;
            margin-top: 1px;
        }
        .ledger-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .ledger-table th {
            background-color: #F5F7FA;
            color: #5C6BC0;
            font-weight: bold;
            text-align: left;
            padding: 4px 5px;
            font-size: 7.5px;
            text-transform: uppercase;
            border-top: 1px solid #E0E0E0;
            border-bottom: 1px solid #C5CAE9;
            letter-spacing: 0.5px;
        }
        .ledger-table td {
            padding: 3.5px 5px;
            border-bottom: 1px solid #EEEEEE;
            vertical-align: middle;
            font-size: 7.5px;
        }
        .ledger-table tr:nth-child(even) td {
            background-color: #FAFAFA;
        }
        .status-working {
            font-weight: bold;
            color: #424242;
        }
        .status-off {
            color: #9E9E9E;
        }
        .status-holiday {
            color: #7986CB;
            font-weight: 500;
        }
        .punch-badge {
            background-color: #E8EAF6;
            color: #3F51B5;
            padding: 1px 4px;
            border-radius: 2px;
            font-size: 7.5px;
            font-family: monospace;
            font-weight: bold;
            border: 1px solid #C5CAE9;
            margin-right: 3px;
        }
        .late-text {
            color: #E53935;
            font-weight: bold;
        }
        .kpi-row {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .kpi-row td {
            width: 11.11%;
            padding: 0 3px;
            border: none;
        }
        .kpi-card {
            border: 1px solid #E0E0E0;
            border-radius: 4px;
            background-color: #FFFFFF;
            padding: 4px 2px;
            text-align: center;
        }
        .kpi-label {
            font-size: 6px;
            color: #757575;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 2px;
            height: 8px;
        }
        .kpi-value {
            font-size: 10px;
            font-weight: bold;
            color: #212121;
        }
        .kpi-accent {
            height: 2px;
            margin: -4px -2px 3px -2px;
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
        }
        .accent-gray { background-color: #9E9E9E; }
        .accent-green { background-color: #4CAF50; }
        .accent-red { background-color: #F44336; }
        .accent-orange { background-color: #FF9800; }
        .accent-purple { background-color: #9C27B0; }
        .accent-blue { background-color: #2196F3; }
        .accent-teal { background-color: #009688; }
        .accent-indigo { background-color: #3F51B5; }
        
        .signatures {
            margin-top: 12px;
            border-top: 1px dashed #E0E0E0;
            padding-top: 8px;
        }
        .signatures table {
            width: 100%;
            border-collapse: collapse;
        }
        .signatures td {
            width: 50%;
            border: none;
        }
        .sig-line {
            width: 140px;
            border-bottom: 1px solid #9E9E9E;
            margin-bottom: 3px;
        }
        .sig-title {
            font-size: 7.5px;
            color: #757575;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>

    <div class="header">
        <table>
            <tr>
                <td>
                    <div class="logo-text-title">{{ $user->name }}</div>
                    <div class="logo-text-subtitle">Monthly Attendance & Performance Summary</div>
                </td>
                <td style="text-align: right; width: 50px;">
                    <div class="header-logo">&#9744;</div>
                </td>
            </tr>
        </table>
    </div>

    <table class="profile-section">
        <tr>
            <td>
                <div class="profile-label">Employee Profile</div>
                <div class="profile-value">{{ $employee->name }}</div>
                <div class="profile-subtext">#{{ $employee->code }} | Staff</div>
            </td>
            <td>
                <div class="profile-label">Reporting Period</div>
                <div class="profile-value">{{ $startDate->format('d M Y') }} - {{ $endDate->format('d M Y') }}</div>
                <div class="profile-subtext">(Generated on: {{ now()->format('d-m-Y H:i') }})</div>
            </td>
            <td>
                <div class="profile-label">Working Shift</div>
                <div class="profile-value">Standard</div>
                <div class="profile-subtext">Timing: 07:30 - 16:30</div>
            </td>
        </tr>
    </table>

    <table class="ledger-table">
        <thead>
            <tr>
                <th style="width: 20%;">Date</th>
                <th style="width: 12%;">Status</th>
                <th style="width: 25%;">Punch Sequence</th>
                <th style="width: 10%; text-align: center;">Late</th>
                <th style="width: 10%; text-align: center;">Early</th>
                <th style="width: 10%; text-align: center;">LOP</th>
                <th style="width: 13%;">Approvals & Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ledger as $row)
                <tr>
                    <td style="font-weight: 500;">
                        {{ \Carbon\Carbon::parse($row['date'])->format('d M Y') }}
                        <span style="color: #9E9E9E; font-size: 8px;">({{ \Carbon\Carbon::parse($row['date'])->format('D') }})</span>
                    </td>
                    <td>
                        @if($row['status'] === 'Working')
                            <span class="status-working">Working</span>
                        @elseif($row['status'] === 'Weekoff')
                            <span class="status-off">Weekoff</span>
                        @elseif($row['status'] === 'Holiday')
                            <span class="status-holiday">Holiday</span>
                        @else
                            <span style="color: #E53935; font-weight: bold;">Absent</span>
                        @endif
                    </td>
                    <td>
                        @if($row['in'] !== '---')
                            <span class="punch-badge">{{ substr($row['in'], 0, 5) }}</span>
                        @endif
                        @if($row['out'] !== '---')
                            <span class="punch-badge">{{ substr($row['out'], 0, 5) }}</span>
                        @endif
                    </td>
                    <td style="text-align: center;">
                        @if($row['late_min'] > 0)
                            <span class="late-text">{{ $row['late_min'] }}m</span>
                        @else
                            -
                        @endif
                    </td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center; font-weight: bold; color: {{ $row['lop'] > 0 ? '#E53935' : '#757575' }}">
                        {{ $row['lop'] > 0 ? number_format($row['lop'], 2) : '-' }}
                    </td>
                    <td style="color: #9E9E9E; font-style: italic;">
                        @if($row['status'] === 'Absent')
                            LOP: 1.00
                        @elseif($row['late_min'] > 0)
                            LOP: {{ number_format($row['lop'], 2) }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="kpi-row">
        <tr>
            <td>
                <div class="kpi-card">
                    <div class="kpi-accent accent-gray"></div>
                    <div class="kpi-label">Total Days</div>
                    <div class="kpi-value">{{ $summary['total_days'] }}</div>
                </div>
            </td>
            <td>
                <div class="kpi-card">
                    <div class="kpi-accent accent-green"></div>
                    <div class="kpi-label">Present</div>
                    <div class="kpi-value">{{ $summary['present_days'] }}</div>
                </div>
            </td>
            <td>
                <div class="kpi-card">
                    <div class="kpi-accent accent-red"></div>
                    <div class="kpi-label">Absent</div>
                    <div class="kpi-value">{{ $summary['absent_days'] }}</div>
                </div>
            </td>
            <td>
                <div class="kpi-card">
                    <div class="kpi-accent accent-orange"></div>
                    <div class="kpi-label">Leave</div>
                    <div class="kpi-value">0</div>
                </div>
            </td>
            <td>
                <div class="kpi-card">
                    <div class="kpi-accent accent-purple"></div>
                    <div class="kpi-label">On Duty</div>
                    <div class="kpi-value">0</div>
                </div>
            </td>
            <td>
                <div class="kpi-card">
                    <div class="kpi-accent accent-blue"></div>
                    <div class="kpi-label">Short Lv</div>
                    <div class="kpi-value">0</div>
                </div>
            </td>
            <td>
                <div class="kpi-card">
                    <div class="kpi-accent accent-teal"></div>
                    <div class="kpi-label">Overtime</div>
                    <div class="kpi-value">0h</div>
                </div>
            </td>
            <td>
                <div class="kpi-card">
                    <div class="kpi-accent accent-red"></div>
                    <div class="kpi-label">Late Ad.</div>
                    <div class="kpi-value" style="color: #E53935;">{{ $summary['late_minutes'] }}m</div>
                </div>
            </td>
            <td>
                <div class="kpi-card" style="border-color: #3F51B5; background-color: #E8EAF6;">
                    <div class="kpi-accent accent-indigo"></div>
                    <div class="kpi-label" style="color: #3F51B5;">Total LOP</div>
                    <div class="kpi-value" style="color: #E53935;">{{ number_format($summary['total_lop'], 2) }}</div>
                </div>
            </td>
        </tr>
    </table>

    <div class="signatures">
        <table>
            <tr>
                <td>
                    <div class="sig-line"></div>
                    <div class="sig-title">EMPLOYEE ACKNOWLEDGMENT</div>
                </td>
                <td style="text-align: right;">
                    <div class="sig-line" style="margin-left: auto;"></div>
                    <div class="sig-title" style="text-align: right; padding-right: 40px;">HEAD OF DEPARTMENT / HR</div>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>
