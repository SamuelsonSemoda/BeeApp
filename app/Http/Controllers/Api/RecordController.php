<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index($id)
    {
        return response()->json(
            Record::where('beehive_id', $id)
                ->orderBy('datum', 'desc')
                ->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'beehive_id' => 'required|exists:beehives,id',
            'datum' => 'required|date',
            'typ_akce' => 'required',
            'popis' => 'nullable'
        ]);

        $record = Record::create($data);

        return response()->json($record);
    }

    public function update(Request $request, Record $record)
    {
        $data = $request->validate([
            'datum' => 'required|date',
            'typ_akce' => 'required',
            'popis' => 'nullable'
        ]);

        $record->update($data);

        return response()->json($record);
    }

    public function destroy(Record $record)
    {
        $record->delete();

        return response()->json(['success' => true]);
    }
}
