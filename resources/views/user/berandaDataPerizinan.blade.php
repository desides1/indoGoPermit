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
        <section class="p-4 sm:p-6">
            <div class="max-w-7xl mx-auto w-[80%]">
                <!-- Header Tabel + Tombol Tambah -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Daftar Perizinan</h2>
                    <a href="{{ route('permission') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:ring-emerald-300 rounded-lg transition">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Perizinan
                    </a>
                </div>

                <!-- Tabel Responsif -->
                <div class="relative overflow-x-auto shadow-md rounded-lg">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">Jenis Perizinan</th>
                                <th scope="col" class="px-6 py-3">Tanggal Pengajuan</th>
                                <th scope="col" class="px-6 py-3">Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permissions as $permission)
                                <tr class="bg-white hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        {{ $individuals->firstWhere('id', $permission->individual_id)->name ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $permissionTypes[$permission->permission_type_id] ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ optional($permission->created_at)->format('d M Y') ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ $permission->status }}
                                        </span>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                        Belum ada data perizinan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>


        <!-- SaveDraft Section -->
        <section class="p-4 sm:p-6">
            <div class="max-w-7xl mx-auto w-[80%]">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Draft Tersimpan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse ($drafts as $draft)
                        <div class="bg-white rounded-lg shadow-md p-4">
                            <div class="flex justify-between items-start mb-3">
                                <h3 class="font-medium text-gray-900">{{ $draft->title ?? 'Draft Perizinan' }}</h3>
                                <span class="text-xs text-gray-500">
                                    {{-- {{ $draft->created_at ? \Carbon\Carbon::parse($draft->created_at)->format('d M Y') : '-' }} --}}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 mb-4">{{ Str::limit($draft->description ?? '', 100) }}</p>
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('draft.edit', $draft->id) }}"
                                    class="px-3 py-1.5 text-xs font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                                    Edit
                                </a>
                                {{-- <form action="{{ route('draft.destroy', $draft->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus draft ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1.5 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition">
                                        Hapus
                                    </button>
                                </form> --}}
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-8 text-gray-500">
                            Tidak ada draft tersimpan.
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    @endif

@endsection
