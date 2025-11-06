@extends('layouts.app')

@section('content')
<div class="p-3" style="background: linear-gradient(to bottom, var(--purple-bg), white); min-height: 100vh;">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div class="d-flex align-items-center">
            <a href="/connect" class="text-purple me-3">
                <i class="fas fa-arrow-left fa-lg"></i>
            </a>
            <div class="d-flex align-items-center gap-2">
                <img src="https://i.pravatar.cc/50?img=3" class="rounded-circle" width="40" height="40">
                <div>
                    <h6 class="fw-bold mb-0">Toto Wolff</h6>
                    <small class="text-muted">18:40</small>
                </div>
            </div>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-purple btn-sm rounded-circle p-2">
                <i class="fas fa-phone"></i>
            </button>
            <button class="btn btn-purple btn-sm rounded-circle p-2">
                <i class="fas fa-video"></i>
            </button>
        </div>
    </div>

    <!-- Chat Messages -->
    <div class="chat-messages mb-4" style="max-height: calc(100vh - 280px); overflow-y: auto;">
        <div class="d-flex justify-content-start mb-3">
            <div class="bg-white rounded-3 p-3 shadow-sm" style="max-width: 75%;">
                <p class="mb-0 small">halooo</p>
                <small class="text-muted float-end">18:18</small>
            </div>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <div class="bg-purple text-white rounded-3 p-3 shadow-sm" style="max-width: 75%;">
                <p class="mb-0 small text-white">y</p>
                <small class="text-white-50 float-end">18:20</small>
            </div>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <div class="bg-purple text-white rounded-3 p-3 shadow-sm" style="max-width: 75%;">
                <p class="mb-0 small text-white">sendirian bae nih neng??</p>
                <small class="text-white-50 float-end">18:20</small>
            </div>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <div class="bg-purple text-white rounded-3 p-3 shadow-sm" style="max-width: 75%;">
                <p class="mb-0 small text-white">byeee</p>
                <small class="text-white-50 float-end">19:44</small>
            </div>
        </div>

        <!-- Blocked Message -->
        <div class="text-center my-5">
            <p class="text-muted small">
                You blocked this contact. <a href="#" class="text-purple">Tap to unblock.</a>
            </p>
        </div>
    </div>

    <!-- Input Area (Disabled karena blocked) -->
    <div class="position-fixed bottom-0 start-0 end-0 p-3" style="max-width: 390px; margin: 0 auto; background: rgba(255,255,255,0.95); backdrop-filter: blur(10px);">
        <div class="d-flex align-items-center bg-light rounded-pill px-3 py-2">
            <input type="text" class="form-control border-0 bg-transparent flex-grow-1" placeholder="Add Text..." disabled style="outline: none; box-shadow: none;">
            <button class="btn btn-purple rounded-circle p-2 ms-2" disabled>
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>
@endsection