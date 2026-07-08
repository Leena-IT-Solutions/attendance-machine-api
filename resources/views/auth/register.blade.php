<x-guest-layout>
    <h2 class="auth-card-title">Create Account</h2>
    <p class="auth-card-desc">Join us to start tracking attendance</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="John Doe" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="input-error" />
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="input-error" />
        </div>

        <!-- Phone Number -->
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input id="phone" type="text" name="phone" value="{{ old('phone') }}" placeholder="+1234567890" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('phone')" class="input-error" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="Min. 8 characters" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="input-error" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Re-enter password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="input-error" />
        </div>

        <button type="submit" class="btn-primary">Create Account</button>
    </form>

    <div class="auth-footer">
        Already have an account? <a href="{{ route('login') }}">Sign In</a>
    </div>
</x-guest-layout>
