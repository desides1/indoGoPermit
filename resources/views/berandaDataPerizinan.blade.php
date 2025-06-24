@extends('layout.index')

@section('title', 'Homepage')

@section('content') {{-- GANTI 'content-primary' jadi 'content' --}}
<div class="flex flex-col items-center justify-center px-4 text-center min-h-[80vh]">
    <!-- Ilustrasi -->
    <img class="w-1/4" src="{{ asset('images/perizinanNone.png') }}" alt=""
        class="max-w-xs mb-6">

    <!-- Pesan -->
    <p class="text-gray-700 mb-4">
        Kamu Belum Menambahkan Perizinan <br>
        Klik Tombol Di Bawah Untuk Menambahkan
    </p>

    <!-- Tombol -->
    <a href="#"
        class="inline-block bg-[#52B69A] text-white px-6 py-3 rounded-md hover:bg-[#3e947d] transition">
        + Tambah Perizinan
    </a>
</div>
@endsection
