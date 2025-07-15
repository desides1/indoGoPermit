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
                <h2>Laporan Perizinan Selesai</h2>
                <a href="#" class="view-all">View All</a>
            </div>

            <div class="search-filter">
                <div class="search-box">
                    🔍
                    <input type="text" id="searchInput" placeholder="Ketikkan...">
                </div>
                <div class="date-filter">
                    <form action="{{ route('laporancetakadmin.index') }}" method="GET">
                        <label for="tanggal_mulai">Dari:</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ request('tanggal_mulai') }}">

                        <label for="tanggal_selesai">Sampai:</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ request('tanggal_selesai') }}">

                        <button type="submit" class="filter-btn">Filter</button>
                        <button type="button" class="filter-btn" id="resetBtn">🔄 Reset</button>
                    </form>
                </div>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAMA PEMOHON</th>
                            <th>JENIS IZIN</th>
                            <th>TANGGAL PENGAJUAN</th>
                            <th>TANGGAL SELESAI</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="laporanTable">
                        @foreach ($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->user->username ?? '-' }}</td>
                            <td>{{ $item->permissionType->name ?? '-' }}</td>
                            <td>{{ $item->tanggal_pengajuan ? \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d/m/Y') : '-' }}</td>
                            <td>{{ $item->tanggal_selesai ? \Carbon\Carbon::parse($item->tanggal_selesai)->format('d/m/Y') : '-' }}</td>
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
            const resetBtn = document.getElementById('resetBtn');
            const tableBody = document.getElementById('laporanTable');

            function filterRows() {
                const searchText = searchInput.value.toLowerCase().trim();
                const rows = tableBody.querySelectorAll('tr');

                rows.forEach(row => {
                    const nama = row.children[1].textContent.toLowerCase();
                    const jenis = row.children[2].textContent.toLowerCase();

                    const matchSearch = !searchText || nama.includes(searchText) || jenis.includes(searchText);

                    row.style.display = matchSearch ? '' : 'none';
                });
            }

            searchInput.addEventListener('keyup', filterRows);

            resetBtn.addEventListener('click', () => {
                searchInput.value = '';
                filterRows();
                window.location.href = "{{ route('laporancetakadmin.index') }}";
            });

            // Cetak semua
            document.getElementById('printAll').addEventListener('click', () => {
                const printArea = document.querySelector('.table-container').cloneNode(true);
                printArea.querySelectorAll('tr').forEach(row => {
                    if (row.cells.length > 5) row.deleteCell(5); // remove aksi
                });

                const win = window.open('', '_blank');
                win.document.write('<html><head><title>Cetak</title></head><body>');
                win.document.write('<h2>Laporan Perizinan Selesai</h2>');
                win.document.write(printArea.innerHTML);
                win.document.write('</body></html>');
                win.print();
                win.close();
            });

            // Download PDF semua
            document.getElementById('downloadPDFAll').addEventListener('click', () => {
                const element = document.querySelector('.table-container').cloneNode(true);
                element.querySelectorAll('tr').forEach(row => {
                    if (row.cells.length > 5) row.deleteCell(5);
                });
                html2pdf().from(element).save("laporan-semua.pdf");
            });

            // Cetak per baris
            document.querySelectorAll('.printRow').forEach(btn => {
                btn.addEventListener('click', () => {
                    const row = btn.closest('tr').cloneNode(true);
                    row.deleteCell(5);
                    const win = window.open('', '_blank');
                    win.document.write('<html><head><title>Cetak Baris</title></head><body>');
                    win.document.write('<table border="1"><thead><tr><th>NO</th><th>NAMA PEMOHON</th><th>JENIS IZIN</th><th>TGL PENGAJUAN</th><th>TGL SELESAI</th></tr></thead>');
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
                    row.deleteCell(5);
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
