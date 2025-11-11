<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/tentang_kami', function () {
    return view('tentang_kami');
});


Route::get('/daftar', function () {
    return view('daftar');
});


Route::get('/masuk ', function () {
    return view('masuk');
});


Route::get('/lupa_password', function () {
    return view('lupa_password');
});
