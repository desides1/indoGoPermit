@extends('layouts.stepperForm')

@section('title', 'multi-step')

@section('step-1')

    <div class="step-content active" data-step="1">
        <h1 class="text-primary font-bold text-2xl">DATA PERMOHONAN</h1>
        <p class="mb-4">Masukkan Informasi Data Pemohon</p>
        <label for="large" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
            Permohonan</label>
        <select id="large"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
            <option selected>Pilih Jenis Permohonan</option>
            <option value="Baru">Baru</option>
            <option value="Perpanjangan">Perpanjangan</option>
            <option value="Perubahan">Perubahan</option>
            <option value="Pencabutan">Pencabutan</option>
        </select>
        <label for="large" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
            Instansi</label>
        <select id="large"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
            <option selected>Pilih asal instansi</option>
            <option value="US">Kota Bogor</option>
            <option value="CA">Kota Blitar</option>
            <option value="FR">Kota Bukit tinggi</option>
            <option value="DE">Kota Cilegon</option>
            <option value="DE">Kota Cimahi</option>
            <option value="DE">Kota Cirebon</option>
            <option value="DE">Kota Denpasar</option>
            <option value="DE">Kota Badung</option>
        </select>
        <label for="large" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit</label>
        <select id="large"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
            <option selected>Pilih Unit</option>
            <option value="US">United States</option>
            <option value="CA">Canada</option>
            <option value="FR">France</option>
            <option value="DE">Germany</option>
        </select>
        <label for="large" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
            Izin</label>
        <select id="large"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
            <option selected>Pilih Jenis Izin</option>
            <option value="US">Izin Pendirian Satuan Pendidikan NonFormal-SPNF</option>
            <option value="CA">Izin Pendirian Satuan Pedidikan Anak Usia Dini-PAUD</option>
            <option value="FR">Izin Pendirian Satuan Pendidikan Satuan Sekolah Dasar-SD</option>
            <option value="DE">Izin Pendirian Satuan Pendidikan Satuan Sekolah Menengah Pertama-SMP</option>
            <option value="DE">Izin Penyelenggaraan Laboratorium Kesehatan Masyarakat</option>
            <option value="DE">Izin Peruntukan Penggunaan Tanahh-IPPT</option>
            <option value="DE">IKonfirmasi Kesesuaian Kegiatan Pemanfaatan Ruang NonBerusaha-KKKPR</option>
            <option value="DE">Legalisir IMB-LIMB</option>
            <option value="DE">Izin Pendirian Satuan Pendidikan NonFormal</option>
        </select>
        <div class="mb-6">
            <label for="nomorPermohonan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                Permohonan</label>
            <input type="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                disabled />
        </div>
    </div>


@endsection
