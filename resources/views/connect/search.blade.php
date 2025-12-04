<!-- Author: Nashita Aulia (5026231054) -->

@extends('layouts.app')

@section('content')

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #f4eaff 0%, #e8d7fa 100%);
        padding-bottom: 90px;
        overflow-x: hidden;
        font-family: "Poppins", sans-serif;
        min-height: 100vh;
    }

    /* Header */
    .chat-header {
        background: #C5A8E0;
        color: white;
        font-weight: bold;
        text-align: center;
        padding: 1.25rem 1rem;
        border-bottom-left-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
        box-shadow: 0 4px 8px rgba(163, 132, 208, 0.15);
        position: sticky;
        top: 0;
        z-index: 50;
    }

    .chat-header-inner {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .chat-header-title {
        margin: 0;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .back-arrow {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: white;
        font-size: 1.5rem;
        text-decoration: none;
    }

    .chat-header-logo {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        width: 24px;
        height: 34px;
    }

    /* Search Bar */
    .search-bar {
        width: 100%;
        padding: 1rem 1.25rem;
    }

    .search-bar-inner {
        width: 100%;
        margin: 0;
        display: flex;
        align-items: center;
        flex-direction: row;
        gap: 0.5rem;
    }

    .search-bar form {
        display: flex;
        flex: 1;
        gap: 0.5rem;
        align-items: center;
        position: relative;
    }

    .search-bar input {
        flex: 1;
        background-color: #C5A8E0;
        border: none;
        border-radius: 9999px;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        color: white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .search-bar input::placeholder {
        color: rgba(255, 255, 255, 0.8);
    }

    .search-bar input:focus {
        outline: none;
        background-color: #C5A8E0;
        box-shadow: 0 0 0 3px rgba(163, 132, 208, 0.3);
        color: white;
    }

    .search-bar button {
        background: none;
        border: none;
        cursor: pointer;
        color: white;
        font-size: 1rem;
        padding: 0 0.5rem;
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
    }

    /* Section Title */
    .section-title {
        font-weight: 700;
        font-size: 1rem;
        margin: 1.5rem auto 1.75rem;
        color: #2d1b4e;
        max-width: 430px;
        padding-left: 0.5rem;
    }

    /* Results Container */
    .results-container {
        max-width: 430px;
        margin: 0 auto;
        padding: 0 0.75rem 6rem;
    }

    .result-item {
        background-color: white;
        border-radius: 1rem;
        display: flex;
        gap: 0.75rem;
        align-items: center;
        margin-bottom: 0.875rem;
        padding: 0.875rem;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .result-item:hover {
        box-shadow: 0 4px 12px rgba(147, 51, 234, 0.15);
        transform: translateY(-2px);
    }

    .result-item img {
        width: 65px;
        height: 65px;
        border-radius: 0.75rem;
        object-fit: cover;
    }

    .result-item h6 {
        margin: 0;
        font-weight: 700;
        color: #000;
    }

    .result-item p {
        margin: 0.25rem 0;
        font-size: 0.85rem;
        color: #6b7280;
        line-height: 1.3;
    }

    .empty-message {
        text-align: center;
        padding: 3rem 1rem;
        color: #6b7280;
    }
</style>

<!-- Header -->
<div class="chat-header">
    <div class="chat-header-inner">
        <a href="{{ route('connect.index') }}" class="back-arrow">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h1 class="chat-header-title">Search Results</h1>
        <img src="/images/logo-pin-purple.png" alt="Logo" class="chat-header-logo">
    </div>
</div>

<!-- Search Bar -->
<div class="search-bar">
    <div class="search-bar-inner">
        <form action="{{ route('connect.search') }}" method="GET">
            <input type="text" name="q" placeholder="Search..." value="{{ $query }}">
            <button type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>
</div>

@if ($query)
    <div class="section-title">Results for "{{ $query }}":</div>
@else
    <div class="section-title">Search Users:</div>
@endif

<!-- Results List -->
<div class="results-container">
    @forelse ($users as $user)
    <div class="result-item" data-user-id="{{ $user->user_id }}">
        <img src="{{ App\Helpers\AvatarHelper::getAvatarUrl($user->avatar_url, $user->username, $user->full_name) }}" alt="{{ $user->full_name }}">
        <div>
            <h6>{{ $user->full_name }}</h6>
            <p>{{ substr($user->description ?? $user->institution, 0, 70) }}...</p>
        </div>
    </div>
    @empty
    <div class="empty-message">
        @if ($query)
            <p><i class="bi bi-search" style="font-size: 2rem; margin-bottom: 1rem; display: block;"></i></p>
            <p>Tidak ada user yang cocok dengan "{{ $query }}"</p>
            <p style="font-size: 0.9rem; margin-top: 1rem;">Coba cari dengan username atau nama yang lain</p>
        @else
            <p>Masukkan kata kunci untuk mencari user</p>
        @endif
    </div>
    @endforelse
</div>

<script>
    document.querySelectorAll('.result-item').forEach(item => {
        item.addEventListener('click', function () {
            const userId = this.getAttribute('data-user-id');
            window.location.href = "{{ route('connect.addFriend', ':id') }}".replace(':id', userId);
        });
    });
</script>

@endsection
