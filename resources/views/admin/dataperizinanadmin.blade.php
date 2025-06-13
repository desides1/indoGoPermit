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
            @php
                $years = $dataPerizinan->pluck('created_at')->map(fn($date) => \Carbon\Carbon::parse($date)->format('Y'))->unique();
            @endphp
            @foreach ($years as $year)
                <option value="{{ $year }}">{{ $year }}</option>
            @endforeach
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
            @foreach ($dataPerizinan as $item)
            <tr>
                <td class="user-cell">
                    <img src="{{ asset('storage/' . $item->user->photo ?? '') }}" alt="User" width="30">
                    <span>{{ $item->user->name ?? '-' }}</span>
                </td>
                <td>{{ $item->permissionType->name ?? '-' }}</td>
                <td class="status {{ $item->status }}">
                    {{ ucfirst(str_replace('_', ' ', $item->status)) }}
                </td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/y') }}</td>
                <td class="action-buttons">
                    {{-- <a href="{{ route('dataperizinanadmin.show', $item->id_perizinan) }}" class="detail-btn">Detail</a>
                    <a href="{{ route('dataperizinanadmin.edit', $item->id_perizinan) }}" class="edit-icon">✏</a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination-centered">
        <div class="pagination">
            <span class="pagination-text">Rows per page:</span>
            <select>
                <option>8</option>
                <option>16</option>
                <option>32</option>
            </select>
            <span class="pagination-text">1–{{ count($dataPerizinan) }} of {{ count($dataPerizinan) }}</span>
            <span class="prev">⬅</span>
            <span class="next">➡</span>
        </div>
    </div>
</div>

    <script>
        function filterTable(status) {
            const rows = document.querySelectorAll("tbody tr");
            const buttons = document.querySelectorAll(".tab-btn");

            buttons.forEach(btn => btn.classList.remove("active"));
            document.querySelector(.tab-btn[data-status="${status}"]).classList.add("active");

            rows.forEach(row => {
                const statusCell = row.querySelector(".status");
                if (status === "all" || statusCell.classList.contains(status)) {
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
                const year = "20" + dateParts[2];
                const statusCell = row.querySelector(".status");

                const matchDay = selectedDay === "all" || selectedDay === day;
                const matchMonth = selectedMonth === "all" || selectedMonth === month;
                const matchYear = selectedYear === "all" || selectedYear === year;
                const matchStatus = selectedStatus === "all" || statusCell.classList.contains(selectedStatus);

                row.style.display = (matchDay && matchMonth && matchYear && matchStatus) ? "" : "none";
            });

            document.querySelectorAll(".tab-btn").forEach(btn => btn.classList.remove("active"));
            document.querySelector(.tab-btn[data-status="all"]).classList.add("active");
        }

        function resetFilters() {
            document.getElementById("filter-day").value = "all";
            document.getElementById("filter-month").value = "all";
            document.getElementById("filter-year").value = "all";
            document.getElementById("filter-status").value = "all";

            document.querySelectorAll("tbody tr").forEach(row => row.style.display = "");
            document.querySelectorAll(".tab-btn").forEach(btn => btn.classList.remove("active"));
            document.querySelector(.tab-btn[data-status="all"]).classList.add("active");
        }
    </script>
    </body>
    </html>
