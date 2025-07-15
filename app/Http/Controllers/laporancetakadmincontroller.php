<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailDone;
use App\Models\Perizinan;
use App\Models\User;
use App\Models\PermissionType;
use Carbon\Carbon;

class LaporanCetakAdminController extends Controller
{
    /**
     * Menampilkan daftar laporan perizinan yang sudah selesai
     */
    public function index()
    {
        $data = DetailDone::with(['user', 'perizinan', 'permissionType'])
            ->orderBy('tanggal_pengajuan', 'desc')
            ->get();

        return view('admin.laporancetakadmin', compact('data'));
    }

    /**
     * Menyaring laporan berdasarkan rentang tanggal
     */
    public function filter(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai'
        ]);

        $query = DetailDone::with(['user', 'perizinan', 'permissionType']);

        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $startDate = Carbon::parse($request->tanggal_mulai)->startOfDay();
            $endDate = Carbon::parse($request->tanggal_selesai)->endOfDay();

            $query->whereBetween('tanggal_pengajuan', [$startDate, $endDate]);
        }

        $data = $query->orderBy('tanggal_pengajuan', 'desc')->get();

        return view('admin.laporancetakadmin', [
            'data' => $data,
            'oldTanggalMulai' => $request->tanggal_mulai,
            'oldTanggalSelesai' => $request->tanggal_selesai
        ]);
    }

    /**
     * Export laporan ke PDF
     */
    public function exportPdf(Request $request)
    {
        $query = DetailDone::with(['user', 'perizinan', 'permissionType']);

        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $startDate = Carbon::parse($request->tanggal_mulai)->startOfDay();
            $endDate = Carbon::parse($request->tanggal_selesai)->endOfDay();

            $query->whereBetween('tanggal_pengajuan', [$startDate, $endDate]);
        }

        $data = $query->orderBy('tanggal_pengajuan', 'desc')->get();

        $pdf = \PDF::loadView('admin.exports.laporan_pdf', compact('data'));

        return $pdf->download('laporan-perizinan-' . date('Y-m-d') . '.pdf');
    }
}
