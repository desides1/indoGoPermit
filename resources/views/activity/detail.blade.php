@extends('layout.index')

@section('content')
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Header -->
            <h1 class="text-2xl font-semibold text-gray-800 mb-2">Detail Perizinan</h1>
            <h2 class="text-lg text-gray-600 mb-6">{{ $perizinan->permissionType->name ?? 'Perizinan Course LKP Fun Mandarin' }}</h2>

            <!-- Process Tracker -->
            <div class="bg-gray-100 rounded-lg p-8 mb-6">
                <div class="grid grid-cols-4 gap-4">
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-3 rounded-full flex items-center justify-center text-2xl {{ $perizinan->status == 'draft' ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600' }}">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <span class="text-sm text-gray-700">Input</span>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-3 rounded-full flex items-center justify-center text-2xl {{ in_array($perizinan->status, ['disetujui', 'ditolak']) ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600' }}">
                            <i class="fas fa-cog"></i>
                        </div>
                        <span class="text-sm text-gray-700">Processed</span>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-3 rounded-full flex items-center justify-center text-2xl {{ $perizinan->status == 'disetujui' ? 'bg-green-500 text-white' : 'bg-gray-300 text-gray-600' }}">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="text-sm text-gray-700">Approved</span>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 mx-auto mb-3 rounded-full flex items-center justify-center text-2xl bg-gray-300 text-gray-600">
                            <i class="fas fa-award"></i>
                        </div>
                        <span class="text-sm text-gray-700">Issued</span>
                    </div>
                </div>
            </div>

            <!-- Data Permohonan -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-blue-900 mb-1">DATA PERMOHONAN</h3>
                    <p class="text-sm text-gray-600 mb-5">Masukkan informasi data permohonan.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Permohonan *</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->request->request_type ?? 'Baru' }}" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Instansi *</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="Pilih Instansi" readonly>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Unit *</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="Pilih Unit" readonly>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Izin *</label>
                            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->permissionType->name ?? '' }}" readonly>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Permohonan</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-100" value="{{ $perizinan->request->requestNumber->number ?? '' }}" readonly>
                    </div>
                </div>
            </div>

            <!-- Data Lokasi -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-blue-900 mb-1">DATA LOKASI</h3>
                    <p class="text-sm text-gray-600 mb-5">Silir lokasi pada area dan masukkan informasi lokasi tempat usaha.</p>

                    <!-- Leaflet Map -->
                    <div id="map" class="h-72 rounded-lg mb-4 border border-gray-300"></div>

                    <div class="overflow-x-auto mb-4">
                        <table class="min-w-full divide-y divide-gray-200 border border-gray-300 rounded-lg">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NO.</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ALAMAT</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">LATITUDE</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">LONGITUDE</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if($perizinan->location)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $perizinan->location->detail_address ?? 'Tidak Ada Data' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $perizinan->location->latitude ?? '' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $perizinan->location->longitude ?? '' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <button class="text-blue-600 hover:text-blue-800 border border-blue-600 hover:border-blue-800 px-2 py-1 rounded">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Tidak Ada Data</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan lokasi (bila ada)</label>
                        <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" rows="3" placeholder="Masukkan keterangan" readonly></textarea>
                    </div>
                </div>
            </div>

            <!-- Badan Usaha / Individual -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                <div class="mb-6">
                    @if($perizinan->bussinessEntity)
                        <!-- BADAN USAHA -->
                        <h3 class="text-lg font-semibold text-blue-900 mb-1">BADAN USAHA</h3>
                        <p class="text-sm text-gray-600 mb-5">Informasi perusahaan/badan usaha.</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan</label>
                                <span class="text-xs text-red-600 block mb-2">Nama Perusahaan Wajib Diisi *</span>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->bussinessEntity->name_bussiness ?? '' }}" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">No. Registrasi</label>
                                <span class="text-xs text-red-600 block mb-2">No. Registrasi Wajib Diisi *</span>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->bussinessEntity->registration_number ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">No. NPWP Perusahaan</label>
                                <span class="text-xs text-red-600 block mb-2">NPWP Perusahaan Wajib Diisi *</span>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->bussinessEntity->npwp_number ?? '' }}" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Perusahaan</label>
                                <span class="text-xs text-red-600 block mb-2">Jenis Perusahaan Wajib Diisi *</span>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->bussinessEntity->company_type ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Bidang Usaha</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->bussinessEntity->bussiness_type ?? '' }}" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Pegawai</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->bussinessEntity->total_employee ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nilai Investasi</label>
                                <div class="flex">
                                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">Rp</span>
                                    <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md bg-gray-50" value="{{ number_format($perizinan->bussinessEntity->investment_value ?? 0, 0, ',', '.') }}" readonly>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                                <div class="flex">
                                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">+62</span>
                                    <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md bg-gray-50" value="{{ $perizinan->bussinessEntity->telephone_hp ?? '' }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                                <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->bussinessEntity->email ?? '' }}" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->bussinessEntity->province->name ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kota/Kabupaten</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->bussinessEntity->city->name ?? '' }}" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->bussinessEntity->subdistric->name ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Desa/Kelurahan</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->bussinessEntity->village ?? '' }}" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kode Pos</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->bussinessEntity->postal_code ?? '' }}" readonly>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap *</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" rows="3" readonly>{{ $perizinan->bussinessEntity->detail_address ?? '' }}</textarea>
                        </div>

                    @elseif($perizinan->individual)
                        <!-- INDIVIDUAL -->
                        <h3 class="text-lg font-semibold text-blue-900 mb-1">PERORANGAN</h3>
                        <p class="text-sm text-gray-600 mb-5">Informasi pemohon perorangan.</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <span class="text-xs text-red-600 block mb-2">Nama Lengkap Wajib Diisi *</span>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->individual->name ?? '' }}" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">No. Identitas (NIK/KTP)</label>
                                <span class="text-xs text-red-600 block mb-2">No. Identitas Wajib Diisi *</span>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->individual->number_identity ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">No. NPWP</label>
                                <span class="text-xs text-red-600 block mb-2">NPWP Wajib Diisi *</span>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->individual->npwp_number ?? '' }}" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
                                <span class="text-xs text-red-600 block mb-2">Pekerjaan Wajib Diisi *</span>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->individual->job ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                                <div class="flex">
                                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md">+62</span>
                                    <input type="text" class="flex-1 px-3 py-2 border border-gray-300 rounded-r-md bg-gray-50" value="{{ $perizinan->individual->telephone_hp ?? '' }}" readonly>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                                <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->individual->email ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->individual->province->name ?? '' }}" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kota/Kabupaten</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->individual->city->name ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kecamatan</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->individual->subdistric->name ?? '' }}" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Desa/Kelurahan</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->individual->village ?? '' }}" readonly>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kode Pos</label>
                                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" value="{{ $perizinan->individual->postal_code ?? '' }}" readonly>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap *</label>
                            <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50" rows="3" readonly>{{ $perizinan->individual->detail_address ?? '' }}</textarea>
                        </div>

                    @else
                        <!-- TIDAK ADA DATA -->
                        <h3 class="text-lg font-semibold text-blue-900 mb-1">BADAN USAHA / PERORANGAN</h3>
                        <p class="text-sm text-gray-600 mb-5">Data tidak tersedia.</p>
                        <div class="text-center py-8">
                            <p class="text-gray-500">Tidak ada data badan usaha atau perorangan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Leaflet CSS dan JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let defaultLat = -7.2575;
            let defaultLng = 112.7521;
            let zoom = 13;

            @if($perizinan->location && $perizinan->location->latitude && $perizinan->location->longitude)
                let latitude = {{ $perizinan->location->latitude }};
                let longitude = {{ $perizinan->location->longitude }};
                let address = "{{ $perizinan->location->detail_address ?? 'Lokasi Perizinan' }}";
            @else
                let latitude = defaultLat;
                let longitude = defaultLng;
                let address = "Lokasi tidak tersedia";
                zoom = 10;
            @endif

            let map = L.map('map').setView([latitude, longitude], zoom);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            @if($perizinan->location && $perizinan->location->latitude && $perizinan->location->longitude)
                L.marker([latitude, longitude])
                    .addTo(map)
                    .bindPopup('<b>Lokasi Perizinan</b><br>' + address)
                    .openPopup();
            @endif

            map.on('click', function(e) {
            });
        });
    </script>
@endsection
