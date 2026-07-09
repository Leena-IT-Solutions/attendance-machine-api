<x-guest-layout no-card-wrapper>
    <!-- Welcome/Sign-In Card -->
    <div class="auth-card mb-6">
        <div class="text-center space-y-6">
            <div>
                <h2 class="auth-card-title text-2xl">Welcome to Intelligence</h2>
                <p class="auth-card-desc">
                    The modern way to track presence and performance in real-time.
                </p>
            </div>

            <div class="space-y-4 pt-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-primary flex items-center justify-center decoration-none">
                        {{ __('Go to Console') }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn-primary flex items-center justify-center decoration-none">
                        {{ __('Sign In') }}
                    </a>
                @endauth

                @if (Route::has('register'))
                    @guest
                        <div class="auth-footer">
                            <span>Don't have an account?</span>
                            <a href="{{ route('register') }}" class="auth-link ml-1">{{ __('Get Started') }}</a>
                        </div>
                    @endguest
                @endif

                <div class="pt-8 border-t border-slate-100 mt-8">
                    <a href="https://play.google.com/store/apps/details?id=in.leenaitsolutions.attendance.machine"
                        target="_blank"
                        class="flex items-center justify-center gap-3 p-4 rounded-2xl bg-slate-50 text-slate-700 font-bold hover:bg-slate-100 transition-all border border-slate-200 group">
                        <div
                            class="w-10 h-10 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-600 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-left">
                            <span
                                class="block text-xs text-slate-500 uppercase tracking-widest font-black leading-none mb-1">Google Play</span>
                            <span class="text-sm">Get it on Google Play</span>
                        </div>
                    </a>
                </div>

                <!-- Privacy Policy Footer Link -->
                <div class="mt-8 text-center">
                    <a href="{{ route('privacy.policy') }}"
                        class="inline-block text-xs text-slate-400 hover:text-indigo-600 transition-colors font-semibold uppercase tracking-widest">
                        Privacy Policy
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Description/Features Card -->
    <div class="auth-card">
        <h3 class="auth-card-title text-lg font-bold mb-3 text-center">About Attendance Machine</h3>
        <p class="text-xs text-slate-500 mb-6 text-center leading-relaxed">
            Attendance Machine is a secure, offline-first face recognition system designed to track presence, manage records, and sync logs in real-time.
        </p>

        <div class="text-left space-y-4">
            <div class="flex items-start gap-3">
                <div class="w-6 h-6 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600 shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Face Recognition</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Contactless client-side face matching using standard webcam detection.</p>
                </div>
            </div>
            
            <div class="flex items-start gap-3">
                <div class="w-6 h-6 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600 shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Offline-First Sync</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Logs scans locally when offline and automatically syncs when connection resumes.</p>
                </div>
            </div>

            <div class="flex items-start gap-3">
                <div class="w-6 h-6 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600 shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2M8 7h8m0 0v8a2 2 0 01-2 2h-6M9 17h6"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider">Smart Reports</h4>
                    <p class="text-xs text-slate-500 mt-0.5">Generate and download detailed Excel reports aligned with your billing cycles.</p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>