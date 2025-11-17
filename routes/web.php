<?php

use Illuminate\Support\Facades\Route;

// Created by Satria Pinandita - 5026231004
// Splash & Auth
Route::get('/', function () { return view('welcome'); });
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register');

// Created by Satria Pinandita - 5026231004
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

// Created by Satria Pinandita - 5026231004
// Hangout 
Route::get('/hangout', function () { return view('hangout.index'); })->name('hangout');
Route::get('/hangout/{id}', function ($id) { return view('hangout.detail', ['id' => $id]); })->name('hangout.detail');

// Connect
Route::get('/chat', function () { return view('connect.chat'); })->name('chat');
Route::get('/addfriend', function () { return view('connect.addfriend'); })->name('addfriend');
Route::get('/appblade', function () { return view('connect.appblade'); })->name('appblade');
Route::get('/chatroom', function () { return view('connect.chatroom'); })->name('chatroom');
Route::get('/connect', function () { return view('connect.connect'); })->name('connect');
Route::get('/friendprofile', function () { return view('connect.friendprofile'); })->name('friendprofile');
Route::get('/request', function () { return view('connect.request'); })->name('request');
Route::get('/strangerprofile', function () { return view('connect.strangerprofile'); })->name('strangerprofile');



// Recruitment
Route::prefix('/recruitments')->name('recruitments.')->group(function () {
    Route::get('/', fn() => view('recruitments.index'))->name('index');
    Route::get('/create', fn() => view('recruitments.create'))->name('create');
    Route::get('/{id}', fn($id) => view('recruitments.show', ['id' => $id]))->name('show');
});

// Calendar
Route::prefix('/calendar')->name('calendar.')->group(function () {
    Route::get('/', fn() => view('calendar.index'))->name('index');
    Route::get('/create', fn() => view('calendar.create'))->name('create');
    Route::post('/', fn() => back()->with('success', 'Mock: event created!'))->name('store');
    Route::get('/{id}', fn($id) => view('calendar.show', ['id' => $id]))->name('show');
    Route::get('/{id}/edit', fn($id) => view('calendar.edit', ['id' => $id]))->name('edit');
});

// Created by Satria Pinandita - 5026231004
// LIKED LIST 
Route::get('/liked', fn() => view('liked.index'))->name('liked');
Route::get('/liked/{id}', fn($id) => view('liked.detail', ['id' => $id]))->name('liked.detail');