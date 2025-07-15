<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perizinan</title>
    <link rel="stylesheet" href="{{ asset('css/admin/detailvalidasiadmin.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .tab-content {
            display: none;
        }
        .active-tab {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{asset('images/LOGO INDOGOPERMIT.png')}}" alt="Logo IndoGoPermit">
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
                <i class="fas fa-pen"></i>
            </div>
        </div>

        <div class="content">
            <h2>Preview Perizinan</h2>
            <div class="profile">
                <img src="user.jpg" alt="Charlie Kristen">
                <div class="profile-info">
                    <h3>Charlie Kristen</h3>
                    <p>New</p>
                </div>
                <button class="btn-download">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
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

            <!-- TAB CONTENTS -->
            <div class="tab-content active-tab">
                <form class="form-section">
                    <label>Jenis Permohonan *</label>
                    <input type="text" placeholder="Masukkan jenis permohonan">
                    <label>Instansi *</label>
                    <input type="text" placeholder="Masukkan instansi">
                    <label>Unit *</label>
                    <input type="text" placeholder="Masukkan unit">
                    <label>Jenis Izin *</label>
                    <input type="text" placeholder="Masukkan jenis izin">
                    <label>Nomor Permohonan</label>
                    <input type="text" placeholder="Masukkan nomor permohonan">
                </form>
            </div>

            <div class="tab-content">
                <img src="peta.png" alt="Peta Lokasi" class="map-image">
                <table class="data-table">
                    <tr>
                        <th>NO.</th>
                        <th>ALAMAT</th>
                        <th>LATITUDE</th>
                        <th>LONGITUDE</th>
                        <th>AKSI</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Jl. Sudirman, Jakarta</td>
                        <td>-6.2146</td>
                        <td>106.8451</td>
                        <td><button>Edit</button></td>
                    </tr>
                </table>
            </div>

            <div class="tab-content">
                <div class="section-container">
                    <h2 class="section-title">Badan Usaha</h2>
                    <div class="data-grid">
                        <span>Nama Perusahaan</span> <span>No. Registrasi</span>
                        <span>No. NPWP Perusahaan</span> <span>Jenis Perusahaan</span>
                        <span>Bidang Usaha</span> <span>Jenis Usaha</span>
                        <span>Jumlah Pegawai</span> <span>Nilai Investasi</span>
                        <span>No. Telepon</span> <span>Fax</span>
                        <span>Alamat Email</span> <span>Provinsi</span>
                        <span>Kota/Kabupaten</span> <span>Kecamatan</span>
                        <span>Desa/Kelurahan</span> <span>Kode Pos</span>
                        <span>Alamat Lengkap *</span> <span></span>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                <div class="document-list">
                    <ul>
                        <li>Fotocopy KTP <span class="required">*</span> <i class="fas fa-eye view-icon"></i></li>
                        <li>Fotocopy KTP pemilik sertifikat <i class="fas fa-eye view-icon"></i></li>
                        <li>Fotocopy IMB lama / KRK lama <i class="fas fa-eye view-icon"></i></li>
                        <li>Fotocopy PBB tahun terakhir <span class="required">*</span> <i class="fas fa-eye view-icon"></i></li>
                        <li>PTP dari BPN <span class="required">*</span> <i class="fas fa-eye view-icon"></i></li>
                    </ul>
                </div>
            </div>

            <div class="tab-content">
                <div class="project-details">
                    <div class="row">
                        <span>Jenis Proyek</span>
                        <span>Target PAD</span>
                    </div>
                    <div class="row">
                        <span>Nilai Investasi</span>
                        <span>Jumlah Tenaga Kerja</span>
                    </div>
                    <div class="row" style="flex-direction: column; align-items: flex-start; gap: 8px; margin-top: 16px;">
                        <label for="catatan">Catatan</label>
                        <textarea id="catatan" placeholder="Tambahkan catatan di sini..." rows="4" style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #ccc; font-size: 14px;"></textarea>
                    </div>
                </div>
                <div class="status-buttons">
                    <button id="btn-accepted" class="status-btn status-accepted">Accepted</button>
                    <button id="btn-rejected" class="status-btn status-rejected">Rejected</button>
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

            // === STATUS BUTTON FUNCTIONALITY ===
            const statusDisplay = document.getElementById("current-status");
            const statusButtons = {
                process: document.getElementById("btn-process"),
                accepted: document.getElementById("btn-accepted"),
                rejected: document.getElementById("btn-rejected")
            };

            function updateStatus(newStatus, color) {
                if (!statusDisplay) return;

                // UI update
                statusDisplay.textContent = newStatus;
                statusDisplay.style.color = color;

                Object.values(statusButtons).forEach(btn => {
                    if (btn) {
                        btn.style.backgroundColor = "";
                        btn.style.color = "";
                    }
                });

                const selectedBtn = statusButtons[newStatus.toLowerCase()];
                if (selectedBtn) {
                    selectedBtn.style.backgroundColor = color;
                    selectedBtn.style.color = "#fff";
                }

                // === Kirim ke backend untuk menyimpan perubahan ===
                const izinId = document.getElementById("izin-id").value; // pastikan ada input hidden <input id="izin-id" value="123" hidden>
                fetch(`/admin/perizinan/update-status/${izinId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log("Status updated:", data);
                    } else {
                        alert("Gagal mengupdate status");
                    }
                })
                .catch(error => {
                    console.error("Error updating status:", error);
                });
            }

            if (statusButtons.process) {
                statusButtons.process.addEventListener("click", () => {
                    updateStatus("Process", "#f0ad4e");
                });
            }

            if (statusButtons.accepted) {
                statusButtons.accepted.addEventListener("click", () => {
                    updateStatus("Accepted", "#5cb85c");
                });
            }

            if (statusButtons.rejected) {
                statusButtons.rejected.addEventListener("click", () => {
                    updateStatus("Rejected", "#d9534f");
                });
            }
        });
        </script>
    </body>
    </html>
