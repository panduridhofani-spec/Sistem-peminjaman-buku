@extends('layouts.admin')

@section('title', 'Tambah Booking Baru')

@section('content')

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Booking Baru</h1>
    </div>

    <div class="bg-white rounded-xl shadow p-8">

        {{-- Optional: Alert untuk notifikasi global error --}}
        @if ($errors->any())
        <div class="mb-6 rounded-lg border border-red-300 bg-red-100 px-4 py-3 text-red-700">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        @endif
        <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- USER --}}
                <div class="mb-4">
                    <label class="block mb-2 font-semibold">ID User</label>
                    <input type="number" name="id_user" value="{{ old('id_user') }}"
                        class="w-full border rounded-lg p-3 focus:ring-green-500 focus:border-green-500"
                        required>
                </div>
        
                {{-- BUKU --}}
                <div class="mb-4">
                    <label class="block mb-2 font-semibold">ID Buku</label>
                    <input type="number" name="id_buku" value="{{ old('id_buku') }}"
                        class="w-full border rounded-lg p-3 focus:ring-green-500 focus:border-green-500"
                        required>
                </div>
        
                {{-- ADMIN --}}
                <div class="mb-4">
                    <label class="block mb-2 font-semibold">ID Admin</label>
                    <input type="number" name="id_admin" value="{{ old('id_admin') }}"
                        class="w-full border rounded-lg p-3 focus:ring-green-500 focus:border-green-500"
                        required>
                </div>
        
                {{-- JUMLAH --}}
                <div class="mb-4">
                    <label class="block mb-2 font-semibold">Jumlah Buku</label>
                    <input type="number" name="jumlah_buku" value="{{ old('jumlah_buku') }}"
                        class="w-full border rounded-lg p-3 focus:ring-green-500 focus:border-green-500"
                        required>
                </div>
        
                {{-- TANGGAL --}}
                <div class="mb-4">
                    <label class="block mb-2 font-semibold">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ old('tanggal') }}"
                        class="w-full border rounded-lg p-3 focus:ring-green-500 focus:border-green-500"
                        required>
                </div>
        
                {{-- STATUS --}}
                <div class="mb-6">
                    <label class="block mb-2 font-semibold">Status Booking</label>
                    <select name="status_booking"
                            class="w-full border rounded-lg p-3 focus:ring-green-500 focus:border-green-500"
                            required>
                        <option value="">-- Pilih Status --</option>
                        <option value="dipinjam">Dipinjam</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('booking.index') }}"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:ring-gray-400">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-500 shadow-md">
                    Simpan Buku
                </button>
            </div>
        </form>
    </div>

@endsection
