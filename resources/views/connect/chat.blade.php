<!-- Author: Nashita Aulia (5026231054) -->

@extends('layouts.app')

@section('content')

<style>
        /* BACKGROUND */
        body {
            background: linear-gradient(135deg, #fdf2fb 0%, #f3e8ff 50%, #e0c3fc 100%) !important;
            min-height: 100vh;
            margin: 0;
            padding-bottom: 5rem;
        }

        /* HEADER */
        .chat-header {
            background: #C5A8E0;
            color: white;
            padding: 1rem 1.5rem;
            border-bottom-left-radius: 1rem;
            border-bottom-right-radius: 1rem;
            box-shadow: 0 4px 6px rgba(163, 132, 208, 0.15);
            position: sticky;
            top: 0;
            z-index: 100;
            text-align: center;
        }

        .chat-header h1 {
            margin: 0;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .chat-header .back-arrow {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 1.4rem;
            text-decoration: none;
        }

        /* LOGO KANAN ATAS */
        .chat-header .top-logo {
            position: absolute;
            right: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            width: 24px;
            height: 34px;
        }

        /* SEARCH */
        .search-bar {
            position: relative;
            margin: 1rem 1rem 1.5rem;
        }
        .search-bar input {
            width: 100%;
            padding: 0.75rem 3rem 0.75rem 1.25rem;
            background: #C5A8E0;
            border: none;
            border-radius: 9999px;
            font-size: 0.9rem;
            color: white;
        }
        .search-bar input::placeholder {
            color: rgba(255, 255, 255, 0.8);
        }
        .search-bar input:focus {
            outline: none;
            background: #C5A8E0;
            box-shadow: 0 0 0 3px rgba(163, 132, 208, 0.3);
            color: white;
        }
        .search-bar button {
            position: absolute;
            right: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: white;
            font-size: 1.1rem;
            padding: 0;
        }
        .search-bar i {
            color: white;
        }

        /* CHAT LIST */
        .chat-item {
            background: white;
            border-radius: 1rem;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin: 0 1rem 0.75rem;
            box-shadow: 0 1px 3px rgba(147, 51, 234, 0.12);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .chat-item:hover {
            box-shadow: 0 4px 6px rgba(147, 51, 234, 0.15);
            transform: translateY(-2px);
        }

        .avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .badge-purple {
            background-color: #9333ea !important;
            color: white !important;
            border-radius: 9999px !important;
            padding: 0.25rem 0.625rem !important;
            font-size: 0.75rem !important;
            font-weight: 600 !important;
        }
    </style>

    <!-- Header -->
    <div class="chat-header position-relative">
        <a href="{{ route('connect.index') }}" class="back-arrow">
            <i class="bi bi-arrow-left"></i>
        </a>

        <h1 class="h5 mb-0 fw-bold">Chat</h1>

        <!-- LOGO (ukuran 24×34px) -->
        <img src="/images/logo-pin-purple.png" alt="Logo" class="top-logo">
    </div>

    <!-- Search -->
    <div class="search-bar">
        <form action="{{ route('chat.search') }}" method="GET" style="display: flex; width: 100%; position: relative;">
            <input type="text" name="q" placeholder="Search ..." value="{{ $query ?? '' }}" style="flex: 1;">
            <button type="submit" style="position: absolute; right: 1.25rem; top: 50%; transform: translateY(-50%);">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <!-- Chat List -->
    <div id="chatList">
        @forelse ($friends as $friendRelation)
            @php
                $friend = $friendRelation->friend_data;
            @endphp
            <a href="{{ route('chat.open', $friend->user_id) }}" style="text-decoration: none; color: inherit;">
                <div class="chat-item" 
                     data-name="{{ strtolower($friend->full_name) }}" 
                     data-message="{{ strtolower($friend->description ?? $friend->institution ?? '') }}">
                    <img src="{{ App\Helpers\AvatarHelper::getAvatarUrl($friend->avatar_url, $friend->username, $friend->full_name) }}" 
                         alt="{{ $friend->full_name }}" class="avatar">
                    <div class="flex-grow-1">
                        <h6 class="mb-0 fw-semibold">{{ $friend->full_name }}</h6>
                        <p class="mb-0 text-muted small">{{ $friend->institution ?? 'User' }}</p>
                    </div>
                </div>
            </a>
        @empty
            <div style="text-align: center; padding: 2rem; color: #6b7280;">
                <i class="bi bi-inbox" style="font-size: 2rem; display: block; margin-bottom: 1rem;"></i>
                <p>Belum ada teman untuk chat</p>
                <p style="font-size: 0.9rem;">Mulai tambah teman di halaman Connect</p>
            </div>
        @endforelse
    </div>

    <script>
        // Fitur Search (client-side filtering)
        const searchInput = document.querySelector('input[placeholder="Search ..."]');
        if (searchInput) {
            searchInput.addEventListener('keyup', function() {
                const searchValue = this.value.toLowerCase();
                const chatItems = document.querySelectorAll('.chat-item');
                
                chatItems.forEach(item => {
                    const name = item.dataset.name;
                    const message = item.dataset.message;
                    item.parentElement.style.display = 
                        (name.includes(searchValue) || message.includes(searchValue)) 
                        ? 'block' 
                        : 'none';
                });
            });
        }
    </script>

@endsection
