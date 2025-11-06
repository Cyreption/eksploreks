@extends('layouts.app')

@section('title', $recruitment->position . ' - Eksploreks')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-white">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('recruitments.index') }}" class="text-white">Recruitment</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">{{ $recruitment->position }}</li>
        </ol>
    </nav>
    
    <!-- Job Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-start mb-3">
                                <div class="p-3 rounded me-3" style="background-color: rgba(139, 92, 246, 0.1);">
                                    <i class="bi bi-briefcase fs-2" style="color: var(--purple-primary);"></i>
                                </div>
                                <div>
                                    <h1 class="fw-bold mb-2">{{ $recruitment->position }}</h1>
                                    <p class="text-muted mb-2">
                                        <i class="bi bi-building me-2"></i>{{ $recruitment->department }}
                                        <span class="mx-2">•</span>
                                        <i class="bi bi-geo-alt me-2"></i>{{ $recruitment->location ?? 'Remote' }}
                                        <span class="mx-2">•</span>
                                        <i class="bi bi-clock me-2"></i>{{ $recruitment->type ?? 'Full-time' }}
                                    </p>
                                    @if($recruitment->status === 'open')
                                        <span class="badge bg-success badge-status">Open for Applications</span>
                                    @elseif($recruitment->status === 'closed')
                                        <span class="badge bg-danger badge-status">Closed</span>
                                    @else
                                        <span class="badge bg-warning badge-status">In Review</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <button class="btn btn-primary btn-lg mb-2 w-100">
                                <i class="bi bi-pencil me-2"></i>Edit Position
                            </button>
                            <button class="btn btn-outline-danger w-100">
                                <i class="bi bi-trash me-2"></i>Delete Position
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row g-4">
        <!-- Left Column -->
        <div class="col-lg-8">
            <!-- Description -->
            <div class="card border-0 shadow mb-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3">Job Description</h4>
                    <p class="text-muted">{{ $recruitment->description }}</p>
                    
                    <h5 class="fw-bold mt-4 mb-3">Responsibilities</h5>
                    <ul class="text-muted">
                        @foreach($recruitment->responsibilities ?? [] as $responsibility)
                        <li class="mb-2">{{ $responsibility }}</li>
                        @endforeach
                    </ul>
                    
                    <h5 class="fw-bold mt-4 mb-3">Requirements</h5>
                    <ul class="text-muted">
                        @foreach($recruitment->requirements ?? [] as $requirement)
                        <li class="mb-2">{{ $requirement }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
            <!-- Applicants List -->
            <div class="card border-0 shadow">
                <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Applicants ({{ $recruitment->applicants->count() }})</h5>
                    <button class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-download me-2"></i>Export List
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Applied Date</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recruitment->applicants ?? [] as $applicant)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle d-flex align-items-center justify-content-center me-2"
                                                 style="width: 40px; height: 40px; background-color: rgba(139, 92, 246, 0.1);">
                                                <span class="fw-bold" style="color: var(--purple-primary);">
                                                    {{ strtoupper(substr($applicant->name, 0, 1)) }}
                                                </span>
                                            </div>
                                            <span class="fw-semibold">{{ $applicant->name }}</span>
                                        </div>
                                    </td>
                                    <td>{{ $applicant->email }}</td>
                                    <td>{{ $applicant->applied_at->format('d M Y') }}</td>
                                    <td>
                                        @if($applicant->status === 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($applicant->status === 'reviewing')
                                            <span class="badge bg-info">Reviewing</span>
                                        @elseif($applicant->status === 'accepted')
                                            <span class="badge bg-success">Accepted</span>
                                        @else
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary" title="View">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-outline-success" title="Accept">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                            <button class="btn btn-outline-danger" title="Reject">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                        No applicants yet
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Column -->
        <div class="col-lg-4">
            <!-- Quick Stats -->
            <div class="card border-0 shadow mb-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Quick Stats</h5>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                        <span class="text-muted">Total Views</span>
                        <span class="fw-bold fs-5">{{ $recruitment->views_count ?? 0 }}</span>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                        <span class="text-muted">Applications</span>
                        <span class="fw-bold fs-5">{{ $recruitment->applicants->count() }}</span>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                        <span class="text-muted">In Review</span>
                        <span class="fw-bold fs-5">{{ $recruitment->applicants->where('status', 'reviewing')->count() }}</span>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">Accepted</span>
                        <span class="fw-bold fs-5 text-success">{{ $recruitment->applicants->where('status', 'accepted')->count() }}</span>
                    </div>
                </div>
            </div>
            
            <!-- Timeline -->
            <div class="card border-0 shadow">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Timeline</h5>
                    
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                 style="width: 40px; height: 40px; background-color: rgba(139, 92, 246, 0.1);">
                                <i class="bi bi-calendar-plus" style="color: var(--purple-primary);"></i>
                            </div>
                        </div>
                        <div>
                            <p class="mb-1 fw-semibold">Posted Date</p>
                            <p class="text-muted small mb-0">{{ $recruitment->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-3">
                        <div class="me-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                 style="width: 40px; height: 40px; background-color: rgba(239, 68, 68, 0.1);">
                                <i class="bi bi-calendar-x text-danger"></i>
                            </div>
                        </div>
                        <div>
                            <p class="mb-1 fw-semibold">Deadline</p>
                            <p class="text-muted small mb-0">{{ $recruitment->deadline->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    
                    <div class="d-flex">
                        <div class="me-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center"
                                 style="width: 40px; height: 40px; background-color: rgba(34, 197, 94, 0.1);">
                                <i class="bi bi-hourglass-split text-success"></i>
                            </div>
                        </div>
                        <div>
                            <p class="mb-1 fw-semibold">Days Remaining</p>
                            <p class="text-muted small mb-0">{{ $recruitment->deadline->diffInDays(now()) }} days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
