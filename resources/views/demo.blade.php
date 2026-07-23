@extends('layouts.landing')

@section('title', 'Book a Live Demo & Consultation | Attendance Machine')
@section('meta_description', 'Request a personalized live onboarding session with our implementation engineers or explore live demo credentials.')

@section('content')
<!-- ===== HERO TITLE SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 pt-16 pb-8 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="text-center space-y-4 max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
            Interactive Experience
        </div>
        <h1 class="font-outfit text-4xl sm:text-5xl font-black text-slate-900 leading-tight">
            Schedule a Live Onboarding <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">With Our Implementation Engineers</span>
        </h1>
        <p class="text-slate-550 text-sm max-w-xl mx-auto">
            Book a one-on-one consultation with our implementation engineers or explore live demo credentials.
        </p>
    </div>
</section>



<!-- ===== DEMO CONTENT FORM ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm space-y-6 max-w-2xl mx-auto">
        <div class="space-y-1">
            <h3 class="font-outfit text-xl font-bold text-slate-900">Request Custom Setup Consultation</h3>
            <p class="text-slate-550 text-xs">Fill in your workspace guidelines and an engineer will schedule a demo.</p>
        </div>

        @if(session('success'))
            <div class="p-4 text-xs font-bold text-emerald-800 bg-emerald-50 rounded-2xl border border-emerald-200 flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-600 text-sm"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('demo.request.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="type" value="demo">
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Contact Name</label>
                    <input type="text" name="name" required placeholder="e.g. John Doe" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Work Email</label>
                    <input type="email" name="email" required placeholder="e.g. john@factory.com" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Contact No / Phone</label>
                    <input type="tel" name="phone" required placeholder="e.g. +91 9876543210" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Employee Capacity</label>
                    <select name="employee_capacity" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                        <option value="1 - 10 Employees">1 - 10 Employees</option>
                        <option value="11 - 50 Employees">11 - 50 Employees</option>
                        <option value="51 - 200 Employees">51 - 200 Employees</option>
                        <option value="200+ Employees">200+ Employees</option>
                    </select>
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase font-bold text-slate-500">Primary Industry</label>
                <select name="primary_industry" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                    <option value="Manufacturing & Factory">Manufacturing & Factory</option>
                    <option value="Retail & Supermarket">Retail & Supermarket</option>
                    <option value="Hospitality & Hotel">Hospitality & Hotel</option>
                    <option value="Construction & Field">Construction & Field</option>
                    <option value="Office or IT Startup">Office or IT Startup</option>
                </select>
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase font-bold text-slate-500">Comments or Specific Shift Rules</label>
                <textarea name="comments" rows="3" placeholder="Tell us about rotational shifts, late rules, or ERP integration support you need." class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-full text-center text-xs py-3.5 font-bold shadow-lg">Submit Request</button>
        </form>
    </div>
</section>
@endsection
