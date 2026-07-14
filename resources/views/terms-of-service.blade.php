@extends('layouts.landing')

@section('title', 'Terms of Service | Attendance Machine')
@section('meta_description', 'Review the Terms of Service and guidelines for using the Attendance Machine software, mobile scanner apps, and cloud platform.')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-16 space-y-8">
    <div class="space-y-2">
        <span class="bg-violet-50 text-violet-700 text-[10px] font-black px-2.5 py-1 rounded-full uppercase tracking-wider">Compliance</span>
        <h1 class="font-outfit text-3xl sm:text-4xl font-black text-slate-900">Terms of Service</h1>
        <p class="text-slate-405 text-xs">Last Updated: July 14, 2026</p>
    </div>

    <div class="prose text-xs sm:text-sm text-slate-600 leading-relaxed space-y-6">
        <p>Welcome to Attendance Machine. By accessing or using our cloud platform, mobile applications, or biometric face kiosks, you agree to comply with and be bound by the following terms.</p>
        
        <h2>1. Services Provided</h2>
        <p>Attendance Machine provides cloud-based attendance logging, employee shift planning, geofenced GPS verification, and payroll calculation tools developed by Leena IT Solutions.</p>
        
        <h2>2. Data Privacy & Consent</h2>
        <p>By registering employee face signatures or coordinate logs, you warrant that you have obtained explicit consent from your workforce to process their biometrics and locations for corporate auditing purposes.</p>
        
        <h2>3. Subscription Fees</h2>
        <p>Certain components require active, paid subscription packages. Subscriptions auto-renew unless cancelled at least 24 hours prior to the next billing cycle.</p>
        
        <h2>4. Governing Law</h2>
        <p>These terms shall be governed by and construed in accordance with the laws of India, under the jurisdiction of the courts of Maharashtra.</p>
    </div>
</section>
@endsection
