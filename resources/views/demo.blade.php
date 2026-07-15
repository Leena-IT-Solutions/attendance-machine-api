@extends('layouts.landing')

@section('title', 'Book a Live Demo & Simulation Sandbox | Attendance Machine')
@section('meta_description', 'Request a personalized live onboarding session or try our interactive face scanner check-in simulation sandbox directly in your browser.')

@section('content')
<!-- ===== HERO TITLE SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 pt-16 pb-8 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="text-center space-y-4 max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1.5 rounded-full text-[10px] font-bold text-violet-700 uppercase tracking-widest">
            Interactive Experience
        </div>
        <h1 class="font-outfit text-4xl sm:text-5xl font-black text-slate-900 leading-tight">
            Schedule a Live Onboarding <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Or Test Our Check-in Sandbox</span>
        </h1>
        <p class="text-slate-550 text-sm max-w-xl mx-auto">
            Book a one-on-one consultation with our implementation engineers, explore live demo credentials, or play with the simulated mobile app scanner below.
        </p>
    </div>
</section>

<!-- ===== DEMO UTILITIES GRID ===== -->
<section class="max-w-7xl mx-auto px-6 py-8 grid md:grid-cols-12 gap-8">
    <!-- 1. Demo Video (Col 4) -->
    <div class="md:col-span-4 bg-slate-900 text-white rounded-3xl p-6 shadow-sm flex flex-col justify-between relative overflow-hidden group">
        <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/10 to-indigo-500/5 pointer-events-none"></div>
        <div class="space-y-3">
            <span class="bg-violet-600/30 text-violet-400 text-[9px] font-black px-2.5 py-1 rounded-full uppercase tracking-wider w-max">Promo</span>
            <h3 class="font-outfit font-extrabold text-base leading-snug">Demo Video Walkthrough</h3>
            <p class="text-slate-400 text-[11px] leading-relaxed">
                Watch a 1-minute overview showing contactless face check-ins, shift configurations, and LOP calculations.
            </p>
        </div>
        <div class="aspect-video w-full rounded-2xl bg-slate-950 flex flex-col items-center justify-center border border-slate-800/80 relative mt-4 cursor-pointer" onclick="document.getElementById('btn-watch-demo').click()">
            <div class="w-10 h-10 rounded-full bg-violet-600 text-white flex items-center justify-center text-sm shadow-lg group-hover:scale-105 transition-transform">
                <i class="fa-solid fa-play ml-0.5"></i>
            </div>
            <span class="text-[8px] uppercase font-bold text-slate-500 tracking-wider mt-2">Launch Video</span>
        </div>
    </div>

    <!-- 2. Demo Login & Play Store (Col 4) -->
    <div class="md:col-span-4 bg-white border border-slate-100 rounded-3xl p-6 shadow-sm flex flex-col justify-between space-y-6">
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <span class="bg-emerald-50 text-emerald-700 text-[9px] font-black px-2.5 py-1 rounded-full uppercase tracking-wider">Console Access</span>
            </div>
            <h3 class="font-outfit font-extrabold text-base text-slate-800 leading-snug">Explore Dashboard Demo</h3>
            
            <div class="bg-slate-50 border border-slate-150 rounded-2xl p-4 space-y-3 text-[11px]">
                <div class="flex justify-between">
                    <span class="text-slate-400 font-bold">Username:</span>
                    <span class="font-mono text-slate-800 font-extrabold">admin@demo.com</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-400 font-bold">Password:</span>
                    <span class="font-mono text-slate-800 font-extrabold">demo123</span>
                </div>
            </div>
        </div>

        <div class="space-y-3">
            <a href="{{ route('login') }}" class="btn btn-primary w-full text-center text-xs py-3 font-bold">Sign In to Dashboard</a>
            
            <!-- Play Store Link -->
            <a href="https://play.google.com/store/apps/details?id=in.leenaitsolutions.attendance.machine&hl=en_IN" target="_blank" rel="noopener" class="download-badge bg-slate-900 text-white hover:bg-slate-800 transition-all duration-300 w-full flex justify-center py-2.5 text-left">
                <i class="fa-brands fa-google-play text-xl text-violet-500"></i>
                <div class="leading-none">
                    <span class="text-slate-400 text-[8px]">DOWNLOAD APP</span>
                    <strong class="text-white text-xs">Google Play Store</strong>
                </div>
            </a>
        </div>
    </div>

    <!-- 3. Book Meeting & WhatsApp (Col 4) -->
    <div class="md:col-span-4 bg-white border border-slate-100 rounded-3xl p-6 shadow-sm flex flex-col justify-between space-y-6">
        <div class="space-y-3">
            <span class="bg-amber-50 text-amber-700 text-[9px] font-black px-2.5 py-1 rounded-full uppercase tracking-wider w-max">Contact Channels</span>
            <h3 class="font-outfit font-extrabold text-base text-slate-800 leading-snug">Direct Communication</h3>
            <p class="text-slate-500 text-[11px] leading-relaxed">
                Connect with our implementation team immediately to configure specific shift multipliers or overtime logic.
            </p>
        </div>

        <div class="space-y-3">
            <!-- Book Meeting -->
            <a href="#" onclick="event.preventDefault(); alert('Redirecting to booking calendar...');" class="btn btn-outline border-violet-200 text-violet-700 hover:bg-violet-50/20 w-full text-center text-xs py-3 font-bold flex items-center justify-center gap-2">
                <i class="fa-solid fa-calendar-days text-sm"></i> Book Onboarding Call
            </a>

            <!-- Live WhatsApp -->
            <a href="https://wa.me/919999999999" target="_blank" rel="noopener" class="btn bg-emerald-600 hover:bg-emerald-700 text-white w-full text-center text-xs py-3 font-bold flex items-center justify-center gap-2 shadow-sm">
                <i class="fa-brands fa-whatsapp text-base"></i> Live WhatsApp Chat
            </a>
        </div>
    </div>
