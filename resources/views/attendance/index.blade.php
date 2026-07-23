<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-500">{{ __('Log') }}</p>
                <h2 class="text-2xl font-bold tracking-tight text-slate-900 md:text-3xl">
                    {{ __('Attendance History') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="space-y-6 pb-20">
        <!-- Date Selector Horizontal Slider -->
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm p-8 mb-4">
            <div class="flex items-center justify-between mb-4 px-2">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">{{ __('Select Date View') }}</p>
                <a href="{{ route('attendance.index', ['date' => now()->toDateString()]) }}" class="text-[9px] font-black text-indigo-600 hover:text-indigo-700 uppercase tracking-widest">
                    {{ __('Go to Today') }}
                </a>
            </div>
            <div class="flex overflow-x-auto pb-2 px-2 space-x-4 scrollbar-hide">
                @php
                    $baseDate = now();
                    $sliderDates = [];
                    for ($i = -12; $i <= 2; $i++) {
                        $sliderDates[] = $baseDate->copy()->addDays($i);
                    }
                @endphp
                @foreach($sliderDates as $d)
                    @php $dStr = $d->toDateString(); @endphp
                    <a href="{{ route('attendance.index', ['date' => $dStr]) }}"
                       class="flex-shrink-0 flex flex-col items-center justify-center w-16 h-20 rounded-2xl transition-all duration-300 {{ $dStr === $selectedDate ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/25 scale-105' : 'bg-slate-50 text-slate-400 hover:bg-indigo-50 hover:text-indigo-500' }}">
                        <span class="text-[9px] font-bold uppercase tracking-widest mb-1">{{ $d->format('D') }}</span>
                        <span class="text-lg font-bold">{{ $d->format('d') }}</span>
                        <span class="text-[8px] font-bold uppercase tracking-widest mt-0.5 opacity-80">{{ $d->format('M') }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Attendance Table -->
        <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100 bg-slate-50/50">
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Date</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Employee</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Punch In</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Punch Out</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Work Hours</th>
                            <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($paginatedLogs as $log)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-8 py-5 text-xs font-bold text-slate-700">
                                    {{ \Carbon\Carbon::parse($log->scan_date)->format('M d, Y') }}
                                </td>
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-xs uppercase">
                                            {{ substr($log->employee_name, 0, 1) }}
                                        </div>
                                        <div>
                                            <span class="block text-xs font-bold text-slate-800">{{ $log->employee_name }}</span>
                                            <span class="block text-[9px] font-bold text-indigo-400 uppercase tracking-wider mt-0.5">{{ $log->employee_code }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5 text-xs font-bold text-slate-600">
                                    {{ \Carbon\Carbon::parse($log->in_time)->format('h:i A') }}
                                </td>
                                <td class="px-8 py-5 text-xs font-bold text-slate-600">
                                    @if($log->out_time)
                                        {{ \Carbon\Carbon::parse($log->out_time)->format('h:i A') }}
                                    @else
                                        <span class="text-slate-350">---</span>
                                    @endif
                                </td>
                                <td class="px-8 py-5 text-xs font-bold font-mono text-slate-600">
                                    {{ $log->hours }}
                                </td>
                                <td class="px-8 py-5">
                                    @if($log->out_time)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-[9px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-700">
                                            Present
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-[9px] font-bold uppercase tracking-wider bg-amber-50 text-amber-700">
                                            Single Punch
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-8 py-16 text-center text-slate-400 text-xs font-medium">
                                    No attendance records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination Controls -->
            @if($paginatedLogs->hasPages())
                <div class="px-8 py-5 bg-slate-50/50 border-t border-slate-100 flex items-center justify-between">
                    <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                        Showing {{ $paginatedLogs->firstItem() }} to {{ $paginatedLogs->lastItem() }} of {{ $paginatedLogs->total() }} entries
                    </div>
                    <div class="flex items-center gap-2">
                        {{ $paginatedLogs->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
