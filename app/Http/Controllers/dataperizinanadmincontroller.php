<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perizinan;

class dataperizinanadmincontroller extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $dataPerizinan = Perizinan::all();
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

        return redirect()->route('dataperizinanadmin.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Menampilkan detail data
    public function show($id)
    {
        $data = Perizinan::findOrFail($id);
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

        return redirect()->route('dataperizinanadmin.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy($id)
    {
        $data = Perizinan::findOrFail($id);
        $data->delete();

        return redirect()->route('dataperizinanadmin.index')->with('success', 'Data berhasil dihapus.');
    }
}
