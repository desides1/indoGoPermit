<?php

namespace App\Exports;

use App\Models\LaporanCetakDokumen;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection
{
    public function collection()
    {
        return LaporanCetakDokumen::all();
    }
}
