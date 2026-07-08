<x-guest-layout>
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
</x-guest-layout>