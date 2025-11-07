<?php

use Illuminate\Support\Facades\Route;

// Splash & Auth
Route::get('/', function () { return view('welcome'); });
Route::get('/login', function () { return view('auth.login'); })->name('login');
Route::get('/register', function () { return view('auth.register'); })->name('register');

// 4 HALAMAN UTAMA
Route::get('/dashboard', function () { return view('dashboard.index'); })->name('dashboard');
Route::get('/chat', function () { return view('chat.index'); })->name('chat');
Route::get('/liked', function () { return view('liked.index'); })->name('liked');
Route::get('/profile', function () { return view('profile.index'); })->name('profile');

// Fitur di Dashboard
Route::get('/events', function () { return view('events.index'); })->name('events');
Route::get('/events/create', function () { return view('events.create'); })->name('events.create');
Route::get('/events/{id}', function ($id) { return view('events.show.show', ['id' => $id]); })->name('events.show');

Route::get('/hangout', function () { return view('hangout.index'); })->name('hangout');
Route::get('/hangout/{id}', function ($id) { return view('hangout.detail', ['id' => $id]); })->name('hangout.detail');

// Fitur di Connect
Route::get('/chat', function () { return view('connect.chat'); })->name('chat');
Route::get('/addfriend', function () { return view('connect.addfriend'); })->name('addfriend');
Route::get('/appblade', function () { return view('connect.appblade'); })->name('appblade');
Route::get('/chatroom', function () { return view('connect.chatroom'); })->name('chatroom');
Route::get('/connect', function () { return view('connect.connect'); })->name('connect');
Route::get('/friendprofile', function () { return view('connect.friendprofile'); })->name('friendprofile');
Route::get('/request', function () { return view('connect.request'); })->name('request');
Route::get('/strangerprofile', function () { return view('connect.strangerprofile'); })->name('strangerprofile');



// Recruitment (quick closures, ready to plug views)
Route::prefix('/recruitments')->name('recruitments.')->group(function () {
    // List positions
    Route::get('/', function () {
        // sementara: biarin view handle empty state
        return view('recruitments.index');
    })->name('index');

    // Create form
    Route::get('/create', function () {
        return view('recruitments.create');
    })->name('create');

    // Detail position
    Route::get('/{id}', function ($id) {
        // nanti ganti dengan model binding, untuk sekarang cukup kirim id
        return view('recruitments.show', ['id' => $id]);
    })->name('show');
});

