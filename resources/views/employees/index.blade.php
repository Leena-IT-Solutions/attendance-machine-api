<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold tracking-tight text-slate-900">
                {{ __('Employees') }}
            </h2>
            <a href="{{ route('employees.create') }}" class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-200 active:scale-90 transition-transform">
                <i data-lucide="plus" class="w-6 h-6"></i>
            </a>
        </div>
    </x-slot>

    <div class="space-y-6 pb-20" x-data="{ activeTab: 'all' }">
        <!-- Search & Filter Bar -->
        <div class="relative group">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-500 transition-colors">
                <i data-lucide="search" class="w-5 h-5"></i>
            </div>
            <input type="text" placeholder="Search employees..." 
                class="w-full pl-12 pr-4 py-4 bg-white border-none rounded-[1.5rem] shadow-sm focus:ring-2 focus:ring-indigo-100 placeholder-slate-300 text-sm transition-all">
        </div>

        <!-- Filter Tabs -->
        <div class="flex items-center space-x-2 overflow-x-auto pb-2 no-scrollbar">
            <button @click="activeTab = 'all'" :class="activeTab === 'all' ? 'bg-indigo-600 text-white' : 'bg-white text-slate-500'" class="px-6 py-2.5 rounded-full text-xs font-bold whitespace-nowrap shadow-sm transition-all">All</button>
            <button @click="activeTab = 'active'" :class="activeTab === 'active' ? 'bg-indigo-600 text-white' : 'bg-white text-slate-500'" class="px-6 py-2.5 rounded-full text-xs font-bold whitespace-nowrap shadow-sm transition-all">Active</button>
            <button @click="activeTab = 'on_leave'" :class="activeTab === 'on_leave' ? 'bg-indigo-600 text-white' : 'bg-white text-slate-500'" class="px-6 py-2.5 rounded-full text-xs font-bold whitespace-nowrap shadow-sm transition-all">On Leave</button>
        </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-emerald-700 bg-emerald-50 rounded-2xl border border-emerald-100 flex items-center">
                <i data-lucide="check-circle" class="w-4 h-4 mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($employees as $employee)
                <div class="p-6 bg-white border border-slate-100 rounded-[2.5rem] shadow-sm flex items-center space-x-5 group hover:border-indigo-100 transition-all transform hover:scale-[1.01]">
                    <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center overflow-hidden border-2 border-white shadow-sm">
                        @if($employee->photo)
                            <img src="/storage/{{ $employee->photo }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold text-2xl uppercase">
                                {{ substr($employee->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="font-bold text-slate-900 mb-0.5 truncate text-lg">{{ $employee->name }}</h4>
                        <div class="flex items-center text-[10px] text-slate-400 font-bold uppercase tracking-widest leading-none">
                            <span class="text-indigo-600 mr-2">{{ $employee->code }}</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-1">
                        <a href="{{ route('employees.edit', $employee) }}" class="p-2 text-slate-300 hover:text-indigo-600 transition-colors">
                            <i data-lucide="edit-3" class="w-5 h-5"></i>
                        </a>
                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" onsubmit="return confirm('Archive this employee?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-slate-300 hover:text-rose-600 transition-colors">
                                <i data-lucide="archive" class="w-5 h-5"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="py-16 text-center">
                    <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="user-plus" class="w-10 h-10 text-slate-200"></i>
                    </div>
                    <h3 class="text-slate-900 font-bold text-lg mb-2">{{ __('No Employees Yet') }}</h3>
                    <p class="text-slate-400 text-sm max-w-[200px] mx-auto">{{ __('Get started by adding your team members.') }}</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
