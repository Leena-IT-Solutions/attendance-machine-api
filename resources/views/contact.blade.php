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

        <form class="space-y-4" onsubmit="event.preventDefault(); alert('Message successfully sent! Our customer service representative will respond shortly.'); this.reset();">
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Full Name</label>
                    <input type="text" required placeholder="e.g. John Doe" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                </div>
                <div class="space-y-1.5">
                    <label class="text-[10px] uppercase font-bold text-slate-500">Email Address</label>
                    <input type="email" required placeholder="e.g. john@factory.com" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase font-bold text-slate-500">Subject</label>
                <input type="text" required placeholder="e.g. Custom Corporate Demo Request" class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all">
            </div>

            <div class="space-y-1.5">
                <label class="text-[10px] uppercase font-bold text-slate-500">Message Description</label>
                <textarea rows="4" required placeholder="Outline how we can assist you..." class="w-full px-4 py-3 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-violet-500 focus:bg-white transition-all"></textarea>
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

        <!-- Styled Map Placeholder -->
        <div class="bg-slate-900 rounded-3xl p-6 h-64 text-white flex flex-col justify-between relative overflow-hidden border border-slate-800">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,#7c3aed_10px,transparent_11px)] bg-[length:32px_32px] opacity-10"></div>
            <div class="space-y-1 relative">
                <span class="text-xs font-bold text-violet-400 uppercase tracking-widest">Office HQ</span>
                <h4 class="font-outfit text-base font-black">Leena IT Solutions</h4>
                <p class="text-slate-400 text-[10px]">Bengaluru, Karnataka, India</p>
            </div>
            
            <div class="flex justify-between items-center text-[10px] text-slate-400 border-t border-slate-800 pt-3 relative">
                <span>Google Map Location Tag</span>
                <span class="text-violet-400 font-bold uppercase"><i class="fa-solid fa-map-pin"></i> Active HQ</span>
            </div>
        </div>
    </div>
</section>
@endsection
