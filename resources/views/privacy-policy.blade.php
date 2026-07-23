@extends('layouts.landing')

@section('title', 'Privacy Policy | Attendance Machine')
@section('meta_description', 'Learn how Attendance Machine safeguards biometric face signatures and employee identity records in compliance with data privacy standards.')

@section('content')
<section class="max-w-4xl mx-auto px-6 py-16 space-y-8">
    <div class="space-y-2">
        <span class="bg-violet-50 text-violet-700 text-[10px] font-black px-2.5 py-1 rounded-full uppercase tracking-wider">Compliance</span>
        <h1 class="font-outfit text-3xl sm:text-4xl font-black text-slate-900">Privacy Policy</h1>
        <p class="text-slate-405 text-xs">Last Updated: May 2026</p>
    </div>

    <div class="prose text-xs sm:text-sm text-slate-600 leading-relaxed space-y-6">
        <p>At Attendance Machine, we value your privacy above all else. This Privacy Policy outlines how the <strong>Attendance Machine App</strong> (the "Application") collects, uses, and safeguards biometric face signatures and employee identity records.</p>
        
        <h2>1. Biometric Data Processing</h2>
        <p>The Application is built with state-of-the-art secure intelligence designed to keep your facial information secure:</p>
        <ul class="list-disc pl-5 space-y-2 text-slate-550">
            <li><strong>Secure Server-Side Processing:</strong> The Application uploads the employee's enrollment photo securely to the organization's private central server via encrypted channels. It does not stream, broadcast, or store real-time video frames.</li>
            <li><strong>On-Device Face Alignment:</strong> When registering, Google ML Kit operates locally on your mobile device to detect face presence, alignment, and angles.</li>
            <li><strong>Mathematical Signature (512 Floats):</strong> Facial features are compiled into a highly abstract 512-dimensional floating-point vector (face signature) on the organization's secure server using an ArcFace neural model. It is mathematically impossible to reconstruct the original face image from this signature.</li>
            <li><strong>No Third-Party Sharing:</strong> We do not share, sell, or disclose face signatures or profile photos with any third parties, advertisers, or external networks. All data remains strictly within your organization's private portal.</li>
        </ul>
        
        <h2>2. Information We Collect</h2>
        <p>To ensure precise identity verification and attendance tracking, we collect and store:</p>
        <ul class="list-disc pl-5 space-y-2 text-slate-550">
            <li>Employee Full Name</li>
            <li>Employee Code or ID</li>
            <li>Employee Profile Photo (stored securely on the organization’s private server)</li>
            <li>Synchronized 512-float mathematical face signatures</li>
            <li>Timestamp logs of recorded presence at the Kiosk terminal</li>
        </ul>

        <h2>3. Data Security</h2>
        <p>We protect synchronized records through industry-standard administrative and technological safeguards:</p>
        <ul class="list-disc pl-5 space-y-2 text-slate-550">
            <li>All data synchronization happens over secure, encrypted HTTPS channels.</li>
            <li>Central portal console access requires secure administrative authentication and is restricted to designated personnel.</li>
            <li>Local device biometrics must be authenticated by the administrator before adding or rescanning any face signature.</li>
        </ul>

        <h2>4. Data Control & Deletion</h2>
        <p>You retain full control over your identity records. Employees may request the modification or removal of their profile at any time. When an administrator purges an employee record from the portal console, all corresponding mathematical face signatures, profile photos, and logs are permanently deleted from both local storage caches and the central database.</p>

        <h2>5. Contact Us</h2>
        <p>If you have any questions or feedback regarding the Application's face biometrics security or privacy practices, please contact your organization's IT Administration Desk or email us at <a href="mailto:leenaitsolutions@gmail.com" class="text-violet-650 font-bold">leenaitsolutions@gmail.com</a>.</p>
    </div>

    <!-- Footer Accent -->
    <div class="pt-8 border-t border-slate-100 text-center">
        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">
            Attendance Machine Security Certified
        </span>
    </div>
</section>
@endsection
