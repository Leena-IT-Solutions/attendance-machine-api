<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('users.index') }}" class="p-2 -ml-2 text-slate-400 hover:text-slate-600 transition-colors">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </a>
            <h2 class="text-xl font-bold tracking-tight text-slate-800">
                {{ __('User Details & Employees') }}
            </h2>
        </div>
    </x-slot>

    <div x-data="employeeAttendanceModal()" class="space-y-8 pb-20">
        <!-- User Summary Card -->
        <div class="p-6 bg-white border border-slate-100 rounded-[2.5rem] shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-center space-x-4">
                <div class="w-16 h-16 rounded-[1.5rem] bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold text-2xl uppercase border-2 border-white shadow-sm shrink-0">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <div>
                    <h3 class="text-2xl font-black text-slate-900 leading-tight">{{ $user->name }}</h3>
                    <div class="mt-1.5 flex items-center gap-2">
                        <span class="text-[9px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2 py-1 rounded-md leading-none">{{ $user->role }}</span>
                        <span class="text-slate-300">|</span>
                        <span class="text-xs text-slate-500 font-medium">Created {{ $user->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>

            <!-- Contact and Stats Info -->
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-8 text-sm text-slate-500 font-medium bg-slate-50/50 p-4 rounded-2xl md:ml-auto">
                <!-- Email -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 flex items-center justify-center shrink-0">
                        <i data-lucide="mail" class="w-3.5 h-3.5 text-indigo-400"></i>
                    </div>
                    <span>{{ $user->email }}</span>
                </div>
                
                <!-- Phone -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 flex items-center justify-center shrink-0">
                        <i data-lucide="phone" class="w-3.5 h-3.5 text-emerald-400"></i>
                    </div>
                    <span>{{ $user->phone ?? 'Not provided' }}</span>
                </div>

                <!-- Count -->
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 flex items-center justify-center shrink-0">
                        <i data-lucide="users" class="w-3.5 h-3.5 text-violet-500"></i>
                    </div>
                    <span class="font-bold text-slate-700">{{ count($employees) }} {{ count($employees) == 1 ? 'Employee' : 'Employees' }}</span>
                </div>
            </div>
        </div>

        <!-- Employees List Section -->
        <div>
            <div class="mb-6 flex items-center justify-between">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Registered Employees</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($employees as $employee)
                    <div @click="openModal('{{ addslashes($employee->name) }}', '{{ $employee->code }}')" class="p-6 bg-white border border-slate-100 rounded-[2.5rem] shadow-sm flex items-center space-x-5 group hover:border-indigo-100 transition-all transform hover:scale-[1.01] cursor-pointer">
                        <!-- Photo / Avatar -->
                        <div class="w-16 h-16 rounded-2xl bg-slate-50 flex items-center justify-center overflow-hidden border-2 border-white shadow-sm shrink-0">
                            @if($employee->photo)
                                <img src="/storage/{{ $employee->photo }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold text-2xl uppercase">
                                    {{ substr($employee->name, 0, 1) }}
                                </div>
                            @endif
                        </div>

                        <!-- Details -->
                        <div class="flex-1 min-w-0">
                            <h4 class="font-bold text-slate-900 mb-1 truncate text-lg leading-tight">{{ $employee->name }}</h4>
                            <div class="flex flex-col gap-1 text-[11px] font-bold tracking-wide uppercase">
                                <div class="flex items-center text-slate-400">
                                    <span class="text-indigo-600 mr-2">CODE: {{ $employee->code }}</span>
                                </div>
                                <div class="flex items-center text-slate-500">
                                    <i data-lucide="clock" class="w-3 h-3 text-slate-400 mr-1.5 shrink-0"></i>
                                    <span>
                                        @if($employee->shift)
                                            {{ $employee->shift->name }} ({{ \Carbon\Carbon::parse($employee->shift->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($employee->shift->end_time)->format('h:i A') }})
                                        @else
                                            Standard Shift (07:30 AM - 04:30 PM)
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white border border-slate-100 rounded-[2.5rem] shadow-sm">
                        <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i data-lucide="user-plus" class="w-10 h-10 text-slate-200"></i>
                        </div>
                        <h3 class="text-slate-900 font-bold text-lg mb-2">{{ __('No Employees Yet') }}</h3>
                        <p class="text-slate-400 text-sm max-w-[280px] mx-auto">{{ __('This user has not registered any team members in their directory yet.') }}</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Attendance History Modal -->
        <div x-show="isOpen" 
             class="fixed inset-0 z-50 overflow-y-auto" 
             style="display: none;"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
             
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm transition-opacity" @click="closeModal()"></div>

            <!-- Modal Wrapper -->
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-[3rem] bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl border border-slate-100"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                     
                    <!-- Close button -->
                    <button @click="closeModal()" class="absolute top-8 right-8 text-slate-400 hover:text-slate-600 transition-colors">
                        <i data-lucide="x" class="w-5 h-5"></i>
                    </button>

                    <!-- Content -->
                    <div class="p-10">
                        <div class="flex items-center space-x-4 mb-8">
                            <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600">
                                <i data-lucide="calendar" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-black text-slate-900 tracking-tight" x-text="employeeName"></h3>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-0.5" x-text="'CODE: ' + employeeCode"></p>
                            </div>
                        </div>

                        <!-- Records list -->
                        <div class="mt-6">
                            <!-- Loading state -->
                            <div x-show="loading" class="py-12 flex flex-col items-center justify-center gap-3">
                                <svg class="animate-spin h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Fetching records...</span>
                            </div>

                            <!-- Records display -->
                            <div x-show="!loading">
                                <template x-if="records.length > 0">
                                    <div class="border border-slate-100 rounded-3xl overflow-hidden shadow-inner max-h-[400px] overflow-y-auto custom-scrollbar">
                                        <table class="w-full text-left border-collapse">
                                            <thead>
                                                <tr class="bg-slate-50 border-b border-slate-100">
                                                    <th class="py-4 px-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Date</th>
                                                    <th class="py-4 px-6 text-[10px] font-black text-slate-400 uppercase tracking-widest">Day</th>
                                                    <th class="py-4 px-6 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Scan Time</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-slate-50">
                                                <template x-for="record in records">
                                                    <tr class="hover:bg-slate-50/50 transition-colors">
                                                        <td class="py-4 px-6 text-xs font-bold text-slate-700" x-text="record.scan_date"></td>
                                                        <td class="py-4 px-6 text-xs font-bold text-slate-400" x-text="record.day_name"></td>
                                                        <td class="py-4 px-6 text-xs font-black text-slate-900 text-right">
                                                            <span class="inline-flex items-center px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-black">
                                                                <i data-lucide="clock" class="w-3.5 h-3.5 mr-1 text-emerald-600"></i>
                                                                <span x-text="record.scan_time"></span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </template>
                                
                                <template x-if="records.length === 0">
                                    <div class="py-12 text-center">
                                        <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <i data-lucide="calendar-x" class="w-6 h-6 text-slate-300"></i>
                                        </div>
                                        <h4 class="text-slate-900 font-bold text-base mb-1">No Records Found</h4>
                                        <p class="text-slate-400 text-xs max-w-[240px] mx-auto">This employee has no registered scans or attendance logs in the database.</p>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end">
                            <button @click="closeModal()" class="px-6 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs uppercase tracking-wider rounded-xl transition">
                                Close Window
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function employeeAttendanceModal() {
            return {
                isOpen: false,
                loading: false,
                employeeName: '',
                employeeCode: '',
                records: [],
                
                openModal(name, code) {
                    this.employeeName = name;
                    this.employeeCode = code;
                    this.isOpen = true;
                    this.loading = true;
                    this.records = [];
                    
                    const url = '{{ route('employees.attendance', ['code' => '__CODE__']) }}'.replace('__CODE__', encodeURIComponent(code));
                    
                    fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            this.records = data.records;
                        }
                    })
                    .catch(err => console.error('Error fetching attendance records:', err))
                    .finally(() => {
                        this.loading = false;
                        this.$nextTick(() => {
                            if (typeof lucide !== 'undefined') {
                                lucide.createIcons();
                            }
                        });
                    });
                },
                
                closeModal() {
                    this.isOpen = false;
                }
            }
        }
    </script>
</x-app-layout>
