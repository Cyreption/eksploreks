{{-- resources/views/academic-calendar/month.blade.php --}}
@extends('layouts.app')

@section('title', 'Calendar Month')

@section('content')
<!-- Header -->
<div style="background-color: #CDBAE6;" class="text-black">
    <div class="container py-4 position-relative">
        <div class="d-flex align-items-center justify-content-center position-relative">
            <a href="javascript:history.back()" 
               class="position-absolute start-0 d-flex align-items-center justify-content-center rounded-circle shadow-sm text-white"
               style="background-color: #70539A; width: 44px; height: 44px; left: 12px; z-index: 10;">
                <i class="bi bi-arrow-left fs-4"></i>
            </a>
            <h5 class="mb-0 fw-bold">Calendar</h5>
            <div class="position-absolute end-0" style="right: 12px;">
                <img src="{{ asset('logo.png') }}" alt="Logo" width="33" height="44">
            </div>
        </div>
    </div>
</div>

<div class="container py-4">

    <!-- Month Selector Pills -->
    <div class="d-flex gap-3 mb-4 overflow-auto">
        <button class="btn btn-outline-purple rounded-pill py-2 px-4">May</button>
        <button class="btn btn-purple rounded-pill py-2 px-4 text-white">Jun</button>
        <button class="btn btn-outline-purple rounded-pill py-2 px-4">Jul</button>
        <button class="btn btn-outline-purple rounded-pill py-2 px-4">Aug</button>
        <button class="btn btn-outline-purple rounded-pill py-2 px-4">Sept</button>
    </div>

    <!-- Full Calendar -->
    <div class="bg-white rounded-3 shadow-sm p-3">
        <table class="w-100 text-center">
            <thead>
                <tr class="text-muted small fw-bold">
                    <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
                </tr>
            </thead>
            <tbody class="fs-5 fw-semibold">
                <tr>
                    <td class="text-muted">27</td><td class="text-muted">28</td><td class="text-muted">29</td><td class="text-muted">30</td>
                    <td>1</td><td>2</td><td>3</td>
                </tr>
                <tr>
                    <td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                </tr>
                <tr>
                    <td>11</td><td class="bg-purple-light text-purple">12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td>
                </tr>
                <tr>
                    <td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td>
                </tr>
                <tr>
                    <td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                </tr>
                <tr>
                    <td class="text-muted">1</td><td class="text-muted">2</td><td class="text-muted">3</td><td class="text-muted">4</td>
                    <td class="text-muted">5</td><td class="text-muted">6</td><td class="text-muted">7</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Floating Add Button -->
    <a href="#" class="position-fixed bottom-0 end-0 m-4 d-flex align-items-center justify-content-center rounded-circle shadow-lg text-white"
       style="background-color: #70539A; width: 60px; height: 60px; z-index: 100;">
        <i class="bi bi-plus fs-2"></i>
    </a>

</div>
@endsection

@push('scripts')
<style>
    td { padding: 12px 0; border: 1px solid #E5E7EB; }
    .bg-purple-light { background-color: #F3E8FF !important; }
    .text-purple { color: #70539A !important; }
    .btn-outline-purple { border-color: #70539A; color: #70539A; }
    .btn-purple { background-color: #70539A; color: white; }
</style>
@endpush