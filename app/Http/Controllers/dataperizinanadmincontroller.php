<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perizinan;

class DataPerizinanAdminController extends Controller
{
    public function index()
    {
        $dataPerizinan = Perizinan::with([
            'user', 'permissionType', 'location', 'request',
            'individual', 'bussinessEntity', 'documentRequirements', 'project'
        ])->get();

        $firstWaiting = Perizinan::first();
        $idWaiting = $firstWaiting ? $firstWaiting->id_perizinan : null;

        return view('_admin.dataperizinanadmin', compact('dataPerizinan', 'idWaiting'));
    }

    public function create()
    {
        return view('_admin.tambahperizinan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id_user',
            'permission_type_id' => 'required|exists:permission_type,id_permission_type',
            'location_id_location' => 'required|exists:location,id_location',
            'request_id_request' => 'required|exists:request,id_request',
            'individual_id_individual' => 'nullable|exists:individual,id_individual',
            'bussiness_entity_id_bussiness_entity' => 'nullable|exists:bussiness_entity,id_bussiness_entity',
            'document_requirements_id_document_requirements' => 'required|exists:document_requirements,id_document_requirements',
            'project_id_project' => 'required|exists:project,id_project',
        ]);

        Perizinan::create($request->all());

        return redirect()->route('dataperizinanadmin.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $data = Perizinan::with([
            'user', 'permissionType', 'location', 'request',
            'individual', 'bussinessEntity', 'documentRequirements', 'project'
        ])->findOrFail($id);

        return view('_admin.detailperizinan', compact('data'));
    }

    public function edit($id)
    {
        $data = Perizinan::findOrFail($id);
        return view('_admin.editperizinan', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id_user',
            'permission_type_id' => 'required|exists:permission_type,id_permission_type',
            'location_id_location' => 'required|exists:location,id_location',
            'request_id_request' => 'required|exists:request,id_request',
            'individual_id_individual' => 'nullable|exists:individual,id_individual',
            'bussiness_entity_id_bussiness_entity' => 'nullable|exists:bussiness_entity,id_bussiness_entity',
            'document_requirements_id_document_requirements' => 'required|exists:document_requirements,id_document_requirements',
            'project_id_project' => 'required|exists:project,id_project',
        ]);

        $data = Perizinan::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('dataperizinanadmin.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Perizinan::findOrFail($id);
        $data->delete();

        return redirect()->route('dataperizinanadmin.index')->with('success', 'Data berhasil dihapus.');
    }

    public function showDiterima($id)
    {
        $data = Perizinan::with([
            'user',
            'request',
            'permissionType',
            'location',
            'individual',
            'bussinessEntity',
            'documentRequirements.documents',
            'project'
        ])->findOrFail($id);

        return view('_admin.detailditerimaadmin', compact('data'));
    }
}
