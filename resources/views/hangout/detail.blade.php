@extends('layouts.app')

@section('title', '{{ $place["name"] }}')

@section('content')

<!-- Author: Satria Pinandita (5026231004) -->

<!-- Header -->
<div class="bg-purple-light text-white">
    <div class="container-fluid py-4 position-relative px-0">
        <div class="d-flex align-items-center justify-content-center position-relative">
            <!-- Tombol Back: kembali ke daftar hangout -->
            <a href="{{ route('hangout') }}"
               class="position-absolute start-0 d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
               style="background-color: #70539A; width: 44px; height: 44px; left: 0; z-index: 10; margin-left: 12px;">
                <i class="bi bi-arrow-left fs-4"></i>
            </a>

            <!-- Judul HangOut! — di tengah & tebal & putih -->
            <h5 class="mb-0 fw-bold text-white">{{ $place['name'] }}</h5>

            <!-- Logo di kanan -->
            <div class="position-absolute end-0" style="right: 0; margin-right: 12px;">
                <img src="{{ asset('images/logo-pin-purple.png') }}" alt="Logo" width="33" height="44">
            </div>
        </div>
    </div>
</div>

<!-- Shop Image -->
<div class="container-fluid px-0 mt-3">
    <img src="{{ asset('uploads/' . $place['image']) }}" 
         class="w-100 rounded-3 shadow-sm" alt="{{ $place['name'] }}" style="height: 250px; object-fit: cover;"
         onerror="this.src='https://via.placeholder.com/600x400/9333ea/ffffff?text={{ urlencode($place['name']) }}'">
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
        <button id="like-btn" class="btn btn-sm rounded-pill like-button" data-place-id="{{ $place['place_id'] }}" data-is-liked="{{ $isLiked ? 'true' : 'false' }}">
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
<div class="container mt-5">
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
                        <div class="text-warning small mb-2">
                            @for($i = 0; $i < 5; $i++)
                                {{ $i < $comment['rating'] ? '★' : '☆' }}
                            @endfor
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
                <!-- Rating Stars -->
                <div class="mb-3">
                    <label class="small text-muted d-block mb-2">Rating:</label>
                    <div id="rating-stars" class="text-warning">
                        <span class="star" data-rating="1" style="cursor: pointer; font-size: 1.5rem;">☆</span>
                        <span class="star" data-rating="2" style="cursor: pointer; font-size: 1.5rem;">☆</span>
                        <span class="star" data-rating="3" style="cursor: pointer; font-size: 1.5rem;">☆</span>
                        <span class="star" data-rating="4" style="cursor: pointer; font-size: 1.5rem;">☆</span>
                        <span class="star" data-rating="5" style="cursor: pointer; font-size: 1.5rem;">☆</span>
                    </div>
                    <input type="hidden" id="selected-rating" name="rating" value="5">
                </div>
                
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
    const ratingStars = document.querySelectorAll('#rating-stars .star');
    const selectedRatingInput = document.getElementById('selected-rating');

    // Rating stars functionality
    ratingStars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.dataset.rating;
            selectedRatingInput.value = rating;
            
            // Update visual
            ratingStars.forEach(s => {
                if (s.dataset.rating <= rating) {
                    s.textContent = '★';
                } else {
                    s.textContent = '☆';
                }
            });
        });
        
        // Hover effect
        star.addEventListener('mouseover', function() {
            const hoverRating = this.dataset.rating;
            ratingStars.forEach(s => {
                if (s.dataset.rating <= hoverRating) {
                    s.textContent = '★';
                } else {
                    s.textContent = '☆';
                }
            });
        });
    });
    
    // Reset stars on mouse leave
    document.getElementById('rating-stars').addEventListener('mouseleave', function() {
        const currentRating = selectedRatingInput.value;
        ratingStars.forEach(s => {
            if (s.dataset.rating <= currentRating) {
                s.textContent = '★';
            } else {
                s.textContent = '☆';
            }
        });
    });

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
    sendButton.addEventListener('click', function () {
        const text = commentInput.value.trim();
        const rating = parseInt(selectedRatingInput.value) || 5;
        
        if (!text) {
            alert('Silakan masukkan komentar');
            return;
        }

        const placeId = likeBtn.dataset.placeId;

        // Send to backend
        fetch(`/hangout/${placeId}/review`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
            },
            body: JSON.stringify({
                comment: text,
                rating: rating
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Tambah komentar baru ke UI
                const newComment = document.createElement('div');
                newComment.className = 'bg-white p-4 rounded-3 shadow-sm mb-3';
                
                // Generate stars properly
                const stars = [];
                for (let i = 0; i < 5; i++) {
                    stars.push(i < data.review.rating ? '★' : '☆');
                }
                const starsHtml = stars.join('');
                
                newComment.innerHTML = `
                    <div class="d-flex align-items-start gap-3">
                        <img src="https://ui-avatars.com/api/?name=${encodeURIComponent(data.review.user_name)}&background=9333ea&color=fff&size=40" 
                             class="rounded-circle shrink-0" width="40" alt="${data.review.user_name}">
                        <div class="grow">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <div class="fw-bold small">${data.review.user_name}</div>
                                <div class="text-muted small">${data.review.created_at}</div>
                            </div>
                            <div class="text-warning small mb-2">
                                ${starsHtml}
                            </div>
                            <p class="small mb-0">${data.review.comment}</p>
                        </div>
                    </div>
                `;
                
                // Tambah di atas list
                commentsList.insertBefore(newComment, commentsList.firstChild);
                commentInput.value = '';
                selectedRatingInput.value = '5';
                
                // Reset stars visual
                ratingStars.forEach(s => {
                    if (s.dataset.rating <= 5) {
                        s.textContent = '★';
                    } else {
                        s.textContent = '☆';
                    }
                });
                
                // Success notification without alert
                console.log('Review berhasil ditambahkan!');
            } else {
                console.error(data.message || 'Gagal menyimpan review');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menyimpan review');
        });
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