<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ===== SEO Meta Tags ===== -->
    <title>Attendance Machine | Real-Time GPS Employee Attendance Tracking App</title>
    <meta name="description"
        content="Attendance Machine by Leena IT Solutions. A modern GPS-verified mobile attendance tracking app for offices, schools, factories, and businesses. Real-time check-in, reports, and cloud sync.">
    <meta name="keywords"
        content="attendance app, employee tracking, GPS check-in, real-time attendance, shift management, office attendance tracker, Leena IT Solutions, attendance machine">
    <meta name="author" content="Leena IT Solutions">
    <meta name="theme-color" content="#7C3AED">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Attendance Machine | Real-Time GPS Employee Attendance App">
    <meta property="og:description"
        content="Streamline employee attendance tracking. GPS location validation, real-time sync, shifts, and reports. Try it free.">
    <meta property="og:image" content="{{ asset('landing-assets/images/integration_preview.jpeg') }}">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
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
</head>

<body class="bg-slate-50 text-slate-800 font-sans antialiased overflow-x-hidden">

    <!-- ===== NAVIGATION BAR ===== -->
    <header
        class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100 transition-all duration-300"
        id="navbar">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <!-- Brand Logo -->
            <a href="#" class="flex items-center gap-3">
                <div class="logo-icon bg-gradient-to-tr from-violet-600 to-indigo-600 shadow-md shadow-violet-500/20">
                    <i class="fa-solid fa-clock-rotate-left text-white text-lg"></i>
                </div>
                <span class="font-outfit text-xl font-extrabold tracking-tight text-slate-900">Attendance Machine</span>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
                <a href="#features" class="hover:text-violet-600 transition-colors">Features</a>
                <a href="#how-it-works" class="hover:text-violet-600 transition-colors">How It Works</a>
                <a href="#cloud-payroll" class="hover:text-violet-600 transition-colors">Payroll</a>
                <a href="#pricing" class="hover:text-violet-600 transition-colors">Pricing</a>
                <a href="#download" class="hover:text-violet-600 transition-colors">Download</a>
            </nav>

            <!-- CTA Button -->
            <div class="hidden md:block">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">Console</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Sign In</a>
                @endauth
            </div>

            <!-- Mobile Menu Toggle Button -->
            <button class="md:hidden text-slate-600 hover:text-slate-900 focus:outline-none" id="menu-toggle">
                <i class="fa-solid fa-bars text-2xl" id="menu-icon"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="hidden md:hidden bg-white border-b border-slate-100 px-6 py-4 flex flex-col gap-4 shadow-lg"
            id="mobile-menu">
            <a href="#features" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors"
                onclick="toggleMenu()">Features</a>
            <a href="#how-it-works" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors"
                onclick="toggleMenu()">How It Works</a>
            <a href="#cloud-payroll" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors"
                onclick="toggleMenu()">Payroll</a>
            <a href="#pricing" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors"
                onclick="toggleMenu()">Pricing</a>
            <a href="#download" class="font-semibold text-slate-700 py-2 hover:text-violet-600 transition-colors"
                onclick="toggleMenu()">Download</a>
            
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-primary text-center mt-2" onclick="toggleMenu()">Console</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary text-center mt-2" onclick="toggleMenu()">Sign In</a>
            @endauth
        </div>
    </header>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="pt-28">

        <!-- ===== HERO SECTION ===== -->
        <section
            class="hero-section max-w-7xl mx-auto px-6 grid md:grid-cols-12 gap-12 items-center py-16 md:py-24 relative">
            <!-- Background Glow Orbs -->
            <div
                class="absolute top-10 left-10 -z-10 w-96 h-96 bg-violet-200/40 rounded-full blur-[100px] pointer-events-none">
            </div>
            <div
                class="absolute bottom-10 right-10 -z-10 w-96 h-96 bg-indigo-200/30 rounded-full blur-[100px] pointer-events-none">
            </div>

            <!-- Left: Hero Text -->
            <div class="md:col-span-7 space-y-6 text-center md:text-left">
                <div
                    class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-xs font-bold text-violet-700 uppercase tracking-wider">
                    <span class="pulse-dot"></span> Contactless Scanning App
                </div>
                <h1
                    class="font-outfit text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-none">
                    Turn Any Device into a <br>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Contactless
                        Face</span> <br>
                    Attendance Machine.
                </h1>
                <p class="text-base sm:text-lg text-slate-600 max-w-xl mx-auto md:mx-0">
                    Stop chasing paper logs or expensive hardware punch systems. Register staff, scan faces, and
                    automate payroll-ready reports seamlessly from a mobile app.
                </p>

                <!-- Primary CTA Buttons -->
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 pt-2">
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="btn btn-primary px-8 py-4 text-sm font-bold shadow-md shadow-violet-500/20">
                            Go to Console
                        </a>
                    @else
                        <a href="https://play.google.com/store/apps/details?id=in.leenaitsolutions.attendance.machine&hl=en_IN"
                            target="_blank" rel="noopener"
                            class="download-badge bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300">
                            <i class="fa-brands fa-google-play text-2xl text-violet-500"></i>
                            <div>
                                <span class="text-slate-400">GET IT ON</span>
                                <strong class="text-white">Google Play</strong>
                            </div>
                        </a>
                        <a href="https://apps.apple.com"
                            target="_blank" rel="noopener"
                            class="download-badge bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300">
                            <i class="fa-brands fa-apple text-2xl text-white"></i>
                            <div>
                                <span class="text-slate-400">DOWNLOAD ON THE</span>
                                <strong class="text-white">App Store</strong>
                            </div>
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Right: App Mockup -->
            <div class="md:col-span-5 flex justify-center relative">
                <!-- Outer floating design elements -->
                <div
                    class="floating-badge bg-white shadow-xl shadow-slate-100 border border-slate-100 rounded-2xl p-4 absolute -left-6 top-1/4 z-10 flex items-center gap-3 animate-float">
                    <div
                        class="w-10 h-10 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div>
                        <div class="text-[10px] text-slate-400 font-bold uppercase">Philip Das</div>
                        <div class="text-xs font-bold text-slate-800">Face Matched (99.4%)</div>
                    </div>
                </div>

                <div
                    class="floating-badge bg-white shadow-xl shadow-slate-100 border border-slate-100 rounded-2xl p-4 absolute -right-4 bottom-1/4 z-10 flex items-center gap-3 animate-float-delayed">
                    <div
                        class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold">
                        <i class="fa-solid fa-camera"></i>
                    </div>
                    <div>
                        <div class="text-[10px] text-slate-400 font-bold uppercase">Face Recognition</div>
                        <div class="text-xs font-bold text-slate-800">Contactless Scanner</div>
                    </div>
                </div>

                <!-- Smartphone Frame mockup (Face Recognition Screen) -->
                <div
                    class="phone-mockup border border-slate-200/60 shadow-2xl bg-white rounded-[40px] p-3 max-w-[290px] w-full">
                    <div class="phone-screen bg-slate-50 rounded-[32px] overflow-hidden flex flex-col h-[520px]">
                        <!-- App Status Bar -->
                        <div class="px-5 pt-3 pb-2 flex justify-between text-[10px] font-bold text-slate-400">
                            <span>09:41</span>
                            <div class="flex gap-1.5">
                                <i class="fa-solid fa-signal"></i>
                                <i class="fa-solid fa-wifi"></i>
                                <i class="fa-solid fa-battery-full"></i>
                            </div>
                        </div>

                        <!-- App Header -->
                        <div class="px-5 py-2 flex items-center justify-between border-b border-slate-100 bg-white">
                            <div class="flex items-center gap-2">
                                <div
                                    class="w-7 h-7 rounded-lg bg-violet-600 flex items-center justify-center text-white text-[10px] font-black">
                                    L</div>
                                <span class="font-outfit text-xs font-bold text-slate-800">LITS Attendance</span>
                            </div>
                            <span class="w-2 h-2 rounded-full bg-emerald-500 shadow-sm shadow-emerald-500/30"></span>
                        </div>

                        <!-- App Content Area (Face Recognition Camera Mockup) -->
                        <div class="flex-1 flex flex-col justify-between p-4 relative overflow-hidden bg-slate-900">
                            <!-- Scanner HUD Overlay -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center p-4">
                                <!-- Laser Line sweeping -->
                                <div class="scanner-line"></div>

                                <!-- Pulse Glow behind Target -->
                                <div
                                    class="scanner-target-glow absolute top-1/2 left-1/2 w-40 h-40 rounded-full bg-emerald-500 blur-[6px] pointer-events-none -translate-x-1/2 -translate-y-1/2">
                                </div>

                                <!-- Face Silhouette Outline target -->
                                <div
                                    class="w-36 h-36 rounded-full border-2 border-dashed border-emerald-400/80 flex items-center justify-center relative">
                                    <!-- Scanning text overlay inside target -->
                                    <div
                                        class="text-[9px] font-bold text-emerald-400 uppercase tracking-widest bg-slate-950/70 px-2 py-0.5 rounded-full absolute -top-3">
                                        SCANNING</div>
                                    <!-- A mock vector face using FontAwesome -->
                                    <i class="fa-solid fa-user-gear text-slate-400/40 text-6xl"></i>
                                    <!-- Success Match Indicator overlay -->
                                    <div
                                        class="absolute bottom-2 right-2 w-8 h-8 rounded-full bg-emerald-500 text-white border-2 border-slate-900 flex items-center justify-center shadow-lg">
                                        <i class="fa-solid fa-check text-xs"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Top Status HUD -->
                            <div class="w-full flex justify-between z-10">
                                <span
                                    class="bg-slate-950/80 backdrop-blur-md border border-slate-800 text-emerald-400 text-[8px] font-bold px-2 py-1 rounded-lg flex items-center gap-1">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span> CAMERA
                                    ACTIVE
                                </span>
                                <span
                                    class="bg-slate-950/80 backdrop-blur-md border border-slate-800 text-white text-[8px] font-bold px-2 py-1 rounded-lg">
                                    Match: 99.4%
                                </span>
                            </div>

                            <!-- Bottom Verification Info Card -->
                            <div
                                class="bg-slate-950/90 backdrop-blur-md border border-slate-800 p-3.5 rounded-2xl shadow-xl w-full z-10 space-y-2 mt-auto">
                                <div class="flex items-center gap-2.5">
                                    <div
                                        class="w-7 h-7 rounded-full bg-emerald-500/20 border border-emerald-500/30 flex items-center justify-center text-emerald-400 font-bold text-xs">
                                        PD
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-[10px] font-bold text-white uppercase tracking-wider truncate">
                                            Philip Das</h4>
                                        <p class="text-[8px] text-slate-400 truncate">philipdas20@gmail.com</p>
                                    </div>
                                </div>
                                <div
                                    class="border-t border-slate-800 pt-2 flex items-center justify-between text-[9px]">
                                    <span class="text-emerald-400 font-bold uppercase"><i
                                            class="fa-solid fa-shield-halved mr-1"></i> Checked In</span>
                                    <span class="text-slate-400 font-medium">09:41 AM</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== SOCIAL PROOF & TRUST METRICS BAR ===== -->
        <section class="border-y border-slate-100 bg-white/60 py-12">
            <div class="max-w-7xl mx-auto px-6 space-y-10">
                <!-- Stat Callouts Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div class="space-y-1">
                        <h3 class="font-outfit text-3xl md:text-4xl font-black text-violet-600">500+</h3>
                        <p class="text-xs text-slate-555 font-bold uppercase tracking-wider">Organizations Enabled</p>
                    </div>
                    <div class="space-y-1">
                        <h3 class="font-outfit text-3xl md:text-4xl font-black text-violet-600">10k+</h3>
                        <p class="text-xs text-slate-555 font-bold uppercase tracking-wider">Daily Scan Match Logs</p>
                    </div>
                    <div class="space-y-1">
                        <h3 class="font-outfit text-3xl md:text-4xl font-black text-violet-600">99.9%</h3>
                        <p class="text-xs text-slate-555 font-bold uppercase tracking-wider">Server Availability</p>
                    </div>
                    <div class="space-y-1">
                        <h3 class="font-outfit text-3xl md:text-4xl font-black text-violet-600">Zero</h3>
                        <p class="text-xs text-slate-555 font-bold uppercase tracking-wider">Hardware Terminals Required
                        </p>
                    </div>
                </div>

                <!-- Divider Line -->
                <div class="w-full h-px bg-slate-200/50"></div>

                <!-- Industries placeholder logos/badges -->
                <div class="flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Target Environments:</span>
                    <div class="flex flex-wrap items-center justify-center gap-4 md:gap-8">
                        <div
                            class="flex items-center gap-2 bg-slate-100/60 border border-slate-200/40 px-4 py-2 rounded-xl text-slate-600 font-semibold text-xs transition-colors hover:bg-slate-100">
                            <i class="fa-solid fa-store text-violet-600"></i> Built for Retail
                        </div>
                        <div
                            class="flex items-center gap-2 bg-slate-100/60 border border-slate-200/40 px-4 py-2 rounded-xl text-slate-600 font-semibold text-xs transition-colors hover:bg-slate-100">
                            <i class="fa-solid fa-rocket text-violet-600"></i> Built for Startups
                        </div>
                        <div
                            class="flex items-center gap-2 bg-slate-100/60 border border-slate-200/40 px-4 py-2 rounded-xl text-slate-600 font-semibold text-xs transition-colors hover:bg-slate-100">
                            <i class="fa-solid fa-industry text-violet-600"></i> Built for Factories
                        </div>
                        <div
                            class="flex items-center gap-2 bg-slate-100/60 border border-slate-200/40 px-4 py-2 rounded-xl text-slate-600 font-semibold text-xs transition-colors hover:bg-slate-100">
                            <i class="fa-solid fa-building-office text-violet-600"></i> Built for Modern Offices
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== CORE FEATURE MATRIX (HOW IT WORKS) ===== -->
        <section id="features" class="max-w-7xl mx-auto px-6 py-20 relative">
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 -z-10 w-[600px] h-[600px] bg-violet-100/10 rounded-full blur-[130px] pointer-events-none">
            </div>

            <!-- Section Title -->
            <div class="text-center max-w-2xl mx-auto space-y-4 mb-16">
                <h2 class="font-outfit text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Core Feature <span class="text-violet-600">Matrix</span>
                </h2>
                <p class="text-slate-650 text-sm sm:text-base">
                    A unified dashboard powered by high-speed biometric face scanning and shift synchronization.
                </p>
            </div>

            <!-- Feature Grid -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Grid Item 1: Lightning-Fast Face Scanner -->
                <div class="feature-card">
                    <div class="feature-icon bg-violet-50 text-violet-600">
                        <i class="fa-solid fa-face-smile text-2xl"></i>
                    </div>
                    <h3 class="feature-title">Lightning-Fast Face Scanner</h3>
                    <p class="feature-text text-sm text-slate-600">
                        Contactless, secure tracking. Admins can click a single button to launch the high-speed
                        biometric face scanner on a central device.
                    </p>
                </div>

                <!-- Grid Item 2: Smart Employee Profiling -->
                <div class="feature-card">
                    <div class="feature-icon bg-indigo-50 text-indigo-600">
                        <i class="fa-solid fa-fingerprint text-2xl"></i>
                    </div>
                    <h3 class="feature-title">Smart Employee Profiling</h3>
                    <p class="feature-text text-sm text-slate-600">
                        Register unique 512-bit biometric face signatures for every employee with standard device
                        cameras. Easily rescan or update biometric models in one tap.
                    </p>
                </div>

                <!-- Grid Item 3: Dynamic Shift Management -->
                <div class="feature-card">
                    <div class="feature-icon bg-emerald-50 text-emerald-600">
                        <i class="fa-solid fa-clock-rotate-left text-2xl"></i>
                    </div>
                    <h3 class="feature-title">Dynamic Shift Management</h3>
                    <p class="feature-text text-sm text-slate-600">
                        Set up custom shift templates (e.g., Morning, Night, Standard). Keep an absolute, real-time eye
                        on how many employees are mapped to each shift active today.
                    </p>
                </div>
            </div>
        </section>

        <!-- ===== DEEP-DIVE: ANALYTICS & AUTOMATED PAYROLL ===== -->
        <section id="how-it-works" class="bg-white border-y border-slate-100 py-20">
            <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-12 gap-12 items-center">

                <!-- Left Column: Spreadsheet View Snippet -->
                <div class="md:col-span-6 space-y-4">
                    <div
                        class="bg-slate-50 border border-slate-200/60 rounded-3xl p-6 shadow-xl relative overflow-hidden">
                        <!-- Top header of spreadsheet mockup -->
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center gap-2">
                                <span class="w-3 h-3 rounded-full bg-rose-400"></span>
                                <span class="w-3 h-3 rounded-full bg-amber-400"></span>
                                <span class="w-3 h-3 rounded-full bg-emerald-400"></span>
                                <span
                                    class="text-xs font-bold text-slate-400 font-mono ml-2">attendance_matrix_july.xlsx</span>
                            </div>
                            <span
                                class="text-[10px] font-bold text-violet-600 bg-violet-50 border border-violet-100 px-2 py-0.5 rounded">Live
                                Report</span>
                        </div>

                        <!-- Spreadsheet table wrapper -->
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse text-xs font-mono">
                                <thead>
                                    <tr class="border-b border-slate-200 text-slate-400 bg-slate-100/50">
                                        <th class="py-2.5 px-3 font-semibold">Employee</th>
                                        <th class="py-2.5 px-3 font-semibold">Shift</th>
                                        <th class="py-2.5 px-3 font-semibold">Punch In</th>
                                        <th class="py-2.5 px-3 font-semibold">Late</th>
                                        <th class="py-2.5 px-3 font-semibold">LOP Deduct</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 text-slate-650 bg-white">
                                    <tr>
                                        <td class="py-3 px-3 font-bold text-slate-900">Philip Das</td>
                                        <td class="py-3 px-3">General</td>
                                        <td class="py-3 px-3 text-emerald-600">09:41 AM</td>
                                        <td class="py-3 px-3">0 mins</td>
                                        <td class="py-3 px-3"><span
                                                class="bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded text-[10px] font-bold">0.00
                                                LOP</span></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-3 font-bold text-slate-900">Rahul Sharma</td>
                                        <td class="py-3 px-3">General</td>
                                        <td class="py-3 px-3 text-amber-605">09:12 AM</td>
                                        <td class="py-3 px-3 text-amber-605">+12 mins</td>
                                        <td class="py-3 px-3"><span
                                                class="bg-amber-50 text-amber-700 px-2 py-0.5 rounded text-[10px] font-bold">0.25
                                                LOP</span></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-3 font-bold text-slate-900">Priya Patel</td>
                                        <td class="py-3 px-3">General</td>
                                        <td class="py-3 px-3 text-rose-500">--</td>
                                        <td class="py-3 px-3 text-rose-500">Absent</td>
                                        <td class="py-3 px-3"><span
                                                class="bg-rose-50 text-rose-700 px-2 py-0.5 rounded text-[10px] font-bold">1.00
                                                LOP</span></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-3 font-bold text-slate-900">John Doe</td>
                                        <td class="py-3 px-3">Night</td>
                                        <td class="py-3 px-3 text-emerald-600">08:00 PM</td>
                                        <td class="py-3 px-3">0 mins</td>
                                        <td class="py-3 px-3"><span
                                                class="bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded text-[10px] font-bold">0.00
                                                LOP</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Explanations -->
                <div class="md:col-span-6 space-y-8">
                    <div class="space-y-4">
                        <div
                            class="inline-flex items-center gap-2 bg-indigo-50 border border-indigo-100 px-4 py-1.5 rounded-full text-xs font-bold text-indigo-700 uppercase tracking-wider">
                            <i class="fa-solid fa-chart-line"></i> Analytics & Payroll
                        </div>
                        <h2
                            class="font-outfit text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-none">
                            Automate payroll-ready logs in real-time.
                        </h2>
                        <p class="text-slate-650 text-sm sm:text-base">
                            Skip manual spreadsheet corrections. The Attendance Machine app compiles biometric scans and
                            GPS data directly into a format compatible with standard accounting software.
                        </p>
                    </div>

                    <!-- Sub-Feature 1: LOP Matrix -->
                    <div class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-rose-50 border border-rose-100 text-rose-600 flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-calculator text-lg"></i>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-outfit font-bold text-slate-900">Automated Loss of Pay (LOP) Matrix</h4>
                            <p class="text-slate-550 text-sm leading-relaxed text-slate-500">
                                The app automatically flags late punches, absences, and calculates specific LOP
                                deductions (e.g., 1.00 full-day LOP deductions) based on your custom workspace shift
                                thresholds.
                            </p>
                        </div>
                    </div>

                    <!-- Sub-Feature 2: Instant Reports & Exports -->
                    <div class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-file-export text-lg"></i>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-outfit font-bold text-slate-900">Instant Reports & Exports</h4>
                            <p class="text-slate-550 text-sm leading-relaxed text-slate-500">
                                Highlight the ability to monitor high-level metrics like live Attendance Rates, active
                                staff counts, and audit logs. Easily trigger a One-Click Export to download clean
                                Company PDFs or Excel Matrices for payroll compilation.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== PRODUCT SHOWCASE: CLOUD PAYROLL MANAGEMENT SOFTWARE ===== -->
        <section id="cloud-payroll" class="py-20 relative overflow-hidden bg-slate-50 border-b border-slate-100">
            <!-- Background Glow Orbs for Premium Look -->
            <div
                class="absolute top-1/2 left-0 -translate-y-1/2 -z-10 w-[500px] h-[500px] bg-indigo-200/20 rounded-full blur-[120px] pointer-events-none">
            </div>
            <div
                class="absolute top-10 right-10 -z-10 w-[400px] h-[400px] bg-violet-200/20 rounded-full blur-[100px] pointer-events-none">
            </div>

            <div class="max-w-7xl mx-auto px-6">
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto space-y-4 mb-16">
                    <div
                        class="inline-flex items-center gap-2 bg-emerald-50 border border-emerald-100 px-4 py-1.5 rounded-full text-xs font-bold text-emerald-700 uppercase tracking-wider">
                        <i class="fa-solid fa-circle-nodes"></i> Seamless Combo Integration
                    </div>
                    <h2
                        class="font-outfit text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                        Power Up with Our <br>
                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Cloud-Based
                            Payroll Management</span> Software
                    </h2>
                    <p class="text-slate-600 text-sm sm:text-base max-w-2xl mx-auto">
                        Stop wasting days on manual salary processing. Connect our Attendance Machine with the Cloud
                        Payroll System to automate calculations, tax compliance, and payouts in seconds.
                    </p>
                </div>

                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <!-- Left: Pain Points vs Solution (Comparison Card Layout) -->
                    <div class="lg:col-span-7 space-y-6">
                        <div
                            class="bg-white border border-slate-200/70 rounded-3xl p-6 sm:p-8 shadow-xl hover:shadow-2xl transition-all duration-300 relative group">
                            <!-- Premium badge or accent -->
                            <div
                                class="absolute top-0 right-8 -translate-y-1/2 bg-violet-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                Before vs After
                            </div>

                            <h3 class="font-outfit text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                                <i class="fa-solid fa-triangle-exclamation text-amber-500"></i> The Payroll Headache vs.
                                The Smarter Way
                            </h3>

                            <div class="space-y-6">
                                <!-- Pain Point 1 -->
                                <div class="grid sm:grid-cols-2 gap-4 border-b border-slate-100 pb-5">
                                    <div class="space-y-1">
                                        <span
                                            class="text-[10px] font-extrabold text-rose-500 uppercase tracking-wider flex items-center gap-1.5">
                                            <i class="fa-solid fa-xmark"></i> The Headache
                                        </span>
                                        <p class="text-xs font-semibold text-slate-800">Manual LOP & Attendance Sync</p>
                                        <p class="text-slate-500 text-xs leading-relaxed">Cross-referencing spreadsheets
                                            with biometric logs takes hours and introduces human errors.</p>
                                    </div>
                                    <div class="space-y-1 sm:border-l sm:border-slate-100 sm:pl-4">
                                        <span
                                            class="text-[10px] font-extrabold text-emerald-600 uppercase tracking-wider flex items-center gap-1.5">
                                            <i class="fa-solid fa-check"></i> The Cloud Fix
                                        </span>
                                        <p class="text-xs font-semibold text-slate-800">1-Tap Direct Sync</p>
                                        <p class="text-slate-550 text-xs leading-relaxed text-slate-500">Attendance Machine logs
                                            (check-ins, late marks, LOP deductions) automatically feed into your payroll
                                            pipeline.</p>
                                    </div>
                                </div>

                                <!-- Pain Point 2 -->
                                <div class="grid sm:grid-cols-2 gap-4 border-b border-slate-100 pb-5">
                                    <div class="space-y-1">
                                        <span
                                            class="text-[10px] font-extrabold text-rose-500 uppercase tracking-wider flex items-center gap-1.5">
                                            <i class="fa-solid fa-xmark"></i> The Headache
                                        </span>
                                        <p class="text-xs font-semibold text-slate-800">Compliance & Tax Errors</p>
                                        <p class="text-slate-550 text-xs leading-relaxed text-slate-500">Struggling with PF, ESIC,
                                            Professional Tax, and TDS calculations. High risk of legal compliance
                                            penalties.</p>
                                    </div>
                                    <div class="space-y-1 sm:border-l sm:border-slate-100 sm:pl-4">
                                        <span
                                            class="text-[10px] font-extrabold text-emerald-600 uppercase tracking-wider flex items-center gap-1.5">
                                            <i class="fa-solid fa-check"></i> The Cloud Fix
                                        </span>
                                        <p class="text-xs font-semibold text-slate-800">Statutory Tax Engine</p>
                                        <p class="text-slate-550 text-xs leading-relaxed text-slate-500">Built-in calculator computes
                                            exact statutory deductions automatically based on current laws.</p>
                                    </div>
                                </div>

                                <!-- Pain Point 3 -->
                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div class="space-y-1">
                                        <span
                                            class="text-[10px] font-extrabold text-rose-500 uppercase tracking-wider flex items-center gap-1.5">
                                            <i class="fa-solid fa-xmark"></i> The Headache
                                        </span>
                                        <p class="text-xs font-semibold text-slate-800">Disconnected Payslips</p>
                                        <p class="text-slate-500 text-xs leading-relaxed">Distributing manual payslips
                                            via email or paper. Employees constantly asking for details.</p>
                                    </div>
                                    <div class="space-y-1 sm:border-l sm:border-slate-100 sm:pl-4">
                                        <span
                                            class="text-[10px] font-extrabold text-emerald-600 uppercase tracking-wider flex items-center gap-1.5">
                                            <i class="fa-solid fa-check"></i> The Cloud Fix
                                        </span>
                                        <p class="text-xs font-semibold text-slate-800">Self-Service Portal</p>
                                        <p class="text-slate-550 text-xs leading-relaxed text-slate-500">Employees instantly access,
                                            view, and download digital payslips and tax forms anytime, anywhere.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Features List & Beautiful Dynamic CTA -->
                    <div class="lg:col-span-5 space-y-8">
                        <div class="space-y-4">
                            <h3 class="font-outfit text-2xl font-bold text-slate-900">Essential Features Included</h3>
                            <p class="text-slate-600 text-sm">
                                Optimize your HR department with full-featured payroll modules that keep your business
                                compliant and running smoothly.
                            </p>
                        </div>

                        <!-- Feature Checklist -->
                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-lg bg-violet-100/80 text-violet-600 flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-wand-magic-sparkles text-xs"></i>
                                </div>
                                <span class="text-sm font-semibold text-slate-800">Automatic Salary Calculation &
                                    Deductions</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-lg bg-violet-100/80 text-violet-600 flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-file-invoice-dollar text-xs"></i>
                                </div>
                                <span class="text-sm font-semibold text-slate-800">One-click payslip generation &
                                    distribution</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-lg bg-violet-100/80 text-violet-600 flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-building-columns text-xs"></i>
                                </div>
                                <span class="text-sm font-semibold text-slate-800">Direct Bank Transfer
                                    Integration</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-8 h-8 rounded-lg bg-violet-100/80 text-violet-600 flex items-center justify-center flex-shrink-0">
                                    <i class="fa-solid fa-shield-halved text-xs"></i>
                                </div>
                                <span class="text-sm font-semibold text-slate-800">100% Secure, Encrypted cloud
                                    hosting</span>
                            </div>
                        </div>

                        <!-- Gorgeous CTA Block -->
                        <div class="pt-4">
                            <a href="https://payroll.infoleena.com" target="_blank" rel="noopener"
                                class="btn btn-primary btn-shine-trigger relative overflow-hidden px-8 py-4 text-sm font-bold shadow-md shadow-violet-500/20 w-full sm:w-auto text-center animate-pulse">
                                <span class="btn-shine"></span>
                                <i class="fa-solid fa-circle-nodes mr-2"></i>
                                Try Cloud Payroll Software
                                <i class="fa-solid fa-arrow-up-right-from-square text-xs ml-2 opacity-75"></i>
                            </a>
                            <p class="text-[11px] text-slate-400 mt-2.5 font-medium ml-1">
                                <i class="fa-solid fa-circle-nodes text-emerald-500"></i> Works in combination with the
                                Attendance Machine app.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== DEVELOPER ZONE: ENTERPRISE INTEGRATION ===== -->
        <section id="developer-zone" class="bg-slate-905 text-slate-100 py-20 relative overflow-hidden">
            <!-- Background Glow Orbs for Developer Aesthetic -->
            <div
                class="absolute top-1/4 left-1/4 -z-10 w-96 h-96 bg-violet-600/10 rounded-full blur-[120px] pointer-events-none">
            </div>
            <div
                class="absolute bottom-1/4 right-1/4 -z-10 w-96 h-96 bg-indigo-600/10 rounded-full blur-[120px] pointer-events-none">
            </div>

            <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-12 gap-12 items-center">
                <!-- Left: API Info & Details -->
                <div class="md:col-span-6 space-y-8">
                    <div class="space-y-4">
                        <div
                            class="inline-flex items-center gap-2 bg-violet-950 border border-violet-850 px-4 py-1.5 rounded-full text-xs font-bold text-violet-400 uppercase tracking-wider">
                            <i class="fa-solid fa-code text-sm"></i> Developer Zone
                        </div>
                        <h2
                            class="font-outfit text-3xl md:text-4xl font-extrabold text-white tracking-tight leading-tight">
                            Ready to Connect with Your Existing Payroll System?
                        </h2>
                        <p class="text-slate-400 text-sm sm:text-base">
                            Integrate attendance data effortlessly. Our platform is built with enterprise compatibility,
                            providing modern hooks to sync with your ERP, HRMS, or payroll calculations.
                        </p>
                    </div>

                    <!-- Highlight 1: API Endpoints -->
                    <div class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-violet-900/20 border border-violet-800/30 text-violet-400 flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-plug text-lg"></i>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-outfit font-bold text-white text-sm">Secure API Architecture</h4>
                            <p class="text-slate-400 text-xs leading-relaxed">
                                Define web endpoints where attendance records shoot over instantly as face-matching
                                events occur. Automate webhooks to feed check-in states straight to your servers.
                            </p>
                        </div>
                    </div>

                    <!-- Highlight 2: Bearer Token -->
                    <div class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-violet-900/20 border border-violet-800/30 text-violet-400 flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-key text-lg"></i>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-outfit font-bold text-white text-sm">Bearer Token Authentication</h4>
                            <p class="text-slate-400 text-xs leading-relaxed">
                                Safe and standard security token management out of the box. Secure headers prevent
                                unauthorized access, ensuring all incoming payloads match authentic biometric endpoints.
                            </p>
                        </div>
                    </div>

                    <!-- Highlight 3: Payroll Cycle -->
                    <div class="flex items-start gap-4">
                        <div
                            class="w-10 h-10 rounded-xl bg-violet-900/20 border border-violet-800/30 text-violet-400 flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-calendar-days text-lg"></i>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-outfit font-bold text-white text-sm">Custom Payroll Cycle Alignment</h4>
                            <p class="text-slate-400 text-xs leading-relaxed">
                                Adjust the reporting windows to perfectly mimic your billing calendars (e.g., setting
                                cycle starts to the 16th of the month) to map LOP records exactly when your payroll
                                compiler requires it.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right: Visual Settings Screen + Code Block Mockup -->
                <div class="md:col-span-6 space-y-6">
                    <!-- Console Frame -->
                    <div class="bg-slate-900 border border-slate-800 rounded-3xl overflow-hidden shadow-2xl">
                        <!-- Console Header -->
                        <div
                            class="bg-slate-950/80 px-5 py-3 border-b border-slate-800 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                                <span class="text-[10px] font-bold text-slate-500 font-mono ml-2">App Config & API Event
                                    Payload</span>
                            </div>
                            <i class="fa-solid fa-terminal text-slate-600 text-xs"></i>
                        </div>

                        <!-- Console Content -->
                        <div class="p-6 space-y-6">
                            <!-- Block 1: The Settings Screenshot Image -->
                            <div class="space-y-2">
                                <div class="text-[9px] font-bold text-slate-500 uppercase tracking-widest">Settings
                                    Screen (App Config)</div>
                                <div
                                    class="rounded-2xl border border-slate-800 overflow-hidden shadow-lg bg-slate-950 flex justify-center">
                                    <img src="{{ asset('landing-assets/images/integration_preview.jpeg') }}"
                                        alt="Custom Payroll Cycle and Bearer Token settings panel mockup in the Attendance Machine app"
                                        class="max-w-full h-auto object-cover opacity-90 hover:opacity-100 transition-opacity max-h-[300px]">
                                </div>
                            </div>

                            <!-- Block 2: JSON Payload Code Block -->
                            <div class="space-y-2">
                                <div class="text-[9px] font-bold text-slate-500 uppercase tracking-widest">JSON Webhook
                                    Payload (Real-time Event)</div>
                                <div
                                    class="bg-slate-950/80 border border-slate-850 p-4 rounded-2xl font-mono text-[10px] text-emerald-400 overflow-x-auto leading-relaxed">
                                    <pre>
