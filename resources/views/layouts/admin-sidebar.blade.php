<div x-data="{ open: true, mobileOpen: false }" class="min-h-screen bg-slate-50">
    <!-- Mobile Hamburger -->
    <div class="lg:hidden fixed top-4 left-4 z-50">
        <button @click="mobileOpen = !mobileOpen" class="p-2 bg-white rounded-xl shadow-lg text-slate-600">
            <i data-lucide="menu" class="w-6 h-6" x-show="!mobileOpen"></i>
            <i data-lucide="x" class="w-6 h-6" x-show="mobileOpen"></i>
        </button>
    </div>

    <!-- Sidebar -->
    <aside 
        class="fixed inset-y-0 left-0 z-40 bg-slate-900 text-white transition-all duration-300 transform lg:translate-x-0"
        :class="{'w-64': open, 'w-20': !open, '-translate-x-full': !mobileOpen, 'translate-x-0': mobileOpen}"
    >
        <div class="flex flex-col h-full">
            <!-- Brand -->
            <div class="h-24 flex items-center px-6 overflow-hidden">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-indigo-500 rounded-xl flex items-center justify-center shrink-0">
                        <i data-lucide="shield-check" class="w-6 h-6 text-white"></i>
                    </div>
                    <span class="font-bold text-xl tracking-tight transition-opacity duration-300" :class="{'opacity-100': open, 'opacity-0 lg:hidden': !open}">
                        Admin Panel
                    </span>
                </div>
            </div>

            <!-- Nav Links -->
            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span class="font-medium" :class="{'block': open, 'hidden': !open}">Dashboard</span>
                </a>

                <a href="{{ route('users.index') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('users.index') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i data-lucide="users" class="w-5 h-5"></i>
                    <span class="font-medium" :class="{'block': open, 'hidden': !open}">Users</span>
                </a>

                <a href="{{ route('profile.edit') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('profile.edit') ? 'bg-indigo-600 text-white' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                    <i data-lucide="user" class="w-5 h-5"></i>
                    <span class="font-medium" :class="{'block': open, 'hidden': !open}">Profile</span>
                </a>

                <!-- Add more links here -->
            </nav>

            <!-- Bottom Actions -->
            <div class="p-4 border-t border-slate-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 px-4 py-3 w-full rounded-xl text-slate-400 hover:bg-red-500/10 hover:text-red-500 transition-colors">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        <span class="font-medium" :class="{'block': open, 'hidden': !open}">Logout</span>
                    </button>
                </form>
            </div>

            <!-- Toggle Button (Desktop) -->
            <button @click="open = !open" class="hidden lg:flex absolute -right-3 top-32 w-6 h-6 bg-indigo-500 rounded-full items-center justify-center text-white hover:bg-indigo-600 transition-transform" :class="{'rotate-0': open, 'rotate-180': !open}">
                <i data-lucide="chevron-left" class="w-4 h-4"></i>
            </button>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="transition-all duration-300" :class="{'lg:pl-64': open, 'lg:pl-20': !open}">
        <!-- Top Bar -->
        <header class="h-24 bg-white/80 backdrop-blur-xl border-b border-slate-100 flex items-center px-8 justify-between sticky top-0 z-30">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Dashboard</h1>
                <p class="text-sm text-slate-500">System overview and analytics</p>
            </div>

            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm font-bold text-slate-800">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-indigo-600 font-medium">Administrator</p>
                </div>
                <div class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center text-slate-400">
                    <i data-lucide="user" class="w-6 h-6"></i>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-8">
            {{ $slot }}
        </main>
    </div>

    <!-- Mobile Overlay -->
    <div 
        x-show="mobileOpen" 
        @click="mobileOpen = false"
        class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-30 lg:hidden"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    ></div>
</div>
