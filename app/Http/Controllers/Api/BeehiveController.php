<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Beehive;
use Illuminate\Http\Request;

class BeehiveController extends Controller
{
    public function byLocation($id)
    {
        return response()->json(
            Beehive::where('location_id', $id)
                ->orderBy('cislo')
                ->get()
        );
    }

    public function show($id)
    {
        return response()->json(
            Beehive::with('records')->findOrFail($id)
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'nazev' => 'required',
            'cislo' => 'required|integer',
            'pocet_nastavku' => 'nullable|integer',
            'poznamky' => 'nullable'
        ]);

        $beehive = Beehive::create($data);

        return response()->json($beehive);
    }

    public function destroy(Beehive $beehive)
    {
        $beehive->delete();

        return response()->json(['success' => true]);
    }
}
