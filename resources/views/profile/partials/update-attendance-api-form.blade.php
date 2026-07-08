<section>
    <header>
        <h2 class="text-lg font-medium text-slate-900">
            {{ __('Attendance API Configuration') }}
        </h2>

        <p class="mt-1 text-sm text-slate-600">
            {{ __("Define the endpoint where the attendance data should be sent when a face matches.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="api_token" :value="__('Your API Token')" />
            <x-text-input id="api_token" name="api_token" type="text" class="mt-1 block w-full" :value="old('api_token', $user->api_token)" placeholder="Enter your API token" />
            <p class="mt-1 text-xs text-slate-500">Use this token as a Bearer Token when making requests to your Attendance API.</p>
            <x-input-error class="mt-2" :messages="$errors->get('api_token')" />
        </div>

        <div>
            <x-input-label for="attendance_api_url" :value="__('Attendance API URL')" />
            <x-text-input id="attendance_api_url" name="attendance_api_url" type="url" class="mt-1 block w-full" :value="old('attendance_api_url', $user->attendance_api_url)" placeholder="https://api.example.com/attendance" />
            <x-input-error class="mt-2" :messages="$errors->get('attendance_api_url')" />
        </div>

        <div>
            <x-input-label for="month_start_date" :value="__('Report Cycle Start Date')" />
            <select id="month_start_date" name="month_start_date" class="mt-1 block w-full border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                @for ($i = 1; $i <= 31; $i++)
                    <option value="{{ $i }}" {{ old('month_start_date', $user->month_start_date) == $i ? 'selected' : '' }}>
                        {{ $i }}{{ in_array($i, [1, 21, 31]) ? 'st' : ($i == 2 || $i == 22 ? 'nd' : ($i == 3 || $i == 23 ? 'rd' : 'th')) }} of month
                    </option>
                @endfor
            </select>
            <p class="mt-1 text-xs text-slate-500">The day of the month when your attendance cycle starts (e.g., 25th to 24th).</p>
            <x-input-error class="mt-2" :messages="$errors->get('month_start_date')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-slate-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
