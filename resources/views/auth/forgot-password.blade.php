<x-guest-layout>
    <h2 class="auth-card-title">Reset Password</h2>
    <p class="auth-card-desc">Enter your email and we'll send you a link to reset your password.</p>

    <!-- Session Status -->
    @if (session('status'))
        <div class="session-status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="input-error" />
        </div>

        <button type="submit" class="btn-primary">Send Reset Link</button>
    </form>

    <div class="auth-footer">
        Remember your password? <a href="{{ route('login') }}">Sign In</a>
    </div>
</x-guest-layout>
