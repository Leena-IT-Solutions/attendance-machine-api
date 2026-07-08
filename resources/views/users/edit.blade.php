<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('users.index') }}" class="p-2 -ml-2 text-slate-400 hover:text-slate-600 transition-colors">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </a>
            <h2 class="text-xl font-bold tracking-tight text-slate-800">
                {{ __('Edit User') }}
            </h2>
        </div>
    </x-slot>

    <div class="pb-12 max-w-2xl mx-auto">
        <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-8">
            @csrf
            @method('PATCH')

            <!-- Inputs -->
            <div class="space-y-6">
                <div class="space-y-2">
                    <label for="name" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 placeholder-slate-300 text-slate-900 transition-all shadow-sm @error('name') border-rose-400 @enderror"
                        placeholder="e.g. John Doe">
                    @error('name')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                </div>

                <div class="space-y-2">
                    <label for="email" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 placeholder-slate-300 text-slate-900 transition-all shadow-sm @error('email') border-rose-400 @enderror"
                        placeholder="e.g. john@example.com">
                    @error('email')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                </div>

                <div class="space-y-2">
                    <label for="phone" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Phone Number (Optional)</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}"
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 placeholder-slate-300 text-slate-900 transition-all shadow-sm @error('phone') border-rose-400 @enderror"
                        placeholder="e.g. +1 234 567 8900">
                    @error('phone')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                </div>

                <div class="space-y-2">
                    <label for="role" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Role</label>
                    <select name="role" id="role" required
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 text-slate-900 transition-all shadow-sm @error('role') border-rose-400 @enderror">
                        <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                </div>

                <div class="space-y-2">
                    <label for="password" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Password (Leave blank to keep current)</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 placeholder-slate-300 text-slate-900 transition-all shadow-sm @error('password') border-rose-400 @enderror"
                        placeholder="••••••••">
                    @error('password')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold flex items-center justify-center space-x-2 shadow-lg shadow-indigo-200 active:scale-95 transition-all text-lg">
                    <span>{{ __('Update User') }}</span>
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
