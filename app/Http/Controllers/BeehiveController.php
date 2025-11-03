<?php

namespace App\Http\Controllers;

use App\Models\Beehive;
use Illuminate\Http\Request;

class BeehiveController extends Controller
{
    // Načtení stanovišť ze složky /stanoviste (JSON)
    public function index()
    {
        $path = storage_path('app/stanoviste');
        $files = glob($path . '/*.json');

        $stanoviste = [];

        foreach ($files as $file) {
            $data = json_decode(file_get_contents($file), true);
            if ($data) {
                $stanoviste[] = [
                    'nazev' => $data['nazev'] ?? basename($file, '.json'),
                    'slug' => basename($file, '.json'),
                ];
            }
        }

        return view('beehives.index', compact('stanoviste'));
    }

    // Úly pro konkrétní stanoviště
    public function byStanoviste($slug)
    {
        // Ověření, že složka existuje
        $path = storage_path("app/stanoviste/{$slug}.json");
        if (!file_exists($path)) {
            abort(404, "Stanoviště {$slug} nebylo nalezeno.");
        }

        $beehives = Beehive::where('stanoviste', $slug)->orderBy('cislo')->get();
        return view('beehives.list', compact('beehives', 'slug'));
    }

    // Uložení nového úlu
    public function store(Request $request)
    {
        $request->validate([
            'nazev' => 'required|string|max:100',
            'stanoviste' => 'required|string',
            'cislo' => 'nullable|integer',
            'poznamky' => 'nullable|string',
        ]);

        Beehive::create($request->only('nazev', 'stanoviste', 'cislo', 'poznamky'));

        return back()->with('success', 'Úl byl přidán.');
    }

    // Detail úlu
    public function show(Beehive $beehive)
    {
        $records = $beehive->records()->orderBy('datum', 'desc')->get();
        $slug = $beehive->stanoviste; // pro návrat zpět na správné stanoviště
        return view('beehives.show', compact('beehive', 'records', 'slug'));
    }

    // Úprava úlu
    public function update(Request $request, Beehive $beehive)
    {
        $request->validate([
            'nazev' => 'required|string|max:100',
            'cislo' => 'nullable|integer',
            'pocet_nastavku' => 'nullable|integer',
            'poznamky' => 'nullable|string',
        ]);

        $beehive->update($request->all());
        return back()->with('success', 'Úl byl upraven.');
    }

    // Smazání úlu
    public function destroy(Beehive $beehive)
    {
        $beehive->delete();
        return back()->with('success', 'Úl byl smazán.');
    }
}
