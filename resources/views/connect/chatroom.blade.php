<!-- Author: Nashita Aulia (5026231054) --> 

@extends('layouts.app')

@section('content')
<style>
    .profile-header-section {
        padding: 1.5rem 1rem;
        background: transparent;
    }

    #chat-container-wrapper {
        background: transparent;
    }

    #chat-container {
        overflow-y: auto;
        max-height: calc(100vh - 280px);
        padding: 1rem;
    }

    .message-input-box {
        position: fixed;
        bottom: 90px;
        left: 0;
        right: 0;
        max-width: 430px;
        margin: 0 auto;
        background-color: transparent;
        z-index: 50;
        padding: 1rem;
    }

    @media (max-width: 480px) {
        #chat-container {
            max-height: calc(100vh - 300px);
        }
    }
</style>

<!-- Header -->
<div class="bg-purple-light text-white">
        <div class="container-fluid py-4 position-relative px-0">
            <div class="d-flex align-items-center justify-content-center position-relative">
                <!-- Tombol Back: Lingkaran #70539A + panah putih -->
                <a href="/chat" 
                   class="position-absolute start-0 d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
                   style="background-color: #70539A; width: 44px; height: 44px; left: 0; z-index: 10; margin-left: 12px;">
                    <i class="bi bi-arrow-left fs-4"></i>
                </a>

                <!-- Judul Connect! — di tengah & tebal & putih -->
                <h5 class="mb-0 fw-bold text-white">Connect!</h5>

                <!-- Logo di kanan -->
                <div class="position-absolute end-0" style="right: 0; margin-right: 12px;">
                    <img src="{{ asset('images/logo-pin-purple.png') }}" alt="Logo" width="33" height="44">
                </div>
            </div>
        </div>
    </div>

    <!-- Profile Header -->
    <div class="profile-header-section">
        <div class="d-flex align-items-center">
            <img src="{{ App\Helpers\AvatarHelper::getAvatarUrl($friend->avatar_url, $friend->username, $friend->full_name) }}"
                alt="{{ $friend->full_name }}"
                class="rounded-circle me-3"
                style="width: 50px; height: 50px; object-fit: cover;">
            <div>
                <h6 class="fw-bold mb-1">{{ $friend->full_name }}</h6>
                <small class="text-muted">{{ $friend->institution ?? 'User' }}</small>
            </div>
        </div>
    </div>

    <!-- Chat Area -->
    <div id="chat-container-wrapper">
        <div id="chat-container">
            @forelse ($messages as $msg)
                @php
                    $isSent = $msg->sender_id == session('user_id');
                    $msgTime = $msg->created_at ? $msg->created_at->setTimezone('Asia/Jakarta')->format('H:i') : 'now';
                @endphp
                
                @if ($isSent)
                    <!-- Sent Message (Right) -->
                    <div class="d-flex justify-content-end mb-3">
                        <small class="text-muted align-self-end me-2" style="font-size: 12px;">{{ $msgTime }}</small>
                        <div class="p-2 px-3 rounded-4" style="background-color: #e9d5ff; color: #000; max-width: 75%; word-wrap: break-word;">
                            {{ $msg->message ?? $msg->content }}
                        </div>
                    </div>
                @else
                    <!-- Received Message (Left) -->
                    <div class="d-flex mb-3">
                        <div class="p-2 px-3 rounded-4" style="background-color: #fff; color: #000; max-width: 75%; word-wrap: break-word;">
                            {{ $msg->message ?? $msg->content }}
                        </div>
                        <small class="text-muted align-self-end ms-2" style="font-size: 12px;">{{ $msgTime }}</small>
                    </div>
                @endif
            @empty
                <div style="text-align: center; padding: 2rem; color: #9ca3af;">
                    <i class="bi bi-chat-left-text" style="font-size: 2rem; display: block; margin-bottom: 1rem;"></i>
                    <p>Mulai percakapan dengan {{ $friend->full_name }}</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Typing + Send Message Box -->
    <div class="message-input-box">
        <div class="d-flex align-items-center bg-white rounded-pill shadow-sm px-3 py-2"
             id="messageBox">
            <form action="{{ route('chat.send', $friendId) }}" method="POST" style="display: flex; width: 100%; gap: 0.5rem;">
                @csrf
                <input type="text"
                       name="message"
                       id="messageInput"
                       class="form-control border-0 bg-transparent fw-semibold text-dark"
                       placeholder="Add Text...."
                       autocomplete="off"
                       aria-label="Type a message"
                       required>
                <button type="submit" id="sendBtn" class="btn border-0 p-0 text-dark" aria-label="Send message">
                    <i class="bi bi-send-fill fs-5"></i>
                </button>
            </form>
        </div>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const chatContainer = document.getElementById("chat-container");
    const messageInput = document.getElementById("messageInput");

    function scrollToBottom() {
        if (chatContainer) chatContainer.scrollTop = chatContainer.scrollHeight;
    }
    scrollToBottom();

    messageInput.addEventListener('focus', () => {
        setTimeout(() => {
            messageInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
            scrollToBottom();
        }, 300);
    });

    if (chatContainer) {
        chatContainer.addEventListener('click', () => {
            messageInput.focus();
        });
    }
});
</script>

@endsection
