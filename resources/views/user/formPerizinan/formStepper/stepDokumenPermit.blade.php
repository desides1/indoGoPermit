@extends('layouts.stepperForm')

@section('title', 'Tipe Permohonan')

@section('step-4')

    <div class="step-content" data-step="5">
        <h1 class="text-primary font-bold text-2xl">DATA PERMOHONAN</h1>
        <p class="mb-4">Masukkan Informasi Data Pemohon</p>

        <div class="rounded-lg p-4 shadow-sm w-full bg-white mb-4">
            <h3 class="text-sm font-semibold">
                Akta Pendirian dan Perusahaan Non Perorangan
            </h3>
            <div class="grid grid-cols-3 gap-2 mt-2">
                <div class="">
                    <label for="document" class="text-sm w-24">No. Dokumen</label>
                    <input type="text" id="document" name="document"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berlaku</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berlaku" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berakhir</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berakhir" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 accent-green-500" />
                        <span class="text-sm">Terpenuhi</span>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                            </svg>
                        </button>
                        <button class="bg-red-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-red-500 text-sm">Dokumen wajib terpenuhi</p>
                </div>
            </div>
        </div>
        <div class="rounded-lg p-4 shadow-sm w-full bg-white mb-4">
            <h3 class="text-sm font-semibold">
                Rencana pengembangan satuan pendidikan dengan mengacu pada standar Nasional Pendidikan
            </h3>
            <div class="grid grid-cols-3 gap-2 mt-2">
                <div class="">
                    <label for="document" class="text-sm w-24">No. Dokumen</label>
                    <input type="text" id="document" name="document"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berlaku</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berlaku" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berakhir</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berakhir" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 accent-green-500" />
                        <span class="text-sm">Terpenuhi</span>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                            </svg>
                        </button>
                        <button class="bg-red-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-red-500 text-sm">Dokumen wajib terpenuhi</p>
                </div>
            </div>
        </div>
        <div class="rounded-lg p-4 shadow-sm w-full bg-white mb-4">
            <h3 class="text-sm font-semibold">
                Izin Mendirikan Bangunan (IMB) atau perubahan fungsi IMB beserta gambar atau Surat Keterangan
                Rencana kota (SKRK) dari dinas PUPR </h3>

            <div class="grid grid-cols-3 gap-2 mt-2">
                <div class="">
                    <label for="document" class="text-sm w-24">No. Dokumen</label>
                    <input type="text" id="document" name="document"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berlaku</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berlaku" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berakhir</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berakhir" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 accent-green-500" />
                        <span class="text-sm">Terpenuhi</span>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                            </svg>
                        </button>
                        <button class="bg-red-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-red-500 text-sm">Dokumen wajib terpenuhi</p>
                </div>
            </div>
        </div>
        <div class="rounded-lg p-4 shadow-sm w-full bg-white mb-4">
            <h3 class="text-sm font-semibold">
                Kartu Tanda Penduduk (KTP ) masih berlaku </h3>
            <div class="grid grid-cols-3 gap-2 mt-2">
                <div class="">
                    <label for="document" class="text-sm w-24">No. Dokumen</label>
                    <input type="text" id="document" name="document"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berlaku</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berlaku" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berakhir</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berakhir" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 accent-green-500" />
                        <span class="text-sm">Terpenuhi</span>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                            </svg>
                        </button>
                        <button class="bg-red-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-red-500 text-sm">Dokumen wajib terpenuhi</p>
                </div>
            </div>
        </div>
        <div class="rounded-lg p-4 shadow-sm w-full bg-white mb-4">
            <h3 class="text-sm font-semibold">
                SPPT dan Bukti Pelunasan Tahun Terakhir
            </h3>

            <div class="grid grid-cols-3 gap-2 mt-2">
                <div class="">
                    <label for="document" class="text-sm w-24">No. Dokumen</label>
                    <input type="text" id="document" name="document"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berlaku</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berlaku" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berakhir</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berakhir" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 accent-green-500" />
                        <span class="text-sm">Terpenuhi</span>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                            </svg>
                        </button>
                        <button class="bg-red-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-red-500 text-sm">Dokumen wajib terpenuhi</p>
                </div>
            </div>
        </div>
        <div class="rounded-lg p-4 shadow-sm w-full bg-white mb-4">
            <h3 class="text-sm font-semibold">
                NPWP Lembaga dan Penanggung Jawab </h3>

            <div class="grid grid-cols-3 gap-2 mt-2">
                <div class="">
                    <label for="document" class="text-sm w-24">No. Dokumen</label>
                    <input type="text" id="document" name="document"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berlaku</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berlaku" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berakhir</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berakhir" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 accent-green-500" />
                        <span class="text-sm">Terpenuhi</span>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                            </svg>
                        </button>
                        <button class="bg-red-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-red-500 text-sm">Dokumen wajib terpenuhi</p>
                </div>
            </div>
        </div>
        <div class="rounded-lg p-4 shadow-sm w-full bg-white mb-4">
            <h3 class="text-sm font-semibold">
                Denah ruangan tempat pendidikan </h3>

            <div class="grid grid-cols-3 gap-2 mt-2">
                <div class="">
                    <label for="document" class="text-sm w-24">No. Dokumen</label>
                    <input type="text" id="document" name="document"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berlaku</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berlaku" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berakhir</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berakhir" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 accent-green-500" />
                        <span class="text-sm">Terpenuhi</span>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                            </svg>
                        </button>
                        <button class="bg-red-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-red-500 text-sm">Dokumen wajib terpenuhi</p>
                </div>
            </div>
        </div>
        <div class="rounded-lg p-4 shadow-sm w-full bg-white mb-4">
            <h3 class="text-sm font-semibold">
                Susunan pengurus dan Rician Tugas beserta ijazah </h3>

            <div class="grid grid-cols-3 gap-2 mt-2">
                <div class="">
                    <label for="document" class="text-sm w-24">No. Dokumen</label>
                    <input type="text" id="document" name="document"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berlaku</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berlaku" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berakhir</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berakhir" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 accent-green-500" />
                        <span class="text-sm">Terpenuhi</span>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                            </svg>
                        </button>
                        <button class="bg-red-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-red-500 text-sm">Dokumen wajib terpenuhi</p>
                </div>
            </div>
        </div>
        <div class="rounded-lg p-4 shadow-sm w-full bg-white mb-4">
            <h3 class="text-sm font-semibold">
                Bukti penguasaan lahan (SHM/Perjanjian sewa/Perjanjian sewa/perjanjian pinjam pakai dll) </h3>

            <div class="grid grid-cols-3 gap-2 mt-2">
                <div class="">
                    <label for="document" class="text-sm w-24">No. Dokumen</label>
                    <input type="text" id="document" name="document"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berlaku</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berlaku" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berakhir</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berakhir" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 accent-green-500" />
                        <span class="text-sm">Terpenuhi</span>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                            </svg>
                        </button>
                        <button class="bg-red-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-red-500 text-sm">Dokumen wajib terpenuhi</p>
                </div>
            </div>
        </div>
        <div class="rounded-lg p-4 shadow-sm w-full bg-white mb-4">
            <h3 class="text-sm font-semibold">
                Nomor Induk Berusaha (NIB) </h3>
            <div class="grid grid-cols-3 gap-2 mt-2">
                <div class="">
                    <label for="document" class="text-sm w-24">No. Dokumen</label>
                    <input type="text" id="document" name="document"
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berlaku</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berlaku" />
                </div>
                <div class="">
                    <label for="datepicker">Masa Berakhir</label>
                    <x-datepicker name="tanggal_lahir" required placeholder="Masa Berakhir" />
                </div>

                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" class="w-4 h-4 accent-green-500" />
                        <span class="text-sm">Terpenuhi</span>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-green-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                            </svg>
                        </button>
                        <button class="bg-red-500 p-2 rounded text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-red-500 text-sm">Dokumen wajib terpenuhi</p>
                </div>
            </div>
        </div>

    </div>

@endsection
