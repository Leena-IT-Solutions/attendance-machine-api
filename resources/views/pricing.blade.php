@extends('layouts.landing')

@section('title', 'Pricing Plans | Attendance Machine')
@section('meta_description', 'Choose the perfect plan for your business. Affordable tiers for small teams to large factories, featuring our interactive pricing calculator and comparison matrix.')

@section('content')
<!-- ===== HERO TITLE SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 pt-16 pb-8 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="text-center space-y-4 max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1 rounded-full text-[11px] font-bold text-violet-700 uppercase tracking-widest">
            Pricing Options
        </div>
        <h1 class="font-outfit text-4xl sm:text-5xl font-black text-slate-900 leading-tight">
            Transparent Pricing Structured <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">To Grow With Your Team size</span>
        </h1>
        <p class="text-slate-500 text-sm max-w-xl mx-auto">
            Choose a budget plan that matches your employee count. Pay only for the resources your workspace uses, with zero hidden hardware costs.
        </p>
    </div>
</section>

<!-- ===== INTERACTIVE CALCULATOR ===== -->
<section class="max-w-4xl mx-auto px-6 py-8">
    <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-md space-y-8">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <div>
                <h3 class="font-outfit font-black text-slate-900 text-xl">Interactive Cost Estimator</h3>
                <p class="text-slate-500 text-xs mt-1">Slide to select your active employee threshold</p>
            </div>
            
            <!-- Billing Toggle -->
            <div class="bg-slate-100 p-1 rounded-xl flex items-center shrink-0 border border-slate-200">
                <button id="billing-monthly" class="px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 bg-white text-slate-900 shadow-sm">Monthly Billing</button>
                <button id="billing-yearly" class="px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 text-slate-500 hover:text-slate-900 flex items-center gap-1.5">
                    Yearly Billing <span class="bg-violet-100 text-violet-700 text-[9px] px-1.5 py-0.5 rounded font-black">20% Off</span>
                </button>
            </div>
        </div>

        <div class="space-y-6">
            <!-- Range Slider -->
            <div class="space-y-2">
                <div class="flex justify-between text-xs font-bold text-slate-600">
                    <span>Min: 2 Staff (Free)</span>
                    <span>Max: Unlimited</span>
                </div>
                <input type="range" id="employee-slider" min="0" max="5" value="2" class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-violet-600">
            </div>

            <!-- Value Display Cards -->
            <div class="grid sm:grid-cols-2 gap-6 bg-slate-550/5 border border-slate-100 rounded-2xl p-6">
                <div class="space-y-1">
                    <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Plan Selected</span>
                    <h4 class="font-outfit text-slate-800 text-2xl font-black" id="employee-count-val">Up to 20 Staff</h4>
                    <p class="text-xs text-slate-500" id="pricing-details-summary">Flat rate loaded with all system features.</p>
                </div>
                <div class="sm:text-right flex flex-col justify-center sm:items-end">
                    <div class="flex items-center sm:justify-end gap-1.5">
                        <span class="text-xs font-bold text-emerald-600 bg-emerald-50 border border-emerald-100 px-3 py-1.5 rounded-full" id="savings-badge">Best Value</span>
                    </div>
                    <div class="mt-2">
                        <span class="font-outfit text-3xl font-black text-slate-900" id="price-calculated">₹100</span>
                        <span class="text-slate-500 text-xs font-bold" id="pricing-period">/ month</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center pt-2">
            <a href="{{ route('login') }}" class="btn btn-primary px-8 py-4 text-xs font-bold shadow-lg">Activate This Plan Now</a>
        </div>
    </div>
</section>

