@extends('layouts.app')

@section('title', 'Detail Recruitment')

@section('content')
<!-- Header — 100% SAMA dengan index.blade.php kamu -->
<div class="bg-purple-light text-black">
    <div class="container py-4 position-relative">
        <div class="d-flex align-items-center justify-content-center position-relative">

            <!-- Tombol Back: Lingkaran #70539A + panah putih -->
            <a href="javascript:history.back()" 
               class="position-absolute start-0 d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
               style="background-color: #70539A; width: 44px; height: 44px; left: 12px; z-index: 10;">
                <i class="bi bi-arrow-left fs-4"></i>
            </a>

            <!-- Judul tetap di tengah -->
            <h5 class="mb-0 fw-bold">Detail Recruitment</h5>

            <!-- Logo di kanan -->
            <div class="position-absolute end-0" style="right: 12px;">
                <img src="{{ asset('logo.png') }}" alt="Logo" width="33" height="44">
            </div>
        </div>
    </div>
</div>

<div class="container py-4 pb-6">

    <!-- Banner besar — pakai gambar dari database, responsive full width -->
    <div class="rounded-3 overflow-hidden shadow-lg mb-5" style="aspect-ratio: 375/182;">
        <img src="{{ $recruitment->image ? asset($recruitment->image) : 'https://via.placeholder.com/375x182/9333ea/ffffff?text=RECRUITMENT' }}" 
             class="w-100 h-100 rounded-3"
             style="object-fit: cover;" alt="{{ $recruitment->title }}">
    </div>

    <!-- Judul Recruitment -->
    <h4 class="fw-bold text-dark mb-3">{{ $recruitment->title }}</h4>

    <!-- Organisasi & Lokasi -->
    <div class="text-muted small mb-4">
        <div class="d-flex align-items-center gap-2 mb-2">
            <i class="bi bi-building fs-5 text-purple"></i>
            <span>{{ $recruitment->organization }}</span>
        </div>
        <div class="d-flex align-items-center gap-2 mb-2">
            <i class="bi bi-geo-alt fs-5 text-purple"></i>
            <span>{{ $recruitment->location }}</span>
        </div>
        @if($recruitment->deadline)
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-clock fs-5 text-purple"></i>
                <span>Deadline: {{ $recruitment->deadline->format('d F Y') }}</span>
            </div>
        @endif
    </div>

    <!-- Deskripsi -->
    <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
        <p class="text-dark mb-0">
            {!! nl2br(e($recruitment->description)) !!}
        </p>
    </div>

    <!-- Tombol Action -->
    <div class="d-flex flex-column gap-3">
        @if($recruitment->application_link)
            <a href="{{ $recruitment->application_link }}" target="_blank"
               class="d-flex align-items-center justify-content-between bg-purple-light text-white rounded-3 py-4 px-4 shadow-lg hover-shadow-lg text-decoration-none">
                <span class="fw-bold fs-5">Daftar Sekarang</span>
                <div class="d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
                     style="background-color: #70539A; width: 50px; height: 50px;">
                    <i class="bi bi-box-arrow-up-right fs-4"></i>
                </div>
            </a>
        @endif

        @if($recruitment->file_link)
            <a href="{{ $recruitment->file_link }}" target="_blank"
               class="d-flex align-items-center justify-content-between bg-secondary text-white rounded-3 py-4 px-4 shadow-lg hover-shadow-lg text-decoration-none">
                <span class="fw-bold fs-5">Unduh File</span>
                <div class="d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
                     style="background-color: #6c757d; width: 50px; height: 50px;">
                    <i class="bi bi-download fs-4"></i>
                </div>
            </a>
        @endif
    </div>

</div>
@endsection

@push('scripts')
<style>
    .hover-shadow-lg {
        transition: all 0.3s ease;
    }
    .hover-shadow-lg:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(112,83,154,0.3) !important;
    }

    /* Responsive banner */
    @media (max-width: 576px) {
        .fs-5 {
            font-size: 1.25rem !important;
        }
    }
</style>
@endpush