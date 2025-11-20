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

<!-- Header UNGU MUDA -->
<header class="bg-purple-light text-white p-2 p-md-3 shadow-sm sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Back Button -->
        <a href="/dashboard" class="text-white">
            <div class="bg-white text-purple rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-arrow-left fs-5"></i>
            </div>
        </a>

        <!-- Judul Tengah -->
        <h1 class="h5 fw-bold mb-0">HangOut!</h1>

        <!-- Ikon Lokasi -->
        <a href="#" class="text-white">
            <div class="bg-white text-purple rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-geo-alt-fill fs-5"></i>
            </div>
        </a>
    </div>
</header>

<!-- Banner -->
<div class="container-fluid px-0 mt-2 mt-md-3">
    <div class="ratio ratio-21x9">
        <img src="https://via.placeholder.com/1200x300/f3e8ff/9333ea?text=EXPLORE+AWESOME+CAFES" 
             class="w-100 rounded-3 shadow-sm" alt="Hangout Banner">
    </div>
</div>

<!-- Top 3 Places -->
<div class="container my-3 my-md-4">
    <h6 class="fw-bold text-purple mb-3">🔥 Top 3 Favorite Places</h6>
    <div class="row g-2 g-md-3">
        @foreach($topPlaces as $place)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="place-card bg-white rounded-3 shadow-sm overflow-hidden position-relative h-100">
                    <div class="top-badge">⭐ TOP</div>
                    <img src="{{ $place['image'] }}" alt="{{ $place['name'] }}" class="w-100" style="height: 150px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/400x150/9333ea/ffffff?text=TOP'">
                    <div class="p-3">
                        <h6 class="fw-bold text-dark mb-1">{{ $place['name'] }}</h6>
                        <p class="text-muted small mb-2"><i class="bi bi-geo-alt"></i> {{ $place['address'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-warning small">
                                <i class="bi bi-star-fill"></i> {{ $place['rating'] }}
                                <span class="text-muted">({{ $place['reviews'] }})</span>
                            </div>
                            <a href="{{ route('hangout.detail', $place['id']) }}" class="btn btn-sm btn-purple rounded-pill">View</a>
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
                    <img src="{{ $place['image'] }}" alt="{{ $place['name'] }}" class="w-100" style="height: 150px; object-fit: cover;" onerror="this.src='https://via.placeholder.com/400x150/9333ea/ffffff?text=CAFE'">
                    <div class="p-3">
                        <h6 class="fw-bold text-dark mb-1">{{ $place['name'] }}</h6>
                        <p class="text-muted small mb-1"><i class="bi bi-geo-alt"></i> {{ $place['address'] }}</p>
                        <p class="text-muted small mb-2"><i class="bi bi-arrow-repeat"></i> {{ $place['distance'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-warning small">
                                <i class="bi bi-star-fill"></i> {{ $place['rating'] }}
                                <span class="text-muted">({{ $place['reviews'] }})</span>
                            </div>
                            <a href="{{ route('hangout.detail', $place['id']) }}" class="btn btn-sm btn-outline-purple rounded-pill">View</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection