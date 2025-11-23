{{-- resources/views/academic-calendar/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Create Event')

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
<div class="container py-4 pb-6 form-content">
    <h2 class="fw-bold text-dark mb-4">DPP Class</h2>

    <form action="{{ route('calendar.store') }}" method="POST">
        @csrf

        <!-- All-Day Toggle -->
        <div class="bg-white rounded-3 shadow-sm p-4 mb-3">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-sliders text-purple fs-3"></i>
                    <span class="fw-bold text-dark fs-5">All-Day</span>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="allDay" name="all_day">
                </div>
            </div>
            <div class="row g-3">
                <div class="col-6">
                    <label class="small text-muted">Day, Date</label>
                    <input type="date" class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3" name="start_date">
                </div>
                <div class="col-6">
                    <label class="small text-muted">Time Start</label>
                    <input type="time" class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3" name="start_time">
                </div>
                <div class="col-6">
                    <label class="small text-muted">Day, Date</label>
                    <input type="date" class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3" name="end_date">
                </div>
                <div class="col-6">
                    <label class="small text-muted">Time End</label>
                    <input type="time" class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3" name="end_time">
                </div>
            </div>
        </div>

        <!-- Notification Toggle -->
        <div class="bg-white rounded-3 shadow-sm p-4 mb-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-bell-fill text-purple fs-3"></i>
                    <span class="fw-bold text-dark fs-5">Notification</span>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="notification" name="notification">
                </div>
            </div>
        </div>

        <!-- Location -->
        <div class="bg-white rounded-3 shadow-sm p-4 mb-3">
            <div class="d-flex align-items-center gap-3 mb-3">
                <i class="bi bi-geo-alt-fill text-purple fs-3"></i>
                <span class="fw-bold text-dark fs-5">Location</span>
            </div>
            <input type="text" class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3" name="location" placeholder="Enter location">
        </div>

        <!-- Color -->
        <div class="bg-white rounded-3 shadow-sm p-4 mb-3">
            <div class="d-flex align-items-center gap-3 mb-3">
                <i class="bi bi-palette-fill text-purple fs-3"></i>
                <span class="fw-bold text-dark fs-5">Color</span>
            </div>
            <select class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3" name="color">
                <option>Yellow</option>
                <option>Red</option>
                <option>Blue</option>
                <option>Purple</option>
            </select>
        </div>

        <!-- Description -->
        <div class="bg-white rounded-3 shadow-sm p-4 mb-5">
            <div class="d-flex align-items-center gap-3 mb-3">
                <i class="bi bi-text-left text-purple fs-3"></i>
                <span class="fw-bold text-dark fs-5">Description</span>
            </div>
            <textarea class="form-control rounded-3 border-0 shadow-sm bg-light-purple p-3" name="description" rows="4" placeholder="Example: DPP Assignment, Class 4201"></textarea>
        </div>

        <!-- Save Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-purple rounded-pill py-3 fw-bold text-white shadow-lg">
                Save
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<style>
    .bg-light-purple { background-color: #F3E8FF !important; }
    .text-purple { color: #70539A !important; }
    .btn-purple { background-color: #70539A !important; color: white !important; }
    .btn-purple:hover { background-color: #5E4282 !important; }
</style>
@endpush