<div class="step-content" data-step="2" x-data="{ selectedOption: '' }">
    <input type="hidden" name="typeRequester" :value="selectedOption">
    <h1 class="text-primary font-bold text-2xl">TIPE PEMOHON</h1>
    <p class="mb-4">Pilih Tipe Pemohon</p>

    <div class="grid grid-cols-2 gap-2 w-fit justify-self-center">
        <!-- Opsi Perorangan -->
        <div class="Perorangan">
            <a href="#" @click.prevent="selectedOption = 'individual'"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 transition duration-200 cursor-pointer">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Perseorangan</h5>
                <p class="font-normal text-gray-700">Informasi terkait data pribadi pemohon</p>
            </a>
        </div>

        <!-- Opsi Badan Usaha -->
        <div class="badanUsaha">
            <a href="#" @click.prevent="selectedOption = 'business'"
                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 transition duration-200 cursor-pointer">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Badan Usaha</h5>
                <p class="font-normal text-gray-700">Informasi terkait data badan usaha pemohon</p>
            </a>
        </div>
    </div>

    <!-- Formulir yang muncul sesuai pilihan -->
    <div x-show="selectedOption === 'individual'" class="mt-6">
        @include('user.formPerizinan.formStepper.individualPermit')
    </div>

    <div x-show="selectedOption === 'business'" class="mt-6">
        @include('user.formPerizinan.formStepper.bussinessPermit')
    </div>
</div>

@push('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Individual
            $('#province-dropdown-individual').on('change', function() {
                var id_province = $(this).val();
                $("#city-dropdown-individual").html('<option value="">Pilih Kota/Kabupaten</option>');
                $("#subdistric-dropdown-individual").html('<option value="">Pilih Kecamatan</option>');
                if (id_province) {
                    $.ajax({
                        url: "{{ url('/fetch-city') }}",
                        type: "POST",
                        data: {
                            id_province: id_province,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            const selectedCityId = $('#selected-city-id').val();
                            $.each(result.city, function(key, value) {
                                let selectedAttr = (value.id_city == selectedCityId) ?
                                    'selected' : '';
                                $("#city-dropdown-individual").append(
                                    '<option value="' + value.id_city + '" ' +
                                    selectedAttr + '>' + value.name + '</option>'
                                );
                            });
                        }
                    });
                }
            });

            // Business
            $('#province-dropdown-business').on('change', function() {
                var id_province = $(this).val();
                $("#city-dropdown-business").html('<option value="">Pilih Kota/Kabupaten</option>');
                $("#subdistric-dropdown-business").html('<option value="">Pilih Kecamatan</option>');
                if (id_province) {
                    $.ajax({
                        url: "{{ url('/fetch-city') }}",
                        type: "POST",
                        data: {
                            id_province: id_province,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(result) {
                            $.each(result.city, function(key, value) {
                                $("#city-dropdown-business").append('<option value="' +
                                    value.id_city + '">' + value.name + '</option>');
                            });
                        }
                    });
                }
            });

            // Repeat similar logic for city → subdistrict for both forms
        });
    </script>
@endpush
