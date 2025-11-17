<!-- Created by Aulia Salma Anjani - 5026231063 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruitment</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-gradient">
    <div class="container-fluid px-3 py-3 pb-6">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button class="btn btn-link text-purple p-0 border-0" onclick="history.back()">
                <i class="bi bi-chevron-left fs-4"></i>
            </button>
            <h5 class="mb-0 fw-bold">Recruitment</h5>
            <button class="btn btn-link text-purple p-0 border-0">
                <i class="bi bi-geo-alt fs-5"></i>
            </button>
        </div>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('recruitment.index') }}" class="mb-4">
            <div class="position-relative">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control rounded-pill ps-4 pe-5 shadow-sm" 
                    placeholder="Search..."
                    value="{{ request('search') }}"
                    style="background-color: rgba(255,255,255,0.8); border: none;"
                >
                <button type="submit" class="btn btn-link position-absolute end-0 top-50 translate-middle-y text-purple border-0">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>

        <!-- Recruitment Cards -->
        <div class="space-y-4">
            @forelse($recruitments as $recruitment)
            <a href="{{ route('recruitment.show', $recruitment) }}" class="text-decoration-none">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden mb-3 hover-shadow-lg transition">
                    @if($recruitment->image)
                    <img src="{{ Storage::url($recruitment->image) }}" 
                         class="card-img-top" 
                         alt="{{ $recruitment->title }}"
                         style="height: 180px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-purple-light d-flex align-items-center justify-content-center" 
                         style="height: 180px;">
                        <i class="bi bi-image text-white" style="font-size: 3rem;"></i>
                    </div>
                    @endif
                    
                    <div class="card-body bg-purple-light">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-white fw-semibold">{{ $recruitment->title }}</h6>
                            <i class="bi bi-arrow-right-circle-fill text-white fs-5"></i>
                        </div>
                    </div>
                </div>
            </a>
            @empty
            <div class="text-center py-5">
                <i class="bi bi-inbox text-purple" style="font-size: 4rem;"></i>
                <p class="text-muted mt-3">Tidak ada recruitment tersedia</p>
            </div>
            @endforelse
        </div>
    </div>

    @include('partials.bottom-nav')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
