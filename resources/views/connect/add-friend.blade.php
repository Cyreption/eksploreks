@extends('layouts.app')

@section('content')
<div class="p-3" style="background: linear-gradient(to bottom, var(--purple-bg), white);">
    <div class="d-flex align-items-center mb-3">
        <a href="/chat" class="text-purple me-2">
            <i class="fas fa-arrow-left fa-lg"></i>
        </a>
        <h4 class="fw-bold text-purple flex-grow-1 text-center" style="color: var(--purple);">Add Friend</h4>
    </div>

    <!-- Search -->
    <div class="position-relative mb-4">
        <input type="text" class="form-control search-input" placeholder="Search...">
        <i class="fas fa-search search-icon"></i>
    </div>

    <!-- Profile Card -->
    <div class="card profile-card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="d-flex gap-3">
                <img src="https://i.pravatar.cc/64?img=3" class="rounded-circle" width="64" height="64">
                <div>
                    <h5 class="mb-0 fw-bold">Toto Wolff</h5>
                    <p class="text-muted small mb-0">ITS</p>
                    <p class="text-purple small" style="color: var(--purple);">20</p>
                    <p class="text-purple small" style="color: var(--purple);">130 Followers</p>
                </div>
            </div>

            <hr class="my-3">

            <p class="small fw-semibold">Description</p>
            <p class="text-muted small lh-lg">
                I love race. Not just the speed, but the strategy, the team, the pressure. For me, racing is a way of thinking, leading, and pushing limits every single day.
            </p>

            <button class="btn follow-btn w-100 mt-3">Follow</button>
        </div>
    </div>
</div>
@endsection