<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Step1Request;
use App\Http\Requests\Step2Gis;
use App\Http\Requests\Step3Bussiness;
use App\Http\Requests\Step3Individual;
use App\Http\Requests\Step4Document;
use App\Http\Requests\Step5Proyek;
use App\Models\DocumentRequirements;
use App\Models\Individual;
use App\Models\BussinessEntity;
use App\Models\City;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\Perizinan;
use App\Models\PermitType;
use App\Models\Project;
use App\Models\Province;
use App\Models\RequestNumber;
use App\Models\Subdistric;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FormStepper extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('user.formPerizinan.formStepper');
        // return view('user.formPerizinan.formStepper', ['currentStep' => 1]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($step = null)
    {
        // Get all request data, including data sent via redirect (old input/flash data)
        $validatedData = session('validatedData', []);

        // Define all steps
        $steps = ['request', 'gis', 'typeRequester', 'document', 'project'];
        $step = $step ?? $steps[0];

        if (!in_array($step, $steps)) abort(404);

        // Fetch all data needed for all steps
        return view('user.formPerizinan.formStepper', [
            'currentStep' => $step,
            'permitTypesDb' => PermitType::select('id_permit_type', 'name')->get(),
            'numberRequests' => RequestNumber::select('id_request_number', 'number')->get(),
            'provinces' => Province::select('id_province', 'name')->get(),
            'identityTypes' => ['KTP', 'SIM', 'Passport'],
            'documentTypes' => ['SK', 'Rekomendasi', 'Proposal'],
            'projectCategories' => ['Pembangunan', 'Pengembangan', 'Rehabilitasi'],
            'options' => ['individual', 'business'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $step)
    {
        dd($request->all());
        $step = (int) $step;

        // switch ($step) {
        //     case 1:
        //         $validated = app(Step1Request::class)->validated();
        //         session(['permit.step1' => $validated]);
        //         break;

        //     case 2:
        //         $validated = app(Step2Gis::class)->validated();
        //         session(['permit.step2' => $validated]);
        //         break;

        //     case 3:
        //         if ($request->input('typeRequester') === 'individual') {
        //             $validated = app(Step3Individual::class)->validated();
        //             session(['permit.step3' => ['type' => 'individual'] + $validated]);
        //         } elseif ($request->input('typeRequester') === 'business') {
        //             $validated = app(Step3Bussiness::class)->validated();
        //             session(['permit.step3' => ['type' => 'business'] + $validated]);
        //         }
        //         break;

        //     case 4:
        //         $validated = app(Step4Document::class)->validated();
        //         $path = $request->file('document_izin')->store('document-temp');
        //         session(['permit.step4' => array_merge($validated, ['file_path' => $path])]);
        //         break;

        //     case 5:
        //         $validated = app(Step5Proyek::class)->validated();
        //         session(['permit.step5' => $validated]);

        //         $all = session('permit');

        //         DB::beginTransaction();
        //         try {
        //             $step1 = Request::create($all['step1']);
        //             $step2 = Location::create($all['step2']);

        //             $individualId = null;
        //             $businessId = null;
        //             if (isset($all['individual'])) {
        //                 $individual = Individual::create($all['individual']);
        //                 $individualId = $individual->id;
        //             } elseif (isset($all['business'])) {
        //                 $business = BussinessEntity::create($all['business']);
        //                 $businessId = $business->id;
        //             }
        //             // $step4 = DocumentRequirements::create([
        //             //     ...$all['step4'],
        //             //     'file_path' => $all['step4']['file_path'],
        //             // ]);
        //             $step4 = DocumentRequirements::create($all['document']);
        //             $step5 = Project::create($all['project']);

        //             // Simpan ke tabel utama: permits
        //             Perizinan::create([
        //                 'step1_id' => $step1->id,
        //                 'step2_id' => $step2->id,
        //                 'individual_id' => $individualId,
        //                 'business_id' => $businessId,
        //                 'step4_id' => $step4->id,
        //                 'step5_id' => $step5->id,
        //             ]);

        //             DB::commit();
        //             session()->forget('permit');
        //             return redirect()->route('perizinan')->with('success', 'Data berhasil disimpan!');
        //         } catch (\Exception $e) {
        //             DB::rollBack();
        //             return back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        //         }
        // }



        // // Pindah ke step berikutnya
        // $nextStep = $this->steps[array_search($step, $this->steps) + 1] ?? null;
        // return redirect()->route('addData', ['step' => $nextStep]);
    }

    // public function province()
    // {
    //     $data['province'] = Province::get(['name', 'id_province']);
    //     return response()->json($data);
    // }

    public function fetchCity(Request $request)
    {
        $data['city'] = City::where('id_province', $request->id_province)->get(['id_city', 'name']);
        Log::info('City data fetched for province ID: ' . $request->id_province);
        return response()->json($data);
    }

    public function fetchSubdistrict(Request $request)
    {
        // dd($request->all());
        $data['subdistrict'] = Subdistric::where('id_city', $request->id_city)->get(['id_subdistrict', 'name']);
        // return dd($data['subdistricts']);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
