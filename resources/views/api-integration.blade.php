@extends('layouts.landing')

@section('title', 'Developer API & Webhooks Integration | Attendance Machine')
@section('meta_description', 'Connect Attendance Machine logs to your custom ERP, HRMS, or database. Access our developer guides, REST API endpoints, and webhook payload configurations.')

@section('content')
<!-- ===== HERO TITLE SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 pt-16 pb-8 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="text-center space-y-4 max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1 rounded-full text-[11px] font-bold text-violet-700 uppercase tracking-widest">
            Developer Documentation
        </div>
        <h1 class="font-outfit text-4xl sm:text-5xl font-black text-slate-900 leading-tight">
            Seamless ERP, HRMS & Database <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Integrations via REST API</span>
        </h1>
        <p class="text-slate-550 text-sm max-w-xl mx-auto">
            Sync raw check-in punches in real-time. Use secure token access to manage employee rosters, shift assignments, and daily stamps.
        </p>
    </div>
</section>

<!-- ===== VISUAL PIPELINE WORKFLOW (Example Flow) ===== -->
<section class="max-w-5xl mx-auto px-6 py-8">
    <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm space-y-6">
        <h3 class="font-outfit font-black text-slate-800 text-center text-base">Example Integration Pipeline</h3>
        
        <!-- Grid Connection Flow -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-6 pt-4 relative">
            <!-- Connecting line background for desktop -->
            <div class="hidden md:block absolute top-1/2 left-0 right-0 h-[2px] bg-slate-150 -translate-y-1/2 z-0"></div>

            <!-- Step 1: Attendance -->
            <div class="bg-white border-2 border-violet-500 rounded-2xl p-4 text-center w-36 shadow-sm z-10 space-y-1">
                <div class="w-8 h-8 rounded-full bg-violet-50 text-violet-600 flex items-center justify-center text-xs font-bold mx-auto"><i class="fa-solid fa-user-check"></i></div>
                <h4 class="font-outfit text-[11px] font-bold text-slate-800 uppercase tracking-wider">Attendance</h4>
                <p class="text-[9px] text-slate-400">AI face log registered</p>
            </div>

            <div class="text-slate-300 z-10 text-xl md:rotate-0 rotate-90"><i class="fa-solid fa-circle-chevron-right"></i></div>

            <!-- Step 2: API -->
            <div class="bg-white border-2 border-violet-500 rounded-2xl p-4 text-center w-36 shadow-sm z-10 space-y-1">
                <div class="w-8 h-8 rounded-full bg-violet-50 text-violet-600 flex items-center justify-center text-xs font-bold mx-auto"><i class="fa-solid fa-code"></i></div>
                <h4 class="font-outfit text-[11px] font-bold text-slate-800 uppercase tracking-wider">API Sync</h4>
                <p class="text-[9px] text-slate-400">Payload dispatched</p>
            </div>

            <div class="text-slate-300 z-10 text-xl md:rotate-0 rotate-90"><i class="fa-solid fa-circle-chevron-right"></i></div>

            <!-- Step 3: Payroll -->
            <div class="bg-white border-2 border-violet-500 rounded-2xl p-4 text-center w-36 shadow-sm z-10 space-y-1">
                <div class="w-8 h-8 rounded-full bg-violet-50 text-violet-600 flex items-center justify-center text-xs font-bold mx-auto"><i class="fa-solid fa-calculator"></i></div>
                <h4 class="font-outfit text-[11px] font-bold text-slate-800 uppercase tracking-wider">Payroll</h4>
                <p class="text-[9px] text-slate-400">LOP days calculated</p>
            </div>

            <div class="text-slate-300 z-10 text-xl md:rotate-0 rotate-90"><i class="fa-solid fa-circle-chevron-right"></i></div>

            <!-- Step 4: Salary -->
            <div class="bg-white border-2 border-violet-500 rounded-2xl p-4 text-center w-36 shadow-sm z-10 space-y-1">
                <div class="w-8 h-8 rounded-full bg-violet-50 text-violet-600 flex items-center justify-center text-xs font-bold mx-auto"><i class="fa-solid fa-wallet"></i></div>
                <h4 class="font-outfit text-[11px] font-bold text-slate-800 uppercase tracking-wider">Salary Payout</h4>
                <p class="text-[9px] text-slate-400">Automated transfer</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== CORE CONCEPT DESCRIPTIONS ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 space-y-8">
    <div class="text-center space-y-2 max-w-xl mx-auto">
        <h3 class="font-outfit text-2xl font-black text-slate-900">Integration Principles & Architecture</h3>
        <p class="text-slate-550 text-xs">Learn how our endpoints connect and sync with your internal HR architecture.</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- 1. REST API -->
        <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-cloud"></i></div>
            <h4 class="font-outfit font-extrabold text-slate-900 text-sm">REST API Endpoints</h4>
            <p class="text-slate-500 text-xs leading-relaxed">
                Connect and query daily check-ins, employee lists, and shift groups through standard, stateless GET and POST HTTP endpoints.
            </p>
        </div>

        <!-- 2. Authentication -->
        <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-key"></i></div>
            <h4 class="font-outfit font-extrabold text-slate-900 text-sm">Bearer Authentication</h4>
            <p class="text-slate-550 text-xs leading-relaxed">
                Keep client-side connections secure. Issue specific workspace API tokens and load them inside request header settings.
            </p>
        </div>

        <!-- 3. Webhook -->
        <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-network-wired"></i></div>
            <h4 class="font-outfit font-extrabold text-slate-900 text-sm">Real-time Webhooks</h4>
            <p class="text-slate-550 text-xs leading-relaxed">
                Configure destination URLs. The server issues a POST event notification containing coordinates and face details as checks occur.
            </p>
        </div>

        <!-- 4. Payroll Integration -->
        <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-calculator"></i></div>
            <h4 class="font-outfit font-extrabold text-slate-900 text-sm">Payroll Synchronization</h4>
            <p class="text-slate-550 text-xs leading-relaxed">
                Push Loss of Pay (LOP) calculations directly to salary processing programs, minimizing manual adjustment times.
            </p>
        </div>

        <!-- 5. HRMS -->
        <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-hospital-user"></i></div>
            <h4 class="font-outfit font-extrabold text-slate-900 text-sm">HRMS Alignment</h4>
            <p class="text-slate-550 text-xs leading-relaxed">
                Synchronize employee details directories, department classifications, and shift assignments automatically across setups.
            </p>
        </div>

        <!-- 6. ERP -->
        <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-database"></i></div>
            <h4 class="font-outfit font-extrabold text-slate-900 text-sm">Enterprise ERP Sync</h4>
            <p class="text-slate-550 text-xs leading-relaxed">
                Feed check logs into SAP, Oracle, Tally, or custom databases to evaluate team attendance statistics.
            </p>
        </div>
    </div>
