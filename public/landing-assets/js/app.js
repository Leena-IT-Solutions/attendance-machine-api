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

    function updateCalculator() {
        if (!employeeSlider) return;

        const count = parseInt(employeeSlider.value);
        employeeCountVal.textContent = count;

        let ratePerEmployee = 5; // Default ₹5 per employee per month
        let cycleText = 'monthly';

        if (billingCycle === 'yearly') {
            ratePerEmployee = 4; // 20% discount: ₹4 per employee per month
            cycleText = 'annually';
        }

        const totalCost = count * ratePerEmployee;
        priceCalculated.textContent = `₹${totalCost}`;

        if (billingCycle === 'yearly') {
            pricingPeriod.innerHTML = '/ month <span style="display:block; font-size:10px; color:#94a3b8; font-weight:bold; margin-top:2px;">Billed ₹' + (totalCost * 12).toLocaleString() + ' annually</span>';
            pricingDetailsSummary.textContent = `Based on ₹4 per employee per month (Save 20% on Annual plan).`;
            savingsBadge.textContent = '₹4/employee';
            savingsBadge.className = 'text-xs font-bold text-violet-600 bg-violet-50 border border-violet-100 px-3 py-1.5 rounded-full';
        } else {
            pricingPeriod.innerHTML = '/ month';
            pricingDetailsSummary.textContent = `Based on ₹5 per employee per month.`;
            savingsBadge.textContent = '₹5/employee';
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
});
