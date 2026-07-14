@extends('layouts.landing')

@section('title', 'Product Features Directory | Attendance Machine')
@section('meta_description', 'Explore our comprehensive toolkit: face recognition kiosks, geofenced GPS, shift planners, automated LOP payroll integrations, and custom export modules.')

@section('content')
<!-- ===== HERO TITLE SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 pt-16 pb-8 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="text-center space-y-4 max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1 rounded-full text-[11px] font-bold text-violet-700 uppercase tracking-widest">
            Complete Suite
        </div>
        <h1 class="font-outfit text-4xl sm:text-5xl font-black text-slate-900 leading-tight">
            Explore All Features & Modules <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Built for Modern Workforce Operations</span>
        </h1>
        <p class="text-slate-500 text-sm max-w-xl mx-auto">
            Discover how each specialized feature fits into your business operations: from high-accuracy biometric checks to detailed PDF and Excel reporting.
        </p>
    </div>
</section>

<!-- ===== 10 FEATURES GRID ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- 1. Face Recognition -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-user-astronaut"></i>
                </div>
                <div class="space-y-2">
                    <span class="text-[9px] uppercase font-black text-violet-650 tracking-wider bg-violet-50 px-2 py-0.5 rounded font-outfit">Core AI</span>
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">AI Face Recognition</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">
                        Verify identity in under 2 seconds. ArcFace models map abstract 512-bit signatures to prevent buddy punching.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('features.detail.face-recognition') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Feature <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 2. Employee Management -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="space-y-2">
                    <span class="text-[9px] uppercase font-black text-violet-650 tracking-wider bg-violet-50 px-2 py-0.5 rounded font-outfit">HR Directory</span>
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Employee Management</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Track employee directories, assign roster groups, and view diagnostic trace logs from the admin dashboard.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('features.detail.employee-management') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Feature <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 3. Reports -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-file-invoice"></i>
                </div>
                <div class="space-y-2">
                    <span class="text-[9px] uppercase font-black text-violet-650 tracking-wider bg-violet-50 px-2 py-0.5 rounded font-outfit">Audit Logs</span>
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Daily & Monthly Reports</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Automate daily presence sheets, shift analytics summaries, and Loss of Pay (LOP) registers.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('features.detail.reports') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Feature <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 4. Developer API -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-code"></i>
                </div>
                <div class="space-y-2">
                    <span class="text-[9px] uppercase font-black text-violet-650 tracking-wider bg-violet-50 px-2 py-0.5 rounded font-outfit">ERP Integrations</span>
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Developer API & Webhooks</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Sync check-in timestamps to internal systems. Configure post hooks to automate backend operations.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('features.detail.api') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Feature <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 5. Payroll Calculations -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-calculator"></i>
                </div>
                <div class="space-y-2">
                    <span class="text-[9px] uppercase font-black text-violet-650 tracking-wider bg-violet-50 px-2 py-0.5 rounded font-outfit">Salary Compliance</span>
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Automated LOP Payroll</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Define custom buffer windows and grace tolerances to calculate late deductions automatically.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('features.detail.payroll') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Feature <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 6. Company Matrix -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div class="space-y-2">
                    <span class="text-[9px] uppercase font-black text-violet-650 tracking-wider bg-violet-50 px-2 py-0.5 rounded font-outfit">Roster Grid</span>
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Company Matrix Overview</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Calendar grids mapping Present, Absent, Late, and Half-day blocks for all profiles.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('features.detail.company-matrix') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Feature <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 7. Employee Performance -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-star"></i>
                </div>
                <div class="space-y-2">
                    <span class="text-[9px] uppercase font-black text-violet-650 tracking-wider bg-violet-50 px-2 py-0.5 rounded font-outfit">Team Ratings</span>
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Performance Analytics</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Track punctuality scoring, check-in offsets, and total logged hours metrics per worker.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('features.detail.employee-performance') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Feature <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 8. PDF Export -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>
                <div class="space-y-2">
                    <span class="text-[9px] uppercase font-black text-violet-650 tracking-wider bg-violet-50 px-2 py-0.5 rounded font-outfit">Custom Branding</span>
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">PDF Print Templates</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Download formatted, print-friendly A4 landscape sheets pre-built with manager signature blocks.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('features.detail.pdf-export') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Feature <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 9. Excel Export -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-file-excel"></i>
                </div>
                <div class="space-y-2">
                    <span class="text-[9px] uppercase font-black text-violet-650 tracking-wider bg-violet-50 px-2 py-0.5 rounded font-outfit">Active Formulas</span>
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Excel Sheets Export</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Export matrices and calculated deduction summaries with active math formulas inside.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('features.detail.excel-export') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Feature <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- 10. Shift Management -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="w-12 h-12 rounded-2xl bg-violet-50 text-violet-600 flex items-center justify-center text-xl group-hover:bg-violet-650 group-hover:text-white transition-colors">
                    <i class="fa-solid fa-business-time"></i>
                </div>
                <div class="space-y-2">
                    <span class="text-[9px] uppercase font-black text-violet-650 tracking-wider bg-violet-50 px-2 py-0.5 rounded font-outfit">Scheduling</span>
                    <h3 class="font-outfit font-extrabold text-slate-900 text-lg">Smart Shift Planner</h3>
                    <p class="text-slate-550 text-xs leading-relaxed">
                        Create custom General, General Extension, general overtime, general double shift, or General Split Shift rules.
                    </p>
                </div>
            </div>
            <div class="pt-6 border-t border-slate-50 mt-6">
                <a href="{{ route('features.detail.shift-management') }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Explore Feature <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-slate-900 rounded-3xl p-8 md:p-12 text-center space-y-4 text-white">
        <h3 class="font-outfit text-xl sm:text-2xl font-bold">Want to see all feature groups configured live?</h3>
        <p class="text-slate-400 text-xs max-w-md mx-auto">Get in touch to arrange an customized onboarding walkthrough session mapping your team's operational requirements.</p>
        <div class="pt-2">
            <a href="{{ route('demo') }}" class="btn btn-primary text-xs px-6 py-3">Schedule Custom Live Demo</a>
        </div>
    </div>
</section>
@endsection
