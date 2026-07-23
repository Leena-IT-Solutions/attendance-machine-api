@extends('layouts.landing')

@section('title', 'PDF Export & Custom Print Templates | Attendance Machine')
@section('meta_description', 'Download secure, audit-ready PDF attendance sheets. Customize print layouts, add company logos, and secure compliance signatures.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Export Module
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Audit-Ready PDF Exports <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">& Custom Print Templates Engine</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Download clean, print-friendly PDF attendance registers with one tap. Pre-formatted with signature blocks and compliance requirements.
    </p>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-file-pdf"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Print-Friendly Layouts</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Clean formatting optimized for standard A4 page prints. Fits timelines and check logs onto landscape grids.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-signature"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Signature Blocks</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Appends dedicated authorization sections at the bottom, ready for HR manager sign-off and employee reviews.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-copyright"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Custom Branding Headers</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Add your business logo, branch descriptions, and customized workspace descriptions to the PDF header.
            </p>
        </div>
    </div>
</section>

<!-- ===== MODULE DETAILS PREVIEW ===== -->
<section class="max-w-4xl mx-auto px-6 py-16 text-center space-y-6">
    <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Documenting Verification Compliance</h2>
    <p class="text-slate-600 text-sm leading-relaxed max-w-2xl mx-auto">
        PDF sheets list coordinates data showing employee check locations. Useful for compliance checks and client-contract reports.
    </p>
    <div class="inline-block bg-violet-50 border border-violet-100 rounded-2xl p-6 max-w-md mx-auto text-left mt-4">
        <h4 class="font-outfit text-xs font-bold text-violet-800 uppercase tracking-wider flex items-center gap-1.5">
            <i class="fa-solid fa-shield-halved text-violet-600"></i> Secure Backup Archiving
        </h4>
        <p class="text-slate-600 text-[11px] leading-relaxed mt-2">Presents timeline logs to trace check-in overlaps and lunch break durations across teams.</p>
    </div>
</section>

<!-- ===== MOCK SCREENSHOT ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 space-y-8">
    <div class="text-center space-y-2 max-w-xl mx-auto">
        <h3 class="font-outfit text-2xl font-black text-slate-900">PDF Report Document Layout Mockup</h3>
        <p class="text-slate-550 text-xs">A template view displaying header details and check-in rows.</p>
    </div>

    <!-- CSS Mock Console -->
    <div class="bg-white border-2 border-slate-200 rounded-3xl p-8 max-w-2xl mx-auto space-y-6 shadow-lg text-xs text-slate-650 font-serif relative">
        <div class="absolute top-4 right-4 bg-slate-900 text-white text-[8px] px-2 py-0.5 rounded font-mono uppercase font-bold">PDF Layout Preview</div>
        <div class="text-center space-y-1">
            <h4 class="font-outfit text-slate-800 text-sm font-bold uppercase tracking-wider">Attendance Machine Log Report</h4>
            <p class="text-[10px] text-slate-400">Workspace ID: WS-8451 • Date: Jul 14, 2026</p>
        </div>
        <hr class="border-slate-200">
        <div class="grid grid-cols-2 text-[10px] text-slate-500">
            <div>
                <p><strong class="text-slate-700">Company:</strong> Leena IT Solutions</p>
                <p><strong class="text-slate-700">Branch:</strong> Bengaluru HQ</p>
            </div>
            <div class="text-right">
                <p><strong class="text-slate-700">Run Time:</strong> 13:08:24 PM</p>
                <p><strong class="text-slate-700">Total Staff:</strong> 48 Profiles</p>
            </div>
        </div>
        <div class="h-20 bg-slate-50 border flex items-center justify-center rounded">
            <span class="text-slate-400 italic text-[10px]">Data matrix representation columns mapped here</span>
        </div>
        <div class="flex justify-between items-center text-[10px] pt-4 text-slate-400">
            <span>Signature: ______________________</span>
            <span>Date: ___ / ___ / ______</span>
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
