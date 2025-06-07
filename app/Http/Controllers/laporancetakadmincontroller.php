<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanCetakDokumen;
use App\Models\DataPerizinan;

class laporancetakadmincontroller extends Controller
{
    // Menampilkan data perizinan dengan status tertentu
    public function index()
    {
        $data = DataPerizinan::whereIn('status', ['Disetujui', 'Ditolak', 'Selesai'])->get();
        return view('admin.laporancetakadmin', compact('data'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('admin.laporancetakadmin_create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemohon'      => 'required|string|max:255',
            'jenis_izin'        => 'required|in:Baru,Perpanjangan,Perubahan',
            'status'            => 'required|in:Disetujui,Ditolak,Selesai',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_selesai'   => 'nullable|date|after_or_equal:tanggal_pengajuan',
        ]);

        LaporanCetakDokumen::create($request->all());

        return redirect()->route('laporancetakadmin.index')->with('success', 'Laporan berhasil ditambahkan.');
    }

    // Menampilkan detail laporan
    public function show($id)
    {
        $laporan = LaporanCetakDokumen::findOrFail($id);
        return view('admin.laporancetakadmin_show', compact('laporan'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $laporan = LaporanCetakDokumen::findOrFail($id);
        return view('admin.laporancetakadmin_edit', compact('laporan'));
    }

    // Memperbarui data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemohon'      => 'required|string|max:255',
            'jenis_izin'        => 'required|in:Baru,Perpanjangan,Perubahan',
            'status'            => 'required|in:Disetujui,Ditolak,Selesai',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_selesai'   => 'nullable|date|after_or_equal:tanggal_pengajuan',
        ]);

        $laporan = LaporanCetakDokumen::findOrFail($id);
        $laporan->update($request->all());

        return redirect()->route('laporancetakadmin.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy($id)
    {
        $laporan = LaporanCetakDokumen::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporancetakadmin.index')->with('success', 'Laporan berhasil dihapus.');
    }

    // Menyaring data berdasarkan status dan tanggal
    public function filter(Request $request)
    {
        $query = LaporanCetakDokumen::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('tanggal_pengajuan', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        $laporan = $query->get();

        return view('admin.laporancetakadmin', compact('laporan'));
    }
}
