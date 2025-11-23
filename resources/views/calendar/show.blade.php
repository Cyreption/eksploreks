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

<div class="container py-4 pb-6">

    <!-- Topic -->
    <div class="bg-white rounded-3 shadow-sm p-4 mb-3 d-flex gap-3">
        <i class="bi bi-pencil-square text-purple fs-3"></i>
        <div class="flex-grow-1">
            <h6 class="fw-bold text-dark mb-2">Topic</h6>
            <p class="text-muted mb-1">Day Date, Time</p>
            <p class="text-muted">Lorem Ipsum</p>
        </div>
    </div>

    <!-- Ringbell -->
    <div class="bg-white rounded-3 shadow-sm p-4 mb-3 d-flex gap-3 align-items-center">
        <i class="bi bi-bell-fill text-purple fs-3"></i>
        <div class="flex-grow-1">
            <h6 class="fw-bold text-dark">Ringbell</h6>
        </div>
    </div>

    <!-- Places Name -->
    <div class="bg-white rounded-3 shadow-sm p-4 mb-3 d-flex gap-3 align-items-center">
        <i class="bi bi-tag-fill text-purple fs-3"></i>
        <div class="flex-grow-1">
            <h6 class="fw-bold text-dark">Places Name</h6>
        </div>
    </div>

    <!-- Description -->
    <div class="bg-white rounded-3 shadow-sm p-4 mb-5 d-flex gap-3">
        <i class="bi bi-text-left text-purple fs-3"></i>
        <div class="flex-grow-1">
            <h6 class="fw-bold text-dark mb-2">Description</h6>
        </div>
    </div>

    <!-- Floating Edit Button -->
    <a href="#" class="position-fixed bottom-0 end-0 m-4 d-flex align-items-center justify-content-center rounded-circle shadow-lg text-white"
       style="background-color: #70539A; width: 60px; height: 60px; z-index: 100;">
        <i class="bi bi-pencil fs-3"></i>
    </a>

</div>
@endsection

@push('scripts')
<style>
    .bg-purple-light { background-color: #F3E8FF !important; }
    .text-purple { color: #70539A !important; }
</style>
@endpush