<x-app-layout>
    <x-slot name="header">
        Subscription Management
    </x-slot>

    <div class="space-y-10">
        <!-- Plan Card -->
        <div class="bg-white p-10 rounded-[3rem] border border-slate-100 shadow-sm relative overflow-hidden">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-8 border-b border-slate-100">
                <div>
                    <span class="text-[10px] font-black bg-indigo-50 text-indigo-600 px-3 py-1 rounded-full uppercase tracking-wider">Current Plan Status</span>
                    <h2 class="text-3xl font-black text-slate-900 tracking-tight mt-3">
                        {{ ucfirst(auth()->user()->subscription_tier) }} Package
                    </h2>
                    <p class="text-slate-400 text-xs mt-1">Managed under Leena IT Solutions SaaS Platform.</p>
                </div>
                <div>
                    <span class="inline-flex items-center gap-1.5 px-4 py-2 rounded-2xl text-xs font-bold uppercase tracking-wider {{ auth()->user()->subscription_active ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700' }}">
                        <span class="w-2 h-2 rounded-full {{ auth()->user()->subscription_active ? 'bg-emerald-500 animate-pulse' : 'bg-rose-500' }}"></span>
                        {{ auth()->user()->subscription_active ? 'Active Subscription' : 'Expired / Inactive' }}
                    </span>
                </div>
            </div>

            <!-- Details List -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 py-8">
                <div>
                    <span class="text-[9px] uppercase font-black text-slate-400 tracking-widest block mb-2">Registered Workspace:</span>
                    <strong class="text-slate-800 font-bold text-sm block">{{ auth()->user()->name }}</strong>
                </div>
                <div>
                    <span class="text-[9px] uppercase font-black text-slate-400 tracking-widest block mb-2">Maximum Employee Capacity:</span>
                    <strong class="text-indigo-600 font-bold text-sm block">{{ auth()->user()->max_employees }} employees</strong>
                </div>
                <div>
                    <span class="text-[9px] uppercase font-black text-slate-400 tracking-widest block mb-2">Subscription Expires On:</span>
                    <strong class="text-slate-800 font-bold text-sm block">
                        {{ auth()->user()->subscription_expires_at ? \Carbon\Carbon::parse(auth()->user()->subscription_expires_at)->format('F d, Y') : 'Lifetime / Unlimited' }}
                    </strong>
                </div>
            </div>
        </div>

        <!-- Available Upgrade Options -->
        <div class="bg-slate-900 p-10 rounded-[3rem] text-white">
            <h3 class="text-2xl font-black tracking-tight mb-3">Upgrade Your Capacity</h3>
            <p class="text-slate-400 text-xs max-w-xl leading-relaxed mb-8 font-medium">
                Need more employees or custom API endpoints? Pick a package tier that matches your business size.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Free Plan -->
                <div class="p-8 rounded-3xl border border-white/10 flex flex-col justify-between">
                    <div>
                        <h4 class="font-extrabold text-sm uppercase tracking-wider text-slate-400 mb-2">Free Starter</h4>
                        <div class="flex items-baseline gap-1 mb-6">
                            <span class="text-3xl font-black">$0</span>
                            <span class="text-xs text-slate-400">/ forever</span>
                        </div>
                        <ul class="space-y-3 text-xs text-slate-300 font-medium mb-8">
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                                Up to 2 Employees
                            </li>
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                                Contactless Face Scan
                            </li>
                        </ul>
                    </div>
                    @if(auth()->user()->subscription_tier === 'free')
                        <button disabled class="w-full py-3 bg-white/10 text-slate-400 text-[10px] font-bold uppercase tracking-wider rounded-xl cursor-default">Current Plan</button>
                    @endif
                </div>

                <!-- Pro Plan -->
                <div class="p-8 rounded-3xl border-2 border-indigo-600 bg-indigo-950/20 flex flex-col justify-between relative">
                    <span class="absolute -top-3 left-6 px-3 py-1 bg-indigo-600 text-white text-[8px] font-black uppercase tracking-widest rounded-full">Popular</span>
                    <div>
                        <h4 class="font-extrabold text-sm uppercase tracking-wider text-indigo-400 mb-2">Pro Scale</h4>
                        <div class="flex items-baseline gap-1 mb-6">
                            <span class="text-3xl font-black">$19</span>
                            <span class="text-xs text-slate-400">/ month</span>
                        </div>
                        <ul class="space-y-3 text-xs text-slate-300 font-medium mb-8">
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                                Up to 25 Employees
                            </li>
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                                PDF & Excel Reports
                            </li>
                        </ul>
                    </div>
                    @if(auth()->user()->subscription_tier === 'pro')
                        <button disabled class="w-full py-3 bg-white/10 text-slate-400 text-[10px] font-bold uppercase tracking-wider rounded-xl cursor-default">Current Plan</button>
                    @else
                        <a href="mailto:leenaitsolutions@gmail.com?subject=Subscription Upgrade to Pro Scale" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-center text-[10px] font-bold uppercase tracking-wider rounded-xl transition-colors">Upgrade Plan</a>
                    @endif
                </div>

                <!-- Enterprise Plan -->
                <div class="p-8 rounded-3xl border border-white/10 flex flex-col justify-between">
                    <div>
                        <h4 class="font-extrabold text-sm uppercase tracking-wider text-slate-400 mb-2">Enterprise</h4>
                        <div class="flex items-baseline gap-1 mb-6">
                            <span class="text-3xl font-black">$49</span>
                            <span class="text-xs text-slate-400">/ month</span>
                        </div>
                        <ul class="space-y-3 text-xs text-slate-300 font-medium mb-8">
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                                Up to 100 Employees
                            </li>
                            <li class="flex items-center gap-2">
                                <i data-lucide="check" class="w-4 h-4 text-emerald-400 shrink-0"></i>
                                Full Custom REST API
                            </li>
                        </ul>
                    </div>
                    @if(auth()->user()->subscription_tier === 'enterprise')
                        <button disabled class="w-full py-3 bg-white/10 text-slate-400 text-[10px] font-bold uppercase tracking-wider rounded-xl cursor-default">Current Plan</button>
                    @else
                        <a href="mailto:leenaitsolutions@gmail.com?subject=Subscription Upgrade to Enterprise" class="w-full py-3 bg-white hover:bg-slate-100 text-slate-900 text-center text-[10px] font-bold uppercase tracking-wider rounded-xl transition-colors">Upgrade Plan</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
