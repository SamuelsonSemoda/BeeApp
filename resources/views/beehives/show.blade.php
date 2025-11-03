<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Úl – {{ $beehive->nazev }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f9f9f9; }
        h1, h2 { color: #333; }
        form, table { background: #fff; padding: 20px; border-radius: 10px; margin-bottom: 20px; }
        input, textarea, select { width: 100%; padding: 8px; margin: 8px 0; box-sizing: border-box; }
        button { padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
        button[type="submit"] { background: #4CAF50; color: white; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; vertical-align: top; }
        th { background: #f2f2f2; }
        .danger { background: red; color: white; }
        .secondary { background: #2196F3; color: white; }
        .success { color: green; }
        .inline-edit input { width: auto; display:inline-block; margin-right:6px; }
    </style>
</head>
<body>

<h1>Úl: {{ $beehive->nazev }} (č. {{ $beehive->cislo ?? '-' }})</h1>

@if(session('success'))
    <p class="success">{{ session('success') }}</p>
@endif

{{-- Editace informací o úlu --}}
<h2>Informace o úlu</h2>
<form action="{{ route('beehives.update', $beehive) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Název úlu:</label>
    <input type="text" name="nazev" value="{{ old('nazev', $beehive->nazev) }}" required>

    <label>Číslo úlu:</label>
    <input type="number" name="cislo" value="{{ old('cislo', $beehive->cislo) }}">

    <label>Počet nástavků:</label>
    <input type="number" name="pocet_nastavku" value="{{ old('pocet_nastavku', $beehive->pocet_nastavku) }}" min="0">

    <label>Poznámky:</label>
    <textarea name="poznamky" rows="3">{{ old('poznamky', $beehive->poznamky) }}</textarea>

    <button type="submit">Uložit změny</button>
</form>

<hr>

{{-- Formulář pro přidání nového záznamu --}}
<h2>Přidat nový záznam</h2>
<form action="{{ route('records.store', $beehive) }}" method="POST">
    @csrf

    <label>Datum události:</label>
    <input type="date" name="datum" required>

    <label>Typ akce:</label>
    <select name="typ_akce" required>
        <option value="">-- Vyber akci --</option>
        <option value="krmení">Krmení</option>
        <option value="léčení">Léčení</option>
        <option value="výměna matky">Výměna matky</option>
        <option value="kontrola">Kontrola</option>
        <option value="jiné">Jiné</option>
    </select>

    <label>Popis / poznámka:</label>
    <textarea name="popis" rows="3"></textarea>

    <button type="submit">Přidat záznam</button>
</form>

{{-- Seznam záznamů --}}
<h2>Historie úlu</h2>

@if($records->isEmpty())
    <p>Zatím nejsou žádné záznamy.</p>
@else
    <table>
        <thead>
        <tr>
            <th>Datum</th>
            <th>Typ akce</th>
            <th>Popis</th>
            <th style="width:380px">Akce</th>
        </tr>
        </thead>
        <tbody>
        @foreach($records as $record)
            <tr>
                <td>{{ \Carbon\Carbon::parse($record->datum)->format('d.m.Y') }}</td>
                <td>{{ $record->typ_akce }}</td>
                <td style="white-space:pre-wrap;">{{ $record->popis }}</td>
                <td>
                    {{-- Inline edit form --}}
                    <form action="{{ route('records.update', $record) }}" method="POST" style="display:flex; gap:8px; align-items:center; flex-wrap:wrap;">
                        @csrf
                        @method('PUT')
                        <input type="date" name="datum" value="{{ $record->datum->format('Y-m-d') }}">
                        <input type="text" name="typ_akce" value="{{ $record->typ_akce }}" placeholder="Typ akce">
                        <input type="text" name="popis" value="{{ $record->popis }}" placeholder="Krátký popis">
                        <button type="submit" class="secondary">Upravit</button>
                    </form>

                    {{-- Delete --}}
                    <form action="{{ route('records.destroy', $record) }}" method="POST" onsubmit="return confirm('Opravdu smazat tento záznam?')" style="margin-top:6px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="danger">Smazat</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif

<p><a href="{{ route('beehives.byStanoviste', $slug) }}">← Zpět na seznam úlů</a></p>

</body>
</html>
