<div class="step-content" data-step="6">
    <h1 class="text-primary font-bold text-2xl">Proyek</h1>
    <p class="mb-4">Masukkan nilai dan informasi proyek lainnya</p>

    <div class="grid grid-cols-2 gap-4 w-full">
        <div class="col">
            <div class="">
                <label for="large" class="block font-medium text-gray-700">Jenis
                    Proyek</label>
                <select id="large" name="project_type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5 ">
                    <option selected>Pilih Jenis Proyek</option>
                    <option value="PMA">PMA</option>
                    <option value="PMDN">PMDN</option>
                    <option value="Non Fasilitas">Non Fasilitas</option>

                </select>
            </div>
            <div class="">
                <label for="investment_value" class="block font-medium text-gray-700 mt-4">Nilai
                    Investasi</label>
                <input type="text" id="investment_value" name="investment_value"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
        </div>
        <div class="col">
            <div class="">
                <label for="target_pad" class="block font-medium text-gray-700">Target PAD</label>
                <input type="text" id="targetPad" name="target_pad"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="">
                <label for="total_employee" class="block font-medium text-gray-700 mt-4">Jumlah Tenaga
                    Kerja</label>
                <input type="text" id="total_employee" name="total_employee"
                    class="input w-full p-2 border border-gray-300 rounded-md">
            </div>
        </div>
    </div>

</div>
