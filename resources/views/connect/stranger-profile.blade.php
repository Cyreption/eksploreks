// Author: Nashita Aulia (5026231054) 

@extends('layouts.app')

@section('content')
<div class="p-3" style="background: linear-gradient(to bottom, var(--purple-light), white); min-height: 100vh;">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <a href="/connect" class="btn btn-sm rounded-circle p-2" style="background: rgba(255,255,255,0.7);">
            <i class="fas fa-arrow-left text-purple"></i>
        </a>
        <h4 class="fw-bold text-purple m-0">Connect!</h4>
        <a href="#" class="btn btn-sm rounded-circle p-2" style="background: rgba(255,255,255,0.7);">
            <i class="fas fa-location-dot text-purple"></i>
        </a>
    </div>

    <!-- Profile Card -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 20px;">
        <div class="card-body p-4">
            <div class="d-flex align-items-center gap-3 mb-3">
                <img src="https://i.pravatar.cc/150?img=68" class="rounded-circle profile-img">
                <div>
                    <h5 class="fw-bold mb-0">Farhan K.</h5>
                    <p class="text-muted small mb-1">ITS</p>
                    <p class="text-purple small fw-semibold">19</p>
                </div>
                <div class="ms-auto">
                    <button class="btn btn-follow">Follow</button>
                </div>
            </div>
            <p class="text-purple small fw-semibold">999 Followers</p>
        </div>
    </div>

    <!-- Description -->
    <div class="px-3 mb-4">
        <h6 class="fw-bold text-dark mb-2">Description</h6>
        <p class="text-muted small" style="line-height: 1.5;">
            I’m seriously in a committed relationship with kebabs. Juicy meat, crunchy veggies, and that magical sauce all wrapped up. How could anyone say no?
        </p>
    </div>

    <!-- History -->
    <div class="px-3">
        <h6 class="fw-bold text-dark mb-3">History</h6>
        <div class="bg-white rounded-3 p-3 shadow-sm">
            @foreach([
                ['logo' => 'https://i.imgur.com/3kLmN2v.png', 'name' => 'Aroma Deli Coffee', 'desc' => 'Known for its rich aroma and fresh brews, perfect for coffee lovers looking for bold flavors.'],
                ['logo' => 'https://i.imgur.com/7pQv9Zm.png', 'name' => 'Aroma Cafe', 'desc' => 'A warm and comfy café that feels like home, great for relaxing with a cup of coffee.'],
                ['logo' => 'https://i.imgur.com/9xR2vLm.png', 'name' => 'The Brew House', 'desc' => 'A go-to spot for handcrafted coffee and specialty brews, made for true coffee enthusiasts.'],
            ] as $item)
            <div class="history-item">
                <img src="{{ $item['logo'] }}" class="history-logo rounded-circle">
                <div>
                    <p class="mb-0 fw-semibold small">{{ $loop->iteration }}. {{ $item['name'] }}</p>
                    <p class="text-muted" style="font-size: 11px; line-height: 1.4;">{{ $item['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection