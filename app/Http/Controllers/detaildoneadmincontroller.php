<?php

namespace App\Http\Controllers;

use App\Models\DetailDone;
use Illuminate\Http\Request;

class detaildoneadmincontroller extends Controller
{
    // Tampilkan semua data ke halaman admin
    public function index()
    {
        $data = DetailDone::all();
        return view('admin.detaildoneadmin', compact('data'));
    }

    // Simpan data baru dari form admin
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pemohon'      => 'required|string',
            'status'            => 'required|string',
            'jenis_perizinan'   => 'required|string',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_selesai'   => 'required|date',
            'catatan'           => 'nullable|string',
            'surat_keputusan'   => 'nullable|string',
            'sertifikat_izin'   => 'nullable|string',
            'berita_acara'      => 'nullable|string',
            'dokumen_pendukung' => 'nullable|string',
        ]);

        DetailDone::create($validated);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    // Tampilkan detail berdasarkan ID
    public function show($id)
    {
        $data = DetailDone::findOrFail($id);
        return view('admin.detaildone_detail', compact('data'));
    }

    // Perbarui data dari form admin
    public function update(Request $request, $id)
    {
        $done = DetailDone::findOrFail($id);

        $validated = $request->validate([
            'nama_pemohon'      => 'sometimes|required|string',
            'status'            => 'sometimes|required|string',
            'jenis_perizinan'   => 'sometimes|required|string',
            'tanggal_pengajuan' => 'sometimes|required|date',
            'tanggal_selesai'   => 'sometimes|required|date',
            'catatan'           => 'nullable|string',
            'surat_keputusan'   => 'nullable|string',
            'sertifikat_izin'   => 'nullable|string',
            'berita_acara'      => 'nullable|string',
            'dokumen_pendukung' => 'nullable|string',
        ]);

        $done->update($validated);
        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $done = DetailDone::findOrFail($id);
        $done->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
