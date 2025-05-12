<?php

namespace App\Exports;

use App\Models\Laporan;
use App\Models\LaporanCetakDokumen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return LaporanCetakDokumen::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Pemohon',
            'Jenis Izin',
            'Status',
            'Tanggal Pengajuan',
            'Tanggal Selesai',
        ];
    }
}
