<!--// filepath: [create.blade.php](http://_vscodecontentref_/0)-->
<!-- created by Hafizhan Yusra Sulistyo - 5026231060 -->

@extends('layouts.app')
@section('title', 'Create Event')
@section('content')

<header class="bg-white shadow-sm p-3 sticky-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="{{ route('events.index') }}" class="text-purple">
            <i class="bi bi-arrow-left fs-4"></i>
        </a>
        <h1 class="h5 fw-bold text-purple">Create Event</h1>
        <img src="https://via.placeholder.com/40/9333ea/ffffff?text=ITS" class="rounded-circle" width="40">
    </div>
</header>

<div class="container mt-4">
    <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- UPLOAD GAMBAR -->
        <div class="mb-4">
            <label class="form-label fw-bold">Poster Event</label>
            <input name="image" type="file" class="form-control rounded-pill" accept="image/*">
            <div class="form-text">Maksimal 2MB • JPG, PNG, GIF</div>
            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Event Name:</label>
            <input name="title" type="text" class="form-control rounded-pill" placeholder="Enter event name" value="{{ old('title') }}" required>
            @error('title') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Department / Organizer:</label>
            <input name="organizer" type="text" class="form-control rounded-pill" placeholder="Enter department" value="{{ old('organizer') }}">
            @error('organizer') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Location:</label>
            <input name="location" type="text" class="form-control rounded-pill" placeholder="Location" value="{{ old('location') }}">
            @error('location') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Registration Link:</label>
            <input name="registration_link" type="url" class="form-control rounded-pill" placeholder="https://..." value="{{ old('registration_link') }}">
            @error('registration_link') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">File Link:</label>
            <input name="file_link" type="url" class="form-control rounded-pill" placeholder="https://..." value="{{ old('file_link') }}">
            @error('file_link') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="bg-white rounded-3 shadow-sm p-4 mb-3">
            <div class="row g-3">
                <div class="col-6">
                    <label class="small text-muted">Start Date</label>
                    <input type="date"
                           class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3"
                           name="start_date"
                           value="{{ old('start_date') ?? (old('start_time') ? \Carbon\Carbon::parse(old('start_time'))->format('Y-m-d') : '') }}">
                </div>
                <div class="col-6">
                    <label class="small text-muted">Start Time</label>
                    <input type="time"
                           class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3"
                           name="start_time"
                           value="{{ old('start_time') ? \Carbon\Carbon::parse(old('start_time'))->format('H:i') : (old('start_time') ?? '') }}">
                </div>

                <div class="col-6">
                    <label class="small text-muted">End Date</label>
                    <input type="date"
                           class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3"
                           name="end_date"
                           value="{{ old('end_date') ?? (old('end_time') ? \Carbon\Carbon::parse(old('end_time'))->format('Y-m-d') : '') }}">
                </div>
                <div class="col-6">
                    <label class="small text-muted">End Time</label>
                    <input type="time"
                           class="form-control rounded-pill border-0 shadow-sm bg-light-purple py-3"
                           name="end_time"
                           value="{{ old('end_time') ? \Carbon\Carbon::parse(old('end_time'))->format('H:i') : (old('end_time') ?? '') }}">
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold">Description:</label>
            <textarea name="description" class="form-control rounded-3" rows="4" placeholder="Write your description...">{{ old('description') }}</textarea>
            @error('description') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-purple w-100 rounded-pill shadow-lg py-3 fw-bold">Save</button>
    </form>
</div>
@endsection