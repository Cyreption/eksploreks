{{-- resources/views/recruitment/show.blade.php --}}
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

    <!-- Banner besar — pakai gambar yang sama kayak di index -->
    <div class="rounded-3 overflow-hidden shadow-lg mb-5">
        <div class="position-relative w-100" style="padding-bottom: 46.00%;">
            @if(request()->segment(2) == 'gd')
                <img src="{{ asset('GD-recruitment.jpg') }}" 
                     class="position-absolute top-0 start-0 w-100 h-100 rounded-3"
                     style="object-fit: cover;" alt="Open Recruitment GD">
            @elseif(request()->segment(2) == 'ms')
                <img src="{{ asset('MS-recruitment.png') }}" 
                     class="position-absolute top-0 start-0 w-100 h-100 rounded-3"
                     style="object-fit: cover;" alt="Opeb Recruitment MS">
            @else
                <img src="{{ asset('GD-recruitment.jpg') }}" 
                     class="position-absolute top-0 start-0 w-100 h-100 rounded-3"
                     style="object-fit: cover;" alt="Recruitment">
            @endif
        </div>
    </div>

    <!-- Judul Recruitment -->
    <h4 class="fw-bold text-dark mb-3">
        @if(request()->segment(2) == 'gd')
            Description:
        @elseif(request()->segment(2) == 'ms')
            Description:
        @else
            Recruitment Detail
        @endif
    </h4>

    <!-- Deskripsi -->
    <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
        <p class="text-dark mb-0">
            @if(request()->segment(2) == 'gd')
                Kami sedang mencari Graphic Designer berbakat untuk bergabung bersama tim kreatif kami. 
                Kalian akan bertugas membuat poster, feed Instagram, thumbnail YouTube, dan berbagai konten visual lainnya.
            @elseif(request()->segment(2) == 'ms')
                Dicari talenta muda yang aktif dan kreatif untuk mengelola akun media sosial resmi kampus. 
                Tugas utama: membuat konten harian, story, reels, dan berinteraksi dengan followers.
            @endif
        </p>
    </div>

    <!-- Info tambahan (lokasi, deadline, dll)
    <div class="text-muted small mb-5">
        @if(request()->segment(2) == 'gd')
            <div class="d-flex align-items-center gap-2 mb-2"><i class="bi bi-geo-alt"></i> Surabaya & Remote</div>
            <div class="d-flex align-items-center gap-2"><i class="bi bi-calendar3"></i> Deadline: 15 Januari 2025</div>
        @elseif(request()->segment(2) == 'ms')
            <div class="d-flex align-items-center gap-2 mb-2"><i class="bi bi-geo-alt"></i> Full Remote</div>
            <div class="d-flex align-items-center gap-2"><i class="bi bi-calendar3"></i> Deadline: 20 Januari 2025</div>
        @endif
    </div> -->

    <!-- Tombol Lamar Sekarang — style sama kayak tombol di list -->
    <a href="https://forms.gle/contoh" target="_blank"
       class="d-flex align-items-center justify-content-between bg-purple-light text-white rounded-3 py-4 px-4 shadow-lg hover-shadow-lg text-decoration-none">
        <span class="fw-bold fs-5">Download File</span>
        <div class="d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
             style="background-color: #70539A; width: 50px; height: 50px;">
            <i class="bi bi-box-arrow-up-right fs-4"></i>
        </div>
    </a>

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
</style>
@endpush