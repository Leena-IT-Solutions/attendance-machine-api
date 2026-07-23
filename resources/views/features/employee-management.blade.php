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

<!-- ===== MODULE DETAILS PREVIEW ===== -->
<section class="max-w-4xl mx-auto px-6 py-16 text-center space-y-6">
    <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Simple Onboarding for Distributed Teams</h2>
    <p class="text-slate-600 text-sm leading-relaxed max-w-2xl mx-auto">
        Add team profiles through the console web dashboard or upload batch Excel templates. Managers can enroll worker face signatures directly using the mobile camera.
    </p>
    <div class="inline-block bg-violet-50 border border-violet-100 rounded-2xl p-6 max-w-md mx-auto text-left mt-4">
        <h4 class="font-outfit text-xs font-bold text-violet-800 uppercase tracking-wider flex items-center gap-1.5">
            <i class="fa-solid fa-rotate text-violet-600"></i> Multi-Device Synchronization
        </h4>
        <p class="text-slate-600 text-[11px] leading-relaxed mt-2">Employee lists added in the console cloud are synchronized to all kiosk phones and tablets immediately.</p>
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


<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Ready to upgrade your team check-ins?</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Download the Attendance Machine application on your mobile terminal.</p>
        <div class="flex flex-wrap justify-center items-center gap-4 pt-2">
            <a href="https://play.google.com/store/apps/details?id=in.leenaitsolutions.attendance.machine&hl=en_IN" target="_blank" rel="noopener" class="download-badge bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300">
                <i class="fa-brands fa-google-play text-2xl text-violet-500"></i>
                <div class="text-left">
                    <span class="text-slate-400 block text-[9px] leading-tight">GET IT ON</span>
                    <strong class="text-white text-xs">Google Play</strong>
                </div>
            </a>
            <a href="https://apps.apple.com/in/app/attendance-machine/id6773431736" target="_blank" rel="noopener" class="download-badge bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300">
                <i class="fa-brands fa-apple text-2xl text-white"></i>
                <div class="text-left">
                    <span class="text-slate-400 block text-[9px] leading-tight">DOWNLOAD ON THE</span>
                    <strong class="text-white text-xs">App Store</strong>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection
