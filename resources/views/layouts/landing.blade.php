<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <!-- ===== SEO Meta Tags ===== -->
    <title>@yield('title', 'Attendance Machine | Face Recognition Employee Attendance & Payroll App')</title>
    <meta name="description" content="@yield('meta_description', 'Attendance Machine — contactless face recognition attendance tracking app with GPS verification, automated salary calculation, LOP deductions & payroll reports.')">
    <meta name="keywords" content="attendance app, employee attendance tracking, face recognition attendance system, GPS attendance tracker, payroll management software, salary calculation app, biometric attendance app, shift management, factory attendance system, restaurant staff attendance, hospital employee tracking, retail store attendance, construction worker attendance, LOP calculator, automated payroll, HR software India, contactless attendance, employee tracking app, Leena IT Solutions, attendance machine">
    <meta name="author" content="Leena IT Solutions">
    <meta name="theme-color" content="#7C3AED">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- Canonical & Localization -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('icon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tailwind CSS Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        slate: {
                            905: '#0b0f19',
                            805: '#1e293b',
                        },
                        violet: {
                            850: '#2e1065',
                        },
                        indigo: {
                            850: '#1e1b4b',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Custom Style Sheet -->
    <link rel="stylesheet" href="{{ asset('landing-assets/css/style.css') }}">
    
    @yield('styles')
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased overflow-x-hidden">

    <!-- ===== NAVIGATION BAR ===== -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="{{ route('welcome') }}" class="flex items-center gap-3 shrink-0">
                <div class="logo-icon bg-gradient-to-tr from-violet-600 to-indigo-600 shadow-md shadow-violet-500/20">
                    <i class="fa-solid fa-clock-rotate-left text-white text-lg"></i>
                </div>
                <span class="font-outfit text-xl font-extrabold tracking-tight text-slate-900">Attendance Machine</span>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden lg:flex items-center gap-5 text-xs font-bold text-slate-600">
                <a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'text-violet-600 border-b-2 border-violet-600 pb-1' : 'hover:text-violet-600' }} transition-all">Home</a>
                <a href="{{ route('features') }}" class="{{ request()->routeIs('features') ? 'text-violet-600 border-b-2 border-violet-600 pb-1' : 'hover:text-violet-600' }} transition-all">Features</a>
                <a href="{{ route('industries') }}" class="{{ request()->routeIs('industries') ? 'text-violet-600 border-b-2 border-violet-600 pb-1' : 'hover:text-violet-600' }} transition-all">Industries</a>
                <a href="{{ route('pricing') }}" class="{{ request()->routeIs('pricing') ? 'text-violet-600 border-b-2 border-violet-600 pb-1' : 'hover:text-violet-600' }} transition-all">Pricing</a>
                <a href="{{ route('demo') }}" class="{{ request()->routeIs('demo') ? 'text-violet-600 border-b-2 border-violet-600 pb-1' : 'hover:text-violet-600' }} transition-all">Demo</a>
                <a href="{{ route('reports') }}" class="{{ request()->routeIs('reports') ? 'text-violet-600 border-b-2 border-violet-600 pb-1' : 'hover:text-violet-600' }} transition-all">Reports</a>
                <a href="{{ route('api.integration') }}" class="{{ request()->routeIs('api.integration') ? 'text-violet-600 border-b-2 border-violet-600 pb-1' : 'hover:text-violet-600' }} transition-all">API Integration</a>
                <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? 'text-violet-600 border-b-2 border-violet-600 pb-1' : 'hover:text-violet-600' }} transition-all">FAQ</a>
                <a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') ? 'text-violet-600 border-b-2 border-violet-600 pb-1' : 'hover:text-violet-600' }} transition-all">Blog</a>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'text-violet-600 border-b-2 border-violet-600 pb-1' : 'hover:text-violet-600' }} transition-all">Contact</a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden lg:block shrink-0">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary text-xs px-5 py-2.5">Console</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary text-xs px-5 py-2.5">Sign In</a>
                @endauth
            </div>

            <!-- Mobile Menu Toggle Button -->
            <button class="lg:hidden text-slate-600 hover:text-slate-900 focus:outline-none" id="menu-toggle">
                <i class="fa-solid fa-bars text-2xl" id="menu-icon"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="hidden lg:hidden bg-white border-b border-slate-100 px-6 py-4 flex flex-col gap-3 shadow-lg max-h-[75vh] overflow-y-auto" id="mobile-menu">
            <a href="{{ route('welcome') }}" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors {{ request()->routeIs('welcome') ? 'text-violet-600 font-bold' : '' }}" onclick="toggleMenu()">Home</a>
            <a href="{{ route('features') }}" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors {{ request()->routeIs('features') ? 'text-violet-600 font-bold' : '' }}" onclick="toggleMenu()">Features</a>
            <a href="{{ route('industries') }}" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors {{ request()->routeIs('industries') ? 'text-violet-600 font-bold' : '' }}" onclick="toggleMenu()">Industries</a>
            <a href="{{ route('pricing') }}" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors {{ request()->routeIs('pricing') ? 'text-violet-600 font-bold' : '' }}" onclick="toggleMenu()">Pricing</a>
            <a href="{{ route('demo') }}" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors {{ request()->routeIs('demo') ? 'text-violet-600 font-bold' : '' }}" onclick="toggleMenu()">Demo</a>
            <a href="{{ route('reports') }}" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors {{ request()->routeIs('reports') ? 'text-violet-600 font-bold' : '' }}" onclick="toggleMenu()">Reports</a>
            <a href="{{ route('api.integration') }}" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors {{ request()->routeIs('api.integration') ? 'text-violet-600 font-bold' : '' }}" onclick="toggleMenu()">API Integration</a>
            <a href="{{ route('faq') }}" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors {{ request()->routeIs('faq') ? 'text-violet-600 font-bold' : '' }}" onclick="toggleMenu()">FAQ</a>
            <a href="{{ route('blog') }}" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors {{ request()->routeIs('blog') ? 'text-violet-600 font-bold' : '' }}" onclick="toggleMenu()">Blog</a>
            <a href="{{ route('contact') }}" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors {{ request()->routeIs('contact') ? 'text-violet-600 font-bold' : '' }}" onclick="toggleMenu()">Contact</a>
            
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-primary text-center mt-2" onclick="toggleMenu()">Console</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary text-center mt-2" onclick="toggleMenu()">Sign In</a>
            @endauth
        </div>
    </header>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="pt-20">
        @yield('content')
    </main>    <!-- ===== FOOTER ===== -->
    <footer class="bg-white border-t border-slate-100 py-16 mt-20 text-slate-600">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-12 gap-10">
            <!-- Brand Column -->
            <div class="md:col-span-5 space-y-4">
                <a href="{{ route('welcome') }}" class="flex items-center gap-3">
                    <div class="logo-icon bg-gradient-to-tr from-violet-600 to-indigo-600 shadow-md">
                        <i class="fa-solid fa-clock-rotate-left text-white text-lg"></i>
                    </div>
                    <span class="font-outfit text-xl font-extrabold tracking-tight text-slate-900">Attendance Machine</span>
                </a>
                <p class="text-xs text-slate-500 leading-relaxed max-w-sm">
                    Smarter, contactless facial attendance verification & GPS tracking solution built to streamline payroll and shift management for modern businesses.
                </p>
                <div class="text-xs text-slate-400">
                    Developed with &hearts; by <a href="https://leenaitsolutions.in" target="_blank" class="hover:text-violet-600 transition-colors font-semibold">Leena IT Solutions</a>
                </div>
            </div>

            <!-- Links Column -->
            <div class="md:col-span-3 space-y-4">
                <h4 class="font-outfit font-bold text-slate-800 uppercase tracking-wider text-xs">Company</h4>
                <div class="flex flex-col gap-2 text-xs">
                    <a href="{{ route('welcome') }}#about" class="hover:text-violet-600 transition-colors font-medium">About</a>
                    <a href="{{ route('features') }}" class="hover:text-violet-600 transition-colors font-medium">Features</a>
                    <a href="{{ route('pricing') }}" class="hover:text-violet-600 transition-colors font-medium">Pricing</a>
                    <a href="{{ route('blog') }}" class="hover:text-violet-600 transition-colors font-medium">Blog</a>
                    <a href="{{ route('contact') }}" class="hover:text-violet-600 transition-colors font-medium">Contact</a>
                    <a href="{{ route('privacy.policy') }}" class="hover:text-violet-600 transition-colors font-medium">Privacy</a>
                    <a href="{{ route('terms') }}" class="hover:text-violet-600 transition-colors font-medium">Terms</a>
                    <a href="{{ route('refund') }}" class="hover:text-violet-600 transition-colors font-medium">Refund</a>
                    <a href="{{ route('faq') }}" class="hover:text-violet-600 transition-colors font-medium">Support</a>
                </div>
            </div>

            <!-- Support/Contact Column -->
            <div class="md:col-span-4 space-y-4">
                <h4 class="font-outfit font-bold text-slate-800 uppercase tracking-wider text-xs">Contact & Help</h4>
                <div class="space-y-3 text-xs">
                    <div class="flex items-center gap-2 font-semibold text-slate-700">
                        <i class="fa-solid fa-envelope text-violet-650 text-sm w-4 text-center"></i>
                        <span>Email:</span>
                        <a href="mailto:leenaitsolutions@gmail.com" class="hover:text-violet-600 transition-colors font-bold">leenaitsolutions@gmail.com</a>
                    </div>
                    <div class="flex items-center gap-2 font-semibold text-slate-700">
                        <i class="fa-solid fa-phone text-violet-650 text-sm w-4 text-center"></i>
                        <span>Phone:</span>
                        <a href="tel:9096189183" class="hover:text-violet-600 transition-colors font-bold">9096189183</a>
                    </div>
                    <div class="flex items-center gap-2 font-semibold text-slate-700">
                        <i class="fa-brands fa-whatsapp text-emerald-600 text-base w-4 text-center"></i>
                        <span>WhatsApp:</span>
                        <a href="https://wa.me/919096189183" target="_blank" rel="noopener" class="hover:text-violet-600 transition-colors font-bold">9096189183</a>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="space-y-2 pt-2">
                    <h5 class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">Social Media</h5>
                    <div class="flex gap-2">
                        <a href="https://twitter.com" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-slate-50 border border-slate-150 text-slate-500 hover:bg-violet-50 hover:text-violet-600 flex items-center justify-center transition-colors">
                            <i class="fa-brands fa-twitter text-xs"></i>
                        </a>
                        <a href="https://linkedin.com" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-slate-50 border border-slate-150 text-slate-500 hover:bg-violet-50 hover:text-violet-600 flex items-center justify-center transition-colors">
                            <i class="fa-brands fa-linkedin-in text-xs"></i>
                        </a>
                        <a href="https://facebook.com" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-slate-50 border border-slate-150 text-slate-500 hover:bg-violet-50 hover:text-violet-600 flex items-center justify-center transition-colors">
                            <i class="fa-brands fa-facebook-f text-xs font-light"></i>
                        </a>
                        <a href="https://instagram.com" target="_blank" rel="noopener" class="w-8 h-8 rounded-full bg-slate-50 border border-slate-150 text-slate-500 hover:bg-violet-50 hover:text-violet-600 flex items-center justify-center transition-colors">
                            <i class="fa-brands fa-instagram text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 border-t border-slate-100 mt-12 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400">
            <div>
                &copy; 2026 Leena IT Solutions. All rights reserved.
            </div>
            <div class="flex gap-6">
                <a href="{{ route('privacy.policy') }}" class="hover:text-violet-600">Privacy Policy</a>
                <a href="{{ route('terms') }}" class="hover:text-violet-600">Terms of Service</a>
            </div>
        </div>
    </footer>

    <!-- ===== VIDEO DEMO MODAL ===== -->
    <div id="video-modal" class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm hidden" style="background-color: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px);">
        <div class="bg-white border border-slate-200 rounded-3xl p-6 max-w-2xl w-full mx-4 shadow-2xl relative">
            <button id="modal-close" class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-slate-900 text-white flex items-center justify-center hover:bg-slate-800 transition-colors shadow-md focus:outline-none">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="aspect-video w-full rounded-2xl overflow-hidden bg-slate-900 relative flex items-center justify-center h-[360px]">
                <!-- Lazy iframe player -->
                <iframe id="modal-iframe" class="w-full h-full border-0 hidden" src="" title="Attendance Machine App Demo" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                <!-- Cover Preview Overlay -->
                <div id="modal-cover" class="absolute inset-0 bg-slate-950/40 flex flex-col items-center justify-center text-center p-6 space-y-4">
                    <div class="w-16 h-16 rounded-full bg-violet-600 text-white flex items-center justify-center text-xl shadow-lg cursor-pointer hover:scale-105 transition-transform" id="modal-play-btn">
                        <i class="fa-solid fa-play ml-1"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-300 uppercase tracking-widest">Attendance Machine Promo</span>
                    <h4 class="font-outfit font-bold text-lg text-white">Contactless check-ins in 60 seconds</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom App Script -->
    <script src="{{ asset('landing-assets/js/app.js') }}?v=4"></script>
    
    @yield('scripts')
</body>

</html>
