@extends('layouts.landing')

@section('title', 'Employee Performance & Attendance Analytics | Attendance Machine')
@section('meta_description', 'Track staff punctuality ratings, verify average logged shift hours, monitor overtime parameters, and optimize operational performance.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Analytics Module
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Track Employee Attendance <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">& Punctuality Performance Analytics</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Understand team attendance trends. Review punctuality indicators, overtime hours, and check-in consistency dashboards.
    </p>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-star"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Punctuality Score Card</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Assign percentage ratings (e.g. 98%) indicating arrival consistency. Instantly recognize top-performing employees.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-business-time"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Overtime Accumulations</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Tracks logged work hours beyond standard shift durations, computing custom overtime multipliers for payroll.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-triangle-exclamation"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Early Leaves Alerts</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Flags instances when workers check out prior to the shift end times, highlighting patterns in scheduling consistency.
            </p>
        </div>
    </div>
</section>

<!-- ===== MODULE DETAILS PREVIEW ===== -->
<section class="max-w-4xl mx-auto px-6 py-16 text-center space-y-6">
    <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Translate Roster Data Into Workplace Performance</h2>
    <p class="text-slate-600 text-sm leading-relaxed max-w-2xl mx-auto">
        Punctuality analytics display statistics indicating average late durations, absence patterns, and team comparison scores.
    </p>
    <div class="inline-block bg-violet-50 border border-violet-100 rounded-2xl p-6 max-w-md mx-auto text-left mt-4">
        <h4 class="font-outfit text-xs font-bold text-violet-800 uppercase tracking-wider flex items-center gap-1.5">
            <i class="fa-solid fa-chart-line text-violet-600"></i> Visual Schedules Heatmaps
        </h4>
        <p class="text-slate-600 text-[11px] leading-relaxed mt-2">Presents timeline logs to trace check-in overlaps and lunch break durations across teams.</p>
    </div>
</section>

<!-- ===== MOCK SCREENSHOT ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 space-y-8">
    <div class="text-center space-y-2 max-w-xl mx-auto">
        <h3 class="font-outfit text-2xl font-black text-slate-900">Performance Card Console</h3>
        <p class="text-slate-550 text-xs">A snapshot of punctuality logs inside employee dashboard summaries.</p>
    </div>

    <!-- CSS Mock Console -->
    <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-md max-w-2xl mx-auto space-y-6">
        <div class="flex justify-between items-center pb-4 border-b border-slate-100 gap-4 flex-wrap">
            <span class="font-outfit text-xs font-extrabold text-slate-800">Robert Downey • Performance Card</span>
            <span class="bg-emerald-50 text-emerald-700 text-[10px] font-bold px-2 py-0.5 rounded">RATING: EXCELLENT</span>
        </div>

        <div class="grid grid-cols-3 gap-4 text-center">
            <div class="bg-slate-50 p-4 rounded-xl border">
                <h4 class="font-outfit text-slate-800 text-lg font-black">98.2%</h4>
                <p class="text-[9px] text-slate-500 font-bold uppercase mt-1">Punctuality Score</p>
            </div>
            <div class="bg-slate-50 p-4 rounded-xl border">
                <h4 class="font-outfit text-slate-800 text-lg font-black">8.4 Hours</h4>
                <p class="text-[9px] text-slate-500 font-bold uppercase mt-1">Average Shift Hours</p>
            </div>
            <div class="bg-slate-50 p-4 rounded-xl border">
                <h4 class="font-outfit text-slate-800 text-lg font-black">12.5 Hours</h4>
                <p class="text-[9px] text-slate-500 font-bold uppercase mt-1">Overtime Logged</p>
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
