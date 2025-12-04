// Author: Nashita Aulia (5026231054) 

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sosial App</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        :root {
            --purple: #8b5cf6;
            --purple-light: #ede9fe;
            --purple-bg: #f5f3ff;
        }

        body, html { height: 100%; margin: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
        .app-container { max-width: 390px; margin: 0 auto; height: 100vh; background: white; display: flex; flex-direction: column; position: relative; box-shadow: 0 0 20px rgba(0,0,0,0.1); }
        .status-bar { background: linear-gradient(to bottom, var(--purple-bg), transparent); padding: 12px 16px 4px; font-size: 12px; color: #333; }
        .status-bar .time { font-weight: 600; }
        .nav-bottom { position: fixed; bottom: 0; left: 0; right: 0; max-width: 390px; margin: 0 auto; background: white; border-top: 1px solid #e5e5e5; padding: 8px 0; z-index: 1000; }
        .nav-bottom .nav-link { color: #999; padding: 8px 12px; }
        .nav-bottom .nav-link.active { color: var(--purple); }
        .chat-item { padding: 12px 0; border-bottom: 1px solid #f0f0f0; }
        .chat-item.active { background: #f3e8ff; border-radius: 12px; margin: 0 -16px; padding: 12px 16px; }
        .badge-unread { background: var(--purple); color: white; font-size: 10px; width: 18px; height: 18px; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: absolute; bottom: -4px; right: -4px; }
        .search-input { border-radius: 50px; padding-left: 40px; font-size: 14px; }
        .search-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #999; }
        .profile-card { border-radius: 16px; }
        .follow-btn { background: #ede9fe; color: var(--purple); border: none; border-radius: 50px; padding: 8px 0; font-weight: 600; }
        .recommendation-item { background: white; border-radius: 16px; padding: 12px; margin-bottom: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .tab-btn { font-size: 12px; padding: 6px 12px; border-radius: 50px; }
        .tab-btn.active { background: var(--purple); color: white; }
        .tab-btn.inactive { background: white; color: #666; border: 1px solid #ddd; }
        .request-count { background: var(--purple); color: white; font-size: 11px; width: 20px; height: 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-left: 4px; }
    </style>
</head>
<body class="bg-light">

<div class="app-container">
    <!-- Status Bar -->
    <div class="status-bar d-flex justify-content-between align-items-center">
        <span class="time">3:14</span>
        <div class="d-flex align-items-center gap-1">
            <i class="fas fa-signal"></i>
            <i class="fas fa-wifi"></i>
            <i class="fas fa-battery-full"></i>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 overflow-auto pb-5">
        @yield('content')
    </div>

    <!-- Bottom Navigation -->
    <div class="nav-bottom">
        <div class="d-flex justify-content-around">
            <a href="/chat" class="nav-link {{ request()->is('chat') ? 'active' : '' }}">
                <i class="fas fa-comment-dots fa-lg"></i>
            </a>
            <a href="/add-friend" class="nav-link {{ request()->is('add-friend') ? 'active' : '' }}">
                <i class="fas fa-user-plus fa-lg"></i>
            </a>
            <a href="/connect" class="nav-link {{ request()->is('connect') ? 'active' : '' }}">
                <i class="fas fa-heart fa-lg"></i>
            </a>
            <a href="/profile" class="nav-link">
                <i class="fas fa-user fa-lg"></i>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>