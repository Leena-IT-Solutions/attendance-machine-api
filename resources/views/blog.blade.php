@extends('layouts.landing')

@section('title', 'Company Blog & HR Insights | Attendance Machine')
@section('meta_description', 'Read tips and articles on workforce productivity, digital shift scheduling, face recognition biometrics, and automated payroll operations.')

@section('content')
<!-- ===== HERO TITLE SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 pt-16 pb-8 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="text-center space-y-4 max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1 rounded-full text-[11px] font-bold text-violet-700 uppercase tracking-widest">
            Latest Insights
        </div>
        <h1 class="font-outfit text-4xl sm:text-5xl font-black text-slate-900 leading-tight">
            Workforce Productivity Guides, <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">HR Tools & Security Insights</span>
        </h1>
        <p class="text-slate-550 text-sm max-w-xl mx-auto">
            Stay up to date with modern biometric guidelines, labor scheduling compliance, and strategies to build efficient workspaces.
        </p>
    </div>
</section>

<!-- ===== BLOG POSTS FEED ===== -->
<section class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($posts as $post)
        <!-- Dynamic Article Card -->
        <article class="bg-white border border-slate-100 rounded-3xl overflow-hidden shadow-sm hover:shadow-md transition-all group flex flex-col justify-between">
            <div class="space-y-4">
                <!-- Cover Mockup Gradient -->
                <div class="h-44 bg-gradient-to-tr {{ $post->cover_gradient }} p-6 flex flex-col justify-between text-white relative">
                    <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <span class="bg-white/20 backdrop-blur-md text-white text-[9px] font-bold px-2 py-0.5 rounded uppercase tracking-wider w-max relative z-10">{{ $post->category }}</span>
                    <h4 class="font-outfit font-extrabold text-sm leading-snug relative z-10">{{ $post->title }}</h4>
                </div>
                <div class="p-6 space-y-3">
                    <div class="flex items-center gap-4 text-[10px] text-slate-400 font-bold">
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                        <span>•</span>
                        <span>{{ $post->read_time }}</span>
                    </div>
                    <h3 class="font-outfit font-extrabold text-slate-900 text-base group-hover:text-violet-650 transition-colors leading-tight">
                        {{ $post->title }}
                    </h3>
                    <p class="text-slate-550 text-[11px] leading-relaxed">
                        {{ $post->excerpt }}
                    </p>
                </div>
            </div>
            <div class="p-6 border-t border-slate-50">
                <a href="{{ route('blog.detail', $post->slug) }}" class="inline-flex items-center gap-1.5 text-xs text-violet-600 font-bold hover:gap-2 transition-all">
                    Read Article <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </article>
        @empty
        <div class="col-span-full text-center py-16 text-slate-450">
            <i class="fa-solid fa-folder-open text-4xl text-slate-300 mb-3"></i>
            <p class="text-xs">No blog posts found. Check back later!</p>
        </div>
        @endforelse
    </div>
</section>

<!-- ===== CTA BANNER ===== -->
<section class="max-w-7xl mx-auto px-6 pb-12">
    <div class="bg-slate-900 rounded-3xl p-8 md:p-12 text-center space-y-4 text-white">
        <h3 class="font-outfit text-xl sm:text-2xl font-bold">Want tips delivered to your inbox?</h3>
        <p class="text-slate-400 text-xs max-w-md mx-auto">Subscribe to our newsletter to receive monthly digests on compliance, HR templates, and product updates.</p>
        <div class="pt-2">
            <form onsubmit="event.preventDefault(); alert('Subscribed successfully!'); this.reset();" class="max-w-md mx-auto flex gap-2">
                <input type="email" required placeholder="Enter your work email" class="w-full px-4 py-3 text-xs bg-slate-800 border border-slate-700 rounded-xl text-white focus:outline-none focus:ring-1 focus:ring-violet-500">
                <button type="submit" class="btn btn-primary text-xs px-6 py-3">Subscribe</button>
            </form>
        </div>
    </div>
</section>
@endsection
