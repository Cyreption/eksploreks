@props([
    'banners' => [],
    'autorotate' => true,
    'interval' => 5000,
    'height' => '300px'
])

<style>
    @media (max-width: 576px) {
        .banner-carousel-container {
            height: 250px !important;
        }
    }
    
    @media (min-width: 577px) and (max-width: 992px) {
        .banner-carousel-container {
            height: 350px !important;
        }
    }
    
    @media (min-width: 993px) {
        .banner-carousel-container {
            height: 420px !important;
        }
    }
</style>

<div class="banner-carousel-container" style="height: {{ $height }}; position: relative; overflow: hidden; border-radius: 0.75rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
    <div class="banner-carousel" style="position: relative; width: 100%; height: 100%;">
        @if(count($banners) > 0)
            @foreach($banners as $index => $banner)
                <div class="banner-slide" style="
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    opacity: {{ $index === 0 ? '1' : '0' }};
                    transition: opacity 0.8s ease-in-out;
                    top: 0;
                    left: 0;
                    z-index: {{ $index === 0 ? '1' : '0' }};
                    background-image: url('{{ asset('uploads/banner/' . $banner) }}');
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                " data-slide="{{ $index }}">
                </div>
            @endforeach

            @if(count($banners) > 1)
                <!-- Navigation Dots -->
                <div style="position: absolute; bottom: 15px; left: 50%; transform: translateX(-50%); display: flex; gap: 8px; z-index: 10;">
                    @foreach($banners as $index => $banner)
                        <button class="banner-dot" data-slide="{{ $index }}" style="
                            width: 10px;
                            height: 10px;
                            border-radius: 50%;
                            border: none;
                            background-color: {{ $index === 0 ? 'rgba(255,255,255,0.9)' : 'rgba(255,255,255,0.5)' }};
                            cursor: pointer;
                            transition: all 0.3s ease;
                        "></button>
                    @endforeach
                </div>

                <!-- Navigation Arrows -->
                <button class="banner-prev" style="
                    position: absolute;
                    left: 15px;
                    top: 50%;
                    transform: translateY(-50%);
                    z-index: 5;
                    background-color: rgba(0,0,0,0.5);
                    color: white;
                    border: none;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 20px;
                    transition: all 0.3s ease;
                ">
                    <i class="bi bi-chevron-left"></i>
                </button>

                <button class="banner-next" style="
                    position: absolute;
                    right: 15px;
                    top: 50%;
                    transform: translateY(-50%);
                    z-index: 5;
                    background-color: rgba(0,0,0,0.5);
                    color: white;
                    border: none;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 20px;
                    transition: all 0.3s ease;
                ">
                    <i class="bi bi-chevron-right"></i>
                </button>
            @endif
        @else
            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 100%); display: flex; align-items: center; justify-content: center; color: #9333ea;">
                <div style="text-align: center;">
                    <i class="bi bi-image" style="font-size: 48px; margin-bottom: 10px;"></i>
                    <p>Banner not available</p>
                </div>
            </div>
        @endif
    </div>
</div>

<style>
    .banner-prev:hover, .banner-next:hover {
        background-color: rgba(0,0,0,0.8) !important;
        transform: translateY(-50%) scale(1.1);
    }

    .banner-dot:hover {
        background-color: rgba(255,255,255,0.8) !important;
        transform: scale(1.2);
    }

    .banner-dot.active {
        background-color: rgba(255,255,255,0.95) !important;
        width: 12px;
        height: 12px;
    }
</style>

@if($autorotate && count($banners) > 1)
<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.banner-carousel');
    const slides = document.querySelectorAll('.banner-slide');
    const dots = document.querySelectorAll('.banner-dot');
    const prevBtn = document.querySelector('.banner-prev');
    const nextBtn = document.querySelector('.banner-next');
    
    let currentSlide = 0;
    let autoRotateInterval;

    const showSlide = (index) => {
        // Update slides
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.style.opacity = '1';
                slide.style.zIndex = '1';
            } else {
                slide.style.opacity = '0';
                slide.style.zIndex = '0';
            }
        });

        // Update dots
        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });

        currentSlide = index;
    };

    const nextSlide = () => {
        const next = (currentSlide + 1) % slides.length;
        showSlide(next);
        resetAutoRotate();
    };

    const prevSlide = () => {
        const prev = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prev);
        resetAutoRotate();
    };

    const startAutoRotate = () => {
        autoRotateInterval = setInterval(() => {
            nextSlide();
        }, {{ $interval }});
    };

    const resetAutoRotate = () => {
        clearInterval(autoRotateInterval);
        startAutoRotate();
    };

    // Event listeners
    prevBtn?.addEventListener('click', prevSlide);
    nextBtn?.addEventListener('click', nextSlide);

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            resetAutoRotate();
        });
    });

    // Start auto rotation
    startAutoRotate();
});
</script>
@endif
