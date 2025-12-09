<!-- Author: Hafizhan Yusra Sulistyo (5026231060) -->

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

<!-- Header -->
<div class="bg-purple-light text-white sticky-top">
    <div class="container-fluid py-4 position-relative px-0">
        <div class="d-flex align-items-center justify-content-center position-relative">
            <!-- Tombol Back: Lingkaran #70539A + panah putih (kembali ke daftar events) -->
            <a href="{{ route('events.index') }}"
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

<!-- GANTI SELURUH BAGIAN GAMBAR LAMA DENGAN INI -->
<div class="container mt-4">
    <h4 class="fw-bold">{{ $event->title }}</h4>
    <p class="text-muted mb-1">{{ $event->organizer }}</p>
    <p class="text-muted mb-1">{{ $event->location }}</p>
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
