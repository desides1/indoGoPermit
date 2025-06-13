<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        // Contoh data log aktivitas
        $logActivities = [
            [
                'title' => 'Pengguna mengunduh surat izin',
                'date' => '15 Mei 2025 - 08:00',
                'status' => 'Dokumen Diunduh',
                'status_color' => 'gray',
            ],
            [
                'title' => 'Perizinan disetujui',
                'date' => '14 Mei 2025 - 16:45',
                'status' => 'Disetujui',
                'status_color' => 'green',
            ],
            [
                'title' => 'Pengguna mengunggah dokumen perbaikan',
                'date' => '13 Mei 2025 - 09:20',
                'status' => 'Dokumen Diperbarui',
                'status_color' => 'blue',
            ],
            [
                'title' => 'Perizinan membutuhkan perbaikan',
                'date' => '12 Mei 2025 - 14:00',
                'status' => 'Perlu Perbaikan',
                'status_color' => 'red',
            ],
            [
                'title' => 'Perizinan diproses oleh admin',
                'date' => '11 Mei 2025 - 10:15',
                'status' => 'Di Proses',
                'status_color' => 'orange',
            ],
            [
                'title' => 'Pengajuan perizinan “Course LKP Fun Mandarin”',
                'date' => '10 Mei 2025 - 08:30',
                'status' => 'Diajukan',
                'status_color' => 'teal',
            ],
        ];

        // Contoh data notifikasi
        $notifications = [
            [
                'time' => 'Baru saja',
                'status' => 'Persetujuan',
                'status_color' => 'green',
                'title' => 'Perizinan Course LKP Fun Mandarin',
                'note' => 'Admin telah menyetujui perizinan Course LKP Fun Mandarin. Anda dapat mengunduh dokumen sekarang.',
            ],
            [
                'time' => '1 Jam Yang Lalu',
                'status' => 'Pengajuan',
                'status_color' => 'blue',
                'title' => 'Perizinan Course LKP Fun Mandarin',
                'note' => 'Pengajuan perizinan baru telah berhasil dikirim. Menunggu proses verifikasi.',
            ],
            [
                'time' => 'Kemarin',
                'status' => 'Perlu Perbaikan',
                'status_color' => 'orange',
                'title' => 'Perizinan Course LKP Fun Mandarin',
                'note' => 'Membutuhkan perbaikan. Silakan cek catatan revisi.',
            ],
        ];

        return view('activity', compact('logActivities', 'notifications'));
    }
}
