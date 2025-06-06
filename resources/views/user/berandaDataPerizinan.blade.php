@extends('layouts.template')

@section('title', 'Homepage')

@section('content-primary')
    @if ($permissions->isEmpty())
        {{-- Perizinan Kosong --}}
        <section>

            <div class="place-items-center m-18">

                <img class="w-1/4" src="{{ asset('images/perizinanNone.png') }}" alt="">
                <div class="mt-12 text-center">
                    <p>Kamu Belum Menambahkan Perizinan</p>
                    <p>Click Tombol Di Bawah Untuk Menambahkan</p>
                    <a href="{{ route('permission') }}"
                        class=" mt-4 px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 rounded-lg text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                        <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14m-7 7V5" />
                        </svg>
                        Tambah Perizinan
                    </a>
                </div>

            </div>
        </section>
    @else
        {{-- Sudah ada data --}}
        <section>

            <a href="{{ route('permission') }}"
                class=" mt-4 px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 rounded-lg text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 12h14m-7 7V5" />
                </svg>
                Tambah Perizinan
            </a>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>

                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jenis Perizinan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pengajuan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status Perizinan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $permission->nama }}
                                </th>
                                <td class="px-6 py-4">{{ $permission->permit_type }}</td>
                                <td class="px-6 py-4">{{ $permission->created_at }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                        {{ $permission->status }}
                                    </span>
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="#" class="font-medium text-red-600 hover:underline ms-3">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    @endif

@endsection
