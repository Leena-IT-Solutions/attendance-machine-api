@extends('layouts.landing')

@section('title', $post->title . ' | Attendance Machine Blog')
@section('meta_description', $post->excerpt)

@section('content')
<!-- ===== ARTICLE HERO SECTION ===== -->
<header class="max-w-7xl mx-auto px-6 pt-16 pb-8 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="max-w-3xl mx-auto space-y-4">
        <a href="{{ route('blog') }}" class="inline-flex items-center gap-1.5 text-xs text-slate-500 hover:text-violet-650 transition-colors font-bold mb-2">
            <i class="fa-solid fa-arrow-left"></i> Back to Insights
        </a>
        
        <div class="flex items-center gap-3">
            <span class="bg-violet-50 border border-violet-100 text-violet-700 text-[9px] font-black px-2.5 py-1 rounded-full uppercase tracking-wider">{{ $post->category }}</span>
            <span class="text-[10px] text-slate-400 font-bold">•</span>
            <span class="text-[10px] text-slate-400 font-bold">{{ $post->created_at->format('M d, Y') }}</span>
            <span class="text-[10px] text-slate-400 font-bold">•</span>
            <span class="text-[10px] text-slate-400 font-bold">{{ $post->read_time }}</span>
        </div>

        <h1 class="font-outfit text-3xl sm:text-5xl font-black text-slate-900 leading-tight">
            {{ $post->title }}
        </h1>
        
        <div class="flex items-center gap-3 pt-2">
            <div class="w-8 h-8 rounded-full bg-violet-600 text-white flex items-center justify-center font-bold text-xs">
                L
            </div>
            <div>
                <p class="text-[11px] font-bold text-slate-800 leading-none">Leena IT Editorial Team</p>
                <p class="text-[9px] text-slate-400 mt-0.5">Workforce Technology Analysts</p>
            </div>
        </div>
    </div>
</header>

<!-- ===== ARTICLE BODY CONTENT ===== -->
<main class="max-w-7xl mx-auto px-6 py-12 grid lg:grid-cols-12 gap-12">
    <!-- Left Navigation Bar (Col 3) -->
    <aside class="lg:col-span-3 space-y-6 hidden lg:block">
        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-6 space-y-4">
            <h4 class="font-outfit font-extrabold text-xs text-slate-900 uppercase tracking-widest">Share Article</h4>
            <div class="flex gap-2">
                <a href="#" onclick="event.preventDefault(); alert('Link copied to clipboard!');" class="w-8 h-8 rounded-full bg-white border border-slate-200 text-slate-500 hover:bg-violet-50 hover:text-violet-600 flex items-center justify-center transition-colors">
                    <i class="fa-solid fa-link text-xs"></i>
                </a>
                <a href="#" onclick="event.preventDefault(); alert('Sharing on Twitter...');" class="w-8 h-8 rounded-full bg-white border border-slate-200 text-slate-500 hover:bg-violet-50 hover:text-violet-600 flex items-center justify-center transition-colors">
                    <i class="fa-brands fa-twitter text-xs"></i>
                </a>
                <a href="#" onclick="event.preventDefault(); alert('Sharing on LinkedIn...');" class="w-8 h-8 rounded-full bg-white border border-slate-200 text-slate-500 hover:bg-violet-50 hover:text-violet-600 flex items-center justify-center transition-colors">
                    <i class="fa-brands fa-linkedin-in text-xs"></i>
                </a>
            </div>
        </div>
        
        <div class="bg-white border border-slate-100 rounded-2xl p-6 space-y-3">
            <h4 class="font-outfit font-extrabold text-xs text-slate-900 uppercase tracking-widest">Related Products</h4>
            <ul class="space-y-2 text-[11px] text-slate-655 font-bold">
                <li><a href="{{ route('features') }}" class="hover:text-violet-600 transition-colors">capabilities Tour</a></li>
                <li><a href="{{ route('pricing') }}" class="hover:text-violet-600 transition-colors">Pricing Packages</a></li>
                <li><a href="{{ route('demo') }}" class="hover:text-violet-600 transition-colors">Request Trial sandbox</a></li>
            </ul>
        </div>
    </aside>

    <!-- Main Content Body (Col 6) -->
    <article class="lg:col-span-6 space-y-6">
        <!-- Main Rich Body Container -->
        <div class="prose max-w-none text-slate-650 text-xs sm:text-sm leading-relaxed space-y-6">
            {!! $post->content !!}
        </div>
    </article>

    <!-- Right Sidebar Call-To-Action (Col 3) -->
    <aside class="lg:col-span-3 space-y-6">
        <div class="bg-slate-900 text-white rounded-3xl p-6 space-y-4 shadow-md relative overflow-hidden group">
            <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/10 to-indigo-500/5 pointer-events-none"></div>
            <h4 class="font-outfit font-extrabold text-base leading-snug relative z-10">Deploy AI Face Matching</h4>
            <p class="text-slate-400 text-[10px] sm:text-xs leading-relaxed relative z-10">
                Onboard up to 100+ workers and manage rotational rosters with our Premium packages.
            </p>
            <div class="pt-2 relative z-10">
                <a href="{{ route('pricing') }}" class="btn btn-primary w-full text-center text-xs py-3 font-bold block shadow-lg">Check Pricing</a>
            </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-3xl p-6 text-center space-y-4 shadow-sm">
            <h4 class="font-outfit font-extrabold text-sm text-slate-800 leading-snug">Need Integration Help?</h4>
            <p class="text-slate-500 text-[10px] leading-relaxed">
                Connect check registers with your local accounting databases. Chat with our development engineers on WhatsApp.
            </p>
            <a href="https://wa.me/919096189183" target="_blank" rel="noopener" class="btn bg-emerald-600 hover:bg-emerald-700 text-white w-full text-center text-xs py-2.5 font-bold flex items-center justify-center gap-2 shadow-sm">
                <i class="fa-brands fa-whatsapp text-sm"></i> WhatsApp Support
            </a>
        </div>
    </aside>
</main>
@endsection
