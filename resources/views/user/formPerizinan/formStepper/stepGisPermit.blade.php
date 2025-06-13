@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
@endsection

@csrf

<div class="step-content" data-step="2">
    <h1 class="text-primary font-bold text-2xl">Tambah Lokasi</h1>

    <div id="map" style="height: 400px;" class="mb-4 rounded-lg overflow-hidden shadow"></div>

    <p class="mb-4 text-gray-700">Masukkan alamat lokasi perusahaan</p>

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
        <textarea id="detail_address" name="detail_address" placeholder="Masukkan alamat lengkap perusahaan" rows="4"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
            required></textarea>
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
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script>
        const apiKey = 'CObgvxkB4OTybFrS7AI9'; // ← Ganti dengan API Key MapTiler kamu

        const defaultLatLng = [-8.2, 114.3];
        const map = L.map('map').setView(defaultLatLng, 13);

        // Tambahkan tile dari MapTiler
        L.tileLayer(`https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=CObgvxkB4OTybFrS7AI9`, {
            attribution: '&copy; <a href="https://www.maptiler.com/copyright/">MapTiler</a> contributors',
            maxZoom: 20,
        }).addTo(map);

        // Tambahkan marker draggable
        const marker = L.marker(defaultLatLng, {
            draggable: true
        }).addTo(map);

        function updateLatLngInputs(lat, lng) {
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);
        }

        marker.on('dragend', function(e) {
            const latlng = e.target.getLatLng();
            updateLatLngInputs(latlng.lat, latlng.lng);
        });

        // Tambahkan search geocoder
        L.Control.geocoder({
                defaultMarkGeocode: false,
                geocoder: L.Control.Geocoder.nominatim()
            })
            .on('markgeocode', function(e) {
                const latlng = e.geocode.center;
                map.setView(latlng, 16);
                marker.setLatLng(latlng);
                updateLatLngInputs(latlng.lat, latlng.lng);
            })
            .addTo(map);

        // Minta akses lokasi user dan update posisi peta + marker
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const userLatLng = [position.coords.latitude, position.coords.longitude];
                map.setView(userLatLng, 16);
                marker.setLatLng(userLatLng);
                updateLatLngInputs(userLatLng[0], userLatLng[1]);
            }, function(error) {
                // Jika user tolak atau error, pakai lokasi default
                updateLatLngInputs(defaultLatLng[0], defaultLatLng[1]);
            });
        } else {
            // Browser tidak support geolocation
            updateLatLngInputs(defaultLatLng[0], defaultLatLng[1]);
        }
    </script>
@endpush
