<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\FormStepper;
use App\Models\Perizinan;
use App\Models\PermissionType;
use App\Models\PermitType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PermissionTypeController extends Controller
{
    public function index()
    {
        $permitTypes = PermissionType::get(['id_permission_type', 'name']);
        return view('user.addDataPerizinan', compact('permitTypes'));
    }

    public function validate(Request $request)
    {

        $validate = $request->validate([
            'permitTypes' => 'required',
        ]);

        // dd($validate['permitTypes']);

        // $perizinanId = Perizinan::insertGetId([
        //     'permission_type_id' => $request->get('permitTypes'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Save perizinanId to session
        Session::put('permitTypes', $validate['permitTypes']);
        // $permitTypes = session('permitTypes', $validate['permitTypes']);
        // session(['permitTypes' => $validate[' permitTypes ']]);
        Log::info('redirect');


        // dd(session()->all());
        // Send validated data to FormStepperController
        return redirect()->action([FormStepper::class, 'index']);
        // return redirect()->route('addData');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'permit_type' => 'required|string|in:Perizinan Pendidikan & Lembaga Kursus,Perizinan Pariwisata & Hiburan,Perizinan Kesehatan & Kecantikan,Perizinan Perbankan,Perizinan UMKM'
        ]);

        // session(['permit_type' => $validateData['permit_type']]);
        return redirect()->route('request')->with('success', 'Jenis perizinan berhasil dipilih!');
    }
}
