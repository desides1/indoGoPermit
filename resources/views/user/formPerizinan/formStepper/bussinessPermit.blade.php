@extends('layouts.template')

@section('title', 'Homepage')

@section('content-primary')
@section('content-secondary')

    <form id="multi-step-form" class="space-y-6 ">

        <div class="step-content" data-step="4">
            <h1 class="text-primary font-bold text-2xl">Badan Usaha</h1>
            <p class="mb-4">Ambil data atau masukkan informasi badan usaha.</p>
            <div class="grid grid-cols-2 gap-4 w-full">
                <div class="">
                    <div class="">
                        <label for="name" class="block font-medium text-gray-700">Nama Perusahaan</label>
                        <input type="name" id="name" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="identity" class="block font-medium text-gray-700 mt-4">No. NPWP
                            Perusahaan</label>
                        <input type="text" id="identity" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="bidangUsaha" class="block font-medium text-gray-700 mt-4">Bidang Usaha</label>
                        <input type="text" id="bidangUsaha" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="jumlahPegawai" class="block font-medium text-gray-700 mt-4">Jumlah
                            Pegawai</label>
                        <input type="text" id="jumlahPegawai" class="input w-full p-2 border border-gray-300 rounded-md">
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
                        <label for="noRegistration" class="block font-medium text-gray-700">No.
                            Registrasi</label>
                        <input type="text" id="noRegistration"
                            class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="jenisPerusahaan" class="block font-medium text-gray-700 mt-4">Jenis
                            Perusahaan</label>
                        <input type="text" id="jenisPerusahaan"
                            class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="jenisUsaha" class="block font-medium text-gray-700 mt-4">Jenis Usaha</label>
                        <input type="text" id="jenisUsaha" class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="nilaiInvestasi" class="block font-medium text-gray-700 mt-4">Nilai
                            Investasi</label>
                        <input type="number" id="nilaiInvestasi"
                            class="input w-full p-2 border border-gray-300 rounded-md">
                    </div>
                    <div class="">
                        <label for="fax" class="block font-medium text-gray-700 mt-4">fax</label>
                        <input type="fax" id="fax" class="input w-full p-2 border border-gray-300 rounded-md">
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
