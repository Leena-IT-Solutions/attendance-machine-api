<x-app-layout>
    <x-slot name="header">
        {{ __('Submitted Form Requests') }}
    </x-slot>

    <div class="space-y-6 pb-20">
        <div class="flex justify-between items-center bg-white p-4 rounded-[1.5rem] border border-slate-100 shadow-sm">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest pl-2">Leads & Inquiries</span>
            <span class="bg-indigo-50 border border-indigo-100 text-indigo-700 text-xs font-extrabold px-3 py-1 rounded-full">
                Total: {{ $requests->total() }}
            </span>
        </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-emerald-700 bg-emerald-50 rounded-2xl border border-emerald-100 flex items-center">
                <i data-lucide="check-circle" class="w-4 h-4 mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white border border-slate-100 rounded-[2rem] p-6 shadow-sm overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-700 font-bold border-b border-slate-200">
                        <th class="p-3">Date & Time</th>
                        <th class="p-3">Type</th>
                        <th class="p-3">Contact Name</th>
                        <th class="p-3">Contact Info</th>
                        <th class="p-3">Capacity / Industry</th>
                        <th class="p-3">Details / Comments</th>
                        <th class="p-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($requests as $req)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-3 font-mono text-slate-500 text-[11px] whitespace-nowrap">
                                {{ $req->created_at->format('M d, Y h:i A') }}
                            </td>
                            <td class="p-3 whitespace-nowrap">
                                @if($req->type === 'contact')
                                    <span class="bg-amber-50 text-amber-700 font-bold text-[10px] uppercase px-2.5 py-1 rounded-full border border-amber-100">Contact</span>
                                @else
                                    <span class="bg-violet-50 text-violet-700 font-bold text-[10px] uppercase px-2.5 py-1 rounded-full border border-violet-100">Demo Setup</span>
                                @endif
                            </td>
                            <td class="p-3 font-bold text-slate-900 whitespace-nowrap">
                                {{ $req->name }}
                            </td>
                            <td class="p-3 font-mono text-slate-700">
                                <a href="mailto:{{ $req->email }}" class="text-indigo-600 hover:underline block font-extrabold text-[11px]">{{ $req->email }}</a>
                                @if($req->phone)
                                    <span class="text-slate-500 font-semibold text-[11px] block mt-0.5"><i class="fa-solid fa-phone text-[9px] text-slate-400 mr-1"></i>{{ $req->phone }}</span>
                                @endif
                            </td>
                            <td class="p-3 text-slate-600 whitespace-nowrap">
                                @if($req->employee_capacity || $req->primary_industry)
                                    <span class="font-bold text-slate-800">{{ $req->employee_capacity ?? 'N/A' }}</span>
                                    <span class="text-slate-400">|</span>
                                    <span>{{ $req->primary_industry ?? 'N/A' }}</span>
                                @else
                                    <span class="text-slate-400 italic">N/A</span>
                                @endif
                            </td>
                            <td class="p-3 text-slate-600 min-w-[280px] max-w-md">
                                @if($req->subject)
                                    <strong class="text-slate-900 font-bold block text-xs mb-1 leading-snug">{{ $req->subject }}</strong>
                                @endif
                                <p class="text-slate-600 text-[11px] leading-relaxed whitespace-pre-line">{{ $req->comments ?? 'No message body provided.' }}</p>
                            </td>
                            <td class="p-3 text-right whitespace-nowrap">
                                <form action="{{ route('demo.requests.destroy', $req) }}" method="POST" onsubmit="return confirm('Delete this request permanently?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-slate-50 hover:bg-rose-50 hover:text-rose-600 text-slate-400 rounded-xl transition-all">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-10 text-center text-slate-400">
                                <i data-lucide="inbox" class="w-10 h-10 mx-auto text-slate-300 mb-2"></i>
                                <p class="text-xs">No submitted requests found yet.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $requests->links() }}
        </div>
    </div>
</x-app-layout>
