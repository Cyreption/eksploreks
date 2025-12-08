<!-- Author: Aulia Salma Anjani (5026231063) & // Author: Hafizhan Yusra Sulistyo (5026231060) -->

{{-- resources/views/academic-calendar/index.blade.php --}}
@extends('layouts.app')
@section('title', 'Calendar')

@section('content')
<!-- Header -->
<div class="bg-purple-light text-white">
    <div class="container-fluid py-4 position-relative px-0">
        <div class="d-flex align-items-center justify-content-center position-relative">
            <a href="javascript:history.back()" 
               class="position-absolute start-0 d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
               style="background-color: #70539A; width: 44px; height: 44px; left: 0; z-index: 10; margin-left: 12px;">
                <i class="bi bi-arrow-left fs-4"></i>
            </a>
            <h5 class="mb-0 fw-bold text-white">Calendar</h5>
            <div class="position-absolute end-0" style="right: 0; margin-right: 12px;">
                <img src="{{ asset('images/logo-pin-purple.png') }}" alt="Logo" width="33" height="44">
            </div>
        </div>
    </div>
</div>

<div class="container py-4">

    <!-- Mini Calendar -->
    <a href="{{ route('calendar.month') }}" class="text-decoration-none">
        <div class="bg-white rounded-3 shadow-sm p-3 mb-4" style="cursor: pointer; transition: all 0.3s ease;">
            <table class="w-100 text-center small">
                <thead><tr class="text-muted fw-bold"><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr></thead>
                <tbody class="fw-semibold">
                    <tr><td class="text-muted">27</td><td class="text-muted">28</td><td class="text-muted">29</td><td class="text-muted">30</td><td>1</td><td>2</td><td>3</td></tr>
                    <tr><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td></tr>
                    <tr><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td></tr>
                    <tr><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td></tr>
                    <tr><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td></tr>
                </tbody>
            </table>
        </div>
    </a>

    <!-- Search Bar — JUGA SOLID #D8B4FE -->
    <div class="mb-5">
        <div class="position-relative d-inline-block w-100">
                    <input type="text"
                        class="form-control rounded-pill border-0 shadow-sm py-3 text-white placeholder-white fw-medium pe-5"
                        placeholder="Search ..."
                        style="height: 56px; padding-left: 20px; padding-right: 50px; background-color: #CDBAE6 !important;">
                    <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y text-white pe-4"></i>
                </div>
            </div>

    <!-- Event List -->
    <div class="d-flex flex-column gap-4">
        @forelse($events ?? [] as $event)
            <a href="{{ route('calendar.show', $event->calendar_event_id) }}" class="text-decoration-none">
                <div class="bg-white rounded-3 shadow-sm p-4">
                    <h6 class="fw-bold text-dark mb-2">{{ $event->title }}</h6>
                    <p class="text-muted small mb-2">{{ $event->location ?? 'No location' }} • {{ $event->description ?? '' }}</p>
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center gap-2">
                            @php
                                $colorMap = [
                                    'Yellow' => '#FFD43B',
                                    'Red' => '#FF6B6B',
                                    'Blue' => '#4ECDC4',
                                    'Purple' => '#70539A'
                                ];
                            @endphp
                            <div class="rounded-circle" style="width:12px;height:12px;background:{{ $colorMap[$event->color] ?? '#70539A' }};"></div>
                            <small>Color {{ $event->color }}</small>
                        </div>
                        <div class="form-check form-switch ms-auto">
                            <input class="form-check-input" type="checkbox" {{ $event->notification ? 'checked' : '' }} disabled>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <p class="text-muted text-center">Tidak ada schedule yang dibuat</p>
        @endforelse
    </div>

    <!-- TOMBOL + — #70539A + GAK KETUTUP NAVBAR -->
    <a href="{{ route('calendar.create') }}" 
       class="position-fixed end-0 me-4 d-flex align-items-center justify-content-center rounded-circle shadow-lg text-white z-10"
       style="bottom: 100px; 
              background-color: #70539A; 
              width: 50px; height: 50px; 
              box-shadow: 0 8px 25px rgba(112, 83, 154, 0.4);">
        <i class="bi bi-plus-lg fs-1"></i>
    </a>

</div>
@endsection

@push('scripts')
<style>
    /* Warna solid ungu muda */
    .bg-purple-light { background-color: #CDBAE6 !important; }
    
    /* Hari ini di mini calendar */
    .bg-purple-light.text-purple.rounded-circle {
        background-color: #70539A !important;
        color: white !important;
    }
    
    /* Switch toggle */
    .form-check-input:checked { 
        background-color: #70539A; 
        border-color: #70539A; 
    }
    
    /* Placeholder putih di search */
    .placeholder-white::placeholder {
        color: rgba(255, 255, 255, 0.7) !important;
    }
</style>
@endpush