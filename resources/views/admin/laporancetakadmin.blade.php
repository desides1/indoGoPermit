<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan & Dokumen Cetak</title>
    <link rel="stylesheet" href="{{ asset('css/admin/laporancetakadmin.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{asset('images/LOGO INDOGOPERMIT.png')}}" alt="Logo IndoGoPermit">
            <h2></h2>
        </div>
        <ul>
            <li>
                <a href="{{ route('berandaadmin.index') }}"> 🏠 Beranda </a>
            </li>
            <li>
                <a href="{{ route('dataperizinanadmin.index') }}">📂 Data Perizinan</a>
            </li>
            <li class="active">📄 Laporan & Dokumen cetak</li>
            <li>⚙️ Setting</li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Laporan & Dokumen Cetak</h1>
            <div class="icons">
                🔔 👤
                <i class="fas fa-bell"></i>
                <i class="fas fa-user"></i>
                <i class="fas fa-pen"></i> <!-- Icon edit -->
            </div>
        </div>

        <div class="container">
            <div class="section-header">
                <h2>Laporan Perizinan</h2>
                <a href="#" class="view-all">View All</a>
            </div>

            <div class="search-filter">
                <div class="search-box">
                    🔍
                    <input type="text" id="searchInput" placeholder="Ketikkan...">
                </div>
                <button class="filter-btn" id="resetBtn">🔄 Reset</button>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA PEMOHON</th>
                            <th>JENIS IZIN</th>
                            <th>STATUS</th>
                            <th>TANGGAL PENGAJUAN</th>
                            <th>TANGGAL SELESAI</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="laporanTable">
                        <tr>
                            <td>1</td>
                            <td>LIVIA DEWI</td>
                            <td>Baru</td>
                            <td>Disetujui</td>
                            <td>10/03/2025</td>
                            <td>17/03/2025</td>
                            <td>
                                <button class="btn-action">👁️ Lihat</button>
                                <button class="btn-action">📥 Download PDF</button>
                                <button class="btn-action">🖨️ Cetak</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>MARYANA ROSALINA</td>
                            <td>Perpanjangan</td>
                            <td>Ditolak</td>
                            <td>22/02/2025</td>
                            <td>28/02/2025</td>
                            <td>
                                <button class="btn-action">👁️ Lihat</button>
                                <button class="btn-action">📥 Download PDF</button>
                                <button class="btn-action">🖨️ Cetak</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>VANIA</td>
                            <td>Perubahan</td>
                            <td>Selesai</td>
                            <td>13/03/2025</td>
                            <td>20/03/2025</td>
                            <td>
                                <button class="btn-action">👁️ Lihat</button>
                                <button class="btn-action">📥 Download PDF</button>
                                <button class="btn-action">🖨️ Cetak</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="export-section">
                <button class="export-btn"><i class="fas fa-print"></i> Cetak Semua</button>
                <button class="export-btn"><i class="fas fa-file-pdf"></i> Download PDF</button>
                <button class="export-btn"><i class="fas fa-file-excel"></i> Download Excel</button>
            </div>

            <div class="pagination">
                <span class="pagination-text">Rows per page:</span>
                <select>
                    <option>8</option>
                    <option>16</option>
                    <option>32</option>
                </select>
                <span class="pagination-text">1-8 of 1240</span>
                <span class="prev">⬅️</span> <!-- Ikon panah kiri -->
                <span class="next">➡️</span> <!-- Ikon panah kanan -->
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const searchInput = document.getElementById('searchInput');
                const resetBtn = document.getElementById('resetBtn');
                const tableBody = document.getElementById('laporanTable');

                // Pencarian
                if (searchInput && tableBody) {
                    searchInput.addEventListener('keyup', function () {
                        const searchText = this.value.toLowerCase().trim();
                        const rows = tableBody.querySelectorAll('tr');

                        rows.forEach(row => {
                            const nama = row.children[1].textContent.toLowerCase();
                            const jenis = row.children[2].textContent.toLowerCase();
                            const status = row.children[3].textContent.toLowerCase();

                            if (
                                searchText === "" ||
                                nama.includes(searchText) ||
                                jenis.includes(searchText) ||
                                status.includes(searchText)
                            ) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                        });
                    });
                }

                // Reset tombol
                if (resetBtn && tableBody) {
                    resetBtn.addEventListener('click', function () {
                        searchInput.value = '';
                        const rows = tableBody.querySelectorAll('tr');
                        rows.forEach(row => row.style.display = '');
                    });
                }
            });
        </script>
    </body>
    </html>
