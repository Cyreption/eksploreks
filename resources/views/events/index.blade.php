@extends('layouts.app')
@section('title', 'Events')
@section('content')

<!-- created by Hafizhan Yusra Sulistyo - 5026231060 -->
<!-- Header -->
<header class="bg-white shadow-sm p-3 sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="/dashboard" class="text-purple">
            <i class="bi bi-arrow-left fs-4"></i>
        </a>
        <h1 class="h5 fw-bold text-purple">Event in ITS!</h1>
        <img src="https://via.placeholder.com/40/9333ea/ffffff?text=ITS" class="rounded-circle" width="40">
    </div>
</header>

<!-- Search -->
<div class="container mt-3">
    <form action="{{ route('events.index') }}" method="get">
        <div class="input-group rounded-pill shadow-sm overflow-hidden">
            <input name="q" type="text" class="form-control border-0 ps-4" placeholder="Search ..." value="{{ old('q', request('q', $q ?? '')) }}">
            <button class="btn btn-transparent input-group-text border-0 bg-transparent">
                <i class="bi bi-search text-purple"></i>
            </button>
        </div>
    </form>
</div>

<!-- Event List -->
<div class="container mt-4 pb-6" id="event-list">
    @forelse($events as $event)
    <a href="{{ route('events.show', $event) }}" class="text-decoration-none d-block mb-3">
        <div class="card border-0 shadow-sm overflow-hidden">
            <div class="row g-0">
                <div class="col-4">
                    <img src="{{ $event->file_path ? asset('storage/'.$event->file_path) : 'https://via.placeholder.com/150/9333ea/ffffff?text=EVENT' }}"
                         class="img-fluid rounded-start h-100" style="object-fit: cover;">
                </div>
                <div class="col-8">
                    <div class="card-body py-3">
                        <h6 class="fw-bold mb-1">{{ $event->title }}</h6>
                        <p class="text-muted small mb-1">{{ $event->organizer }}</p>
                        <p class="small text-muted">{{ \Illuminate\Support\Str::limit($event->description, 120) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @empty
    <div class="text-center text-muted py-5">No events found.</div>
    @endforelse

    <div class="mt-3">
        {{ $events->links() }}
    </div>

    <!-- FAB: Centered + Above Navbar -->
    <a href="{{ route('events.create') }}"
       class="btn btn-purple rounded-circle shadow-lg position-fixed d-flex align-items-center justify-content-center fab-button"
       style="bottom: 90px; right: 16px; width: 60px; height: 60px; z-index: 1040;">
        <i class="bi bi-plus text-white" style="font-size: 32px;"></i>
    </a>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.location.pathname.includes('/events/create')) {
            const fab = document.querySelector('.fab-button');
            if (fab) fab.style.display = 'none';
        }
    });
</script>
@endpush
@endsection