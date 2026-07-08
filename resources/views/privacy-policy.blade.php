<x-guest-layout>
    <div class="space-y-6 text-left">
        <!-- Back to Welcome Link -->
        <div class="flex items-center gap-2">
            <a href="{{ url('/') }}" class="text-xs text-indigo-600 hover:text-indigo-800 transition-colors font-bold uppercase tracking-wider flex items-center gap-1 group">
                <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Home
            </a>
        </div>

        <div>
            <h2 class="auth-card-title text-2xl font-black text-slate-800">Privacy Policy</h2>
            <p class="text-xs text-slate-400 mt-1 uppercase tracking-widest font-semibold">Last Updated: May 2026</p>
        </div>

        <!-- Scrollable Privacy Policy Content -->
        <div class="max-h-[380px] overflow-y-auto pr-2 space-y-5 text-sm text-slate-600 leading-relaxed scrollbar-thin scrollbar-thumb-indigo-200">
            
            <section class="space-y-2">
                <h3 class="font-extrabold text-slate-800 flex items-center gap-2 text-sm uppercase tracking-wider text-indigo-600">
                    <span class="w-1.5 h-3 bg-indigo-500 rounded-full"></span>
                    1. Our Core Commitment
                </h3>
                <p>
                    We value your privacy above all else. This Privacy Policy outlines how the <strong>Attendance Machine App</strong> (the "Application") collects, uses, and safeguards biometric face signatures and employee identity records.
                </p>
            </section>

            <section class="space-y-2">
                <h3 class="font-extrabold text-slate-800 flex items-center gap-2 text-sm uppercase tracking-wider text-indigo-600">
                    <span class="w-1.5 h-3 bg-indigo-500 rounded-full"></span>
                    2. Biometric Data Processing
                </h3>
                <p>
                    The Application is built with state-of-the-art secure intelligence designed to keep your facial information secure:
                </p>
                <ul class="list-disc pl-5 space-y-1.5 text-xs text-slate-500 mt-1">
                    <li><strong>Secure Server-Side Processing:</strong> The Application uploads the employee's enrollment photo securely to the organization's private central server via encrypted channels. It does not stream, broadcast, or store real-time video frames.</li>
                    <li><strong>On-Device Face Alignment:</strong> When registering, Google ML Kit operates locally on your mobile device to detect face presence, alignment, and angles.</li>
                    <li><strong>Mathematical Signature (512 Floats):</strong> Facial features are compiled into a highly abstract 512-dimensional floating-point vector (face signature) on the organization's secure server using an ArcFace neural model. It is mathematically impossible to reconstruct the original face image from this signature.</li>
                    <li><strong>No Third-Party Sharing:</strong> We do not share, sell, or disclose face signatures or profile photos with any third parties, advertisers, or external networks. All data remains strictly within your organization's private portal.</li>
                </ul>
            </section>

            <section class="space-y-2">
                <h3 class="font-extrabold text-slate-800 flex items-center gap-2 text-sm uppercase tracking-wider text-indigo-600">
                    <span class="w-1.5 h-3 bg-indigo-500 rounded-full"></span>
                    3. Information We Collect
                </h3>
                <p>
                    To ensure precise identity verification and attendance tracking, we collect and store:
                </p>
                <ul class="list-disc pl-5 space-y-1.5 text-xs text-slate-500 mt-1">
                    <li>Employee Full Name</li>
                    <li>Employee Code or ID</li>
                    <li>Employee Profile Photo (stored securely on the organization’s private server)</li>
                    <li>Synchronized 512-float mathematical face signatures</li>
                    <li>Timestamp logs of recorded presence at the Kiosk terminal</li>
                </ul>
            </section>

            <section class="space-y-2">
                <h3 class="font-extrabold text-slate-800 flex items-center gap-2 text-sm uppercase tracking-wider text-indigo-600">
                    <span class="w-1.5 h-3 bg-indigo-500 rounded-full"></span>
                    4. Data Security
                </h3>
                <p>
                    We protect synchronized records through industry-standard administrative and technological safeguards:
                </p>
                <ul class="list-disc pl-5 space-y-1 text-xs text-slate-500 mt-1">
                    <li>All data synchronization happens over secure, encrypted HTTPS channels.</li>
                    <li>Central portal console access requires secure administrative authentication and is restricted to designated personnel.</li>
                    <li>Local device biometrics must be authenticated by the administrator before adding or rescanning any face signature.</li>
                </ul>
            </section>

            <section class="space-y-2">
                <h3 class="font-extrabold text-slate-800 flex items-center gap-2 text-sm uppercase tracking-wider text-indigo-600">
                    <span class="w-1.5 h-3 bg-indigo-500 rounded-full"></span>
                    5. Data Control & Deletion
                </h3>
                <p>
                    You retain full control over your identity records. Employees may request the modification or removal of their profile at any time. When an administrator purges an employee record from the portal console, all corresponding mathematical face signatures, profile photos, and logs are permanently deleted from both local storage caches and the central database.
                </p>
            </section>

            <section class="space-y-2">
                <h3 class="font-extrabold text-slate-800 flex items-center gap-2 text-sm uppercase tracking-wider text-indigo-600">
                    <span class="w-1.5 h-3 bg-indigo-500 rounded-full"></span>
                    6. Contact Us
                </h3>
                <p>
                    If you have any questions or feedback regarding the Application's face biometrics security or privacy practices, please contact your organization's IT Administration Desk.
                </p>
            </section>
        </div>

        <!-- Footer Accent -->
        <div class="pt-4 border-t border-slate-100 text-center">
            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
                Attendance Machine Security Certified
            </span>
        </div>
    </div>
</x-guest-layout>
