<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perizinan</title>
    <link rel="stylesheet" href="{{ asset('css/admin/detailprocessadmin.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .tab-content {
            display: none; /* Sembunyikan semua tab */
        }
        .active-tab {
            display: block; /* Tampilkan tab aktif */
        }
        .document-list ul {
            list-style-type: none;
            padding: 0;
        }
        .document-list li {
            padding: 10px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
        }
        .view-icon {
            color: #3490dc;
            margin-left: 10px;
        }
        .text-danger {
            color: #e3342f;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{asset('images/LOGO INDOGOPERMIT.png')}}" alt="Logo IndoGoPermit">
            <h2></h2>
        </div>
        <ul>
            <li>🏠 Beranda</li>
            <li class="active">📂 Data Perizinan</li>
            <li>📄 Laporan & Dokumen cetak</li>
            <li>⚙️ Setting</li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Data Perizinan</h1>
            <div class="icons">
                🔔 👤
                <i class="fas fa-bell"></i>
                <i class="fas fa-user"></i>
                <i class="fas fa-pen"></i> <!-- Icon edit -->
            </div>
        </div>
        <div class="content">
            <h2>Preview Perizinan</h2>
            <div class="profile">
                <img src="user.jpg" alt="Charlie Kristen">
                <div class="profile-info">
                    <h3>{{ $perizinan->user->username ?? 'Nama Pemohon' }}</h3>
                    <p>{{ ucfirst($perizinan->request->request_type ?? 'Baru') }}</p>
                </div>
                <button class="btn-download">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 16L6 10H9V4H15V10H18L12 16Z" fill="white"/>
                        <path d="M5 18H19V20H5V18Z" fill="white"/>
                    </svg>
                    Download
                </button>
            </div>

            <!-- Tab Navigation -->
            <div class="tab-filter">
                <button class="tab-button active" onclick="showTab(0)">Data Pemohon</button>
                <button class="tab-button" onclick="showTab(1)">Data Lokasi</button>
                <button class="tab-button" onclick="showTab(2)">Tipe Pemohon</button>
                <button class="tab-button" onclick="showTab(3)">Dokumen</button>
                <button class="tab-button" onclick="showTab(4)">Proyek</button>
            </div>

           <!-- Data Pemohon -->
            <div class="tab-content active-tab">
                <form class="form-section">
                    <label>Jenis Permohonan *</label>
                    <input type="text" value="{{ $perizinan->permission_type->name ?? '-' }}" readonly>

                    <label>Jenis Izin *</label>
                    <input type="text" value="{{ $perizinan->request->request_type ?? '-'}}" readonly>

                    <label>Tipe Izin *</label>
                    <input type="text" value="{{ $perizinan->permit_type->name ?? '-' }}" readonly>

                    <label>Nomor Permohonan</label>
                    <input type="text" value="{{ $perizinan->request_number->number ?? '-' }}" readonly>
                </form>
            </div>

            <!-- Data Lokasi -->
<div class="tab-content" id="lokasi">
    @if($perizinan->location)
        @if($perizinan->location->maps)
            <img src="{{ $perizinan->location->maps }}" alt="Peta Lokasi" class="map-image">
        @else
            <div class="map-placeholder">Peta tidak tersedia</div>
        @endif
        <table class="data-table">
            <tr>
                <th>NO.</th>
                <th>ALAMAT</th>
                <th>LATITUDE</th>
                <th>LONGITUDE</th>
                <th>AKSI</th>
            </tr>
            <tr>
                <td>{{ $perizinan->location->id_location ?? '-' }}</td>
                <td>{{ $perizinan->location->detail_address ?? '-' }}</td>
                <td>{{ number_format($perizinan->location->latitude, 7) ?? '-' }}</td>
                <td>{{ number_format($perizinan->location->longitude, 7) ?? '-' }}</td>
                <td><button>Edit</button></td>
            </tr>
        </table>
    @else
        <p>Data lokasi tidak tersedia</p>
    @endif
</div>

            <!-- Data Tipe Pemohon -->
            <div class="tab-content" id="tipe-pemohon">
                @if($perizinan->individual)
                    <div class="section-container">
                        <h2 class="section-title">Perorangan</h2>
                        <div class="data-grid">
                            <span>Jenis Identitas: {{ $perizinan->individual->identity_type }}</span>
                            <span>Nomor Identitas: {{ $perizinan->individual->number_identity }}</span>
                            <span>Nama: {{ $perizinan->individual->name }}</span>
                            <span>Jenis Kelamin: {{ $perizinan->individual->gender }}</span>
                            <span>Tempat Lahir: {{ $perizinan->individual->birthplace }}</span>
                            <span>Tanggal Lahir: {{ $perizinan->individual->date_of_birth }}</span>
                            <span>Telepon: {{ $perizinan->individual->telephone_hp }}</span>
                            <span>Email: {{ $perizinan->individual->email }}</span>
                            <span>Pekerjaan: {{ $perizinan->individual->job }}</span>
                            <span>NPWP: {{ $perizinan->individual->npwp_number }}</span>
                            <span>Provinsi: {{ $perizinan->individual->province->name ?? '-' }}</span>
                            <span>Kota: {{ $perizinan->individual->city->name ?? '-' }}</span>
                            <span>Kecamatan: {{ $perizinan->individual->subdistrict }}</span>
                            <span>Desa: {{ $perizinan->individual->village }}</span>
                            <span>Kode Pos: {{ $perizinan->individual->postal_code }}</span>
                            <span>Alamat Lengkap: {{ $perizinan->individual->detail_address }}</span>
                        </div>
                    </div>
                @endif

                @if($perizinan->bussiness_entity)
                    <div class="section-container">
                        <h2 class="section-title">Badan Usaha</h2>
                        <div class="data-grid">
                            <span>Nama Bisnis: {{ $perizinan->bussiness_entity->name_bussiness }}</span>
                            <span>Nomor Registrasi: {{ $perizinan->bussiness_entity->registration_number }}</span>
                            <span>NPWP: {{ $perizinan->bussiness_entity->npwp_number }}</span>
                            <span>Jenis Bisnis: {{ $perizinan->bussiness_entity->bussiness_type }}</span>
                            <span>Tipe Perusahaan: {{ $perizinan->bussiness_entity->company_type }}</span>
                            <span>Jumlah Karyawan: {{ $perizinan->bussiness_entity->total_employee }}</span>
                            <span>Nilai Investasi: {{ $perizinan->bussiness_entity->investment_value }}</span>
                            <span>Telepon: {{ $perizinan->bussiness_entity->telephone_hp }}</span>
                            <span>Email: {{ $perizinan->bussiness_entity->email }}</span>
                            <span>Fax: {{ $perizinan->bussiness_entity->fax }}</span>
                            <span>Provinsi: {{ $perizinan->bussiness_entity->province->name ?? '-' }}</span>
                            <span>Kota: {{ $perizinan->bussiness_entity->city->name ?? '-' }}</span>
                            <span>Kecamatan: {{ $perizinan->bussiness_entity->subdistrict->name ?? '-' }}</span>
                            <span>Desa: {{ $perizinan->bussiness_entity->village }}</span>
                            <span>Kode Pos: {{ $perizinan->bussiness_entity->postal_code }}</span>
                            <span>Alamat Lengkap: {{ $perizinan->bussiness_entity->detail_address }}</span>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Data Dokumen -->
            <div class="tab-content" id="dokumen">
                <div class="document-list">
                    <ul>
                        @if($perizinan->documentRequirements && count($perizinan->documentRequirements) > 0)
                            @foreach($perizinan->documentRequirements as $doc)
                                <li>
                                    {{ $doc->requirement->name ?? 'Dokumen' }}
                                    @if($doc->file_path)
                                        <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank">
                                            <i class="fas fa-eye view-icon"></i>
                                        </a>
                                    @else
                                        <span class="text-danger">Belum diunggah</span>
                                    @endif
                                </li>
                            @endforeach
                        @else
                            <li>Tidak ada dokumen yang tersedia</li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- Data Proyek -->
            <div class="tab-content" id="proyek">
                @if($perizinan->project)
                    <div class="project-details">
                        <div class="row">
                            <span>Jenis Proyek: {{ $perizinan->project->project_type }}</span>
                            <span>Target PAD: {{ $perizinan->project->target_pad }}</span>
                        </div>
                        <div class="row">
                            <span>Nilai Investasi: {{ $perizinan->project->investment_value }}</span>
                            <span>Jumlah Tenaga Kerja: {{ $perizinan->project->total_employee }}</span>
                        </div>
                    </div>
                @else
                    <p>Data proyek tidak tersedia</p>
                @endif

                <!-- Status Buttons -->
                <div class="status-buttons">
                    <button id="btn-accepted" class="status-btn status-accepted">Accepted</button>
                    <button class="status-btn status-process">Process</button>
                    <button id="btn-rejected" class="status-btn status-rejected">Rejected</button>
                     <button class="status-btn status-rejected">Revisi</button>
                    <button class="status-btn status-process">Done</button>
                </div>
            </div>


            <!-- Buttons -->
            <div class="buttons" id="buttonsContainer">
                <button id="backBtn" class="back-btn">← Back</button>
                <button id="nextBtn" class="next-btn" onclick="changeTab(1)">Next →</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            let currentTab = 0;
            const tabs = document.querySelectorAll(".tab-content");
            const tabButtons = document.querySelectorAll(".tab-button");
            const backBtn = document.getElementById("backBtn");
            const nextBtn = document.getElementById("nextBtn");

            function showTab(index) {
                if (index >= 0 && index < tabs.length) {
                    tabs.forEach((tab, i) => {
                        tab.classList.remove("active-tab");
                        tabButtons[i]?.classList.remove("active");
                    });

                    tabs[index].classList.add("active-tab");
                    tabButtons[index]?.classList.add("active");
                    currentTab = index;

                    nextBtn.style.display = currentTab === tabs.length - 1 ? "none" : "inline-block";
                }
            }

            function changeTab(step) {
                const newIndex = currentTab + step;
                if (newIndex >= 0 && newIndex < tabs.length) {
                    showTab(newIndex);
                }
            }

            backBtn.addEventListener("click", function () {
                if (currentTab > 0) {
                    changeTab(-1);
                } else {
                    window.location.href = "{{ route('dataperizinanadmin.index') }}";
                }
            });

            nextBtn.addEventListener("click", function () {
                changeTab(1);
            });

            if (window.location.hash === "#proyek") {
                showTab(4);
                const proyekSection = document.getElementById("proyek-section");
                if (proyekSection) {
                    proyekSection.scrollIntoView({ behavior: 'smooth' });
                }
            } else {
                showTab(currentTab);
            }
        });
    </script>
</body>
</html>
