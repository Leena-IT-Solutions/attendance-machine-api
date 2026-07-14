@extends('layouts.landing')

@section('title', 'Attendance Reports & Analysis Sheets | Attendance Machine')
@section('meta_description', 'Extract daily logs, shift analytics, Loss of Pay summaries, and monthly ledgers. Review our automatic reports templates and formats.')

@section('content')
<!-- ===== HERO TITLE SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 pt-16 pb-8 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="text-center space-y-4 max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1 rounded-full text-[11px] font-bold text-violet-700 uppercase tracking-widest">
            Export Center
        </div>
        <h1 class="font-outfit text-4xl sm:text-5xl font-black text-slate-900 leading-tight">
            Comprehensive Roster Analytics <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">& Payroll Reports Catalog</span>
        </h1>
        <p class="text-slate-500 text-sm max-w-xl mx-auto">
            Say goodbye to manual payroll logging. Generate structured daily logs, monthly matrix grids, punctuality sheets, and monthly ledgers in seconds.
        </p>
    </div>
</section>

<!-- ===== REPORT TABS & PREVIEW GRID ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 grid lg:grid-cols-12 gap-8">
    <!-- Left: Report Tab Selectors (Col 4) -->
    <div class="lg:col-span-4 bg-white border border-slate-100 rounded-3xl p-6 shadow-sm h-max space-y-3">
        <h3 class="font-outfit font-black text-slate-800 text-sm pb-2 border-b border-slate-50">Select Report Type</h3>
        
        <div class="flex flex-col gap-1.5">
            <button onclick="switchReportTab('company_matrix')" id="tab-company_matrix" class="w-full text-left px-4 py-3 text-xs font-bold rounded-xl transition-all duration-150 bg-violet-600 text-white shadow-md flex items-center gap-2">
                <i class="fa-solid fa-calendar-days"></i> Company Matrix
            </button>
            <button onclick="switchReportTab('employee_report')" id="tab-employee_report" class="w-full text-left px-4 py-3 text-xs font-bold rounded-xl transition-all duration-150 text-slate-600 hover:bg-slate-50 hover:text-slate-905 flex items-center gap-2">
                <i class="fa-solid fa-address-card"></i> Employee Report
            </button>
            <button onclick="switchReportTab('attendance_report')" id="tab-attendance_report" class="w-full text-left px-4 py-3 text-xs font-bold rounded-xl transition-all duration-150 text-slate-600 hover:bg-slate-50 hover:text-slate-905 flex items-center gap-2">
                <i class="fa-solid fa-clipboard-user"></i> Attendance Report
            </button>
            <button onclick="switchReportTab('late_report')" id="tab-late_report" class="w-full text-left px-4 py-3 text-xs font-bold rounded-xl transition-all duration-150 text-slate-600 hover:bg-slate-50 hover:text-slate-905 flex items-center gap-2">
                <i class="fa-solid fa-clock"></i> Late Report
            </button>
            <button onclick="switchReportTab('lop')" id="tab-lop" class="w-full text-left px-4 py-3 text-xs font-bold rounded-xl transition-all duration-150 text-slate-600 hover:bg-slate-50 hover:text-slate-905 flex items-center gap-2">
                <i class="fa-solid fa-calculator"></i> LOP (Loss of Pay)
            </button>
            <button onclick="switchReportTab('shift_report')" id="tab-shift_report" class="w-full text-left px-4 py-3 text-xs font-bold rounded-xl transition-all duration-150 text-slate-600 hover:bg-slate-50 hover:text-slate-905 flex items-center gap-2">
                <i class="fa-solid fa-business-time"></i> Shift Report
            </button>
            <button onclick="switchReportTab('daily_audit')" id="tab-daily_audit" class="w-full text-left px-4 py-3 text-xs font-bold rounded-xl transition-all duration-150 text-slate-600 hover:bg-slate-50 hover:text-slate-905 flex items-center gap-2">
                <i class="fa-solid fa-clipboard-list"></i> Daily Audit
            </button>
            <button onclick="switchReportTab('monthly_ledger')" id="tab-monthly_ledger" class="w-full text-left px-4 py-3 text-xs font-bold rounded-xl transition-all duration-150 text-slate-600 hover:bg-slate-50 hover:text-slate-905 flex items-center gap-2">
                <i class="fa-solid fa-file-invoice-dollar"></i> Monthly Ledger
            </button>
        </div>
    </div>

    <!-- Right: Report Preview Display (Col 8) -->
    <div class="lg:col-span-8 bg-white border border-slate-100 rounded-3xl p-6 shadow-md space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h3 id="report-title" class="font-outfit font-black text-slate-800 text-lg">Company Matrix Preview</h3>
                <p id="report-desc" class="text-slate-550 text-[11px] mt-0.5">Month-to-date calendar grid tracking attendance status flags (P, A, L, H) across dates.</p>
            </div>
            
            <!-- Download Options -->
            <div class="flex gap-2">
                <button onclick="alert('Downloading sample Excel file...')" class="bg-emerald-600 text-white hover:bg-emerald-700 px-4 py-2.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 shadow-sm">
                    <i class="fa-solid fa-file-excel"></i> Export Excel
                </button>
                <button onclick="alert('Downloading sample PDF file...')" class="bg-rose-600 text-white hover:bg-rose-700 px-4 py-2.5 rounded-xl text-xs font-bold transition-all flex items-center gap-1.5 shadow-sm">
                    <i class="fa-solid fa-file-pdf"></i> Export PDF
                </button>
            </div>
        </div>

        <!-- Dynamic Table Box -->
        <div class="overflow-x-auto border border-slate-100 rounded-2xl">
            <table class="w-full text-left text-xs border-collapse">
                <thead id="report-thead" class="bg-slate-50 text-slate-700 font-bold border-b border-slate-200">
                    <tr>
                        <th class="p-4">Employee Name</th>
                        <th class="p-4 text-center">Jul 1</th>
                        <th class="p-4 text-center">Jul 2</th>
                        <th class="p-4 text-center">Jul 3</th>
                        <th class="p-4 text-center">Jul 4</th>
                        <th class="p-4 text-center">Jul 5</th>
                        <th class="p-4">Summary</th>
                    </tr>
                </thead>
                <tbody id="report-tbody" class="divide-y divide-slate-100 text-slate-600 bg-white">
                    <tr>
                        <td class="p-4 font-bold">John Doe</td>
                        <td class="p-4 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]">P</span></td>
                        <td class="p-4 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]">P</span></td>
                        <td class="p-4 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]">P</span></td>
                        <td class="p-4 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]">P</span></td>
                        <td class="p-4 text-center"><span class="text-slate-400 font-bold">Off</span></td>
                        <td class="p-4 font-medium">4 / 4 Present</td>
                    </tr>
                    <tr>
                        <td class="p-4 font-bold">Jane Smith</td>
                        <td class="p-4 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]">P</span></td>
                        <td class="p-4 text-center"><span class="bg-amber-100 text-amber-700 px-2 py-0.5 rounded font-bold text-[10px]">L</span></td>
                        <td class="p-4 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]">P</span></td>
                        <td class="p-4 text-center"><span class="bg-rose-100 text-rose-700 px-2 py-0.5 rounded font-bold text-[10px]">A</span></td>
                        <td class="p-4 text-center"><span class="text-slate-400 font-bold">Off</span></td>
                        <td class="p-4 font-medium">3 / 4 Present</td>
                    </tr>
                    <tr>
                        <td class="p-4 font-bold">Tony Stark</td>
                        <td class="p-4 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]">P</span></td>
                        <td class="p-4 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]">P</span></td>
                        <td class="p-4 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]">P</span></td>
                        <td class="p-4 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]">P</span></td>
                        <td class="p-4 text-center"><span class="text-slate-400 font-bold">Off</span></td>
                        <td class="p-4 font-medium">4 / 4 Present</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

