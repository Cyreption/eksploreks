@extends('layouts.app')
@section('title', 'Hangout')
@section('content')

<!-- Header UNGU MUDA -->
<header class="bg-purple-light text-white p-3 shadow-sm sticky-top">
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
<div class="container-fluid px-0 mt-3">
    <div class="ratio ratio-21x9">
        <img src="https://via.placeholder.com/1200x300/f3e8ff/9333ea?text=HOMEMADE+DELICIOUS+CAKES" 
             class="w-100 rounded-3 shadow-sm" alt="Hangout Banner">
    </div>
</div>

<!-- Nearest -->
<div class="container my-4">
    <h6 class="fw-bold text-purple mb-3">Nearest</h6>
    <div class="bg-white p-3 rounded-3 shadow-sm d-flex align-items-center">
        <img src="https://via.placeholder.com/80/9333ea/ffffff?text=Good" 
             class="rounded-3 me-3" width="80" alt="Goodfellow's Cafe">
        <div class="flex-grow-1">
            <h6 class="fw-bold mb-1">Goodfellow's Cafe</h6>
            <p class="text-muted small mb-0">1.2 km away</p>
        </div>
        <a href="{{ route('hangout.detail', 1) }}" 
           class="btn btn-purple btn-sm rounded-pill px-3">View</a>
    </div>
</div>

<!-- Suggestion -->
<div class="container pb-6">
    <h6 class="fw-bold text-purple mb-3">Suggestion</h6>
    <div class="row g-3">
        <div class="col-12">
            <div class="bg-white p-3 rounded-3 shadow-sm d-flex align-items-center">
                <img src="https://via.placeholder.com/70/9333ea/ffffff?text=L" 
                     class="rounded-3 me-3" width="70" alt="L Coffee Shop">
                <div class="flex-grow-1">
                    <h6 class="fw-bold mb-1">L Coffee Shop</h6>
                    <p class="text-muted small mb-0">Cozy place, perfect for work and relax</p>
                </div>
                <a href="{{ route('hangout.detail', 2) }}" 
                   class="btn btn-outline-purple btn-sm rounded-pill px-3">View</a>
            </div>
        </div>

        <div class="col-12">
            <div class="bg-white p-3 rounded-3 shadow-sm d-flex align-items-center">
                <img src="https://via.placeholder.com/70/9333ea/ffffff?text=A" 
                     class="rounded-3 me-3" width="70" alt="Aroma Cafe">
                <div class="flex-grow-1">
                    <h6 class="fw-bold mb-1">Aroma Cafe</h6>
                    <p class="text-muted small mb-0">Best latte in town, great vibe</p>
                </div>
                <a href="{{ route('hangout.detail', 3) }}" 
                   class="btn btn-outline-purple btn-sm rounded-pill px-3">View</a>
            </div>
        </div>
    </div>
</div>
@endsection