</section>

<!-- ===== DEMO DUAL COLUMN CONTENT ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-2 gap-12">
    <!-- Left Column: Request Form -->
    <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm space-y-6">
        <div class="space-y-1">
            <h3 class="font-outfit text-xl font-bold text-slate-900">Request Custom Setup Consultation</h3>
            <p class="text-slate-550 text-xs">Fill in your workspace guidelines and an engineer will schedule a demo.</p>
        </div>

        <form class="space-y-4" onsubmit="event.preventDefault(); alert('Demo request received! Our support engineers will contact you shortly.'); this.reset();">
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Contact Name</label>
                    <input type="text" required placeholder="e.g. John Doe" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Work Email</label>
                    <input type="email" required placeholder="e.g. john@factory.com" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Employee Capacity</label>
                    <select class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                        <option>1 - 10 Employees</option>
                        <option>11 - 50 Employees</option>
                        <option>51 - 200 Employees</option>
                        <option>200+ Employees</option>
                    </select>
                </div>
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Primary Industry</label>
                    <select class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                        <option>Manufacturing & Factory</option>
                        <option>Retail & Supermarket</option>
                        <option>Hospitality & Hotel</option>
                        <option>Construction & Field</option>
                        <option>Office or IT Startup</option>
                    </select>
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase font-bold text-slate-500">Comments or Specific Shift Rules</label>
                <textarea rows="3" placeholder="Tell us about rotational shifts, late rules, or ERP integration support you need." class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-full text-center text-xs py-3.5 font-bold shadow-lg">Submit Request</button>
        </form>
    </div>

    <!-- Right Column: Interactive Simulator Sandbox -->
    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-8 text-white space-y-6 flex flex-col justify-between relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-violet-650/10 rounded-full blur-[80px] pointer-events-none"></div>
        
        <div class="space-y-1 relative">
            <h3 class="font-outfit text-xl font-bold">Punch Simulator Sandbox</h3>
            <p class="text-slate-400 text-xs">Verify AI face matching and biometric validation checks live.</p>
        </div>

        <!-- Phone Frame Simulator -->
        <div class="flex justify-center my-4">
            <div id="sandbox-phone" class="w-[230px] h-[370px] bg-slate-950 border-4 border-slate-800 rounded-[30px] p-4 flex flex-col justify-between transition-all duration-300 relative shadow-2xl">
                <!-- Inner camera lens dot -->
                <div class="w-2.5 h-2.5 rounded-full bg-slate-800 absolute top-2.5 left-1/2 -translate-x-1/2"></div>
                
                <!-- Status Top -->
                <div class="flex justify-between text-[8px] font-bold text-slate-500">
                    <span>9:41 AM</span>
                    <i class="fa-solid fa-battery-full text-emerald-500"></i>
                </div>

                <!-- Simulation Scanning Display -->
                <div id="sandbox-screen" class="my-auto text-center space-y-4">
                    <!-- Scanner Circle -->
                    <div id="sandbox-circle" class="w-24 h-24 rounded-full border-2 border-dashed border-slate-700 mx-auto flex items-center justify-center relative bg-slate-900/60 transition-all duration-300">
                        <!-- Dynamic scanning line inside -->
                        <div id="sandbox-line" class="absolute inset-x-2 top-1/2 h-[2px] bg-slate-700 shadow-md transition-all duration-300"></div>
                        <i id="sandbox-icon" class="fa-solid fa-user text-slate-500 text-3xl transition-all duration-300"></i>
                    </div>

                    <div class="space-y-1">
                        <h4 id="sandbox-title" class="font-outfit text-[11px] font-bold text-slate-400">Scanner Standby</h4>
                        <p id="sandbox-desc" class="text-[9px] text-slate-500">Choose simulated punch below</p>
                    </div>
                </div>

                <!-- Result bottom bar -->
                <div id="sandbox-bar" class="bg-slate-900 border border-slate-850 p-2 rounded-xl flex items-center gap-2 transition-all duration-300 opacity-60">
                    <div id="sandbox-status-icon" class="w-6 h-6 rounded-full bg-slate-800 text-slate-500 flex items-center justify-center text-[10px]">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div class="text-left">
                        <p id="sandbox-status-title" class="text-slate-300 text-[9px] font-extrabold">System Ready</p>
                        <p id="sandbox-status-coords" class="text-slate-550 text-[7px] font-mono">Biometric Scan Pending</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Simulation Buttons -->
        <div class="grid grid-cols-2 gap-4 relative">
            <button onclick="runGoodSimulation()" class="bg-emerald-600/10 hover:bg-emerald-600/20 border border-emerald-500/30 text-emerald-400 py-3 rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-1.5">
                <i class="fa-solid fa-circle-check"></i> Simulate Success
            </button>
            <button onclick="runBadSimulation()" class="bg-rose-600/10 hover:bg-rose-600/20 border border-rose-500/30 text-rose-400 py-3 rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-1.5">
                <i class="fa-solid fa-circle-xmark"></i> Simulate Buddy Punch
            </button>
        </div>
    </div>
</section>

@section('scripts')
<script>
    function resetSandbox() {
        const phone = document.getElementById('sandbox-phone');
        const screen = document.getElementById('sandbox-screen');
        const circle = document.getElementById('sandbox-circle');
        const line = document.getElementById('sandbox-line');
        const icon = document.getElementById('sandbox-icon');
        const title = document.getElementById('sandbox-title');
        const desc = document.getElementById('sandbox-desc');
        const bar = document.getElementById('sandbox-bar');
        const statusIcon = document.getElementById('sandbox-status-icon');
        const statusTitle = document.getElementById('sandbox-status-title');
        const statusCoords = document.getElementById('sandbox-status-coords');

        phone.className = 'w-[230px] h-[370px] bg-slate-950 border-4 border-slate-800 rounded-[30px] p-4 flex flex-col justify-between transition-all duration-300 relative shadow-2xl';
        circle.className = 'w-24 h-24 rounded-full border-2 border-dashed border-slate-700 mx-auto flex items-center justify-center relative bg-slate-900/60 transition-all duration-300';
        line.className = 'absolute inset-x-2 top-1/2 h-[2px] bg-slate-700 shadow-md transition-all duration-300';
        icon.className = 'fa-solid fa-user text-slate-500 text-3xl transition-all duration-300';
        title.textContent = 'Scanner Standby';
        title.className = 'font-outfit text-[11px] font-bold text-slate-400';
        desc.textContent = 'Choose simulated punch below';
        bar.className = 'bg-slate-900 border border-slate-850 p-2 rounded-xl flex items-center gap-2 transition-all duration-300 opacity-60';
        statusIcon.className = 'w-6 h-6 rounded-full bg-slate-800 text-slate-500 flex items-center justify-center text-[10px]';
        statusIcon.innerHTML = '<i class="fa-solid fa-clock"></i>';
        statusTitle.textContent = 'System Ready';
        statusCoords.textContent = 'Biometric Scan Pending';
    }

    function runGoodSimulation() {
        resetSandbox();
        const phone = document.getElementById('sandbox-phone');
        const circle = document.getElementById('sandbox-circle');
        const line = document.getElementById('sandbox-line');
        const icon = document.getElementById('sandbox-icon');
        const title = document.getElementById('sandbox-title');
        const desc = document.getElementById('sandbox-desc');
        const bar = document.getElementById('sandbox-bar');
        const statusIcon = document.getElementById('sandbox-status-icon');
        const statusTitle = document.getElementById('sandbox-status-title');
        const statusCoords = document.getElementById('sandbox-status-coords');

        // Step 1: Scanning effect
        circle.classList.replace('border-slate-700', 'border-violet-500');
        line.className = 'absolute inset-x-2 top-1/2 h-[2px] bg-violet-400 shadow-md shadow-violet-500/80 animate-bounce';
        icon.className = 'fa-solid fa-face-smile text-violet-400 text-3xl animate-pulse';
        title.textContent = 'Scanning Face...';

        setTimeout(() => {
            // Step 2: Success Match
            phone.classList.add('ring-2', 'ring-emerald-500');
            circle.className = 'w-24 h-24 rounded-full border-2 border-emerald-500 mx-auto flex items-center justify-center bg-emerald-950/20';
            line.className = 'hidden';
            icon.className = 'fa-solid fa-user-check text-emerald-400 text-3xl';
            title.textContent = 'Identity Verified';
            title.className = 'font-outfit text-[11px] font-bold text-emerald-400';
            desc.textContent = 'Jane Smith (Accountant)';
            
            bar.className = 'bg-emerald-950/40 border border-emerald-900/60 p-2 rounded-xl flex items-center gap-2 transition-all duration-300 opacity-100';
            statusIcon.className = 'w-6 h-6 rounded-full bg-emerald-50 text-white flex items-center justify-center text-[10px]';
            statusIcon.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
            statusTitle.textContent = 'Marked In';
            statusCoords.textContent = 'Confidence: 99.4% Match';
        }, 1200);
    }

    function runBadSimulation() {
        resetSandbox();
        const phone = document.getElementById('sandbox-phone');
        const circle = document.getElementById('sandbox-circle');
        const line = document.getElementById('sandbox-line');
        const icon = document.getElementById('sandbox-icon');
        const title = document.getElementById('sandbox-title');
        const desc = document.getElementById('sandbox-desc');
        const bar = document.getElementById('sandbox-bar');
        const statusIcon = document.getElementById('sandbox-status-icon');
        const statusTitle = document.getElementById('sandbox-status-title');
        const statusCoords = document.getElementById('sandbox-status-coords');

        // Step 1: Scanning effect
        circle.classList.replace('border-slate-700', 'border-violet-500');
        line.className = 'absolute inset-x-2 top-1/2 h-[2px] bg-violet-400 shadow-md shadow-violet-500/80 animate-bounce';
        icon.className = 'fa-solid fa-face-smile text-violet-400 text-3xl animate-pulse';
        title.textContent = 'Scanning Face...';

        setTimeout(() => {
            // Step 2: Location Blocked Match
            phone.classList.add('ring-2', 'ring-rose-500');
            circle.className = 'w-24 h-24 rounded-full border-2 border-rose-500 mx-auto flex items-center justify-center bg-rose-950/20';
            line.className = 'hidden';
            icon.className = 'fa-solid fa-user-slash text-rose-400 text-3xl';
            title.textContent = 'Punch Blocked';
            title.className = 'font-outfit text-[11px] font-bold text-rose-400';
            desc.textContent = 'Buddy Punch Attempt';
            
            bar.className = 'bg-rose-950/40 border border-rose-900/60 p-2 rounded-xl flex items-center gap-2 transition-all duration-300 opacity-100';
            statusIcon.className = 'w-6 h-6 rounded-full bg-rose-500 text-white flex items-center justify-center text-[10px]';
            statusIcon.innerHTML = '<i class="fa-solid fa-circle-xmark"></i>';
            statusTitle.textContent = 'Error: Face Mismatch';
            statusCoords.textContent = 'Confidence: 12% (Scan Blocked)';
        }, 1200);
    }
</script>
@endsection
@endsection
