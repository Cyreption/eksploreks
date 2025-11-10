@extends('layouts.app')
@section('title', 'Events')
@section('content')

// created by Hafizhan Yusra Sulistyo - 5026231060
<!-- Header -->
<header class="bg-white shadow-sm p-3 sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="/dashboard" class="text-purple">
            <i class="bi bi-arrow-left fs-4"></i>
        </a>
        <h1 class="h5 fw-bold text-purple">Event in ITS!</h1>
        <img src="https://via.placeholder.com/40/9333ea/ffffff?text=ITS" class="rounded-circle" width="40">
    </div>
</header>

<!-- Search -->
<div class="container mt-3">
    <div class="input-group rounded-pill shadow-sm overflow-hidden">
        <input type="text" class="form-control border-0 ps-4" placeholder="Search ...">
        <span class="input-group-text border-0 bg-transparent">
            <i class="bi bi-search text-purple"></i>
        </span>
    </div>
</div>

<!-- Event List -->
<div class="container mt-4 pb-6">
    <!-- Event 1 -->
    <a href="{{ route('events.show', 1) }}" class="text-decoration-none d-block mb-3">
        <div class="card border-0 shadow-sm overflow-hidden">
            <div class="row g-0">
                <div class="col-4">
                    <img src="https://via.placeholder.com/150/9333ea/ffffff?text=TUG" class="img-fluid rounded-start h-100" style="object-fit: cover;">
                </div>
                <div class="col-8">
                    <div class="card-body py-3">
                        <h6 class="fw-bold mb-1">Diesnat HMSI</h6>
                        <p class="text-muted small mb-1">Information Systems</p>
                        <p class="small text-muted">Diesnat HMSI is a lively celebration featuring a series of exciting competitions and activities.</p>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Event 2 -->
    <a href="{{ route('events.show', 2) }}" class="text-decoration-none d-block mb-3">
        <div class="card border-0 shadow-sm overflow-hidden">
            <div class="row g-0">
                <div class="col-4">
                    <img src="https://via.placeholder.com/150/9333ea/ffffff?text=VALO" class="img-fluid rounded-start h-100" style="object-fit: cover;">
                </div>
                <div class="col-8">
                    <div class="card-body py-3">
                        <h6 class="fw-bold mb-1">Valo Competition</h6>
                        <p class="text-muted small mb-1">Informatics</p>
                        <p class="small text-muted">An intense Valorant tournament where teams compete in strategy, aim, and teamwork.</p>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Event 3 -->
    <a href="{{ route('events.show', 3) }}" class="text-decoration-none d-block mb-3">
        <div class="card border-0 shadow-sm overflow-hidden">
            <div class="row g-0">
                <div class="col-4">
                    <img src="https://via.placeholder.com/150/9333ea/ffffff?text=SOCCER" class="img-fluid rounded-start h-100" style="object-fit: cover;">
                </div>
                <div class="col-8">
                    <div class="card-body py-3">
                        <h6 class="fw-bold mb-1">Mini Soccer</h6>
                        <p class="text-muted small mb-1">Electro</p>
                        <p class="small text-muted">A friendly, yet competitive mini soccer match that brings together teams.</p>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Floating + Button -->
    <a href="/events/create" class="btn btn-purple rounded-circle shadow-lg position-fixed bottom-0 end-0 m-4 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; z-index: 100;">
        <i class="bi bi-plus fs-1"></i>
    </a>
</div>
@endsection