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
use App\Models\Requirement;
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
            'requirements' => Requirement::select('id_requirement', 'name')->get(),

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
                'typeRequester' => 'required|string|max:255|in:individual,business',
                'identity_type' => 'required|string|max:255|in:KTP,SIM,Passport',
                'number_identity' => 'required|string|max:50',
                'name' => 'required|string|max:255',
                'gender' => 'required|string|max:10|in:Laki-laki,Perempuan',
                'birthplace' => 'required|string|max:255',
                'telpIndividual' => 'required|string|max:15',
                'emailIndividual' => 'required|string|max:255',
                'job' => 'required|string|max:25',
                'npwp_number' => 'required|string|max:50',
                'villageIndividual' => 'required|string|max:255',
                'postalIndividual' => 'required|string|max:10',
                'date_of_birth' => 'required|date_format:Y-m-d',
                'subdistrict' => 'required|string|max:255',
                'addressIndividual' => 'required|string|max:255',

                // Step 4: Data dokumen
                // 'documentType' => 'string',
                // 'documentFile' => 'file|mimes:pdf,jpg,png|max:2048',

                // Step 5: Data proyek
                'project_type' => 'required|string|max:255|in:PMA,PMDN,Non Fasilitas',
                'investment_value' => 'required|numeric',
                'target_pad' => 'required|numeric',
                'total_employee' => 'required|integer',
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
                DB::table('individual')->insert([
                    'identity_type' => $validatedData['identity_type'],
                    'number_identity' => $validatedData['number_identity'],
                    'name' => $validatedData['name'],
                    'gender' => $validatedData['gender'],
                    'birthplace' => $validatedData['birthplace'],
                    'telephone_hp' => $validatedData['telpIndividual'],
                    'email' => $validatedData['emailIndividual'],
                    'job' => $validatedData['job'],
                    'npwp_number' => $validatedData['npwp_number'],
                    'village' => $validatedData['villageIndividual'],
                    'postal_code' => $validatedData['postalIndividual'],
                    'date_of_birth' => $validatedData['date_of_birth'],
                    'province_id' => $request->input('province'),
                    'city_id' => $request->input('cityDropdownIndividual'),
                    'subdistrict' => $validatedData['subdistrict'],
                    'detail_address' => $validatedData['addressIndividual'],
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

            Log::info('Individual or Business Entity data stored successfully.');


            // dd($request->input('requirement_ids'));
            // Simpan data Step 4 ke tabel `documents`

            // pan pan
            // foreach ($request->file('files', []) as $requirementId => $file) {
            //     $filePath = $file->store('public/pdfs');

            //     $input = $request->input("data.$requirementId", []);

            //     DB::table('document_requirements')->insert([
            //         'document_requirement_id'  => $requirementId,
            //         'document_number' => $input['number'] ?? null,
            //         'start_date'      => $input['start_date'] ?? null,
            //         'valid_until'     => isset($input['no_expiry']) ? null : ($input['end_date'] ?? null),
            //         'no_expiry'      => isset($input['no_expiry']),
            //         'status'          => isset($input['fulfilled']),
            //         'file_path'       => $filePath,
            //         'perizinan_id'    => $perizinan, // pastikan variabel ini disiapkan
            //         'created_at'      => now(),
            //         'updated_at'      => now(),
            //     ]);
            // }

            foreach ($request->file('files', []) as $requirementId => $file) {
                // Pastikan file ada dan valid
                if (!$file || !$file->isValid()) {
                    continue;
                }

                // Simpan file ke storage dan dapatkan path-nya
                $filePath = $file->store('public/pdfs');

                // Ambil input lain berdasarkan ID requirement
                $input = $request->input("data.$requirementId", []);

                DB::table('document_requirements')->insert([
                    'document_requirement_id' => $requirementId,
                    'document_number'         => $input['number'] ?? null,
                    'valid_until'             => isset($input['no_expiry']) ? null : ($input['end_date'] ?? null),
                    'no_expiry'               => isset($input['no_expiry']),
                    'status'                  => isset($input['fulfilled']),
                    'file_path'               => $filePath,
                    'perizinan_id'            => $perizinan, // variabel ini pastikan sudah diisi
                    'created_at'              => now(),
                    'updated_at'              => now(),
                ]);
            }



            // foreach ($request->input('requirement_ids', []) as $name => $requirementId) {
            //     // $fileInputName = $name . '_file';
            //     $fileInputName = 'file_' . $requirementId;
            //     $validatedData['documentType'] = $request->input($name . '_documentType');


            //     if ($request->hasFile($fileInputName)) {
            //         $file = $request->file($fileInputName);
            //         $filePath = $file->store('public/pdfs');
            //         // $filePath = $request->file('documentFile')->store('public/pdfs');
            //         $documents = DB::table('document_requirements')->insert([
            //             'document_number' => $validatedData['documentType'],
            //             'valid_until' => $validatedData['validUntil'],
            //             'no_expired' => $validatedData['noExpired'],
            //             'status' => $validatedData['status'],
            //             'file_path' => $filePath,
            //             'requirement_id' => $requirementId,
            //             // 'user_id' => auth()->id(),
            //             'perizinan_id' => $perizinan,
            //             'created_at' => now(),
            //             'updated_at' => now(),
            //         ]);
            //     }
            // }


            Log::info('Document Requirements data stored successfully.');

            // Simpan data Step 5 ke tabel `projects`
            $project =  DB::table('project')->insert([
                'project_type' => $validatedData['project_type'],
                'investment_value' => $validatedData['investment_value'],
                'target_pad' => $validatedData['target_pad'],
                'total_employee' => $validatedData['total_employee'],
                'perizinan_id' => $perizinan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Log::info('Project data stored successfully.');

            DB::commit();
            log::info('Data successfully stored in the database.');
            return redirect()->route('perizinan')->with('success', 'Data berhasil disimpan dan permohonan selesai.');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error storing data: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
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
