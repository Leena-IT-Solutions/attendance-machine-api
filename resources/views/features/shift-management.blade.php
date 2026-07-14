@extends('layouts.landing')

@section('title', 'Smart Shift Scheduling Planner | Attendance Machine')
@section('meta_description', 'Configure general, rotational, or night shifts. Set custom late arrival tolerances and track overtime hours.')

@section('content')
<!-- ===== HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 text-center space-y-6 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
        Scheduling Module
    </div>
    <h1 class="font-outfit text-4xl sm:text-6xl font-black text-slate-900 tracking-tight leading-tight max-w-4xl mx-auto">
        Smart Shift Management <br>
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">& Scheduling Planner Engine</span>
    </h1>
    <p class="text-slate-600 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">
        Map custom morning, evening, night, rotating, or general shifts. Customize late buffers and overtime thresholds easily.
    </p>
    <div class="flex justify-center gap-4 pt-2">
        <a href="{{ route('login') }}" class="btn btn-primary text-xs px-6 py-3.5">Launch Shift Planner</a>
        <button id="btn-watch-demo" class="btn btn-outline text-xs px-6 py-3.5 flex items-center gap-2">
            <i class="fa-solid fa-circle-play text-violet-600 text-sm"></i> Watch Setup Tour
        </button>
    </div>
</section>

<!-- ===== BENEFITS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-16">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-business-time"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Rotational Shifts</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Supports rotational and split-shift patterns. Workers are automatically matched to shifts based on punch times.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-clock"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Late Arrival Buffer</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Define custom grace margins (e.g. 15 minutes). Punches beyond buffers trigger tardy flags.
            </p>
        </div>
        <div class="space-y-3">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-base"><i class="fa-solid fa-plus-minus"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Overtime Tracking</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Auto-calculate overtime values when logs exceed shift margins, mapping hours to payroll.
            </p>
        </div>
    </div>
</section>

<!-- ===== VIDEO & INTERACTIVE PREVIEW ===== -->
<section class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-12 gap-12 items-center">
    <!-- Description Details (Col 6) -->
    <div class="md:col-span-6 space-y-6">
        <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Configurable Shifts for Diverse Teams</h2>
        <p class="text-slate-600 text-xs leading-relaxed">
            Assign shift profiles in bulk to department teams. The mobile scan kiosk identifies shift groups and records active durations.
        </p>
        <div class="border-l-2 border-violet-500 pl-4 space-y-2">
            <h4 class="font-outfit text-xs font-bold text-slate-800">Dynamic Schedule Updates</h4>
            <p class="text-slate-550 text-[11px] leading-relaxed">Modify shift rules inside the admin console, and the kiosk terminal updates active schedules instantly.</p>
        </div>
    </div>

    <!-- Mock Player Container (Col 6) -->
    <div class="md:col-span-6 bg-slate-905 rounded-3xl p-6 text-white space-y-4 shadow-xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/10 to-indigo-500/5 pointer-events-none"></div>
        <div class="flex justify-between items-center text-[10px] text-slate-400">
            <span class="font-bold flex items-center gap-1"><i class="fa-solid fa-circle text-[6px] text-emerald-500"></i> Shifts Planner Video</span>
            <span>Duration: 1m 30s</span>
        </div>
        <div class="aspect-video w-full rounded-2xl bg-slate-950 flex flex-col items-center justify-center border border-slate-800/80 relative group cursor-pointer" onclick="document.getElementById('btn-watch-demo').click()">
            <div class="w-14 h-14 rounded-full bg-violet-600 text-white flex items-center justify-center text-lg shadow-lg group-hover:scale-105 transition-transform z-10">
                <i class="fa-solid fa-play ml-0.5"></i>
            </div>
            <span class="text-[9px] uppercase font-bold text-slate-400 tracking-wider mt-3 z-10">Click to watch video</span>
        </div>
    </div>
</section>

<!-- ===== MOCK SCREENSHOT ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 space-y-8">
    <div class="text-center space-y-2 max-w-xl mx-auto">
        <h3 class="font-outfit text-2xl font-black text-slate-900">Shift Templates Console</h3>
        <p class="text-slate-550 text-xs">Define custom shift hours, buffers, and deduction parameters.</p>
    </div>

    <!-- CSS Mock Console -->
    <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-md max-w-4xl mx-auto overflow-x-auto">
        <div class="flex justify-between items-center pb-4 border-b border-slate-100 mb-4 gap-4">
            <span class="font-outfit text-xs font-extrabold text-slate-800">Shift Configuration Templates</span>
            <button onclick="alert('Creating template...')" class="btn btn-primary text-[10px] px-4 py-1.5 font-bold"><i class="fa-solid fa-plus mr-1"></i> New Shift Template</button>
        </div>
        <table class="w-full text-left text-xs border-collapse">
            <thead>
                <tr class="bg-slate-50 text-slate-700 font-bold border-b border-slate-200">
                    <th class="p-3">Shift Name</th>
                    <th class="p-3">Shift Hours</th>
                    <th class="p-3">Grace Buffer</th>
                    <th class="p-3">Active Staff</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white text-slate-650">
                <tr>
                    <td class="p-3 font-bold text-slate-800">General Morning</td>
                    <td class="p-3 font-mono">09:00 - 18:00</td>
                    <td class="p-3 font-mono text-slate-500">15 mins</td>
                    <td class="p-3 font-mono">32 Profiles</td>
                    <td class="p-3"><span class="bg-emerald-50 text-emerald-700 text-[10px] font-bold px-2.5 py-0.5 rounded-full">Active</span></td>
                </tr>
                <tr>
                    <td class="p-3 font-bold text-slate-800">Night Operations</td>
                    <td class="p-3 font-mono">21:00 - 06:00</td>
                    <td class="p-3 font-mono text-slate-500">10 mins</td>
                    <td class="p-3 font-mono">16 Profiles</td>
                    <td class="p-3"><span class="bg-emerald-50 text-emerald-700 text-[10px] font-bold px-2.5 py-0.5 rounded-full">Active</span></td>
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
                <span>Does the system support auto-rotation of shift groups?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. You configure a rotation timeline (e.g. weekly shifts). The system shifts employees automatically from day to night templates based on schedule parameters.
            </div>
        </div>

        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Can we configure overtime calculations for half-day shifts?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. The overtime calculations are calculated based on base hours defined per shift template, logging hours beyond base rules as overtime.
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 text-center text-white space-y-6">
        <h2 class="font-outfit text-2xl sm:text-3xl font-black max-w-xl mx-auto">Get complete control over workspace rosters</h2>
        <p class="text-slate-200 text-xs max-w-md mx-auto">Build scheduling patterns and simplify log processing. Try it free today.</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}" class="btn bg-white text-slate-900 text-xs px-6 py-3 font-bold">Start Free Trial</a>
            <a href="{{ route('contact') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 text-xs px-6 py-3 font-bold">Request Setup Call</a>
        </div>
    </div>
</section>
@endsection
