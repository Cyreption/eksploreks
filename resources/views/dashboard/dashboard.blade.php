@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')

<style>
    .hover-shadow-lg {
        transition: all 0.3s ease;
    }
    
    .hover-shadow-lg:hover {
        box-shadow: 0 10px 25px rgba(147, 51, 234, 0.15) !important;
        transform: translateY(-5px);
    }

    .place-card {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .place-card:hover {
        box-shadow: 0 10px 25px rgba(147, 51, 234, 0.15) !important;
        transform: translateY(-3px);
    }

    .place-image {
        object-fit: cover;
        width: 100%;
        height: 150px;
    }

    @media (max-width: 576px) {
        .header-responsive {
            flex-direction: column;
            gap: 10px;
        }

        .menu-grid .col-4 {
            flex: 0 0 33.333%;
        }

        .place-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .profile-card {
            margin-top: 1rem;
        }
    }

    @media (min-width: 577px) and (max-width: 992px) {
        .place-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }
    }

    @media (min-width: 993px) {
        .place-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
        }
    }
</style>

<!-- Header -->
<header class="bg-white shadow-sm p-2 p-md-3 sticky-top">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center header-responsive">
            <h1 class="h4 fw-bold text-purple mb-0">Eksploreks</h1>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->full_name) }}&background=9333ea&color=fff&size=40" class="rounded-circle" width="40" alt="Avatar">
                <div class="d-none d-sm-block">
                    <div class="fw-bold small">{{ $user->full_name }}</div>
                    <div class="text-muted small">{{ $user->email }}</div>
                </div>
                <a href="{{ route('logout') }}" class="btn btn-sm btn-outline-danger ms-2">Logout</a>
            </div>
        </div>
    </div>
</header>

<!-- Banner -->
<div class="container-fluid px-0 mt-2 mt-md-3">
    <x-banner-carousel 
        :banners="['banner1.jpg', 'banner2.jpg', 'banner3.jpg', 'banner4.jpg', 'banner5.jpg', 'banner6.jpg']" 
        :autorotate="true" 
        :interval="5000"
        height="300px" />
</div>

<!-- Fitur Grid -->
<div class="container my-3 my-md-4">
    <div class="row g-2 g-md-3 menu-grid">
        @php
            $menus = [
                ['icon' => 'bi bi-geo-alt', 'label' => 'Maps', 'route' => '#'],
                ['icon' => 'bi bi-calendar-event', 'label' => 'Event', 'route' => '/events'],
                ['icon' => 'bi bi-people', 'label' => 'Connect', 'route' => '/connect'],
                ['icon' => 'bi bi-briefcase', 'label' => 'Recruitment', 'route' => '/recruitment'],
                ['icon' => 'bi bi-calendar3', 'label' => 'Calendar', 'route' => '/calendar'],
                ['icon' => 'bi bi-cup-hot', 'label' => 'Hangout', 'route' => '/hangout'],
            ];
        @endphp
        @foreach($menus as $menu)
            <div class="col-4 col-md-3 col-lg-2">
                <a href="{{ $menu['route'] }}" class="text-decoration-none text-center d-block p-2 p-md-3 bg-white rounded-3 shadow-sm hover-shadow-lg">
                    <i class="{{ $menu['icon'] }} fs-3 fs-md-1 text-purple mb-2 d-block"></i>
                    <div class="small fw-medium text-dark">{{ $menu['label'] }}</div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<!-- Recommended -->
<div class="container pb-5">
    <div class="mb-4">
        <h5 class="fw-bold text-purple mb-3">Recommended Places</h5>
        
        <!-- Recommended Places Grid -->
        <div class="place-grid">
            @foreach($recommendedPlaces as $place)
                <div class="place-card bg-white rounded-3 shadow-sm overflow-hidden">
                    <img src="{{ asset('uploads/' . $place['image']) }}" alt="{{ $place['name'] }}" class="place-image" onerror="this.src='https://via.placeholder.com/400x150/9333ea/ffffff?text={{ urlencode($place['initial']) }}'">
                    <div class="p-3">
                        <h6 class="fw-bold text-dark mb-1">{{ $place['name'] }}</h6>
                        <p class="text-muted small mb-0"><i class="bi bi-geo-alt"></i> {{ $place['address'] }}</p>
                        <a href="{{ route('hangout.detail', $place['place_id']) }}" class="btn btn-sm btn-purple mt-2 w-100">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection