<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('users.index') }}" class="p-2 -ml-2 text-slate-400 hover:text-slate-600 transition-colors">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </a>
            <h2 class="text-xl font-bold tracking-tight text-slate-800">
                {{ __('User Details & Employees') }}
            </h2>
        </div>
    </x-slot>

    <div class="space-y-8 pb-20">
        <!-- User Summary Card -->
        <div class="p-6 bg-white border border-slate-100 rounded-[2.5rem] shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 rounded-[1.5rem] bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold text-2xl uppercase border-2 border-white shadow-sm shrink-0">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <div>
                    <h3 class="text-2xl font-black text-slate-900 leading-tight">{{ $user->name }}</h3>
                    <div class="mt-1.5 flex items-center gap-2">
                        <span class="text-[9px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2 py-1 rounded-md leading-none">{{ $user->role }}</span>
                        <span class="text-slate-300">|</span>
                        <span class="text-xs text-slate-500 font-medium">Created {{ $user->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>

            <!-- Contact and Stats Info -->
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8 text-sm text-slate-500 font-medium bg-slate-50/50 p-4 rounded-2xl md:ml-auto">
                <!-- Email -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 flex items-center justify-center shrink-0">
                        <i data-lucide="mail" class="w-3.5 h-3.5 text-indigo-400"></i>
                    </div>
                    <span>{{ $user->email }}</span>
                </div>
                
                <!-- Phone -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 flex items-center justify-center shrink-0">
                        <i data-lucide="phone" class="w-3.5 h-3.5 text-emerald-400"></i>
                    </div>
                    <span>{{ $user->phone ?? 'Not provided' }}</span>
                </div>

                <!-- Count -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 flex items-center justify-center shrink-0">
                        <i data-lucide="users" class="w-3.5 h-3.5 text-violet-500"></i>
                    </div>
                    <span class="font-bold text-slate-700">{{ count($employees) }} {{ count($employees) == 1 ? 'Employee' : 'Employees' }}</span>
                </div>
            </div>
        </div>

        <!-- Employees List Section -->
        <div>
            <div class="mb-6 flex items-center justify-between">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Registered Employees</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($employees as $employee)
                    <div class="p-6 bg-white border border-slate-100 rounded-[2.5rem] shadow-sm flex items-center space-x-5 group hover:border-indigo-100 transition-all transform hover:scale-[1.01]">
                        <!-- Photo / Avatar -->
                        <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center overflow-hidden border-2 border-white shadow-sm shrink-0">
                            @if($employee->photo)
                                <img src="/storage/{{ $employee->photo }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold text-2xl uppercase">
                                    {{ substr($employee->name, 0, 1) }}
                                </div>
                            @endif
                        </div>

                        <!-- Details -->
                        <div class="flex-1 min-w-0">
                            <h4 class="font-bold text-slate-900 mb-1 truncate text-lg leading-tight">{{ $employee->name }}</h4>
                            <div class="flex flex-col gap-1 text-[11px] font-bold tracking-wide uppercase">
                                <div class="flex items-center text-slate-400">
                                    <span class="text-indigo-600 mr-2">CODE: {{ $employee->code }}</span>
                                </div>
                                <div class="flex items-center text-slate-500">
                                    <i data-lucide="clock" class="w-3 h-3 text-slate-400 mr-1.5 shrink-0"></i>
                                    <span>
                                        @if($employee->shift)
                                            {{ $employee->shift->name }} ({{ \Carbon\Carbon::parse($employee->shift->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($employee->shift->end_time)->format('h:i A') }})
                                        @else
                                            Standard Shift (07:30 AM - 04:30 PM)
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white border border-slate-100 rounded-[2.5rem] shadow-sm">
                        <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i data-lucide="user-plus" class="w-10 h-10 text-slate-200"></i>
                        </div>
                        <h3 class="text-slate-900 font-bold text-lg mb-2">{{ __('No Employees Yet') }}</h3>
                        <p class="text-slate-400 text-sm max-w-[280px] mx-auto">{{ __('This user has not registered any team members in their directory yet.') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
