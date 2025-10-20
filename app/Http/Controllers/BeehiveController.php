<?php

namespace App\Http\Controllers;

use App\Models\Beehive;
use Illuminate\Http\Request;

class BeehiveController extends Controller
{
    public function index()
    {
        $beehives = Beehive::orderBy('id')->get();
        return view('beehives.index', compact('beehives'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nazev' => 'required|string|max:100',
            'poznamky' => 'nullable|string',
        ]);

        Beehive::create($request->only('nazev', 'poznamky'));

        return redirect()->route('beehives.index')->with('success', 'Beehive byl přidán.');
    }

    public function destroy(Beehive $beehive)
    {
        $beehive->delete();
        return redirect()->route('beehives.index')->with('success', 'Beehive byl smazán.');
    }
}

