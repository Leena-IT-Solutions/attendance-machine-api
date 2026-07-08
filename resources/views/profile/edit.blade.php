<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-10 space-y-12 pb-32">
        <!-- Personal Information Section -->
        <div class="px-2">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-8 h-8 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center">
                    <i data-lucide="user" class="w-4 h-4"></i>
                </div>
                <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400">{{ __('Personal Info') }}</h3>
            </div>
            <div class="bg-white p-8 border border-slate-100 rounded-[2.5rem] shadow-sm">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Attendance API Section -->
        <div class="px-2">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-8 h-8 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center">
                    <i data-lucide="webhook" class="w-4 h-4"></i>
                </div>
                <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400">{{ __('Attendance API') }}</h3>
            </div>
            <div class="bg-white p-8 border border-slate-100 rounded-[2.5rem] shadow-sm">
                @include('profile.partials.update-attendance-api-form')
            </div>
        </div>

        <!-- Security Section -->
        <div class="px-2">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-8 h-8 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-4 h-4"></i>
                </div>
                <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400">{{ __('Security') }}</h3>
            </div>
            <div class="bg-white p-8 border border-slate-100 rounded-[2.5rem] shadow-sm">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Danger Zone Section -->
        <div class="px-2">
            <div class="flex items-center space-x-3 mb-6">
                <div class="w-8 h-8 bg-rose-50 text-rose-600 rounded-lg flex items-center justify-center">
                    <i data-lucide="alert-triangle" class="w-4 h-4"></i>
                </div>
                <h3 class="text-sm font-bold uppercase tracking-widest text-slate-400">{{ __('Danger Zone') }}</h3>
            </div>
            <div class="bg-rose-50/50 p-8 border border-rose-100 rounded-[2.5rem]">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

        <!-- Logout Section (Bottom) -->
        <div class="px-2 pt-8">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full py-5 bg-white border border-slate-200 text-slate-900 rounded-[2rem] font-bold flex items-center justify-center space-x-2 active:scale-95 transition-all shadow-sm">
                    <i data-lucide="log-out" class="w-5 h-5 text-rose-500"></i>
                    <span>{{ __('Sign Out') }}</span>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
