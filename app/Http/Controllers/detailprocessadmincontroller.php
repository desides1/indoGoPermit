<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;

class detailprocessadmincontroller extends Controller
{
    /**
     * Jika hanya digunakan untuk menampilkan satu data pertama (opsional)
     */
    public function index()
    {
        $perizinan = Perizinan::with([
            'user',
            'permissionType',
            'location',
            'request',
            'individual',
            'bussinessEntity',
            'documentRequirements',
            'project',
        ])->first(); // Ambil satu data saja (misalnya preview awal)

        return view('admin.detailprocessadmin', compact('perizinan'));
    }

    /**
     * Show detail perizinan berdasarkan ID
     */
    public function show($id)
    {
        $perizinan = Perizinan::with([
            'user',
            'permissionType',
            'location',
            'request',
            'individual',
            'bussinessEntity',
            'documentRequirements',
            'project',
        ])->findOrFail($id); // Cari berdasarkan id_perizinan

        return view('admin.detailprocessadmin', compact('perizinan'));
    }
}
