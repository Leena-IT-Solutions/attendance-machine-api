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
    <div class="flex justify-center gap-4 pt-2">
        <a href="{{ route('api.integration') }}" class="btn btn-primary text-xs px-6 py-3.5">Launch API Console</a>
        <button id="btn-watch-demo" class="btn btn-outline text-xs px-6 py-3.5 flex items-center gap-2">
            <i class="fa-solid fa-circle-play text-violet-600 text-sm"></i> Watch Setup Tour
        </button>
    </div>
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

<!-- ===== VIDEO & INTERACTIVE PREVIEW ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-12 gap-12 items-center">
    <!-- Mock Player Container (Col 6) -->
    <div class="md:col-span-6 bg-slate-905 rounded-3xl p-6 text-white space-y-4 shadow-xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/10 to-indigo-500/5 pointer-events-none"></div>
        <div class="flex justify-between items-center text-[10px] text-slate-400">
            <span class="font-bold flex items-center gap-1"><i class="fa-solid fa-circle text-[6px] text-emerald-500"></i> API Onboarding Guide</span>
            <span>Duration: 1m 45s</span>
        </div>
        <div class="aspect-video w-full rounded-2xl bg-slate-950 flex flex-col items-center justify-center border border-slate-800/80 relative group cursor-pointer" onclick="document.getElementById('btn-watch-demo').click()">
            <div class="w-14 h-14 rounded-full bg-violet-600 text-white flex items-center justify-center text-lg shadow-lg group-hover:scale-105 transition-transform z-10">
                <i class="fa-solid fa-play ml-0.5"></i>
            </div>
            <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider mt-3 z-10">Click to watch setup guide</span>
        </div>
    </div>

    <!-- Description Details (Col 6) -->
    <div class="md:col-span-6 space-y-6">
        <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Integrate in Minutes with Multi-Language Code</h2>
        <p class="text-slate-600 text-xs leading-relaxed">
            Query staff logs using REST API guidelines. Integrate with standard http calls inside Python, Node.js, PHP, or Java code structures.
        </p>
        <div class="border-l-2 border-violet-500 pl-4 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-slate-800">Dynamic Log Sync</h4>
            <p class="text-slate-550 text-[11px] leading-relaxed">Retrieve sync updates using timestamps, ensuring client-side databases stay aligned without payload redundancies.</p>
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

<!-- ===== FAQS ACCORDION ===== -->
<section class="max-w-4xl mx-auto px-6 py-12 space-y-6">
    <h3 class="font-outfit text-2xl font-black text-center text-slate-900">Module FAQs</h3>
    
    <div class="space-y-3">
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Are webhooks retried if my server is temporarily offline?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. If your endpoint returns a status code other than 200 OK, our webhook engine retries requests 5 times with exponential backoff before logging a failure.
            </div>
        </div>

        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Is there a request rate limit on the endpoints?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Standard Premium API keys are throttled at 60 requests per minute, which is more than enough for regular database sync operations. Unlimited accounts support higher thresholds.
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Get your custom integration running</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Access API configurations and developer resources on our Premium subscription tiers.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('pricing') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">View Subscriptions</a>
            <a href="{{ route('contact') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Contact Sales</a>
        </div>
    </div>
</section>
@endsection
