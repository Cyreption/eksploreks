<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\RecruitmentController;


// Splash & Auth
Route::get('/', function () { return view('welcome'); });
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register');

// Main Page
Route::get('/dashboard', function () { return view('dashboard.index'); })->name('dashboard');
Route::get('/chat', function () { return view('chat.index'); })->name('chat');
Route::get('/liked', function () { return view('liked.index'); })->name('liked');
Route::get('/profile', function () { return view('profile.index'); })->name('profile');

// Created by Hafizhan Yusra Sulistyo - 5026231060
// Events
Route::get('/events', function () { return view('events.index'); })->name('events');
Route::get('/events/create', function () { return view('events.create'); })->name('events.create');
Route::get('/events/{id}', function ($id) { return view('events.show.show', ['id' => $id]); })->name('events.show');

// Hangout 
Route::get('/hangout', function () { return view('hangout.index'); })->name('hangout');
Route::get('/hangout/{id}', function ($id) { return view('hangout.detail', ['id' => $id]); })->name('hangout.detail');

// Connect
Route::get('/recruitment', [RecruitmentController::class, 'index'])->name('recruitment.index');
Route::get('/recruitment/{recruitment}', [RecruitmentController::class, 'show'])->name('recruitment.show');



// Created by Aulia Salma Anjani - 5026231063
// Recruitment
Route::prefix('recruitment')->name('recruitment.')->group(function () {
    Route::get('/', [RecruitmentController::class, 'index'])->name('index');
    Route::get('/create', [RecruitmentController::class, 'create'])->name('create');
    Route::post('/', [RecruitmentController::class, 'store'])->name('store');
    Route::get('/{recruitment}', [RecruitmentController::class, 'show'])->name('show');
    Route::get('/{recruitment}/edit', [RecruitmentController::class, 'edit'])->name('edit');
    Route::put('/{recruitment}', [RecruitmentController::class, 'update'])->name('update');
    Route::delete('/{recruitment}', [RecruitmentController::class, 'destroy'])->name('destroy');
    Route::get('/{recruitment}/download', [RecruitmentController::class, 'downloadFile'])->name('download');
});

// Calendar routes 
Route::prefix('/calendar')->name('calendar.')->group(function () {
    Route::get('/', fn () => view('calendar.index'))->name('index');
    Route::get('/create', fn () => view('calendar.create'))->name('create');

    // POST form create -> 
    Route::post('/', function (Request $request) {
        // return redirect()->route('calendar.index')->with('success', 'Event created!');
        return back()->with('success', 'Mock: event created!');
    })->name('store');

    Route::get('/{id}', fn ($id) => view('calendar.show', ['id' => $id]))->name('show');
    Route::get('/{id}/edit', fn ($id) => view('calendar.edit', ['id' => $id]))->name('edit');
});

