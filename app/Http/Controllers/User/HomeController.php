<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Perizinan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diproses = Perizinan::where('status', 'diproses')->count();
        $disetujui = Perizinan::where('status', 'disetujui')->count();
        $ditolak   = Perizinan::where('status', 'ditolak')->count();
        return view('user.home', compact('diproses', 'disetujui', 'ditolak'));
    }
}