<!-- ===== CORE PLANS CARDS ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid md:grid-cols-3 gap-8">
        <!-- Basic Starter -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
            <div class="space-y-4">
                <span class="text-slate-400 font-bold uppercase text-[10px] tracking-wider">Small Teams</span>
                <h3 class="font-outfit text-xl font-bold text-slate-900">Basic Starter</h3>
                <p class="text-slate-500 text-xs">For small startups looking to replace manual notebooks.</p>
                <div class="pt-4">
                    <span class="font-outfit text-4xl font-black text-slate-900">₹0</span>
                    <span class="text-slate-400 text-xs">/ free forever</span>
                </div>
                <ul class="space-y-3 text-xs text-slate-600 pt-6 border-t border-slate-50">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> Up to 2 registered staff</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> AI Contactless Face Check-in</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> Standard Shift Profile</li>
                    <li class="flex items-center gap-2 text-slate-400"><i class="fa-solid fa-xmark"></i> No Custom Reports Export</li>
                    <li class="flex items-center gap-2 text-slate-400"><i class="fa-solid fa-xmark"></i> No Developer API & Webhooks</li>
                </ul>
            </div>
            <div class="pt-8">
                <a href="{{ route('login') }}" class="btn btn-outline w-full text-center text-xs py-3 font-bold">Select Free Tier</a>
            </div>
        </div>

        <!-- Premium Pro -->
        <div class="bg-white border-2 border-violet-500 rounded-3xl p-8 shadow-md flex flex-col justify-between relative">
            <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-violet-600 text-white text-[9px] uppercase font-black px-4 py-1.5 rounded-full tracking-widest">Most Popular</span>
            <div class="space-y-4">
                <span class="text-violet-600 font-bold uppercase text-[10px] tracking-wider">Growing Businesses</span>
                <h3 class="font-outfit text-xl font-bold text-slate-900">Premium Pro</h3>
                <p class="text-slate-500 text-xs">Complete toolkit for factories, retailers, and builders.</p>
                <div class="pt-4">
                    <span class="font-outfit text-4xl font-black text-slate-900">₹500</span>
                    <span class="text-slate-400 text-xs">/ up to 100 staff</span>
                </div>
                <ul class="space-y-3 text-xs text-slate-600 pt-6 border-t border-slate-50">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> Up to 100 staff members</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> AI Contactless Face Check-in</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> Offline mode support</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> Custom shifts & Overtime deductions</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> Export Excel/PDF sheets</li>
                </ul>
            </div>
            <div class="pt-8">
                <a href="{{ route('login') }}" class="btn btn-primary w-full text-center text-xs py-3 font-bold">Start 14-day Free Trial</a>
            </div>
        </div>

        <!-- Corporate Unlimited -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
            <div class="space-y-4">
                <span class="text-slate-400 font-bold uppercase text-[10px] tracking-wider">Enterprises</span>
                <h3 class="font-outfit text-xl font-bold text-slate-900">Corporate Unlimited</h3>
                <p class="text-slate-500 text-xs">Unlimited staff capacity with dedicated direct support channels.</p>
                <div class="pt-4">
                    <span class="font-outfit text-4xl font-black text-slate-900">₹1,000</span>
                    <span class="text-slate-400 text-xs">/ month flat rate</span>
                </div>
                <ul class="space-y-3 text-xs text-slate-600 pt-6 border-t border-slate-50">
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> Unlimited employees and devices</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> All Pro shifts & offline features</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> Developer API integrations & Webhooks</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> Dedicated customer support manager</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-check text-emerald-500"></i> Custom backup & uptime compliance SLA</li>
                </ul>
            </div>
            <div class="pt-8">
                <a href="{{ route('login') }}" class="btn btn-outline w-full text-center text-xs py-3 font-bold">Contact Sales Team</a>
            </div>
        </div>
    </div>
</section>

<!-- ===== COMPARISON MATRIX ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 space-y-8">
    <div class="text-center space-y-2">
        <h3 class="font-outfit text-2xl font-black text-slate-900">Detailed Feature Comparison</h3>
        <p class="text-slate-500 text-xs">Check out features included across our three subscription tiers</p>
    </div>

    <div class="overflow-x-auto border border-slate-100 rounded-3xl">
        <table class="w-full text-left text-xs border-collapse">
            <thead>
                <tr class="bg-slate-100 text-slate-800 font-bold border-b border-slate-200">
                    <th class="p-4 sm:p-5">Feature</th>
                    <th class="p-4 sm:p-5">Basic Starter</th>
                    <th class="p-4 sm:p-5">Premium Pro</th>
                    <th class="p-4 sm:p-5">Corporate Unlimited</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 bg-white text-slate-600">
                <tr>
                    <td class="p-4 font-bold text-slate-800">Active Staff Capacity</td>
                    <td class="p-4 text-slate-500">Up to 2 Staff</td>
                    <td class="p-4 text-slate-800 font-medium">Up to 100 Staff</td>
                    <td class="p-4 text-violet-600 font-bold">Unlimited Staff</td>
                </tr>
                <tr>
                    <td class="p-4 font-bold text-slate-800">Contactless Face Check-in</td>
                    <td class="p-4 text-emerald-500 text-lg"><i class="fa-solid fa-circle-check"></i></td>
                    <td class="p-4 text-emerald-500 text-lg"><i class="fa-solid fa-circle-check"></i></td>
                    <td class="p-4 text-emerald-500 text-lg"><i class="fa-solid fa-circle-check"></i></td>
                </tr>
                <tr>
                    <td class="p-4 font-bold text-slate-800">Offline Sync Mode</td>
                    <td class="p-4 text-slate-300 text-lg"><i class="fa-solid fa-circle-xmark"></i></td>
                    <td class="p-4 text-emerald-500 text-lg"><i class="fa-solid fa-circle-check"></i></td>
                    <td class="p-4 text-emerald-500 text-lg"><i class="fa-solid fa-circle-check"></i></td>
                </tr>
                <tr>
                    <td class="p-4 font-bold text-slate-800">Shift Deductions & LOP Rules</td>
                    <td class="p-4 text-slate-300 text-lg"><i class="fa-solid fa-circle-xmark"></i></td>
                    <td class="p-4 text-emerald-500 text-lg"><i class="fa-solid fa-circle-check"></i></td>
                    <td class="p-4 text-emerald-500 text-lg"><i class="fa-solid fa-circle-check"></i></td>
                </tr>
                <tr>
                    <td class="p-4 font-bold text-slate-800">Custom Reports Export (Excel/PDF)</td>
                    <td class="p-4 text-slate-300 text-lg"><i class="fa-solid fa-circle-xmark"></i></td>
                    <td class="p-4 text-emerald-500 text-lg"><i class="fa-solid fa-circle-check"></i></td>
                    <td class="p-4 text-emerald-500 text-lg"><i class="fa-solid fa-circle-check"></i></td>
                </tr>
                <tr>
                    <td class="p-4 font-bold text-slate-800">Developer API & Webhooks</td>
                    <td class="p-4 text-slate-300 text-lg"><i class="fa-solid fa-circle-xmark"></i></td>
                    <td class="p-4 text-slate-300 text-lg"><i class="fa-solid fa-circle-xmark"></i></td>
                    <td class="p-4 text-emerald-500 text-lg"><i class="fa-solid fa-circle-check"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection
