@extends('layouts.landing')

@section('title', 'Attendance Machine | Contactless Face Recognition Attendance & Payroll')

@section('content')
<!-- ===== 1. HERO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 grid md:grid-cols-12 gap-12 items-center py-16 md:py-24 relative">
    <!-- Background Glow Orbs -->
    <div class="absolute top-10 left-10 -z-10 w-96 h-96 bg-violet-200/40 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="absolute bottom-10 right-10 -z-10 w-96 h-96 bg-indigo-200/30 rounded-full blur-[100px] pointer-events-none"></div>

    <!-- Left: Hero Text -->
    <div class="md:col-span-7 space-y-6 text-center md:text-left">
        <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-xs font-bold text-violet-700 uppercase tracking-wider">
            <span class="pulse-dot"></span> Contactless AI Attendance App
        </div>
        <h1 class="font-outfit text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-tight">
            Face Recognition <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Employee Attendance</span> & <br>
            Payroll App for Businesses.
        </h1>
        <p class="text-base sm:text-lg text-slate-600 max-w-xl mx-auto md:mx-0">
            Turn any mobile device into a high-accuracy, contactless face recognition kiosk. Verify location with real-time GPS and automate payroll logs instantly.
        </p>

        <!-- Primary CTA Buttons -->
        <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 pt-2">
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-primary px-8 py-4 text-sm font-bold shadow-md shadow-violet-500/20">
                    Go to Console
                </a>
            @else
                <a href="https://play.google.com/store/apps/details?id=in.leenaitsolutions.attendance.machine&hl=en_IN" target="_blank" rel="noopener" class="download-badge bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300">
                    <i class="fa-brands fa-google-play text-2xl text-violet-500"></i>
                    <div>
                        <span class="text-slate-400">GET IT ON</span>
                        <strong class="text-white">Google Play</strong>
                    </div>
                </a>
                <a href="https://apps.apple.com" target="_blank" rel="noopener" class="download-badge bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300">
                    <i class="fa-brands fa-apple text-2xl text-white"></i>
                    <div>
                        <span class="text-slate-400">DOWNLOAD ON THE</span>
                        <strong class="text-white">App Store</strong>
                    </div>
                </a>
            @endauth
            
            <button id="btn-watch-demo" class="btn btn-outline px-6 py-4 text-sm font-bold flex items-center gap-2">
                <i class="fa-solid fa-play text-violet-600"></i> Watch Demo
            </button>
        </div>
    </div>

    <!-- Right: Mockup Display -->
    <div class="md:col-span-5 relative flex justify-center">
        <div class="phone-mockup w-[270px] h-[540px] rounded-[40px] overflow-hidden relative border-8 border-slate-900 shadow-2xl">
            <!-- Camera lens element -->
            <div class="absolute top-3 left-1/2 -translate-x-1/2 w-3 h-3 rounded-full bg-slate-850 z-20"></div>
            <!-- Screen image -->
            <div class="phone-screen w-full h-full bg-slate-950 flex flex-col justify-between p-6 relative">
                <!-- Inner screen top status -->
                <div class="flex justify-between items-center text-[10px] font-bold text-slate-400">
                    <span>9:41 AM</span>
                    <div class="flex items-center gap-1">
                        <i class="fa-solid fa-signal"></i>
                        <i class="fa-solid fa-battery-three-quarters text-emerald-400"></i>
                    </div>
                </div>

                <!-- Central UI content -->
                <div class="my-auto space-y-6 text-center">
                    <div class="w-36 h-36 rounded-full border-4 border-violet-500/50 mx-auto flex items-center justify-center relative bg-slate-900">
                        <!-- Scanning line animation -->
                        <div class="absolute inset-x-4 top-1/2 h-[2px] bg-violet-400 shadow-md shadow-violet-500/80 animate-pulse"></div>
                        <i class="fa-solid fa-user-astronaut text-white text-5xl text-violet-400"></i>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-outfit text-white text-base font-extrabold">Verifying Face...</h4>
                        <p class="text-slate-400 text-[10px]">Align face in frame</p>
                    </div>
                </div>

                <!-- Checked-in notification mockup -->
                <div class="bg-slate-900/90 border border-slate-800 rounded-xl p-3 flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div class="text-left">
                        <p class="text-white text-[10px] font-extrabold">Attendance Marked</p>
                        <p class="text-slate-400 text-[8px]">John Doe • Factory Shift A</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Badges -->
        <div class="absolute -top-4 -right-4 floating-badge bg-white shadow-xl rounded-2xl p-4 flex items-center gap-3 border border-slate-100 animate-float">
            <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center text-lg">
                <i class="fa-solid fa-bolt"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-800">&lt; 2s Verification</p>
                <p class="text-[10px] text-slate-550">Fast & contactless</p>
            </div>
        </div>
        
        <div class="absolute bottom-6 -left-6 floating-badge bg-white shadow-xl rounded-2xl p-4 flex items-center gap-3 border border-slate-100 animate-float-delayed">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg">
                <i class="fa-solid fa-location-dot"></i>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-800">GPS Verified</p>
                <p class="text-[10px] text-slate-550">Real-time coordinates</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== 2. TRUSTED BY ===== -->
<section class="bg-slate-50 border-y border-slate-150 py-10">
    <div class="max-w-7xl mx-auto px-6 text-center space-y-4">
        <p class="text-[10px] font-bold text-slate-450 uppercase tracking-widest">Trusted by 10,000+ Operations Managers & HR Leads</p>
        <div class="flex flex-wrap justify-center items-center gap-12 opacity-40">
            <span class="font-outfit font-black text-slate-800 text-lg tracking-wider">LEENA IT</span>
            <span class="font-outfit font-black text-slate-800 text-lg tracking-wider">ACME CORP</span>
            <span class="font-outfit font-black text-slate-800 text-lg tracking-wider">GLOBEX</span>
            <span class="font-outfit font-black text-slate-800 text-lg tracking-wider">INITECH</span>
            <span class="font-outfit font-black text-slate-800 text-lg tracking-wider">STARK IND</span>
        </div>
    </div>
</section>

<!-- ===== 3. PROBLEMS SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-20 space-y-12">
    <div class="text-center space-y-3 max-w-xl mx-auto">
        <span class="text-xs font-bold text-rose-600 uppercase tracking-widest">Roster Friction</span>
        <h2 class="font-outfit text-3xl font-black text-slate-900">Why Traditional Attendance Fails</h2>
        <p class="text-slate-500 text-xs">Biometrics constraints and paper rosters leak productivity and budget.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-rose-50/20 border border-rose-100/30 rounded-3xl p-8 space-y-4">
            <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-lg"><i class="fa-solid fa-hand-dots"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Dirty Biometric Devices</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Fingerprint readers act as vector routes for germs and fail completely if workers have dusty or greasy hands.
            </p>
        </div>
        <div class="bg-rose-50/20 border border-rose-100/30 rounded-3xl p-8 space-y-4">
            <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-lg"><i class="fa-solid fa-user-ninja"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Rampant Buddy Punching</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                Colleagues easily share PIN codes or swap physical access cards to check in for late or absent employees.
            </p>
        </div>
        <div class="bg-rose-50/20 border border-rose-100/30 rounded-3xl p-8 space-y-4">
            <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-lg"><i class="fa-solid fa-circle-exclamation"></i></div>
            <h3 class="font-outfit font-bold text-slate-800 text-base">Manual Excel Adjustments</h3>
            <p class="text-slate-550 text-xs leading-relaxed">
                HR managers waste up to 4 days each month calculating rotational split shifts overlays and Loss of Pay (LOP) flags.
            </p>
        </div>
    </div>
</section>

<!-- ===== 4. SOLUTIONS SECTION ===== -->
<section class="bg-white border-y border-slate-100 py-20">
    <div class="max-w-7xl mx-auto px-6 space-y-12">
        <div class="text-center space-y-3 max-w-xl mx-auto">
            <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest font-outfit">Smarter Verification</span>
            <h2 class="font-outfit text-3xl font-black text-slate-900">The Contactless AI Alternative</h2>
            <p class="text-slate-500 text-xs font-medium">Protect payroll sheets and secure checkpoints using existing tablets.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-emerald-50/10 border border-emerald-100/30 rounded-3xl p-8 space-y-4">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg"><i class="fa-solid fa-face-smile"></i></div>
                <h3 class="font-outfit font-bold text-slate-800 text-base">100% Contact-Free Scan</h3>
                <p class="text-slate-550 text-xs leading-relaxed">
                    Verify employee signatures in under 2 seconds. No image files are saved locally, ensuring staff privacy compliance.
                </p>
            </div>
            <div class="bg-emerald-50/10 border border-emerald-100/30 rounded-3xl p-8 space-y-4">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg"><i class="fa-solid fa-globe"></i></div>
                <h3 class="font-outfit font-bold text-slate-800 text-base">GPS Location Tagging</h3>
                <p class="text-slate-550 text-xs leading-relaxed">
                    Tag punch records with verified coordinates. Geofencing parameters restrict logins to authorized branches.
                </p>
            </div>
            <div class="bg-emerald-50/10 border border-emerald-100/30 rounded-3xl p-8 space-y-4">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg"><i class="fa-solid fa-calculator"></i></div>
                <h3 class="font-outfit font-bold text-slate-800 text-base">Deductions Automation</h3>
                <p class="text-slate-550 text-xs leading-relaxed">
                    Deduct LOP day fractions automatically based on grace windows, late check limits, and half-day absence rules.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ===== 5. HOW IT WORKS SECTION (GET STARTED IN UNDER 5 MINS - KEEP SAME) ===== -->
<section class="bg-slate-900 text-white py-20 relative overflow-hidden">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-violet-500/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 space-y-16 relative">
        <div class="text-center space-y-4 max-w-xl mx-auto">
            <span class="text-xs font-bold text-violet-400 uppercase tracking-widest">Simple Onboarding</span>
            <h2 class="font-outfit text-3xl sm:text-4xl font-black leading-tight">Get Started in Under 5 Minutes</h2>
            <p class="text-slate-400 text-xs">Transform how your business monitors employee attendance with these three simple steps.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-12 text-center">
            <!-- Step 1 -->
            <div class="space-y-4 relative">
                <div class="w-16 h-16 rounded-3xl bg-violet-600/20 border border-violet-500/30 text-violet-400 flex items-center justify-center text-2xl font-black font-outfit mx-auto shadow-lg">1</div>
                <h3 class="font-outfit font-extrabold text-base">Install the Mobile App</h3>
                <p class="text-slate-400 text-xs leading-relaxed max-w-xs mx-auto">
                    Download Attendance Machine onto any Android or iOS smartphone or tablet from the App stores.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="space-y-4 relative">
                <div class="w-16 h-16 rounded-3xl bg-violet-600/20 border border-violet-500/30 text-violet-400 flex items-center justify-center text-2xl font-black font-outfit mx-auto shadow-lg">2</div>
                <h3 class="font-outfit font-extrabold text-base">Register Staff Face Biometrics</h3>
                <p class="text-slate-400 text-xs leading-relaxed max-w-xs mx-auto">
                    Snap a quick setup profile photo of each employee. The AI maps a secure mathematical matrix in under 2 seconds.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="space-y-4 relative">
                <div class="w-16 h-16 rounded-3xl bg-violet-600/20 border border-violet-500/30 text-violet-400 flex items-center justify-center text-2xl font-black font-outfit mx-auto shadow-lg">3</div>
                <h3 class="font-outfit font-extrabold text-base">Place and Verify</h3>
                <p class="text-slate-400 text-xs leading-relaxed max-w-xs mx-auto">
                    Mount the device at your entrance. Employees scan to punch in. Attendance lists sync to the web panel live.
                </p>
            </div>
        </div>

        <div class="text-center pt-8">
            <a href="{{ route('demo') }}" class="btn btn-primary px-8 py-4 text-sm font-bold shadow-lg">Book a Setup Call</a>
        </div>
    </div>
</section>

<!-- ===== 6. FEATURES TOUR ===== -->
<section class="max-w-7xl mx-auto px-6 py-20 space-y-12">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
        <div>
            <span class="text-xs font-bold text-violet-600 uppercase tracking-widest">Premium Catalog</span>
            <h2 class="font-outfit text-3xl font-black text-slate-900 mt-1">Core Modules & Features</h2>
        </div>
        <a href="{{ route('features') }}" class="btn btn-outline text-xs px-6 py-3 font-bold">View All Features</a>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center"><i class="fa-solid fa-expand text-base"></i></div>
                <h4 class="font-outfit font-bold text-slate-800 text-base">Face Match Kiosk</h4>
                <p class="text-slate-500 text-xs leading-relaxed">Contactless scanning using abstract face landmark mapping vectors.</p>
            </div>
            <a href="{{ route('features.detail.face-recognition') }}" class="text-xs text-violet-600 font-bold mt-4 inline-flex items-center gap-1">Explore <i class="fa-solid fa-chevron-right"></i></a>
        </div>

        <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center"><i class="fa-solid fa-map-location-dot"></i></div>
                <h4 class="font-outfit font-bold text-slate-800 text-base">GPS Geofencing</h4>
                <p class="text-slate-500 text-xs leading-relaxed">Locks verify scans to authorized coordinates perimeters.</p>
            </div>
            <a href="{{ route('features.detail.employee-management') }}" class="text-xs text-violet-600 font-bold mt-4 inline-flex items-center gap-1">Explore <i class="fa-solid fa-chevron-right"></i></a>
        </div>

        <div class="bg-white border border-slate-100 rounded-3xl p-6 shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-3">
                <div class="w-10 h-10 rounded-xl bg-violet-50 text-violet-600 flex items-center justify-center"><i class="fa-solid fa-calendar-week"></i></div>
                <h4 class="font-outfit font-bold text-slate-800 text-base">Shifts Scheduling</h4>
                <p class="text-slate-550 text-xs leading-relaxed">Configure morning templates, overtime grace, and rotating buffers.</p>
            </div>
            <a href="{{ route('features.detail.shift-management') }}" class="text-xs text-violet-600 font-bold mt-4 inline-flex items-center gap-1">Explore <i class="fa-solid fa-chevron-right"></i></a>
        </div>
    </div>
</section>

<!-- ===== 7. SCREENSHOTS SECTION ===== -->
<section class="bg-slate-50 border-y border-slate-150 py-20 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 space-y-12">
        <div class="text-center space-y-3 max-w-xl mx-auto">
            <span class="text-xs font-bold text-violet-600 uppercase tracking-widest">Visual Tour</span>
            <h2 class="font-outfit text-3xl font-black text-slate-900">High-Fidelity Dashboard</h2>
            <p class="text-slate-500 text-xs">Take a glance at our premium reporting interfaces and calendar-based matrix modules.</p>
        </div>

        <div class="bg-white border border-slate-150 rounded-3xl p-6 shadow-lg max-w-4xl mx-auto">
            <div class="border-b border-slate-150 pb-4 mb-4 flex items-center justify-between text-xs text-slate-400 font-bold">
                <div class="flex items-center gap-1.5"><i class="fa-solid fa-circle text-[8px] text-violet-500"></i> Admin Panel Preview</div>
                <span>Workspace: HQ-Main</span>
            </div>
            <!-- Matrix visual -->
            <div class="grid grid-cols-7 gap-2 text-center text-[10px]">
                <span class="font-bold text-slate-400">MON</span>
                <span class="font-bold text-slate-400">TUE</span>
                <span class="font-bold text-slate-400">WED</span>
                <span class="font-bold text-slate-400">THU</span>
                <span class="font-bold text-slate-400">FRI</span>
                <span class="font-bold text-slate-400">SAT</span>
                <span class="font-bold text-slate-400">SUN</span>

                <span class="p-2.5 rounded-lg bg-emerald-50 text-emerald-700 font-extrabold">P</span>
                <span class="p-2.5 rounded-lg bg-emerald-50 text-emerald-700 font-extrabold">P</span>
                <span class="p-2.5 rounded-lg bg-emerald-50 text-emerald-700 font-extrabold">P</span>
                <span class="p-2.5 rounded-lg bg-amber-50 text-amber-700 font-extrabold">L</span>
                <span class="p-2.5 rounded-lg bg-emerald-50 text-emerald-700 font-extrabold">P</span>
                <span class="p-2.5 rounded-lg bg-rose-50 text-rose-700 font-extrabold">A</span>
                <span class="p-2.5 rounded-lg text-slate-400 font-bold">Off</span>
            </div>
        </div>
    </div>
</section>

<!-- ===== 8. DEMO VIDEO SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 py-20 text-center space-y-6">
    <div class="bg-slate-900 rounded-3xl p-8 md:p-12 text-white relative overflow-hidden group max-w-4xl mx-auto shadow-2xl">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(124,58,237,0.15),transparent_70%)] pointer-events-none"></div>
        <div class="space-y-4 max-w-md mx-auto relative z-10">
            <h3 class="font-outfit text-xl sm:text-2xl font-black">Watch Attendance Machine in Action</h3>
            <p class="text-slate-400 text-xs">See a live presentation explaining our contact-free checks, custom geofences, and LOP payroll outputs in 60 seconds.</p>
            <div class="pt-4">
                <button onclick="document.getElementById('btn-watch-demo').click()" class="btn btn-primary text-xs px-8 py-3.5 shadow-lg group-hover:scale-105 transition-transform flex items-center gap-2 mx-auto font-bold">
                    <i class="fa-solid fa-circle-play text-base"></i> Launch Demo Video
                </button>
            </div>
        </div>
    </div>
</section>

<!-- ===== 9. INDUSTRIES ===== -->
<section class="bg-white border-y border-slate-100 py-20">
    <div class="max-w-7xl mx-auto px-6 space-y-12">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
            <div>
                <span class="text-xs font-bold text-violet-600 uppercase tracking-widest">Industry Portals</span>
                <h2 class="font-outfit text-3xl font-black text-slate-900 mt-1">Solutions by Vertical</h2>
            </div>
            <a href="{{ route('industries') }}" class="btn btn-outline text-xs px-6 py-3 font-bold">All Industries</a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-6 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-violet-100 text-violet-650 flex items-center justify-center text-sm"><i class="fa-solid fa-graduation-cap"></i></div>
                    <h4 class="font-outfit font-bold text-slate-800 text-sm">Schools & Universities</h4>
                    <p class="text-slate-500 text-[11px] leading-relaxed">Student gate security checks and teacher substitute rosters.</p>
                </div>
                <a href="{{ route('industries.detail.schools') }}" class="text-[11px] text-violet-650 font-bold mt-4 inline-flex items-center gap-1">Explore <i class="fa-solid fa-chevron-right text-[8px]"></i></a>
            </div>

            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-6 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-violet-100 text-violet-650 flex items-center justify-center text-sm"><i class="fa-solid fa-house-medical"></i></div>
                    <h4 class="font-outfit font-bold text-slate-800 text-sm">Hospitals & Clinics</h4>
                    <p class="text-slate-500 text-[11px] leading-relaxed">Rotational 24/7 night rosters and contact-free sanitization.</p>
                </div>
                <a href="{{ route('industries.detail.hospitals') }}" class="text-[11px] text-violet-650 font-bold mt-4 inline-flex items-center gap-1">Explore <i class="fa-solid fa-chevron-right text-[8px]"></i></a>
            </div>

            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-6 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-violet-100 text-violet-650 flex items-center justify-center text-sm"><i class="fa-solid fa-industry"></i></div>
                    <h4 class="font-outfit font-bold text-slate-800 text-sm">Factories & Plants</h4>
                    <p class="text-slate-550 text-[11px] leading-relaxed">High-speed scans for massive turnarounds, dirty fingers bypass.</p>
                </div>
                <a href="{{ route('industries.detail.factories') }}" class="text-[11px] text-violet-650 font-bold mt-4 inline-flex items-center gap-1">Explore <i class="fa-solid fa-chevron-right text-[8px]"></i></a>
            </div>

            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-6 flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="w-8 h-8 rounded-lg bg-violet-100 text-violet-650 flex items-center justify-center text-sm"><i class="fa-solid fa-building"></i></div>
                    <h4 class="font-outfit font-bold text-slate-800 text-sm">Corporate Offices</h4>
                    <p class="text-slate-550 text-[11px] leading-relaxed">Track office staff punctuality scorecard values and late logs.</p>
                </div>
                <a href="{{ route('industries.detail.offices') }}" class="text-[11px] text-violet-650 font-bold mt-4 inline-flex items-center gap-1">Explore <i class="fa-solid fa-chevron-right text-[8px]"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- ===== 10. REPORTS ===== -->
<section class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-12 gap-12 items-center">
    <div class="md:col-span-5 space-y-6">
        <span class="text-xs font-bold text-violet-600 uppercase tracking-widest font-outfit">Payroll Output</span>
        <h2 class="font-outfit text-3xl font-black text-slate-900 leading-tight">Generate Audit-Ready PDF & Excel Reports</h2>
        <p class="text-slate-500 text-xs leading-relaxed">
            Download daily scans, shift matrices, and LOP summaries in landscape print-friendly A4 sizes. Custom headers support integration into local workflows.
        </p>
        <a href="{{ route('reports') }}" class="btn btn-primary text-xs px-6 py-3 font-bold inline-block shadow-md">Preview Formats</a>
    </div>
    
    <div class="md:col-span-7 bg-slate-50 border border-slate-100 rounded-3xl p-6">
        <!-- Roster Table Mock -->
        <div class="overflow-x-auto border border-slate-150 rounded-xl bg-white text-[10px]">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 font-bold text-slate-500">
                    <tr class="border-b border-slate-150">
                        <th class="p-3">Staff</th>
                        <th class="p-3 text-center">Days present</th>
                        <th class="p-3 text-center">Late marks</th>
                        <th class="p-3 text-center">LOP</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-650">
                    <tr>
                        <td class="p-3 font-bold text-slate-800">John Doe</td>
                        <td class="p-3 text-center font-bold text-emerald-600">26 / 26</td>
                        <td class="p-3 text-center">0</td>
                        <td class="p-3 text-center font-bold">0.0</td>
                    </tr>
                    <tr>
                        <td class="p-3 font-bold text-slate-800">Jane Smith</td>
                        <td class="p-3 text-center font-bold text-emerald-600 font-bold">24 / 26</td>
                        <td class="p-3 text-center text-amber-600 font-bold">4</td>
                        <td class="p-3 text-center text-rose-600 font-bold">1.5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- ===== 11. DEVELOPER API ===== -->
<section class="bg-slate-905 border-y border-slate-850 py-20 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(124,58,237,0.08),transparent_60%)]"></div>
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center relative z-10">
        <div class="space-y-6">
            <span class="text-xs font-bold text-violet-400 uppercase tracking-widest font-outfit">ERP Sync</span>
            <h2 class="font-outfit text-3xl font-black leading-tight text-white">Developer Rest API & Real-time Webhooks</h2>
            <p class="text-slate-400 text-xs leading-relaxed">
                Connect checks registers directly with your custom HRMS, SAP, Oracle, or local Excel macros. Authenticate safely using Bearer tokens.
            </p>
            <a href="{{ route('api.integration') }}" class="btn btn-primary text-xs px-6 py-3 font-bold inline-block">Read API Docs</a>
        </div>
        
        <div class="bg-slate-950 border border-slate-850 p-6 rounded-2xl font-mono text-[9px] text-slate-300 max-h-56 overflow-y-auto">
<pre>{
  "event": "attendance.created",
  "data": {
    "employee": "Jane Smith",
    "scan_time": "08:55:04",
    "gps_verified": true
  }
}</pre>
        </div>
    </div>
</section>

<!-- ===== 12. TESTIMONIALS ===== -->
<section class="max-w-7xl mx-auto px-6 py-20 space-y-12">
    <div class="text-center space-y-3 max-w-xl mx-auto">
        <span class="text-xs font-bold text-violet-600 uppercase tracking-widest">Client Feedback</span>
        <h2 class="font-outfit text-3xl font-black text-slate-900">What Operations Managers Say</h2>
        <p class="text-slate-500 text-xs">Read verification reviews from local administrators.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white border border-slate-100 rounded-3xl p-8 space-y-4 shadow-sm">
            <div class="text-amber-400 text-sm"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
            <p class="text-slate-600 text-xs leading-relaxed">
                "We replaced our physical fingerprint readers with Attendance Machine tablets in our Nagpur plant. Zero dirt scanner errors and 100% buddy punching protection."
            </p>
            <div>
                <p class="text-xs font-bold text-slate-800 leading-none">Ravi Sharma</p>
                <p class="text-[9px] text-slate-450 mt-1">Plant Supervisor, TechMech India</p>
            </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-3xl p-8 space-y-4 shadow-sm">
            <div class="text-amber-400 text-sm"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
            <p class="text-slate-600 text-xs leading-relaxed">
                "Calculating LOP days was a massive bottleneck for our retail branches. The auto deductions calculations rules save us days of accountant work."
            </p>
            <div>
                <p class="text-xs font-bold text-slate-800 leading-none">Priya Patel</p>
                <p class="text-[9px] text-slate-450 mt-1">HR Executive, Sun Retail Chains</p>
            </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-3xl p-8 space-y-4 shadow-sm">
            <div class="text-amber-400 text-sm"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
            <p class="text-slate-600 text-xs leading-relaxed">
                "The offline sync works flawlessly at our remote construction project perimeters. Coordinates check verification keeps billing entries fully auditable."
            </p>
            <div>
                <p class="text-xs font-bold text-slate-800 leading-none">Amit Joshi</p>
                <p class="text-[9px] text-slate-450 mt-1">Project Director, Joshi Infrastructure</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== 13. PRICING SECTION ===== -->
<section id="pricing" class="bg-slate-50 border-y border-slate-150 py-20">
    <div class="max-w-7xl mx-auto px-6 space-y-12">
        <div class="text-center space-y-3 max-w-xl mx-auto">
            <span class="text-xs font-bold text-violet-600 uppercase tracking-widest font-outfit">Pricing Plans</span>
            <h2 class="font-outfit text-3xl font-black text-slate-900">Affordable Packages for All Scales</h2>
            <p class="text-slate-550 text-xs font-medium">Get started completely free or unlock enterprise configurations.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <!-- Free Plan -->
            <div class="bg-white border border-slate-150 rounded-3xl p-8 shadow-sm space-y-6 flex flex-col justify-between">
                <div class="space-y-4">
                    <h3 class="font-outfit font-extrabold text-lg text-slate-800 leading-none">Free Tier</h3>
                    <p class="text-slate-500 text-xs">For small startups or retail teams.</p>
                    <div class="text-slate-800 font-outfit"><strong class="text-3xl font-black">₹0</strong> <span class="text-xs text-slate-450 font-bold">/ Month</span></div>
                    <ul class="space-y-3 text-xs text-slate-550 border-t border-slate-50 pt-4">
                        <li><i class="fa-solid fa-check text-emerald-500 mr-2"></i> Up to 2 staff profiles</li>
                        <li><i class="fa-solid fa-check text-emerald-500 mr-2"></i> Standard facial kiosk scan</li>
                        <li><i class="fa-solid fa-check text-emerald-500 mr-2"></i> GPS verified logs</li>
                    </ul>
                </div>
                <a href="{{ route('login') }}" class="btn btn-outline w-full text-center text-xs py-3 font-bold block">Start Free</a>
            </div>

            <!-- Premium Pro Plan -->
            <div class="bg-white border-2 border-violet-500 rounded-3xl p-8 shadow-md space-y-6 flex flex-col justify-between relative">
                <span class="absolute top-0 right-6 -translate-y-1/2 bg-violet-600 text-white text-[9px] font-black uppercase tracking-wider px-3 py-1 rounded-full">POPULAR</span>
                <div class="space-y-4">
                    <h3 class="font-outfit font-extrabold text-lg text-slate-800 leading-none">Premium Pro</h3>
                    <p class="text-slate-550 text-xs">For growing factories and shops.</p>
                    <div class="text-slate-800 font-outfit"><strong class="text-3xl font-black">₹250</strong> <span class="text-xs text-slate-450 font-bold">/ Month</span></div>
                    <ul class="space-y-3 text-xs text-slate-550 border-t border-slate-50 pt-4">
                        <li><i class="fa-solid fa-check text-emerald-500 mr-2"></i> Up to 100+ staff profiles</li>
                        <li><i class="fa-solid fa-check text-emerald-500 mr-2"></i> Custom shifts scheduling</li>
                        <li><i class="fa-solid fa-check text-emerald-500 mr-2"></i> Auto LOP salary math rules</li>
                        <li><i class="fa-solid fa-check text-emerald-500 mr-2"></i> Premium Excel/PDF output</li>
                    </ul>
                </div>
                <a href="{{ route('login') }}" class="btn btn-primary w-full text-center text-xs py-3 font-bold block">Start Pro Trial</a>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-white border border-slate-150 rounded-3xl p-8 shadow-sm space-y-6 flex flex-col justify-between">
                <div class="space-y-4">
                    <h3 class="font-outfit font-extrabold text-lg text-slate-800 leading-none">Enterprise</h3>
                    <p class="text-slate-500 text-xs">For distributed corporate chains.</p>
                    <div class="text-slate-800 font-outfit"><strong class="text-3xl font-black">Custom</strong> <span class="text-xs text-slate-450 font-bold">/ Quote</span></div>
                    <ul class="space-y-3 text-xs text-slate-550 border-t border-slate-50 pt-4">
                        <li><i class="fa-solid fa-check text-emerald-500 mr-2"></i> Unlimited staff profiles</li>
                        <li><i class="fa-solid fa-check text-emerald-500 mr-2"></i> Developer REST APIs</li>
                        <li><i class="fa-solid fa-check text-emerald-500 mr-2"></i> Real-time JSON webhook push</li>
                        <li><i class="fa-solid fa-check text-emerald-500 mr-2"></i> 24/7 WhatsApp engineers SLA</li>
                    </ul>
                </div>
                <a href="{{ route('contact') }}" class="btn btn-outline w-full text-center text-xs py-3 font-bold block">Contact Sales</a>
            </div>
        </div>
    </div>
</section>

<!-- ===== 14. FAQS ===== -->
<section class="max-w-4xl mx-auto px-6 py-20 space-y-8">
    <h3 class="font-outfit text-3xl font-black text-center text-slate-900">Roster & Scanner FAQs</h3>
    
    <div class="space-y-3">
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Can we configure multiple device terminals for a single workspace?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. Under settings, you can add multiple mobile phones or tablet terminals, allowing employees to scan check-ins at any designated entrance.
            </div>
        </div>

        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>What happens to check-in logs if the tablet loses internet connectivity?</span>
                <i class="fa-solid fa-chevron-down text-slate-400"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Offline Mode registers punches locally in internal device storage. Once network connection is restored, logs sync to the cloud database automatically.
            </div>
        </div>
    </div>
</section>

<!-- ===== 15. LATEST BLOGS ===== -->
<section class="max-w-7xl mx-auto px-6 py-20 border-t border-slate-100 space-y-12">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
        <div>
            <span class="text-xs font-bold text-violet-600 uppercase tracking-widest font-outfit">Company Insights</span>
            <h2 class="font-outfit text-3xl font-black text-slate-900 mt-1">Read Our Latest Articles</h2>
        </div>
        <a href="{{ route('blog') }}" class="btn btn-outline text-xs px-6 py-3 font-bold">Go to Blog Directory</a>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        @forelse($latestPosts as $post)
        <!-- Dynamic Blog Card -->
        <article class="bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <div class="h-40 bg-gradient-to-tr {{ $post->cover_gradient }} p-6 flex flex-col justify-between text-white relative">
                    <span class="bg-white/20 backdrop-blur-md text-[9px] font-bold px-2 py-0.5 rounded uppercase tracking-wider w-max">{{ $post->category }}</span>
                    <h4 class="font-outfit font-extrabold text-sm leading-snug">{{ $post->title }}</h4>
                </div>
                <div class="p-6 space-y-2">
                    <div class="text-[9px] text-slate-400 font-bold">{{ $post->created_at->format('M d, Y') }} • {{ $post->read_time }}</div>
                    <h3 class="font-outfit font-bold text-slate-900 text-sm leading-tight group-hover:text-violet-650 transition-colors">{{ $post->title }}</h3>
                    <p class="text-slate-550 text-[10px] sm:text-xs leading-relaxed line-clamp-2">{{ $post->excerpt }}</p>
                </div>
            </div>
            <div class="p-6 border-t border-slate-50 mt-4">
                <a href="{{ route('blog.detail', $post->slug) }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Read Post <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </article>
        @empty
        <div class="col-span-full text-center py-8 text-slate-400 text-xs">No articles available yet.</div>
        @endforelse
    </div>
</section>

<!-- ===== 16. FINAL CTA ===== -->
<section class="max-w-7xl mx-auto px-6 pb-20">
    <div class="bg-gradient-to-tr from-violet-650 to-indigo-700 rounded-3xl p-10 md:p-16 text-center space-y-6 relative overflow-hidden shadow-2xl text-white">
        <div class="absolute -top-24 -left-24 w-80 h-80 rounded-full bg-violet-500/10 border-8 border-violet-500/5 pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-80 h-80 rounded-full bg-indigo-500/10 border-8 border-indigo-500/5 pointer-events-none"></div>

        <h2 class="font-outfit text-3xl md:text-5xl font-black tracking-tight leading-tight max-w-2xl mx-auto">
            Ready to upgrade your team check-ins?
        </h2>
        <p class="text-slate-200 text-sm max-w-lg mx-auto">
            Get started with our free trial tier today. No credit cards, setup setup fees, or biometric readers required.
        </p>

        <div class="flex flex-wrap justify-center gap-4 pt-4">
            <a href="{{ route('pricing') }}" class="btn bg-white text-slate-900 hover:scale-105 transition-transform px-8 py-4 text-sm font-bold">
                View Pricing Plans
            </a>
            <a href="{{ route('contact') }}" class="btn btn-outline border-white/20 text-white hover:bg-white/5 px-8 py-4 text-sm font-bold">
                Contact Sales
            </a>
        </div>
    </div>
</section>
@endsection