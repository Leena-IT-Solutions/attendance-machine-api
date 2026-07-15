<x-app-layout>
    <x-slot name="header">
        {{ __('Blog CMS') }}
    </x-slot>

    <div class="space-y-6 pb-20">
        <div class="flex justify-between items-center bg-white p-4 rounded-[1.5rem] border border-slate-100 shadow-sm">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest pl-2">Articles Feed</span>
            <a href="{{ route('blogs.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs uppercase tracking-wider px-6 py-3 rounded-xl shadow-lg shadow-indigo-200 active:scale-95 transition-all flex items-center gap-2 shrink-0">
                <i data-lucide="plus" class="w-4 h-4"></i>
                <span>Add Post</span>
            </a>
        </div>
        @if(session('status'))
            <div class="p-4 mb-4 text-sm text-emerald-700 bg-emerald-50 rounded-2xl border border-emerald-100 flex items-center">
                <i data-lucide="check-circle" class="w-4 h-4 mr-2"></i>
                {{ session('status') }}
            </div>
        @endif

        <div class="flex flex-col space-y-4">
            @forelse($posts as $post)
                <div class="p-5 bg-white border border-slate-100 rounded-[2rem] shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4 group hover:border-indigo-100 transition-all hover:shadow-md">
                    <!-- Left: Card cover and details -->
                    <div class="flex items-center space-x-4 min-w-0">
                        <div class="w-16 h-12 rounded-xl bg-gradient-to-tr {{ $post->cover_gradient }} flex items-center justify-center overflow-hidden border-2 border-white shadow-sm shrink-0">
                            <span class="text-[8px] font-bold text-white uppercase">{{ $post->category }}</span>
                        </div>
                        <div class="min-w-0">
                            <h4 class="font-bold text-slate-900 truncate text-base leading-tight">{{ $post->title }}</h4>
                            <div class="mt-1.5 flex items-center gap-2">
                                <span class="text-[9px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded leading-none">{{ $post->category }}</span>
                                <span class="text-[10px] text-slate-400 font-bold">•</span>
                                <span class="text-[10px] text-slate-400 font-bold">{{ $post->read_time }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Edit / Delete Actions -->
                    <div class="flex items-center gap-3 shrink-0 self-end md:self-center">
                        <a href="{{ route('blogs.edit', $post) }}" class="p-2.5 bg-slate-50 hover:bg-indigo-50 hover:text-indigo-600 text-slate-400 rounded-xl transition-all">
                            <i data-lucide="edit-3" class="w-5 h-5"></i>
                        </a>
                        <form action="{{ route('blogs.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2.5 bg-slate-50 hover:bg-rose-50 hover:text-rose-600 text-slate-400 rounded-xl transition-all">
                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="p-10 bg-white border border-slate-100 rounded-[2rem] text-center text-slate-400">
                    <i data-lucide="folder-open" class="w-10 h-10 mx-auto text-slate-300 mb-2"></i>
                    <p class="text-xs">No blog posts found. Create your first post using the plus button above!</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
