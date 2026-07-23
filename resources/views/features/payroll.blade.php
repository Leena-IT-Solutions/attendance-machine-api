@extends('layouts.landing')

@section('title', 'Automated Loss of Pay (LOP) & Salary Processing | Attendance Machine')
@section('meta_description', 'Configure automated Loss of Pay (LOP) deductions, track late metrics, map shifts, and export payroll-ready tables instantly.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Deduction Engine
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Automated LOP Deductions <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">& Salary Calculations Engine</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Let software calculate salary deductions based on late arrivals, shifts missed, and early leaves. Streamline accountant operations.
    </p>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-scale-balanced"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Custom Late Tolerances</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Define grace window margins (e.g. 15 minutes). Set rules to apply 0.25 LOP for consecutive late occurrences.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-business-time"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Half-Day Transitions</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Applies half-day LOP allocations if total shift check-in duration is lower than defined operational thresholds.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-file-invoice-dollar"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Payroll Sheets Integration</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Deductions map directly into standard billing columns. Export files to integrate with Tally or payroll ERP setups.
            </p>
        </div>
    </div>
</section>

<!-- ===== MODULE DETAILS PREVIEW ===== -->
<section class="max-w-4xl mx-auto px-6 py-16 text-center space-y-6">
    <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Configurable Rules for Every Work Contract</h2>
    <p class="text-slate-600 text-sm leading-relaxed max-w-2xl mx-auto">
        Every business has different compliance guides. Map general, rotational, factory night shifts, or casual daily wages, defining custom deduction thresholds independently.
    </p>
    <div class="inline-block bg-violet-50 border border-violet-100 rounded-2xl p-6 max-w-md mx-auto text-left mt-4">
        <h4 class="font-outfit text-xs font-bold text-violet-800 uppercase tracking-wider flex items-center gap-1.5">
            <i class="fa-solid fa-file-invoice-dollar text-violet-600"></i> Auto Deductions Logging
        </h4>
        <p class="text-slate-600 text-[11px] leading-relaxed mt-2">All adjustments are tracked and logged inside employee profiles, letting staff review logs before salary dispatch.</p>
    </div>
</section>

<!-- ===== MOCK SCREENSHOT ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 space-y-8">
    <div class="text-center space-y-2 max-w-xl mx-auto">
        <h3 class="font-outfit text-2xl font-black text-slate-900">LOP Calculator Roster</h3>
        <p class="text-slate-550 text-xs">Review how shift exceptions translate directly to Loss of Pay days.</p>
    </div>

    <!-- CSS Mock Console -->
    <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-md max-w-4xl mx-auto overflow-x-auto">
        <table class="w-full text-left text-xs border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-700 font-bold border-b border-slate-200">
                    <th class="p-3">Employee</th>
                    <th class="p-3">Base Days</th>
                    <th class="p-3">Late Flags</th>
                    <th class="p-3">Unpaid Absences</th>
                    <th class="p-3">LOP Days</th>
                    <th class="p-3">Payable Days</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white text-slate-650">
                <tr>
                    <td class="p-3 font-bold">John Doe</td>
                    <td class="p-3 font-mono">31 Days</td>
                    <td class="p-3 font-mono text-slate-400">0</td>
                    <td class="p-3 font-mono text-slate-400">0</td>
                    <td class="p-3 font-mono font-bold text-emerald-600">0.0</td>
                    <td class="p-3 font-mono font-bold">31.0</td>
                </tr>
                <tr>
                    <td class="p-3 font-bold">Jane Smith</td>
                    <td class="p-3 font-mono">31 Days</td>
                    <td class="p-3 font-mono text-amber-600">3 (Deduct 0.5)</td>
                    <td class="p-3 font-mono text-rose-600">1 (Deduct 1.0)</td>
                    <td class="p-3 font-mono font-bold text-rose-600">1.5</td>
                    <td class="p-3 font-mono font-bold">29.5</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>


<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Ready to upgrade your team check-ins?</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Download the Attendance Machine application on your mobile terminal.</p>
        <div class="flex flex-wrap justify-center items-center gap-4 pt-2">
            <a href="https://play.google.com/store/apps/details?id=in.leenaitsolutions.attendance.machine&hl=en_IN" target="_blank" rel="noopener" class="download-badge bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300">
                <i class="fa-brands fa-google-play text-2xl text-violet-500"></i>
                <div class="text-left">
                    <span class="text-slate-400 block text-[9px] leading-tight">GET IT ON</span>
                    <strong class="text-white text-xs">Google Play</strong>
                </div>
            </a>
            <a href="https://apps.apple.com/in/app/attendance-machine/id6773431736" target="_blank" rel="noopener" class="download-badge bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300">
                <i class="fa-brands fa-apple text-2xl text-white"></i>
                <div class="text-left">
                    <span class="text-slate-400 block text-[9px] leading-tight">DOWNLOAD ON THE</span>
                    <strong class="text-white text-xs">App Store</strong>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection
