<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perizinan</title>
    <link rel="stylesheet" href="{{ asset('css/admin/dataperizinanadmin.css')}}">
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
            <li class="active">
                <a href="{{ route('dataperizinanadmin.index') }}">📂 Data Perizinan</a>
            </li>
            <li>
                <a href="{{ route('laporancetakadmin.index') }}">📄 Laporan & Dokumen cetak</a>
            </li>
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

        <div class="table-header">
            <h2>Preview Perizinan</h2>
        </div>

        <div class="filter-container">
            <div class="filter-label">Filter By</div>

            <select id="filter-day" onchange="applyFilters()">
                <option value="all">All Days</option>
                @for ($d = 1; $d <= 31; $d++)
                    <option value="{{ str_pad($d, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($d, 2, '0', STR_PAD_LEFT) }}</option>
                @endfor
            </select>

            <select id="filter-month" onchange="applyFilters()">
                <option value="all">All Months</option>
                @for ($m = 1; $m <= 12; $m++)
                    <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}</option>
                @endfor
            </select>

            <select id="filter-year" onchange="applyFilters()">
                <option value="all">All Years</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>

            <select id="filter-status" onchange="applyFilters()">
                <option value="all">All Status</option>
                <option value="waiting">Waiting For Validation</option>
                <option value="accepted">Accepted</option>
                <option value="rejected">Rejected</option>
                <option value="done">Done</option>
                <option value="process">Process</option>
            </select>

            <button class="reset-filter" onclick="resetFilters()">🔄 <span>Reset Filter</span></button>
        </div>

        <div class="tab-filter">
            <button class="tab-btn active" data-status="all" onclick="filterTable('all')">All</button>
            <button class="tab-btn" data-status="waiting" onclick="filterTable('waiting')">Waiting For Validation</button>
            <button class="tab-btn" data-status="process" onclick="filterTable('process')">Process</button>
            <button class="tab-btn" data-status="accepted" onclick="filterTable('accepted')">Accepted</button>
            <button class="tab-btn" data-status="rejected" onclick="filterTable('rejected')">Rejected</button>
            <button class="tab-btn" data-status="done" onclick="filterTable('done')">Done</button>
        </div>

            <table>
                <thead>
                    <tr>
                        <th>CANDIDATE NAME</th>
                        <th>TYPE OF PERMIT</th>
                        <th>STATUS</th>
                        <th>FILING DATE</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="user-cell">
                            <img src="avatar1.png" alt="User">
                            <span>Charlie Kristen</span>
                        </td>
                        <td>New</td>
                        <td class="status waiting">Waiting For Validation</td>
                        <td>12/02/23</td>
                        <td class="action-buttons">
                            <a href="/detailvalidasiadmin" class="detail-btn">Detail</a>
                            <a href="/detailvalidasiadmin#proyek" class="edit-icon">✏️</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="avatar2.png" alt="User"> Malaika Brown</td>
                        <td>Extension</td>
                        <td class="status accepted">Accepted</td>
                        <td>11/02/23</td>
                        <td class="action-buttons">
                            <a href="/detailditerimaadmin" class="detail-btn">Detail</a>
                            <a href="/detailditerimaadmin#proyek" class="edit-icon">✏️</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="avatar3.png" alt="User"> Simon Minter</td>
                        <td>Change</td>
                        <td class="status rejected">Rejected</td>
                        <td>10/01/23</td>
                        <td class="action-buttons">
                            <a href="/detailditolakadmin" class="detail-btn">Detail</a>
                            <a href="/detailditolakadmin#proyek" class="edit-icon">✏️</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="avatar5.png" alt="User"> Nishant Talwar</td>
                        <td>Change</td>
                        <td class="status done">Done</td>
                        <td>08/12/22</td>
                        <td class="action-buttons">
                            <a href="/detaildoneadmin" class="detail-btn">Detail</a>
                            <a href="/detaildoneadmin#proyek" class="edit-icon">✏️</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="avatar6.png" alt="User"> Mark Jacobs</td>
                        <td>New</td>
                        <td class="status process">Process</td>
                        <td>07/02/23</td>
                        <td class="action-buttons">
                            <a href="/detailprocessadmin" class="detail-btn">Detail</a>
                            <a href="/detailprocessadmin#proyek" class="edit-icon">✏️</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="avatar4.png" alt="User"> Ashley Brooke</td>
                        <td>Retraction</td>
                        <td class="status rejected">Rejected</td>
                        <td>09/03/23</td>
                        <td class="action-buttons">
                            <a href="/detailditolakadmin" class="detail-btn">Detail</a>
                            <a href="/detailditolakadmin#proyek" class="edit-icon">✏️</a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Tambahkan pagination DI BAWAH tabel -->
<div class="pagination-centered">
    <div class="pagination">
        <span class="pagination-text">Rows per page:</span>
        <select>
            <option>8</option>
            <option>16</option>
            <option>32</option>
        </select>
        <span class="pagination-text">1–8 of 1240</span>
        <span class="prev">⬅️</span>
        <span class="next">➡️</span>
    </div>
</div>

<!-- Filter Script -->
<script>
    function filterTable(status) {
        const rows = document.querySelectorAll("tbody tr");
        const buttons = document.querySelectorAll(".tab-btn");

        // Hapus class active dari semua tombol
        buttons.forEach(btn => btn.classList.remove("active"));

        // Tambahkan class active ke tombol yang diklik
        document.querySelector(`.tab-btn[data-status="${status}"]`).classList.add("active");

        rows.forEach(row => {
            const statusCell = row.querySelector(".status");
            if (status === "all") {
                row.style.display = "";
            } else if (statusCell && statusCell.classList.contains(status)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
    function applyFilters() {
        const selectedDay = document.getElementById("filter-day").value;
        const selectedMonth = document.getElementById("filter-month").value;
        const selectedYear = document.getElementById("filter-year").value;
        const selectedStatus = document.getElementById("filter-status").value;

        const rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            const dateParts = row.cells[3].textContent.trim().split("/");
            const day = dateParts[0];
            const month = dateParts[1];
            const year = "20" + dateParts[2]; // Ubah '23' menjadi '2023'

            const statusCell = row.querySelector(".status");

            const matchDay = selectedDay === "all" || selectedDay === day;
            const matchMonth = selectedMonth === "all" || selectedMonth === month;
            const matchYear = selectedYear === "all" || selectedYear === year;
            const matchStatus = selectedStatus === "all" || statusCell.classList.contains(selectedStatus);

            if (matchDay && matchMonth && matchYear && matchStatus) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });

        // Reset tab active jika dropdown digunakan
        document.querySelectorAll(".tab-btn").forEach(btn => btn.classList.remove("active"));
        document.querySelector(`.tab-btn[data-status="all"]`).classList.add("active");
    }

    function resetFilters() {
        document.getElementById("filter-day").value = "all";
        document.getElementById("filter-month").value = "all";
        document.getElementById("filter-year").value = "all";
        document.getElementById("filter-status").value = "all";

        document.querySelectorAll("tbody tr").forEach(row => {
            row.style.display = "";
        });

        document.querySelectorAll(".tab-btn").forEach(btn => btn.classList.remove("active"));
        document.querySelector(`.tab-btn[data-status="all"]`).classList.add("active");
    }
</script>
</div>
</body>
</html>
