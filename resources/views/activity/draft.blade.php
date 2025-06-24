@extends('layout.index')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <div class="flex gap-8">
                <div class="w-1/2">
                    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Log Activity</h1>

                    <div class="space-y-4">
                        @forelse($activities as $activity)
                            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                                <h3 class="text-lg font-medium text-gray-800 mb-3">
                                    Pengajuan perizinan "{{ $activity->permissionType->name ?? 'N/A' }}"
                                </h3>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-gray-600 mb-2">
                                            {{ $activity->created_at ? $activity->created_at->format('d M Y - H:i') : '-' }}
                                        </p>
                                        <div class="flex items-center">
                                            <span class="text-sm text-gray-700 mr-2">Status:</span>
                                            @php
                                                $status = $activity->status ?? 'unknown';
                                                $statusClasses = [
                                                    'perlu_perbaikan' => 'bg-red-100 text-red-800',
                                                    'ditolak' => 'bg-red-100 text-red-800',
                                                    'diproses' => 'bg-yellow-100 text-yellow-800',
                                                    'diajukan' => 'bg-blue-100 text-blue-800',
                                                    'disetujui' => 'bg-green-100 text-green-800',
                                                    'selesai' => 'bg-green-100 text-green-800',
                                                ];
                                                $statusLabels = [
                                                    'perlu_perbaikan' => 'Perlu Perbaikan',
                                                    'ditolak' => 'Ditolak',
                                                    'diproses' => 'Diproses',
                                                    'diajukan' => 'Diajukan',
                                                    'disetujui' => 'Disetujui',
                                                    'selesai' => 'Selesai',
                                                    'unknown' => 'Status Tidak Diketahui',
                                                ];
                                            @endphp
                                            <span
                                                class="{{ $statusClasses[$status] ?? 'bg-gray-100 text-gray-800' }} text-xs font-medium px-3 py-1 rounded-full">
                                                {{ $statusLabels[$status] ?? ucfirst(str_replace('_', ' ', $status)) }}
                                            </span>
                                        </div>
                                    </div>
                                    <a href="{{ route('user.perizinan.detail', $activity->id_perizinan) }}"
                                        class="bg-[#52B69A] hover:bg-[#449985] text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200 text-center">
                                <div class="text-gray-400 mb-3">
                                    <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 font-medium">Belum ada aktivitas perizinan</p>
                                <p class="text-gray-400 text-sm mt-1">Aktivitas pengajuan perizinan akan muncul di sini</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="w-1/2">
                    <div class="flex items-center justify-between mb-6">
                        <h1 class="text-2xl font-semibold text-gray-800">Draft</h1>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                        <div class="space-y-6">
                            @forelse($drafts as $draft)
                                <div class="pb-6 border-b border-gray-200 last:border-b-0 last:pb-0">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h3 class="text-lg font-medium text-gray-800 mb-2">
                                                Pengajuan perizinan "{{ $draft->permissionType->name ?? 'N/A' }}"
                                            </h3>
                                            <p class="text-sm text-gray-600 mb-3">
                                                Dibuat:
                                                {{ $draft->created_at ? $draft->created_at->format('d M Y - H:i') : '-' }}
                                            </p>
                                            <div class="flex items-center">
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2 py-1 rounded-full">
                                                    Draft
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2 ml-4">
                                            <a href=""
                                                class="bg-[#52B69A] hover:bg-[#449985] text-white px-3 py-1 rounded text-sm font-medium transition duration-200">
                                                Edit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <div class="text-gray-400 mb-3">
                                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-500 font-medium">Belum ada draft tersimpan</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
