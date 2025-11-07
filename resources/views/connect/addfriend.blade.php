@extends('layouts.app')

@section('content')
<div style="background-color: #f3e8ff; min-height: 100vh;">

    <!-- Header -->
    <div class="position-relative text-center py-3 mb-4"
         style="background-color: #cbb0ff;
                color: #fff;
                font-weight: 700;
                border-bottom-left-radius: 20px;
                border-bottom-right-radius: 20px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.05);">

        <!-- Back Arrow -->
        <a href="{{ url('/connect') }}" 
           class="position-absolute start-0 ms-3 text-white"
           style="top: 50%; transform: translateY(-50%);">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>

        Add Friend
    </div>

    <!-- Profile Card (Centered) -->
    <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 120px);">

        <div class="card shadow-sm border-0 rounded-4 p-4 text-center"
             style="width: 90%; max-width: 420px; background-color: #fff;">

            <!-- Profile Image -->
            <div class="d-flex justify-content-center mb-3">
                <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=LandoNorris"
                     alt="Lando Norris"
                     class="rounded-circle"
                     style="width: 80px; height: 80px;">
            </div>

            <!-- Profile Info -->
            <h5 class="fw-bold mb-2">Lando Norris</h5>
            <p class="text-muted mb-1">
                The ultimate combo of speed and sass.
            </p>
            <p class="text-muted mb-4" style="max-width: 300px; margin: 0 auto;">
                Lando’s the guy who races fast, jokes faster, and always keeps it real.
            </p>

            <!-- Follow Button -->
            <button class="btn fw-bold px-4 py-2 rounded-pill text-white shadow-sm"
                    style="background-color: #a16ae8;">
                Follow
            </button>
        </div>

    </div>

</div>
@endsection
