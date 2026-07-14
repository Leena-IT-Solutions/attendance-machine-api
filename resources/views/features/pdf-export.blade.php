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
    <div class="flex justify-center gap-4 pt-2">
        <a href="{{ route('reports') }}" class="btn btn-primary text-xs px-6 py-3.5">Review PDF Templates</a>
        <button id="btn-watch-demo" class="btn btn-outline text-xs px-6 py-3.5 flex items-center gap-2">
            <i class="fa-solid fa-circle-play text-violet-600 text-sm"></i> Watch Setup Tour
        </button>
    </div>
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

<!-- ===== VIDEO & INTERACTIVE PREVIEW ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-12 gap-12 items-center">
    <!-- Description Details (Col 6) -->
    <div class="md:col-span-6 space-y-6">
        <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Documenting Verification Compliance</h2>
        <p class="text-slate-600 text-xs leading-relaxed">
            PDF sheets list coordinates data showing employee check locations. Useful for compliance checks and client-contract reports.
        </p>
        <div class="border-l-2 border-violet-500 pl-4 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-slate-800">Secure Backup Archiving</h4>
            <p class="text-slate-550 text-[11px] leading-relaxed">Presents timeline logs to trace check-in overlaps and lunch break durations across teams.</p>
        </div>
    </div>

    <!-- Mock Player Container (Col 6) -->
    <div class="md:col-span-6 bg-slate-905 rounded-3xl p-6 text-white space-y-4 shadow-xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/10 to-indigo-500/5 pointer-events-none"></div>
        <div class="flex justify-between items-center text-[10px] text-slate-400">
            <span class="font-bold flex items-center gap-1"><i class="fa-solid fa-circle text-[6px] text-emerald-500"></i> PDF Generator Video</span>
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

<!-- ===== FAQS ACCORDION ===== -->
<section class="max-w-4xl mx-auto px-6 py-12 space-y-6">
    <h3 class="font-outfit text-2xl font-black text-center text-slate-900">Module FAQs</h3>
    
    <div class="space-y-3">
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Can we customize the PDF file name automatically?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. Under dashboard report options, you config prefix rules (e.g. "HQ_Attendance_[Month]"), and the engine naming protocol formats file titles accordingly during downloads.
            </div>
        </div>

        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Are coordinates information printed inside the PDF?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. For field operations or construction projects requiring location validation verification, coordinates maps and address tags are listed inside logs columns.
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Simplify your compliance archiving cycle</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Export secure and clean print sheets. Available on all Premium tiers.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('pricing') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">Start Free Trial</a>
            <a href="{{ route('contact') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Request Consultation</a>
        </div>
    </div>
</section>
@endsection
