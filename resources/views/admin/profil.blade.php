@extends('layouts.admin')

@section('title', 'Profil Admin')

@section('content')

<!-- HEADER -->
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Profil Admin</h1>
</div>

<!-- CARD PROFIL -->
<div class="bg-white rounded-xl shadow p-6 mb-6">

    <div class="flex items-center gap-6">
        <!-- FOTO PROFIL -->
        <div class="w-28 h-28 rounded-full overflow-hidden border">
            <img src="{{ asset('images/default-profile.png') }}" alt="Foto Admin" class="w-full h-full object-cover">
        </div>

        <!-- INFORMASI DASAR -->
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Nama Admin</h2>
            <p class="text-gray-600 text-sm">Administrator Sistem</p>
            <p class="text-gray-600 text-sm">admin@example.com</p>
        </div>
    </div>

</div>

<!-- DETAIL PROFIL -->
<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-lg font-semibold mb-4">Informasi Detail</h2>

    <table class="w-full border border-gray-200">
        <tbody>
            <tr>
                <td class="border p-3 font-medium bg-gray-50 w-1/4">ID Admin</td>
                <td class="border p-3">123456</td>
            </tr>
            <tr>
                <td class="border p-3 font-medium bg-gray-50">Nama Lengkap</td>
                <td class="border p-3">Nama Admin</td>
            </tr>
            <tr>
                <td class="border p-3 font-medium bg-gray-50">Username</td>
                <td class="border p-3">admin</td>
            </tr>
            <tr>
                <td class="border p-3 font-medium bg-gray-50">Email</td>
                <td class="border p-3">admin@example.com</td>
            </tr>
            <tr>
                <td class="border p-3 font-medium bg-gray-50">Role</td>
                <td class="border p-3">Administrator</td>
            </tr>
            <tr>
                <td class="border p-3 font-medium bg-gray-50">Status Akun</td>
                <td class="border p-3">Aktif</td>
            </tr>
            <tr>
                <td class="border p-3 font-medium bg-gray-50">Tanggal Daftar</td>
                <td class="border p-3">01 Januari 2025</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
