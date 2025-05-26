{{-- @dd($provinces) --}}
<div class="step-content" data-step="3">
    <h1 class="text-primary font-bold text-2xl">Perseorangan</h1>
    <p class="mb-4">Ambil data atau masukkan informasi perorangan.</p>
    <div class="grid grid-cols-2 gap-4 w-full">
        <div class="">
            <div class="">
                <label for="name" class="block font-medium text-gray-700">Nama Lengkap (Tanpa
                    Gelar)</label>
                <input type="name" id="name" name="name"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="identity" class="block font-medium text-gray-700 mt-4">No. Identitas</label>
                <input type="identity" id="identity" name="identity"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class=" my-4 mb-7">
                <p class="pb-2">Jenis Kelamin</p>
                <div class="flex">
                    <div class="flex items-center">
                        <input id="default-radio-1" type="radio" value="Laki-laki" name="default-radio"
                            class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500">
                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    </div>
                    <div class="flex items-center ml-4">
                        <input checked id="default-radio-2" type="radio" value="Perempuan" name="default-radio"
                            class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500">
                        <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="">
                <label for="birthPlace" class="block font-medium text-gray-700 mt-4">Tempat
                    Lahir(Kota)</label>
                <input type="text" id="birthPlace" name="birthPlace"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="telp" class="block font-medium text-gray-700 mt-4">No. Telp/HP</label>
                <input type="telp" id="telp" name="telp"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="email" class="block font-medium text-gray-700 mt-4">Alamat Email</label>
                <input type="email" id="email" name="email"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="city" class="block font-medium text-gray-700 mt-4">Kota/Kabupaten</label>
                <select id="city-dropdown-individual" class="city-dropdown" name="city"
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
                <label for="large" class="block font-medium text-gray-700">Tipe Dokumen Identitas</label>
                <select id="large" name="identityType"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 ">
                    <option selected>Pilih tipe identitas</option>
                    <option value="KTP">KTP</option>
                    <option value="SIM">SIM</option>
                    <option value="Passport">Passport</option>
                </select>
            </div>
            <div class="">
                <label for="npwp" class="block font-medium text-gray-700 mt-4">No. Npwp</label>
                <input type="text" id="npwp" name="npwp"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="job" class="block font-medium text-gray-700 mt-4">Pekerjaan</label>
                <input type="text" id="job" name="job"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="dateOfBirth" class="block font-medium text-gray-700 mt-4">Tanggal Lahir</label>
                <input type="date" id="dateOfBirth" name="dateOfBirth"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="">
                <label for="province" class="block font-medium text-gray-700 mt-4">Provinsi</label>
                <select id="province-dropdown-individual" name="province"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5">
                    <option selected disabled>Pilih </option>
                    {{-- <option value="{{ $data->id_province }}">{{ $data->name }}</option> --}}
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id_province }}">{{ $province->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="">
                <label for="subdistrict" class="block font-medium text-gray-700 mt-4">Kecamatan</label>
                <input type="text" id="subdistrict" name="subdistrict"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="postal" class="block font-medium text-gray-700 mt-4">Kode Pos</label>
                <input type="text" id="postal" name="postal"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="address" class="block font-medium text-gray-700 mt-4">Alamat Lengkap</label>
                <textarea type="text" id="address" class="input w-full p-2 border border-gray-300 rounded-md"></textarea>
            </div>
        </div>
    </div>

</div>
