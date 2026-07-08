<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-500">{{ __('Log') }}</p>
                <h2 class="text-2xl font-bold tracking-tight text-slate-900 md:text-3xl">
                    {{ __('Attendance History') }}
                </h2>
            </div>
            <div class="flex space-x-2">
                <button class="flex items-center justify-center p-3 text-slate-600 bg-white rounded-2xl shadow-sm hover:bg-slate-50 transition-all">
                    <i data-lucide="calendar" class="w-6 h-6"></i>
                </button>
                <button class="flex items-center justify-center p-3 text-slate-600 bg-white rounded-2xl shadow-sm hover:bg-slate-50 transition-all">
                    <i data-lucide="filter" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
    </x-slot>

    <div class="space-y-8">
        <!-- Date Selector Horizontal -->
        <div class="flex overflow-x-auto pb-4 -mx-4 px-4 space-x-4 scrollbar-hide">
            @for ($i = -3; $i <= 3; $i++)
                @php $date = now()->addDays($i); @endphp
                <button class="flex-shrink-0 flex flex-col items-center justify-center w-16 h-24 rounded-2xl transition-all {{ $i === 0 ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-200 scale-110 z-10' : 'bg-white text-slate-400 hover:bg-indigo-50 hover:text-indigo-400' }}">
                    <span class="text-[10px] font-bold uppercase tracking-widest mb-1">{{ $date->format('D') }}</span>
                    <span class="text-xl font-bold">{{ $date->format('d') }}</span>
                    @if($i == 0)
                        <span class="w-1 h-1 mt-1 bg-white rounded-full"></span>
                    @endif
                </button>
            @endfor
        </div>

        <!-- Attendance Timeline -->
        <div class="relative pl-8 space-y-8 before:absolute before:inset-y-0 before:left-3 before:w-0.5 before:bg-slate-100">
            @php
                $records = [
                    ['name' => 'John Doe', 'time' => '09:05 AM', 'type' => 'In', 'status' => 'On Time', 'color' => 'emerald'],
                    ['name' => 'Jane Smith', 'time' => '09:12 AM', 'type' => 'In', 'status' => 'On Time', 'color' => 'emerald'],
                    ['name' => 'Robert Fox', 'time' => '09:45 AM', 'type' => 'In', 'status' => 'Late', 'color' => 'amber'],
                    ['name' => 'Michael Brown', 'time' => '01:05 PM', 'type' => 'Out', 'status' => 'Lunch Break', 'color' => 'indigo'],
                    ['name' => 'Sarah Chen', 'time' => '05:15 PM', 'type' => 'Out', 'status' => 'Working Overtime', 'color' => 'violet'],
                ];
            @endphp

            @foreach($records as $record)
            <div class="relative">
                <!-- Dot -->
                <div class="absolute -left-[29px] w-6 h-6 rounded-full border-4 border-white shadow-sm bg-{{ $record['color'] }}-500 z-10"></div>
                
                <div class="p-5 bg-white shadow-sm rounded-3xl transition-all hover:shadow-md cursor-pointer">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="flex items-center space-x-2 mb-1">
                                <h4 class="font-bold text-slate-900">{{ $record['name'] }}</h4>
                                <span class="px-2 py-0.5 text-[10px] font-bold uppercase rounded-md bg-{{ $record['color'] }}-50 text-{{ $record['color'] }}-600">{{ $record['type'] }}</span>
                            </div>
                            <p class="text-xs font-medium text-slate-500">{{ $record['status'] }}</p>
                        </div>
                        <div class="text-right">
                            <span class="text-lg font-bold text-indigo-600">{{ $record['time'] }}</span>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">{{ __('Recorded') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
