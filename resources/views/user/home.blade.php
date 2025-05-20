@extends('layouts.template')

@section('title', 'Homepage')

@section('content-primary')

    {{-- banner --}}
    <div
        class="grid md:grid-cols-3 gap-2 min-h-[264px] py-8 p-24 bg-gradient-to-r from-emerald-600 to-emerald-300 overflow-hidden justify-center">
        <div class="px-24 col-span-2">
            <h1 class="text-4xl font-medium text-white">Selamat Datang, <strong>User GoPermit</strong></h1>
            <p class="text-base text-gray-200 mt-4">Percayakan perizinanmu pada kami</p>

            <button type="button"
                class="py-3 px-6 text-sm font-semibold bg-white text-emerald-600 hover:bg-slate-100 rounded-md mt-8">Lanjut
                Transaksi</button>
        </div>

        <div class="relative max-md:hidden p-0">
            <img src="{{ asset('images/banner.png') }}" alt="Banner Image" class="w-fit right-8 md: absolute h-60" />
        </div>

    </div>

    {{-- panduan dan aktivitas --}}
    <div class="grid grid-cols-3 mb-0 mx-24 m-8 gap-4 ">
        <div class="col-span-2 border border-gray-300 rounded-lg bg-white p-4 ">
            <h1 class="text-2xl font-semibold">Panduan Penggunaan</h1>
            <p class="text-base text-gray-500 mt-4">Berikut adalah panduan penggunaan aplikasi GoPermit</p>
            <ol class="relative text-gray-500 border-s border-gray-200 light:border-gray-700 light:text-gray-400 mt-8 mx-4">
                <li class="mb-10 ms-6">
                    <span
                        class="absolute flex items-center justify-center w-8 h-8 bg-white border-3 border-emerald-600 rounded-full -start-4 ring-4 ring-white light:ring-gray-900 light:bg-green-900">
                        1
                    </span>
                    <h3 class="font-medium leading-tight">Persiapan dokumen</h3>
                    <p class="text-sm">Pastikan semua persyaratan administrasi lengkap, seperti KTP, NPWP, dan dokumen
                        pendukung lainnya.</p>
                </li>
                <li class="mb-10 ms-6">
                    <span
                        class="absolute flex items-center justify-center w-8 h-8 border-3 bg-white border-emerald-600 rounded-full -start-4 ring-4 ring-white light:ring-gray-900 light:bg-gray-700">
                        2
                    </span>
                    <h3 class="font-medium leading-tight">Ajukan Permohonan</h3>
                    <p class="text-sm">Tambahkan pengaduan anda di menu Data Perizinan, kemudian klik Tambah Perizinan.
                    </p>
                </li>
                <li class="mb-10 ms-6">
                    <span
                        class="absolute flex items-center justify-center w-8 h-8 border-3 bg-white border-emerald-600 rounded-full -start-4 ring-4 ring-white light:ring-gray-900 light:bg-gray-700">
                        3
                    </span>
                    <h3 class="font-medium leading-tight">Pembayaran</h3>
                    <p class="text-sm">Lakukan pembayaran untuk submit pengajuan perizinan anda untuk diproses lebih
                        lanjut.</p>
                </li>
                <li class="mb-10 ms-6">
                    <span
                        class="absolute flex items-center justify-center w-8 h-8 border-3 bg-white border-emerald-600 rounded-full -start-4 ring-4 ring-white light:ring-gray-900 light:bg-gray-700">
                        4
                    </span>
                    <h3 class="font-medium leading-tight">Verifikasi & Evaluasi</h3>
                    <p class="text-sm">Administrasi akan mengecek kelengkapan dokumen anda dan melakukan verifikasi.</p>
                </li>
                <li class="ms-6">
                    <span
                        class="absolute flex items-center justify-center w-8 h-8 border-3 bg-white border-emerald-600 rounded-full -start-4 ring-4 ring-white light:ring-gray-900 light:bg-gray-700">
                        5
                    </span>
                    <h3 class="font-medium leading-tight">Unduh Dokumen</h3>
                    <p class="text-sm"> Surat perizinan bisa diambil langsung atau diunduh dari sistem Indo GoPermit.
                    </p>
                </li>
            </ol>

            <button type="button"
                class="text-white bg-emerald-600 hover:bg-emerald-900 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 mt-6">Panduan
                Lengkap</button>

        </div>
        <div class="activity border border-gray-300 rounded-lg bg-white p-4 ">
            <div class="sblm place-items-center">
                <img src="{{ asset('images/activity.png') }}" alt="activity" class="w-2xs m-12" />
                <span class="">Kamu belum memiliki aktivitas apapun</span>
            </div>
        </div>
    </div>
@endsection
