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

<div class="container mt-4 pb-6">
    <h4 class="fw-bold">{{ $event->title }}</h4>
    <p class="text-muted">{{ $event->organizer }}</p>
    <p class="text-muted small">
        {{ $event->start_time ? $event->start_time->format('d F Y H:i') : '' }}
        @if($event->end_time) - {{ $event->end_time->format('d F Y H:i') }} @endif
    </p>

    <img src="{{ $event->file_link ? $event->file_link : 'https://via.placeholder.com/400x200/9333ea/ffffff?text=EVENT' }}"
         class="img-fluid rounded-3 shadow-sm mb-4" alt="Event">

    <p class="mb-4">
        {!! nl2br(e($event->description)) !!}
    </p>

    @if($event->link)
    <a href="{{ route('events.downloadLink', $event) }}" target="_blank" class="btn btn-outline-purple w-100 rounded-pill shadow-sm py-3 mb-2 fw-bold">Open Registration Link</a>
    @endif

    @if($event->file_link)
    <a href="{{ route('events.downloadFile', $event) }}" target="_blank" class="btn btn-purple w-100 rounded-pill shadow-lg py-3 fw-bold">Open File Link</a>
    @endif
</div>

@endif
@endsection
