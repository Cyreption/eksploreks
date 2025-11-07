@extends('layouts.app')

@section('content')
<div class="container-fluid p-0" style="background-color: #f3e8ff; min-height: 100vh;">

    <!-- Header -->
    <div class="text-center py-3 mb-3"
         style="background: linear-gradient(to bottom, #cbb0ff, #e3ccff);
                border-bottom-left-radius: 20px;
                border-bottom-right-radius: 20px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
        <div class="d-flex align-items-center justify-content-start px-3 position-relative">
            <a href="/chatroom" class="text-white me-auto">
                <i class="bi bi-arrow-left fs-5"></i>
            </a>
            <h5 class="fw-bold text-white mb-0 position-absolute start-50 translate-middle-x">Connect!</h5>
        </div>
    </div>

    <!-- Profile Section -->
    <div class="px-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center">
                <img src="https://api.dicebear.com/6.x/avataaars/svg?seed=TotoWolff"
                     alt="Profile"
                     class="rounded me-3"
                     style="width: 90px; height: 90px; object-fit: cover; border-radius: 16px;">
                <div>
                    <h5 class="fw-bold mb-1">Toto Wolff</h5>
                    <p class="text-muted mb-0" style="line-height: 1.4;">
                        ITS<br>20<br>130 Followers
                    </p>
                </div>
            </div>
        </div>

        <hr style="border-color: #d3bdfd;">

        <!-- Description -->
        <div>
            <h6 class="fw-bold mb-2">Description</h6>
            <p class="text-dark" style="font-size: 14px;">
                I love race. Not just the speed, but the strategy, the team, the pressure.
                For me, racing is a way of thinking, leading, and pushing limits every single day.
            </p>
        </div>

        <hr style="border-color: #d3bdfd;">
    </div>
</div>
@endsection
