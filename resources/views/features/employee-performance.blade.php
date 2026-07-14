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
    <div class="flex justify-center gap-4 pt-2">
        <a href="{{ route('login') }}" class="btn btn-primary text-xs px-6 py-3.5">Review Team Performance</a>
        <button id="btn-watch-demo" class="btn btn-outline text-xs px-6 py-3.5 flex items-center gap-2">
            <i class="fa-solid fa-circle-play text-violet-600 text-sm"></i> Watch Setup Tour
        </button>
    </div>
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

<!-- ===== VIDEO & INTERACTIVE PREVIEW ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-12 gap-12 items-center">
    <!-- Description Details (Col 6) -->
    <div class="md:col-span-6 space-y-6">
        <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Translate Roster Data Into Workplace Performance</h2>
        <p class="text-slate-600 text-xs leading-relaxed">
            Punctuality analytics display statistics indicating average late durations, absence patterns, and team comparison scores.
        </p>
        <div class="border-l-2 border-violet-500 pl-4 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-slate-800">Visual Schedules Heatmaps</h4>
            <p class="text-slate-550 text-[11px] leading-relaxed">Presents timeline logs to trace check-in overlaps and lunch break durations across teams.</p>
        </div>
    </div>

    <!-- Mock Player Container (Col 6) -->
    <div class="md:col-span-6 bg-slate-905 rounded-3xl p-6 text-white space-y-4 shadow-xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/10 to-indigo-500/5 pointer-events-none"></div>
        <div class="flex justify-between items-center text-[10px] text-slate-400">
            <span class="font-bold flex items-center gap-1"><i class="fa-solid fa-circle text-[6px] text-emerald-500"></i> Analytics Dashboard Guide</span>
            <span>Duration: 1m 20s</span>
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

<!-- ===== FAQS ACCORDION ===== -->
<section class="max-w-4xl mx-auto px-6 py-12 space-y-6">
    <h3 class="font-outfit text-2xl font-black text-center text-slate-900">Module FAQs</h3>
    
    <div class="space-y-3">
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>How is the employee punctuality score calculated?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                The score is computed by comparing actual punch arrival timestamps against assigned shift schedules. Every check-in within buffer windows maintains a 100% check score, while late checks reduce rating metrics proportionally.
            </div>
        </div>

        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Does the system send alerts for persistent late check-ins?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. Administrators can set threshold limits. If an employee accumulates multiple late checks within a calendar month, the system sends an email notification automatically.
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Optimize your team performance metrics</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Access analytics dashboards and punctuality cards on our Premium subscription tiers.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('pricing') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">Start Free Trial</a>
            <a href="{{ route('contact') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Request Setup Call</a>
        </div>
    </div>
</section>
@endsection
