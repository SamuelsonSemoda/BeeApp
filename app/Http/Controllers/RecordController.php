<?php

namespace App\Http\Controllers;

use App\Models\Beehive;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function store(Request $request, Beehive $beehive)
    {
        $request->validate([
            'datum' => 'required|date',
            'typ_akce' => 'required|string|max:100',
            'popis' => 'nullable|string',
        ]);

        $beehive->records()->create($request->only('datum', 'typ_akce', 'popis'));
        return back()->with('success', 'Záznam byl přidán.');
    }

    public function update(Request $request, Record $record)
    {
        $request->validate([
            'datum' => 'required|date',
            'typ_akce' => 'required|string|max:100',
            'popis' => 'nullable|string',
        ]);

        $record->update($request->all());
        return back()->with('success', 'Záznam byl upraven.');
    }

    public function destroy(Record $record)
    {
        $record->delete();
        return back()->with('success', 'Záznam byl smazán.');
    }
}
