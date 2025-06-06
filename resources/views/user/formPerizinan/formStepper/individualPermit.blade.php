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
                <label for="number_identity" class="block font-medium text-gray-700 mt-4">No. Identitas</label>
                <input type="number_identity" id="number_identity" name="number_identity"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class=" my-4 mb-7">
                <p class="pb-2">Jenis Kelamin</p>
                <div class="flex">
                    <div class="flex items-center">
                        <input id="default-radio-1" type="radio" value="Laki-laki" name="defaultRadio"
                            class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500">
                        <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900">Laki-laki</label>
                    </div>
                    <div class="flex items-center ml-4">
                        <input checked id="default-radio-2" type="radio" value="Perempuan" name="defaultRadio"
                            class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500">
                        <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="">
                <label for="birthplace" class="block font-medium text-gray-700 mt-4">Tempat
                    Lahir(Kota)</label>
                <input type="text" id="birthplace" name="birthplace"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="telp-individual" class="block font-medium text-gray-700 mt-4">No. Telp/HP</label>
                <input type="telp" id="telp-individual" name="telpIndividual"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="email-individual" class="block font-medium text-gray-700 mt-4">Alamat
                    Email-individual</label>
                <input type="email" id="email-individual" name="emailIndividual"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="city" class="block font-medium text-gray-700 mt-4">Kota/Kabupaten</label>
                <select id="city-dropdown-individual" name="cityDropdownIndividual"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5">
                    <option value="" selected>Pilih kota/kabupaten</option>
                </select>
                {{-- <input type="hidden" name="city" id="selectedCityId" value="{{ old('city') }}"> --}}
            </div>
            <div class="">
                <label for="village-individual" class="block font-medium text-gray-700 mt-4">Desa/Kelurahan</label>
                <input type="text" id="village-individual" name="villageIndividual"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
        </div>


        <div class="">
            <div class="">
                <label for="identity_type" class="block font-medium text-gray-700">Tipe Dokumen Identitas</label>
                <select id="largeIdentity" name="identity_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 ">
                    <option selected disabled>Pilih tipe identitas</option>
                    <option value="KTP">KTP</option>
                    <option value="SIM">SIM</option>
                    <option value="Passport">Passport</option>
                </select>
            </div>
            <div class="">
                <label for="npwp_number" class="block font-medium text-gray-700 mt-4">No. Npwp</label>
                <input type="text" id="npwp_number" name="npwp_number"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="job" class="block font-medium text-gray-700 mt-4">Pekerjaan</label>
                <input type="text" id="job" name="job"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="date_of_birth" class="block font-medium text-gray-700 mt-4">Tanggal Lahir</label>
                <input type="date" id="date_of_birth" name="date_of_birth"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="">
                <label for="province" class="block font-medium text-gray-700 mt-4">Provinsi</label>
                <select id="province-dropdown-individual" name="province"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5">
                    <option selected disabled>Pilih </option>
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
                <label for="postal-individual" class="block font-medium text-gray-700 mt-4">Kode Pos</label>
                <input type="text" id="postal-individual" name="postalIndividual"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="address-individual" class="block font-medium text-gray-700 mt-4">Alamat Lengkap</label>
                <textarea type="text" id="address-individual" name="addressIndividual"
                    class="input w-full p-2 border border-gray-300 rounded-md"></textarea>
            </div>
        </div>
    </div>

</div>
