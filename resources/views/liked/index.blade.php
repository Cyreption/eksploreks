@extends('layouts.app')
@section('title', 'Liked List')
@section('content')

<!-- Author: Satria Pinandita (5026231004) -->

<style>
    .cafe-card {
        transition: all 0.3s ease;
    }

    .cafe-card:hover {
        box-shadow: 0 10px 25px rgba(147, 51, 234, 0.15) !important;
        transform: translateY(-3px);
    }

    .empty-state {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 60vh;
        text-align: center;
    }

    .empty-state i {
        font-size: 80px;
        color: #e0e0e0;
        margin-bottom: 20px;
    }
</style>

<!-- Header -->
<div class="bg-purple-light text-white">
    <div class="container-fluid py-4 position-relative px-0">
        <div class="d-flex align-items-center justify-content-center position-relative">
            <!-- Tombol Back: Lingkaran #70539A + panah putih -->
            <a href="/dashboard" 
               class="position-absolute start-0 d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
               style="background-color: #70539A; width: 44px; height: 44px; left: 0; z-index: 10; margin-left: 12px;">
                <i class="bi bi-arrow-left fs-4"></i>
            </a>

            <!-- Judul My Liked Cafes — di tengah & tebal & putih -->
            <h5 class="mb-0 fw-bold text-white">❤️ My Liked Cafes</h5>

            <!-- Logo di kanan -->
            <div class="position-absolute end-0" style="right: 0; margin-right: 12px;">
                <img src="{{ asset('images/logo-pin-purple.png') }}" alt="Logo" width="33" height="44">
            </div>
        </div>
    </div>
</div>

<!-- Liked List -->
<div class="container mt-4">
    @if(is_array($cafes) && count($cafes) > 0)
        @foreach($cafes as $cafe)
            <a href="{{ route('hangout.detail', $cafe['place_id']) }}" class="text-decoration-none d-block mb-3">
                <div class="card border-0 shadow-sm p-3 d-flex flex-row align-items-center cafe-card" style="border-radius: 1rem;">
                    <img src="{{ asset('uploads/' . $cafe['image']) }}" 
                         class="rounded-3 me-3 shrink-0" width="70" height="70" alt="{{ $cafe['name'] }}" style="object-fit: cover;"
                         onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($cafe['name']) }}&background=9333ea&color=fff&size=70'">
                    <div class="grow me-3">
                        <div class="d-flex align-items-center mb-1">
                            <h6 class="fw-bold mb-0">{{ $cafe['name'] }}</h6>
                        </div>
                        <p class="text-muted small mb-1"><i class="bi bi-geo-alt"></i> {{ $cafe['address'] }}</p>
                        <div class="text-warning small">
                            <i class="bi bi-star-fill"></i> {{ $cafe['rating'] }}
                            <span class="text-muted">({{ $cafe['reviews'] }})</span>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </div>
            </a>
        @endforeach
    @else
        <div class="empty-state">
            <i class="bi bi-heart"></i>
            <h5 class="text-muted fw-bold mb-2">Let's Explore Cafes</h5>
            <p class="text-muted small mb-4">You haven't liked any cafes yet.<br>Discover amazing places and add your favorites!</p>
            <a href="{{ route('hangout') }}" class="btn btn-purple rounded-pill px-5">Browse Cafes</a>
        </div>
    @endif
</div>
@endsection