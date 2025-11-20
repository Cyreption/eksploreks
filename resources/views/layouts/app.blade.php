<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Eksploreks - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-gradient min-h-screen d-flex flex-column">

    <main class="flex-grow-1 pb-6">
        @yield('content')
    </main>

    <!-- NAVBAR BAWAH: 4 IKON -->
    <nav class="navbar fixed-bottom navbar-expand navbar-light bg-white shadow-lg border-top">
        <div class="container-fluid justify-content-around px-3 py-2">
            <a class="nav-link text-center {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                <i class="bi bi-house-fill"></i>
                <div class="small">Home</div>
            </a>
            <a class="nav-link text-center {{ request()->is('chat*') ? 'active' : '' }}" href="/chat">
                <i class="bi bi-chat-dots-fill"></i>
                <div class="small">Chat</div>
            </a>
            <a class="nav-link text-center {{ request()->is('liked*') ? 'active' : '' }}" href="/liked">
                <i class="bi bi-heart-fill"></i>
                <div class="small">Liked</div>
            </a>
            <a class="nav-link text-center {{ request()->is('profile*') ? 'active' : '' }}" href="/profile">
                <i class="bi bi-person-fill"></i>
                <div class="small">Profile</div>
            </a>
        </div>
    </nav>

    @stack('scripts')
</body>
</html>