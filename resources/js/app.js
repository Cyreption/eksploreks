import 'bootstrap';

// Author: Hafizhan Yusra Sulistyo (5026231060)

document.addEventListener('DOMContentLoaded', function () {
    // Lazy load images
    const images = document.querySelectorAll('img');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src || img.src;
                observer.unobserve(img);
            }
        });
    });
    images.forEach(img => {
        if (img.getAttribute('src').includes('placeholder')) {
            img.dataset.src = img.src;
            img.src = 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==';
            observer.observe(img);
        }
    });
});