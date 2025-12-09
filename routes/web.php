<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CalendarEventController;
use App\Http\Controllers\FriendListController;
use App\Http\Controllers\FriendRequestController;

// Created by Satria Pinandita - 5026231004
// Splash & Auth
Route::get('/', function () { return view('welcome'); });
Route::get('/login', [\App\Http\Controllers\ProfileController::class, 'showLogin'])->name('login');
Route::post('/login', [\App\Http\Controllers\ProfileController::class, 'login']);
Route::get('/logout', [\App\Http\Controllers\ProfileController::class, 'logout'])->name('logout');
Route::get('/register', [\App\Http\Controllers\ProfileController::class, 'showRegister'])->name('register');
Route::post('/register', [\App\Http\Controllers\ProfileController::class, 'register']);

// Created by Satria Pinandita - 5026231004
// Main Page
Route::get('/dashboard', [\App\Http\Controllers\ProfileController::class, 'dashboard'])->name('dashboard');
Route::get('/liked', [\App\Http\Controllers\PlaceController::class, 'likedList'])->name('liked');
Route::get('/profile', fn() => view('profile.index'))->name('profile');

// Author: Hafizhan Yusra Sulistyo (5026231060)
// Events

Route::get('events', [EventController::class, 'listEvents'])->name('events.index');
Route::get('events/create', [EventController::class, 'createEvent'])->name('events.create');
Route::post('events', [EventController::class, 'storeEvent'])->name('events.store');
Route::get('events/{event}', [EventController::class, 'showEvent'])->name('events.show');
Route::get('events/{event}/edit', [EventController::class, 'editEvent'])->name('events.edit');
Route::put('events/{event}', [EventController::class, 'updateEvent'])->name('events.update');
Route::delete('events/{event}', [EventController::class, 'deleteEvent'])->name('events.destroy');
Route::get('events/{event}/download-link', [EventController::class, 'downloadLink'])->name('events.downloadLink');
Route::get('events/{event}/download-file', [EventController::class, 'downloadFile'])->name('events.downloadFile');

// Created by Satria Pinandita - 5026231004
// Hangout
Route::get('/hangout', [\App\Http\Controllers\PlaceController::class, 'hangout'])->name('hangout');
Route::get('/hangout/{id}', [\App\Http\Controllers\PlaceController::class, 'hangoutDetail'])->name('hangout.detail');
Route::post('/hangout/{id}/like', [\App\Http\Controllers\PlaceController::class, 'toggleLike'])->name('hangout.like');
Route::post('/hangout/{id}/review', [\App\Http\Controllers\PlaceController::class, 'storeReview'])->name('hangout.review');

// Author: Nashita Aulia (5026231054)
// ====================== FITUR CONNECT ======================
Route::prefix('/connect')->name('connect.')->group(function () {
    Route::get('/', [FriendListController::class, 'listFriends'])->name('index');
    Route::get('/add/{userId}', [\App\Http\Controllers\ConnectController::class, 'showAddFriend'])->name('addFriend');
    Route::get('/stranger/{userId}', [\App\Http\Controllers\ConnectController::class, 'showStrangerProfile'])->name('strangerProfile');
    Route::get('/search', [\App\Http\Controllers\ConnectController::class, 'search'])->name('search');
});

Route::prefix('/friend-request')->name('friendRequest.')->group(function () {
    Route::get('/', [FriendRequestController::class, 'listFriendRequests'])->name('index');
    Route::post('/', [FriendRequestController::class, 'sendFriendRequest'])->name('store');
    Route::put('/{friendRequest}', [FriendRequestController::class, 'respondFriendRequest'])->name('update');
    Route::delete('/{friendRequest}', [FriendRequestController::class, 'cancelFriendRequest'])->name('destroy');
});

Route::prefix('/friend-list')->name('friendList.')->group(function () {
    Route::delete('/{friendList}', [FriendListController::class, 'deleteFriend'])->name('destroy');
});

// Author: Nashita Aulia (5026231054)
// ====================== CHAT ======================
Route::prefix('/chat')->name('chat.')->group(function () {
    Route::get('/', [\App\Http\Controllers\ChatController::class, 'index'])->name('index');
    Route::get('/search', [\App\Http\Controllers\ChatController::class, 'search'])->name('search');
    Route::get('/{friendId}', [\App\Http\Controllers\ChatController::class, 'openChat'])->name('open');
    Route::post('/{friendId}/send', [\App\Http\Controllers\ChatController::class, 'sendMessage'])->name('send');
});

// Author: Nashita Aulia (5026231054)
// Backward compatibility routes
Route::get('/chat-old', fn() => redirect()->route('chat.index'))->name('chat-old');
Route::get('/appblade', fn() => view('connect.appblade'))->name('appblade');
Route::get('/chatroom', fn() => view('connect.chatroom'))->name('chatroom');

// Author: Aulia Salma Anjani (5026231063)
// === RECRUITMENT ROUTES ===
Route::prefix('recruitment')->name('recruitment.')->group(function () {
    Route::get('/', [RecruitmentController::class, 'listRecruitments'])->name('index');
    Route::get('/search', [RecruitmentController::class, 'searchRecruitments'])->name('search');
    Route::get('/create', [RecruitmentController::class, 'createRecruitment'])->name('create');
    Route::post('/', [RecruitmentController::class, 'storeRecruitment'])->name('store');
    Route::get('/{recruitment}', [RecruitmentController::class, 'showRecruitment'])->name('show');
    Route::get('/{recruitment}/edit', [RecruitmentController::class, 'editRecruitment'])->name('edit');
    Route::put('/{recruitment}', [RecruitmentController::class, 'updateRecruitment'])->name('update');
    Route::delete('/{recruitment}', [RecruitmentController::class, 'deleteRecruitment'])->name('destroy');
});

// Author: Aulia Salma Anjani (5026231063) & // Author: Hafizhan Yusra Sulistyo (5026231060)
// ====================== CALENDAR ======================
Route::prefix('/calendar')->name('calendar.')->group(function () {
    Route::get('/', [CalendarEventController::class, 'listCalendarEvents'])->name('index');
    Route::get('/month', [CalendarEventController::class, 'showMonthView'])->name('month');
    Route::get('/create', [CalendarEventController::class, 'createCalendarEvent'])->name('create');
    Route::post('/', [CalendarEventController::class, 'storeCalendarEvent'])->name('store');
    Route::get('/{calendarEvent}', [CalendarEventController::class, 'showCalendarEvent'])->name('show');
    Route::get('/{calendarEvent}/edit', [CalendarEventController::class, 'editCalendarEvent'])->name('edit');
    Route::put('/{calendarEvent}', [CalendarEventController::class, 'updateCalendarEvent'])->name('update');
    Route::delete('/{calendarEvent}', [CalendarEventController::class, 'deleteCalendarEvent'])->name('destroy');
});