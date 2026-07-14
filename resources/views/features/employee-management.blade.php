@extends('layouts.landing')

@section('title', 'Cloud Employee Profile Directory | Attendance Machine')
@section('meta_description', 'Manage employee details, assign custom shift patterns, review audit logs, and maintain active rosters inside our secure HR Cloud directory.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Directory Module
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Centralized Cloud Employee Directory <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">& Staff Profile Manager</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Onboard team members, edit access permissions, allocate shift groups, and trace daily updates within a unified database dashboard.
    </p>
    <div class="flex justify-center gap-4 pt-2">
        <a href="{{ route('login') }}" class="btn btn-primary text-xs px-6 py-3.5">Launch Active Directory</a>
        <button id="btn-watch-demo" class="btn btn-outline text-xs px-6 py-3.5 flex items-center gap-2">
            <i class="fa-solid fa-circle-play text-violet-600 text-sm"></i> Tour Dashboard
        </button>
    </div>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-users"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Dynamic Profiles</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Add profile details, worker codes, emergency contact information, and setup active biometric faces from one interface.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-layer-group"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Bulk Shift Allocations</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Assign departments or teams to specific shift rules in bulk. Shift adjustments sync to worker devices immediately.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-clipboard-list"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Audit logs & History</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Maintains a trace log of employee edits, shift shifts, and administrator profile modifications for complete accountability.
            </p>
        </div>
    </div>
</section>

<!-- ===== VIDEO & INTERACTIVE PREVIEW ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-12 gap-12 items-center">
    <!-- Description Details (Col 6) -->
    <div class="md:col-span-6 space-y-6">
        <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Simple Onboarding for Distributed Teams</h2>
        <p class="text-slate-600 text-xs leading-relaxed">
            Add team profiles through the console web dashboard or upload batch Excel templates. Managers can enroll worker face signatures directly using the mobile camera.
        </p>
        <div class="border-l-2 border-violet-500 pl-4 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-slate-800">Multi-Device Synchronization</h4>
            <p class="text-slate-500 text-[11px] leading-relaxed">Employee lists added in the console cloud are synchronized to all kiosk phones and tablets immediately.</p>
        </div>
    </div>

    <!-- Mock Player Container (Col 6) -->
    <div class="md:col-span-6 bg-slate-905 rounded-3xl p-6 text-white space-y-4 shadow-xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/10 to-indigo-500/5 pointer-events-none"></div>
        <div class="flex justify-between items-center text-[10px] text-slate-400">
            <span class="font-bold flex items-center gap-1"><i class="fa-solid fa-circle text-[6px] text-emerald-500"></i> Staff Directory Tour</span>
            <span>Duration: 1m 20s</span>
        </div>
        <div class="aspect-video w-full rounded-2xl bg-slate-950 flex flex-col items-center justify-center border border-slate-800/80 relative group cursor-pointer" onclick="document.getElementById('btn-watch-demo').click()">
            <div class="w-14 h-14 rounded-full bg-violet-600 text-white flex items-center justify-center text-lg shadow-lg group-hover:scale-105 transition-transform z-10">
                <i class="fa-solid fa-play ml-0.5"></i>
            </div>
            <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider mt-3 z-10">Click to watch video tour</span>
        </div>
    </div>
</section>

<!-- ===== MOCK SCREENSHOT ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 space-y-8">
    <div class="text-center space-y-2 max-w-xl mx-auto">
        <h3 class="font-outfit text-2xl font-black text-slate-900">Interactive Employee Roster Directory</h3>
        <p class="text-slate-500 text-xs">Manage workspace profiles, assign departments, and check verification logs.</p>
    </div>

    <!-- CSS Mock Console -->
    <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-md max-w-4xl mx-auto overflow-x-auto">
        <div class="flex justify-between items-center pb-4 border-b border-slate-100 mb-4 gap-4">
            <span class="font-outfit text-xs font-extrabold text-slate-800">Workspace Directory</span>
            <button onclick="alert('Adding sample employee...')" class="btn btn-primary text-[10px] px-4 py-1.5 font-bold"><i class="fa-solid fa-plus mr-1"></i> Add Employee</button>
        </div>
        <table class="w-full text-left text-xs border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-700 font-bold border-b border-slate-200">
                    <th class="p-3">Staff ID</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Department</th>
                    <th class="p-3">Assigned Shift</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white text-slate-650">
                <tr>
                    <td class="p-3 font-mono font-bold text-slate-800">EMP-304</td>
                    <td class="p-3">Sarah Jenkins</td>
                    <td class="p-3">Operations</td>
                    <td class="p-3">Day Shift A</td>
                    <td class="p-3"><button onclick="alert('Editing Sarah...')" class="text-violet-600 hover:text-violet-800 font-bold text-[11px]"><i class="fa-solid fa-pen-to-square"></i> Edit</button></td>
                </tr>
                <tr>
                    <td class="p-3 font-mono font-bold text-slate-800">EMP-305</td>
                    <td class="p-3">Tony Stark</td>
                    <td class="p-3">Engineering</td>
                    <td class="p-3">Overtime Flex</td>
                    <td class="p-3"><button onclick="alert('Editing Tony...')" class="text-violet-600 hover:text-violet-800 font-bold text-[11px]"><i class="fa-solid fa-pen-to-square"></i> Edit</button></td>
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
                <span>Can I import employees in bulk using Excel spreadsheets?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. Under settings, you can download our CSV template, fill in employee names, IDs, and shift groups, and upload it back to register up to 500 workers at once.
            </div>
        </div>

        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>How do we upload facial profiles for bulk imports?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                After bulk-importing employee data, administrators can use the mobile app on a smartphone to snap profile photos for each worker. Setup takes only a few seconds per employee.
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Get your employee directory initialized today</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Build lists and track check-ins for up to 2 staff members completely free forever.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">Onboard Now</a>
            <a href="{{ route('contact') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Consult Setup</a>
        </div>
    </div>
</section>
@endsection
