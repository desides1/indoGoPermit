<?php

namespace App\Http\Controllers;

use App\Models\DetailDone;
use App\Models\User;
use App\Models\Perizinan;
use App\Models\PermissionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DetailDoneAdminController extends Controller
{
    public function index()
    {
        $data = DetailDone::with(['user', 'perizinan', 'permissionType'])->get();
        return view('admin.detaildoneadmin', compact('data'));
    }

    public function show($id)
    {
        // Ambil detail dengan relasi user, permissionType, dan perizinan (jika dibutuhkan)
        $detail = DetailDone::with(['user', 'permissionType', 'perizinan'])->findOrFail($id);

        // Data untuk dropdown jenis perizinan
        $permissionTypes = PermissionType::all();

        // Data untuk dropdown user (jika dibutuhkan di form edit/input)
        $users = \App\Models\User::all();

        // Data untuk dropdown perizinan (jika ingin bisa diubah)
        $perizinans = \App\Models\Perizinan::all();

        return view('admin.detaildoneadmin', compact('detail', 'permissionTypes', 'users', 'perizinans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id_user',
            'perizinan_id' => 'required|unique:detail_done,perizinan_id|exists:perizinan,id_perizinan',
            'permission_type_id' => 'required|exists:permission_type,id_permission_type',
            'tanggal_selesai' => 'required|date',
            'catatan' => 'nullable|string',

            'surat_keputusan' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'sertifikat_izin' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'berita_acara' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,zip|max:2048',
        ]);

        // File uploads
        foreach (['surat_keputusan', 'sertifikat_izin', 'berita_acara', 'dokumen_pendukung'] as $field) {
            if ($request->hasFile($field)) {
                $validated[$field] = $request->file($field)->store('public/documents');
                $validated[$field] = str_replace('public/', '', $validated[$field]);
            }
        }

        // Ambil tanggal pengajuan dari tabel perizinan
        $perizinan = Perizinan::findOrFail($validated['perizinan_id']);
        $validated['tanggal_pengajuan'] = $perizinan->created_at->format('Y-m-d');

        DetailDone::create($validated);

        return redirect()->route('detaildone.index')
            ->with('success', 'Data perizinan berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $detail = DetailDone::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id_user',
            'perizinan_id' => 'required|exists:perizinan,id_perizinan',
            'permission_type_id' => 'required|exists:permission_type,id_permission_type',
            'tanggal_selesai' => 'required|date',
            'catatan' => 'nullable|string',

            'surat_keputusan' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'sertifikat_izin' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'berita_acara' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            'dokumen_pendukung' => 'nullable|file|mimes:pdf,zip|max:2048',
        ]);

        foreach (['surat_keputusan', 'sertifikat_izin', 'berita_acara', 'dokumen_pendukung'] as $field) {
            if ($request->hasFile($field)) {
                if ($detail->$field) {
                    Storage::delete('public/' . $detail->$field);
                }
                $validated[$field] = $request->file($field)->store('public/documents');
                $validated[$field] = str_replace('public/', '', $validated[$field]);
            } else {
                $validated[$field] = $detail->$field;
            }
        }

        $perizinan = Perizinan::findOrFail($validated['perizinan_id']);
        $validated['tanggal_pengajuan'] = $perizinan->created_at->format('Y-m-d');

        $detail->update($validated);

        return redirect()->route('detaildone.index')
            ->with('success', 'Data perizinan berhasil diperbarui.');
    }
}
