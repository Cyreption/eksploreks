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

// ====================== FITUR CONNECT ======================
Route::prefix('/connect')->name('connect.')->group(function () {
    Route::get('/', [\App\Http\Controllers\FriendListController::class, 'index'])->name('index');
    Route::get('/add/{userId}', [\App\Http\Controllers\ConnectController::class, 'showAddFriend'])->name('addFriend');
    Route::get('/friend/{friendId}', [\App\Http\Controllers\ConnectController::class, 'showFriendProfile'])->name('friendProfile');
    Route::get('/stranger/{userId}', [\App\Http\Controllers\ConnectController::class, 'showStrangerProfile'])->name('strangerProfile');
    Route::get('/search', [\App\Http\Controllers\ConnectController::class, 'search'])->name('search');
});

Route::prefix('/friend-request')->name('friendRequest.')->group(function () {
    Route::get('/', [\App\Http\Controllers\FriendRequestController::class, 'index'])->name('index');
    Route::post('/', [\App\Http\Controllers\FriendRequestController::class, 'store'])->name('store');
    Route::put('/{friendRequest}', [\App\Http\Controllers\FriendRequestController::class, 'update'])->name('update');
    Route::delete('/{friendRequest}', [\App\Http\Controllers\FriendRequestController::class, 'destroy'])->name('destroy');
});

Route::prefix('/friend-list')->name('friendList.')->group(function () {
    Route::delete('/{friendList}', [\App\Http\Controllers\FriendListController::class, 'destroy'])->name('destroy');
});

// Backward compatibility routes
Route::get('/chat', fn() => view('connect.chat'))->name('chat');
Route::get('/appblade', fn() => view('connect.appblade'))->name('appblade');
Route::get('/chatroom', fn() => view('connect.chatroom'))->name('chatroom');

// === RECRUITMENT ROUTES ===
Route::get('/recruitment', [RecruitmentController::class, 'index'])
     ->name('recruitment.index');

Route::get('/recruitment/{recruitment}', [RecruitmentController::class, 'show'])
     ->name('recruitment.show');

// ====================== CALENDAR ======================
Route::prefix('/calendar')->name('calendar.')->group(function () {
    Route::get('/', fn() => view('calendar.index'))->name('index');
    Route::get('/create', fn() => view('calendar.create'))->name('create');
    Route::post('/', fn() => back()->with('success', 'Mock: event created!'))->name('store');
    Route::get('/{id}', fn($id) => view('calendar.show', ['id' => $id]))->name('show');
    Route::get('/{id}/edit', fn($id) => view('calendar.edit', ['id' => $id]))->name('edit');
});