<x-app-layout>
    <x-slot name="header">
        Admin Dashboard
    </x-slot>

    <div class="space-y-10">
        @if (session('status'))
            <div class="bg-emerald-50 border border-emerald-100 text-emerald-800 px-6 py-4 rounded-2xl flex items-center gap-3 shadow-sm">
                <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-500"></i>
                <span class="text-xs font-bold uppercase tracking-wider">{{ session('status') }}</span>
            </div>
        @endif

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            <!-- Total Users Card -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-indigo-500/5 transition-all duration-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Total Registered Users</p>
                        <h3 class="text-5xl font-black text-slate-900 tracking-tighter leading-none">{{ $totalUsers }}</h3>
                    </div>
                    <div class="w-20 h-20 bg-indigo-50 rounded-3xl flex items-center justify-center text-indigo-500 group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 shadow-inner">
                        <i data-lucide="users" class="w-10 h-10"></i>
                    </div>
                </div>
                <div class="mt-8 flex items-center gap-2 text-emerald-500">
                    <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                    <span class="text-[10px] font-bold uppercase tracking-widest">Active Mobile App Users</span>
                </div>
            </div>

            <!-- Total Employees Card -->
            <div class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-emerald-500/5 transition-all duration-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">System Wide Employees</p>
                        <h3 class="text-5xl font-black text-slate-900 tracking-tighter leading-none">{{ $totalEmployees }}</h3>
                    </div>
                    <div class="w-20 h-20 bg-emerald-50 rounded-3xl flex items-center justify-center text-emerald-500 group-hover:scale-110 group-hover:-rotate-6 transition-all duration-500 shadow-inner">
                        <i data-lucide="contact-2" class="w-10 h-10"></i>
                    </div>
                </div>
                <div class="mt-8 flex items-center gap-2 text-indigo-500">
                    <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                    <span class="text-[10px] font-bold uppercase tracking-widest">Across all accounts</span>
                </div>
            </div>

            <!-- System Health Card -->
            <div class="bg-slate-900 p-8 rounded-[2.5rem] shadow-2xl shadow-slate-200 flex flex-col justify-between overflow-hidden relative group">
                <div class="absolute -right-8 -top-8 w-32 h-32 bg-white/5 rounded-full blur-2xl group-hover:bg-white/10 transition-all duration-700"></div>
                <div class="relative z-10 space-y-6">
                    <div>
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-4">System Status</p>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center text-emerald-400">
                                <i data-lucide="activity" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <p class="text-white font-black uppercase text-sm tracking-tight">Optimal Performance</p>
                                <p class="text-slate-500 text-[10px] font-bold tracking-widest uppercase">Version 2.4.0 • Stable</p>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 border-t border-white/10">
                        <form action="{{ route('prune.attendance') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete all attendance records older than 95 days across the entire system? This action cannot be undone.')">
                            @csrf
                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-[10px] uppercase tracking-wider py-3 px-4 rounded-xl transition-all duration-300 flex items-center justify-center gap-2">
                                <i data-lucide="trash-2" class="w-4 h-4 text-indigo-200"></i>
                                Prune Old Records (>95 Days)
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Historic Data Chart -->
        <div class="mt-16 bg-white p-10 rounded-[3rem] border border-slate-100 shadow-sm relative overflow-hidden">
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 gap-4">
                <div>
                    <h3 class="text-2xl font-black text-slate-900 tracking-tight">User Registration Growth</h3>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-1">Historic Registration Data (Monthly)</p>
                </div>
                <div class="flex gap-2">
                    <div class="px-4 py-2 bg-slate-50 rounded-xl border border-slate-100 flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-indigo-500"></div>
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">New Users</span>
                    </div>
                </div>
            </div>

            <div class="relative h-[400px] w-full">
                <canvas id="userGrowthChart"></canvas>
            </div>
        </div>

        <!-- Git Repository Deployment Card -->
        <div x-data="gitUpdater()" x-init="init()" class="bg-white p-10 rounded-[3rem] border border-slate-100 shadow-sm relative overflow-hidden transition-all duration-500">
            <div class="flex items-center gap-3 pb-6 mb-8 border-b border-slate-100">
                <div class="w-10 h-10 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-500">
                    <i data-lucide="refresh-cw" class="w-5 h-5"></i>
                </div>
                <h2 class="text-xl font-black text-slate-900 tracking-tight">System Actions & Git Updates</h2>
            </div>
            
            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-8 mb-8">
                <div class="max-w-xl">
                    <span class="text-sm font-bold text-slate-800 uppercase tracking-wider">Git Repository Deployment</span>
                    <p class="text-slate-400 text-xs mt-2 leading-relaxed font-medium">
                        Pull the latest updates from the remote GitHub branch, automatically execute database migrations, and clear cache bundles to deploy changes.
                    </p>
                </div>
                <div class="text-[11px] font-bold font-mono bg-slate-50 border border-slate-100 rounded-2xl p-6 flex flex-col gap-3 min-w-[280px] md:min-w-[360px] shadow-inner text-slate-500">
                    <div class="flex items-center">
                        <span class="text-[9px] uppercase font-black text-slate-400 w-28 tracking-widest">Current Branch:</span>
                        <span class="text-indigo-600 truncate" x-text="gitInfo.branch + ' @ ' + gitInfo.commit_hash">Loading...</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-[9px] uppercase font-black text-slate-400 w-28 tracking-widest">Latest Commit:</span>
                        <span class="text-slate-700 truncate" x-text="'&quot;' + gitInfo.commit_message + '&quot;'">Loading...</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-[9px] uppercase font-black text-slate-400 w-28 tracking-widest">Timestamp:</span>
                        <span class="text-emerald-600 truncate" x-text="gitInfo.commit_date + ' (' + gitInfo.commit_relative + ')'">Loading...</span>
                    </div>
                </div>
            </div>

            <template x-if="successMessage">
                <div class="bg-emerald-50 border border-emerald-100 text-emerald-800 px-6 py-4 rounded-2xl text-xs font-bold uppercase tracking-wider mb-6 flex items-center gap-3 shadow-sm">
                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-500"></i>
                    <span x-text="successMessage"></span>
                </div>
            </template>

            <div class="flex flex-col gap-6">
                <div>
                    <button 
                        @click="updateSite()" 
                        :disabled="isUpdating"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 hover:bg-indigo-700 disabled:bg-indigo-400 text-white font-bold text-[10px] uppercase tracking-wider rounded-xl shadow transition duration-150 ease-in-out cursor-pointer"
                    >
                        <i x-show="!isUpdating" data-lucide="git-pull-request" class="w-4 h-4"></i>
                        <!-- Loading spinner -->
                        <svg x-show="isUpdating" class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" style="display: none;">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span x-text="isUpdating ? 'Updating Site...' : 'Update from GitHub'"></span>
                    </button>
                </div>

                <template x-if="updateOutput">
                    <div class="mt-4">
                        <label class="block font-black text-[10px] text-slate-400 uppercase tracking-widest mb-3">Console Log Output:</label>
                        <pre class="bg-slate-900 border border-slate-800 text-emerald-400 p-6 rounded-2xl font-mono text-[11px] overflow-x-auto max-h-[300px] overflow-y-auto leading-relaxed shadow-inner" x-text="updateOutput"></pre>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <script>
        function gitUpdater() {
            return {
                gitInfo: {
                    branch: '...',
                    commit_hash: '...',
                    commit_message: '...',
                    commit_date: '...',
                    commit_relative: '...'
                },
                isUpdating: false,
                updateOutput: '',
                successMessage: '',
                
                init() {
                    this.fetchInfo();
                },
                
                fetchInfo() {
                    fetch('{{ route('git.info') }}', {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            this.gitInfo = data;
                            this.$nextTick(() => {
                                if (typeof lucide !== 'undefined') {
                                    lucide.createIcons();
                                }
                            });
                        }
                    })
                    .catch(err => console.error('Error fetching git info:', err));
                },
                
                updateSite() {
                    if (!confirm('Are you sure you want to update the site from Git origin? This will hard reset any local changes on the server.')) {
                        return;
                    }
                    this.isUpdating = true;
                    this.successMessage = '';
                    this.updateOutput = 'Starting update process...\n\n';
                    
                    fetch('{{ route('git.update') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.updateOutput = data.output;
                        if (data.success) {
                            this.successMessage = 'Update process completed successfully.';
                            this.fetchInfo();
                        } else {
                            this.successMessage = 'Update finished with some errors (check exit codes).';
                        }
                        this.$nextTick(() => {
                            if (typeof lucide !== 'undefined') {
                                lucide.createIcons();
                            }
                        });
                    })
                    .catch(err => {
                        this.updateOutput += '\nError during update request:\n' + err.message;
                        this.successMessage = 'Update request failed.';
                    })
                    .finally(() => {
                        this.isUpdating = false;
                    });
                }
            }
        }
    </script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('userGrowthChart').getContext('2d');
            
            // Prepare data from PHP
            const stats = @json($userStats);
            const labels = stats.map(s => s.month);
            const data = stats.map(s => s.count);

            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(79, 70, 229, 0.2)');
            gradient.addColorStop(1, 'rgba(79, 70, 229, 0)');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels.length ? labels : ['No Data'],
                    datasets: [{
                        label: 'New Users',
                        data: data.length ? data : [0],
                        borderColor: '#4f46e5',
                        borderWidth: 4,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#4f46e5',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8,
                        tension: 0.4,
                        fill: true,
                        backgroundColor: gradient,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                color: 'rgba(0,0,0,0.03)',
                                drawBorder: false
                            },
                            ticks: {
                                font: { weight: 'bold', size: 10 },
                                color: '#94a3b8'
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { weight: 'bold', size: 10 },
                                color: '#94a3b8'
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
/x-app-layout>