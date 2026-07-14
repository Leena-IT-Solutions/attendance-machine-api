@extends('layouts.landing')

@section('title', 'AI Face Recognition Attendance Kiosk | Attendance Machine')
@section('meta_description', 'Learn how our contact-free, 99.4% accurate AI Face Recognition engine eliminates buddy punching and processes employee check-ins in under 2 seconds.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Core Module
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Contactless AI Face Recognition <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Attendance Verification Engine</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Verify identity, track shifts, and prevent punch fraud using advanced 512-bit biometric parameters, processing checks in under 2 seconds.
    </p>
    <div class="flex justify-center gap-4 pt-2">
        <a href="{{ route('demo') }}" class="btn btn-primary text-xs px-6 py-3.5">Try Simulator Sandbox</a>
        <button id="btn-watch-demo" class="btn btn-outline text-xs px-6 py-3.5 flex items-center gap-2">
            <i class="fa-solid fa-circle-play text-violet-600 text-sm"></i> Watch Feature Demo
        </button>
    </div>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-shield-halved"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Eliminate Buddy Punching</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Prevents workers from logging checks for absent colleagues. A dynamic liveness check ensures only physical employees register.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-hands-bubbles"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">100% Hygienic & Contact-Free</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Employees simply scan by looking at the kiosk terminal. Eliminates physical surface contact required by fingerprint biometric scanners.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-bolt"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">High-Speed Processing</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Scan employee faces in under 2 seconds. Maintains queue momentum during busy shift turnovers in factories and retail.
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
            <span class="font-bold flex items-center gap-1"><i class="fa-solid fa-circle text-[6px] text-emerald-500"></i> AI Recognition Live Monitor</span>
            <span>Feed: Active</span>
        </div>
        <div class="aspect-video w-full rounded-2xl bg-slate-950 flex flex-col items-center justify-center border border-slate-800/80 relative group cursor-pointer" onclick="document.getElementById('btn-watch-demo').click()">
            <div class="w-14 h-14 rounded-full bg-violet-600 text-white flex items-center justify-center text-lg shadow-lg group-hover:scale-105 transition-transform z-10">
                <i class="fa-solid fa-play ml-0.5"></i>
            </div>
            <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider mt-3 z-10">Click to watch video demonstration</span>
        </div>
    </div>

    <!-- Description Details (Col 6) -->
    <div class="md:col-span-6 space-y-6">
        <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Advanced Mathematical ArcFace Biometrics</h2>
        <p class="text-slate-600 text-xs leading-relaxed">
            The AI facial scanning module extracts key nodal points of the eye, nose, and jaw lines. This information is saved as an encrypted 512-dimensional vector grid in the database.
        </p>
        <div class="border-l-2 border-violet-500 pl-4 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-slate-800">GDPR & Privacy Compliant</h4>
            <p class="text-slate-500 text-[11px] leading-relaxed">No raw face photos are compiled or shared. The abstract math signature vectors cannot be reversed back into an image.</p>
        </div>
    </div>
</section>

<!-- ===== MOCK SCREENSHOT ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 space-y-8">
    <div class="text-center space-y-2 max-w-xl mx-auto">
        <h3 class="font-outfit text-2xl font-black text-slate-900">System Face Roster Console</h3>
        <p class="text-slate-500 text-xs">Verify registered vector logs and recognition matching parameters.</p>
    </div>

    <!-- CSS Mock Console -->
    <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-md max-w-4xl mx-auto overflow-x-auto">
        <div class="flex justify-between items-center pb-4 border-b border-slate-100 mb-4 gap-4">
            <span class="font-outfit text-xs font-extrabold text-slate-800">Biometric Enrollments</span>
            <span class="bg-violet-50 border border-violet-100 text-violet-700 text-[10px] font-bold px-3 py-1 rounded-full">Total Profiles: 48</span>
        </div>
        <table class="w-full text-left text-xs border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-700 font-bold border-b border-slate-200">
                    <th class="p-3">Staff Code</th>
                    <th class="p-3">Profile</th>
                    <th class="p-3">Enroll Date</th>
                    <th class="p-3">Model Accuracy</th>
                    <th class="p-3">Vector Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white text-slate-650">
                <tr>
                    <td class="p-3 font-mono font-bold text-slate-800">FAC-109</td>
                    <td class="p-3">Robert Downey</td>
                    <td class="p-3">Jul 04, 2026</td>
                    <td class="p-3 font-mono text-emerald-600 font-bold">99.6%</td>
                    <td class="p-3"><span class="bg-emerald-50 text-emerald-700 text-[10px] font-bold px-2 py-0.5 rounded">Active Matrix</span></td>
                </tr>
                <tr>
                    <td class="p-3 font-mono font-bold text-slate-800">FAC-110</td>
                    <td class="p-3">Scarlett Johansson</td>
                    <td class="p-3">Jul 08, 2026</td>
                    <td class="p-3 font-mono text-emerald-600 font-bold">99.2%</td>
                    <td class="p-3"><span class="bg-emerald-50 text-emerald-700 text-[10px] font-bold px-2 py-0.5 rounded">Active Matrix</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<!-- ===== FAQS ACCORDION ===== -->
<section class="max-w-4xl mx-auto px-6 py-12 space-y-6">
    <h3 class="font-outfit text-2xl font-black text-center text-slate-900">Module FAQs</h3>
    
    <div class="space-y-3">
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Does the facial scanning work under poor lighting conditions?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. Our AI adjusts image contrast in low-light environments. However, for maximum check-in speeds, we recommend setting up the kiosk near well-lit entrance areas.
            </div>
        </div>

        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Can buddy punching be faked with printed photos?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                No. The AI software matches depth shadows and liveness parameters. Printed paper photos or digital phone screen images fail liveness detection immediately.
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Ready to upgrade your team check-ins?</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Get started with our free trial tier today. No credit cards or setup fees required.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">Start Free Trial</a>
            <a href="{{ route('contact') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Request Callback</a>
        </div>
    </div>
</section>
@endsection
