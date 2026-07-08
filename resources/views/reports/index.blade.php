<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-medium text-slate-500">{{ __('Analytics') }}</p>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 md:text-3xl">
                {{ __('Reports') }}
            </h2>
        </div>
    </x-slot>

    <div class="space-y-8">
        <!-- Main Stats Card -->
        <div class="p-8 text-white bg-slate-900 shadow-2xl rounded-[2.5rem] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 -mr-20 -mt-20 bg-indigo-500/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 -ml-16 -mb-16 bg-violet-500/20 rounded-full blur-2xl"></div>
            
            <div class="relative">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-lg font-bold opacity-80">Monthly Attendance</h3>
                        <p class="text-3xl font-bold">94.2%</p>
                    </div>
                    <div class="p-4 bg-white/10 backdrop-blur-md rounded-2xl border border-white/10 text-emerald-400">
                        <i data-lucide="trending-up" class="w-8 h-8"></i>
                    </div>
                </div>

                <!-- Mock Bar Chart -->
                <div class="flex items-end justify-between h-32 px-2 gap-2">
                    @php $heights = [45, 60, 55, 80, 75, 90, 85, 95, 80, 70, 85, 90]; @endphp
                    @foreach($heights as $h)
                        <div class="flex-1 bg-indigo-500/40 rounded-t-lg transition-all hover:bg-white duration-300 cursor-pointer group relative" style="height: {{ $h }}%">
                            <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-white text-slate-900 text-[10px] font-bold px-2 py-1 rounded-md opacity-0 group-hover:opacity-100 transition-opacity">
                                {{ $h }}%
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-between mt-4 text-[10px] font-bold uppercase tracking-widest opacity-40">
                    <span>Jan</span>
                    <span>Jun</span>
                    <span>Dec</span>
                </div>
            </div>
        </div>

        <!-- Breakdown Grid -->
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div class="p-6 bg-white shadow-sm rounded-3xl">
                <h4 class="text-lg font-bold text-slate-900 mb-6">{{ __('Top Performers') }}</h4>
                <div class="space-y-4">
                    @foreach(['John Doe', 'Jane Smith', 'Sarah Chen'] as $name)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                            <span class="text-sm font-bold text-slate-700">{{ $name }}</span>
                        </div>
                        <span class="text-xs font-bold text-slate-400">100% Match</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="p-6 bg-white shadow-sm rounded-3xl">
                <h4 class="text-lg font-bold text-slate-900 mb-6">{{ __('Need Attention') }}</h4>
                <div class="space-y-4">
                    @foreach(['Robert Fox', 'Michael Brown'] as $name)
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 rounded-full bg-rose-500"></div>
                            <span class="text-sm font-bold text-slate-700">{{ $name }}</span>
                        </div>
                        <span class="text-xs font-bold text-rose-400">12% Late</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Quick Export -->
        <div class="p-6 bg-indigo-50 rounded-3xl flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="p-3 bg-white rounded-2xl text-indigo-600 shadow-sm border border-indigo-100">
                    <i data-lucide="file-text" class="w-6 h-6"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-slate-900">Weekly Report Ready</h4>
                    <p class="text-[10px] font-medium text-slate-500">PDF, Excel available</p>
                </div>
            </div>
            <button class="px-6 py-3 bg-indigo-600 text-white text-sm font-bold rounded-2xl shadow-lg shadow-indigo-100 active:scale-95 transition-all">
                Export
            </button>
        </div>
    </div>
</x-app-layout>
