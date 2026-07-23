@extends('layouts.landing')

@section('title', 'Attendance Software for Warehouses & Logistics | Attendance Machine')
@section('meta_description', 'Track loading crews, packers, and driver rosters. Optimize checking logs and verify shift assignments instantly.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Logistics Sector
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Track Warehouse & Logistics Staff <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Built for Packers, Drivers & Crews</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Coordinate shifts for distributed logistics locations, monitor loading docks rosters, and verify driver check-ins instantly.
    </p>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-qrcode"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Designated Punch Kiosks</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Mount tablets at designated sorting and loading docks. Standardize entry scanning checkpoints easily.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-truck-ramp-box"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Packers & Loading Shifts</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Applies custom templates for morning sorting shifts, evening packing slots, and overnight dispatches.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-cloud"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Real-Time Cloud Logs</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Syncs punches directly to the master console, giving administrators visibility over multi-warehouse shifts.
            </p>
        </div>
    </div>
</section>

<!-- ===== CHALLENGES VS SOLUTIONS ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 space-y-12">
    <div class="text-center space-y-2">
        <h2 class="font-outfit text-3xl font-black text-slate-900">Challenges vs. Solutions</h2>
        <p class="text-slate-550 text-xs">How we streamline warehouse operations.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-rose-50/50 p-6 rounded-2xl border border-rose-100/50 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-rose-800 uppercase tracking-wider">Traditional Roster Pain:</h4>
            <p class="text-[11px] text-slate-650 leading-relaxed">
                Warehouses operate over large regions. Remote loading points lack network, and tracking packer shift adjustments manually takes hours.
            </p>
        </div>
        <div class="bg-emerald-50/50 p-6 rounded-2xl border border-emerald-100/50 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-emerald-800 uppercase tracking-wider">Our AI Approach:</h4>
            <p class="text-[11px] text-slate-650 leading-relaxed">
                Contactless tablets authenticate employee profiles instantly. Real-time sync registers attendance checks, uploading to the cloud server immediately.
            </p>
        </div>
    </div>
</section>


<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Optimize your warehouse coordination today</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Deploy contactless kiosk tablets across your warehouse facilities today.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('pricing') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">View Pricing</a>
            <a href="{{ route('demo') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Book Demo</a>
        </div>
    </div>
</section>
@endsection
