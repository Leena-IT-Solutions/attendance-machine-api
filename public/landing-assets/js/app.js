document.addEventListener('DOMContentLoaded', () => {
    // ===== MOBILE MENU TOGGLE =====
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', () => {
            const isOpen = !mobileMenu.classList.contains('hidden');
            if (isOpen) {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('fa-xmark');
                menuIcon.classList.add('fa-bars');
            } else {
                mobileMenu.classList.remove('hidden');
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-xmark');
            }
        });
    }

    // Window menu close helper
    window.toggleMenu = () => {
        if (mobileMenu) {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('fa-xmark');
            menuIcon.classList.add('fa-bars');
        }
    };

    // ===== VIDEO DEMO MODAL =====
    const watchDemoBtn = document.getElementById('btn-watch-demo');
    const videoModal = document.getElementById('video-modal');
    const modalClose = document.getElementById('modal-close');

    const modalPlayBtn = document.getElementById('modal-play-btn');
    const modalCover = document.getElementById('modal-cover');
    const modalIframe = document.getElementById('modal-iframe');

    if (watchDemoBtn && videoModal && modalClose) {
        watchDemoBtn.addEventListener('click', () => {
            videoModal.classList.remove('hidden');
        });

        const resetPlayer = () => {
            videoModal.classList.add('hidden');
            if (modalIframe) {
                modalIframe.src = "";
                modalIframe.classList.add('hidden');
            }
            if (modalCover) {
                modalCover.classList.remove('hidden');
            }
        };

        modalClose.addEventListener('click', resetPlayer);

        // Close on clicking overlay background
        videoModal.addEventListener('click', (e) => {
            if (e.target === videoModal) {
                resetPlayer();
            }
        });
    }

    if (modalPlayBtn && modalCover && modalIframe) {
        modalPlayBtn.addEventListener('click', () => {
            modalCover.classList.add('hidden');
            modalIframe.classList.remove('hidden');
            // Play public face recognition/biometric time tracking demo video
            modalIframe.src = "https://www.youtube.com/embed/S2pE48-i8i8?autoplay=1&enablejsapi=1&rel=0";
        });
    }

    // ===== PRICING CALCULATOR =====
    const employeeSlider = document.getElementById('employee-slider');
    const employeeCountVal = document.getElementById('employee-count-val');
    const priceCalculated = document.getElementById('price-calculated');
    const pricingPeriod = document.getElementById('pricing-period');
    const pricingDetailsSummary = document.getElementById('pricing-details-summary');
    const savingsBadge = document.getElementById('savings-badge');
    
    const billingMonthly = document.getElementById('billing-monthly');
    const billingYearly = document.getElementById('billing-yearly');

    let billingCycle = 'monthly'; // 'monthly' or 'yearly'

    const tiers = [
        { count: '5', label: 'Up to 5 Staff', monthly: 25, yearly: 250 },
        { count: '10', label: 'Up to 10 Staff', monthly: 50, yearly: 500 },
        { count: '20', label: 'Up to 20 Staff', monthly: 100, yearly: 1000 },
        { count: '50', label: 'Up to 50 Staff', monthly: 250, yearly: 2500 },
        { count: '100', label: 'Up to 100 Staff', monthly: 500, yearly: 5000 },
        { count: 'Unlimited', label: 'Unlimited Staff', monthly: 1000, yearly: 10000 }
    ];

    function updateCalculator() {
        if (!employeeSlider) return;

        const index = parseInt(employeeSlider.value);
        const currentTier = tiers[index];

        employeeCountVal.textContent = currentTier.count;

        if (billingCycle === 'yearly') {
            priceCalculated.textContent = `₹${currentTier.yearly}`;
            pricingPeriod.innerHTML = '/ year';
            pricingDetailsSummary.textContent = `Flat rate for ${currentTier.label.toLowerCase()} loaded with all features.`;
            savingsBadge.textContent = '2 Months Free';
            savingsBadge.className = 'text-xs font-bold text-violet-600 bg-violet-50 border border-violet-100 px-3 py-1.5 rounded-full';
        } else {
            priceCalculated.textContent = `₹${currentTier.monthly}`;
            pricingPeriod.innerHTML = '/ month';
            pricingDetailsSummary.textContent = `Flat rate for ${currentTier.label.toLowerCase()} loaded with all features.`;
            savingsBadge.textContent = 'Best Value';
            savingsBadge.className = 'text-xs font-bold text-emerald-600 bg-emerald-50 border border-emerald-100 px-3 py-1.5 rounded-full';
        }
    }

    if (employeeSlider) {
        employeeSlider.addEventListener('input', updateCalculator);
    }

    if (billingMonthly && billingYearly) {
        billingMonthly.addEventListener('click', () => {
            billingCycle = 'monthly';
            billingMonthly.className = 'px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 bg-white text-slate-900 shadow-sm';
            billingYearly.className = 'px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 text-slate-550 hover:text-slate-900 flex items-center gap-1.5';
            updateCalculator();
        });

        billingYearly.addEventListener('click', () => {
            billingCycle = 'yearly';
            billingYearly.className = 'px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 bg-white text-slate-900 shadow-sm flex items-center gap-1.5';
            billingMonthly.className = 'px-4 py-2 text-xs font-bold rounded-lg transition-all duration-200 text-slate-555 hover:text-slate-900';
            updateCalculator();
        });
    }

    // Initial calculator load
    updateCalculator();

    // ===== FAQ ACCORDION =====
    window.toggleFaq = (button) => {
        const faqItem = button.parentElement;
        const answer = faqItem.querySelector('.faq-answer');
        const icon = button.querySelector('i');

        if (answer.classList.contains('hidden')) {
            // Close all other open FAQs
            document.querySelectorAll('.faq-item').forEach(item => {
                const otherAnswer = item.querySelector('.faq-answer');
                const otherIcon = item.querySelector('.faq-toggle i');
                if (otherAnswer && !otherAnswer.classList.contains('hidden')) {
                    otherAnswer.classList.add('hidden');
                    if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                    item.classList.remove('ring-1', 'ring-violet-200');
                }
            });

            // Open clicked FAQ
            answer.classList.remove('hidden');
            icon.style.transform = 'rotate(180deg)';
            faqItem.classList.add('ring-1', 'ring-violet-200');
        } else {
            // Close clicked FAQ
            answer.classList.add('hidden');
            icon.style.transform = 'rotate(0deg)';
            faqItem.classList.remove('ring-1', 'ring-violet-200');
        }
    };
});
