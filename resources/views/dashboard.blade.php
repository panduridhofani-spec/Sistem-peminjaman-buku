@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="bg-white p-6 rounded-lg shadow text-center">
    <h1 class="text-3xl font-bold text-blue-600">Selamat Datang!</h1>
    <p class="mt-3 text-gray-600">Laravel + Tailwind + Vite sudah aktif 🎉</p>
    <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        Mulai Sekarang
    </button>
</div>
@endsection
