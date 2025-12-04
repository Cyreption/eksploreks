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

        .search-bar a {
            background-color: #C5A8E0;
            color: white;
            border-radius: 9999px;
            padding: 0.75rem 1.35rem;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            flex-shrink: 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Mobile tweaks */
        @media (max-width: 480px) {
            .search-bar-inner {
                gap: 0.3rem;
            }

            .search-bar button,
            .search-bar a {
                padding: 0.55rem 0.9rem;
                font-size: 0.8rem;
            }
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

        /* Recommendation List */
        .recommend-container {
            max-width: 430px;
            margin: 0 auto;
            padding: 0 0.75rem 6rem;
        }

        .recommend-item {
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

        .recommend-item:hover {
            box-shadow: 0 4px 12px rgba(147, 51, 234, 0.15);
            transform: translateY(-2px);
        }

        .recommend-item img {
            width: 65px;
            height: 65px;
            border-radius: 0.75rem;
            object-fit: cover;
        }

        /* Bottom Navbar */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-around;
            padding: 0.5rem 0;
            box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.05);
            z-index: 1000;
        }

        .bottom-nav a {
            text-align: center;
            color: #9ca3af;
            font-size: 0.75rem;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
            flex: 1;
            padding: 0.5rem;
        }

        .bottom-nav a.active {
            color: #8e3efc;
        }

    </style>

    <!-- Header -->
    <div class="chat-header">
        <div class="chat-header-inner">
            <h1 class="chat-header-title">Connect</h1>
            <img src="/images/logo-pin-purple.png" alt="Logo" class="chat-header-logo">
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-bar-inner">
            <form action="{{ route('connect.search') }}" method="GET">
                <input type="text" name="q" placeholder="Search..." value="">
                <button type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <a href="{{ route('friendRequest.index') }}">
                <i class="bi bi-people-fill"></i> Request
            </a>
        </div>
    </div>

    <div class="section-title">Recommendation:</div>

    <!-- Recommendation List -->
    <div class="recommend-container" id="recommendList">
        @forelse ($suggestions as $user)
        <div class="recommend-item" data-user-id="{{ $user->user_id }}">
            <img src="{{ App\Helpers\AvatarHelper::getAvatarUrl($user->avatar_url, $user->username, $user->full_name) }}"
                alt="{{ $user->full_name }}">
            <div>
                <h6>{{ $user->full_name }}</h6>
                <p>{{ substr($user->description ?? $user->institution, 0, 70) }}...</p>
            </div>
        </div>
        @empty
        <p style="text-align:center;color:#6b7280;padding:2rem;">Tidak ada user yang tersedia</p>
        @endforelse
    </div>

    <script>
        document.querySelectorAll('.recommend-item').forEach(item => {
            item.addEventListener('click', function () {
                const userId = this.getAttribute('data-user-id');
                window.location.href = "{{ route('connect.addFriend', ':id') }}".replace(':id', userId);
            });
        });
    </script>

@endsection
