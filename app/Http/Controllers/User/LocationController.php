<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $locations = location::all();

        // return view('user.formPerizinan.formStepper.stepGisPermit', compact('locations'));
        return view('user.formPerizinan.formStepper', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required|string|max:255',
        ]);

        location::create($request->all());

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(location $location)
    {
        return view('user.formPerizinan.formStepper.editGis', compact('locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, location $location)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'address' => 'required|string|max:255',
        ]);
        $location->update($request->all());
        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(location $location)
    {
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