@section('scripts')
<script>
    const reportsCatalog = {
        company_matrix: {
            title: "Company Matrix Preview",
            desc: "Month-to-date calendar grid tracking attendance status flags (P, A, L, H) across dates.",
            headers: ["Employee Name", "Jul 1", "Jul 2", "Jul 3", "Jul 4", "Jul 5", "Summary"],
            rows: [
                ["John Doe", "<span class='bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]'>P</span>", "<span class='bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]'>P</span>", "<span class='bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]'>P</span>", "<span class='bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]'>P</span>", "<span class='text-slate-400 font-bold'>Off</span>", "4 / 4 Present"],
                ["Jane Smith", "<span class='bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]'>P</span>", "<span class='bg-amber-100 text-amber-700 px-2 py-0.5 rounded font-bold text-[10px]'>L</span>", "<span class='bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]'>P</span>", "<span class='bg-rose-100 text-rose-700 px-2 py-0.5 rounded font-bold text-[10px]'>A</span>", "<span class='text-slate-400 font-bold'>Off</span>", "3 / 4 Present"],
                ["Tony Stark", "<span class='bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]'>P</span>", "<span class='bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]'>P</span>", "<span class='bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]'>P</span>", "<span class='bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold text-[10px]'>P</span>", "<span class='text-slate-400 font-bold'>Off</span>", "4 / 4 Present"]
            ]
        },
        employee_report: {
            title: "Employee Report Preview",
            desc: "Deep dive profile sheet displaying specific worker punch-in history.",
            headers: ["Date", "Scan Time", "GPS Verification", "Accuracy Match", "Status"],
            rows: [
                ["Jul 14, 2026", "08:55 AM", "Verified (HQ)", "99.4% Match", "<span class='bg-emerald-50 text-emerald-700 px-2 py-1 rounded text-[10px] font-bold uppercase'>Present</span>"],
                ["Jul 13, 2026", "08:58 AM", "Verified (HQ)", "99.2% Match", "<span class='bg-emerald-50 text-emerald-700 px-2 py-1 rounded text-[10px] font-bold uppercase'>Present</span>"],
                ["Jul 12, 2026", "09:12 AM", "Verified (HQ)", "99.6% Match", "<span class='bg-amber-50 text-amber-700 px-2 py-1 rounded text-[10px] font-bold uppercase'>Late (12m)</span>"]
            ]
        },
        attendance_report: {
            title: "Attendance Report Preview",
            desc: "General daily logs showing punch-in, punch-out, and status.",
            headers: ["ID", "Employee Name", "Shift Group", "Time In", "Time Out", "Status"],
            rows: [
                ["EMP-101", "John Doe", "General Morning", "08:55 AM", "06:05 PM", "<span class='bg-emerald-50 text-emerald-700 px-2 py-1 rounded text-[10px] font-bold uppercase'>Present</span>"],
                ["EMP-102", "Jane Smith", "General Morning", "09:35 AM", "06:02 PM", "<span class='bg-amber-50 text-amber-700 px-2 py-1 rounded text-[10px] font-bold uppercase'>Late (35m)</span>"],
                ["EMP-103", "Tony Stark", "Overtime Flex", "08:50 AM", "07:30 PM", "<span class='bg-violet-50 text-violet-750 px-2 py-1 rounded text-[10px] font-bold uppercase'>Overtime (1.5h)</span>"]
            ]
        },
        late_report: {
            title: "Late Report Preview",
            desc: "Log highlighting tardy arrivals, exact arrival offsets, and warning logs.",
            headers: ["Date", "Employee", "Assigned Start", "Actual Arrival", "Delay Duration", "LOP Penalty"],
            rows: [
                ["Jul 14, 2026", "Jane Smith", "09:00 AM", "09:35 AM", "35 mins", "<span class='text-rose-600 font-bold'>0.25 LOP</span>"],
                ["Jul 13, 2026", "Robert Downey", "09:00 AM", "09:18 AM", "18 mins", "<span class='text-slate-400'>Buffer (0.0)</span>"],
                ["Jul 12, 2026", "Bruce Banner", "09:00 AM", "09:42 AM", "42 mins", "<span class='text-rose-600 font-bold'>0.50 LOP</span>"]
            ]
        },
        lop: {
            title: "Loss of Pay (LOP) Preview",
            desc: "Deductions list mapping base wage, absences, late marks, and computed net salary.",
            headers: ["Employee Name", "Monthly Base", "Days Present", "Late Instances", "LOP Days", "Payable Amount"],
            rows: [
                ["John Doe", "₹30,000", "26 Days", "0", "<span class='text-emerald-600 font-bold'>0.0 Days</span>", "₹30,000"],
                ["Jane Smith", "₹45,000", "24 Days", "4", "<span class='text-rose-600 font-bold'>1.5 Days</span>", "₹42,750"],
                ["Tony Stark", "₹80,000", "26 Days", "0", "<span class='text-emerald-600 font-bold'>0.0 Days</span>", "₹80,000"]
            ]
        },
        shift_report: {
            title: "Shift Report Preview",
            desc: "Roster logs mapping shift groups, actual hours clocked, and overtime segments.",
            headers: ["Shift Template", "Expected Hours", "Clocked Hours", "Overtime Hours", "Shift Employees"],
            rows: [
                ["General Morning", "8.0 hrs", "8.2 hrs", "0.0 hrs", "32 Staff"],
                ["Night Operations", "9.0 hrs", "9.5 hrs", "<span class='text-violet-650 font-bold'>0.5 hrs</span>", "16 Staff"],
                ["Overtime Flex", "8.0 hrs", "10.5 hrs", "<span class='text-violet-655 font-bold'>2.5 hrs</span>", "4 Staff"]
            ]
        },
        daily_audit: {
            title: "Daily Audit Preview",
            desc: "Chronological log of device punch events, facial matching scores, and geofence locations.",
            headers: ["Timestamp", "Event Trigger", "Device ID", "User/Staff", "GPS Coords", "API Status"],
            rows: [
                ["13:08:24 PM", "Face Punch marked", "Tab-HQ-02", "John Doe", "28.6139, 77.2090", "<span class='text-emerald-600 font-bold'>Sync Success</span>"],
                ["12:55:12 PM", "Profile enrolled", "Mobile-Admin-01", "Thor Odinson", "-", "<span class='text-slate-400'>Pending Upload</span>"],
                ["09:35:04 AM", "Face Punch marked", "Tab-HQ-02", "Jane Smith", "28.6139, 77.2090", "<span class='text-emerald-600 font-bold'>Sync Success</span>"]
            ]
        },
        monthly_ledger: {
            title: "Monthly Ledger Preview",
            desc: "Aggregated summary showing total days payable, monthly overtime, and net payout.",
            headers: ["Month", "Total Base Salary", "Deductions Applied", "Overtime Payout", "Net Dispatched"],
            rows: [
                ["June 2026", "₹8,45,000", "<span class='text-rose-600 font-bold'>-₹18,500</span>", "<span class='text-emerald-650 font-bold'>+₹24,000</span>", "<span class='font-bold'>₹8,50,500</span>"],
                ["May 2026", "₹8,20,000", "<span class='text-rose-650 font-bold'>-₹22,000</span>", "<span class='text-emerald-650 font-bold'>+₹18,500</span>", "<span class='font-bold'>₹8,16,500</span>"],
                ["April 2026", "₹7,90,000", "<span class='text-rose-650 font-bold'>-₹12,400</span>", "<span class='text-emerald-650 font-bold'>+₹32,100</span>", "<span class='font-bold'>₹8,09,700</span>"]
            ]
        }
    };

    function switchReportTab(tabKey) {
        // Toggle Active Button Styles
        const keys = Object.keys(reportsCatalog);
        keys.forEach(k => {
            const btn = document.getElementById(`tab-${k}`);
            if (k === tabKey) {
                btn.className = "w-full text-left px-4 py-3 text-xs font-bold rounded-xl transition-all duration-150 bg-violet-600 text-white shadow-md flex items-center gap-2";
            } else {
                btn.className = "w-full text-left px-4 py-3 text-xs font-bold rounded-xl transition-all duration-150 text-slate-600 hover:bg-slate-50 hover:text-slate-905 flex items-center gap-2";
            }
        });

        const activeReport = reportsCatalog[tabKey];
        document.getElementById('report-title').textContent = activeReport.title;
        document.getElementById('report-desc').textContent = activeReport.desc;

        // Build Table Headers
        const thead = document.getElementById('report-thead');
        let headerHtml = "<tr>";
        activeReport.headers.forEach(h => {
            headerHtml += `<th class="p-4 ${h === 'Jul 1' || h === 'Jul 2' || h === 'Jul 3' || h === 'Jul 4' || h === 'Jul 5' ? 'text-center' : ''}">${h}</th>`;
        });
        headerHtml += "</tr>";
        thead.innerHTML = headerHtml;

        // Build Table Body
        const tbody = document.getElementById('report-tbody');
        let bodyHtml = "";
        activeReport.rows.forEach(r => {
            bodyHtml += "<tr>";
            r.forEach((cell, idx) => {
                const headerName = activeReport.headers[idx];
                const isCenter = headerName === 'Jul 1' || headerName === 'Jul 2' || headerName === 'Jul 3' || headerName === 'Jul 4' || headerName === 'Jul 5';
                const isBold = idx === 0;
                bodyHtml += `<td class="p-4 ${isCenter ? 'text-center' : ''} ${isBold ? 'font-bold text-slate-800' : 'font-medium'}">${cell}</td>`;
            });
            bodyHtml += "</tr>";
        });
        tbody.innerHTML = bodyHtml;
    }
</script>
@endsection
@endsection
