@extends('layouts.landing')

@section('title', 'Attendance Software for Construction Companies | Attendance Machine')
@section('meta_description', 'Works offline at remote, unpowered build locations. GPS geofences verify daily wage laborers check-ins via supervisor phones.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Construction Sector
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        GPS Geofenced Attendance <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Built for Construction Companies</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Verify daily wage laborers on-site with coordinates validation. Operates 100% offline on supervisor smartphones at unpowered locations.
    </p>
    <div class="flex justify-center gap-4 pt-2">
        <a href="{{ route('demo') }}" class="btn btn-primary text-xs px-6 py-3.5">Schedule Site Demo</a>
        <a href="{{ route('contact') }}" class="btn btn-outline text-xs px-6 py-3.5">Contact Sales</a>
    </div>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-map-location-dot"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">GPS Geofence Limits</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Applies site boundary check perimeters. Prevents check-ins if workers are outside build boundaries.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-cloud-arrow-down"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Offline Scanner Sync</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Stores punches locally in phone memory, synchronizing logs once supervisors return to network zones.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-calculator"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Daily Wages Calculation</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Tracks daily presence logs and hour totals, simplifying billing calculations for accountants.
            </p>
        </div>
    </div>
</section>

<!-- ===== CHALLENGES VS SOLUTIONS ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 space-y-12">
    <div class="text-center space-y-2">
        <h2 class="font-outfit text-3xl font-black text-slate-900">Challenges vs. Solutions</h2>
        <p class="text-slate-550 text-xs">How we streamline outdoor site construction rosters.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-rose-50/50 p-6 rounded-2xl border border-rose-100/50 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-rose-800 uppercase tracking-wider">Traditional Roster Pain:</h4>
            <p class="text-[11px] text-slate-650 leading-relaxed">
                Build locations move regularly and lack power or networks. Laborers sign registers, leading to proxy check errors and billing leaks.
            </p>
        </div>
        <div class="bg-emerald-50/50 p-6 rounded-2xl border border-emerald-100/50 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-emerald-800 uppercase tracking-wider">Our AI Approach:</h4>
            <p class="text-[11px] text-slate-650 leading-relaxed">
                Supervisors log worker checks via mobile. GPS coordinates validate that checks occurred on-site, syncing automatically when online.
            </p>
        </div>
    </div>
</section>

<!-- ===== FAQS ACCORDION ===== -->
<section class="max-w-4xl mx-auto px-6 py-12 space-y-6">
    <h3 class="font-outfit text-2xl font-black text-center text-slate-900">Construction FAQs</h3>
    
    <div class="space-y-3">
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Does the app work in remote areas with zero network connectivity?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. Offline Mode stores verification logs in internal storage and synchronizes data to the cloud panel automatically once internet connectivity returns.
            </div>
        </div>

        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Can we configure multiple geofences for different construction sites?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. Under settings, managers configure multiple branch templates, each with its unique GPS coordinate limits and perimeter radius.
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Optimize your construction site operations today</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Deploy geofenced mobile verification. Try it out free.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">Start Free Trial</a>
            <a href="{{ route('contact') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Talk to Sales</a>
        </div>
    </div>
</section>
@endsection
