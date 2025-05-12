<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailValidasiAdminController extends Controller

{
    public function index()
    {
        return view('admin.detailvalidasiadmin');
    }
}
