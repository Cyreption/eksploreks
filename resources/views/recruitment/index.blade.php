@extends('layouts.app')

@section('title', 'Recruitment')

@section('content')
<!-- Header — Tombol back jadi lingkaran ungu tua + panah putih, judul tetap di tengah -->
<div class="bg-purple-light text-black">
    <div class="container py-4 position-relative">
        <div class="d-flex align-items-center justify-content-center position-relative">

            <!-- Tombol Back: Lingkaran #70539A + panah putih -->
            <a href="javascript:history.back()" 
               class="position-absolute start-0 d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
               style="background-color: #70539A; width: 44px; height: 44px; left: 12px; z-index: 10;">
                <i class="bi bi-arrow-left fs-4"></i>
            </a>

            <!-- Judul Recruitment — tetap di tengah & tebal -->
            <h5 class="mb-0 fw-bold">Recruitment</h5>

            <!-- Logo di kanan (tetap seperti semula) -->
            <div class="position-absolute end-0" style="right: 12px;">
                <img src="{{ asset('logo.png') }}" alt="Logo" width="33" height="44">
            </div>
        </div>
    </div>
</div>

<div class="container py-4 pb-6">

    <!-- Search Bar warna ungu muda (sama persis header) -->
    <div class="mb-5">
        <div class="position-relative d-inline-block w-100">
            <!-- Input -->
            <input type="text"
                   id="searchInput"
                   class="form-control rounded-pill border-0 shadow-sm py-3 bg-purple-light text-white placeholder-white fw-medium pe-5"
                   placeholder="Search ..."
                   style="height: 56px; padding-left: 20px; padding-right: 50px !important;">

            <!-- Icon search di KANAN DALAM -->
            <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y text-white pe-4"></i>
        </div>
    </div>

    <!-- List Recruitment — Ukuran gambar 375×182 px, responsive sempurna! -->
    <div class="d-flex flex-column gap-4" id="recruitmentList">
        @forelse($recruitments as $recruitment)
            <a href="{{ route('recruitment.show', $recruitment) }}" class="d-block text-decoration-none position-relative">
                <!-- Gambar thumbnail — otomatis dari database, responsive, fallback placeholder -->
                <div class="rounded-3 overflow-hidden shadow-lg" style="aspect-ratio: 375/182;">
                    <img src="{{ $recruitment->image ? asset($recruitment->image) : 'https://via.placeholder.com/375x182/9333ea/ffffff?text=RECRUITMENT' }}"
                         class="w-100 h-100"
                         style="object-fit: cover;"
                         alt="{{ $recruitment->title }}">
                </div>

                <div class="d-flex align-items-center justify-content-between bg-purple-light text-white px-4 py-4 -mt-4 rounded-bottom-3" style="z-index: 2;">
                    <span class="fw-bold fs-5">{{ $recruitment->title }}</span>
                    <div class="d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
                         style="background-color: #70539A; width: 46px; height: 46px; min-width: 46px;">
                        <i class="bi bi-chevron-right fs-4"></i>
                    </div>
                </div>
            </a>
        @empty
            <div class="alert alert-info text-center">
                <p class="mb-0">Tidak ada recruitment yang tersedia saat ini</p>
            </div>
        @endforelse
    </div>

</div>
@endsection

@push('scripts')
<style>
    /* Warna placeholder search */
    .placeholder-purple::placeholder {
        color: #9333ea !important;
        opacity: 0.8;
    }

    /* Hover card */
    .shadow-sm:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(147,51,234,0.25) !important;
        transition: all 0.25s ease;
    }

    .placeholder-white::placeholder {
        color: rgba(255, 255, 255, 0.7) !important;
    }

    /* Responsive gambar thumbnail */
    .rounded-3 {
        transition: all 0.3s ease;
    }

    .rounded-3:hover {
        transform: scale(1.02);
    }

    @media (max-width: 576px) {
        .fs-5 {
            font-size: 1.25rem !important;
        }
    }
</style>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const items = document.querySelectorAll('#recruitmentList a');
        
        items.forEach(item => {
            const title = item.querySelector('.fw-bold').textContent.toLowerCase();
            if (title.includes(searchValue)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
@endpush