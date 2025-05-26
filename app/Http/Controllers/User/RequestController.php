<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PermitType;

class RequestController extends Controller
{
    public function index()
    {
        $permitTypes = [
            'Izin Pendirian Satuan Pendidikan NonFormal-SPNF',
            'Izin Pendirian Satuan Pedidikan Anak Usia Dini-PAUD',
            'Izin Pendirian Satuan Pendidikan Satuan Sekolah Dasar-SD',
            'Izin Pendirian Satuan Pendidikan Satuan Sekolah Menengah Pertama-SMP',
            'Izin Penyelenggaraan Laboratorium Kesehatan Masyarakat',
            'Izin Peruntukan Penggunaan Tanahh-IPPT',
            'IKonfirmasi Kesesuaian Kegiatan Pemanfaatan Ruang NonBerusaha-KKKPR',
            'Legalisir IMB-LIMB',
            'Izin Pendirian Satuan Pendidikan NonFormal',
        ];

        $permitTypesDb = PermitType::all()->pluck('name');


        return view('user.formPerizinan.formStepper.stepRequestPermit', compact('permitTypes', 'permitTypesDb'));
    }

    public function create() {}
}
