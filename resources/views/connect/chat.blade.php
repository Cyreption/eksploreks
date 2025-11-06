@extends('layouts.app')

@section('content')
<div class="p-3" style="background: linear-gradient(to bottom, var(--purple-bg), white);">
    <h4 class="fw-bold text-purple mb-3" style="color: var(--purple);">Chat</h4>

    <!-- Search -->
    <div class="position-relative mb-4">
        <input type="text" class="form-control search-input" placeholder="Search...">
        <i class="fas fa-search search-icon"></i>
    </div>

    <!-- Chat List -->
    <div class="px-1">
        <!-- Item 1 -->
        <div class="d-flex align-items-center chat-item position-relative">
            <div class="position-relative me-3">
                <img src="https://i.pravatar.cc/50?img=1" class="rounded-circle" width="48" height="48">
                <span class="badge-unread">2</span>
            </div>
            <div class="flex-grow-1">
                <h6 class="mb-0 fw-semibold">Bayu Skakmat</h6>
                <p class="text-muted small mb-0 text-truncate" style="max-width: 200px;">Info catur boloo</p>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="d-flex align-items-center chat-item position-relative">
            <div class="position-relative me-3">
                <img src="https://i.pravatar.cc/50?img=2" class="rounded-circle" width="48" height="48">
                <span class="badge-unread">10</span>
            </div>
            <div class="flex-grow-1">
                <h6 class="mb-0 fw-semibold">Nabil Proyektor</h6>
                <p class="text-muted small mb-0 text-truncate" style="max-width: 200px;">Login emel ???</p>
            </div>
        </div>

        <!-- Active Chat -->
        <div class="d-flex align-items-center chat-item active position-relative">
            <div class="me-3">
                <img src="https://i.pravatar.cc/50?img=3" class="rounded-circle" width="48" height="48">
            </div>
            <div class="flex-grow-1">
                <h6 class="mb-0 fw-semibold">Toto Wolff</h6>
                <p class="text-purple small mb-0" style="color: var(--purple);">Hey there! How are you?</p>
            </div>
            <small class="text-muted">7</small>
        </div>
    </div>
</div>
@endsection