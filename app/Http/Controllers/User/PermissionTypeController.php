<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionTypeController extends Controller
{
    public function index()
    {
        $permitTypes = [
            'Perizinan Pendidikan & Lembaga Kursus',
            'Perizinan Pariwisata & Hiburan',
            'Perizinan Kesehatan & Kecantikan',
            'Perizinan Perbankan',
            'Perizinan UMKM',
        ];
        return view('user.addDataPerizinan', compact('permitTypes'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'permit_type' => 'required|string|in:Perizinan Pendidikan & Lembaga Kursus,Perizinan Pariwisata & Hiburan,Perizinan Kesehatan & Kecantikan,Perizinan Perbankan,Perizinan UMKM'
        ]);

        session(['permit_type' => $validateData['permit_type']]);
        return redirect()->route('request')->with('success', 'Jenis perizinan berhasil dipilih!');
    }
}
