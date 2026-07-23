<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Attendance') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ asset('storage/images/logo.png') }}">

        <!-- Lucide Icons -->
        <script src="https://unpkg.com/lucide@latest"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak] { display: none !important; }
            body { font-family: 'Outfit', sans-serif; }
            .glass {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
            .dark .glass {
                background: rgba(17, 24, 39, 0.7);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
        </style>
    </head>
    <body class="antialiased bg-slate-50 text-slate-900 min-h-screen overflow-hidden">
        <div x-data="{ open: true, mobileOpen: false }">
            
            <!-- Mobile Sidebar (Overlay mode) -->
            <div x-show="mobileOpen" 
                 x-cloak 
                 class="fixed inset-0 z-[100] lg:hidden"
                 style="display: none;">
                
                <!-- Overlay -->
                <div x-show="mobileOpen"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     @click="mobileOpen = false" 
                     class="fixed inset-0 bg-slate-900/60 backdrop-blur-md"></div>
                
                <!-- Drawer -->
                <aside 
                    x-show="mobileOpen"
                    x-transition:enter="transition ease-out duration-300" 
                    x-transition:enter-start="-translate-x-full" 
                    x-transition:enter-end="translate-x-0" 
                    x-transition:leave="transition ease-in duration-200" 
                    x-transition:leave-start="translate-x-0" 
                    x-transition:leave-end="-translate-x-full"
                    class="fixed inset-y-0 left-0 w-72 bg-slate-900 text-white shadow-2xl flex flex-col h-full z-[110]"
                >
                    <!-- Brand -->
                    <div class="h-28 flex items-center px-8 shrink-0 border-b border-slate-800/50">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-indigo-500 rounded-xl flex items-center justify-center text-white shadow-lg shadow-indigo-500/20">
                                <i data-lucide="shield-check" class="w-6 h-6"></i>
                            </div>
                            <span class="font-black text-lg uppercase tracking-tight">
                                {{ auth()->user()->role === 'super_admin' ? 'Super Admin' : 'Admin' }}
                            </span>
                        </div>
                        <button @click="mobileOpen = false" class="ml-auto p-2 text-slate-400 hover:text-white transition-colors">
                            <i data-lucide="x" class="w-6 h-6"></i>
                        </button>
                    </div>

                    <nav class="flex-1 px-6 space-y-4 py-8 overflow-y-auto custom-scrollbar">
                        @if(auth()->user()->role === 'super_admin')
                            <a href="{{ route('super_admin.dashboard') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('super_admin.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="layout-dashboard" class="w-6 h-6"></i>
                                <span class="font-bold text-sm uppercase tracking-wide">Dashboard</span>
                            </a>
                            <a href="{{ route('users.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('users.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="users" class="w-6 h-6"></i>
                                <span class="font-bold text-sm uppercase tracking-wide">Users</span>
                            </a>
                            <a href="{{ route('blogs.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('blogs.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="newspaper" class="w-6 h-6"></i>
                                <span class="font-bold text-sm uppercase tracking-wide">Blog CMS</span>
                            </a>
                            <a href="{{ route('demo.requests.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('demo.requests.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="inbox" class="w-6 h-6"></i>
                                <span class="font-bold text-sm uppercase tracking-wide">Demo Requests</span>
                            </a>
                        @else
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="layout-dashboard" class="w-6 h-6"></i>
                                <span class="font-bold text-sm uppercase tracking-wide">Dashboard</span>
                            </a>
                            <a href="{{ route('employees.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('employees.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="contact-2" class="w-6 h-6"></i>
                                <span class="font-bold text-sm uppercase tracking-wide">Employees</span>
                            </a>
                            <a href="{{ route('attendance.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('attendance.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="calendar-days" class="w-6 h-6"></i>
                                <span class="font-bold text-sm uppercase tracking-wide">Attendance Logs</span>
                            </a>
                            <a href="{{ route('reports.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('reports.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="file-bar-chart-2" class="w-6 h-6"></i>
                                <span class="font-bold text-sm uppercase tracking-wide">Reports</span>
                            </a>
                            <a href="{{ route('subscription.index') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('subscription.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="crown" class="w-6 h-6"></i>
                                <span class="font-bold text-sm uppercase tracking-wide">Subscription</span>
                            </a>
                        @endif
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('profile.edit') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                            <i data-lucide="user" class="w-6 h-6"></i>
                            <span class="font-bold text-sm uppercase tracking-wide">Profile</span>
                        </a>
                    </nav>

                    <!-- Footer Section in Sidebar -->
                    <div class="p-8 border-t border-slate-800 shrink-0">
                        <a href="{{ url('/') }}" class="flex items-center gap-4 px-5 py-4 mb-4 rounded-2xl transition-all duration-300 text-slate-400 hover:bg-slate-800 hover:text-white">
                            <i data-lucide="globe" class="w-6 h-6"></i>
                            <span class="font-bold text-sm uppercase tracking-wide">Go to Site</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center gap-4 px-5 py-4 w-full rounded-2xl text-slate-400 hover:bg-red-500/10 hover:text-red-500 transition-all duration-300 group">
                                <i data-lucide="log-out" class="w-6 h-6 transition-transform group-hover:-translate-x-1"></i>
                                <span class="font-bold text-sm uppercase tracking-wide">Logout</span>
                            </button>
                        </form>
                    </div>
                </aside>
            </div>

            <!-- Main Layout Wrapper -->
            <div class="flex h-screen bg-slate-50 overflow-hidden">
                <!-- Desktop Sidebar -->
                <aside 
                    class="hidden lg:flex flex-col bg-slate-900 text-white transition-all duration-300 relative shrink-0 overflow-hidden h-full"
                    :class="open ? 'w-72' : 'w-24'"
                >
                    <!-- Brand -->
                    <div class="h-28 flex items-center px-8 shrink-0 overflow-hidden">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-indigo-500 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/20 shrink-0">
                                <i data-lucide="shield-check" class="w-7 h-7 text-white"></i>
                            </div>
                            <div class="transition-opacity duration-300 whitespace-nowrap" :class="open ? 'opacity-100' : 'opacity-0 hidden'">
                                <span class="block font-black text-xl tracking-tight leading-none uppercase">Attendance</span>
                                <span class="block text-[10px] font-bold text-indigo-400 uppercase tracking-[0.2em] mt-1">
                                    {{ auth()->user()->role === 'super_admin' ? 'SaaS Control' : 'Company Control' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <nav class="flex-1 px-6 space-y-3 mt-8 overflow-y-auto custom-scrollbar overflow-x-hidden">
                        @if(auth()->user()->role === 'super_admin')
                            <a href="{{ route('super_admin.dashboard') }}" 
                               class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('super_admin.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="layout-dashboard" class="w-6 h-6 shrink-0"></i>
                                <span class="font-bold text-sm tracking-wide uppercase whitespace-nowrap" x-show="open">Dashboard</span>
                            </a>

                            <a href="{{ route('users.index') }}" 
                               class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('users.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="users" class="w-6 h-6 shrink-0"></i>
                                <span class="font-bold text-sm tracking-wide uppercase whitespace-nowrap" x-show="open">Users</span>
                            </a>

                            <a href="{{ route('blogs.index') }}" 
                               class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('blogs.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="newspaper" class="w-6 h-6 shrink-0"></i>
                                <span class="font-bold text-sm tracking-wide uppercase whitespace-nowrap" x-show="open">Blog CMS</span>
                            </a>

                            <a href="{{ route('demo.requests.index') }}" 
                               class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('demo.requests.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="inbox" class="w-6 h-6 shrink-0"></i>
                                <span class="font-bold text-sm tracking-wide uppercase whitespace-nowrap" x-show="open">Demo Requests</span>
                            </a>
                        @else
                            <a href="{{ route('admin.dashboard') }}" 
                               class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="layout-dashboard" class="w-6 h-6 shrink-0"></i>
                                <span class="font-bold text-sm tracking-wide uppercase whitespace-nowrap" x-show="open">Dashboard</span>
                            </a>

                            <a href="{{ route('employees.index') }}" 
                               class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('employees.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="contact-2" class="w-6 h-6 shrink-0"></i>
                                <span class="font-bold text-sm tracking-wide uppercase whitespace-nowrap" x-show="open">Employees</span>
                            </a>

                            <a href="{{ route('attendance.index') }}" 
                               class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('attendance.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="calendar-days" class="w-6 h-6 shrink-0"></i>
                                <span class="font-bold text-sm tracking-wide uppercase whitespace-nowrap" x-show="open">Attendance Logs</span>
                            </a>

                            <a href="{{ route('reports.index') }}" 
                               class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('reports.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="file-bar-chart-2" class="w-6 h-6 shrink-0"></i>
                                <span class="font-bold text-sm tracking-wide uppercase whitespace-nowrap" x-show="open">Reports</span>
                            </a>

                            <a href="{{ route('subscription.index') }}" 
                               class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('subscription.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                                <i data-lucide="crown" class="w-6 h-6 shrink-0"></i>
                                <span class="font-bold text-sm tracking-wide uppercase whitespace-nowrap" x-show="open">Subscription</span>
                            </a>
                        @endif

                        <a href="{{ route('profile.edit') }}" 
                           class="flex items-center gap-4 px-5 py-4 rounded-2xl transition-all duration-300 {{ request()->routeIs('profile.edit') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                            <i data-lucide="user" class="w-6 h-6 shrink-0"></i>
                            <span class="font-bold text-sm tracking-wide uppercase whitespace-nowrap" x-show="open">Profile</span>
                        </a>

                    </nav>

                    <!-- Bottom -->
                    <div class="p-6 border-t border-slate-800 shrink-0">
                        <a href="{{ url('/') }}" 
                           class="flex items-center gap-4 px-5 py-4 mb-2 rounded-2xl transition-all duration-300 text-slate-400 hover:bg-slate-800 hover:text-white">
                            <i data-lucide="globe" class="w-6 h-6 shrink-0"></i>
                            <span class="font-bold text-sm tracking-wide uppercase whitespace-nowrap" x-show="open">Go to Site</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="flex items-center gap-4 px-5 py-4 w-full rounded-2xl text-slate-400 hover:bg-red-500/10 hover:text-red-500 transition-all duration-300 group overflow-hidden">
                                <i data-lucide="log-out" class="w-6 h-6 shrink-0 transition-transform group-hover:-translate-x-1"></i>
                                <span class="font-bold text-sm tracking-wide uppercase whitespace-nowrap" x-show="open">Logout</span>
                            </button>
                        </form>
                    </div>

                </aside>

                <!-- Content Area -->
                <div class="flex-1 flex flex-col min-w-0 h-full overflow-hidden bg-slate-50 relative">
                    <!-- Top Header -->
                    <header class="h-28 bg-white/80 backdrop-blur-xl border-b border-slate-100 flex items-center px-6 lg:px-10 justify-between shrink-0 z-30">
                        <div class="flex items-center gap-6">
                            <button @click="mobileOpen = true" class="lg:hidden p-3 bg-slate-50 rounded-xl text-slate-600 border border-slate-100 active:scale-95 transition-transform">
                                <i data-lucide="menu" class="w-6 h-6"></i>
                            </button>
                            <div>
                                <h1 class="text-2xl lg:text-4xl font-black text-slate-900 tracking-tight">
                                    @isset($header) {{ $header }} @else Dashboard @endisset
                                </h1>
                                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-0.5">Admin Control Panel</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 lg:gap-8">
                            <div class="text-right hidden sm:block">
                                <p class="text-sm font-black text-slate-900 uppercase tracking-tight">{{ auth()->user()->name }}</p>
                                <p class="text-[10px] text-indigo-600 font-black uppercase tracking-widest font-extrabold">
                                    {{ auth()->user()->role === 'super_admin' ? 'Super Admin' : 'Company Owner' }}
                                </p>
                            </div>
                            <div class="w-12 h-12 lg:w-16 lg:h-16 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-center text-slate-400">
                                <i data-lucide="user" class="w-6 h-6 lg:w-8 lg:h-8"></i>
                            </div>
                        </div>
                    </header>

                    <!-- Main Page Body -->
                    <main class="flex-1 overflow-y-auto p-6 lg:p-12 custom-scrollbar">
                        <div class="max-w-[1600px] mx-auto">
                            {{ $slot }}
                        </div>
                        <footer class="mt-24 py-12 border-t border-slate-100 text-center">
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.4em]">© {{ date('Y') }} Attendance Machine • Administrative Node</p>
                        </footer>
                    </main>
                </div>
            </div>
        </div>

        <style>
            .custom-scrollbar::-webkit-scrollbar { width: 6px; }
            .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
            .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #cbd5e1; }
            [x-cloak] { display: none !important; }
        </style>

        <script>
            document.addEventListener('alpine:init', () => {
                lucide.createIcons();
            });
            // Ensure icons are created for dynamically shown elements
            window.addEventListener('click', () => {
                setTimeout(() => lucide.createIcons(), 50);
            });
        </script>
    </body>
</html>
