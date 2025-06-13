@csrf
{{-- @if ($currentStep == 'request') --}}
<div class="step-content active" data-step="1">
    <h1 class="text-primary font-bold text-2xl">DATA PERMOHONAN</h1>
    <p class="mb-4">Masukkan Informasi Data Pemohon</p>

    <label for="jenisPermohonan" class="block mb-2 mt-6 text-sm font-medium text-gray-900">Jenis
        Permohonan</label>
    <select id="jenisPermohonan" name="jenisPermohonan"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
        <option selected disabled>Pilih Jenis Permohonan</option>
        <option value="Baru">Baru</option>
        <option value="Perpanjangan">Perpanjangan</option>
        <option value="Perubahan">Perubahan</option>
        <option value="Pencabutan">Pencabutan</option>
    </select>

    <label for="jenisIzin" class="block mb-2 mt-6 text-sm font-medium text-gray-900">Jenis Izin</label>
    <select id="jenisIzin" name="jenisIzin"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
        <option selected disabled class="text-gray-300">Pilih Jenis Izin</option>
        @foreach ($permitTypesDb as $type)
            <option value="{{ $type->id_permit_type }}" data-nama="{{ $type->name }}">{{ $type->name }}</option>
        @endforeach
    </select>
    <input type="hidden" name="namaJenisIzin" id="namaJenisIzin" />

    <div class="mb-6">
        <label for="nomorPermohonan" class="block mb-2 mt-6 text-sm font-medium text-gray-900">Nomor
            Permohonan</label>
        <input type="text" id="nomorPermohonan" name="nomorPermohonan" value="{{ old('nomorPermohonan') }}"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
            readonly />
    </div>
</div>

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jenisIzin = document.getElementById('jenisIzin');
            const nomorPermohonan = document.getElementById('nomorPermohonan');
            const namaJenisIzin = document.getElementById('namaJenisIzin');

            // Ambil data dari Laravel
            const numberRequests = @json($numberRequests);

            jenisIzin.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const selectedIdPermitType = parseInt(selectedOption.value);
                const namaIzin = selectedOption.dataset.nama;

                // Set input hidden namaJenisIzin
                namaJenisIzin.value = namaIzin;

                // Cari request_number sesuai permit_type_id
                const found = numberRequests.find(item => item.id_request_number === selectedIdPermitType);

                if (found) {
                    nomorPermohonan.value = found.number;
                } else {
                    nomorPermohonan.value = '';
                }
            });
        });
    </script>
@endpush
