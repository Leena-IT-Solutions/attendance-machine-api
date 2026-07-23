@extends('layouts.landing')

@section('title', 'Attendance Reports & Analysis Sheets | Attendance Machine')
@section('meta_description', 'Extract daily logs, shift analytics, and Loss of Pay (LOP) summaries. Review our automatic reports engine layout and formats.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Reports Module
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Automated Attendance Logs <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">& Payroll Reports Generator</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Say goodbye to manual adjustments. The system monitors arrival timestamps, maps shift rules, and builds detailed check-in matrices.
    </p>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-file-invoice"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">One-Tap Exports</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Export all workspace attendance data to formatted Excel or PDF files instantly. Send files directly to your accountants.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-calculator"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Calculated LOP Fields</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Computes Loss of Pay (LOP) flags using assigned late templates, removing manual timecard deductions.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-chart-line"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Real-time Statistics</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Access dashboard graphs tracking active workers, late checks, shift hours, and weekly attendance patterns.
            </p>
        </div>
    </div>
</section>

<!-- ===== MODULE DETAILS PREVIEW ===== -->
<section class="max-w-4xl mx-auto px-6 py-16 text-center space-y-6">
    <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Accurate Sheets Formatted for Audits</h2>
    <p class="text-slate-600 text-sm leading-relaxed max-w-2xl mx-auto">
        Run custom queries by date ranges or department groups. The report documents precise check times, lunch durations, shift classifications, and matching scores.
    </p>
    <div class="inline-block bg-violet-50 border border-violet-100 rounded-2xl p-6 max-w-md mx-auto text-left mt-4">
        <h4 class="font-outfit text-xs font-bold text-violet-800 uppercase tracking-wider flex items-center gap-1.5">
            <i class="fa-solid fa-chart-simple text-violet-600"></i> Department Metrics Summary
        </h4>
        <p class="text-slate-600 text-[11px] leading-relaxed mt-2">Instantly identify absenteeism spikes and track operational productivity benchmarks across multiple branches.</p>
    </div>
</section>

<!-- ===== MOCK SCREENSHOT ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 space-y-8">
    <div class="text-center space-y-2 max-w-xl mx-auto">
        <h3 class="font-outfit text-2xl font-black text-slate-900">Custom Reports Console Preview</h3>
        <p class="text-slate-500 text-xs">Run date range queries and download formatted sheets instantly.</p>
    </div>

    <!-- CSS Mock Console -->
    <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-md max-w-4xl mx-auto space-y-6">
        <div class="flex justify-between items-center pb-4 border-b border-slate-100 gap-4 flex-wrap">
            <span class="font-outfit text-xs font-extrabold text-slate-800">Monthly Attendance Report</span>
            <div class="flex items-center gap-2">
                <span class="text-[10px] text-slate-500 bg-slate-100 border px-3 py-1 rounded">Range: Jul 01 - Jul 14</span>
                <button onclick="alert('Exporting PDF...')" class="bg-rose-600 text-white text-[10px] px-3 py-1 rounded font-bold"><i class="fa-solid fa-file-pdf mr-1"></i> Export PDF</button>
            </div>
        </div>
        
        <div class="grid grid-cols-3 gap-4 text-center border-b border-slate-100 pb-4">
            <div class="bg-slate-50 p-3 rounded-xl border">
                <h4 class="font-outfit text-slate-800 text-lg font-black">94%</h4>
                <p class="text-[9px] text-slate-500 font-bold uppercase mt-1">Present Rate</p>
            </div>
            <div class="bg-slate-50 p-3 rounded-xl border">
                <h4 class="font-outfit text-slate-800 text-lg font-black">2.5 Days</h4>
                <p class="text-[9px] text-slate-500 font-bold uppercase mt-1">Total LOP Deducted</p>
            </div>
            <div class="bg-slate-50 p-3 rounded-xl border">
                <h4 class="font-outfit text-slate-800 text-lg font-black">3 Instances</h4>
                <p class="text-[9px] text-slate-500 font-bold uppercase mt-1">Late Arrivals</p>
            </div>
        </div>
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
