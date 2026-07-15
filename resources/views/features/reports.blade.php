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
    <div class="flex justify-center gap-4 pt-2">
        <a href="{{ route('reports') }}" class="btn btn-primary text-xs px-6 py-3.5">View Report Templates</a>
        <button id="btn-watch-demo" class="btn btn-outline text-xs px-6 py-3.5 flex items-center gap-2">
            <i class="fa-solid fa-circle-play text-violet-600 text-sm"></i> Watch Setup Tour
        </button>
    </div>
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

<!-- ===== VIDEO & INTERACTIVE PREVIEW ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-12 gap-12 items-center">
    <!-- Description Details (Col 6) -->
    <div class="md:col-span-6 space-y-6">
        <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Accurate Sheets Formatted for Audits</h2>
        <p class="text-slate-600 text-xs leading-relaxed">
            Run custom queries by date ranges or department groups. The report documents precise check times, lunch durations, shift classifications, and matching scores.
        </p>
        <div class="border-l-2 border-violet-500 pl-4 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-slate-800">Department Metrics Summary</h4>
            <p class="text-slate-500 text-[11px] leading-relaxed">Instantly identify absenteeism spikes and track operational productivity benchmarks across multiple branches.</p>
        </div>
    </div>

    <!-- Mock Player Container (Col 6) -->
    <div class="md:col-span-6 bg-slate-905 rounded-3xl p-6 text-white space-y-4 shadow-xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/10 to-indigo-500/5 pointer-events-none"></div>
        <div class="flex justify-between items-center text-[10px] text-slate-400">
            <span class="font-bold flex items-center gap-1"><i class="fa-solid fa-circle text-[6px] text-emerald-500"></i> Reports Generator Video</span>
            <span>Duration: 1m 05s</span>
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

<!-- ===== FAQS ACCORDION ===== -->
<section class="max-w-4xl mx-auto px-6 py-12 space-y-6">
    <h3 class="font-outfit text-2xl font-black text-center text-slate-900">Module FAQs</h3>
    
    <div class="space-y-3">
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Can we schedule automatic daily email reports?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. Under reports configurations, you can choose to receive automated daily punch logs or weekly matrices directly inside your email inbox.
            </div>
        </div>

        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Are LOP deduction rules fully custom?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. You configure buffer margins, half-day late thresholds, and standard absenteeism penalties. The reports engine calculates deductions automatically based on these rules.
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Simplify your monthly payroll cycle</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Generate and download audit-ready sheets. Try it out free today.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">Start Free Trial</a>
            <a href="{{ route('contact') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Talk to Sales</a>
        </div>
    </div>
</section>
@endsection
