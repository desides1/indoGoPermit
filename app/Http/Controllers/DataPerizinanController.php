<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use Illuminate\Http\Request;

class DataPerizinanController extends Controller
{
    // Menampilkan semua data dengan relasi
    public function index()
    {
        $dataPerizinan = Perizinan::with(['user', 'permissionType', 'request'])->get();
        return view('admin.dataperizinanadmin', compact('dataPerizinan'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('admin.tambahperizinan'); // pastikan view ini ada
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'foto_pemohon' => 'required|string',
            'nama_pemohon' => 'required|string|max:255',
            'jenis_perizinan' => 'required|string',
            'status' => 'required|in:waiting,process,accepted,rejected,done',
            'tanggal_pengajuan' => 'required|date',
            'file_dokumen' => 'nullable|string',
        ]);

        Perizinan::create($request->all());

        return redirect()->route('dataperizinan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Menampilkan detail data
    public function show($id)
    {
        $data = Perizinan::with(['user', 'permissionType', 'request'])->findOrFail($id);
        return view('admin.detailperizinan', compact('data')); // pastikan view ini ada
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $data = Perizinan::findOrFail($id);
        return view('admin.editperizinan', compact('data')); // pastikan view ini ada
    }

    // Mengupdate data
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto_pemohon' => 'required|string',
            'nama_pemohon' => 'required|string|max:255',
            'jenis_perizinan' => 'required|string',
            'status' => 'required|in:waiting,process,accepted,rejected,done',
            'tanggal_pengajuan' => 'required|date',
            'file_dokumen' => 'nullable|string',
        ]);

        $data = Perizinan::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('dataperizinan.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy($id)
    {
        $data = Perizinan::findOrFail($id);
        $data->delete();

        return redirect()->route('dataperizinan.index')->with('success', 'Data berhasil dihapus.');
    }
}
