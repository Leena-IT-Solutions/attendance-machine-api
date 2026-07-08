<x-guest-layout>
    <div style="text-align: center; margin-bottom: 24px;">
        <div style="width: 56px; height: 56px; background: linear-gradient(135deg, #EEF2FF, #E0E7FF); border-radius: 16px; margin: 0 auto 16px; display: flex; align-items: center; justify-content: center;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4F46E5" style="width: 28px; height: 28px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
        </div>
    </div>

    <h2 class="auth-card-title" style="text-align: center;">Verify Your Email</h2>
    <p class="auth-card-desc" style="text-align: center;">
        We've sent a verification link to your email. Please check your inbox and click the link to verify.
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="session-status" style="text-align: center;">
            A new verification link has been sent to your email address.
        </div>
    @endif

    <div style="display: flex; flex-direction: column; gap: 12px;">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn-primary">Resend Verification Email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="width: 100%; padding: 14px; background: transparent; border: 1.5px solid var(--border); border-radius: 14px; font-size: 14px; font-weight: 600; color: var(--text-secondary); cursor: pointer; font-family: inherit; transition: all 0.2s;">
                Log Out
            </button>
        </form>
    </div>
</x-guest-layout>
