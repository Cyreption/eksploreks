<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\EventController;


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
Route::get('/liked', [\App\Http\Controllers\PlaceController::class, 'likedList'])->name('liked');
Route::get('/profile', fn() => view('profile.index'))->name('profile');

// Events

Route::resource('events', EventController::class);
Route::get('events/{event}/download-link', [EventController::class, 'downloadLink'])->name('events.downloadLink');
Route::get('events/{event}/download-file', [EventController::class, 'downloadFile'])->name('events.downloadFile');

// Hangout
Route::get('/hangout', [\App\Http\Controllers\PlaceController::class, 'hangout'])->name('hangout');
Route::get('/hangout/{id}', [\App\Http\Controllers\PlaceController::class, 'hangoutDetail'])->name('hangout.detail');
Route::post('/hangout/{id}/like', [\App\Http\Controllers\PlaceController::class, 'toggleLike'])->name('hangout.like');
Route::post('/hangout/{id}/review', [\App\Http\Controllers\PlaceController::class, 'storeReview'])->name('hangout.review');

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

// ====================== CHAT ======================
Route::prefix('/chat')->name('chat.')->group(function () {
    Route::get('/', [\App\Http\Controllers\ChatController::class, 'index'])->name('index');
    Route::get('/search', [\App\Http\Controllers\ChatController::class, 'search'])->name('search');
    Route::get('/{friendId}', [\App\Http\Controllers\ChatController::class, 'openChat'])->name('open');
    Route::post('/{friendId}/send', [\App\Http\Controllers\ChatController::class, 'sendMessage'])->name('send');
});

// Backward compatibility routes
Route::get('/chat-old', fn() => redirect()->route('chat.index'))->name('chat-old');
Route::get('/appblade', fn() => view('connect.appblade'))->name('appblade');
Route::get('/chatroom', fn() => view('connect.chatroom'))->name('chatroom');

// === RECRUITMENT ROUTES ===

Route::model('recruitment', \App\Models\RecruitmentPost::class);
Route::resource('recruitment', RecruitmentController::class);

// ====================== CALENDAR ======================
Route::prefix('/calendar')->name('calendar.')->group(function () {
    Route::get('/', [\App\Http\Controllers\CalendarEventController::class, 'index'])->name('index');
    Route::get('/month', [\App\Http\Controllers\CalendarEventController::class, 'month'])->name('month');
    Route::get('/create', [\App\Http\Controllers\CalendarEventController::class, 'create'])->name('create');
    Route::post('/', [\App\Http\Controllers\CalendarEventController::class, 'store'])->name('store');
    Route::get('/{calendarEvent}', [\App\Http\Controllers\CalendarEventController::class, 'show'])->name('show');
    Route::get('/{calendarEvent}/edit', [\App\Http\Controllers\CalendarEventController::class, 'edit'])->name('edit');
    Route::put('/{calendarEvent}', [\App\Http\Controllers\CalendarEventController::class, 'update'])->name('update');
    Route::delete('/{calendarEvent}', [\App\Http\Controllers\CalendarEventController::class, 'destroy'])->name('destroy');
});