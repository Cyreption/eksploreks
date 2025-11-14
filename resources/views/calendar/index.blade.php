<!-- Created by Aulia Salma Anjani - 5026231063 -->
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

    <!-- Mini Calendar Widget -->
    <div class="mini-calendar-widget">
        <table class="table table-borderless mini-calendar">
            <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Search Bar -->
    <div class="search-container">
        <input type="text" class="form-control search-input" placeholder="Search ...">
        <i class="bi bi-search search-icon"></i>
    </div>

    <!-- Event List -->
    <div class="event-list">
        <!-- Event Card 1 -->
        <div class="event-card">
            <h5 class="event-title">Data Lake House Class</h5>
            <p class="event-class">4201 Class</p>
            <p class="event-desc">Make a Data Lake</p>
            <div class="event-meta">
                <span class="color-indicator bg-warning"></span>
                <span class="color-label">Color Yellow</span>
            </div>
            <div class="event-notification">
                <i class="bi bi-square"></i>
                <span>Notification</span>
            </div>
        </div>

        <!-- Event Card 2 -->
        <div class="event-card">
            <h5 class="event-title">DPP Class</h5>
            <p class="event-class">1101 Class</p>
            <p class="event-desc">Making UI/UX</p>
            <div class="event-meta">
                <span class="color-indicator bg-danger"></span>
                <span class="color-label">Color Red</span>
            </div>
            <div class="event-notification">
                <i class="bi bi-square"></i>
                <span>Notification</span>
            </div>
        </div>
    </div>

    <!-- Floating Add Button -->
    <button class="btn-float" onclick="window.location.href='{{ route('calendar.create') }}'">
        <i class="bi bi-plus"></i>
    </button>

    <!-- Bottom Navigation -->
    @include('partials.bottom-nav')
</div>

<style>
.calendar-page {
    min-height: 100vh;
    background: linear-gradient(180deg, #E9D5FF 0%, #DDD6FE 100%);
    padding-bottom: 80px;
}

.calendar-header {
    background: linear-gradient(135deg, #9333EA 0%, #A855F7 100%);
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: white;
}

.btn-back {
    background: rgba(255, 255, 255, 0.3);
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
}

.header-title {
    font-size: 32px;
    font-weight: 600;
    margin: 0;
}

.logo-icon {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.mini-calendar-widget {
    background: white;
    margin: 30px 20px;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.mini-calendar th {
    text-align: center;
    font-weight: 700;
    padding: 10px 5px;
    border-bottom: 2px solid #000;
}

.mini-calendar td {
    text-align: center;
    padding: 15px 5px;
    border: 1px solid #E5E7EB;
}

.search-container {
    position: relative;
    margin: 0 20px 30px;
}

.search-input {
    background: rgba(255, 255, 255, 0.6);
    border: none;
    border-radius: 50px;
    padding: 15px 50px 15px 25px;
    font-size: 16px;
}

.search-input::placeholder {
    color: #9CA3AF;
}

.search-icon {
    position: absolute;
    right: 25px;
    top: 50%;
    transform: translateY(-50%);
    color: #9CA3AF;
    font-size: 20px;
}

.event-list {
    padding: 0 20px;
}

.event-card {
    background: white;
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.event-title {
    color: #7C3AED;
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 10px;
}

.event-class, .event-desc {
    color: #374151;
    font-size: 16px;
    margin-bottom: 8px;
}

.event-meta {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 15px 0;
}

.color-indicator {
    width: 30px;
    height: 30px;
    border-radius: 5px;
}

.color-label {
    font-size: 16px;
    color: #374151;
}

.event-notification {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 16px;
    color: #374151;
}

.btn-float {
    position: fixed;
    bottom: 100px;
    right: 30px;
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #7C3AED 0%, #9333EA 100%);
    border: none;
    border-radius: 50%;
    color: white;
    font-size: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 16px rgba(124, 58, 237, 0.4);
}
</style>
@endsection
