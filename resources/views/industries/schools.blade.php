@extends('layouts.landing')

@section('title', 'Attendance Software for Schools & Universities | Attendance Machine')
@section('meta_description', 'Ensure student security, manage teacher shifts, track non-teaching staff, and automate class registers with contactless AI Face Recognition.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Education Sector
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Contactless AI Attendance <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Built for Schools & Universities</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Verify student arrivals, manage teacher schedules, and automate daily registers with high-speed contactless face recognition tablets.
    </p>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-user-shield"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Enhanced Student Security</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Confirm parent authorizations and track exact student check-in/out timestamps to secure school gates.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-bell"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Automated Notifications</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Integrate logs to trigger instant SMS or email notifications to parents once students enter or leave the campus.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-clock-rotate-left"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Flexible Faculty Shifts</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Manage lecture timetables, partial shifts, overtime, and substitute teacher logs on the web platform.
            </p>
        </div>
    </div>
</section>

<!-- ===== CHALLENGES VS SOLUTIONS ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 space-y-12">
    <div class="text-center space-y-2">
        <h2 class="font-outfit text-3xl font-black text-slate-900">Challenges vs. Solutions</h2>
        <p class="text-slate-550 text-xs">How Attendance Machine modernizes classroom registers.</p>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        <div class="bg-rose-50/50 p-6 rounded-2xl border border-rose-100/50 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-rose-800 uppercase tracking-wider">Traditional Roster Pain:</h4>
            <p class="text-[11px] text-slate-650 leading-relaxed">
                Manual roll calls consume up to 10 minutes per class session. Paper directories are easily manipulated, leading to proxy check fraud.
            </p>
        </div>
        <div class="bg-emerald-50/50 p-6 rounded-2xl border border-emerald-100/50 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-emerald-800 uppercase tracking-wider">Our AI Approach:</h4>
            <p class="text-[11px] text-slate-650 leading-relaxed">
                Mount a front tablet camera in classrooms. Students glance at the device to register their logs in under 2 seconds. All logs compile directly into reports.
            </p>
        </div>
    </div>
</section>


<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Optimize your academic registers today</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Deploy contactless kiosks across your school branches today.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('pricing') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">View Pricing</a>
            <a href="{{ route('demo') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Book Demo</a>
        </div>
    </div>
</section>
@endsection
