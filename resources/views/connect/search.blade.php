<!-- Author: Nashita Aulia (5026231054) -->

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f4eaff;
            margin: 0;
            padding-bottom: 6rem;
            overflow-x: hidden;
            font-family: "Poppins", sans-serif;
        }

        .bottom-nav a.active {
            color: #8e3efc;
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

        /* Search Bar */
        .search-bar {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 1.25rem 0.5rem;
        }

        .search-bar form {
            display: flex;
            gap: 0.5rem;
            width: 100%;
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

        /* Results Container */
        .results-container {
            max-width: 430px;
            margin: auto;
            padding: 0 1rem 6rem;
        }

        .result-item {
            background-color: white;
            border-radius: 1rem;
            display: flex;
            gap: 0.75rem;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.75rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .result-item:hover {
            transform: scale(1.01);
        }

        .result-item img {
            width: 70px;
            height: 70px;
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

        .section-title {
            font-weight: 700;
            font-size: 1.1rem;
            margin: 1rem 1.25rem 0.5rem;
            color: #000;
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
    </style>
</head>

<body>

    <!-- Header -->
    <div class="chat-header">
        Search Results
    </div>

    <!-- Search Bar -->
    <div class="search-bar">
        <form action="{{ route('connect.search') }}" method="GET" style="display: flex; gap: 0.5rem; width: 100%;">
            <input type="text" name="q" placeholder="Search..." value="{{ $query }}">
            <button type="submit" style="background-color: #8e3efc; color: white; border: none; border-radius: 9999px; padding: 0.75rem 1.25rem; font-weight: 600;">Search</button>
        </form>
    </div>

    @if ($query)
        <div class="section-title">Results for "{{ $query }}":</div>
    @else
        <div class="section-title">Search Users:</div>
    @endif

    <!-- Results List -->
    <div class="results-container">
        @forelse ($users as $user)
        <div class="result-item" data-user-id="{{ $user->user_id }}" style="cursor: pointer;">
            <img src="{{ $user->avatar_url ?? 'https://api.dicebear.com/9.x/adventurer/svg?seed=' . urlencode($user->username) }}" alt="{{ $user->full_name }}">
            <div class="flex-grow-1">
                <h6>{{ $user->full_name }}</h6>
                <p>{{ $user->username }} • {{ $user->institution }}</p>
                <small style="color: #9ca3af;">{{ substr($user->description ?? 'No description', 0, 50) }}{{ strlen($user->description ?? '') > 50 ? '...' : '' }}</small>
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

    <!-- Bottom Navbar -->
    <div class="bottom-nav">
        <a href="{{ route('connect.index') }}" class="{{ request()->routeIs('connect.index') ? 'active' : '' }}">
            <i class="bi bi-people{{ request()->routeIs('connect.index') ? '-fill' : '' }}"></i>
            <span>Connect</span>
        </a>
        <a href="{{ route('friendRequest.index') }}" class="{{ request()->routeIs('friendRequest.index') ? 'active' : '' }}">
            <i class="bi bi-chat-dots{{ request()->routeIs('friendRequest.index') ? '-fill' : '' }}"></i>
            <span>Request</span>
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
        // Handle result item clicks
        document.querySelectorAll('.result-item').forEach(item => {
            item.addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');
                window.location.href = "{{ route('connect.addFriend', ':userId') }}".replace(':userId', userId);
            });
        });
    </script>

</body>

</html>
