{{-- @section('title', 'Tipe Permohonan') --}}

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endsection

@csrf
{{-- @elseif ($currentStep == 'gis') --}}
<div class="step-content" data-step="2">
    <h1 class="text-primary font-bold text-2xl">Tambah Lokasi</h1>

    <div id="map" style="height: 400px;"></div>

    <p class="mb-4">Masukkan alamat lokasi perusahaan</p>
    <div class="mb-4">
        <label for="latitude" class="block text-sm font-medium text-gray-900">Latitude</label>
        <input type="text" id="latitude" name="latitude" placeholder="Latitude"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
            readonly required>
    </div>
    <div class="mb-4">
        <label for="longitude" class="block text-sm font-medium text-gray-900">Longitude</label>
        <input type="text" id="longitude" name="longitude" placeholder="Longitude"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
            readonly required>
    </div>
    <div class="mb-4">
        <label for="detail_address" class="block text-sm font-medium text-gray-900">Alamat lengkap</label>
        <input type="text" id="detail_address" name="detail_address" placeholder="Masukkan alamat lengkap perusahaan"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
            required>
    </div>
    <div class="mb-4">
        <label for="maps" class="block text-sm font-medium text-gray-900">Link Maps</label>
        <input type="text" id="maps" name="maps" placeholder="Masukkan link maps"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
            required>
    </div>
</div>


@push('script')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Initialize the map
        var map = L.map('map').setView([-8.2, 114.3], 13); // Default coordinates

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        // Add a draggable marker
        var marker = L.marker([-8.2, 114.3], {
            draggable: true
        }).addTo(map);

        // Update latitude and longitude fields when the marker is dragged
        marker.on('dragend', function(e) {
            var lat = e.target.getLatLng().lat;
            var lng = e.target.getLatLng().lng;

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        });
    </script>
@endpush
