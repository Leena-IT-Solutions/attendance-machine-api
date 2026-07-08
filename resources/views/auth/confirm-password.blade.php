<x-guest-layout>
    <h2 class="auth-card-title">Confirm Password</h2>
    <p class="auth-card-desc">This is a secure area. Please confirm your password before continuing.</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="Enter your password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="input-error" />
        </div>

        <button type="submit" class="btn-primary">Confirm</button>
    </form>
</x-guest-layout>
