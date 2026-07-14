<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. What is Face Recognition Attendance?
        BlogPost::updateOrCreate(
            ['slug' => 'what-is-face-recognition-attendance'],
            [
                'title' => 'What is Face Recognition Attendance?',
                'category' => 'AI Technology',
                'read_time' => '5 Min Read',
                'excerpt' => 'An in-depth guide to how AI-driven face biometric verification maps unique facial signatures to record daily check-in logs and prevent roster fraud.',
                'cover_gradient' => 'from-violet-500 to-indigo-500',
                'content' => '
                    <p class="lead">Face recognition attendance is a modern, contactless biometric system that uses artificial intelligence to identify and verify employees as they check in and out of their workspaces.</p>
                    
                    <h2>How It Works</h2>
                    <p>Instead of relying on swipe cards, PINs, or physical fingerprint scanners, face recognition attendance systems capture an image or video of the employee\'s face. Advanced computer vision algorithms, such as ArcFace or FaceNet, analyze key facial landmarks (the distance between eyes, nose bridge shape, jawline angle) and map them into a unique 512-bit mathematical vector. This vector is then matched against the registered templates in the database.</p>
                    
                    <h2>Key Benefits of Face Recognition Attendance</h2>
                    <ul>
                        <li><strong>100% Touchless and Hygienic:</strong> Especially important in the post-pandemic era, touchless verification avoids spreading germs on shared surfaces.</li>
                        <li><strong>Prevents Buddy Punching:</strong> Because a worker cannot duplicate another person\'s face, proxy attendance check fraud is completely eliminated.</li>
                        <li><strong>Under 2-Second Scans:</strong> Reduces queues at company gates during shift turnarounds.</li>
                        <li><strong>Hardware-Agnostic:</strong> Works on standard tablets, smartphones, and computers equipped with standard front cameras.</li>
                    </ul>
                    
                    <h2>Future Trends</h2>
                    <p>As deep learning models continue to evolve, face matching is becoming faster and more resilient. Modern systems include <strong>liveness checks</strong> that detect whether a live person is standing in front of the scanner, rendering photos or video spoofs completely ineffective.</p>
                '
            ]
        );

        // 2. Best Attendance Software in India
        BlogPost::updateOrCreate(
            ['slug' => 'best-attendance-software-in-india'],
            [
                'title' => 'Best Attendance Software in India',
                'category' => 'HR Operations',
                'read_time' => '7 Min Read',
                'excerpt' => 'A comprehensive review of the top workforce attendance tracking applications in India, focusing on localization, payroll sync, and cost-effectiveness.',
                'cover_gradient' => 'from-emerald-500 to-teal-500',
                'content' => '
                    <p class="lead">Managing rosters across massive, distributed workforces in India requires robust software that integrates local compliance rules, flexible shift templates, and automated Loss of Pay (LOP) calculations.</p>
                    
                    <h2>What Makes Software the "Best" for Indian Enterprises?</h2>
                    <p>Indian businesses, particularly in manufacturing, retail, and education, operate with unique constraints. The ideal solution must offer:</p>
                    <ul>
                        <li><strong>Automated LOP Deduction Rules:</strong> Configurable rules for late buffer grace periods, early sign-out limits, and half-day absence deductions.</li>
                        <li><strong>Offline Capabilities:</strong> Support for remote areas, warehouse basements, and rural construction sites with poor network coverage.</li>
                        <li><strong>Indian Financial Compliance:</strong> Easy export format mappings for local accounting software like Tally, SAP, and local payroll matrices.</li>
                        <li><strong>Mobile-First Interface:</strong> Ease of use for field workers, supervisors, and on-site staff.</li>
                    </ul>
                    
                    <h2>Why Attendance Machine Leads the Pack</h2>
                    <p>Designed specifically by Leena IT Solutions, <strong>Attendance Machine</strong> provides Indian businesses with a premium, low-cost face biometric kiosk system. It features high-speed verification, GPS boundaries geofencing limits, active Excel exports formulas, and developer APIs to connect directly with your payroll ERP.</p>
                '
            ]
        );

        // 3. Fingerprint vs Face Recognition
        BlogPost::updateOrCreate(
            ['slug' => 'fingerprint-vs-face-recognition'],
            [
                'title' => 'Fingerprint vs Face Recognition',
                'category' => 'Security & Hardware',
                'read_time' => '6 Min Read',
                'excerpt' => 'A detailed comparison of biometric scanners: analyzing speed, hygiene, upkeep costs, verification accuracy, and buddy-punching prevention.',
                'cover_gradient' => 'from-amber-500 to-orange-500',
                'content' => '
                    <p class="lead">Choosing the right biometric tech for your organization is crucial. Let\'s break down how traditional fingerprint scanners compare against modern AI face recognition kiosks.</p>
                    
                    <h2>Detailed Feature Comparison</h2>
                    <table class="w-full text-left text-xs border-collapse border border-slate-200 mt-4 mb-6">
                        <thead>
                            <tr class="bg-slate-100 font-bold">
                                <th class="p-3 border border-slate-200">Metric</th>
                                <th class="p-3 border border-slate-200">Fingerprint Scanners</th>
                                <th class="p-3 border border-slate-200">Face Recognition Kiosks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-3 border border-slate-200 font-bold">Hygiene Level</td>
                                <td class="p-3 border border-slate-200">Low (requires physical contact)</td>
                                <td class="p-3 border border-slate-200 text-emerald-600 font-bold">High (100% contactless)</td>
                            </tr>
                            <tr>
                                <td class="p-3 border border-slate-200 font-bold">Upkeep Cost</td>
                                <td class="p-3 border border-slate-200">High (specialized biometric hardware)</td>
                                <td class="p-3 border border-slate-200 text-emerald-600 font-bold">Low (runs on standard tablets)</td>
                            </tr>
                            <tr>
                                <td class="p-3 border border-slate-200 font-bold">Dirty Hands Resiliency</td>
                                <td class="p-3 border border-slate-200">Fail rate spikes with grease or dust</td>
                                <td class="p-3 border border-slate-200 text-emerald-600 font-bold">100% resilient (scans face lines)</td>
                            </tr>
                            <tr>
                                <td class="p-3 border border-slate-200 font-bold">Buddy Punch Protection</td>
                                <td class="p-3 border border-slate-200">Good</td>
                                <td class="p-3 border border-slate-200 text-emerald-600 font-bold">Excellent (integrated liveness checks)</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <h2>The Verdict</h2>
                    <p>While fingerprint systems were the industry standard for a decade, they suffer from mechanical wear-and-tear, dirt failures, and sanitation concerns. Modern AI face recognition kiosks offer a cleaner, faster, and more affordable alternative by utilizing existing consumer hardware like tablets and mobile phones.</p>
                '
            ]
        );

        // 4. Attendance Software for Schools
        BlogPost::updateOrCreate(
            ['slug' => 'attendance-software-for-schools'],
            [
                'title' => 'Attendance Software for Schools',
                'category' => 'Education',
                'read_time' => '5 Min Read',
                'excerpt' => 'How schools and universities leverage contactless biometric check-ins to secure campus gates, track faculty hours, and send parent notifications.',
                'cover_gradient' => 'from-rose-500 to-pink-500',
                'content' => '
                    <p class="lead">Educational institutions require a unique mix of speed, reliability, and security when managing student registries and teacher schedules.</p>
                    
                    <h2>Key Challenges in Schools</h2>
                    <p>Roll calls consume valuable teaching time, and managing teacher rotational shifts or proxy check-ins remains difficult in manual log setups.</p>
                    
                    <h2>How AI Attendance System Solves This</h2>
                    <ul>
                        <li><strong>Gate Check Security:</strong> Mount tablets at campus gates to verify student entrance coordinates and times.</li>
                        <li><strong>Automated Alerts to Parents:</strong> Set up webhooks to dispatch automated notifications (SMS, WhatsApp, email) to parents as soon as students check in or check out.</li>
                        <li><strong>Faculty Lecture Scheduling:</strong> Log teaching hours, rotating shift templates, overtime adjustments, and substitute teacher coverages.</li>
                        <li><strong>Safe Biometrics:</strong> Convert face data into abstract vectors without saving photos locally to protect student privacy.</li>
                    </ul>
                '
            ]
        );

        // 5. Attendance Software for Hospitals
        BlogPost::updateOrCreate(
            ['slug' => 'attendance-software-for-hospitals'],
            [
                'title' => 'Attendance Software for Hospitals',
                'category' => 'Healthcare',
                'read_time' => '6 Min Read',
                'excerpt' => 'Managing 24/7 rotational shifts for nurses and doctors, tracking consultant hours, and keeping clinical entrances sterile using contactless kiosks.',
                'cover_gradient' => 'from-indigo-500 to-blue-500',
                'content' => '
                    <p class="lead">Hospitals operate 24 hours a day, 7 days a week, demanding high roster precision and strict sanitization guidelines.</p>
                    
                    <h2>rotational Shift Overlaps</h2>
                    <p>Clinics coordinate complex rotational shifts (morning, evening, emergency night templates, consult slots) across doctor categories, nurses, technicians, and administrative teams. Tracking these manually or with swipe cards leads to payroll calculation errors.</p>
                    
                    <h2>The Hygiene Imperative</h2>
                    <p>In medical settings, touchless interfaces are a necessity. Traditional fingerprint scanners act as vectors for pathogen transmission. AI face match kiosks keep doctors and clinical staff safe, contact-free, and moving rapidly through checkpoints.</p>
                    
                    <h2>Tracking Visiting Consultants</h2>
                    <p>Hospitals can register visiting specialists and compute their precise logged hours dynamically, simplifying accountant fee calculations and ledger allocations.</p>
                '
            ]
        );
    }
}
