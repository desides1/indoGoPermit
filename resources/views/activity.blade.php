<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Log Activity and Notifications</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <header class="flex justify-between items-center mb-4">
            <div class="flex items-center">
                <img alt="Indo Gopermit Logo" class="mr-2" height="150" src="images/gopermit/LOGO4.png" width="150"/>
            </div>
            <nav class="flex space-x-4">
                <a class="text-gray-700" href="#">Home</a>
                <a class="text-gray-700" href="#">Data Perizinan</a>
                <a class="text-gray-700" href="#">Activity</a>
            </nav>
            <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
        </header>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <h2 class="text-2xl font-bold mb-4">Log Activity</h2>
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                    <h3 class="font-semibold">Pengguna mengunduh surat izin</h3>
                    <p class="text-gray-500">15 Mei 2025 - 08:00</p>
                    <p class="mt-2">
                        Status:
                        <span class="text-blue-500 flex items-center">
                            <i class="fas fa-download mr-2"></i> Dokumen Diunduh
                        </span>
                    </p>
                    <button class="mt-2 bg-[#52B69A] text-white px-4 py-2 rounded">Detail</button>
                </div>
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                    <h3 class="font-semibold">Perizinan disetujui</h3>
                    <p class="text-gray-500">14 Mei 2025 - 16:45</p>
                    <p class="mt-2">
                        Status:
                        <span class="text-green-500 flex items-center">
                            <i class="fas fa-check-circle mr-2"></i> Disetujui
                        </span>
                    </p>
                    <button class="mt-2 bg-[#52B69A] text-white px-4 py-2 rounded">Detail</button>
                </div>
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                    <h3 class="font-semibold">Pengguna mengunggah dokumen perbaikan</h3>
                    <p class="text-gray-500">13 Mei 2025 - 09:20</p>
                    <p class="mt-2">
                        Status:
                        <span class="text-blue-500 flex items-center">
                            <i class="fas fa-upload mr-2"></i> Dokumen Diperbarui
                        </span>
                    </p>
                    <button class="mt-2 bg-[#52B69A] text-white px-4 py-2 rounded">Detail</button>
                </div>
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                    <h3 class="font-semibold">Perizinan membutuhkan perbaikan</h3>
                    <p class="text-gray-500">12 Mei 2025 - 14:00</p>
                    <p class="mt-2">
                        Status:
                        <span class="text-red-500 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i> Perlu Perbaikan
                        </span>
                    </p>
                    <button class="mt-2 bg-[#52B69A] text-white px-4 py-2 rounded">Detail</button>
                </div>
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                    <h3 class="font-semibold">Perizinan diproses oleh admin</h3>
                    <p class="text-gray-500">11 Mei 2025 - 10:15</p>
                    <p class="mt-2">
                        Status:
                        <span class="text-yellow-500 flex items-center">
                            <i class="fas fa-spinner mr-2"></i> Di Proses
                        </span>
                    </p>
                    <button class="mt-2 bg-[#52B69A] text-white px-4 py-2 rounded">Detail</button>
                </div>
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                    <h3 class="font-semibold">Pengajuan perizinan “Course LKP Fun Mandarin”</h3>
                    <p class="text-gray-500">10 Mei 2025 - 08:30</p>
                    <p class="mt-2">
                        Status:
                        <span class="text-green-500 flex items-center">
                            <i class="fas fa-paper-plane mr-2"></i> Diajukan
                        </span>
                    </p>
                    <button class="mt-2 bg-[#52B69A] text-white px-4 py-2 rounded">Detail</button>
                </div>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-4">Notifications</h2>
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                    <p class="text-gray-500 flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i> Baru saja
                    </p>
                    <h3 class="font-semibold">Perizinan Course LKP Fun Mandarin</h3>
                    <p class="mt-2">Catatan:</p>
                    <p class="text-gray-700">Admin telah menyetujui perizinan Course LKP Fun Mandarin. Anda dapat mengunduh dokumen sekarang.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                    <p class="text-gray-500 flex items-center">
                        <i class="fas fa-paper-plane text-blue-500 mr-2"></i> 1 Jam Yang Lalu
                    </p>
                    <h3 class="font-semibold">Perizinan Course LKP Fun Mandarin</h3>
                    <p class="mt-2">Catatan:</p>
                    <p class="text-gray-700">Pengajuan perizinan baru telah berhasil dikirim. Menunggu proses verifikasi.</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow mb-4">
                    <p class="text-gray-500 flex items-center">
                        <i class="fas fa-exclamation-circle text-red-500 mr-2"></i> Kemarin
                    </p>
                    <h3 class="font-semibold">Perizinan Course LKP Fun Mandarin</h3>
                    <p class="mt-2">Catatan:</p>
                    <p class="text-gray-700">Membutuhkan perbaikan. Silakan cek catatan revisi.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>