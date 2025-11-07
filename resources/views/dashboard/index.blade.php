@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<!-- Header -->
<header class="bg-white shadow-sm p-3 sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <h1 class="h4 fw-bold text-purple">Eksploreks</h1>
        <div class="d-flex align-items-center gap-2">
            <img src="https://via.placeholder.com/40/9333ea/ffffff?text=TW" class="rounded-circle" width="40">
            <div>
                <div class="fw-bold small">Toto Wolf</div>
                <div class="text-muted small">toto.wolf@gmail.com</div>
            </div>
        </div>
    </div>
</header>

<!-- Banner -->
<div class="container-fluid px-0 mt-3">
    <div class="ratio ratio-21x9">
        <img src="https://via.placeholder.com/1200x300/f3e8ff/9333ea?text=EKSPLOReks+NOW!" 
             class="w-100 rounded-3 shadow-sm" alt="Banner">
    </div>
</div>

<!-- Fitur Grid -->
<div class="container my-4">
    <div class="row g-3">
        @php
            $menus = [
                ['icon' => 'bi bi-geo-alt', 'label' => 'Maps', 'route' => '#'],
                ['icon' => 'bi bi-calendar-event', 'label' => 'Event', 'route' => '/events'],
                ['icon' => 'bi bi-people', 'label' => 'Connect', 'route' => '/connect'],
                ['icon' => 'bi bi-briefcase', 'label' => 'Recruitment', 'route' => '/recruitments'],
                ['icon' => 'bi bi-calendar3', 'label' => 'Calendar', 'route' => '/calendar'],
                ['icon' => 'bi bi-cup-hot', 'label' => 'Hangout', 'route' => '/hangout'],
            
            ];
        @endphp
        @foreach($menus as $menu)
            <div class="col-4">
                <a href="{{ $menu['route'] }}" class="text-decoration-none text-center d-block p-3 bg-white rounded-3 shadow-sm hover-shadow-lg transition">
                    <i class="{{ $menu['icon'] }} fs-1 text-purple mb-2"></i>
                    <div class="small fw-medium text-dark">{{ $menu['label'] }}</div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<!-- Recommended -->
<div class="container pb-6">
    <h5 class="fw-bold text-purple mb-3">Recommended</h5>
    <div class="row g-3">
        <div class="col-12">
            <div class="d-flex align-items-center p-3 bg-white rounded-3 shadow-sm">
                <img src="https://via.placeholder.com/60/9333ea/ffffff?text=C" class="rounded-circle me-3" width="60">
                <div>
                    <div class="fw-bold">Aroma Deli Coffee</div>
                    <div class="text-muted small">Jalan Raya Puputan No. 88</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection