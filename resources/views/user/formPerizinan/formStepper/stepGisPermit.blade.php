@extends('layouts.stepperForm')

@section('title', 'Tipe Permohonan')

@section('step-2')

    <div class="step-content" data-step="2">
        <h1 class="text-primary font-bold text-2xl">Tambah Lokasi</h1>
        <p class="mb-4">Masukkan alamat lokasi perusahaan</p>
        <ul>
            {{-- @dd($locations); --}}
            @foreach ($locations as $location)
                <li class="mb-2">
                    {{ $location->name }} ({{ $location->latitude }}, {{ $location->longitude }})<br>
                    <a href="{{ route('location.edit', $location->id) }}">Edit</a>
                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        <input type="text" name="name" placeholder="Nama Lokasi" required>
                        <input type="text" name="latitude" placeholder="Latitude" required>
                        <input type="text" name="longitude" placeholder="Longitude" required>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    <div id="map" style="height: 400px;"></div>
    <script>
        var map = L.map('map').setView([0, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        // @foreach ($locations as $location)
        //     L.marker([{{ $location->latitude }}, {{ $location->longitude }}])
        //         .addTo(map)
        //         .bindPopup("{{ $location->name }}");
        // @endforeach
    </script>
@endsection
