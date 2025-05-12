<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perizinan</title>
    <link rel="stylesheet" href="{{ asset('css/admin/detaildoneadmin.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .tab-content {
            display: none;
        }
        .tab-content.active-tab {
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
            <h2>Dokumen Perizinan</h2>

            <!-- TAB 1 -->
            <div class="tab-content active-tab" id="tab-1">
                <div class="profile">
                    <img src="user.jpg" alt="Charlie Kristen">
                    <div class="profile-info">
                        <h3>Charlie Kristen</h3>
                        <p>New</p>
                    </div>
                    <button class="btn-input" onclick="enableInputs()">Input</button>
                </div>

                <div class="info-section">
                    <h3 class="informasi-permohonan-title">Informasi Permohonan</h3>
                    <table class="informasi-permohonan-table">
                        <thead>
                            <tr>
                                <th>Field</th>
                                <th>Input</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Jenis Perizinan</td>
                                <td><input type="text" class="input-field" id="jenisIzin" disabled></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pengajuan</td>
                                <td><input type="date" class="input-field" id="tglAjukan" disabled></td>
                            </tr>
                            <tr>
                                <td>Tanggal Selesai</td>
                                <td><input type="date" class="input-field" id="tglSelesai" disabled></td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td><textarea class="input-field" id="catatan" disabled></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="document-section">
                    <h3>Dokumen</h3>
                    <div class="document-list">
                        <div class="document-item">
                            <span class="upload-text">Surat Keputusan (SK)</span>
                            <div class="file-container">
                                <input type="text" class="file-input" placeholder="Tipe File PDF / DOCX" readonly>
                                <span class="remove-file" style="display: none;">&times;</span>
                            </div>
                            <button class="upload-btn">📤 Upload</button>
                            <input type="file" accept=".pdf,.docx" hidden>
                        </div>
                        <div class="document-item">
                            <span class="upload-text">Sertifikat / Izin Resmi</span>
                            <div class="file-container">
                                <input type="text" class="file-input" placeholder="Tipe File PDF / DOCX" readonly>
                                <span class="remove-file" style="display: none;">&times;</span>
                            </div>
                            <button class="upload-btn">📤 Upload</button>
                            <input type="file" accept=".pdf,.docx" hidden>
                        </div>
                        <div class="document-item">
                            <span class="upload-text">Berita Acara Pemeriksaan (BAP)</span>
                            <div class="file-container">
                                <input type="text" class="file-input" placeholder="PDF / JPG" readonly>
                                <span class="remove-file" style="display: none;">&times;</span>
                            </div>
                            <button class="upload-btn">📤 Upload</button>
                            <input type="file" accept=".pdf,.jpg" hidden>
                        </div>
                        <div class="document-item">
                            <span class="upload-text">Dokumen Pendukung</span>
                            <div class="file-container">
                                <input type="text" class="file-input" placeholder="PDF / ZIP" readonly>
                                <span class="remove-file" style="display: none;">&times;</span>
                            </div>
                            <button class="upload-btn">📤 Upload</button>
                            <input type="file" accept=".pdf,.zip" hidden>
                        </div>
                    </div>
                </div>

                <div class="buttons">
                    <!-- Back ke halaman utama -->
                    <button class="back-btn" onclick="handleBack()">← Back</button>
                    <button class="next-btn" onclick="changeTab(1)">Next →</button>
                </div>
            </div>

            <!-- TAB 2 -->
<div class="tab-content" id="tab-2">
    <div class="profile">
        <img src="user.jpg" alt="Charlie Kristen">
        <div class="profile-info">
            <h3>Charlie Kristen</h3>
            <p>New</p>
        </div>
    </div>

    <div class="info-section">
        <h3 class="informasi-permohonan-title">Informasi Permohonan</h3>
        <table class="informasi-permohonan-table">
            <thead>
                <tr>
                    <td>Jenis Perizinan</td>
                    <td><span id="jenisIzinPreview"></span></td>
                </tr>
                <tr>
                    <td>Tanggal Pengajuan</td>
                    <td><span id="tglAjukanPreview"></span></td>
                </tr>
                <tr>
                    <td>Tanggal Selesai</td>
                    <td><span id="tglSelesaiPreview"></span></td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td><span id="catatanPreview"></span></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="document-section">
        <h3>Dokumen</h3>
        <div class="document-list">
            <div class="document-item">
                <img src="" alt="File Icon" class="file-icon" style="display: none; width: 20px;">
                <span class="upload-text">Belum dipilih</span>
            </div>
            <div class="document-item">
                <img src="" alt="File Icon" class="file-icon" style="display: none; width: 20px;">
                <span class="upload-text">Belum dipilih</span>
            </div>
            <div class="document-item">
                <img src="" alt="File Icon" class="file-icon" style="display: none; width: 20px;">
                <span class="upload-text">Belum dipilih</span>
            </div>
            <div class="document-item">
                <img src="" alt="File Icon" class="file-icon" style="display: none; width: 20px;">
                <span class="upload-text">Belum dipilih</span>
            </div>
        </div>
    </div>

                <div class="buttons">
                    <button class="back-btn" onclick="changeTab(-1)">← Back</button>
                    <button class="send-btn">Send <span class="send-icon">📩</span></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentTab = 0;
        const tabs = document.querySelectorAll(".tab-content");

        function showTab(index) {
            if (index < 0 || index >= tabs.length) return;

            tabs.forEach((tab, i) => {
                tab.classList.remove("active-tab");
                if (i === index) {
                    tab.classList.add("active-tab");
                }
            });

            currentTab = index;
        }

        function changeTab(step) {
            const newIndex = currentTab + step;
            if (newIndex >= 0 && newIndex < tabs.length) {
                // Validasi sebelum lanjut ke tab 2
                if (currentTab === 0 && newIndex === 1) {
                    if (!isTab1Valid()) {
                        alert("Harap lengkapi semua input dan unggah semua dokumen terlebih dahulu.");
                        return;
                    }
                    copyInputsToPreview();
                    copyFileNamesToPreview();
                }
                showTab(newIndex);
            }
        }

        function handleBack() {
            if (currentTab > 0) {
                changeTab(-1);
            } else {
                window.location.href = "{{ route('dataperizinanadmin.index') }}";
            }
        }

        function enableInputs() {
            const inputs = document.querySelectorAll("#tab-1 .input-field");
            inputs.forEach(input => {
                input.disabled = false;
            });
        }

        function copyInputsToPreview() {
            document.getElementById("jenisIzinPreview").textContent = document.getElementById("jenisIzin").value;
            document.getElementById("tglAjukanPreview").textContent = document.getElementById("tglAjukan").value;
            document.getElementById("tglSelesaiPreview").textContent = document.getElementById("tglSelesai").value;
            document.getElementById("catatanPreview").textContent = document.getElementById("catatan").value;
        }

        function copyFileNamesToPreview() {
            const fileInputs = document.querySelectorAll("#tab-1 input[type='file']");
            const fileItems = document.querySelectorAll("#tab-2 .document-item");

            fileInputs.forEach((input, i) => {
                const fileName = input.files.length > 0 ? input.files[0].name : null;
                const fileIcon = fileItems[i].querySelector("img");
                const fileLabel = fileItems[i].querySelector(".upload-text");

                if (fileName) {
                    fileLabel.textContent = fileName;

                    const ext = fileName.split('.').pop().toLowerCase();
                    let iconPath = "";

                    switch (ext) {
                        case "pdf":
                            iconPath = "{{ asset('images/PDF ICON.png') }}"; break;
                        case "doc":
                        case "docx":
                            iconPath = "{{ asset('images/DOC ICON.png') }}"; break;
                        case "jpg":
                        case "jpeg":
                        case "png":
                            iconPath = "{{ asset('images/JPG ICON.png') }}"; break;
                        case "zip":
                        case "rar":
                            iconPath = "{{ asset('images/ZIP ICON.png') }}"; break;
                        default:
                            iconPath = "{{ asset('images/FILE ICON.png') }}"; break;
                    }

                    fileIcon.src = iconPath;
                    fileIcon.style.display = "inline";
                } else {
                    fileLabel.textContent = "Belum dipilih";
                    fileIcon.style.display = "none";
                }
            });
        }

        function isTab1Valid() {
            const requiredInputs = document.querySelectorAll("#tab-1 .input-field");
            const requiredFiles = document.querySelectorAll("#tab-1 input[type='file']");

            let allInputsFilled = Array.from(requiredInputs).every(input => input.value.trim() !== "");
            let allFilesUploaded = Array.from(requiredFiles).every(file => file.files.length > 0);

            return allInputsFilled && allFilesUploaded;
        }

        function isValidFile(fileName, allowedExtensions) {
            const ext = fileName.split('.').pop().toLowerCase();
            return allowedExtensions.includes(ext);
        }

        document.addEventListener("DOMContentLoaded", () => {
            showTab(0);

            document.querySelectorAll(".upload-btn").forEach((btn) => {
                const fileInput = btn.nextElementSibling;
                const fileContainer = btn.previousElementSibling;
                const textField = fileContainer.querySelector(".file-input");
                const removeBtn = fileContainer.querySelector(".remove-file");

                // Tombol Upload: Buka file picker
                btn.addEventListener("click", () => {
                    fileInput.click();
                });

                // Saat file dipilih
                fileInput.addEventListener("change", () => {
                    if (fileInput.files.length > 0) {
                        const fileName = fileInput.files[0].name;
                        const allowedExtensions = fileInput.accept.split(',').map(ext => ext.replace('.', '').toLowerCase());

                        if (isValidFile(fileName, allowedExtensions)) {
                            textField.value = fileName;
                            textField.classList.remove("error-file");
                            textField.classList.add("has-file");
                            removeBtn.style.display = "inline";
                        } else {
                            textField.value = fileName + " ❌ File tidak valid!";
                            textField.classList.add("error-file");
                            textField.classList.add("has-file");
                            removeBtn.style.display = "inline";
                        }
                    }
                });

                // Tombol silang untuk menghapus file
                removeBtn.addEventListener("click", () => {
                    fileInput.value = "";
                    textField.value = "";
                    textField.classList.remove("error-file", "has-file");
                    removeBtn.style.display = "none";
                });
            });

            // ✅ Tambahkan event listener untuk tombol Send
            document.querySelector(".send-btn").addEventListener("click", () => {
                if (!isTab1Valid()) {
                    alert("Harap lengkapi semua input dan unggah semua dokumen terlebih dahulu.");
                    return;
                }

                alert("Perizinan berhasil dikirim!");
            });
        });
    </script>
    </body>
    </html>
