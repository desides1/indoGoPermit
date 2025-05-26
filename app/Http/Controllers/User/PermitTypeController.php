<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PermitType;

class PermitTypeController extends Controller
{
    public function index()
    {
        //
    }

    public function show()
    {
        //
    }

    public function create(Request $request)
    {
        $validateRequest = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        PermitType::create($validateRequest);

        return $validateRequest;
    }
}
