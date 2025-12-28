@extends('layouts.admin')

@section('title', 'Edit Booking')

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Edit Data Booking</h1>
</div>

<div class="bg-white rounded-xl shadow p-8 max-w-2xl">
    <form action="{{ route('admin.booking.update', $data['id_booking']) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- USER --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">ID User</label>
            <input type="number" name="id_user" value="{{ $data['id_user'] }}"
                   class="w-full border rounded-lg p-3" required>
        </div>

        {{-- BUKU --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">ID Buku</label>
            <input type="number" name="id_buku" value="{{ $data['id_buku'] }}"
                   class="w-full border rounded-lg p-3" required>
        </div>

        {{-- ADMIN --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">ID Admin</label>
            <input type="number" name="id_admin" value="{{ $data['id_admin'] }}"
                   class="w-full border rounded-lg p-3" required>
        </div>

        {{-- JUMLAH --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Jumlah Buku</label>
            <input type="number" name="jumlah_buku" value="{{ $data['jumlah_buku'] }}"
                   class="w-full border rounded-lg p-3" required>
        </div>

        {{-- TANGGAL --}}
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Tanggal</label>
            <input type="date" name="tanggal" value="{{ $data['tanggal'] }}"
                   class="w-full border rounded-lg p-3" required>
        </div>

        {{-- STATUS --}}
        <div class="mb-6">
            <label class="block mb-2 font-semibold">Status Booking</label>
            <select name="status_booking"
                    class="w-full border rounded-lg p-3" required>
                <option value="dipinjam" {{ $data['status_booking']=='dipinjam'?'selected':'' }}>
                    Dipinjam
                </option>
                <option value="selesai" {{ $data['status_booking']=='selesai'?'selected':'' }}>
                    Selesai
                </option>
            </select>
        </div>

        {{-- BUTTON --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.booking.index') }}"
               class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
                Kembali
            </a>
            <button type="submit"
                    class="bg-green-600 hover:bg-green-400 text-white px-4 py-2 rounded font-bold">
                Update
            </button>
        </div>
    </form>
</div>

@endsection