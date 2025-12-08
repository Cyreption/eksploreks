@extends('layouts.app')
@section('title', 'Hangout')
@section('content')

<style>
    .place-card {
        transition: all 0.3s ease;
    }

    .place-card:hover {
        box-shadow: 0 10px 25px rgba(147, 51, 234, 0.15) !important;
        transform: translateY(-3px);
    }

    .top-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
        color: white;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: bold;
    }

    @media (max-width: 576px) {
        .place-list-item {
            margin-bottom: 1rem;
        }
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

            <!-- Judul HangOut! — tetap di tengah & tebal -->
            <h5 class="mb-0 fw-bold text-white">HangOut!</h5>

            <!-- Logo di kanan -->
            <div class="position-absolute end-0" style="right: 0; margin-right: 12px;">
                <img src="{{ asset('images/logo-pin-purple.png') }}" alt="Logo" width="33" height="44">
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>

<!-- Banner -->
<div class="container-fluid px-0 mt-2 mt-md-3">
    <x-banner-carousel 
        :banners="['banner1.jpg', 'banner2.jpg', 'banner3.jpg', 'banner4.jpg', 'banner5.jpg', 'banner6.jpg']" 
        :autorotate="true" 
        :interval="5000"
        height="300px" />
</div>

<!-- Top 3 Places -->
<div class="container my-3 my-md-4">
    <h6 class="fw-bold text-purple mb-3">🔥 Top 3 Favorite Places</h6>
    <div class="row g-2 g-md-3">
        @foreach($topPlaces as $place)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="place-card bg-white rounded-3 shadow-sm overflow-hidden position-relative h-100">
                    <div class="top-badge">⭐ TOP</div>
                    <img src="{{ asset('uploads/' . $place['image']) }}" alt="{{ $place['name'] }}" class="w-100" style="height: 150px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/400x150/9333ea/ffffff?text=TOP'">
                    <div class="p-3">
                        <h6 class="fw-bold text-dark mb-1">{{ $place['name'] }}</h6>
                        <p class="text-muted small mb-2"><i class="bi bi-geo-alt"></i> {{ $place['address'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-warning small">
                                <i class="bi bi-star-fill"></i> {{ $place['rating'] }}
                                <span class="text-muted">({{ $place['reviews'] }})</span>
                            </div>
                            <a href="{{ route('hangout.detail', $place['place_id']) }}" class="btn btn-sm btn-purple rounded-pill">View</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- All Places -->
<div class="container pb-5">
    <h6 class="fw-bold text-purple mb-3">All Places ({{ count($otherPlaces) }} Places)</h6>
    <div class="row g-2 g-md-3">
        @foreach($otherPlaces as $place)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="place-card bg-white rounded-3 shadow-sm overflow-hidden place-list-item">
                    <img src="{{ asset('uploads/' . $place['image']) }}" alt="{{ $place['name'] }}" class="w-100" style="height: 150px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/400x150/9333ea/ffffff?text=CAFE'">
                    <div class="p-3">
                        <h6 class="fw-bold text-dark mb-1">{{ $place['name'] }}</h6>
                        <p class="text-muted small mb-1"><i class="bi bi-geo-alt"></i> {{ $place['address'] }}</p>
                        <p class="text-muted small mb-2"><i class="bi bi-arrow-repeat"></i> {{ $place['distance'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-warning small">
                                <i class="bi bi-star-fill"></i> {{ $place['rating'] }}
                                <span class="text-muted">({{ $place['reviews'] }})</span>
                            </div>
                            <a href="{{ route('hangout.detail', $place['place_id']) }}" class="btn btn-sm btn-outline-purple rounded-pill">View</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection