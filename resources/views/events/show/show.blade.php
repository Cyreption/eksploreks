@extends('layouts.app')
@section('title', 'Event Detail')
@section('content')

// created by Hafizhan Yusra Sulistyo - 5026231060
<!-- Header -->
<header class="bg-white shadow-sm p-3 sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="/events" class="text-purple">
            <i class="bi bi-arrow-left fs-4"></i>
        </a>
        <h1 class="h5 fw-bold text-purple">Event in ITS!</h1>
        <img src="https://via.placeholder.com/40/9333ea/ffffff?text=ITS" class="rounded-circle" width="40">
    </div>
</header>

<div class="container mt-4 pb-6">
    <h4 class="fw-bold">Diesnat HMSI</h4>
    <p class="text-muted">Information Systems</p>
    <p class="text-muted small">30/March/2025</p>

    <img src="https://via.placeholder.com/400x200/9333ea/ffffff?text=TUG+OF+WAR" class="img-fluid rounded-3 shadow-sm mb-4" alt="Event">

    <p class="mb-4">
        Diesnat HMSI is a lively celebration featuring a series of exciting competitions and activities. Participants can look forward to traditional games like tug of war, as well as modern challenges including esports tournaments and basketball matches. It's a great opportunity to build teamwork, show your competitive spirit, and have fun with fellow students!
    </p>

    <h6 class="fw-bold mb-3">Registration Link</h6>
    <a href="#" class="btn btn-purple w-100 rounded-pill shadow-lg py-3 fw-bold">Download File</a>
</div>
@endsection