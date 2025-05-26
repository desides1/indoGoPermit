<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DataPerizinan;
// use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Http\Requests\{
    Step1Request,
    Step2GisRequest,
    Step3UploadDokumenRequest,
    Step4ProyekRequest
};

class DataPerizinanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.berandaDataPerizinan');
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DataPerizinan $dataPerizinan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPerizinan $dataPerizinan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPerizinan $dataPerizinan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPerizinan $dataPerizinan)
    {
        //
    }
}
