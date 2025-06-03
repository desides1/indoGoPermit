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
        switch ($step) {
            case 1:
                // Validasi dan simpan data step 1 ke tabel, misal: requests
                RequestModel::create($request->only(['field1', 'field2']));
                break;

            case 2:
                // Validasi dan simpan data step 2 ke tabel, misal: gis
                Gis::create($request->only(['lat', 'lon']));
                break;

            case 3:
                // Simpan data step 3, misal: type_requesters
                TypeRequester::create($request->only(['type']));
                break;

            case 4:
                // Simpan dokumen
                if ($request->hasFile('document')) {
                    $file = $request->file('document')->store('documents');
                    Document::create([
                        'filename' => $file,
                        'description' => $request->input('description'),
                    ]);
                }
                break;

            case 5:
                // Simpan data project
                Project::create($request->only(['name', 'location', 'budget']));
                break;

            default:
                return back()->withErrors(['Invalid step.']);
        }

        return redirect()->back()->with('success', "Data step {$step} berhasil disimpan.");
    }


    public function finalize(Request $request)
    {
        // $permitData = session('permit');

        // DB::beginTransaction();
        // try {
        //     // Example: create Location first
        //     $location = Location::create($permitData['gis']);

        //     // Create main Perizinan record
        //     $perizinan = Perizinan::create([
        //         // 'user_id' => auth()->id(),
        //         'permission_type_id' => $permitData['request']['jenisIzin'],
        //         'request_number_id' => $permitData['request']['nomorPermohonan'],
        //         'location_id' => $location->id,
        //         // ...other fields as needed
        //     ]);

        //     // Create related records (Individual/Business, Document, Project, etc.)
        //     if ($permitData['typeRequester']['type'] === 'individual') {
        //         Individual::create(array_merge($permitData['typeRequester'], ['perizinan_id' => $perizinan->id]));
        //     } else {
        //         BussinessEntity::create(array_merge($permitData['typeRequester'], ['perizinan_id' => $perizinan->id]));
        //     }

        //     // ...repeat for other steps (document, project, etc.)

        //     DB::commit();
        //     session()->forget('permit');
        //     return redirect()->route('perizinan')->with('success', 'Permohonan berhasil dibuat.');
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        // }
    }

    protected function finalizePermit()
    {
        try {
            DB::beginTransaction();
            $permitData = session('permit');
            $location = Location::create($permitData['gis']);
            $perizinan = Perizinan::create([
                'user_id' => auth()->id(),
                'permission_type_id' => $permitData['request']['jenisIzin'],
                'request_number_id' => $permitData['request']['nomorPermohonan'],
                'location_id' => $location->id,
                // Tambahkan field lain jika perlu
            ]);
            if ($permitData['typeRequester']['type'] === 'individual') {
                Individual::create(array_merge($permitData['typeRequester'], ['perizinan_id' => $perizinan->id]));
            } else {
                BussinessEntity::create(array_merge($permitData['typeRequester'], ['perizinan_id' => $perizinan->id]));
            }
            DocumentRequirements::create(array_merge($permitData['document'], ['perizinan_id' => $perizinan->id]));
            Project::create(array_merge($permitData['project'], ['perizinan_id' => $perizinan->id]));
            DB::commit();
            session()->forget('permit');
            return redirect()->route('perizinan')->with('success', 'Permohonan berhasil dibuat.');
        } catch (\Exception $e) {
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
