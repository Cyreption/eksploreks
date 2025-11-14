<!-- Created by Aulia Salma Anjani - 5026231063 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $recruitment->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-gradient">
    <div class="container-fluid px-3 py-3 pb-6">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('recruitment.index') }}" class="btn btn-link text-purple p-0 border-0">
                <i class="bi bi-chevron-left fs-4"></i>
            </a>
            <h5 class="mb-0 fw-bold">Recruitment</h5>
            <div style="width: 24px;"></div>
        </div>

        <!-- Title -->
        <div class="text-center mb-4">
            <h4 class="fw-bold text-purple">{{ $recruitment->title }}</h4>
        </div>

        <!-- Image -->
        @if($recruitment->image)
        <div class="mb-4 rounded-3 overflow-hidden shadow-sm">
            <img src="{{ Storage::url($recruitment->image) }}" 
                 class="img-fluid w-100" 
                 alt="{{ $recruitment->title }}"
                 style="max-height: 300px; object-fit: cover;">
        </div>
        @endif

        <!-- Description -->
        <div class="bg-white p-4 rounded-3 shadow-sm mb-3">
            <h6 class="fw-bold text-purple mb-3">Description:</h6>
            <p class="text-muted mb-0" style="line-height: 1.6;">{{ $recruitment->description }}</p>
        </div>

        <!-- Registration Link -->
        @if($recruitment->registration_link)
        <div class="bg-white p-4 rounded-3 shadow-sm mb-3">
            <h6 class="fw-bold text-purple mb-3">Registration Link</h6>
            <a href="{{ $recruitment->registration_link }}" 
               target="_blank" 
               class="btn btn-purple w-100">
                <i class="bi bi-link-45deg me-2"></i>
                Open Registration Link
            </a>
        </div>
        @endif

        <!-- Download File -->
        @if($recruitment->file)
        <div class="text-center">
            <a href="{{ Storage::url($recruitment->file) }}" 
               download 
               class="btn btn-purple px-5">
                <i class="bi bi-download me-2"></i>
                Download File
            </a>
        </div>
        @endif
    </div>

    @include('partials.bottom-nav')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
