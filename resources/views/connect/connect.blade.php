@extends('layouts.app')

@section('content')
<div class="p-3" style="background: linear-gradient(to bottom, var(--purple-bg), white);">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-purple" style="color: var(--purple);">Connect!</h4>
        <div class="d-flex gap-1 align-items-center">
            <button class="btn tab-btn active">Suggestion</button>
            <button class="btn tab-btn inactive">Request</button>
            <span class="request-count">5</span>
        </div>
    </div>

    <!-- Main Profile -->
    <div class="card profile-card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <div class="d-flex gap-3">
                <div class="bg-secondary rounded" style="width: 80px; height: 80px;">
                    <img src="https://i.pravatar.cc/300?img=68" class="w-100 h-100 rounded" style="object-fit: cover;">
                </div>
                <div>
                    <h5 class="mb-0 fw-bold">Vonzy</h5>
                    <p class="text-muted small">Age: 18</p>
                    <p class="small text-muted mt-1">
                        <strong>Description:</strong> I love playing games and watching esports. It's fun, exciting, and always keeps me entertained.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recommendations -->
    <div class="mb-5">
        <h6 class="fw-semibold text-dark d-flex align-items-center gap-1 mb-3">
            Recommendation
            <i class="fas fa-sync text-purple" style="color: var(--purple); font-size: 14px;"></i>
        </h6>

        @foreach([
            ['img' => 1, 'name' => 'Richard Madden', 'desc' => 'The action hero. With a combination of strength and cool, brings serious intensity and cool vibes wherever he goes.'],
            ['img' => 2, 'name' => 'Taehyung BTW', 'desc' => 'Artsy, mysterious, and effortlessly cool. Taehyung BTW is the type to turn heads without even trying.'],
            ['img' => 3, 'name' => 'Carlos Sainz', 'desc' => 'Formula 1 driver with a side of smooth. Carlos keeps his cool at top speed and still has time to drop a smile.'],
            ['img' => 4, 'name' => 'Harry Styles', 'desc' => 'Bold, unpredictable, and totally iconic. Harry mixes vintage flair with modern swagger—and somehow makes it all work.'],
            ['img' => 5, 'name' => 'Lando Norris', 'desc' => 'The ultimate combo of speed and sass. Lando’s the guy who races fast, jokes faster, and always keeps it real.'],
        ] as $user)
        <div class="recommendation-item d-flex justify-content-between align-items-center">
            <div class="d-flex gap-3">
                <img src="https://i.pravatar.cc/50?img={{ $user['img'] }}" class="rounded-circle" width="50" height="50">
                <div>
                    <h6 class="mb-0 fw-semibold">{{ $user['name'] }}</h6>
                    <p class="text-muted small mb-0" style="max-width: 200px;">{{ $user['desc'] }}</p>
                </div>
            </div>
            <button class="btn follow-btn btn-sm">Follow</button>
        </div>
        @endforeach
    </div>
</div>
@endsection