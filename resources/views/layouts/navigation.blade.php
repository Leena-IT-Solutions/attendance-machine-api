<!-- Absolute position at the bottom of the flex container (the app shell) -->
<nav class="absolute bottom-0 left-0 right-0 z-50 px-6 pb-8">
    <div class="bg-white/95 backdrop-blur-2xl rounded-[2.5rem] shadow-[0_10px_40px_rgba(0,0,0,0.06)] border border-slate-100">
        <div class="flex items-center justify-around h-20">
            <!-- Home -->
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center flex-1 space-y-1 group">
                <div class="p-2 rounded-2xl transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' }}">
                    <i data-lucide="layout-grid" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-slate-400' }}">{{ __('Home') }}</span>
            </a>

            <!-- Employee -->
            <a href="{{ route('employees.index') }}" class="flex flex-col items-center justify-center flex-1 space-y-1 group">
                <div class="p-2 rounded-2xl transition-all duration-300 {{ request()->routeIs('employees.index*') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' }}">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest {{ request()->routeIs('employees.index*') ? 'text-indigo-600' : 'text-slate-400' }}">{{ __('Employee') }}</span>
            </a>

            <!-- Settings -->
            <a href="{{ route('profile.edit') }}" class="flex flex-col items-center justify-center flex-1 space-y-1 group">
                <div class="p-2 rounded-2xl transition-all duration-300 {{ request()->routeIs('profile.edit') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-400 group-hover:text-slate-600' }}">
                    <i data-lucide="settings" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-bold uppercase tracking-widest {{ request()->routeIs('profile.edit') ? 'text-indigo-600' : 'text-slate-400' }}">{{ __('Settings') }}</span>
            </a>
        </div>
    </div>
</nav>
