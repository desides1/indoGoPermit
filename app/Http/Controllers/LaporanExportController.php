<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanCetakDokumen;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;


class LaporanExportController extends Controller
{
    /**
     * Menampilkan tampilan cetak PDF di browser.
     *
     * @return \Illuminate\Http\Response
     */
    public function printPDF()
    {
        $laporan = LaporanCetakDokumen::all();
        $pdf = Pdf::loadView('admin.laporancetakadmin_pdf', compact('laporan'));
        return $pdf->stream('laporan-cetak-dokumen.pdf');
    }

    /**
     * Mengunduh file PDF dari data laporan.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF()
    {
        $laporan = LaporanCetakDokumen::all();
        $pdf = Pdf::loadView('admin.laporancetakadmin_pdf', compact('laporan'));
        return $pdf->download('laporan-cetak-dokumen.pdf');
    }

    /**
     * Mengunduh file Excel dari data laporan.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadExcel()
    {
        return Excel::download(new LaporanExport, 'laporan-cetak-dokumen.xlsx');
    }
}
