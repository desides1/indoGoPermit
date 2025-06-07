<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan & Dokumen Cetak</title>
    <link rel="stylesheet" href="{{ asset('css/admin/laporancetakadmin.css') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/LOGO INDOGOPERMIT.png') }}" alt="Logo IndoGoPermit">
        </div>
        <ul>
            <li><a href="{{ route('berandaadmin.index') }}">🏠 Beranda</a></li>
            <li><a href="{{ route('dataperizinanadmin.index') }}">📂 Data Perizinan</a></li>
            <li class="active">📄 Laporan & Dokumen Cetak</li>
            <li>⚙️ Setting</li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Laporan & Dokumen Cetak</h1>
            <div class="icons">
                <i class="fas fa-bell"></i>
                <i class="fas fa-user"></i>
                <i class="fas fa-pen"></i>
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
                <div class="status-filter">
                    <label for="filterStatus">Status:</label>
                    <select id="filterStatus">
                        <option value="">Semua</option>
                        <option value="Disetujui">Disetujui</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="Selesai">Selesai</option>
                    </select>
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
                        @foreach ($data as $index => $izin)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $izin->nama_pemohon }}</td>
                            <td>{{ $izin->jenis_izin }}</td>
                            <td>{{ $izin->status }}</td>
                            <td>{{ \Carbon\Carbon::parse($izin->tanggal_pengajuan)->format('d/m/Y') }}</td>
                            <td>
                                @if ($izin->status === 'selesai')
                                    {{ $izin->tanggal_selesai ? \Carbon\Carbon::parse($izin->tanggal_selesai)->format('d/m/Y') : now()->format('d/m/Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="aksi-col">
                                <button class="btn-action printRow">🖨️ Cetak</button>
                                <button class="btn-action pdfRow">📥 PDF</button>
                                <button class="btn-action viewRow">👁️ Lihat</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="export-section">
                <button class="export-btn" id="printAll"><i class="fas fa-print"></i> Cetak Semua</button>
                <button class="export-btn" id="downloadPDFAll"><i class="fas fa-file-pdf"></i> Download PDF</button>
            </div>

            <div class="pagination">
                <span>Rows per page:</span>
                <select>
                    <option>8</option>
                    <option>16</option>
                    <option>32</option>
                </select>
                <span>1-8 of {{ count($data) }}</span>
                <span class="prev">⬅️</span>
                <span class="next">➡️</span>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById('searchInput');
            const filterStatus = document.getElementById('filterStatus');
            const resetBtn = document.getElementById('resetBtn');
            const tableBody = document.getElementById('laporanTable');

            function filterRows() {
                const searchText = searchInput.value.toLowerCase().trim();
                const statusFilter = filterStatus.value.toLowerCase().trim();
                const rows = tableBody.querySelectorAll('tr');

                rows.forEach(row => {
                    const nama = row.children[1].textContent.toLowerCase();
                    const jenis = row.children[2].textContent.toLowerCase();
                    const status = row.children[3].textContent.toLowerCase();

                    const matchSearch = !searchText || nama.includes(searchText) || jenis.includes(searchText);
                    const matchStatus = !statusFilter || status.includes(statusFilter);

                    row.style.display = (matchSearch && matchStatus) ? '' : 'none';
                });
            }

            searchInput.addEventListener('keyup', filterRows);
            filterStatus.addEventListener('change', filterRows);

            resetBtn.addEventListener('click', () => {
                searchInput.value = '';
                filterStatus.value = '';
                filterRows();
            });

            // Cetak semua
            document.getElementById('printAll').addEventListener('click', () => {
                const printArea = document.querySelector('.table-container').cloneNode(true);
                printArea.querySelectorAll('tr').forEach(row => {
                    if (row.cells.length > 6) row.deleteCell(6); // remove aksi
                });

                const win = window.open('', '_blank');
                win.document.write('<html><head><title>Cetak</title></head><body>');
                win.document.write('<h2>Laporan Perizinan</h2>');
                win.document.write(printArea.innerHTML);
                win.document.write('</body></html>');
                win.print();
                win.close();
            });

            // Download PDF semua
            document.getElementById('downloadPDFAll').addEventListener('click', () => {
                const element = document.querySelector('.table-container').cloneNode(true);
                element.querySelectorAll('tr').forEach(row => {
                    if (row.cells.length > 6) row.deleteCell(6);
                });
                html2pdf().from(element).save("laporan-semua.pdf");
            });

            // Cetak per baris
            document.querySelectorAll('.printRow').forEach(btn => {
                btn.addEventListener('click', () => {
                    const row = btn.closest('tr').cloneNode(true);
                    row.deleteCell(6);
                    const win = window.open('', '_blank');
                    win.document.write('<html><head><title>Cetak Baris</title></head><body>');
                    win.document.write('<table border="1"><thead><tr><th>NO</th><th>NAMA PEMOHON</th><th>JENIS IZIN</th><th>STATUS</th><th>TGL PENGAJUAN</th><th>TGL SELESAI</th></tr></thead>');
                    win.document.write('<tbody>' + row.outerHTML + '</tbody></table>');
                    win.document.write('</body></html>');
                    win.print();
                    win.close();
                });
            });

            // Download PDF per baris
            document.querySelectorAll('.pdfRow').forEach(btn => {
                btn.addEventListener('click', () => {
                    const row = btn.closest('tr').cloneNode(true);
                    row.deleteCell(6);
                    const table = document.createElement('table');
                    table.border = 1;
                    table.appendChild(row);
                    html2pdf().from(table).save("laporan-baris.pdf");
                });
            });
        });
    </script>
</body>
</html>
