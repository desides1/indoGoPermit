@extends('layout.index')

@section('hide_footer', true)
@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="mb-8">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}!</h1>
                            <p class="text-gray-600 mt-1">Dashboard {{ Auth::user()->getRoleNames()->first() }} - Kelola pengajuan perizinan Anda</p>
                        </div>
                        <div class="text-right">
                            <div class="bg-blue-100 text-blue-800 text-sm font-medium px-4 py-2 rounded-full">
                                <i class="fas fa-user mr-2"></i>{{ Auth::user()->getRoleNames()->first() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="bg-blue-100 p-3 rounded-full mr-4">
                            <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Pengajuan</p>
                            <p class="text-2xl font-bold text-gray-800">8</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="bg-yellow-100 p-3 rounded-full mr-4">
                            <i class="fas fa-clock text-yellow-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Dalam Proses</p>
                            <p class="text-2xl font-bold text-gray-800">3</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="bg-green-100 p-3 rounded-full mr-4">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Disetujui</p>
                            <p class="text-2xl font-bold text-gray-800">4</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center">
                        <div class="bg-red-100 p-3 rounded-full mr-4">
                            <i class="fas fa-edit text-red-600 text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600">Perlu Perbaikan</p>
                            <p class="text-2xl font-bold text-gray-800">1</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Aksi Cepat</h2>
                    <div class="flex flex-wrap gap-4">
                        <button
                            class="bg-[#52B69A] hover:bg-[#449985] text-white px-6 py-3 rounded-lg font-medium transition duration-200 flex items-center">
                            <i class="fas fa-plus mr-2"></i>
                            Pengajuan Baru
                        </button>
                        <button
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition duration-200 flex items-center">
                            <i class="fas fa-file-alt mr-2"></i>
                            Lihat Semua Pengajuan
                        </button>
                        <button
                            class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg font-medium transition duration-200 flex items-center">
                            <i class="fas fa-save mr-2"></i>
                            Draft Tersimpan
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Pengajuan Terbaru</h2>
                    <div class="space-y-4">
                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <h3 class="text-lg font-medium text-gray-800 mb-3">Pengajuan perizinan "Course LKP Fun Mandarin"
                            </h3>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 mb-2">12 Mei 2025 - 14:00</p>
                                    <div class="flex items-center">
                                        <span class="text-sm text-gray-700 mr-2">Status:</span>
                                        <span
                                            class="bg-red-100 text-red-800 text-xs font-medium px-3 py-1 rounded-full">Perlu
                                            Perbaikan</span>
                                    </div>
                                </div>
                                <button
                                    class="bg-[#52B69A] hover:bg-[#449985] text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                                    Detail
                                </button>
                            </div>
                        </div>

                        <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200">
                            <h3 class="text-lg font-medium text-gray-800 mb-3">Pengajuan perizinan "Course LKP Advanced
                                English"</h3>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-600 mb-2">11 Mei 2025 - 10:15</p>
                                    <div class="flex items-center">
                                        <span class="text-sm text-gray-700 mr-2">Status:</span>
                                        <span
                                            class="bg-yellow-100 text-yellow-800 text-xs font-medium px-3 py-1 rounded-full">Di
                                            Proses</span>
                                    </div>
                                </div>
                                <button
                                    class="bg-[#52B69A] hover:bg-[#449985] text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
                                    Detail
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-6">Notifikasi & Update</h2>
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                        <div class="space-y-4">
                            <div
                                class="flex items-start space-x-3 p-3 bg-yellow-50 rounded-lg border-l-4 border-yellow-400">
                                <i class="fas fa-exclamation-triangle text-yellow-600 mt-1"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Pengajuan Perlu Perbaikan</p>
                                    <p class="text-xs text-gray-600 mt-1">Pengajuan "Course LKP Fun Mandarin" memerlukan
                                        revisi dokumen</p>
                                    <p class="text-xs text-gray-500 mt-1">2 jam yang lalu</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 p-3 bg-blue-50 rounded-lg border-l-4 border-blue-400">
                                <i class="fas fa-info-circle text-blue-600 mt-1"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Informasi Sistem</p>
                                    <p class="text-xs text-gray-600 mt-1">Jadwal maintenance sistem tanggal 15 Mei 2025</p>
                                    <p class="text-xs text-gray-500 mt-1">1 hari yang lalu</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3 p-3 bg-green-50 rounded-lg border-l-4 border-green-400">
                                <i class="fas fa-check-circle text-green-600 mt-1"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Pengajuan Disetujui</p>
                                    <p class="text-xs text-gray-600 mt-1">Pengajuan "Course Basic Computer" telah disetujui
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">3 hari yang lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
