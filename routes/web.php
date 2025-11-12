<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});


Route::get('/tentang_kami', function () {
    return view('tentang_kami');
});


Route::get('/daftar', function () {
    return view('auth.daftar');
});


Route::get('/masuk ', function () {
    return view('auth.masuk');
});


Route::get('/lupa_password', function () {
    return view('auth.lupa_password');
});


Route::get('/verifikasi', function () {
    return view('auth.verifikasi');
});

Route::get('/atur_pw_baru', function () {
    return view('auth.atur_pw_baru');
});
