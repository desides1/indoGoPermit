{{-- <div class="step-content" data-step="5">
    <h1 class="text-primary font-bold text-2xl">DATA PERMOHONAN</h1>
    <p class="mb-4">Masukkan Informasi Data Pemohon</p>


    <x-card-document title="Akta Pendirian dan Perusahaan Non Perorangan" documentName="akta_document"
        startDateName="akta_start_date" endDateName="akta_end_date" documentLabel="Nomor Akta"
        startDateLabel="Tanggal Berlaku Akta" endDateLabel="Tanggal Berakhir Akta" />

    <x-card-document title="Rencana Pengembangan Satuan Pendidikan" documentName="rencana_document"
        startDateName="rencana_start_date" endDateName="rencana_end_date" documentLabel="Nomor Rencana"
        startDateLabel="Tanggal Berlaku Rencana" endDateLabel="Tanggal Berakhir Rencana" />

    <x-card-document title="Izin Mendirikan Bangunan (IMB)" documentName="imb_document" startDateName="imb_start_date"
        endDateName="imb_end_date" documentLabel="Nomor IMB" startDateLabel="Tanggal Berlaku IMB"
        endDateLabel="Tanggal Berakhir IMB" />

    <x-card-document title="Kartu Tanda Penduduk (KTP) masih berlaku" documentName="ktp_document"
        startDateName="ktp_start_date" endDateName="ktp_end_date" documentLabel="Nomor KTP"
        startDateLabel="Tanggal Berlaku KTP" endDateLabel="Tanggal Berakhir KTP" />

    <x-card-document title="SPPT dan Bukti Pelunasan Tahun Terakhir" documentName="sppt_document"
        startDateName="sppt_start_date" endDateName="sppt_end_date" documentLabel="Nomor SPPT"
        startDateLabel="Tanggal Berlaku SPPT" endDateLabel="Tanggal Berakhir SPPT" />

    <x-card-document title="NPWP Lembaga dan Penanggung Jawab" documentName="npwp_document"
        startDateName="npwp_start_date" endDateName="npwp_end_date" documentLabel="Nomor NPWP"
        startDateLabel="Tanggal Berlaku NPWP" endDateLabel="Tanggal Berakhir NPWP" />

    <x-card-document title="Denah ruangan tempat pendidikan" documentName="denah_document"
        startDateName="denah_start_date" endDateName="denah_end_date" documentLabel="Nomor Denah"
        startDateLabel="Tanggal Berlaku Denah" endDateLabel="Tanggal Berakhir Denah" />

    <x-card-document title="Susunan pengurus dan Rician Tugas beserta ijazah" documentName="susunan_document"
        startDateName="susunan_start_date" endDateName="susunan_end_date" documentLabel="Nomor Dokumen Susunan"
        startDateLabel="Tanggal Berlaku Dokumen" endDateLabel="Tanggal Berakhir Dokumen" />

    <x-card-document title="Bukti penguasaan lahan (SHM/Perjanjian sewa/Perjanjian pinjam pakai dll)"
        documentName="lahan_document" startDateName="lahan_start_date" endDateName="lahan_end_date"
        documentLabel="Nomor Bukti Lahan" startDateLabel="Tanggal Berlaku Bukti Lahan"
        endDateLabel="Tanggal Berakhir Bukti Lahan" />

    <x-card-document title="Nomor Induk Berusaha (NIB)" documentName="nib_document" startDateName="nib_start_date"
        endDateName="nib_end_date" documentLabel="Nomor NIB" startDateLabel="Tanggal Berlaku NIB"
        endDateLabel="Tanggal Berakhir NIB" />

</div> --}}

@foreach ($requirements as $requirement)
    <div class="bg-white rounded-xl shadow-md p-6 space-y-6 w-full mb-6">
        <!-- Judul -->
        <h3 class="text-lg font-semibold text-gray-800">
            {{ $requirement->name }}
        </h3>

        <input type="hidden" name="data[{{ $requirement->id_requirement }}][requirement_id]"
            value="{{ $requirement->id_requirement }}">

        <!-- Upload File -->
        <div class="space-y-2">
            <div class="flex items-center gap-4">
                <div class="max-w-md:w-1/2 w-full">
                    {{-- @dd($requirement); --}}
                    <span>{{ $requirement->id_requirement }}</span>

                    <label class="block text-sm font-medium text-gray-700 pb-4" for="file_">Unggah
                        Dokumen</label>
                    <input id="file_{{ $requirement->id_requirement }}" type="file" multiple
                        name="files[{{ $requirement->id_requirement }}]" accept="application/pdf" required
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 ">
                    <p class="mt-1 text-sm text-gray-500">File harus bertipe PDF</p>
                </div>

                <button type="button" onclick="document.getElementById('file_').value = ''"
                    class="inline-flex items-center gap-2 text-red-600 hover:text-red-700 text-sm font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22" />
                    </svg>
                    Hapus
                </button>
            </div>
        </div>

        <!-- Nomor dan Tanggal -->
        <div class="grid grid-cols-3 gap-2">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Dokumen</label>
                <input type="text" name="data[{{ $requirement->id_requirement }}][number]"
                    class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                <x-datepicker name="data[{{ $requirement->id_requirement }}][start_date]" required
                    placeholder="Masa Berlaku" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Berakhir</label>
                <x-datepicker name="data[{{ $requirement->id_requirement }}][end_date]" required
                    placeholder="Masa Berakhir" />
            </div>
        </div>

        <!-- Status -->
        <div class="grid grid-cols-3 gap-4 mt-4">
            <div class="flex items-center gap-2">
                <input type="checkbox" name="data[{{ $requirement->id_requirement }}][fulfilled]"
                    class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500" />
                <span class="text-sm text-gray-700">Terpenuhi</span>
            </div>

            <div class="flex items-center gap-2">
                <input type="checkbox" name="data[{{ $requirement->id_requirement }}][no_expiry]"
                    onchange="toggleDate(this, 'valid_until_')"
                    class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
                <span class="text-sm text-gray-700">Tidak memiliki masa berlaku</span>
            </div>
        </div>

        <p class="text-sm text-red-500">Dokumen wajib terpenuhi</p>
    </div>
@endforeach

{{-- <div class="rounded-lg p-4 shadow-sm w-full bg-white mb-4">
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
    </div> --}}
