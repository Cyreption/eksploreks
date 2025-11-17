@extends('layouts.app')
@section('title', 'Liked List')
@section('content')

<!-- Header UNGU MUDA -->
<header class="bg-purple-light text-white p-3 shadow-sm sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="/dashboard" class="text-white">
            <div class="bg-white text-purple rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-arrow-left fs-5"></i>
            </div>
        </a>
        <h1 class="h5 fw-bold mb-0">Liked List</h1>
        <a href="#" class="text-white">
            <div class="bg-white text-purple rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-geo-alt-fill fs-5"></i>
            </div>
        </a>
    </div>
</header>

<!-- Liked List -->
<div class="container mt-4 pb-6">
    @php
        $cafes = [
            ['id' => 1, 'name' => 'Intramuros Coffee', 'desc' => 'Great coffee with a good view. Perfect for chilling or getting work done.', 'img' => 'C'],
            ['id' => 2, 'name' => 'Los Angeles', 'desc' => 'Coffee and specialty drinks with a cozy atmosphere.', 'img' => 'L'],
            ['id' => 3, 'name' => 'Aroma Cafe', 'desc' => 'Best latte in town. Great for work and relax.', 'img' => 'A'],
            ['id' => 4, 'name' => 'Coffee Shop', 'desc' => 'Cozy place, perfect for coffee lovers.', 'img' => 'C'],
        ];
    @endphp

    @foreach($cafes as $cafe)
        <a href="{{ route('liked.detail', $cafe['id']) }}" class="text-decoration-none d-block mb-3">
            <div class="card border-0 shadow-sm p-3 d-flex align-items-center hover-shadow-lg transition" style="border-radius: 1rem;">
                <img src="https://via.placeholder.com/60/9333ea/ffffff?text={{ $cafe['img'] }}" 
                     class="rounded-3 me-3 flex-shrink-0" width="60" height="60" alt="{{ $cafe['name'] }}">
                <div class="flex-grow-1 me-3">
                    <div class="d-flex align-items-center mb-1">
                        <img src="https://via.placeholder.com/24/10b981/ffffff?text=Logo" class="rounded-circle me-2" width="24" alt="Logo">
                        <h6 class="fw-bold mb-0 flex-grow-1">{{ $cafe['name'] }}</h6>
                    </div>
                    <p class="text-muted small mb-0">{{ Str::limit($cafe['desc'], 60) }}</p>
                </div>
                <button class="btn btn-purple btn-sm rounded-pill px-4 fw-bold" style="font-size: 0.8rem;">View</button>
            </div>
        </a>
    @endforeach
</div>
@endsection