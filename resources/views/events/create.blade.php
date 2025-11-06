@extends('layouts.app')
@section('title', 'Create Event')
@section('content')

<!-- Header -->
<header class="bg-white shadow-sm p-3 sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="/events" class="text-purple">
            <i class="bi bi-arrow-left fs-4"></i>
        </a>
        <h1 class="h5 fw-bold text-purple">Create Event</h1>
        <img src="https://via.placeholder.com/40/9333ea/ffffff?text=ITS" class="rounded-circle" width="40">
    </div>
</header>

<div class="container mt-4 pb-6">
    <form>
        <div class="mb-4">
            <img src="https://via.placeholder.com/400x200/9333ea/ffffff?text=SOCCER+FIELD" class="img-fluid rounded-3 shadow-sm" alt="Event Image">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Event Name:</label>
            <input type="text" class="form-control rounded-pill" placeholder="Enter event name">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Department:</label>
            <input type="text" class="form-control rounded-pill" placeholder="Enter department">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Registration Links:</label>
            <input type="url" class="form-control rounded-pill" placeholder="https://...">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Add File:</label>
            <input type="file" class="form-control rounded-pill">
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Description:</label>
            <textarea class="form-control rounded-3" rows="4" placeholder="Write your description..."></textarea>
        </div>

        <button type="submit" class="btn btn-purple w-100 rounded-pill shadow-lg py-3 fw-bold">Save</button>
    </form>
</div>
@endsection