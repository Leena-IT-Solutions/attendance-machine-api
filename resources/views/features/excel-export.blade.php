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

<!-- ===== MODULE DETAILS PREVIEW ===== -->
<section class="max-w-4xl mx-auto px-6 py-16 text-center space-y-6">
    <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Simplify Payroll Updates to ERPs</h2>
    <p class="text-slate-600 text-sm leading-relaxed max-w-2xl mx-auto">
        Attendance matrices map directly into standard billing columns. Export files to integrate with Tally, QuickBooks, or custom accounting systems.
    </p>
    <div class="inline-block bg-violet-50 border border-violet-100 rounded-2xl p-6 max-w-md mx-auto text-left mt-4">
        <h4 class="font-outfit text-xs font-bold text-violet-800 uppercase tracking-wider flex items-center gap-1.5">
            <i class="fa-solid fa-file-excel text-violet-600"></i> Custom Columns Allocations
        </h4>
        <p class="text-slate-600 text-[11px] leading-relaxed mt-2">Modify layout settings to order employee name fields, punch timestamps, and active working hours mapping.</p>
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
