@extends('layouts.stepperForm')

@section('title', 'Tipe Permohonan')

@section('step-5')

    <div class="step-content" data-step="6">
        <h1 class="text-primary font-bold text-2xl">Proyek</h1>
        <p class="mb-4">Masukkan nilai dan informasi proyek lainnya</p>

        <div class="grid grid-cols-2 gap-4 w-full">
            <div class="col">
                <div class="">
                    <label for="large" class="block font-medium text-gray-700">Jenis
                        Proyek</label>
                    <select id="large"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 ">
                        <option selected>Pilih Jenis Permohonan</option>
                        <option value="Baru">Baru</option>
                        <option value="Perpanjangan">Perpanjangan</option>
                        <option value="Perubahan">Perubahan</option>
                        <option value="Pencabutan">Pencabutan</option>
                    </select>
                </div>
                <div class="">
                    <label for="investasi" class="block font-medium text-gray-700 mt-4">Nilai
                        Investasi</label>
                    <input type="text" id="investasi" class="input w-full p-2 border border-gray-300 rounded-md">
                </div>
            </div>
            <div class="col">
                <div class="">
                    <label for="targetPad" class="block font-medium text-gray-700">Target PAD</label>
                    <input type="text" id="targetPad" class="input w-full p-2 border border-gray-300 rounded-md">
                </div>
                <div class="">
                    <label for="tenagaKerja" class="block font-medium text-gray-700 mt-4">Jumlah Tenaga
                        Kerja</label>
                    <input type="text" id="tenagaKerja" class="input w-full p-2 border border-gray-300 rounded-md">
                </div>
            </div>
        </div>

    </div>

@endsection
