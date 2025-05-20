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
                        <tr>
                            <td>1</td>
                            <td>LIVIA DEWI</td>
                            <td>Baru</td>
                            <td>Disetujui</td>
                            <td>10/03/2025</td>
                            <td>17/03/2025</td>
                            <td class="aksi-col">
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
                            <td class="aksi-col">
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
                            <td class="aksi-col">
                                <button class="btn-action">👁️ Lihat</button>
                                <button class="btn-action">📥 Download PDF</button>
                                <button class="btn-action">🖨️ Cetak</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="export-section">
                <button class="export-btn" id="printAll"><i class="fas fa-print"></i> Cetak Semua</button>
                <button class="export-btn" id="downloadPDFAll"><i class="fas fa-file-pdf"></i> Download PDF</button>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

        <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.getElementById('searchInput');
            const resetBtn = document.getElementById('resetBtn');
            const tableBody = document.getElementById('laporanTable');
            const filterStatus = document.getElementById('filterStatus');

            function filterRows() {
                const searchText = searchInput.value.toLowerCase().trim();
                const selectedStatus = filterStatus.value.toLowerCase().trim();
                const rows = tableBody.querySelectorAll('tr');

                rows.forEach(row => {
                    const nama = row.children[1].textContent.toLowerCase();
                    const jenis = row.children[2].textContent.toLowerCase();
                    const status = row.children[3].textContent.toLowerCase();

                    const matchesSearch =
                        searchText === "" ||
                        nama.includes(searchText) ||
                        jenis.includes(searchText) ||
                        status.includes(searchText);

                    const matchesStatus =
                        selectedStatus === "" ||
                        status.includes(selectedStatus);

                    row.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
                });
            }

            if (searchInput && tableBody) {
                searchInput.addEventListener('keyup', filterRows);
            }

            if (filterStatus && tableBody) {
                filterStatus.addEventListener('change', filterRows);
            }

            resetBtn.addEventListener('click', function () {
                searchInput.value = '';
                filterStatus.value = '';
                const rows = tableBody.querySelectorAll('tr');
                rows.forEach(row => row.style.display = '');
            });

            // Cetak Semua
            document.getElementById('printAll').addEventListener('click', function () {
                const tableContent = document.querySelector('.table-container').cloneNode(true);
                tableContent.querySelectorAll('tr').forEach(row => {
                    if (row.cells.length > 0) {
                        row.deleteCell(row.cells.length - 1); // Hapus kolom aksi
                    }
                });

                const printWindow = window.open('', '_blank');
                printWindow.document.write('<html><head><title>Cetak Laporan</title></head><body>');
                printWindow.document.write('<h2>Laporan Perizinan</h2>');
                printWindow.document.write(tableContent.outerHTML);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            });

            // Download PDF Semua
            document.getElementById('downloadPDFAll').addEventListener('click', function () {
                const element = document.querySelector('.table-container').cloneNode(true);
                element.querySelectorAll('tr').forEach(row => {
                    if (row.cells.length > 0) {
                        row.deleteCell(row.cells.length - 1); // Hapus kolom aksi
                    }
                });

                html2pdf().from(element).save("laporan-semua.pdf");
            });

            // Download Excel Semua
            document.getElementById('downloadExcelAll').addEventListener('click', function () {
                const table = document.querySelector('.table-container table').cloneNode(true);
                table.querySelectorAll('tr').forEach(row => {
                    if (row.cells.length > 0) {
                        row.deleteCell(row.cells.length - 1); // Hapus kolom aksi
                    }
                });

                let tableHTML = table.outerHTML.replace(/ /g, '%20');
                const filename = 'laporan-semua.xls';
                const dataType = 'application/vnd.ms-excel';

                const downloadLink = document.createElement('a');
                document.body.appendChild(downloadLink);
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
                downloadLink.download = filename;
                downloadLink.click();
                document.body.removeChild(downloadLink);
            });

            // Tombol aksi per baris
            document.querySelectorAll('.btn-action').forEach(btn => {
                // Cetak Per Baris
                if (btn.textContent.includes('🖨️')) {
                    btn.addEventListener('click', function () {
                        const row = this.closest('tr');
                        const clonedRow = row.cloneNode(true);
                        clonedRow.removeChild(clonedRow.lastElementChild); // Hapus kolom aksi

                        const printWindow = window.open('', '_blank');
                        printWindow.document.write('<html><head><title>Cetak Laporan</title></head><body>');
                        printWindow.document.write('<h2>Laporan Perizinan</h2>');
                        printWindow.document.write('<table border="1"><thead><tr>' +
                            '<th>NO</th><th>NAMA PEMOHON</th><th>JENIS IZIN</th>' +
                            '<th>STATUS</th><th>TANGGAL PENGAJUAN</th><th>TANGGAL SELESAI</th></tr></thead><tbody>');
                        printWindow.document.write('<tr>' + clonedRow.innerHTML + '</tr>');
                        printWindow.document.write('</tbody></table></body></html>');
                        printWindow.document.close();
                        printWindow.print();
                    });
                }

                // Download PDF Per Baris
                if (btn.textContent.includes('📥')) {
                    btn.addEventListener('click', function () {
                        const row = this.closest('tr');
                        const clonedRow = row.cloneNode(true);
                        clonedRow.removeChild(clonedRow.lastElementChild); // Hapus kolom aksi

                        const wrapper = document.createElement('div');
                        wrapper.innerHTML = `
                            <h2>Laporan Perizinan</h2>
                            <table border="1">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA PEMOHON</th>
                                        <th>JENIS IZIN</th>
                                        <th>STATUS</th>
                                        <th>TANGGAL PENGAJUAN</th>
                                        <th>TANGGAL SELESAI</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        `;

                        wrapper.querySelector('tbody').appendChild(clonedRow);

                        html2pdf().from(wrapper).set({
                            margin: 1,
                            filename: 'laporan-perizinan.pdf',
                            html2canvas: { scale: 2 },
                            jsPDF: { unit: 'cm', format: 'a4', orientation: 'portrait' }
                        }).save();

                        // Excel
                        const tableHTML = wrapper.querySelector('table').outerHTML.replace(/ /g, '%20');
                        const filename = 'laporan-per-baris.xls';
                        const dataType = 'application/vnd.ms-excel';

                        const downloadLink = document.createElement('a');
                        document.body.appendChild(downloadLink);
                        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
                        downloadLink.download = filename;
                        downloadLink.click();
                        document.body.removeChild(downloadLink);
                    });
                }
            });
        });
        </script>
    </body>
    </html>
