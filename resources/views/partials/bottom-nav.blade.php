<nav class="bottom-navigation">
    <a href="{{ route('dashboard') }}" class="nav-item">
        <i class="bi bi-house"></i>
    </a>
    <a href="#" class="nav-item">
        <i class="bi bi-heart"></i>
    </a>
    <a href="{{ route('calendar.index') }}" class="nav-item active">
        <i class="bi bi-list"></i>
    </a>
    <a href="#" class="nav-item">
        <i class="bi bi-person"></i>
    </a>
</nav>

<style>
.bottom-navigation {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(216, 180, 254, 0.8);
    backdrop-filter: blur(10px);
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 15px 0;
    border-top: 1px solid rgba(167, 139, 250, 0.3);
}

.nav-item {
    color: #6B7280;
    font-size: 28px;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 15px;
    transition: all 0.3s ease;
}

.nav-item.active,
.nav-item:hover {
    color: #7C3AED;
    background: rgba(255, 255, 255, 0.3);
}
</style>
