@extends('layouts.app')

@section('title', 'Recruitment Center - Eksploreks')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="text-white fw-bold mb-2">Recruitment Center</h1>
            <p class="text-white opacity-75">Manage all your recruitment positions and applicants</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('recruitments.create') }}" class="btn btn-light btn-lg">
                <i class="bi bi-plus-circle me-2"></i>Create New Position
            </a>
        </div>
    </div>
    
    <!-- Filter & Search -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-body p-3">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control" placeholder="Search positions...">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option selected>All Departments</option>
                                <option>Engineering</option>
                                <option>Marketing</option>
                                <option>Sales</option>
                                <option>HR</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select">
                                <option selected>All Status</option>
                                <option>Open</option>
                                <option>Closed</option>
                                <option>In Review</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary w-100">
                                <i class="bi bi-funnel me-2"></i>Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recruitment Cards -->
    <div class="row g-4">
        @forelse($recruitments ?? [] as $recruitment)
        <div class="col-md-6 col-lg-4">
            <div class="card border-0 shadow card-hover h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="p-2 rounded" style="background-color: rgba(139, 92, 246, 0.1);">
                            <i class="bi bi-briefcase fs-4" style="color: var(--purple-primary);"></i>
                        </div>
                        @if($recruitment->status === 'open')
                            <span class="badge bg-success badge-status">Open</span>
                        @elseif($recruitment->status === 'closed')
                            <span class="badge bg-danger badge-status">Closed</span>
                        @else
                            <span class="badge bg-warning badge-status">In Review</span>
                        @endif
                    </div>
                    
                    <h5 class="fw-bold mb-2">{{ $recruitment->position }}</h5>
                    <p class="text-muted small mb-3">
                        <i class="bi bi-building me-1"></i>{{ $recruitment->department }}
                    </p>
                    
                    <p class="mb-3 small">{{ Str::limit($recruitment->description, 100) }}</p>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="text-muted small">
                            <i class="bi bi-people me-1"></i>
                            {{ $recruitment->applicants_count }} Applicants
                        </div>
                        <div class="text-muted small">
                            <i class="bi bi-calendar me-1"></i>
                            {{ $recruitment->deadline->format('d M Y') }}
                        </div>
                    </div>
                    
                    <div class="progress mb-3" style="height: 8px;">
                        @php
                            $progress = ($recruitment->applicants_count / ($recruitment->target_applicants ?? 100)) * 100;
                            $progress = min($progress, 100);
                        @endphp
                        <div class="progress-bar" role="progressbar" 
                             style="width: {{ $progress }}%; background-color: var(--purple-primary);">
                        </div>
                    </div>
                    
                    <a href="{{ route('recruitments.show', $recruitment->id) }}" 
                       class="btn btn-outline-primary w-100">
                        View Details <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-body text-center py-5">
                    <i class="bi bi-inbox fs-1 text-muted mb-3 d-block"></i>
                    <h5 class="text-muted mb-3">No Recruitment Positions Yet</h5>
                    <a href="{{ route('recruitments.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Create Your First Position
                    </a>
                </div>
            </div>
        </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    @if(isset($recruitments) && $recruitments->hasPages())
    <div class="row mt-4">
        <div class="col-12 d-flex justify-content-center">
            {{ $recruitments->links('pagination::bootstrap-5') }}
        </div>
    </div>
    @endif
</div>
@endsection
