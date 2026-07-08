<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('storage/images/logo.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #4F46E5;
            --primary-light: #818CF8;
            --primary-dark: #3730A3;
            --surface: #F8FAFC;
            --surface-card: #FFFFFF;
            --text-primary: #0F172A;
            --text-secondary: #64748B;
            --text-muted: #94A3B8;
            --border: #E2E8F0;
            --error: #EF4444;
            --success: #10B981;
            --safe-top: env(safe-area-inset-top, 0px);
            --safe-bottom: env(safe-area-inset-bottom, 0px);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--surface);
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            min-height: 100vh;
            min-height: 100dvh;
            overflow-x: hidden;
        }

        .mobile-shell {
            min-height: 100vh;
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
            max-width: 480px;
            margin: 0 auto;
            padding: calc(var(--safe-top) + 16px) 24px calc(var(--safe-bottom) + 24px);
            position: relative;
        }

        /* Subtle gradient bg */
        .bg-pattern {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 45%;
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 50%, #A855F7 100%);
            z-index: 0;
        }

        .bg-pattern::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 80px;
            background: linear-gradient(to bottom, transparent, var(--surface));
        }

        /* Floating circles decoration */
        .bg-circles {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 45%;
            overflow: hidden;
            z-index: 0;
            pointer-events: none;
        }

        .bg-circles::before,
        .bg-circles::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
        }

        .bg-circles::before {
            width: 200px;
            height: 200px;
            top: -40px;
            right: -60px;
        }

        .bg-circles::after {
            width: 150px;
            height: 150px;
            top: 60%;
            left: -40px;
        }

        .content-area {
            position: relative;
            z-index: 1;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Header / Brand */
        .brand-area {
            padding: 32px 0 40px;
            text-align: center;
        }

        .brand-icon {
            width: 64px;
            height: 64px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            margin: 0 auto 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
        }

        .brand-icon svg {
            width: 32px;
            height: 32px;
            color: white;
        }

        .brand-title {
            font-size: 22px;
            font-weight: 700;
            color: white;
            letter-spacing: -0.3px;
            margin-bottom: 4px;
        }

        .brand-subtitle {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 400;
        }

        /* Card */
        .auth-card {
            background: var(--surface-card);
            border-radius: 24px;
            padding: 32px 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 20px 50px -12px rgba(0, 0, 0, 0.12);
            border: 1px solid rgba(0, 0, 0, 0.04);
        }

        .auth-card-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 4px;
        }

        .auth-card-desc {
            font-size: 14px;
            color: var(--text-secondary);
            margin-bottom: 28px;
            line-height: 1.5;
        }

        /* Form elements */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label,
        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
            letter-spacing: 0.01em;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 1.5px solid var(--border);
            border-radius: 14px;
            font-size: 15px;
            font-family: inherit;
            color: var(--text-primary);
            background: var(--surface);
            transition: all 0.2s ease;
            outline: none;
            -webkit-appearance: none;
        }

        .form-group input:focus,
        .form-input:focus {
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.08);
        }

        .form-group input::placeholder,
        .form-input::placeholder {
            color: var(--text-muted);
        }

        /* Error messages */
        .input-error {
            font-size: 12px;
            color: var(--error);
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Checkbox */
        .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
        }

        .form-check input[type="checkbox"] {
            width: 20px;
            height: 20px;
            border-radius: 6px;
            border: 1.5px solid var(--border);
            accent-color: var(--primary);
            cursor: pointer;
        }

        .form-check label {
            font-size: 14px;
            color: var(--text-secondary);
            cursor: pointer;
        }

        /* Primary Button */
        .btn-primary {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.35);
            -webkit-appearance: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary:active {
            transform: scale(0.98);
            box-shadow: 0 2px 8px rgba(79, 70, 229, 0.3);
        }

        /* Links */
        .auth-link {
            font-size: 14px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.2s;
        }

        .auth-link:active {
            opacity: 0.7;
        }

        /* Footer link */
        .auth-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 14px;
            color: var(--text-secondary);
        }

        .auth-footer a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        /* Session status */
        .session-status {
            background: #ECFDF5;
            border: 1px solid #A7F3D0;
            color: #065F46;
            padding: 12px 16px;
            border-radius: 12px;
            font-size: 13px;
            margin-bottom: 20px;
        }

        /* Divider */
        .auth-divider {
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 24px 0;
        }

        .auth-divider::before,
        .auth-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .auth-divider span {
            font-size: 12px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 500;
        }

        /* Action row */
        .action-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 8px;
        }

        /* Hide default Breeze components styling */
        [class*="sm:max-w-md"],
        [class*="sm:rounded-lg"] {
            all: unset;
        }
    </style>
</head>

<body>
    <div class="bg-pattern"></div>
    <div class="bg-circles"></div>

    <div class="mobile-shell">
        <div class="content-area">
            <!-- Brand -->
            <div class="brand-area">
                <div class="brand-icon">
                    <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" class="w-10 h-10 object-contain">
                </div>
                <h1 class="brand-title">{{ config('app.name', 'Attendance Machine') }}</h1>
                <p class="brand-subtitle">Smart attendance tracking</p>
            </div>

            <!-- Auth Card -->
            <div class="auth-card">
                {{ $slot }}
            </div>
        </div>
    </div>
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js');
        }
    </script>
</body>

</html>