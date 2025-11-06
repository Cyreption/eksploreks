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

    <!-- Form Content -->
    <div class="form-content">
        <h2 class="form-title">DPP Class</h2>

        <form action="{{ route('calendar.store') }}" method="POST">
            @csrf

            <!-- All-Day Toggle -->
            <div class="form-section">
                <div class="section-header">
                    <div class="icon-label">
                        <i class="bi bi-sliders"></i>
                        <span>All-Day</span>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="allDay" name="all_day">
                    </div>
                </div>
                <div class="date-time-grid">
                    <div class="grid-item">
                        <label>Day, Date</label>
                    </div>
                    <div class="grid-item">
                        <label>Time Start</label>
                    </div>
                    <div class="grid-item">
                        <label>Day, Date</label>
                    </div>
                    <div class="grid-item">
                        <label>Time End</label>
                    </div>
                </div>
            </div>

            <!-- Notification Toggle -->
            <div class="form-section">
                <div class="section-header">
                    <div class="icon-label">
                        <i class="bi bi-bell-fill"></i>
                        <span>Notification</span>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="notification" name="notification">
                    </div>
                </div>
                <p class="section-subtext">Add notification</p>
            </div>

            <!-- Location -->
            <div class="form-section">
                <div class="icon-label">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Location</span>
                </div>
            </div>

            <!-- Color -->
            <div class="form-section">
                <div class="icon-label">
                    <i class="bi bi-palette-fill"></i>
                    <span>Color</span>
                </div>
            </div>

            <!-- Description -->
            <div class="form-section">
                <div class="icon-label">
                    <i class="bi bi-text-left"></i>
                    <span>Description</span>
                </div>
                <p class="section-subtext">DPP Assignment, Class 4201</p>
            </div>

            <!-- Save Button -->
            <div class="text-end mt-4">
                <button type="submit" class="btn-save">Save</button>
            </div>
        </form>
    </div>

    <!-- Bottom Navigation -->
    @include('partials.bottom-nav')
</div>

<style>
.form-content {
    padding: 30px 20px;
}

.form-title {
    font-size: 32px;
    font-weight: 700;
    color: #000;
    margin-bottom: 30px;
}

.form-section {
    background: white;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 15px;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.icon-label {
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 18px;
    font-weight: 600;
    color: #000;
}

.icon-label i {
    font-size: 28px;
}

.form-check-input {
    width: 50px;
    height: 28px;
    background-color: #7C3AED;
    border: none;
}

.form-check-input:checked {
    background-color: #7C3AED;
}

.date-time-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-top: 15px;
}

.grid-item label {
    font-size: 16px;
    color: #374151;
}

.section-subtext {
    color: #9CA3AF;
    font-size: 16px;
    margin: 10px 0 0 43px;
}

.btn-save {
    background: linear-gradient(135deg, #7C3AED 0%, #9333EA 100%);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 15px 50px;
    font-size: 18px;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(124, 58, 237, 0.4);
}
</style>
@endsection


