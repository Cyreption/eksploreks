@extends('layouts.app')
@section('title', 'Event Detail')
@section('content')
@php
    // prevent "Undefined variable $event"
    $event = $event ?? null;
@endphp

@if(!$event)
<div class="container mt-4">
    <div class="alert alert-warning">
        Event data not available. <a href="{{ route('events.index') }}">Back to list</a>
    </div>
</div>
@else

<!-- created by Hafizhan Yusra Sulistyo - 5026231060 -->
<!-- Header -->
<header class="bg-white shadow-sm p-3 sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="{{ route('events.index') }}" class="text-purple">
            <i class="bi bi-arrow-left fs-4"></i>
        </a>
        <h1 class="h5 fw-bold text-purple">Event in ITS!</h1>
        <img src="https://via.placeholder.com/40/9333ea/ffffff?text=ITS" class="rounded-circle" width="40">
    </div>
</header>

<!-- GANTI SELURUH BAGIAN GAMBAR LAMA DENGAN INI -->
<div class="container mt-4">
    <h4 class="fw-bold">{{ $event->title }}</h4>
    <p class="text-muted">{{ $event->organizer }}</p>
    <p class="text-muted small">
        {{ $event->start_time?->format('d F Y H:i') }}
        @if($event->end_time) - {{ $event->end_time->format('d F Y H:i') }} @endif
    </p>

    <!-- POSTER EVENT - RESPONSIVE & CANTIK -->
    <div class="mb-4">
        @if($event->image)
            <img src="{{ asset($event->image) }}"
                 class="img-fluid rounded-4 shadow-lg w-100"
                 style="max-height: 70vh; object-fit: contain; background: #f8f5ff;"
                 alt="{{ $event->title }}">
        @else
            <div class="bg-light-purple rounded-4 d-flex align-items-center justify-content-center shadow-lg"
                 style="height: 60vh; max-height: 500px;">
                <div class="text-center">
                    <i class="bi bi-image display-1 text-purple opacity-25"></i>
                    <p class="mt-3 text-purple fw-bold fs-3">No Poster</p>
                </div>
            </div>
        @endif
    </div>

    <!-- Deskripsi -->
    <div class="bg-white rounded-3 shadow-sm p-4 mb-4">
        <p class="text-dark mb-0">{!! nl2br(e($event->description)) !!}</p>
    </div>

    @if($event->registration_link)
        <a href="{{ route('events.downloadLink', $event) }}" target="_blank"
           class="btn btn-outline-purple w-100 rounded-pill shadow-sm py-3 mb-2 fw-bold">
            Open Registration Link
        </a>
    @endif

    @if($event->file_link)
        <a href="{{ route('events.downloadFile', $event) }}" target="_blank"
           class="btn btn-purple w-100 rounded-pill shadow-lg py-3 fw-bold">
            Open File Link
        </a>
    @endif
</div>

@endif
@endsection
