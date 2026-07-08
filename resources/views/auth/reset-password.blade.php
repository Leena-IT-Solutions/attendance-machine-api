<x-guest-layout>
    <h2 class="auth-card-title">Reset Password</h2>
    <p class="auth-card-desc">Choose a new password for your account.</p>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" placeholder="you@example.com" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="input-error" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">New Password</label>
            <input id="password" type="password" name="password" placeholder="Min. 8 characters" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="input-error" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Re-enter password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="input-error" />
        </div>

        <button type="submit" class="btn-primary">Reset Password</button>
    </form>
</x-guest-layout>
