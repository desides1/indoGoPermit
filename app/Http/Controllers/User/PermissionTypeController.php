<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PermissionType;
use App\Http\Controllers\User\FormStepper;

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

    public function validate(Request $request)
    {

        $validate = $request->validate([
            'permitTypes' => 'required',
        ]);

        PermissionType::create([
            'name' => $request->get('permitTypes'),
            'created_at' => now(),
        ]);
        // Send validated data to FormStepperController
        return redirect()->action([FormStepper::class, 'create'])->with('validatedData', $validate);
        // return redirect()->route('addData');
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
