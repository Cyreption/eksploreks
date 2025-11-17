@extends('layouts.app')
@section('title', 'Coffee Shop')
@section('content')

@php
    // Simulasi data berdasarkan ID
    $cafeId = request()->route('id');
    $cafe = match($cafeId) {
        1 => ['name' => 'Intramuros Coffee', 'img' => 'C', 'rating' => 4.7, 'reviews' => 234, 'desc' => 'Great coffee with a good view. Perfect for chilling or getting work done.'],
        2 => ['name' => 'Los Angeles', 'img' => 'L', 'rating' => 4.5, 'reviews' => 189, 'desc' => 'Coffee and specialty drinks with a cozy atmosphere.'],
        3 => ['name' => 'Aroma Cafe', 'img' => 'A', 'rating' => 4.8, 'reviews' => 312, 'desc' => 'Best latte in town. Great for work and relax.'],
        default => ['name' => 'Coffee Shop', 'img' => 'C', 'rating' => 4.5, 'reviews' => 444, 'desc' => 'Cozy place, perfect for coffee lovers.'],
    };
@endphp

<!-- Header UNGU MUDA -->
<header class="bg-purple-light text-white p-3 shadow-sm sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="{{ route('liked') }}" class="text-white">
            <div class="bg-white text-purple rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-arrow-left fs-5"></i>
            </div>
        </a>
        <h1 class="h5 fw-bold mb-0">{{ $cafe['name'] }}</h1>
        <a href="#" class="text-white">
            <div class="bg-white text-purple rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                <i class="bi bi-heart-fill fs-5"></i>
            </div>
        </a>
    </div>
</header>

<!-- Banner -->
<div class="container-fluid px-0 mt-3">
    <img src="https://via.placeholder.com/600x300/9333ea/ffffff?text={{ $cafe['name'] }}+Interior" 
         class="w-100 rounded-3 shadow-sm" style="height: 200px; object-fit: cover;" alt="{{ $cafe['name'] }}">
</div>

<!-- Info -->
<div class="container my-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <h5 class="fw-bold">{{ $cafe['name'] }}</h5>
            <div class="d-flex align-items-center text-warning small">
                @for($i = 1; $i <= 5; $i++)
                    <i class="bi {{ $i <= floor($cafe['rating']) ? 'bi-star-fill' : ($i <= $cafe['rating'] ? 'bi-star-half' : 'bi-star') }}"></i>
                @endfor
                <span class="text-dark ms-1">{{ $cafe['rating'] }} ({{ $cafe['reviews'] }} reviews)</span>
            </div>
        </div>
        <button class="btn btn-purple btn-sm rounded-pill">
            <i class="bi bi-heart-fill"></i>
        </button>
    </div>
    <p class="small text-muted">
        <strong>Description:</strong> {{ $cafe['desc'] }}
    </p>
</div>

<!-- Comments -->
<div class="container pb-6">
    <h6 class="fw-bold text-purple mb-3">Comments</h6>

    <div id="comments-list" class="space-y-4">
        <!-- JS isi -->
    </div>

    <!-- Add Comment -->
    <div class="mt-4 bg-white p-4 rounded-3 shadow-sm">
        <div class="d-flex align-items-start gap-3">
            <img src="https://via.placeholder.com/40/9333ea/ffffff?text=TW" 
                 class="rounded-circle flex-shrink-0" width="40" alt="Toto Wolf">
            <div class="flex-grow-1">
                <textarea id="comment-input" class="form-control form-control-sm mb-2" 
                          rows="2" placeholder="Add Comment..."></textarea>
                <button id="send-comment" class="btn btn-purple btn-sm w-100 rounded-pill">
                    Send
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const userName = "Toto Wolf";
    const commentsList = document.getElementById('comments-list');
    const commentInput = document.getElementById('comment-input');
    const sendButton = document.getElementById('send-comment');

    let comments = [
        { name: "The Brew House", text: "Great place for coffee lovers!", time: "2 days ago" },
        { name: "Aroma Deli Coffee", text: "Best latte in town, highly recommend!", time: "1 week ago" },
        { name: "Aroma Deli Coffee", text: "Cozy and calm, perfect for work", time: "2 weeks ago" }
    ];

    function renderComments() {
        commentsList.innerHTML = '';
        comments.forEach(c => {
            const el = document.createElement('div');
            el.className = 'bg-white p-4 rounded-3 shadow-sm mb-3';
            el.innerHTML = `
                <div class="d-flex align-items-start gap-3">
                    <img src="https://via.placeholder.com/40/9333ea/ffffff?text=${c.name[0]}" 
                         class="rounded-circle flex-shrink-0" width="40">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <div class="fw-bold small">${c.name}</div>
                            <div class="text-muted small">${c.time}</div>
                        </div>
                        <p class="small mb-0">${c.text}</p>
                    </div>
                </divńskiej
            `;
            commentsList.appendChild(el);
        });
    }

    sendButton.addEventListener('click', () => {
        const text = commentInput.value.trim();
        if (!text) return;
        comments.unshift({ name: userName, text, time: "Just now" });
        commentInput.value = '';
        renderComments();
    });

    commentInput.addEventListener('keypress', e => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendButton.click();
        }
    });

    renderComments();
});
</script>
@endpush