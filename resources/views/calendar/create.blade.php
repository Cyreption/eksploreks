<!-- Author: Aulia Salma Anjani (5026231063) & // Author: Hafizhan Yusra Sulistyo (5026231060) -->

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
<div class="container py-4 form-content">
    <h2 class="fw-bold text-dark mb-4">Add Schedule</h2>

    <form action="{{ route('calendar.store') }}" method="POST">
        @csrf

        <!-- Title -->
        <div class="bg-white rounded-3 shadow-sm p-4 mb-3">
            <div class="d-flex align-items-center gap-3 mb-3">
                <i class="bi bi-pencil-square text-purple fs-3"></i>
                <span class="fw-bold text-dark fs-5">Title</span>
            </div>
            <input type="text" class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3" 
                   name="title" placeholder="Enter schedule title" required>
        </div>

        <!-- All-Day Toggle -->
        <div class="bg-white rounded-3 shadow-sm p-4 mb-3">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-sliders text-purple fs-3"></i>
                    <span class="fw-bold text-dark fs-5">All-Day</span>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="allDay" name="all_day" onchange="toggleTime()">
                </div>
            </div>
            <div class="row g-3">
                <div class="col-6">
                    <label class="small text-muted">Date Start</label>
                    <input type="date" class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3" 
                           id="dateStart" name="date_start" required>
                </div>
                <div class="col-6">
                    <label class="small text-muted">Time Start</label>
                    <input type="time" class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3" 
                           id="timeStart" name="time_start">
                </div>
                <div class="col-6">
                    <label class="small text-muted">Date End</label>
                    <input type="date" class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3" 
                           id="dateEnd" name="date_end">
                </div>
                <div class="col-6">
                    <label class="small text-muted">Time End</label>
                    <input type="time" class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3" 
                           id="timeEnd" name="time_end">
                </div>
            </div>
            <input type="hidden" id="dateTime" name="date_time">
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
            <input type="text" class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3" 
                   name="location" placeholder="Enter location">
        </div>

        <!-- Color -->
        <div class="bg-white rounded-3 shadow-sm p-4 mb-3">
            <div class="d-flex align-items-center gap-3 mb-3">
                <i class="bi bi-palette-fill text-purple fs-3"></i>
                <span class="fw-bold text-dark fs-5">Color</span>
            </div>
            <div class="d-flex gap-3">
                @foreach(['Yellow' => '#FFD43B', 'Red' => '#FF6B6B', 'Blue' => '#4ECDC4'] as $colorName => $colorCode)
                    <label class="d-flex align-items-center gap-2 cursor-pointer">
                        <input type="radio" name="color" value="{{ $colorName }}" {{ $colorName === 'Yellow' ? 'checked' : '' }} required>
                        <div class="rounded-circle" style="width:30px;height:30px;background:{{ $colorCode }};"></div>
                        <span class="small">{{ $colorName }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Description -->
        <div class="bg-white rounded-3 shadow-sm p-4 mb-5">
            <div class="d-flex align-items-center gap-3 mb-3">
                <i class="bi bi-text-left text-purple fs-3"></i>
                <span class="fw-bold text-dark fs-5">Description</span>
            </div>
            <textarea class="form-control rounded-3 border-0 shadow-sm bg-light-purple p-3" 
                      name="description" rows="4" placeholder="Enter description"></textarea>
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
    .cursor-pointer { cursor: pointer; }
</style>

<script>
    function toggleTime() {
        const allDay = document.getElementById('allDay').checked;
        document.getElementById('timeStart').disabled = allDay;
        document.getElementById('timeEnd').disabled = allDay;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const dateStart = document.getElementById('dateStart').value;
            const timeStart = document.getElementById('timeStart').value || '00:00';
            const allDay = document.getElementById('allDay').checked;
            
            if (dateStart) {
                const dateTime = `${dateStart} ${allDay ? '00:00' : timeStart}`;
                document.getElementById('dateTime').value = dateTime;
            }
        });

        toggleTime();
    });
</script>
@endpush