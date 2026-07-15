<x-app-layout>
    <x-slot name="header">
        {{ __('System Users') }}
    </x-slot>

    <div class="space-y-6 pb-20">
        <!-- Search & Add User Row -->
        <div class="flex flex-col sm:flex-row gap-4">
            <form method="GET" action="{{ route('users.index') }}" class="relative group flex-1">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-indigo-500 transition-colors">
                    <i data-lucide="search" class="w-5 h-5"></i>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search users by name, email, or phone..." 
                    class="w-full pl-12 pr-12 py-4 bg-white border-none rounded-[1.5rem] shadow-sm focus:ring-2 focus:ring-indigo-100 placeholder-slate-300 text-sm transition-all">
                @if(request('search'))
                    <a href="{{ route('users.index') }}" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-rose-500 transition-colors">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </a>
                @endif
            </form>
            <a href="{{ route('users.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-sm px-6 py-4 rounded-[1.5rem] shadow-lg shadow-indigo-200 active:scale-95 transition-all flex items-center justify-center gap-2 shrink-0">
                <i data-lucide="plus" class="w-5 h-5"></i>
                <span>Add User</span>
            </a>
        </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-emerald-700 bg-emerald-50 rounded-2xl border border-emerald-100 flex items-center">
                <i data-lucide="check-circle" class="w-4 h-4 mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="p-4 mb-4 text-sm text-rose-700 bg-rose-50 rounded-2xl border border-rose-100 flex items-center">
                <i data-lucide="alert-triangle" class="w-4 h-4 mr-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="flex flex-col space-y-4">
            @forelse($users as $user)
                <div class="p-5 bg-white border border-slate-100 rounded-[2rem] shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4 group hover:border-indigo-100 transition-all hover:shadow-md">
                    <!-- Left: Avatar & Name -->
                    <div class="flex items-center space-x-4 min-w-0">
                        <div class="w-12 h-12 rounded-2xl bg-slate-50 flex items-center justify-center overflow-hidden border-2 border-white shadow-sm shrink-0">
                            <div class="w-full h-full bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold text-lg uppercase">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                        </div>
                        <div class="min-w-0">
                            <a href="{{ route('users.show', $user) }}" class="hover:text-indigo-600 transition-colors">
                                <h4 class="font-bold text-slate-900 truncate text-base leading-tight">{{ $user->name }}</h4>
                            </a>
                            <div class="mt-1 flex items-center">
                                <span class="text-[9px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2 py-1 rounded-md leading-none">{{ $user->role }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right: Contact Info -->
                    <div class="flex flex-col sm:flex-row sm:items-center gap-3 sm:gap-8 text-sm text-slate-500 font-medium md:ml-auto bg-slate-50/50 p-2 sm:p-1 sm:pr-4 rounded-2xl sm:rounded-full">
                        <!-- Employees Count -->
                        <a href="{{ route('users.show', $user) }}" class="flex items-center space-x-3 group/emp hover:text-indigo-600 transition-colors">
                            <div class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 flex items-center justify-center shrink-0 group-hover/emp:scale-110 group-hover/emp:border-indigo-200 transition-all">
                                <i data-lucide="users" class="w-3.5 h-3.5 text-indigo-500"></i>
                            </div>
                            <span class="underline decoration-dotted decoration-indigo-200 group-hover/emp:decoration-indigo-600 font-semibold">{{ $user->employees_count }} {{ $user->employees_count == 1 ? 'Employee' : 'Employees' }}</span>
                        </a>

                        <!-- Email -->
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                                <i data-lucide="mail" class="w-3.5 h-3.5 text-indigo-400"></i>
                            </div>
                            <span class="truncate max-w-[200px]">{{ $user->email }}</span>
                        </div>
                        
                        <!-- Phone -->
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                                <i data-lucide="phone" class="w-3.5 h-3.5 text-emerald-400"></i>
                            </div>
                            @if($user->phone)
                                <span>{{ $user->phone }}</span>
                            @else
                                <span class="text-slate-300 italic text-xs">Not provided</span>
                            @endif
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex items-center space-x-1 pl-2 border-l border-slate-200">
                            <a href="{{ route('users.edit', $user) }}" class="p-2 text-slate-400 hover:text-indigo-600 transition-colors bg-white rounded-full shadow-sm">
                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-rose-600 transition-colors bg-white rounded-full shadow-sm">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-16 text-center w-full">
                    <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="users" class="w-10 h-10 text-slate-200"></i>
                    </div>
                    <h3 class="text-slate-900 font-bold text-lg mb-2">{{ __('No Users Found') }}</h3>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
