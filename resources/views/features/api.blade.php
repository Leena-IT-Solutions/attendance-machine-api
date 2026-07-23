@extends('layouts.landing')

@section('title', 'REST API & Webhooks Engine | Attendance Machine')
@section('meta_description', 'Sync attendance events in real-time. Review our authorization tokens, POST webhook payloads, and database connectivity guides.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Integration Module
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Developer-Friendly REST API <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">& Real-time Webhooks Engine</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Connect attendance logs directly to your custom ERP, HRMS, or databases. Trigger real-time notifications when workers punch in.
    </p>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-key"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Secure Bearer Tokens</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Generate workspace-scoped authorization keys. Revoke, update, or assign read-write scopes from the console.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-network-wired"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Instant Webhooks</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Our servers fire a POST request immediately upon successful face checks. Eliminates polling queries.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-code"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Clean JSON Payloads</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Standardized data structures for employee identifiers, timestamp check logs, and verification match metrics.
            </p>
        </div>
    </div>
</section>


<!-- ===== MOCK SCREENSHOT ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 space-y-8">
    <div class="text-center space-y-2 max-w-xl mx-auto">
        <h3 class="font-outfit text-2xl font-black text-slate-900">API Response Preview</h3>
        <p class="text-slate-500 text-xs">Standard JSON response received from our log endpoint.</p>
    </div>

    <!-- CSS Mock Console -->
    <div class="bg-slate-905 border border-slate-850 rounded-3xl p-6 text-white max-w-2xl mx-auto font-mono text-[9px] overflow-x-auto shadow-lg">
<pre>{
  "success": true,
  "records_count": 1,
  "data": [
    {
      "log_id": 984501,
      "employee_code": "EMP-401",
      "scan_datetime": "2026-07-14 08:55:04",
      "verification_method": "AI_FACE",
      "accuracy_match": 0.994,
      "device_id": "Kiosk-HQ-01"
    }
  ]
}</pre>
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
