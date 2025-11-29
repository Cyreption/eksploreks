@extends('layouts.app')

@section('content')
<div class="container-fluid p-0" style="background-color: #f3e8ff; min-height: 100vh; position: relative;">

    <!-- Header -->
    <div class="text-center py-3 mb-3"
        style="background: linear-gradient(to bottom, #cbb0ff, #e3ccff);
               border-bottom-left-radius: 20px;
               border-bottom-right-radius: 20px;
               box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
        <div class="d-flex align-items-center justify-content-start px-3 position-relative">
            <a href="/chat" class="text-white me-auto">
                <i class="bi bi-arrow-left fs-5"></i>
            </a>
            <h5 class="fw-bold text-white mb-0 position-absolute start-50 translate-middle-x">Connect!</h5>
        </div>
    </div>

    <!-- Profile Header -->
    <div class="d-flex align-items-center justify-content-between px-4 mb-3">
        <div class="d-flex align-items-center">
            <!-- Klik foto profil = ke /friendprofile -->
            <a href="{{ route('connect.friendProfile', $friend->user_id) }}" class="d-inline-block text-decoration-none">
                <img src="{{ $friend->avatar_url ?? 'https://api.dicebear.com/7.x/avataaars/svg?seed=' . urlencode($friend->username) }}"
                    alt="{{ $friend->full_name }}"
                    class="rounded-circle me-2"
                    style="width: 45px; height: 45px; object-fit: cover; transition: transform 0.2s ease;">
            </a>
            <div>
                <h6 class="fw-bold mb-0">{{ $friend->full_name }}</h6>
                <small class="text-muted">{{ $friend->institution ?? 'User' }}</small>
            </div>
        </div>
    </div>

    <!-- Chat Area -->
    <div id="chat-container-wrapper" style="padding-bottom: 110px;">
        <div id="chat-container" class="px-4 mb-5"
             style="overflow-y: auto; max-height: calc(100vh - 220px);">
            
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
    <div class="position-fixed bottom-0 start-0 end-0 pb-3 px-3"
         style="max-width: 430px; margin: 0 auto; background-color: transparent; z-index: 1050;">
        <div class="d-flex align-items-center bg-white rounded-pill shadow-sm px-3 py-2"
             id="messageBox"
             style="background-color: #d2b6ff;">
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
