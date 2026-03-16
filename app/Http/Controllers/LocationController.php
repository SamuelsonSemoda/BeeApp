<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy('nazev')->get();

        return view('locations.index', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazev' => 'required|max:100',
            'lokace' => 'nullable|max:255',
            'poznamky' => 'nullable'
        ]);

        Location::create($request->all());

        return back()->with('success','Stanoviště vytvořeno');
    }

    public function show(Location $location)
    {
        $beehives = $location->beehives()->orderBy('cislo')->get();

        return view('locations.show', compact('location','beehives'));
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('locations.index')
            ->with('success','Stanoviště bylo smazáno');
    }
}
