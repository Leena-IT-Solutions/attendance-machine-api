@extends('layouts.landing')

@section('title', 'Refund Policy | Attendance Machine')
@section('meta_description', 'Review the Refund Policy and details regarding subscription cancellations, trial periods, and account billing for Attendance Machine.')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-16 space-y-8">
    <div class="space-y-2">
        <span class="bg-violet-50 text-violet-700 text-[10px] font-black px-2.5 py-1 rounded-full uppercase tracking-wider">Compliance</span>
        <h1 class="font-outfit text-3xl sm:text-4xl font-black text-slate-900">Refund Policy</h1>
        <p class="text-slate-405 text-xs">Last Updated: July 14, 2026</p>
    </div>

    <div class="prose text-xs sm:text-sm text-slate-600 leading-relaxed space-y-6">
        <p>At Attendance Machine, we strive to ensure our customers are completely satisfied with their workforce management subscriptions.</p>
        
        <h2>1. Trial Period</h2>
        <p>We provide a 14-day free trial tier for new workspaces to evaluate all premium features, biometric kiosks, and API endpoints before any payment is processed.</p>
        
        <h2>2. Subscription Refunds</h2>
        <p>Refund requests are accepted within 7 days of the initial purchase date. Renewal payments are non-refundable, but you can cancel the subscription at any time to prevent future billing cycles.</p>
        
        <h2>3. Support & Assistance</h2>
        <p>If you experience setup challenges or sync failures, please contact our support team at <a href="mailto:leenaitsolutions@gmail.com" class="text-violet-650 font-bold">leenaitsolutions@gmail.com</a> before requesting refunds.</p>
    </div>
</section>
@endsection
