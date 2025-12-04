// Author: Nashita Aulia (5026231054) 

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
        <a href="{{ route('connect.index') }}" 
           class="position-absolute start-0 ms-3 text-white"
           style="top: 50%; transform: translateY(-50%);">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>

        Add Friend
    </div>

    <!-- Alert Messages -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <strong>Error!</strong>
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show m-3" role="alert">
            <strong>Info!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Profile Card (Centered) -->
    <div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 120px);">

        <div class="card shadow-sm border-0 rounded-4 p-4 text-center"
             style="width: 90%; max-width: 420px; background-color: #fff;">

            <!-- Profile Image -->
            <div class="d-flex justify-content-center mb-3">
                <img src="{{ $user->avatar_url ?? 'https://api.dicebear.com/9.x/adventurer/svg?seed=' . urlencode($user->username) }}"
                     alt="{{ $user->full_name }}"
                     class="rounded-circle"
                     style="width: 80px; height: 80px;">
            </div>

            <!-- Profile Info -->
            <h5 class="fw-bold mb-2">{{ $user->full_name }}</h5>
            <p class="text-muted mb-1">
                {{ $user->institution }}
            </p>
            <p class="text-muted mb-4" style="max-width: 300px; margin: 0 auto;">
                {{ $user->description ?? 'Pengguna baru' }}
            </p>

            <!-- Follow Button -->
            <form action="{{ route('friendRequest.store') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="friend_id" value="{{ $user->user_id }}">
                <button type="submit" class="btn fw-bold px-4 py-2 rounded-pill text-white shadow-sm"
                        style="background-color: #a16ae8; border: none; transition: all 0.3s ease;"
                        onmouseover="this.style.backgroundColor='#8a4ddb'; this.style.transform='scale(1.05)';"
                        onmouseout="this.style.backgroundColor='#a16ae8'; this.style.transform='scale(1)';">
                    <i class="bi bi-person-plus me-2"></i>Follow
                </button>
            </form>
        </div>

    </div>

</div>
@endsection