</section>

<!-- ===== API ENDPOINT EXAMPLES ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-12 gap-12">
    <!-- Endpoints Details -->
    <div class="md:col-span-7 space-y-6">
        <h3 class="font-outfit font-black text-slate-900 text-xl">Log Query API Endpoint</h3>
        <p class="text-slate-650 text-xs leading-relaxed">
            Send a query request to get check details. Authenticate using bearer headers. Code examples are available below:
        </p>

        <!-- Code tabs select -->
        <div class="space-y-3">
            <div class="flex gap-2 border-b border-slate-200 text-[10px] font-bold text-slate-500">
                <button onclick="switchCodeBlock('curl')" id="btn-code-curl" class="pb-2 text-violet-600 border-b border-violet-600">cURL</button>
                <button onclick="switchCodeBlock('node')" id="btn-code-node" class="pb-2 hover:text-slate-950">Node.js</button>
                <button onclick="switchCodeBlock('python')" id="btn-code-python" class="pb-2 hover:text-slate-950">Python</button>
            </div>

            <!-- Code display -->
            <div class="relative bg-slate-905 border border-slate-850 rounded-2xl p-4 font-mono text-[10px] text-slate-300 overflow-x-auto">
                <pre id="code-block-display">
curl -X GET "https://attendance.leenaitsolutions.in/api/v1/attendance-logs?start_date=2026-07-01" \
  -H "Authorization: Bearer your_api_token_here" \
  -H "Accept: application/json"
                </pre>
            </div>
        </div>
    </div>

    <!-- Webhook payload -->
    <div class="md:col-span-5 bg-slate-905 border border-slate-850 rounded-3xl p-6 text-white space-y-4 max-h-[480px] flex flex-col justify-between shadow-lg">
        <div class="space-y-1">
            <h4 class="font-outfit text-sm font-bold text-violet-400">POST Webhook Notification Payload</h4>
            <p class="text-[10px] text-slate-400 font-bold">Event details dispatched immediately on checks.</p>
        </div>

        <div class="bg-slate-950/80 border border-slate-850 rounded-xl p-4 font-mono text-[9px] text-slate-300 overflow-y-auto max-h-80">
<pre>{
  "event": "attendance.created",
  "timestamp": "2026-07-14T13:08:24Z",
  "data": {
    "employee_code": "EMP-401",
    "employee_name": "John Doe",
    "scan_time": "08:55:04",
    "scan_date": "2026-07-14",
    "accuracy_score": 0.994,
    "device_id": "Kiosk-HQ-01"
  }
}</pre>
        </div>
    </div>
</section>

@section('scripts')
<script>
    const codeSnippets = {
        curl: `curl -X GET "https://attendance.leenaitsolutions.in/api/v1/attendance-logs?start_date=2026-07-01" \\
  -H "Authorization: Bearer your_api_token_here" \\
  -H "Accept: application/json"`,
        node: `const axios = require('axios');

axios.get('https://attendance.leenaitsolutions.in/api/v1/attendance-logs', {
  params: { start_date: '2026-07-01' },
  headers: {
    'Authorization': 'Bearer your_api_token_here',
    'Accept': 'application/json'
  }
})
.then(response => console.log(response.data))
.catch(error => console.error(error));`,
        python: `import requests

url = "https://attendance.leenaitsolutions.in/api/v1/attendance-logs"
headers = {
    "Authorization": "Bearer your_api_token_here",
    "Accept": "application/json"
}
params = {
    "start_date": "2026-07-01"
}

response = requests.get(url, headers=headers, params=params)
print(response.json())`
    };

    function switchCodeBlock(lang) {
        const langs = ["curl", "node", "python"];
        langs.forEach(l => {
            const btn = document.getElementById(`btn-code-${l}`);
            if (l === lang) {
                btn.className = "pb-2 text-violet-600 border-b border-violet-600 font-bold";
            } else {
                btn.className = "pb-2 hover:text-slate-950 font-bold";
            }
        });

        document.getElementById('code-block-display').textContent = codeSnippets[lang];
    }
</script>
@endsection
@endsection
