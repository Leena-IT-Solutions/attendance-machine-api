@extends('layouts.landing')

@section('title', 'Excel Exports & Payroll-Ready Formats | Attendance Machine')
@section('meta_description', 'Export team matrices and Loss of Pay (LOP) calculations to custom formatted Excel worksheets. Sync data directly with other accounting tools.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Export Module
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Formatted Excel Sheets <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">& Roster Exports Engine</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Extract employee check data directly into organized spreadsheets. Pre-configured with active formulas and Loss of Pay day values.
    </p>
    <div class="flex justify-center gap-4 pt-2">
        <a href="{{ route('reports') }}" class="btn btn-primary text-xs px-6 py-3.5">Review Excel Layouts</a>
        <button id="btn-watch-demo" class="btn btn-outline text-xs px-6 py-3.5 flex items-center gap-2">
            <i class="fa-solid fa-circle-play text-violet-600 text-sm"></i> Watch Setup Tour
        </button>
    </div>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-file-csv"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Direct CSV & Excel Formats</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Download files using standard `.csv` or `.xlsx` formats, compatible with Microsoft Excel, Google Sheets, or LibreOffice.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-calculator"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Active Math Formulas</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Spreadsheets include active summation formulas to automate payroll computations, late counters, and active hours logged.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-table-columns"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Column Customizer</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Select columns to exclude during download (e.g. coordinates or lunch breaks) to match specific accountant formats.
            </p>
        </div>
    </div>
</section>

<!-- ===== VIDEO & INTERACTIVE PREVIEW ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-12 gap-12 items-center">
    <!-- Mock Player Container (Col 6) -->
    <div class="md:col-span-6 bg-slate-905 rounded-3xl p-6 text-white space-y-4 shadow-xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/10 to-indigo-500/5 pointer-events-none"></div>
        <div class="flex justify-between items-center text-[10px] text-slate-400">
            <span class="font-bold flex items-center gap-1"><i class="fa-solid fa-circle text-[6px] text-emerald-500"></i> Excel Export Video</span>
            <span>Duration: 1m 10s</span>
        </div>
        <div class="aspect-video w-full rounded-2xl bg-slate-950 flex flex-col items-center justify-center border border-slate-800/80 relative group cursor-pointer" onclick="document.getElementById('btn-watch-demo').click()">
            <div class="w-14 h-14 rounded-full bg-violet-600 text-white flex items-center justify-center text-lg shadow-lg group-hover:scale-105 transition-transform z-10">
                <i class="fa-solid fa-play ml-0.5"></i>
            </div>
            <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider mt-3 z-10">Click to watch video</span>
        </div>
    </div>

    <!-- Description Details (Col 6) -->
    <div class="md:col-span-6 space-y-6">
        <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Simplify Payroll Updates to ERPs</h2>
        <p class="text-slate-600 text-xs leading-relaxed">
            Attendance matrices map directly into standard billing columns. Export files to integrate with Tally, QuickBooks, or custom accounting systems.
        </p>
        <div class="border-l-2 border-violet-500 pl-4 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-slate-800">Custom Columns Allocations</h4>
            <p class="text-slate-550 text-[11px] leading-relaxed">Modify layout settings to order employee name fields, punch timestamps, and active working hours mapping.</p>
        </div>
    </div>
</section>

<!-- ===== MOCK SCREENSHOT ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 space-y-8">
    <div class="text-center space-y-2 max-w-xl mx-auto">
        <h3 class="font-outfit text-2xl font-black text-slate-900">Spreadsheet Matrix Preview Mockup</h3>
        <p class="text-slate-550 text-xs">Spreadsheets map arrival dates and LOP calculations with standard formulas.</p>
    </div>

    <!-- CSS Mock Console -->
    <div class="bg-white border border-slate-200 rounded-2xl p-4 max-w-xl mx-auto overflow-x-auto shadow-md">
        <div class="grid grid-cols-5 text-center font-mono text-[9px] text-slate-600 divide-x divide-slate-100 border-b border-slate-200 pb-2">
            <div class="bg-slate-50 font-bold p-1">Row</div>
            <div class="bg-slate-50 font-bold p-1">Col A (Name)</div>
            <div class="bg-slate-50 font-bold p-1">Col B (Present)</div>
            <div class="bg-slate-50 font-bold p-1">Col C (LOP)</div>
            <div class="bg-slate-50 font-bold p-1">Col D (Pay)</div>
        </div>
        <div class="grid grid-cols-5 text-center font-mono text-[9px] text-slate-650 divide-x divide-slate-100 border-b border-slate-100 py-1.5">
            <div class="text-slate-400 font-bold">1</div>
            <div>John Doe</div>
            <div>26 Days</div>
            <div class="text-emerald-600 font-bold">0.0</div>
            <div class="font-bold">100%</div>
        </div>
        <div class="grid grid-cols-5 text-center font-mono text-[9px] text-slate-650 divide-x divide-slate-100 border-b border-slate-100 py-1.5">
            <div class="text-slate-400 font-bold">2</div>
            <div>Jane Smith</div>
            <div>24 Days</div>
            <div class="text-rose-600 font-bold">1.5</div>
            <div class="font-bold">95.1%</div>
        </div>
    </div>
</section>

<!-- ===== FAQS ACCORDION ===== -->
<section class="max-w-4xl mx-auto px-6 py-12 space-y-6">
    <h3 class="font-outfit text-2xl font-black text-center text-slate-900">Module FAQs</h3>
    
    <div class="space-y-3">
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Are Excel sheets compatible with standard accounting software?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. Our Excel files download in standardized layouts, facilitating imports into accounting systems like Tally, QuickBooks, or custom ERP systems.
            </div>
        </div>

        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Can we configure custom columns mapping inside reports?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. In settings, you can check/uncheck fields (e.g. employee email or branch name) to exclude them, or adjust columns order before running downloads.
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Automate your monthly salary spreadsheets</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Export secure and clean print sheets. Available on all Premium tiers.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('pricing') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">Start Free Trial</a>
            <a href="{{ route('contact') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Request Setup Call</a>
        </div>
    </div>
</section>
@endsection
