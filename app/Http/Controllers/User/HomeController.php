<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Perizinan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Menampilkan semua data dengan relasi
    public function index()
    {
<<<<<<< HEAD
        $diproses = Perizinan::where('status', 'diproses')->count();
        $disetujui = Perizinan::where('status', 'disetujui')->count();
        $ditolak   = Perizinan::where('status', 'ditolak')->count();
        return view('user.home', compact('diproses', 'disetujui', 'ditolak'));
=======
        // dd(session()->all());
        return view('user.home');
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Perizinan::with(['user', 'permissionType', 'request'])->findOrFail($id);
        return view('admin.detailperizinan', compact('data')); // pastikan view ini ada
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Perizinan::findOrFail($id);
        return view('admin.editperizinan', compact('data')); // pastikan view ini ada
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Perizinan::findOrFail($id);
        $data->delete();

        return redirect()->route('dataperizinan.index')->with('success', 'Data berhasil dihapus.');
>>>>>>> eebe5a5de008d87e9c727f456db4c2b112436734
    }
}
