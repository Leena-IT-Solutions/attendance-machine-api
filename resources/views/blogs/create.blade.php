<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('blogs.index') }}" class="p-2 -ml-2 text-slate-400 hover:text-slate-600 transition-colors">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </a>
            <h2 class="text-xl font-bold tracking-tight text-slate-800">
                {{ __('Create Blog Post') }}
            </h2>
        </div>
    </x-slot>

    <div class="pb-24 max-w-2xl mx-auto">
        <form action="{{ route('blogs.store') }}" method="POST" class="space-y-8">
            @csrf

            <div class="space-y-6">
                <!-- Title -->
                <div class="space-y-2">
                    <label for="title" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Article Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 placeholder-slate-300 text-slate-900 transition-all shadow-sm @error('title') border-rose-400 @enderror"
                        placeholder="e.g. Top Benefits of AI Face recognition">
                    @error('title')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                </div>

                <!-- Category & Read Time Grid -->
                <div class="grid grid-cols-2 gap-4">
                    <!-- Category -->
                    <div class="space-y-2">
                        <label for="category" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Category</label>
                        <input type="text" name="category" id="category" value="{{ old('category') }}" required
                            class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 placeholder-slate-300 text-slate-900 transition-all shadow-sm @error('category') border-rose-400 @enderror"
                            placeholder="e.g. AI Technology">
                        @error('category')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                    </div>

                    <!-- Read Time -->
                    <div class="space-y-2">
                        <label for="read_time" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Read Duration</label>
                        <input type="text" name="read_time" id="read_time" value="{{ old('read_time') }}" required
                            class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 placeholder-slate-300 text-slate-900 transition-all shadow-sm @error('read_time') border-rose-400 @enderror"
                            placeholder="e.g. 5 Min Read">
                        @error('read_time')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Cover Gradient Selector -->
                <div class="space-y-2">
                    <label for="cover_gradient" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Cover Theme Gradient</label>
                    <select name="cover_gradient" id="cover_gradient" required
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 text-slate-900 transition-all shadow-sm @error('cover_gradient') border-rose-400 @enderror">
                        <option value="from-violet-500 to-indigo-500" {{ old('cover_gradient') === 'from-violet-500 to-indigo-500' ? 'selected' : '' }}>Violet Indigo (Default)</option>
                        <option value="from-emerald-500 to-teal-500" {{ old('cover_gradient') === 'from-emerald-500 to-teal-500' ? 'selected' : '' }}>Emerald Teal</option>
                        <option value="from-amber-500 to-orange-500" {{ old('cover_gradient') === 'from-amber-500 to-orange-500' ? 'selected' : '' }}>Amber Orange</option>
                        <option value="from-rose-500 to-pink-500" {{ old('cover_gradient') === 'from-rose-500 to-pink-500' ? 'selected' : '' }}>Rose Pink</option>
                        <option value="from-indigo-500 to-blue-500" {{ old('cover_gradient') === 'from-indigo-500 to-blue-500' ? 'selected' : '' }}>Indigo Blue</option>
                    </select>
                    @error('cover_gradient')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                </div>

                <!-- Excerpt -->
                <div class="space-y-2">
                    <label for="excerpt" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Article Excerpt</label>
                    <textarea name="excerpt" id="excerpt" rows="3" required
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 placeholder-slate-300 text-slate-900 transition-all shadow-sm @error('excerpt') border-rose-400 @enderror"
                        placeholder="A brief summary teaser text to show on card listing..."></textarea>
                    @error('excerpt')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                </div>

                <!-- Content Body -->
                <div class="space-y-2">
                    <label for="content" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Article Body Content (Supports HTML)</label>
                    <textarea name="content" id="content" rows="12" required
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 placeholder-slate-300 font-mono text-xs text-slate-800 transition-all shadow-sm @error('content') border-rose-400 @enderror"
                        placeholder="<h2>Subheader</h2> <p>Paragraph lines...</p>"></textarea>
                    @error('content')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                </div>
            </div>

            <!-- Submit buttons -->
            <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-xs uppercase tracking-widest py-4 px-6 rounded-2xl shadow-lg shadow-indigo-200 active:scale-95 transition-all">
                    Save Article
                </button>
                <a href="{{ route('blogs.index') }}" class="px-6 py-4 bg-slate-50 hover:bg-slate-100 text-slate-500 font-bold text-xs uppercase tracking-widest rounded-2xl transition-all">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
