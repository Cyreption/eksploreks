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
                <img src="https://i.pravatar.cc/150?img=3" class="rounded-circle profile-img">
                <div>
                    <h5 class="fw-bold mb-0">Toto Wolff</h5>
                    <p class="text-muted small mb-1">ITS</p>
                    <p class="text-purple small fw-semibold">20</p>
                </div>
                <div class="ms-auto d-flex gap-2">
                    <button class="btn btn-follow-icon">
                        <i class="fas fa-sync"></i>
                    </button>
                    <button class="btn btn-follow-icon">
                        <i class="fas fa-flag"></i>
                    </button>
                </div>
            </div>
            <p class="text-purple small fw-semibold">130 Followers</p>
        </div>
    </div>

    <!-- Description -->
    <div class="px-3 mb-4">
        <h6 class="fw-bold text-dark mb-2">Description</h6>
        <p class="text-muted small" style="line-height: 1.5;">
            I love race. Not just the speed, but the strategy, the team, the pressure. For me, racing is a way of thinking, leading, and pushing limits every single day.
        </p>
    </div>

    <!-- History -->
    <div class="px-3">
        <h6 class="fw-bold text-dark mb-3">History</h6>
        <div class="bg-white rounded-3 p-3 shadow-sm">
            @foreach([
                ['logo' => 'https://i.imgur.com/2oN1g3M.png', 'name' => 'Coffee Shop', 'desc' => 'A simple and cozy place to enjoy coffee, perfect for chilling or getting some light work done.'],
                ['logo' => 'https://i.imgur.com/5z6n2kP.png', 'name' => 'Inframe Coffee', 'desc' => 'A stylish and artsy café, great for those who love aesthetics and snapping photos.'],
                ['logo' => 'https://i.imgur.com/8x9v3Lm.png', 'name' => 'Los Angels Coffee House', 'desc' => 'A classy coffee house with a vintage vibe, ideal for hanging out or having good conversations.'],
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