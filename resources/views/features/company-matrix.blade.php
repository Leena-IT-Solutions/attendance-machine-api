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
    <div class="flex justify-center gap-4 pt-2">
        <a href="{{ route('login') }}" class="btn btn-primary text-xs px-6 py-3.5">Open Workspace Matrix</a>
        <button id="btn-watch-demo" class="btn btn-outline text-xs px-6 py-3.5 flex items-center gap-2">
            <i class="fa-solid fa-circle-play text-violet-600 text-sm"></i> Tour Interface
        </button>
    </div>
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

<!-- ===== VIDEO & INTERACTIVE PREVIEW ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-12 gap-12 items-center">
    <!-- Description Details (Col 6) -->
    <div class="md:col-span-6 space-y-6">
        <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Visual Management for Dynamic Workforces</h2>
        <p class="text-slate-600 text-xs leading-relaxed">
            The grid interface displays color-coded indicators, highlighting late checks, missing logs, or overtime shifts, allowing operational managers to diagnose schedule errors in seconds.
        </p>
        <div class="border-l-2 border-violet-500 pl-4 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-slate-800">Department Metrics Drill-down</h4>
            <p class="text-slate-550 text-[11px] leading-relaxed">Select teams or branches to overlay attendance records and quickly identify patterns in team attendance.</p>
        </div>
    </div>

    <!-- Mock Player Container (Col 6) -->
    <div class="md:col-span-6 bg-slate-905 rounded-3xl p-6 text-white space-y-4 shadow-xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/10 to-indigo-500/5 pointer-events-none"></div>
        <div class="flex justify-between items-center text-[10px] text-slate-400">
            <span class="font-bold flex items-center gap-1"><i class="fa-solid fa-circle text-[6px] text-emerald-500"></i> Roster Matrix Video</span>
            <span>Duration: 1m 15s</span>
        </div>
        <div class="aspect-video w-full rounded-2xl bg-slate-950 flex flex-col items-center justify-center border border-slate-800/80 relative group cursor-pointer" onclick="document.getElementById('btn-watch-demo').click()">
            <div class="w-14 h-14 rounded-full bg-violet-600 text-white flex items-center justify-center text-lg shadow-lg group-hover:scale-105 transition-transform z-10">
                <i class="fa-solid fa-play ml-0.5"></i>
            </div>
            <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider mt-3 z-10">Click to watch video</span>
        </div>
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

<!-- ===== FAQS ACCORDION ===== -->
<section class="max-w-4xl mx-auto px-6 py-12 space-y-6">
    <h3 class="font-outfit text-2xl font-black text-center text-slate-900">Module FAQs</h3>
    
    <div class="space-y-3">
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Can we display custom exception tags on the grid?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. The matrix grid uses standard designations like P (Present), A (Absent), L (Late), and H (Half Day), but administrators can define custom tag colors or exception rules in dashboard settings.
            </div>
        </div>

        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Does the matrix view support real-time check-in updates?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. As soon as a worker scans their face at the entrance kiosk, the corresponding daily grid block updates immediately on the web panel without requiring page refreshes.
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Get complete visibility over work schedules</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Track team check-in matrices month-over-month. Start your free trial today.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">Start Free Trial</a>
            <a href="{{ route('contact') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Request Callback</a>
        </div>
    </div>
</section>
@endsection
