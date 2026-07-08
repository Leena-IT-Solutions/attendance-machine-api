<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="session-status">{{ session('status') }}</div>
    @endif

    <h2 class="auth-card-title">Welcome back</h2>
    <p class="auth-card-desc">Sign in to continue to your dashboard</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email or Phone -->
        <div class="form-group">
            <label for="email">Email or Phone</label>
            <input id="email" type="text" name="email" value="{{ old('email') }}" placeholder="you@example.com or +1234567890" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="input-error" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                <label for="password" style="margin-bottom: 0;">Password</label>
                @if (Route::has('password.request'))
                    <a class="auth-link" href="{{ route('password.request') }}" style="font-size: 13px;">Forgot?</a>
                @endif
            </div>
            <input id="password" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="input-error" />
        </div>

        <!-- Remember Me -->
        <div class="form-check">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Remember me</label>
        </div>

        <button type="submit" class="btn-primary">Sign In</button>
    </form>

    @if (Route::has('register'))
        <div class="auth-footer">
            Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
        </div>
    @endif
</x-guest-layout>
