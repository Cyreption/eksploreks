@extends('layouts.app')

@section('content')
<div class="p-3" style="background: linear-gradient(to bottom, var(--purple-bg), white);">
    <div class="d-flex align-items-center mb-3">
        <a href="/connect" class="text-purple me-2">
            <i class="fas fa-arrow-left fa-lg"></i>
        </a>
        <h4 class="fw-bold text-purple flex-grow-1 text-center" style="color: var(--purple);">Request</h4>
    </div>

    <div class="px-1">
        @foreach([
            ['img' => 10, 'name' => 'Rusdi', 'desc' => 'Charismatic and confident, Rusdi leads MK 48 with style and vision. A true trendsetter both on and off the stage.'],
            ['img' => 11, 'name' => 'Ambatron', 'desc' => 'Half human, half machine. Ambatron brings futuristic vibes and unbeatable discipline to the team. Always on duty, always cool.'],
            ['img' => 12, 'name' => 'Andriana', 'desc' => 'Chill and charming, Andriana is the heart of the group. With laid-back energy and sharp humor, he keeps the squad grounded.'],
            ['img' => 13, 'name' => 'Fuad Golden Pharaoh', 'desc' => 'Regal and radiant, Fuad brings ancient royalty to modern rhythm. Gold chains and golden charisma—he’s unforgettable.'],
            ['img' => 14, 'name' => 'Si Imut', 'desc' => 'The smile master and happiness ambassador. Si Imut’s good vibes are contagious, making every moment with him feel like a party.'],
        ] as $req)
        <div class="d-flex align-items-start gap-3 mb-4 p-3 bg-white rounded-3 shadow-sm">
            <img src="https://i.pravatar.cc/60?img={{ $req['img'] }}" class="rounded-circle" width="60" height="60">
            <div class="flex-grow-1">
                <h6 class="fw-bold mb-1">{{ $req['name'] }}</h6>
                <p class="text-muted small mb-2" style="line-height: 1.4;">{{ $req['desc'] }}</p>
                <div class="d-flex gap-2">
                    <button class="btn btn-sm text-purple border border-purple rounded-pill px-3">Approve</button>
                    <button class="btn btn-sm text-purple bg-transparent border-0 px-3">Reject</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection