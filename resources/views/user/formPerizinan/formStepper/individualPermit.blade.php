@extends('layouts.template')

@section('title', 'Homepage')

@section('content-primary')
@section('content-secondary')

    <form id="multi-step-form" class="space-y-6 ">
        <div class="step-content" data-step="3">
            <h1 class="text-primary font-bold text-2xl">Perseorangan</h1>
            <p class="mb-4">Ambil data atau masukkan informasi perorangan.</p>
            <div class="grid grid-cols-2 gap-4 w-full">
                <div class="">
                    <div class="">
                        <label for="name" class="block font-medium text-gray-700">Nama Lengkap (Tanpa
                            Gelar)</label>
                        <input type="name" id="name" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="identity" class="block font-medium text-gray-700 mt-4">No. Identitas</label>
                        <input type="identity" id="identity" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class=" my-4 mb-7">
                        <p class="pb-2">Jenis Kelamin</p>
                        <div class="flex">
                            <div class="flex items-center">
                                <input id="default-radio-1" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki-laki</label>
                            </div>
                            <div class="flex items-center ml-4">
                                <input checked id="default-radio-2" type="radio" value="" name="default-radio"
                                    class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2"
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <label for="bird" class="block font-medium text-gray-700 mt-4">Tempat
                            Lahir(Kota)</label>
                        <input type="text" id="bird" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="telp" class="block font-medium text-gray-700 mt-4">No. Telepon</label>
                        <input type="telp" id="telp" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="email" class="block font-medium text-gray-700 mt-4">Alamat Email</label>
                        <input type="email" id="email" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="city" class="block font-medium text-gray-700 mt-4">Kota/Kabupaten</label>
                        <input type="text" id="city" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="desa" class="block font-medium text-gray-700 mt-4">Desa/Kelurahan</label>
                        <input type="text" id="desa" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                </div>


                <div class="">
                    <div class="">
                        <label for="large" class="block font-medium text-gray-700">Jenis
                            Permohonan</label>
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
                        <label for="npwp" class="block font-medium text-gray-700 mt-4">No. Npwp</label>
                        <input type="text" id="npwp" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="pekerjaan" class="block font-medium text-gray-700 mt-4">pekerjaan</label>
                        <input type="text" id="pekerjaan" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="tglLahir" class="block font-medium text-gray-700 mt-4">Tanggal Lahir</label>
                        <input type="date" id="tglLahir" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="noHP" class="block font-medium text-gray-700 mt-4">No. HP</label>
                        <input type="telp" id="noHP" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="provinsi" class="block font-medium text-gray-700 mt-4">Provinsi</label>
                        <input type="text" id="provinsi" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="kecamatan" class="block font-medium text-gray-700 mt-4">kecamatan</label>
                        <input type="text" id="kecamatan" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="kodePos" class="block font-medium text-gray-700 mt-4">Kode Pos</label>
                        <input type="kode" id="kodePos" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                </div>
            </div>
            <div class="">
                <label for="alamat" class="block font-medium text-gray-700 mt-4">Alamat Lengkap</label>
                <textarea type="alamat" id="alamat" class="input w-full p-2 border border-gray-300 rounded-md"></textarea>
            </div>

        </div>
    </form>

@endsection
