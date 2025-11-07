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
        <input type="text" id="searchInput" placeholder="Search...">
        <button id="requestBtn">Request</button>
    </div>

    <div class="section-title">Recommendation:</div>

    <!-- Recommendation List -->
    <div class="recommend-container" id="recommendList">
        @php
        $people = [
        ['name' => 'Richard Madden', 'desc' => 'The action hero with a gentleman’s charm. Richard brings serious intensity and cool vibes wherever he goes.', 'img' => 'https://api.dicebear.com/9.x/adventurer/svg?seed=RichardMadden'],
        ['name' => 'Taehyung BTS', 'desc' => 'Artsy, mysterious, and effortlessly cool. Taehyung BTS is the type to turn heads without even trying.', 'img' => 'https://api.dicebear.com/9.x/adventurer/svg?seed=TaehyungBTS'],
        ['name' => 'Carlos Sainz', 'desc' => 'Formula-style focus with a side of smooth. Carlos keeps his cool at top speed and still has time to drop a smile.', 'img' => 'https://api.dicebear.com/9.x/adventurer/svg?seed=CarlosSainz'],
        ['name' => 'Harry Styles', 'desc' => 'Bold, unpredictable, and totally iconic. Harry mixes vintage flair with modern magic—and somehow makes it all work.', 'img' => 'https://api.dicebear.com/9.x/adventurer/svg?seed=HarryStyles'],
        ['name' => 'Lando Norris', 'desc' => 'The ultimate combo of speed and sass. Lando’s the guy who races fast, jokes faster, and always keeps it real.', 'img' => 'https://api.dicebear.com/9.x/adventurer/svg?seed=LandoNorris']
        ];
        @endphp

        @foreach ($people as $p)
        <div
            class="recommend-item"
            data-name="{{ strtolower($p['name']) }}"
            data-desc="{{ strtolower($p['desc']) }}"
            @if($p['name']==='Lando Norris' ) onclick="window.location.href='{{ url('/addfriend') }}'" style="cursor:pointer;" @endif>
            <img src="{{ $p['img'] }}" alt="{{ $p['name'] }}">
            <div class="flex-grow-1">
                <h6>{{ $p['name'] }}</h6>
                <p>{{ $p['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Bottom Navbar -->
    <div class="bottom-nav">
        <a href="{{ url('/home') }}" class="{{ request()->is('home') ? 'active' : '' }}">
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
        // Search filter
        document.getElementById("searchInput").addEventListener("keyup", function() {
            const value = this.value.toLowerCase();
            document.querySelectorAll(".recommend-item").forEach(item => {
                const name = item.dataset.name;
                const desc = item.dataset.desc;
                item.style.display = (name.includes(value) || desc.includes(value)) ? "flex" : "none";
            });
        });

        // Redirect button Request
        document.getElementById("requestBtn").addEventListener("click", function() {
            window.location.href = "{{ url('/request') }}";
        });
    </script>

</body>

</html>