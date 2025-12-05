<!-- Author: Nashita Aulia (5026231054) -->
@extends('layouts.app')

@section('content')

<style>
    /* BACKGROUND */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #f4eaff 0%, #e8d7fa 100%);
        font-family: 'Inter', sans-serif;
        padding-bottom: 90px;
        overflow-x: hidden;
        min-height: 100vh;
    }

    /* HEADER */
    .header-container {
        background: #C5A8E0;
        padding: 1.1rem 1.25rem;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        text-align: center;
        position: sticky;
        top: 0;
        z-index: 50;
    }

    .header-title {
        margin: 0;
        font-weight: 700;
        color: white;
        font-size: 1.15rem;
    }

    .back-arrow {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: white;
        font-size: 1.5rem;
        text-decoration: none;
    }

    /* Logo kanan atas */
    .header-logo {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        width: 24px;
        height: 34px;
    }

    /* CARD REQUEST */
    .card-request {
        background-color: #fff;
        border-radius: 1rem;
        padding: 0.8rem 1rem;
        margin: 0.6rem 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .profile-info {
        display: flex;
        align-items: center;
        gap: 12px;
        flex: 1;
    }

    .profile-info img {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        object-fit: cover;
    }

    .name {
        font-weight: 600;
        font-size: 0.95rem;
        color: #3c2a74;
    }

    .desc {
        margin: 0;
        font-size: 0.83rem;
        color: #6b5a91;
    }

    /* BUTTONS */
    .btn-group-req {
        display: flex;
        gap: 6px;
    }

    .btn-approve, .btn-reject {
        border: none;
        font-size: 0.75rem;
        padding: 0.4rem 0.8rem;
        border-radius: 0.4rem;
        color: white;
        cursor: pointer;
        transition: .2s;
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
</style>

{{-- HEADER --}}
<div class="header-container position-relative">
    <a href="{{ route('connect.index') }}" class="back-arrow">
        <i class="bi bi-arrow-left"></i>
    </a>

    <h4 class="header-title">Friend Requests</h4>

    <!-- Logo kanan atas -->
    <img src="/images/logo-pin-purple.png" class="header-logo" alt="Logo">
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
          <img src="{{ App\Helpers\AvatarHelper::getAvatarUrl($request->user->avatar_url, $request->user->username, $request->user->full_name) }}" 
               alt="{{ $request->user->full_name }}">

          <div>
            <div class="name">{{ $request->user->full_name }}</div>
            <p class="desc mb-0">
                {{ substr($request->user->description ?? $request->user->institution, 0, 60) }}
                {{ strlen($request->user->description ?? '') > 60 ? '...' : '' }}
            </p>
          </div>
        </div>

        <div class="btn-group-req">
          <form action="{{ route('friendRequest.update', $request->request_id) }}" method="POST">
            @csrf @method('PUT')
            <input type="hidden" name="action" value="accept">
            <button type="submit" class="btn btn-approve">Accept</button>
          </form>

          <form action="{{ route('friendRequest.update', $request->request_id) }}" method="POST">
            @csrf @method('PUT')
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

@endsection
