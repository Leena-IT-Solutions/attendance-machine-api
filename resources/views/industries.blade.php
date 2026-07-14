@extends('layouts.landing')

@section('title', 'Attendance Software Solutions by Industry | Attendance Machine')
@section('meta_description', 'Discover tailored attendance and payroll monitoring systems built specifically for schools, hospitals, factories, hotels, offices, warehouses, construction, and retail.')

@section('content')
<!-- ===== HERO TITLE SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 pt-16 pb-8 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="text-center space-y-4 max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1 rounded-full text-[11px] font-bold text-violet-700 uppercase tracking-widest">
            Vertical Portals
        </div>
        <h1 class="font-outfit text-4xl sm:text-5xl font-black text-slate-900 leading-tight">
            Industry-Specific Solutions <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Built to Match Your Operational Roster</span>
        </h1>
        <p class="text-slate-500 text-sm max-w-xl mx-auto">
            Every workspace has unique challenges. Choose your industry sector below to see how our contactless scanning, GPS boundary verification, and shift planners solve them.
        </p>
    </div>
</section>

<!-- ===== 10 INDUSTRIES GRID ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- 1. Schools -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <div class="space-y-2">
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Schools & Education</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">
                        Track teacher logs, staff shifts, and student attendance lists securely. Streamline parent notifications and student tracking.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('industries.detail.schools') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Solution <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 2. Hospitals -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-house-medical"></i>
                </div>
                <div class="space-y-2">
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Hospitals & Healthcare</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Manage 24/7 rotational shifts for nurses, doctors, and support staff. Zero touchpoint kiosk prevents cross-contamination.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('industries.detail.hospitals') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Solution <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 3. Factories -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-industry"></i>
                </div>
                <div class="space-y-2">
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Factories & Industrial Units</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Handle massive shift changes rapidly. Prevent buddy punching and dirty fingerprint scanner failures with contactless face check-ins.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('industries.detail.factories') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Solution <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 4. Manufacturing -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-gears"></i>
                </div>
                <div class="space-y-2">
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Manufacturing & Plants</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Monitor worker rosters, assembly lines schedules, general shifts buffers, and overtime allowances from a central dashboard.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('industries.detail.manufacturing') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Solution <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 5. Hotels -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-hotel"></i>
                </div>
                <div class="space-y-2">
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Hotels & Hospitality</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Track check-ins for front desk, housekeeping, kitchen, and valet staff. Seamlessly manage rotating schedules and split shifts.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('industries.detail.hotels') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Solution <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 6. Offices -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-building"></i>
                </div>
                <div class="space-y-2">
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Offices & IT Parks</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Modern kiosk check-ins for corporate staff. Integrates late-in rules and calculates payroll deductions automatically.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('industries.detail.offices') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Solution <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 7. Warehouses -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-warehouse"></i>
                </div>
                <div class="space-y-2">
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Warehouses & Logistics</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Track packers, loading crews, and driver rosters. Geofence verification limits check-ins to authorized loading docks.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('industries.detail.warehouses') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Solution <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 8. Construction -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-helmet-safety"></i>
                </div>
                <div class="space-y-2">
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Construction Sites</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Works 100% offline at remote, unpowered sites. GPS geofences verify daily wage laborers are physically present.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('industries.detail.construction') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Solution <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 9. Retail Stores -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-store"></i>
                </div>
                <div class="space-y-2">
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Retail Stores & Chains</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Track check-ins across multiple distributed outlet locations. Compare store performance metrics on a single dashboard.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('industries.detail.retail') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Solution <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 10. Transport -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-truck-front"></i>
                </div>
                <div class="space-y-2">
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Transport & Fleets</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Monitor driver check-ins, route timings, and dispatch shifts. Attaches GPS coordinates to verify start locations.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('industries.detail.transport') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Solution <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-slate-900 rounded-3xl p-8 md:p-12 text-center space-y-4 text-white">
        <h3 class="font-outfit text-xl sm:text-2xl font-bold">Need a customized integration setup?</h3>
        <p class="text-slate-400 text-xs max-w-md mx-auto">Our implementation engineers can custom-build settings to align with your industry's payroll rules.</p>
        <div class="pt-2">
            <a href="{{ route('demo') }}" class="btn btn-primary text-xs px-6 py-3">Schedule Custom Live Demo</a>
        </div>
    </div>
</section>
@endsection
