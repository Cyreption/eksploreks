<!-- Author: Hafizhan Yusra Sulistyo (5026231060) -->

@extends('layouts.app')
@section('title', 'Events')
@section('content')

<style>
    body {
        background: #fff;
    }
</style>

<!-- Header -->
<div class="bg-purple-light text-white">
    <div class="container-fluid py-4 position-relative px-0">
        <div class="d-flex align-items-center justify-content-center position-relative">
            <!-- Tombol Back: Lingkaran #70539A + panah putih -->
            <a href="/dashboard" 
               class="position-absolute start-0 d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
               style="background-color: #70539A; width: 44px; height: 44px; left: 0; z-index: 10; margin-left: 12px;">
                <i class="bi bi-arrow-left fs-4"></i>
            </a>

            <!-- Judul Event in ITS! — di tengah & tebal & putih -->
            <h5 class="mb-0 fw-bold text-white">Event in ITS!</h5>

            <!-- Logo di kanan -->
            <div class="position-absolute end-0" style="right: 0; margin-right: 12px;">
                <img src="{{ asset('images/logo-pin-purple.png') }}" alt="Logo" width="33" height="44">
            </div>
        </div>
    </div>
</div>

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
<div class="container mt-4" id="event-list">
    @forelse($events as $event)
        <a href="{{ route('events.show', $event) }}" class="text-decoration-none d-block mb-3">
            <div class="card border-0 shadow-sm overflow-hidden hover-shadow-lg">
                <div class="row g-0">
                    <!-- GAMBAR THUMBNAIL - SUPER RESPONSIVE & CANTIK -->
                    <div class="col-4 position-relative overflow-hidden rounded-start">
                        <div class="ratio ratio-1x1">
                            <img src="{{ $event->image ? asset($event->image) : 'https://via.placeholder.com/300/9333ea/ffffff?text=EVENT' }}"
                                 class="img-fluid rounded-start object-fit-cover w-100 h-100"
                                 alt="{{ $event->title }}"
                                 loading="lazy">
                        </div>
                    </div>

                    <!-- TEXT -->
                    <div class="col-8">
                        <div class="card-body py-3">
                            <h6 class="fw-bold mb-1 text-purple">{{ $event->title }}</h6>
                            <p class="text-muted small mb-1">{{ $event->organizer ?? 'Unknown Organizer' }}</p>
                            <p class="small text-muted mb-2">{{ \Illuminate\Support\Str::limit(strip_tags($event->description), 100) }}</p>

                            @php
                                $start = $event->start_time ? \Carbon\Carbon::parse($event->start_time) : null;
                                $end   = $event->end_time ? \Carbon\Carbon::parse($event->end_time) : null;
                            @endphp

                            <p class="small mb-0">
                                @if($start && $end)
                                    @if($start->year === $end->year)
                                        <small class="text-purple fw-bold">
                                            {{ $start->format('d M') }} - {{ $end->format('d M') }} {{ $start->year }}
                                        </small>
                                    @else
                                        <small class="text-purple fw-bold">
                                            {{ $start->format('d M Y') }} - {{ $end->format('d M Y') }}
                                        </small>
                                    @endif
                                @elseif($start)
                                    <small class="text-purple fw-bold">{{ $start->format('d M Y') }}</small>
                                @else
                                    <small class="text-muted">Date not set</small>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @empty
        <div class="text-center text-muted py-5">
            <i class="bi bi-calendar-x display-1"></i>
            <p class="mt-3">No events found.</p>
        </div>
    @endforelse

    <!-- Pagination -->
    <div class="mt-4">
        {{ $events->links() }}
    </div>

    <!-- FAB Button -->
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