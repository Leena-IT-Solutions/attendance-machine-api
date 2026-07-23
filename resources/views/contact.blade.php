@extends('layouts.landing')

@section('title', 'Contact Support & Sales | Attendance Machine')
@section('meta_description', 'Get in touch with Attendance Machine sales and support. Request custom onboarding assistance, pricing configurations, or API developer help.')

@section('content')
<!-- ===== HERO TITLE SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 pt-16 pb-8 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="text-center space-y-4 max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1 rounded-full text-[11px] font-bold text-violet-700 uppercase tracking-widest">
            Contact Hub
        </div>
        <h1 class="font-outfit text-4xl sm:text-5xl font-black text-slate-900 leading-tight">
            We Are Here To Help <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">Your Business Get Setup</span>
        </h1>
        <p class="text-slate-500 text-sm max-w-xl mx-auto">
            Have questions about system custom configurations, pricing plans, or need technical help? Write to our team today.
        </p>
    </div>
</section>

<!-- ===== CONTACT DUAL COLUMN CONTENT ===== -->
<section class="max-w-7xl mx-auto px-6 py-12 grid md:grid-cols-12 gap-12">
    <!-- Form (Col 7) -->
    <div class="md:col-span-7 bg-white border border-slate-100 rounded-3xl p-8 shadow-sm space-y-6">
        <div>
            <h3 class="font-outfit text-xl font-bold text-slate-900">Send Us A Message</h3>
            <p class="text-slate-500 text-xs">Fill out the fields below and we'll reply within 24 hours.</p>
        </div>

        @if(session('success'))
            <div class="p-4 text-xs font-bold text-emerald-800 bg-emerald-50 rounded-2xl border border-emerald-200 flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-600 text-sm"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('demo.request.store') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="type" value="contact">
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Full Name</label>
                    <input type="text" name="name" required placeholder="e.g. John Doe" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Email Address</label>
                    <input type="email" name="email" required placeholder="e.g. john@factory.com" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Contact No / Phone</label>
                    <input type="tel" name="phone" required placeholder="e.g. +91 9876543210" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Subject</label>
                    <input type="text" name="subject" required placeholder="e.g. Custom Corporate Demo Request" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase font-bold text-slate-500">Message Description</label>
                <textarea name="comments" rows="4" required placeholder="Outline how we can assist you..." class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-full text-center text-xs py-3.5 font-bold shadow-lg">Send Message</button>
        </form>
    </div>

    <!-- Info & Map (Col 5) -->
    <div class="md:col-span-5 space-y-8">
        <!-- Direct Channels -->
        <div class="bg-white border border-slate-100 rounded-3xl p-8 shadow-sm space-y-6">
            <h3 class="font-outfit text-xl font-bold text-slate-900">Direct Support Channels</h3>
            
            <div class="space-y-4 text-xs">
                <div class="flex items-start gap-4">
                    <div class="w-9 h-9 rounded-lg bg-violet-50 text-violet-600 flex items-center justify-center text-sm shrink-0"><i class="fa-solid fa-envelope"></i></div>
                    <div class="space-y-0.5">
                        <p class="font-bold text-slate-800">Email Address</p>
                        <a href="mailto:leenaitsolutions@gmail.com" class="text-slate-500 hover:text-violet-600">leenaitsolutions@gmail.com</a>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="w-9 h-9 rounded-lg bg-violet-50 text-violet-600 flex items-center justify-center text-sm shrink-0"><i class="fa-solid fa-headset"></i></div>
                    <div class="space-y-0.5">
                        <p class="font-bold text-slate-800">Business Hours</p>
                        <p class="text-slate-500">Monday - Friday • 09:00 AM - 06:00 PM IST</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Map Embedded Location -->
        <div class="bg-white border border-slate-100 rounded-3xl p-3 shadow-sm overflow-hidden space-y-3">
            <div class="flex items-center justify-between px-3 pt-1">
                <div>
                    <span class="text-[10px] font-bold text-violet-600 uppercase tracking-widest block">Office Location</span>
                    <h4 class="font-outfit text-sm font-black text-slate-900">Leena IT Solutions</h4>
                </div>
                <span class="inline-flex items-center gap-1.5 text-[10px] font-extrabold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-full border border-emerald-100">
                    <i class="fa-solid fa-location-dot"></i> Live Map
                </span>
            </div>
            <div class="w-full h-64 rounded-2xl overflow-hidden border border-slate-150">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3767.691634027733!2d73.1799401769003!3d19.208666347790963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be79384130b3803%3A0x61a31096dee8d260!2sLITS%20%7C%20Website%20designing%20%7C%20Android%2C%20iOS%20App%20%7C%20eCommerce%20website!5e0!3m2!1sen!2sin!4v1784631165837!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection
