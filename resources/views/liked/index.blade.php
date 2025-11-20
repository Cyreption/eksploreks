@extends('layouts.app')
@section('title', 'Liked List')
@section('content')

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
<header class="bg-white shadow-sm p-3 sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="/dashboard" class="text-purple">
            <i class="bi bi-arrow-left fs-4"></i>
        </a>
        <h1 class="h6 fw-bold text-purple mb-0">❤️ My Liked Cafes</h1>
        <a href="{{ route('hangout') }}" class="text-purple">
            <i class="bi bi-search fs-4"></i>
        </a>
    </div>
</header>

<!-- Liked List -->
<div class="container mt-4 pb-6">
    @if(is_array($cafes) && count($cafes) > 0)
        @foreach($cafes as $cafe)
            <a href="{{ route('hangout.detail', $cafe['id']) }}" class="text-decoration-none d-block mb-3">
                <div class="card border-0 shadow-sm p-3 d-flex flex-row align-items-center cafe-card" style="border-radius: 1rem;">
                    <img src="{{ $cafe['image'] }}" 
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