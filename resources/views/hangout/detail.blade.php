@extends('layouts.app')

@section('title', 'Coffee Shop Detail')

@section('content')
<!-- Header -->
<header class="bg-white shadow-sm p-3 sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="{{ route('hangout') }}" class="text-purple">
            <i class="bi bi-arrow-left fs-4"></i>
        </a>
        <h1 class="h6 fw-bold text-purple">HangOut!</h1>
        <a href="#" class="text-purple">
            <i class="bi bi-share fs-4"></i>
        </a>
    </div>
</header>

<!-- Shop Image -->
<div class="container-fluid px-0 mt-3">
    <img src="https://via.placeholder.com/600x400/9333ea/ffffff?text=Coffee+Shop+Interior" 
         class="w-100 rounded-3 shadow-sm" alt="Goodfellow's Cafe">
</div>

<!-- Shop Info -->
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-start">
        <div>
            <h5 class="fw-bold">Goodfellow's Cafe</h5>
            <div class="d-flex align-items-center text-warning small mb-1">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
                <span class="text-dark ms-1">4.5 (120 reviews)</span>
            </div>
        </div>
        <button class="btn btn-purple btn-sm rounded-pill">
            <i class="bi bi-heart"></i>
        </button>
    </div>

    <div class="mt-3">
        <p class="small text-muted">
            <strong>Description:</strong> Cozy place to enjoy coffee, work, or hang out with friends. Great ambiance and friendly staff.
        </p>
    </div>
</div>

<!-- Ratings -->
<div class="container">
    <h6 class="fw-bold text-purple mb-3">Ratings</h6>
    <div class="bg-white p-3 rounded-3 shadow-sm">
        <div class="d-flex justify-content-between mb-2">
            <span class="small text-muted">Price</span>
            <div class="text-warning small"><i class="bi bi-star-fill"></i> 4.0</div>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <span class="small text-muted">Location</span>
            <div class="text-warning small"><i class="bi bi-star-fill"></i> 4.8</div>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <span class="small text-muted">Service</span>
            <div class="text-warning small"><i class="bi bi-star-fill"></i> 4.6</div>
        </div>
    </div>
</div>

<!-- Comments -->
<div class="container mt-5 pb-6">
    <h6 class="fw-bold text-purple mb-4">Comments</h6>

    <!-- Daftar Komentar (akan diisi via JS) -->
    <div id="comments-list" class="space-y-4">
        <!-- Komentar akan muncul di sini -->
    </div>

    <!-- Add Comment -->
    <div class="mt-5 bg-white p-4 rounded-3 shadow-sm">
        <div class="d-flex align-items-start gap-3">
            <img src="https://via.placeholder.com/40/9333ea/ffffff?text=TW" 
                 class="rounded-circle flex-shrink-0" width="40" alt="User">
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

{{-- JavaScript untuk Add Comment & Tampil di Atas --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const userName = "Toto Wolf"; // Nanti dari session/auth
    const userAvatar = "https://via.placeholder.com/40/9333ea/ffffff?text=TW";
    const commentsList = document.getElementById('comments-list');
    const commentInput = document.getElementById('comment-input');
    const sendButton = document.getElementById('send-comment');

    // Data komentar awal
    let comments = [
        { name: "Mas Rusdi", text: "Great coffee and cozy atmosphere!", time: "2 days ago" },
        { name: "Mas Gatot", text: "Best place for latte and work!", time: "1 week ago" },
        { name: "Mas Amba", text: "Jangan Lupa Boboboy Kuasa 3", time: "3 weeks ago" }
    ];

    // Render semua komentar
    function renderComments() {
        commentsList.innerHTML = '';
        comments.forEach(comment => {
            const commentEl = document.createElement('div');
            commentEl.className = 'bg-white p-4 rounded-3 shadow-sm';
            commentEl.innerHTML = `
                <div class="d-flex align-items-start gap-3">
                    <img src="https://via.placeholder.com/40/9333ea/ffffff?text=${comment.name.charAt(0)}" 
                         class="rounded-circle flex-shrink-0" width="40">
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <div class="fw-bold small">${comment.name}</div>
                            <div class="text-muted small">${comment.time}</div>
                        </div>
                        <p class="small mb-0">${comment.text}</p>
                    </div>
                </div>
            `;
            commentsList.appendChild(commentEl);
        });
    }

    // Kirim komentar baru
    sendButton.addEventListener('click', function () {
        const text = commentInput.value.trim();
        if (!text) return;

        // Tambah komentar baru di ATAS
        comments.unshift({
            name: userName,
            text: text,
            time: "Just now"
        });

        commentInput.value = '';
        renderComments();
    });

    // Enter juga bisa kirim
    commentInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendButton.click();
        }
    });

    // Render pertama kali
    renderComments();
});
</script>
@endpush