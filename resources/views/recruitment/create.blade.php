{{-- resources/views/recruitment/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Buat Recruitment')

@section('content')
<div class="bg-purple-light text-black">
    <div class="container py-4 position-relative">
        <div class="d-flex align-items-center justify-content-center position-relative">
            <a href="javascript:history.back()" 
               class="position-absolute start-0 d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
               style="background-color: #70539A; width: 44px; height: 44px; left: 12px; z-index: 10;">
                <i class="bi bi-arrow-left fs-4"></i>
            </a>
            <h5 class="mb-0 fw-bold">Buat Recruitment</h5>
            <div class="position-absolute end-0" style="right: 12px;">
                <img src="{{ asset('logo.png') }}" alt="Logo" width="33" height="44">
            </div>
        </div>
    </div>
</div>

<div class="container py-4 pb-6">
    <form action="{{ route('recruitment.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Judul Recruitment</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Organization -->
        <div class="mb-3">
            <label for="organization" class="form-label fw-bold">Organisasi</label>
            <input type="text" class="form-control @error('organization') is-invalid @enderror" id="organization" name="organization" value="{{ old('organization') }}" required>
            @error('organization')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Location -->
        <div class="mb-3">
            <label for="location" class="form-label fw-bold">Lokasi</label>
            <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" value="{{ old('location') }}" required>
            @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Deadline -->
        <div class="mb-3">
            <label for="deadline" class="form-label fw-bold">Deadline</label>
            <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ old('deadline') }}">
            @error('deadline')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Application Link -->
        <div class="mb-3">
            <label for="application_link" class="form-label fw-bold">Link Aplikasi / Form</label>
            <input type="url" class="form-control @error('application_link') is-invalid @enderror" id="application_link" name="application_link" value="{{ old('application_link') }}" placeholder="https://...">
            @error('application_link')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- File Link -->
        <div class="mb-3">
            <label for="file_link" class="form-label fw-bold">Link File / Dokumen</label>
            <input type="url" class="form-control @error('file_link') is-invalid @enderror" id="file_link" name="file_link" value="{{ old('file_link') }}" placeholder="https://...">
            @error('file_link')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Gambar</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
            <small class="text-muted">Format: JPEG, PNG, JPG, GIF. Max 2MB</small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary w-50">
                <i class="bi bi-plus-circle"></i> Buat
            </button>
            <a href="{{ route('recruitment.index') }}" class="btn btn-secondary w-50">
                <i class="bi bi-x-circle"></i> Batal
            </a>
        </div>
    </form>
</div>
@endsection
