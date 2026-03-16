<?php

namespace App\Http\Controllers;

use App\Models\Beehive;
use Illuminate\Http\Request;

class BeehiveController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'location_id' => 'required|exists:locations,id',
            'nazev' => 'required|max:100',
            'cislo' => 'nullable|integer'
        ]);

        Beehive::create($request->all());

        return back()->with('success','Úl přidán');
    }

    public function show(Beehive $beehive)
    {
        $records = $beehive->records()->orderByDesc('datum')->get();

        return view('beehives.show', compact('beehive','records'));
    }

    public function update(Request $request, Beehive $beehive)
    {
        $beehive->update($request->all());

        return back()->with('success','Úl upraven');
    }

    public function destroy(Beehive $beehive)
    {
        $beehive->delete();

        return back()->with('success','Úl smazán');
    }
}
