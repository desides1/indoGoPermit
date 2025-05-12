<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Home</title>
    <link rel="stylesheet" href="{{ asset('css/admin/berandaadmin.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/LOGO INDOGOPERMIT.png') }}" alt="Logo IndoGoPermit">
            <h2></h2>
        </div>
        <ul>
            <li class="active">
                <a href="{{ route('berandaadmin.index') }}"> 🏠 Beranda </a>
            </li>
            <li>
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
            <h1>Beranda</h1>
            <div class="icons">
                🔔 👤
                <i class="fas fa-bell"></i>
                <i class="fas fa-user"></i>
                <i class="fas fa-pen"></i> <!-- Icon edit -->
            </div>
        </div>

<!-- Statistik Cards -->
<div class="cards">
    <div class="card blue">
        <div class="card-border"></div>
        <div class="card-content">
            <div class="card-header">
                <img src="{{ asset('images/topics/TOTAL.png') }}" alt="Total Applicants">
                <div class="card-title">
                    <h3>Total Applicants</h3>
                    <p>Posted 2 days ago</p>
                </div>
                <i class="fas fa-external-link-alt"></i>
            </div>
            <div class="main-info">
                <p class="big-number">45</p>
                <p class="small-text">applications</p>
            </div>
            <p class="last-week">25 in last week</p>
        </div>
    </div>

    <div class="card yellow">
        <div class="card-border"></div>
        <div class="card-content">
            <div class="card-header">
                <img src="{{ asset('images/topics/PROSES.png') }}" alt="Process">
                <div class="card-title">
                    <h3>Process</h3>
                    <p>Posted 10 days ago</p>
                </div>
                <i class="fas fa-external-link-alt"></i>
            </div>
            <div class="main-info">
                <p class="big-number">25</p>
                <p class="small-text">applications</p>
            </div>
            <p class="last-week">25 in last week</p>
        </div>
    </div>

    <div class="card green">
        <div class="card-border"></div>
        <div class="card-content">
            <div class="card-header">
                <img src="{{ asset('images/topics/DONE.png') }}" alt="Approved">
                <div class="card-title">
                    <h3>Approved</h3>
                    <p>Posted 15 days ago</p>
                </div>
                <i class="fas fa-external-link-alt"></i>
            </div>
            <div class="main-info">
                <p class="big-number">105</p>
                <p class="small-text">applications</p>
            </div>
            <p class="last-week">73 in last week</p>
        </div>
    </div>

    <div class="card red">
        <div class="card-border"></div>
        <div class="card-content">
            <div class="card-header">
                <img src="{{ asset('images/topics/TOLAK.png') }}" alt="Rejected">
                <div class="card-title">
                    <h3>Rejected</h3>
                    <p>Posted 5 days ago</p>
                </div>
                <i class="fas fa-external-link-alt"></i>
            </div>
            <div class="main-info">
                <p class="big-number">38</p>
                <p class="small-text">applications</p>
            </div>
            <p class="last-week">10 in last week</p>
        </div>
    </div>
</div>


        <!-- Licensing Statistics -->
        <div class="statistics">
            <h2><i class="fas fa-chart-bar"></i> Licensing Statistics</h2>
            <table>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Popularity</th>
                    <th>Sales</th>
                </tr>
                <tr>
                    <td>01</td>
                    <td><i class="fas fa-users"></i> Total Applicants</td>
                    <td><div class="progress blue"></div></td>
                    <td>19%</td>
                </tr>
                <tr>
                    <td>02</td>
                    <td><i class="fas fa-spinner"></i> Process</td>
                    <td><div class="progress yellow"></div></td>
                    <td>17%</td>
                </tr>
                <tr>
                    <td>03</td>
                    <td><i class="fas fa-check-circle"></i> Approved</td>
                    <td><div class="progress green"></div></td>
                    <td>48%</td>
                </tr>
                <tr>
                    <td>04</td>
                    <td><i class="fas fa-times-circle"></i> Rejected</td>
                    <td><div class="progress red"></div></td>
                    <td>23%</td>
                </tr>
            </table>
        </div>

        <div class="charts">
            <!-- Wave Line Chart -->
            <div class="chart-container">
              <canvas id="waveLineChart"></canvas>
              <div style="text-align: right; font-size: 12px; color: #999;">Year <strong>2020</strong></div>
            </div>

            <!-- Stacked Bar Chart -->
            <div class="chart-container">
              <div class="chart-title">Level</div>
              <canvas id="stackedBarChart"></canvas>
              <div class="chart-legend">
                <div class="legend-item">
                  <span class="legend-color" style="background: #a0e3e2;"></span> Volume
                </div>
                <div class="legend-item">
                  <span class="legend-color" style="background: #212529;"></span> Service
                </div>
              </div>
            </div>
          </div>


        <canvas id="waveLineChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('waveLineChart').getContext('2d');

  const waveLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [{
        label: 'Data',
        data: [22000, 10000, 31000, 15000, 30000, 14000, 31000, 11000, 23000, 10000, 20000, 25000],
        fill: true,
        borderColor: '#5c6ac4',
        backgroundColor: 'rgba(92, 106, 196, 0.1)',
        tension: 0.4,

        // Titik akhir (dot terakhir)
        pointRadius: function(context) {
          return context.dataIndex === context.chart.data.labels.length - 1 ? 5 : 0;
        },
        pointBackgroundColor: function(context) {
          return context.dataIndex === context.chart.data.labels.length - 1 ? '#ffffff' : 'transparent';
        },
        pointBorderColor: function(context) {
          return context.dataIndex === context.chart.data.labels.length - 1 ? '#4a60e8' : 'transparent';
        },
        pointBorderWidth: function(context) {
          return context.dataIndex === context.chart.data.labels.length - 1 ? 3 : 0;
        }
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          ticks: {
            callback: function(value) {
              return value / 1000 + 'k';
            }
          }
        }
      },
      plugins: {
        legend: {
          display: false
        }
      }
    }
  });
</script>

<!-- Bar Chart untuk Level -->
<canvas id="stackedBarChart"></canvas>

<script>
  const ctxBar = document.getElementById('stackedBarChart').getContext('2d');

  new Chart(ctxBar, {
    type: 'bar',
    data: {
      labels: ['A', 'B', 'C', 'D', 'E'],
      datasets: [
        {
          label: 'Volume',
          data: [10, 12, 8, 6, 7],
          backgroundColor: '#a0e3e2'
        },
        {
          label: 'Service',
          data: [5, 8, 6, 5, 4],
          backgroundColor: '#212529'
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false
        }
      },
      scales: {
        x: {
          stacked: true
        },
        y: {
          stacked: true,
          beginAtZero: true
        }
      }
    }
  });
</script>
</body>
</html>
