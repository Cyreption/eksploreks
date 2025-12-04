<!-- Author: Nashita Aulia (5026231054) --> 

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f4eaff;
            margin: 0;
            padding-bottom: 6rem;
            overflow-x: hidden;
            font-family: "Poppins", sans-serif;
            .bottom-nav a.active {
                color: #8e3efc;
            }

        }

        /* Header */
        .chat-header {
            background-color: #cbb9f2;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 1rem;
            border-bottom-left-radius: 1rem;
            border-bottom-right-radius: 1rem;
        }

        /* Search + Request bar */
        .search-bar {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 1.25rem 0.5rem;
        }

        .search-bar input {
            flex-grow: 1;
            background-color: #ebd9ff;
            border: none;
            border-radius: 9999px;
            padding: 0.75rem 1rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .search-bar input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(147, 51, 234, 0.2);
        }

        .search-bar button {
            background-color: #8e3efc;
            color: white;
            border: none;
            border-radius: 9999px;
            padding: 0.75rem 1.25rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .search-bar button:hover {
            background-color: #792ee5;
        }

        .search-bar a {
            background-color: #8e3efc;
            color: white;
            border: none;
            border-radius: 9999px;
            padding: 0.75rem 1.25rem;
            font-weight: 600;
            transition: all 0.2s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        .search-bar a:hover {
            background-color: #792ee5;
            color: white;
        }

        /* Recommendation List */
        .recommend-container {
            max-width: 430px;
            margin: auto;
            padding: 0 1rem 6rem;
        }

        .recommend-item {
            background-color: white;
            border-radius: 1rem;
            display: flex;
            gap: 0.75rem;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.75rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            cursor: default;
            transition: transform 0.2s ease;
        }

        .recommend-item:hover {
            transform: scale(1.01);
        }

        .recommend-item img {
            width: 70px;
            height: 70px;
            border-radius: 0.75rem;
            object-fit: cover;
        }

        .recommend-item h6 {
            margin: 0;
            font-weight: 700;
            color: #000;
        }

        .recommend-item p {
            margin: 0.25rem 0;
            font-size: 0.85rem;
            color: #6b7280;
            line-height: 1.3;
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
            z-index: 1000;
        }

        .bottom-nav a {
            text-align: center;
            color: #6b7280;
            text-decoration: none;
            font-size: 0.8rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: color 0.3s;
        }

        .bottom-nav a:hover {
            color: #8e3efc;
        }

        .bottom-nav i {
            font-size: 1.4rem;
            display: block;
        }

        .section-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin: 1rem 1.25rem 0.5rem;
            color: #000;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="chat-header">
        Connect
    </div>

    <!-- Search Bar + Request -->
    <div class="search-bar">
        <form action="{{ route('connect.search') }}" method="GET" style="display: flex; gap: 0.5rem; width: 100%; padding: 0 1.25rem;">
            <input type="text" name="q" placeholder="Search..." value="">
            <button type="submit" style="background-color: #8e3efc; color: white; border: none; border-radius: 9999px; padding: 0.75rem 1.25rem; font-weight: 600;">Search</button>
        </form>
        <a href="{{ route('friendRequest.index') }}" style="background-color: #8e3efc; color: white; border: none; border-radius: 9999px; padding: 0.75rem 1.25rem; font-weight: 600; text-decoration: none; display: flex; align-items: center; gap: 0.5rem; white-space: nowrap;">
            <i class="bi bi-people-fill"></i>
            Request
        </a>
    </div>

    <div class="section-title">Recommendation:</div>

        <!-- Recommendation List -->
    <div class="recommend-container" id="recommendList">
        @forelse ($suggestions as $user)
        <div class="recommend-item" data-user-id="{{ $user->user_id }}" style="cursor: pointer;">
            <img src="{{ $user->avatar_url ?? 'https://api.dicebear.com/9.x/adventurer/svg?seed=' . urlencode($user->username) }}" alt="{{ $user->full_name }}">
            <div class="flex-grow-1">
                <h6>{{ $user->full_name }}</h6>
                <p>{{ substr($user->description ?? $user->institution, 0, 70) }}...</p>
            </div>
        </div>
        @empty
        <div style="text-align: center; padding: 2rem; color: #6b7280;">
            <p>Tidak ada user yang tersedia</p>
        </div>
        @endforelse
    </div>

    <!-- Bottom Navbar -->
    <div class="bottom-nav">
        <a href="{{ url('/dashboard') }}" class="{{ request()->is('home') ? 'active' : '' }}">
            <i class="bi bi-house-door{{ request()->is('home') ? '-fill' : '' }}"></i>
            <span>Home</span>
        </a>
        <a href="{{ url('/chat') }}" class="{{ request()->is('chat') ? 'active' : '' }}">
            <i class="bi bi-chat-dots{{ request()->is('chat') ? '-fill' : '' }}"></i>
            <span>Chat</span>
        </a>
        <a href="{{ url('/liked') }}" class="{{ request()->is('liked') ? 'active' : '' }}">
            <i class="bi bi-heart{{ request()->is('liked') ? '-fill' : '' }}"></i>
            <span>Liked</span>
        </a>
        <a href="{{ url('/profile') }}" class="{{ request()->is('profile') ? 'active' : '' }}">
            <i class="bi bi-person{{ request()->is('profile') ? '-fill' : '' }}"></i>
            <span>Profile</span>
        </a>
    </div>


    <script>
        // Handle recommendation item clicks
        document.querySelectorAll('.recommend-item').forEach(item => {
            item.addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');
                window.location.href = "{{ route('connect.addFriend', ':userId') }}".replace(':userId', userId);
            });
        });
    </script>

</body>

</html>
