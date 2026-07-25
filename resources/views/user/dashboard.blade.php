<x-app-layout>
    <x-slot name="header">
        Workspace Dashboard
    </x-slot>

    <div class="space-y-10">
        @if (session('status'))
            <div class="bg-emerald-50 border border-emerald-100 text-emerald-800 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-500"></i>
                <span class="text-xs font-bold uppercase tracking-wider">{{ session('status') }}</span>
            </div>
        @endif

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            <!-- Active Employees Card -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-indigo-500/5 transition-all duration-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Enrolled Employees</p>
                        <h3 class="text-5xl font-black text-slate-900 tracking-tighter leading-none">{{ $totalEmployees }}</h3>
                    </div>
                    <div class="w-20 h-20 bg-indigo-50 rounded-3xl flex items-center justify-center text-indigo-500 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-inner">
                        <i data-lucide="users" class="w-10 h-10"></i>
                    </div>
                </div>
                <div class="mt-8 flex items-center gap-2 text-indigo-500">
                    <span class="text-[10px] font-bold uppercase tracking-widest">Workspace capacity: {{ auth()->user()->max_employees }} employees</span>
                </div>
            </div>

            <!-- Today's Attendance logs Card -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-emerald-500/5 transition-all duration-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Punches Today</p>
                        <h3 class="text-5xl font-black text-slate-900 tracking-tighter leading-none">{{ $todayAttendance }}</h3>
                    </div>
                    <div class="w-20 h-20 bg-emerald-50 rounded-3xl flex items-center justify-center text-emerald-500 group-hover:scale-110 group-hover:-rotate-6 transition-all duration-500 shadow-inner">
                        <i data-lucide="calendar-check-2" class="w-10 h-10"></i>
                    </div>
                </div>
                <div class="mt-8 flex items-center gap-2 text-emerald-500">
                    <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                    <span class="text-[10px] font-bold uppercase tracking-widest">Logs for {{ now()->format('M d, Y') }}</span>
                </div>
            </div>

            <!-- Subscription Details Card -->
            <div class="bg-slate-900 p-8 rounded-[2.5rem] shadow-2xl shadow-slate-200 flex flex-col justify-between overflow-hidden relative group text-white">
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-white/5 rounded-full blur-2xl group-hover:bg-white/10 transition-all duration-700"></div>
                <div class="relative z-10 space-y-6">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-4">Subscription Plan</p>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-indigo-400">
                                <i data-lucide="crown" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <p class="text-white font-black uppercase text-sm tracking-tight">{{ ucfirst(auth()->user()->subscription_tier) }} Plan</p>
                                <p class="text-indigo-400 text-[10px] font-bold tracking-widest uppercase mt-0.5">
                                    {{ auth()->user()->subscription_active ? 'Active' : 'Inactive' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 border-t border-white/10 flex justify-between items-center">
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Expires: {{ auth()->user()->subscription_expires_at ? \Carbon\Carbon::parse(auth()->user()->subscription_expires_at)->format('M d, Y') : 'Lifetime' }}</span>
                        <a href="{{ route('subscription.index') }}" class="bg-white/10 hover:bg-white/20 text-white font-bold text-[9px] uppercase tracking-wider py-2 px-3 rounded-lg transition-all duration-300">
                            Upgrade
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Links -->
        <div class="bg-white p-10 rounded-[3rem] border border-slate-100 shadow-sm">
            <h3 class="text-2xl font-black text-slate-900 tracking-tight mb-8">Quick Actions & Shortcuts</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="{{ route('employees.create') }}" class="p-6 border border-slate-100 rounded-3xl flex flex-col justify-between hover:border-indigo-100 hover:shadow-md transition-all group">
                    <div class="w-12 h-12 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-500 group-hover:scale-105 transition-transform mb-6">
                        <i data-lucide="user-plus" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm mb-1">Add Employee</h4>
                        <p class="text-slate-400 text-[10px] font-medium leading-relaxed">Enroll new staff member's face coordinates.</p>
                    </div>
                </a>

                <a href="{{ route('employees.index') }}" class="p-6 border border-slate-100 rounded-3xl flex flex-col justify-between hover:border-indigo-100 hover:shadow-md transition-all group">
                    <div class="w-12 h-12 bg-sky-50 rounded-2xl flex items-center justify-center text-sky-500 group-hover:scale-105 transition-transform mb-6">
                        <i data-lucide="users" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm mb-1">Manage Employees</h4>
                        <p class="text-slate-400 text-[10px] font-medium leading-relaxed">View, edit, or archive active employee data.</p>
                    </div>
                </a>

                <a href="{{ route('attendance.index') }}" class="p-6 border border-slate-100 rounded-3xl flex flex-col justify-between hover:border-indigo-100 hover:shadow-md transition-all group">
                    <div class="w-12 h-12 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-500 group-hover:scale-105 transition-transform mb-6">
                        <i data-lucide="history" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm mb-1">Attendance Logs</h4>
                        <p class="text-slate-400 text-[10px] font-medium leading-relaxed">View raw facial recognition scan history.</p>
                    </div>
                </a>

                <a href="{{ route('reports.index') }}" class="p-6 border border-slate-100 rounded-3xl flex flex-col justify-between hover:border-indigo-100 hover:shadow-md transition-all group">
                    <div class="w-12 h-12 bg-violet-50 rounded-2xl flex items-center justify-center text-violet-500 group-hover:scale-105 transition-transform mb-6">
                        <i data-lucide="file-text" class="w-6 h-6"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm mb-1">Export Reports</h4>
                        <p class="text-slate-400 text-[10px] font-medium leading-relaxed">Generate XLS, PDF, and XML attendance books.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
