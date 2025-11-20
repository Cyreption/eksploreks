<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruitmentController;

// Created by Satria Pinandita - 5026231004
// Splash & Auth
Route::get('/', function () { return view('welcome'); });
Route::get('/login', [\App\Http\Controllers\ProfileController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\ProfileController::class, 'login']);
Route::get('/logout', [\App\Http\Controllers\ProfileController::class, 'logout'])->name('logout');
Route::get('/register', [\App\Http\Controllers\ProfileController::class, 'showRegister'])->name('register');
Route::post('/register', [\App\Http\Controllers\ProfileController::class, 'register']);

// Main Page
Route::get('/dashboard', [\App\Http\Controllers\ProfileController::class, 'dashboard'])->name('dashboard');
Route::get('/chat', fn() => view('chat.index'))->name('chat');
Route::get('/liked', [\App\Http\Controllers\PlaceController::class, 'likedList'])->name('liked');
Route::get('/profile', fn() => view('profile.index'))->name('profile');

// Events
Route::get('/events', fn() => view('events.index'))->name('events');
Route::get('/events/create', fn() => view('events.create'))->name('events.create');
Route::get('/events/{id}', fn($id) => view('events.show.show', ['id' => $id]))->name('events.show');

// Hangout
Route::get('/hangout', [\App\Http\Controllers\PlaceController::class, 'hangout'])->name('hangout');
Route::get('/hangout/{id}', [\App\Http\Controllers\PlaceController::class, 'hangoutDetail'])->name('hangout.detail');
Route::post('/hangout/{id}/like', [\App\Http\Controllers\PlaceController::class, 'toggleLike'])->name('hangout.like');

// ====================== FITUR CONNECT (dari dev.satria) ======================
Route::get('/chat', fn() => view('connect.chat'))->name('chat'); // override biar ke connect.chat
Route::get('/addfriend', fn() => view('connect.addfriend'))->name('addfriend');
Route::get('/appblade', fn() => view('connect.appblade'))->name('appblade');
Route::get('/chatroom', fn() => view('connect.chatroom'))->name('chatroom');
Route::get('/connect', fn() => view('connect.connect'))->name('connect');
Route::get('/friendprofile', fn() => view('connect.friendprofile'))->name('friendprofile');
Route::get('/request', fn() => view('connect.request'))->name('request');
Route::get('/strangerprofile', fn() => view('connect.strangerprofile'))->name('strangerprofile');

// ====================== RECRUITMENT (versi MASTER - yang sudah pake Controller) ======================
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

// ====================== CALENDAR ======================
Route::prefix('/calendar')->name('calendar.')->group(function () {
    Route::get('/', fn() => view('calendar.index'))->name('index');
    Route::get('/create', fn() => view('calendar.create'))->name('create');
    Route::post('/', fn() => back()->with('success', 'Mock: event created!'))->name('store');
    Route::get('/{id}', fn($id) => view('calendar.show', ['id' => $id]))->name('show');
    Route::get('/{id}/edit', fn($id) => view('calendar.edit', ['id' => $id]))->name('edit');
});