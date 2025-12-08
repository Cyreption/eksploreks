{{-- resources/views/academic-calendar/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Event Detail')

@section('content')
<!-- Header -->
<div style="background-color: #CDBAE6;" class="text-black">
    <div class="container py-4 position-relative">
        <div class="d-flex align-items-center justify-content-center position-relative">
            <a href="javascript:history.back()" 
               class="position-absolute start-0 d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
               style="background-color: #70539A; width: 44px; height: 44px; left: 12px; z-index: 10;">
                <i class="bi bi-arrow-left fs-4"></i>
            </a>
            <h5 class="mb-0 fw-bold">Calendar</h5>
            <div class="position-absolute end-0" style="right: 12px;">
                <img src="{{ asset('logo.png') }}" alt="Logo" width="33" height="44">
            </div>
        </div>
    </div>
</div>

<div class="container py-4">

    <!-- Title -->
    <div class="bg-white rounded-3 shadow-sm p-4 mb-3 d-flex gap-3">
        <i class="bi bi-pencil-square text-purple fs-3"></i>
        <div class="flex-grow-1">
            <h6 class="fw-bold text-dark mb-2">{{ $calendarEvent->title }}</h6>
            <p class="text-muted">{{ $calendarEvent->date_time?->format('d F Y, H:i') ?? 'No time set' }}</p>
        </div>
    </div>

    <!-- Notification -->
    @if($calendarEvent->notification)
        <div class="bg-white rounded-3 shadow-sm p-4 mb-3 d-flex gap-3 align-items-center">
            <i class="bi bi-bell-fill text-purple fs-3"></i>
            <div class="flex-grow-1">
                <h6 class="fw-bold text-dark">Notification Enabled</h6>
            </div>
        </div>
    @endif

    <!-- Location -->
    @if($calendarEvent->location)
        <div class="bg-white rounded-3 shadow-sm p-4 mb-3 d-flex gap-3 align-items-center">
            <i class="bi bi-geo-alt-fill text-purple fs-3"></i>
            <div class="flex-grow-1">
                <h6 class="fw-bold text-dark">{{ $calendarEvent->location }}</h6>
            </div>
        </div>
    @endif

    <!-- Color -->
    <div class="bg-white rounded-3 shadow-sm p-4 mb-3 d-flex gap-3 align-items-center">
        <i class="bi bi-palette-fill text-purple fs-3"></i>
        <div class="flex-grow-1">
            @php
                $colorMap = [
                    'Yellow' => '#FFD43B',
                    'Red' => '#FF6B6B',
                    'Blue' => '#4ECDC4',
                    'Purple' => '#70539A'
                ];
            @endphp
            <div class="d-flex align-items-center gap-2">
                <div class="rounded-circle" style="width:20px;height:20px;background:{{ $colorMap[$calendarEvent->color] ?? '#70539A' }};"></div>
                <h6 class="fw-bold text-dark mb-0">{{ $calendarEvent->color }}</h6>
            </div>
        </div>
    </div>

    <!-- Description -->
    @if($calendarEvent->description)
        <div class="bg-white rounded-3 shadow-sm p-4 mb-5 d-flex gap-3">
            <i class="bi bi-text-left text-purple fs-3"></i>
            <div class="flex-grow-1">
                <h6 class="fw-bold text-dark mb-2">Description</h6>
                <p class="text-muted">{{ $calendarEvent->description }}</p>
            </div>
        </div>
    @endif

    <!-- Edit & Delete Buttons -->
    <div class="d-flex gap-2 mb-5">
        <a href="{{ route('calendar.edit', $calendarEvent->calendar_event_id) }}" class="btn btn-purple rounded-pill text-white flex-grow-1">
            <i class="bi bi-pencil"></i> Edit
        </a>
        <form action="{{ route('calendar.destroy', $calendarEvent->calendar_event_id) }}" method="POST" class="flex-grow-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger rounded-pill text-white w-100" onclick="return confirm('Hapus schedule ini?')">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
    </div>

</div>
@endsection

@push('scripts')
<style>
    .bg-purple-light { background-color: #F3E8FF !important; }
    .text-purple { color: #70539A !important; }
</style>
@endpush