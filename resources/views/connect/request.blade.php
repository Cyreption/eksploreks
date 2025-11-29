{{-- resources/views/connect/request.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Friend Requests</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(180deg, #f3e9fa 0%, #e8d7fa 100%);
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding-bottom: 90px;
    }

    /* HEADER */
    .header {
      background-color: #cbb2e3;
      display: flex;
      align-items: center;
      justify-content: center;
      position: sticky;
      top: 0;
      width: 100%;
      z-index: 10;
      padding: 1rem;
    }

    .header h4 {
      color: #fff;
      font-weight: 700;
      margin: 0;
      text-align: center;
    }

    .back-arrow {
      position: absolute;
      left: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: #fff;
      font-size: 1.5rem;
      text-decoration: none;
      transition: 0.2s;
    }

    .back-arrow:hover {
      color: #ede4ff;
    }

    /* CARD REQUEST */
    .card-request {
      background-color: #fff;
      border-radius: 1rem;
      padding: 0.8rem 1rem;
      margin: 0.6rem 1rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .profile-info {
      display: flex;
      align-items: center;
      gap: 12px;
      flex: 1;
    }

    .profile-info img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }

    .profile-info .name {
      font-weight: 600;
      font-size: 0.95rem;
      color: #3c2a74;
    }

    .profile-info .desc {
      font-size: 0.85rem;
      color: #6b5a91;
      margin: 0;
    }

    /* BUTTONS */
    .btn-approve, .btn-reject {
      border: none;
      font-size: 0.75rem;
      padding: 0.4rem 0.8rem;
      border-radius: 0.4rem;
      color: #fff;
      transition: 0.2s;
      cursor: pointer;
    }

    .btn-approve {
      background-color: #7b5cb3;
    }
    .btn-approve:hover {
      background-color: #684aa3;
    }

    .btn-reject {
      background-color: #a38dc9;
    }
    .btn-reject:hover {
      background-color: #8f7abc;
    }

    .btn-group-req {
      display: flex;
      gap: 6px;
    }

    /* EMPTY STATE */
    .empty-state {
      text-align: center;
      padding: 3rem 1rem;
      color: #6b5a91;
    }

    .empty-state i {
      font-size: 3rem;
      color: #a38dc9;
      margin-bottom: 1rem;
    }

    /* NAVBAR */
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

    .bottom-nav a.active {
      color: #8e3efc;
    }

    .bottom-nav i {
      font-size: 1.4rem;
      display: block;
    }
  </style>
</head>

<body>
  {{-- HEADER --}}
  <div class="header">
    <a href="{{ route('connect.index') }}" class="back-arrow">
      <i class="bi bi-arrow-left"></i>
    </a>
    <h4>Friend Requests</h4>
  </div>

  {{-- ALERT MESSAGES --}}
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

  {{-- LIST REQUEST --}}
  <div class="mt-3 mb-5">
    @forelse ($requests as $request)
      <div class="card-request">
        <div class="profile-info">
          <img src="{{ $request->user->avatar_url ?? 'https://api.dicebear.com/9.x/adventurer/svg?seed=' . urlencode($request->user->username) }}" 
               alt="{{ $request->user->full_name }}">
          <div>
            <div class="name">{{ $request->user->full_name }}</div>
            <p class="desc mb-0">{{ substr($request->user->description ?? $request->user->institution, 0, 60) }}{{ strlen($request->user->description ?? '') > 60 ? '...' : '' }}</p>
          </div>
        </div>
        <div class="btn-group-req">
          <form action="{{ route('friendRequest.update', $request->request_id) }}" method="POST" style="display: inline;">
            @csrf
            @method('PUT')
            <input type="hidden" name="action" value="accept">
            <button type="submit" class="btn btn-approve">Accept</button>
          </form>
          <form action="{{ route('friendRequest.update', $request->request_id) }}" method="POST" style="display: inline;">
            @csrf
            @method('PUT')
            <input type="hidden" name="action" value="reject">
            <button type="submit" class="btn btn-reject">Reject</button>
          </form>
        </div>
      </div>
    @empty
      <div class="empty-state">
        <i class="bi bi-inbox"></i>
        <p style="font-size: 1.1rem; font-weight: 600;">No Friend Requests</p>
        <p>You don't have any pending friend requests</p>
      </div>
    @endforelse
  </div>

  {{-- BOTTOM NAVBAR --}}
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
