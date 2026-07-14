@extends('layouts.landing')

@section('title', 'Attendance Software for Manufacturing Plants | Attendance Machine')
@section('meta_description', 'Track assembly line teams, rotate shift rosters, compute overtime values, and pull Excel spreadsheets directly from our cloud system.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Industrial Sector
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Track Assembly Line Operations <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Built for Manufacturing Plants</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Organize floor staff rosters, compare department punctuality metrics, and calculate payable hours based on shift rules.
    </p>
    <div class="flex justify-center gap-4 pt-2">
        <a href="{{ route('demo') }}" class="btn btn-primary text-xs px-6 py-3.5">Schedule Plant Demo</a>
        <a href="{{ route('contact') }}" class="btn btn-outline text-xs px-6 py-3.5">Contact Sales</a>
    </div>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-list-check"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Assembly Line Tracking</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Organize staff rosters by specific production lines to compare present rates and manage coverage gaps.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-business-time"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Flexible Overtime Schedules</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Applies custom multipliers (e.g. 1.5x) to hours worked beyond standard general shifts.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-file-excel"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Formatted Excel Sheets</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Export matrices showing worker codes, punch times, and calculated LOP days directly into Excel tables.
            </p>
        </div>
    </div>
</section>

<!-- ===== CHALLENGES VS SOLUTIONS ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 space-y-12">
    <div class="text-center space-y-2">
        <h2 class="font-outfit text-3xl font-black text-slate-900">Challenges vs. Solutions</h2>
        <p class="text-slate-550 text-xs">How we streamline manufacturing floor shifts.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-rose-50/50 p-6 rounded-2xl border border-rose-100/50 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-rose-800 uppercase tracking-wider">Traditional Roster Pain:</h4>
            <p class="text-[11px] text-slate-650 leading-relaxed">
                Assembly line supervisors waste time tracking shift check-ins manually, leading to delays and inaccurate overtime logs.
            </p>
        </div>
        <div class="bg-emerald-50/50 p-6 rounded-2xl border border-emerald-100/50 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-emerald-800 uppercase tracking-wider">Our AI Approach:</h4>
            <p class="text-[11px] text-slate-650 leading-relaxed">
                Contactless AI face verification scans workers from a distance, completely unaffected by dirty hands. Auto-calculates LOP deductions based on shift buffer parameters.
            </p>
        </div>
    </div>
</section>

<!-- ===== FAQS ACCORDION ===== -->
<section class="max-w-4xl mx-auto px-6 py-12 space-y-6">
    <h3 class="font-outfit text-2xl font-black text-center text-slate-900">Manufacturing FAQs</h3>
    
    <div class="space-y-3">
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Can we customize general shift overtime thresholds?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. Under settings, you define overtime start buffers. If a general morning shift ends at 18:00, you can configure the system to calculate overtime only after 18:30.
            </div>
        </div>

        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Does the system sync with enterprise ERP applications?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. We offer Developer APIs and secure webhook notifications to push real-time check-in events directly into custom ERP databases.
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Optimize your plant floor schedules today</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Integrate our deduction rules engine and simplify accountant worksheets.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('pricing') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">View Subscriptions</a>
            <a href="{{ route('contact') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Request Setup Call</a>
        </div>
    </div>
</section>
@endsection
