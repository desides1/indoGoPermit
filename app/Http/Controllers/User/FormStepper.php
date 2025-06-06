<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Step1Request;
use App\Http\Requests\Step2Gis;
use App\Http\Requests\Step3Bussiness;
use App\Http\Requests\Step3Individual;
use App\Http\Requests\Step4Document;
use App\Http\Requests\Step5Proyek;
use App\Models\BussinessEntity;
use App\Models\City;
use App\Models\DocumentRequirements;
use App\Models\Individual;
use App\Models\Location;
use App\Models\Perizinan;
use App\Models\PermitType;
use App\Models\Project;
use App\Models\Province;
use App\Models\RequestNumber;
use App\Models\Subdistric;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class FormStepper extends Controller
{

    public function index($step = null)
    {
        $premitTypes = session()->get('permitTypes');
        // dd();
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
    public function store(Request $request)
    {
        //Get the permit types from session
        $premitTypes = session()->get('permitTypes');

        try {
            // dd($request->all());
            // Validasi semua data dari langkah-langkah
            $validatedData = $request->validate([
                // Step 1: Data permohonan
                'jenisPermohonan' => 'required|string|max:255',
                'jenisIzin' => 'required|integer',
                'nomorPermohonan' => 'required|string|max:255',

                // Step 2: Data GIS
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'detail_address' => 'required',
                'maps' => 'required|url',

                // Step 3: Data pemohon
                'typeRequester' => 'required|string',
                'name' => 'required|string|max:255',
                'numberIdentity' => 'required|string|max:255',
                'defaultRadio' => 'required|string|max:255',
                'birthPlace' => 'required|string|max:255',
                'telpIndividual' => 'required|string|max:255',
                'emailIndividual' => 'required|string|max:255',
                'cityDropdownIndividual' => 'required|string|max:255',
                'villageIndividual' => 'required|string|max:255',
                'identityType' => 'required|string',
                'npwp' => 'required|string|max:255',
                'job' => 'required|string|max:255',
                'dateOfBirth' => 'required|date',
                'province' => 'required|string',
                'subdistrict' => 'required|string|max:255',
                'postalIndividual' => 'required|string|max:255',
                'addressIndividual' => 'required|string|max:255',

                // // Step 4: Data dokumen
                // 'documentType' => 'string',
                // 'documentFile' => 'file|mimes:pdf,jpg,png|max:2048',

                // // Step 5: Data proyek
                // 'projectName' => 'required|string|max:255',
                // 'budget' => 'required|numeric',
                // 'location' => 'required|string|max:255',
            ]);
            // Get session data for permit type
            Log::info('Session permitTypes: ' . $premitTypes);
            DB::beginTransaction();

            // Simpan data Step 1 ke tabel `perizinan`
            $perizinan = DB::table('perizinan')
                ->insertGetId([
                    'permission_type_id' => $premitTypes,
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            Log::info('Perizinan data stored successfully.');

            $requestData = DB::table('request')
                ->insert([
                    'request_type' => $validatedData['jenisPermohonan'],
                    'request_type_id' => $validatedData['jenisIzin'],
                    'request_number_id' => $validatedData['nomorPermohonan'],
                    'perizinan_id' => $perizinan,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            Log::info('Request data stored successfully.');

            // Simpan data Step 2 ke tabel `location`
            $location = DB::table('location')
                ->insert([
                    'latitude' => $validatedData['latitude'],
                    'longitude' => $validatedData['longitude'],
                    'detail_address' => $validatedData['detail_address'],
                    'maps' => $validatedData['maps'],
                    'perizinan_id' => $perizinan,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            Log::info('Location data stored successfully.');

            // Simpan data Step 3 ke tabel `individuals` atau `business_entities`
            if ($validatedData['typeRequester'] === 'individual') {
                DB::table('individuals')->insert([
                    'identity_type' => $validatedData['identityNumber'],
                    'number_identity' => $validatedData['identityNumber'],
                    'name' => $validatedData['identityNumber'],
                    'gender' => $validatedData['identityNumber'],
                    'birthplace' => $validatedData['identityNumber'],
                    'telephone_hp' => $validatedData['identityNumber'],
                    'email' => $validatedData['identityNumber'],
                    'job' => $validatedData['identityNumber'],
                    'npwp_number' => $validatedData['identityNumber'],
                    'village' => $validatedData['identityNumber'],
                    'postal_code' => $validatedData['identityNumber'],
                    'detail_address' => $validatedData['identityNumber'],
                    'date_of_birth' => $validatedData['identityNumber'],
                    'province_id' => $validatedData['identityNumber'],
                    'city_id' => $validatedData['identityNumber'],
                    'subdistrict_id' => $validatedData['identityNumber'],
                    // 'user_id' => auth()->id(),
                    'perizinan_id' => $perizinan,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                DB::table('business_entities')->insert([
                    'identity_number' => $validatedData['identityNumber'],
                    // 'user_id' => auth()->id(),
                    'perizinan_id' => $perizinan,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Simpan data Step 4 ke tabel `documents`
            // $filePath = $request->file('documentFile')->store('documents');
            // DB::table('documents')->insert([
            //     'type' => $validatedData['documentType'],
            //     'file_path' => $filePath,
            //     'user_id' => auth()->id(),
            //     'perizinan_id' => $perizinan,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            // Simpan data Step 5 ke tabel `projects`
            // DB::table('projects')->insert([
            //     'name' => $validatedData['projectName'],
            //     'budget' => $validatedData['budget'],
            //     'location' => $validatedData['location'],
            //     'user_id' => auth()->id(),
            //     'perizinan_id' => $perizinan,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);

            DB::commit();
            log::info('Data successfully stored in the database.');
            return redirect()->route('perizinan')->with('success', 'Data berhasil disimpan dan permohonan selesai.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error storing data: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
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