<span class="text-violet-400">POST</span> /api/v1/attendance/events
<span class="text-slate-500">Authorization:</span> Bearer <span class="text-violet-300">lits_secure_token_abc123</span>
<span class="text-slate-500">Content-Type:</span> application/json

{
  <span class="text-slate-400">"event"</span>: <span class="text-amber-300">"biometric_face_match"</span>,
  <span class="text-slate-400">"timestamp"</span>: <span class="text-amber-300">"2026-07-04T09:41:28Z"</span>,
  <span class="text-slate-400">"employee"</span>: {
    <span class="text-slate-400">"email"</span>: <span class="text-amber-300">"philipdas20@gmail.com"</span>,
    <span class="text-slate-400">"name"</span>: <span class="text-amber-300">"Philip Das"</span>
  },
  <span class="text-slate-400">"match_confidence"</span>: <span class="text-violet-300">0.994</span>,
  <span class="text-slate-400">"payroll_cycle_start"</span>: <span class="text-violet-300">16</span>
}
</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== PRICING SECTION ===== -->
        <section id="pricing" class="max-w-7xl mx-auto px-6 py-20 relative">
            <div
                class="absolute top-1/4 right-1/4 -z-10 w-96 h-96 bg-indigo-100/30 rounded-full blur-[100px] pointer-events-none">
            </div>

            <!-- Title -->
            <div class="text-center max-w-2xl mx-auto space-y-4 mb-16">
                <h2 class="font-outfit text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Simple, transparent <span class="text-violet-600">pricing.</span>
                </h2>
                <p class="text-slate-650 text-sm sm:text-base">
                    Scale seamlessly with your team. Zero hidden setup costs. Adjust options below to estimate your
                    exact subscription fees.
                </p>

                <!-- Billing Toggle -->
                <div class="inline-flex items-center gap-2 bg-slate-100 border border-slate-200/80 p-1 rounded-xl mt-4">
                    <button
                        class="px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 bg-white text-slate-900 shadow-sm"
                        id="billing-monthly">
                        Monthly Billing
                    </button>
                    <button
                        class="px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 text-slate-550 hover:text-slate-900 flex items-center gap-1.5"
                        id="billing-yearly">
                        <span>Yearly Billing</span>
                        <span
                            class="bg-violet-100 text-violet-700 text-[10px] font-bold px-1.5 py-0.5 rounded-full border border-violet-200/50">Save
                            20%</span>
                    </button>
                </div>
            </div>

            <!-- Pricing Layout: 2 Cards -->
            <div class="grid md:grid-cols-12 gap-8 max-w-5xl mx-auto items-stretch">
                <!-- Plan 1: Free Tier -->
                <div
                    class="md:col-span-6 bg-white border border-slate-200/85 rounded-3xl p-8 flex flex-col justify-between shadow-sm relative h-full">
                    <div class="space-y-6">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-widest text-slate-400 block mb-2">Basic
                                Starter</span>
                            <h3 class="font-outfit text-2xl font-bold text-slate-900">Free Plan</h3>
                        </div>
                        <p class="text-slate-500 text-sm">
                            Perfect for tiny setups or testing core face recognition capabilities.
                        </p>
                        <div class="flex items-baseline">
                            <span class="text-5xl font-outfit font-black text-slate-900">₹0</span>
                            <span class="text-slate-400 text-sm font-semibold ml-1">/ month</span>
                        </div>
                        <div class="border-t border-slate-100 pt-6 space-y-4">
                            <div class="flex items-center gap-3 text-slate-655 text-sm">
                                <i class="fa-solid fa-circle-check text-violet-600"></i>
                                <span>Up to <strong>2 Employees</strong></span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-655 text-sm">
                                <i class="fa-solid fa-circle-check text-violet-600"></i>
                                <span>Lightning-Fast Face Scanner</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-655 text-sm">
                                <i class="fa-solid fa-circle-check text-violet-600"></i>
                                <span>Smart Employee Profiling (512-bit)</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-655 text-sm">
                                <i class="fa-solid fa-circle-check text-violet-600"></i>
                                <span>Standard Shift management</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-655 text-sm opacity-50">
                                <i class="fa-solid fa-circle-xmark text-slate-350"></i>
                                <span>Automated LOP Matrix & Payroll</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-655 text-sm opacity-50">
                                <i class="fa-solid fa-circle-xmark text-slate-350"></i>
                                <span>Developer APIs & Webhooks</span>
                            </div>
                        </div>
                    </div>
                    <a href="#download" class="btn btn-outline text-center mt-8 w-full py-4 text-sm font-bold">Download
                        Now</a>
                </div>

                <!-- Plan 2: Premium Tier (Interactive Slider Calculator) -->
                <div
                    class="md:col-span-6 bg-white border-2 border-violet-500 rounded-3xl p-8 flex flex-col justify-between shadow-lg relative h-full">
                    <!-- Recommended Ribbon -->
                    <div
                        class="absolute -top-3.5 right-8 bg-violet-600 text-white text-[10px] font-black uppercase tracking-wider px-3 py-1.5 rounded-full shadow-md">
                        Recommended
                    </div>

                    <div class="space-y-6">
                        <div>
                            <span
                                class="text-xs font-bold uppercase tracking-widest text-violet-600 block mb-2">Unlimited
                                Access</span>
                            <h3 class="font-outfit text-2xl font-bold text-slate-900">Premium Plan</h3>
                        </div>
                        <p class="text-slate-500 text-sm">
                            Tailored for growing teams. Pay only for the size of your workforce.
                        </p>

                        <!-- Employee Count Slider -->
                        <div class="bg-slate-50 border border-slate-100 p-6 rounded-2xl space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="font-semibold text-sm text-slate-800">Total Employees</span>
                                <div class="flex items-baseline gap-1">
                                    <span class="text-2xl font-outfit font-black text-violet-600"
                                        id="employee-count-val">20</span>
                                    <span class="text-slate-400 text-xs font-bold uppercase">Staff</span>
                                </div>
                            </div>
                            <!-- Range input -->
                            <div class="space-y-1">
                                <input type="range" id="employee-slider" min="0" max="5" value="2"
                                    class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-violet-600">
                                <div
                                    class="flex justify-between text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                                    <span>5 Staff</span>
                                    <span>10</span>
                                    <span>20</span>
                                    <span>50</span>
                                    <span>100</span>
                                    <span>Unlimited</span>
                                </div>
                            </div>
                        </div>

                        <!-- Computed Price Display -->
                        <div class="flex justify-between items-center border-t border-slate-100 pt-6">
                            <div>
                                <div class="flex items-baseline">
                                    <span class="text-5xl font-outfit font-black text-slate-900"
                                        id="price-calculated">₹100</span>
                                    <span class="text-slate-400 text-sm font-semibold ml-1" id="pricing-period">/
                                        month</span>
                                </div>
                                <p class="text-xs text-slate-400 mt-1" id="pricing-details-summary">
                                    Flat rate for up to 20 staff loaded with all features.
                                </p>
                            </div>
                            <span
                                class="text-xs font-bold text-emerald-600 bg-emerald-50 border border-emerald-100 px-3 py-1.5 rounded-full"
                                id="savings-badge">
                                Best Value
                            </span>
                        </div>

                        <!-- Features checklist -->
                        <div class="grid sm:grid-cols-2 gap-x-6 gap-y-3 pt-2">
                            <div class="flex items-center gap-3 text-slate-655 text-sm">
                                <i class="fa-solid fa-circle-check text-emerald-500"></i>
                                <span>Lightning-Fast Face Scanner</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-655 text-sm">
                                <i class="fa-solid fa-circle-check text-emerald-500"></i>
                                <span>Smart Employee Profiling (512-bit)</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-655 text-sm">
                                <i class="fa-solid fa-circle-check text-emerald-500"></i>
                                <span>Dynamic Shift Management</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-655 text-sm">
                                <i class="fa-solid fa-circle-check text-emerald-500"></i>
                                <span>Automated LOP Matrix Calculator</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-655 text-sm">
                                <i class="fa-solid fa-circle-check text-emerald-500"></i>
                                <span>Instant PDF & Excel exports</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-655 text-sm">
                                <i class="fa-solid fa-circle-check text-emerald-500"></i>
                                <span>Secure API webhooks & tokens</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-655 text-sm">
                                <i class="fa-solid fa-circle-check text-emerald-500"></i>
                                <span>Custom Payroll Cycle settings</span>
                            </div>
                            <div class="flex items-center gap-3 text-slate-655 text-sm">
                                <i class="fa-solid fa-circle-check text-emerald-500"></i>
                                <span>Priority 24/7 Support Integration</span>
                            </div>
                        </div>
                    </div>
                    <a href="#download"
                        class="btn btn-primary text-center mt-8 w-full py-4 text-sm font-bold shadow-md shadow-violet-500/10">Download
                        Now</a>
                </div>
            </div>
        </section>

        <!-- ===== DOWNLOAD AREA SECTION ===== -->
        <section id="download" class="max-w-7xl mx-auto px-6 py-12 md:py-20 relative">
            <div
                class="download-container bg-gradient-to-br from-violet-900 to-indigo-950 rounded-3xl p-8 md:p-16 relative overflow-hidden shadow-2xl text-center md:text-left">
                <!-- Grid layouts -->
                <div class="grid md:grid-cols-12 gap-8 items-center relative z-10">
                    <div class="md:col-span-8 space-y-6">
                        <h2
                            class="font-outfit text-3xl sm:text-4xl md:text-5xl font-black text-white tracking-tight leading-tight">
                            Ready to upgrade your organization's attendance system?
                        </h2>
                        <p class="text-violet-100 text-sm sm:text-base max-w-xl mx-auto md:mx-0">
                            Download the app now, set up your first shift template, and onboard your team in minutes.
                        </p>

                        <!-- Badges & Demo Button -->
                        <div class="flex flex-wrap items-center justify-center md:justify-start gap-4">
                            <a href="https://play.google.com/store/apps/details?id=in.leenaitsolutions.attendance.machine&hl=en_IN"
                                target="_blank" rel="noopener"
                                class="download-badge play-store-badge bg-white text-slate-900 border border-transparent hover:bg-violet-50 transition-all duration-300">
                                <i class="fa-brands fa-google-play text-2xl text-violet-600"></i>
                                <div>
                                    <span class="text-slate-400">GET IT ON</span>
                                    <strong class="text-slate-900">Google Play</strong>
                                </div>
                            </a>
                            <a href="https://apps.apple.com"
                                target="_blank" rel="noopener"
                                class="download-badge app-store-badge bg-white text-slate-900 border border-transparent hover:bg-violet-50 transition-all duration-300">
                                <i class="fa-brands fa-apple text-2xl text-black"></i>
                                <div>
                                    <span class="text-slate-400">DOWNLOAD ON THE</span>
                                    <strong class="text-slate-900">App Store</strong>
                                </div>
                            </a>
                            <button id="btn-watch-demo"
                                class="download-badge bg-transparent border border-white/20 hover:border-white/45 text-white hover:bg-white/10 transition-all duration-300 cursor-pointer">
                                <i class="fa-solid fa-circle-play text-2xl text-violet-400"></i>
                                <div>
                                    <span class="text-slate-300">WATCH 1-MIN</span>
                                    <strong class="text-white">Demo Video</strong>
                                </div>
                            </button>
                        </div>
                    </div>

                    <!-- App Icon display -->
                    <div class="md:col-span-4 flex justify-center">
                        <div class="app-icon-glow">
                            <div
                                class="w-32 h-32 rounded-[32px] bg-gradient-to-tr from-violet-600 to-indigo-600 shadow-2xl flex items-center justify-center border-4 border-violet-400/40">
                                <i class="fa-solid fa-clock-rotate-left text-white text-6xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Abstract design lines -->
                <div
                    class="absolute -bottom-16 -right-16 w-80 h-80 rounded-full bg-violet-850/20 border-8 border-violet-800/10 pointer-events-none">
                </div>
                <div
                    class="absolute -top-16 -left-16 w-80 h-80 rounded-full bg-indigo-850/20 border-8 border-indigo-800/10 pointer-events-none">
                </div>
            </div>
        </section>

    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-white border-t border-slate-100 py-16 text-slate-550 text-sm">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-12 gap-8">
            <!-- Brand Column -->
            <div class="md:col-span-5 space-y-4">
                <a href="#" class="flex items-center gap-3">
                    <div
                        class="logo-icon bg-gradient-to-tr from-violet-600 to-indigo-600 w-8 h-8 rounded-lg flex items-center justify-center shadow-md">
                        <i class="fa-solid fa-clock-rotate-left text-white text-sm"></i>
                    </div>
                    <span class="font-outfit text-lg font-bold tracking-tight text-slate-800">Attendance Machine</span>
                </a>
                <p class="max-w-xs text-slate-450 text-xs">
                    Empowering organizations to track time, manage shifts, and simplify payroll compliance with
                    precision.
                </p>
                <div class="text-xs text-slate-450">
                    Designed & developed by <a href="https://leenaitsolutions.in/" target="_blank"
                        class="font-bold text-violet-600 hover:underline hover:text-violet-700 transition-colors">Leena
                        IT Solutions</a>
                </div>
            </div>

            <!-- Links Column -->
            <div class="md:col-span-4 space-y-4">
                <h4 class="font-outfit font-bold text-slate-800 uppercase tracking-wider text-xs">Product Links</h4>
                <div class="flex flex-col gap-2">
                    <a href="#features" class="hover:text-violet-600 transition-colors">Key Features</a>
                    <a href="#how-it-works" class="hover:text-violet-600 transition-colors">How It Works</a>
                    <a href="#pricing" class="hover:text-violet-600 transition-colors">Calculator & Pricing</a>
                    <a href="https://play.google.com/store/apps/details?id=in.leenaitsolutions.attendance.machine"
                        target="_blank" class="hover:text-violet-600 transition-colors">Google Play Store</a>
                </div>
            </div>

            <!-- Support/Contact Column -->
            <div class="md:col-span-3 space-y-4">
                <h4 class="font-outfit font-bold text-slate-800 uppercase tracking-wider text-xs">Support</h4>
                <p class="text-slate-455 text-xs leading-relaxed">
                    Have questions? Get in touch with our team for technical assistance or licensing questions.
                </p>
                <div class="flex items-center gap-2 font-semibold text-slate-700">
                    <i class="fa-solid fa-envelope text-violet-600"></i>
                    <a href="mailto:leenaitsolutions@gmail.com"
                        class="hover:text-violet-600 transition-colors">leenaitsolutions@gmail.com</a>
                </div>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto px-6 border-t border-slate-100 mt-12 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-440">
            <div>
                &copy; 2026 Leena IT Solutions. All rights reserved.
            </div>
            <div class="flex gap-6">
                <a href="{{ route('privacy.policy') }}" class="hover:text-violet-600">Privacy Policy</a>
                <a href="#" class="hover:text-violet-600">Terms of Service</a>
            </div>
        </div>
    </footer>

    <!-- ===== VIDEO DEMO MODAL ===== -->
    <div id="video-modal"
        class="fixed inset-0 z-[100] flex items-center justify-center bg-slate-900/60 backdrop-blur-sm hidden"
        style="background-color: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px);">
        <div class="bg-white border border-slate-200 rounded-3xl p-6 max-w-2xl w-full mx-4 shadow-2xl relative">
            <button id="modal-close"
                class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-slate-900 text-white flex items-center justify-center hover:bg-slate-800 transition-colors shadow-md focus:outline-none">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div
                class="aspect-video w-full rounded-2xl overflow-hidden bg-slate-900 relative flex items-center justify-center h-[360px]">
                <!-- Lazy iframe player -->
                <iframe id="modal-iframe" class="w-full h-full border-0 hidden" src=""
                    title="Attendance Machine App Demo"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>

                <!-- Cover Preview Overlay -->
                <div id="modal-cover"
                    class="absolute inset-0 bg-slate-950/40 flex flex-col items-center justify-center text-center p-6 space-y-4">
                    <div class="w-16 h-16 rounded-full bg-violet-600 text-white flex items-center justify-center text-xl shadow-lg cursor-pointer hover:scale-105 transition-transform"
                        id="modal-play-btn">
                        <i class="fa-solid fa-play ml-1"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-300 uppercase tracking-widest">Attendance Machine
                        Promo</span>
                    <h4 class="font-outfit font-bold text-lg text-white">Contactless Office check-ins in 60 seconds</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom App Script -->
    <script src="{{ asset('landing-assets/js/app.js') }}?v=2"></script>
</body>

</html>