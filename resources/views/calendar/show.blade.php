@extends('layouts.app')

@section('content')
<div class="calendar-page">
    <!-- Header -->
    <div class="calendar-header">
        <button class="btn-back" onclick="window.history.back()">
            <i class="bi bi-chevron-left"></i>
        </button>
        <h1 class="header-title">Calendar</h1>
        <div class="logo-icon">
            <i class="bi bi-flower1"></i>
        </div>
    </div>

    <!-- Event Details -->
    <div class="event-details">
        <!-- Topic Section -->
        <div class="detail-row">
            <div class="icon-container">
                <i class="bi bi-pencil-square"></i>
            </div>
            <div class="detail-content">
                <h6 class="detail-label">Topic</h6>
                <p class="detail-text">Day Date, Time</p>
                <p class="detail-text">Lorem Ipsum</p>
            </div>
        </div>

        <!-- Ringbell Section -->
        <div class="detail-row">
            <div class="icon-container">
                <i class="bi bi-bell-fill"></i>
            </div>
            <div class="detail-content">
                <h6 class="detail-label">Ringbell</h6>
            </div>
        </div>

        <!-- Places Section -->
        <div class="detail-row">
            <div class="icon-container">
                <i class="bi bi-tag-fill"></i>
            </div>
            <div class="detail-content">
                <h6 class="detail-label">Places Name</h6>
            </div>
        </div>

        <!-- Description Section -->
        <div class="detail-row">
            <div class="icon-container">
                <i class="bi bi-text-left"></i>
            </div>
            <div class="detail-content">
                <h6 class="detail-label">Description</h6>
            </div>
        </div>
    </div>

    <!-- Floating Edit Button -->
    <button class="btn-float" onclick="window.location.href='{{ route('calendar.edit', $event->id) }}'">
        <i class="bi bi-pencil"></i>
    </button>

    <!-- Bottom Navigation -->
    @include('partials.bottom-nav')
</div>

<style>
.event-details {
    padding: 30px 20px;
}

.detail-row {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 30px;
}

.icon-container {
    background: transparent;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    color: #000;
    flex-shrink: 0;
}

.detail-content {
    flex: 1;
}

.detail-label {
    font-size: 20px;
    font-weight: 700;
    color: #000;
    margin-bottom: 5px;
}

.detail-text {
    font-size: 16px;
    color: #6B7280;
    margin-bottom: 3px;
}
</style>
@endsection
