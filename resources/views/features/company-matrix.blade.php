@extends('layouts.landing')

@section('title', 'Company Attendance Matrix Grid | Attendance Machine')
@section('meta_description', 'Track work timelines across teams with our monthly calendar matrix grid. Monitor present rates, leaves, and shift summaries at a glance.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Overview Module
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Complete Company Attendance Matrix <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">& Calendar Roster Grid</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Monitor worker check-ins day-by-day in a calendar grid format. Compare departments and identify schedule adjustments instantly.
    </p>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-calendar-days"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Calendar Grid Visualization</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Presents check-ins across the calendar month, displaying present, absent, late, or half-day indicators.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-filter"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Advanced Filter Options</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Filter matrices by branch offices, specific departments, active shift templates, or worker categories.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-circle-down"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Export Raw Matrix Data</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Download high-fidelity Excel grid spreadsheets of your monthly matrix, pre-formatted for import into other HR systems.
            </p>
        </div>
    </div>
</section>

<!-- ===== MODULE DETAILS PREVIEW ===== -->
<section class="max-w-4xl mx-auto px-6 py-16 text-center space-y-6">
    <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Visual Management for Dynamic Workforces</h2>
    <p class="text-slate-600 text-sm leading-relaxed max-w-2xl mx-auto">
        The grid interface displays color-coded indicators, highlighting late checks, missing logs, or overtime shifts, allowing operational managers to diagnose schedule errors in seconds.
    </p>
    <div class="inline-block bg-violet-50 border border-violet-100 rounded-2xl p-6 max-w-md mx-auto text-left mt-4">
        <h4 class="font-outfit text-xs font-bold text-violet-800 uppercase tracking-wider flex items-center gap-1.5">
            <i class="fa-solid fa-chart-line text-violet-600"></i> Department Metrics Drill-down
        </h4>
        <p class="text-slate-600 text-[11px] leading-relaxed mt-2">Select teams or branches to overlay attendance records and quickly identify patterns in team attendance.</p>
    </div>
</section>

<!-- ===== MOCK SCREENSHOT ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 space-y-8">
    <div class="text-center space-y-2 max-w-xl mx-auto">
        <h3 class="font-outfit text-2xl font-black text-slate-900">Calendar Matrix Grid Preview</h3>
        <p class="text-slate-550 text-xs">Review how check-in metrics map to color-coded daily grids.</p>
    </div>

    <!-- CSS Mock Console -->
    <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-md max-w-4xl mx-auto overflow-x-auto">
        <table class="w-full text-left text-xs border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-700 font-bold border-b border-slate-200">
                    <th class="p-3">Staff Name</th>
                    <th class="p-3 text-center">Jul 01</th>
                    <th class="p-3 text-center">Jul 02</th>
                    <th class="p-3 text-center">Jul 03</th>
                    <th class="p-3 text-center">Jul 04</th>
                    <th class="p-3 text-center">Jul 05</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white text-slate-650">
                <tr>
                    <td class="p-3 font-bold">John Doe</td>
                    <td class="p-3 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold">P</span></td>
                    <td class="p-3 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold">P</span></td>
                    <td class="p-3 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold">P</span></td>
                    <td class="p-3 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold">P</span></td>
                    <td class="p-3 text-center"><span class="text-slate-400 font-bold">Off</span></td>
                </tr>
                <tr>
                    <td class="p-3 font-bold">Jane Smith</td>
                    <td class="p-3 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold">P</span></td>
                    <td class="p-3 text-center"><span class="bg-amber-100 text-amber-700 px-2 py-0.5 rounded font-bold">L</span></td>
                    <td class="p-3 text-center"><span class="bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded font-bold">P</span></td>
                    <td class="p-3 text-center"><span class="bg-rose-100 text-rose-700 px-2 py-0.5 rounded font-bold">A</span></td>
                    <td class="p-3 text-center"><span class="text-slate-400 font-bold">Off</span></td>
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
