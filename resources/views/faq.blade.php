@extends('layouts.landing')

@section('title', 'Frequently Asked Questions | Attendance Machine')
@section('meta_description', 'Have questions about face recognition security, LOP deductions, or subscriptions? Find comprehensive answers in our FAQ catalog.')

@section('content')
<!-- ===== HERO TITLE SECTION ===== -->
<section class="max-w-7xl mx-auto px-6 pt-16 pb-8 relative">
    <div class="absolute inset-0 bg-gradient-to-tr from-violet-500/5 to-indigo-500/5 -z-10 rounded-3xl blur-2xl"></div>
    <div class="text-center space-y-4 max-w-3xl mx-auto">
        <div class="inline-flex items-center gap-2 bg-violet-50 border border-violet-100 px-4 py-1 rounded-full text-[11px] font-bold text-violet-700 uppercase tracking-widest">
            Answers Hub
        </div>
        <h1 class="font-outfit text-4xl sm:text-5xl font-black text-slate-900 leading-tight">
            Frequently Asked Questions <br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-violet-600 to-indigo-600">And Support Guide Catalog</span>
        </h1>
        <p class="text-slate-500 text-sm max-w-xl mx-auto">
            Can't find what you are looking for? Learn about biometric security, shift templates, integration steps, and account setups here.
        </p>
    </div>
</section>

<!-- ===== FAQ LIST & SEARCH CATEGORY ===== -->
<section class="max-w-4xl mx-auto px-6 py-12 space-y-8">
    <!-- Search Bar -->
    <div class="relative bg-white border border-slate-150 rounded-2xl shadow-sm p-2 flex items-center">
        <i class="fa-solid fa-magnifying-glass text-slate-400 pl-3 text-sm"></i>
        <input type="text" id="faq-search" oninput="filterFaq()" placeholder="Search questions, keywords (e.g. 'Biometric', 'Salary')..." class="w-full px-3 py-2 text-xs bg-transparent border-0 focus:outline-none text-slate-800">
    </div>

    <!-- FAQ Accordion Catalog -->
    <div class="space-y-4" id="faq-catalog">
        <!-- FAQ 1 -->
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>How does face recognition attendance work?</span>
                <i class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-200"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Attendance Machine uses advanced AI face models to identify registered staff in under 2 seconds. When setting up, you take a profile picture of the employee. During daily check-ins, the app records their image, validates facial details against the stored abstract signature vector, and registers their presence.
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Is employee face biometric data secure?</span>
                <i class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-200"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Absolutely. We do not store raw, reconstructable photos on devices for face verification. The AI compiles the facial outline parameters into a 512-float mathematical vector signature. This signature cannot be reverse-engineered back into a picture.
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>What happens to attendance logs if a device goes offline?</span>
                <i class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-200"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Attendance Machine operates 100% offline. If the device loses internet access, punches are securely logged to the device's internal storage and synced automatically once connection is restored.
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Can the app compute Loss of Pay (LOP) calculations automatically?</span>
                <i class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-200"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. Inside the administrator dashboard, you define late buffer tolerances and shift parameters. The app identifies tardy punch logs and computes half-day or late deductions (e.g. 0.25 LOP for third late mark), streamlining Excel payroll registers.
            </div>
        </div>

        <!-- FAQ 5 -->
        <div class="faq-item bg-white border border-slate-100 rounded-2xl p-4 transition-all">
            <button onclick="toggleFaq(this)" class="faq-toggle w-full flex items-center justify-between text-left text-xs font-extrabold text-slate-900 focus:outline-none">
                <span>Does this replace standard biometric fingerprint machines?</span>
                <i class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-200"></i>
            </button>
            <div class="faq-answer hidden text-[11px] text-slate-600 mt-3 pt-3 border-t border-slate-50 leading-relaxed">
                Yes. Fingerprint systems are high cost, prone to dust contamination on construction sites or factories, and require complex installation. Attendance Machine utilizes standard cameras on consumer phones, removing expensive terminal maintenance.
            </div>
        </div>
    </div>
</section>

@section('scripts')
<script>
    function filterFaq() {
        const query = document.getElementById('faq-search').value.toLowerCase();
        const items = document.querySelectorAll('.faq-item');

        items.forEach(item => {
            const question = item.querySelector('.faq-toggle span').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer').textContent.toLowerCase();

            if (question.includes(query) || answer.includes(query)) {
                item.style.display = "block";
            } else {
                item.style.display = "none";
            }
        });
    }
</script>
@endsection
@endsection
