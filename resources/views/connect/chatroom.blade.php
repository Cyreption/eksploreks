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
            <a href="/friendprofile" class="d-inline-block text-decoration-none">
                <img src="https://api.dicebear.com/6.x/avataaars/svg?seed=TotoWolff"
                    alt="Profile"
                    class="rounded-circle me-2"
                    style="width: 45px; height: 45px; object-fit: cover; transition: transform 0.2s ease;">
            </a>
            <div>
                <h6 class="fw-bold mb-0">Toto Wolff</h6>
                <small class="text-muted">18.40</small>
            </div>
        </div>
    </div>

    <!-- Chat Area -->
    <div id="chat-container-wrapper" style="padding-bottom: 110px;">
        <div id="chat-container" class="px-4 mb-5"
             style="overflow-y: auto; max-height: calc(100vh - 220px);">
            <div class="d-flex mb-3">
                <div class="p-2 px-3 rounded-4" style="background-color: #fff; color: #000; max-width: 75%;">
                    halooo
                </div>
                <small class="text-muted align-self-end ms-2" style="font-size: 12px;">18.18</small>
            </div>

            <div class="d-flex justify-content-end mb-3">
                <small class="text-muted align-self-end me-2" style="font-size: 12px;">18.20</small>
                <div class="p-2 px-3 rounded-4" style="background-color: #e9d5ff; color: #000; max-width: 75%;">
                    y
                </div>
            </div>

            <div class="d-flex mb-3">
                <div class="p-2 px-3 rounded-4" style="background-color: #fff; color: #000; max-width: 75%;">
                    sendirian bae nih neng??
                </div>
                <small class="text-muted align-self-end ms-2" style="font-size: 12px;">18.20</small>
            </div>

            <div class="d-flex justify-content-end mb-4">
                <small class="text-muted align-self-end me-2" style="font-size: 12px;">19.44</small>
                <div class="p-2 px-3 rounded-4" style="background-color: #e9d5ff; color: #000; max-width: 75%;">
                    byeee
                </div>
            </div>
        </div>
    </div>

    <!-- Typing + Send Message Box -->
    <div class="position-fixed bottom-0 start-0 end-0 pb-3 px-3"
         style="max-width: 430px; margin: 0 auto; background-color: transparent; z-index: 1050;">
        <div class="d-flex align-items-center bg-white rounded-pill shadow-sm px-3 py-2"
             id="messageBox"
             style="background-color: #d2b6ff;">
            <input type="text"
                   id="messageInput"
                   class="form-control border-0 bg-transparent fw-semibold text-dark"
                   placeholder="Add Text...."
                   autocomplete="off"
                   aria-label="Type a message">
            <button id="sendBtn" class="btn border-0 p-0 ms-2 text-dark" aria-label="Send message">
                <i class="bi bi-send-fill fs-5"></i>
            </button>
        </div>
    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const chatContainer = document.getElementById("chat-container");
    const messageInput = document.getElementById("messageInput");
    const sendBtn = document.getElementById("sendBtn");

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

    sendBtn.addEventListener("click", sendMessage);
    messageInput.addEventListener("keypress", function(e) {
        if (e.key === "Enter") {
            e.preventDefault();
            sendMessage();
        }
    });

    function sendMessage() {
        const msg = messageInput.value.trim();
        if (!msg) return;

        const now = new Date();
        const hh = String(now.getHours()).padStart(2, '0');
        const mm = String(now.getMinutes()).padStart(2, '0');
        const time = `${hh}.${mm}`;

        const wrapper = document.createElement("div");
        wrapper.className = "d-flex justify-content-end mb-3";

        const timeElem = document.createElement("small");
        timeElem.className = "text-muted align-self-end me-2";
        timeElem.style.fontSize = "12px";
        timeElem.textContent = time;

        const bubble = document.createElement("div");
        bubble.className = "p-2 px-3 rounded-4";
        bubble.style.backgroundColor = "#e9d5ff";
        bubble.style.color = "#000";
        bubble.style.maxWidth = "75%";
        bubble.innerHTML = escapeHtml(msg);

        wrapper.appendChild(timeElem);
        wrapper.appendChild(bubble);
        chatContainer.appendChild(wrapper);

        messageInput.value = "";
        messageInput.focus();
        scrollToBottom();
    }

    function escapeHtml(str) {
        return str.replace(/[&<>"'`=\/]/g, function (s) {
            return ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;',
                '/': '&#x2F;',
                '=': '&#x3D;',
                '`': '&#x60;'
            })[s];
        });
    }

    if (chatContainer) {
        chatContainer.addEventListener('click', () => {
            messageInput.focus();
        });
    }
});
</script>
@endsection
