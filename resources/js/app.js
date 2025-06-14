import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import AOS from 'aos';
import 'aos/dist/aos.css';

// Initialize AOS setelah DOM ready
document.addEventListener('DOMContentLoaded', function() {
    AOS.init({
        duration: 800,
        easing: 'ease-out',
        once: true,
        mirror: false,
        offset: 120,
        disable: 'mobile' // Disable di mobile seperti yang kamu mau
    });
});

// Refresh AOS saat navigasi (untuk SPA behavior)
document.addEventListener('turbo:load', function() {
    AOS.refresh();
});

// Optional: Refresh AOS saat window resize
window.addEventListener('resize', function() {
    AOS.refresh();
});
