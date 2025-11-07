<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
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
            background: linear-gradient(to bottom, #cbb0ff, #e3ccff);
            color: white;
            padding: 1rem 1.5rem;
            border-bottom-left-radius: 1rem;
            border-bottom-right-radius: 1rem;
            box-shadow: 0 4px 6px rgba(147, 51, 234, 0.15);
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

        /* SEARCH */
        .search-bar {
            position: relative;
            margin: 1rem 1rem 1.5rem;
        }
        .search-bar input {
            width: 100%;
            padding: 0.75rem 3rem 0.75rem 1.25rem;
            background: rgba(224, 195, 252, 0.3);
            border: none;
            border-radius: 9999px;
            font-size: 0.9rem;
        }
        .search-bar input:focus {
            outline: none;
            background: rgba(224, 195, 252, 0.5);
            box-shadow: 0 0 0 3px rgba(147, 51, 234, 0.2);
        }
        .search-bar i {
            position: absolute;
            right: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9333ea;
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

        /* NAVBAR */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            border-top: 1px solid #e5e7eb;
            padding: 0.5rem 0;
            z-index: 1000;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .bottom-nav .nav-item {
            text-align: center;
            color: #6b7280;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: color 0.3s ease;
        }

        .bottom-nav .nav-item.active {
            color: #9333ea;
        }

        .bottom-nav i {
            font-size: 1.4rem;
            margin-bottom: 0.25rem;
        }

        .bottom-nav span {
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="chat-header position-relative">
        <a href="/connect" class="back-arrow"><i class="bi bi-arrow-left"></i></a>
        <h1 class="h5 mb-0 fw-bold">Chat</h1>
    </div>

    <!-- Search -->
    <div class="search-bar">
        <input type="text" placeholder="Search ..." id="searchInput">
        <i class="bi bi-search"></i>
    </div>

    <!-- Chat List -->
    <div id="chatList">
        @php
        $chats = [
            ['name' => 'Bayu Skakmat', 'message' => 'Info catur boloo', 'unread' => 2, 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Bayu'],
            ['name' => 'Nabil Proyektor', 'message' => 'Login emel ???', 'unread' => 10, 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Nabil'],
            ['name' => 'Akang Las', 'message' => 'Mas ini pagenya sudah jadi', 'unread' => 3, 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Akang'],
            ['name' => 'Reza Kecap', 'message' => 'Info posisi masseh', 'unread' => 9, 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Reza'],
            ['name' => 'Susu Bendera', 'message' => 'Halo kak, kami dari Susu Bendera...', 'unread' => 2, 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Susu'],
            ['name' => 'Windah Absen', 'message' => 'ppppp, absenn', 'unread' => 30, 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Windah'],
            ['name' => 'Toto Wolff', 'message' => 'Hey there! How...', 'unread' => 7, 'avatar' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=Toto'],
        ];
        @endphp

        @foreach($chats as $chat)
        <div class="chat-item" 
             data-name="{{ strtolower($chat['name']) }}" 
             data-message="{{ strtolower($chat['message']) }}"
             data-redirect="{{ strtolower($chat['name']) == 'toto wolff' ? '/chatroom' : '' }}">
            <img src="{{ $chat['avatar'] }}" alt="{{ $chat['name'] }}" class="avatar">
            <div class="flex-grow-1">
                <h6 class="mb-0 fw-semibold">{{ $chat['name'] }}</h6>
                <p class="mb-0 text-muted small">{{ $chat['message'] }}</p>
            </div>
            <span class="badge badge-purple">{{ $chat['unread'] }}</span>
        </div>
        @endforeach
    </div>

    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <a href="#" class="nav-item">
            <i class="bi bi-house-door"></i>
            <span>Home</span>
        </a>
        <a href="/chatroom" class="nav-item active">
            <i class="bi bi-chat-dots"></i>
            <span>Chat</span>
        </a>
        <a href="#" class="nav-item">
            <i class="bi bi-heart"></i>
            <span>Liked</span>
        </a>
        <a href="#" class="nav-item">
            <i class="bi bi-person"></i>
            <span>Profile</span>
        </a>
    </div>

    <script>
        // Fitur Search
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const chatItems = document.querySelectorAll('.chat-item');
            
            chatItems.forEach(item => {
                const name = item.dataset.name;
                const message = item.dataset.message;
                item.style.display = (name.includes(searchValue) || message.includes(searchValue)) ? 'flex' : 'none';
            });
        });

        // Redirect kalau klik Toto Wolff
        document.querySelectorAll('.chat-item').forEach(item => {
            item.addEventListener('click', () => {
                const redirectUrl = item.dataset.redirect;
                if (redirectUrl) {
                    window.location.href = redirectUrl;
                }
            });
        });
    </script>

</body>
</html>
