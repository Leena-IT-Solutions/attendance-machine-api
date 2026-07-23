@extends('layouts.landing')

@section('title', 'Attendance Software for Transport & Fleet Companies | Attendance Machine')
@section('meta_description', 'Track driver log times, monitor route schedules, and manage transit rosters with mobile contactless biometrics.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Transport Sector
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Verify Mobile Fleet Check-ins <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Built for Drivers, Couriers & Transport Teams</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Verify transit check-ins with face recognition logs, monitor driver punch times, and automate shifts schedules.
    </p>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-user-check"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Driver Identity Checks</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Locks verification checks to employee biometrics. Confirms driver identity without cards or keys.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-route"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Route Dispatch Roster</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Applies custom templates for morning delivery dispatches, evening route checks, and overnight long-haul shifts.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-cloud"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Real-Time Cloud Logs</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Logs check-in events directly to the central cloud platform, providing dispatcher feeds instantly.
            </p>
        </div>
    </div>
</section>

<!-- ===== CHALLENGES VS SOLUTIONS ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 space-y-12">
    <div class="text-center space-y-2">
        <h2 class="font-outfit text-3xl font-black text-slate-900">Challenges vs. Solutions</h2>
        <p class="text-slate-550 text-xs">How we streamline transit driver operations.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-rose-50/50 p-6 rounded-2xl border border-rose-100/50 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-rose-800 uppercase tracking-wider">Traditional Roster Pain:</h4>
            <p class="text-[11px] text-slate-650 leading-relaxed">
                Drivers start route dispatches from different sites. Traditional check systems fail to confirm exact start locations or punch times.
            </p>
        </div>
        <div class="bg-emerald-50/50 p-6 rounded-2xl border border-emerald-100/50 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-emerald-800 uppercase tracking-wider">Our AI Approach:</h4>
            <p class="text-[11px] text-slate-650 leading-relaxed">
                Mobile face scan logs confirm drivers identity. Standard verification registers check-in details, uploading data directly to the cloud dashboard.
            </p>
        </div>
    </div>
</section>


<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Optimize your transit operations today</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Deploy mobile biometric verification for your transit fleets today.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('pricing') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">View Pricing</a>
            <a href="{{ route('demo') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Book Demo</a>
        </div>
    </div>
</section>
@endsection
