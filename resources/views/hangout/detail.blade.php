@extends('layouts.app')

@section('title', '{{ $place["name"] }}')

@section('content')
<!-- Header -->
<header class="bg-white shadow-sm p-3 sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="{{ route('hangout') }}" class="text-purple">
            <i class="bi bi-arrow-left fs-4"></i>
        </a>
        <h1 class="h6 fw-bold text-purple">{{ $place['name'] }}</h1>
        <a href="#" class="text-purple">
            <i class="bi bi-share fs-4"></i>
        </a>
    </div>
</header>

<!-- Shop Image -->
<div class="container-fluid px-0 mt-3">
    <img src="{{ $place['image'] }}" 
         class="w-100 rounded-3 shadow-sm" alt="{{ $place['name'] }}" style="height: 250px; object-fit: cover;"
         onerror="this.src='https://via.placeholder.com/600x400/9333ea/ffffff?text={{ urlencode($place["name"]) }}'">
</div>

<!-- Shop Info -->
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-start">
        <div>
            <h5 class="fw-bold">{{ $place['name'] }}</h5>
            <div class="d-flex align-items-center text-warning small mb-1">
                @for($i = 0; $i < floor($place['rating']); $i++)
                    <i class="bi bi-star-fill"></i>
                @endfor
                @if($place['rating'] % 1 != 0)
                    <i class="bi bi-star-half"></i>
                @endif
                <span class="text-dark ms-1">{{ $place['rating'] }} ({{ $place['reviews'] }} reviews)</span>
            </div>
        </div>
        <button id="like-btn" class="btn btn-sm rounded-pill like-button" data-place-id="{{ $place['id'] }}" data-is-liked="{{ $isLiked ? 'true' : 'false' }}">
            <i class="bi bi-heart{{ $isLiked ? '-fill' : '' }}"></i>
        </button>
    </div>

    <div class="mt-3">
        <p class="small text-muted mb-2">
            <i class="bi bi-geo-alt"></i> <strong>{{ $place['address'] }}</strong>
        </p>
        <p class="small text-muted mb-2">
            <i class="bi bi-arrow-repeat"></i> <strong>{{ $place['distance'] }} away</strong>
        </p>
        <p class="small text-muted">
            <strong>Description:</strong> {{ $place['description'] }}
        </p>
    </div>
</div>

<!-- Ratings -->
<div class="container">
    <h6 class="fw-bold text-purple mb-3">Ratings</h6>
    <div class="bg-white p-3 rounded-3 shadow-sm">
        <div class="d-flex justify-content-between mb-2">
            <span class="small text-muted">Price</span>
            <div class="text-warning small">
                @for($i = 0; $i < floor($place['price_rating']); $i++)
                    <i class="bi bi-star-fill"></i>
                @endfor
                {{ $place['price_rating'] }}
            </div>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <span class="small text-muted">Location</span>
            <div class="text-warning small">
                @for($i = 0; $i < floor($place['location_rating']); $i++)
                    <i class="bi bi-star-fill"></i>
                @endfor
                {{ $place['location_rating'] }}
            </div>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <span class="small text-muted">Service</span>
            <div class="text-warning small">
                @for($i = 0; $i < floor($place['service_rating']); $i++)
                    <i class="bi bi-star-fill"></i>
                @endfor
                {{ $place['service_rating'] }}
            </div>
        </div>
    </div>
</div>

<!-- Comments -->
<div class="container mt-5 pb-6">
    <h6 class="fw-bold text-purple mb-4">Comments</h6>

    <!-- Daftar Komentar -->
    <div id="comments-list">
        @foreach($comments as $comment)
            <div class="bg-white p-4 rounded-3 shadow-sm mb-3">
                <div class="d-flex align-items-start gap-3">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($comment['name']) }}&background=9333ea&color=fff&size=40" 
                         class="rounded-circle shrink-0" width="40" alt="{{ $comment['name'] }}">
                    <div class="grow">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <div class="fw-bold small">{{ $comment['name'] }}</div>
                            <div class="text-muted small">{{ $comment['time'] }}</div>
                        </div>
                        <p class="small mb-0">{{ $comment['text'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Add Comment -->
    <div class="mt-5 bg-white p-4 rounded-3 shadow-sm">
        <div class="d-flex align-items-start gap-3">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(session('user.full_name') ?? 'U') }}&background=9333ea&color=fff&size=40" 
                 class="rounded-circle shrink-0" width="40" alt="User">
            <div class="grow w-100">
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

{{-- JavaScript untuk Like Button & Add Comment --}}
@push('scripts')
<style>
    .like-button {
        transition: all 0.3s ease;
        color: #999999;
        border: 2px solid #999999;
        background-color: white;
    }

    .like-button:hover {
        transform: scale(1.15);
        color: #d92d3f;
        border-color: #d92d3f;
    }

    .like-button[data-is-liked="true"] {
        color: #d92d3f;
        border-color: #d92d3f;
        background-color: #ffe6ea;
    }

    .like-button[data-is-liked="true"]:hover {
        background-color: #ffd4e0;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const userName = "{{ session('user.full_name') ?? 'Guest' }}";
    const likeBtn = document.getElementById('like-btn');
    const commentInput = document.getElementById('comment-input');
    const sendButton = document.getElementById('send-comment');
    const commentsList = document.getElementById('comments-list');

    // Like button functionality
    if (likeBtn) {
        likeBtn.addEventListener('click', function () {
            const placeId = this.dataset.placeId;
            const isLiked = this.dataset.isLiked === 'true';

            fetch(`/hangout/${placeId}/like`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update button state
                    likeBtn.dataset.isLiked = data.isLiked;
                    const icon = likeBtn.querySelector('i');
                    if (data.isLiked) {
                        icon.classList.add('bi-heart-fill');
                        icon.classList.remove('bi-heart');
                    } else {
                        icon.classList.remove('bi-heart-fill');
                        icon.classList.add('bi-heart');
                    }
                }
            });
        });
    }

    // Add comment functionality
    let userComments = [];

    sendButton.addEventListener('click', function () {
        const text = commentInput.value.trim();
        if (!text) return;

        // Tambah komentar baru
        const newComment = document.createElement('div');
        newComment.className = 'bg-white p-4 rounded-3 shadow-sm mb-3';
        newComment.innerHTML = `
            <div class="d-flex align-items-start gap-3">
                <img src="https://ui-avatars.com/api/?name=${encodeURIComponent(userName)}&background=9333ea&color=fff&size=40" 
                     class="rounded-circle shrink-0" width="40" alt="${userName}">
                <div class="grow">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="fw-bold small">${userName}</div>
                        <div class="text-muted small">Just now</div>
                    </div>
                    <p class="small mb-0">${text}</p>
                </div>
            </div>
        `;

        // Tambah di atas list
        commentsList.insertBefore(newComment, commentsList.firstChild);
        commentInput.value = '';
    });

    // Enter untuk send comment
    commentInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendButton.click();
        }
    });
});
</script>
@endpush