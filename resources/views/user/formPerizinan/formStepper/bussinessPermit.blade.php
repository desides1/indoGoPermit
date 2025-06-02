<div class="step-content" data-step="4">
    <h1 class="text-primary font-bold text-2xl">Badan Usaha</h1>
    <p class="mb-4">Ambil data atau masukkan informasi badan usaha.</p>
    <div class="grid grid-cols-2 gap-4 w-full">
        <div class="">
            <div class="">
                <label for="name_company" class="block font-medium text-gray-700">Nama
                    Perusahaan</label>
                <input type="name" id="name_company" name="name_company"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="identity" class="block font-medium text-gray-700 mt-4">No. NPWP
                    Perusahaan</label>
                <input type="text" id="identity" name="identity"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="bidangUsaha" class="block font-medium text-gray-700 mt-4">Bidang
                    Usaha</label>
                <input type="text" id="bidangUsaha" name="bidangUsaha"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="jumlahPegawai" id="jumlahPegawai" class="block font-medium text-gray-700 mt-4">Jumlah
                    Pegawai</label>
                <input type="text" id="jumlahPegawai" name="jumlahPegawai"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="telp" class="block font-medium text-gray-700 mt-4">No.
                    Telepon</label>
                <input type="telp" id="telp" name="telp"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="email" class="block font-medium text-gray-700 mt-4">Alamat
                    Email</label>
                <input type="email" id="email" name="email"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="city" class="block font-medium text-gray-700 mt-4">Kota/Kabupaten</label>
                <select id="city-dropdown-business" name="city"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5">
                    <option value="" selected>Pilih kota/kabupaten</option>
                </select>
            </div>
            <div class="">
                <label for="village" class="block font-medium text-gray-700 mt-4">Desa/Kelurahan</label>
                <input type="text" id="village" name="village"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
        </div>


        <div class="">
            <div class="">
                <label for="noRegistration" class="block font-medium text-gray-700">No.
                    Registrasi</label>
                <input type="text" id="noRegistration" name="noRegistration"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="jenisPerusahaan" class="block font-medium text-gray-700 mt-4">Jenis
                    Perusahaan</label>
                <input type="text" id="jenisPerusahaan" name="jenisPerusahaan"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="jenisUsaha" class="block font-medium text-gray-700 mt-4">Jenis Usaha</label>
                <input type="text" id="jenisUsaha" name="jenisUsaha"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="nilaiInvestasi" class="block font-medium text-gray-700 mt-4">Nilai
                    Investasi</label>
                <input type="number" id="nilaiInvestasi" name="nilaiInvestasi"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="fax" class="block font-medium text-gray-700 mt-4">fax</label>
                <input type="fax" id="fax" name="fax"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="province" class="block font-medium text-gray-700 mt-4">Provinsi</label>
                <select id="province-dropdown-business" name="province"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5">
                    <option selected disabled>Pilih </option>
                    {{-- <option value="{{ $data->id_province }}">{{ $data->name }}</option> --}}
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id_province }}">{{ $province->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="">
                <label for="subDistric" class="block font-medium text-gray-700 mt-4">kecamatan</label>
                <input type="text" id="subDistric" name="subDistric"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="postal" class="block font-medium text-gray-700 mt-4">Kode Pos</label>
                <input type="text" id="postal" name="postal"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
        </div>
    </div>
    <div class="">
        <label for="address" class="block font-medium text-gray-700 mt-4">Alamat Lengkap</label>
        <textarea type="text" id="address" name="address" class="input w-full p-2 border border-gray-300 rounded-md"></textarea>
    </div>
</div>
