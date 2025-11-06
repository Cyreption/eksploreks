@extends('layouts.app')

@section('content')
<div class="calendar-page">
    <!-- Header -->
    <div class="calendar-header">
        <button class="btn-back" onclick="window.history.back()">
            <i class="bi bi-chevron-left"></i>
        </button>
        <h1 class="header-title">Calendar</h1>
        <div class="logo-icon">
            <i class="bi bi-flower1"></i>
        </div>
    </div>

    <!-- Month Selector -->
    <div class="month-selector-container">
        <div class="month-pills">
            <button class="month-pill">May</button>
            <button class="month-pill active">May</button>
            <button class="month-pill">Jun</button>
            <button class="month-pill">Jul</button>
            <button class="month-pill">Aug</button>
            <button class="month-pill">Sept</button>
        </div>
    </div>

    <!-- Full Month Calendar -->
    <div class="full-calendar">
        <table class="table table-bordered calendar-table">
            <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="other-month">27</td>
                    <td class="other-month">28</td>
                    <td class="other-month">29</td>
                    <td class="other-month">30</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>8</td>
                    <td>9</td>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>13</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>15</td>
                    <td>16</td>
                    <td>17</td>
                    <td>18</td>
                    <td>19</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>22</td>
                    <td>23</td>
                    <td>24</td>
                    <td>25</td>
                    <td>26</td>
                    <td>27</td>
                </tr>
                <tr>
                    <td>28</td>
                    <td>29</td>
                    <td>30</td>
                    <td>31</td>
                    <td class="other-month">1</td>
                    <td class="other-month">2</td>
                    <td class="other-month">3</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Floating Add Button -->
    <button class="btn-float" onclick="window.location.href='{{ route('calendar.create') }}'">
        <i class="bi bi-plus"></i>
    </button>

    <!-- Bottom Navigation -->
    @include('partials.bottom-nav')
</div>

<style>
.month-selector-container {
    background: linear-gradient(135deg, #A855F7 0%, #9333EA 100%);
    padding: 20px 0;
    overflow-x: auto;
}

.month-pills {
    display: flex;
    gap: 15px;
    padding: 0 20px;
    white-space: nowrap;
}

.month-pill {
    background: rgba(255, 255, 255, 0.3);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 10px 25px;
    font-size: 16px;
    font-weight: 600;
}

.month-pill.active {
    background: white;
    color: #7C3AED;
}

.full-calendar {
    padding: 20px;
}

.calendar-table {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    margin: 0;
}

.calendar-table thead th {
    background: #F3E8FF;
    color: #000;
    font-weight: 700;
    text-align: center;
    padding: 15px 10px;
    border: 1px solid #E5E7EB;
}

.calendar-table tbody td {
    height: 80px;
    text-align: center;
    vertical-align: top;
    padding: 10px 5px;
    font-size: 18px;
    font-weight: 600;
    border: 1px solid #E5E7EB;
}

.calendar-table tbody td.other-month {
    color: #9CA3AF;
}
</style>
@endsection
