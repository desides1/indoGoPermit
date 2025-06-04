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
        // $perizinan = new Perizinan([
        //     'user_id' => auth()->id,
        //     'permission_type_id' => $request->get('jenisIzin'),
        // ]);
        // dd($request->all());


        switch ($step) {
            case 'request':
                $validated = app(Step1Request::class)->validated();
                session(['permit.step1' => $validated]);
                break;

            case 'gis':
                $validated = app(Step2Gis::class)->validated();
                session(['permit.step2' => $validated]);
                break;

            case 'typeRequester':
                $type = $request->input('typeRequester');

                if ($type === 'individual') {
                    $validated = app(Step3Individual::class)->validated();
                    session(['permit.step3' => ['type' => 'individual'] + $validated]);
                } elseif ($type === 'business') {
                    $validated = app(Step3Bussiness::class)->validated();
                    session(['permit.step3' => ['type' => 'business'] + $validated]);
                }
                break;

            case 'document':
                $validated = app(Step4Document::class)->validated();
                $path = $request->file('document_izin')->store('document-temp');
                session(['permit.step4' => array_merge($validated, ['file_path' => $path])]);
                break;

            case 'project':
                $validated = app(Step5Proyek::class)->validated();
                session(['permit.step5' => $validated]);

                return $this->finalizePermit();
        }
    }

    protected function finalizePermit()
    {
        try {
            DB::beginTransaction();

            $permitData = session('permit');
            $perizinan = new Perizinan([
                'user_id' => auth()->id(),
                'permission_type_id' => $permitData['step1']['jenisIzin'],
                'request_number_id' => $permitData['step1']['nomorPermohonan'],
                'identity_type' => $permitData['step3']['type'],
                'identity_number' => $permitData['step3']['nomorIdentitas'],
                'location_id' => Location::create($permitData['step2'])->id,
            ]);
            $perizinan->save();

            if ($permitData['step3']['type'] === 'individual') {
                Individual::create(array_merge($permitData['step3'], ['perizinan_id' => $perizinan->id]));
            } else {
                BussinessEntity::create(array_merge($permitData['step3'], ['perizinan_id' => $perizinan->id]));
            }

            DocumentRequirements::create(array_merge($permitData['step4'], ['perizinan_id' => $perizinan->id]));
            Project::create(array_merge($permitData['step5'], ['perizinan_id' => $perizinan->id]));

            DB::commit();
            session()->forget('permit');

            return redirect()->route('perizinan')->with('success', 'Permohonan berhasil dibuat.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error finalizing permit: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memproses permohonan.']);
        }
    }


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
