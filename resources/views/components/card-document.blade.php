<div class="bg-white rounded-xl shadow-md p-6 space-y-6 w-full mb-6">
    <!-- Judul -->
    <h3 class="text-lg font-semibold text-gray-800">
        {{ $title }}
    </h3>
    @foreach ($requirements as $requirement)
        <input type="hidden" name="requirement_ids[{{ $requirement->name }}]" value="{{ $requirement->id }}">
    @endforeach
    <!-- Upload File -->
    <div class="space-y-2">

        <div class="flex items-center gap-4">

            <!-- Tombol Upload -->
            <div class="max-w-md:w-1/2 w-full">
                <label class="block text-sm font-medium text-gray-700 pb-4" for="multiple_files">Unggah Dokumen</label>

                <input id="multiple_files" type="file" multiple name="{{ $documentName }}" accept="application/pdf"
                    required
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 ">
                <p class="mt-1 text-sm text-gray-500 " id="file_input_help">File harus bertipe PDF</p>
            </div>

            <!-- Tombol Hapus -->
            <button type="button" onclick="hapusFile()"
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


    <!-- Tanggal Mulai dan Berakhir -->
    <div class="grid grid-cols-3 md:grid-cols-3 gap-2">

        <!-- Nomor Dokumen -->
        <div>
            <label for="document" class="block text-sm font-medium text-gray-700 mb-1">
                {{ $documentLabel }}
            </label>
            <input type="text" id="document" name="{{ $documentName }}"
                class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm" />
        </div>
        <!-- Tanggal Mulai -->
        <div>
            <label for="startDate" class="block text-sm font-medium text-gray-700 mb-1">
                {{ $startDateLabel }}
            </label>
            <x-datepicker name="{{ $startDateName }}" required placeholder="Masa Berlaku" />
        </div>

        <!-- Tanggal Berakhir -->
        <div>
            <label for="endDate" class="block text-sm font-medium text-gray-700 mb-1">
                {{ $endDateLabel }}
            </label>
            <x-datepicker name="{{ $endDateName }}" required placeholder="Masa Berakhir" />
        </div>
    </div>

    <!-- Status & Validasi -->
    <div class="grid grid-cols-3 gap-4 mt-4">
        <!-- Terpenuhi -->
        <div class="flex items-center gap-2">
            <input type="checkbox" class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500" />
            <span class="text-sm text-gray-700">Terpenuhi</span>
        </div>

        <!-- Tidak Memiliki Masa Berlaku -->
        <div class="flex items-center gap-2">
            <input type="checkbox" onchange="toggleDate(this, 'valid_until_ktp')"
                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500" />
            <span class="text-sm text-gray-700">Tidak memiliki masa berlaku</span>
        </div>
    </div>
    <!-- Validasi -->
    <p class="text-sm text-red-500">Dokumen wajib terpenuhi</p>
</div>

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr(".flatpickr-input", {
                dateFormat: "Y-m-d",
                allowInput: true,
            });
        });
    </script>
    <script>
        function hapusFile() {
            const fileInput = document.getElementById('multiple_files');
            fileInput.value = ''; // Menghapus semua file yang dipilih
        }
    </script>
@endpush
