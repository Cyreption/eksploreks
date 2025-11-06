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