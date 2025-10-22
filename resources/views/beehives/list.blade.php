<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Úly – {{ $slug }}</title>
    <style>
        body { font-family: Arial; margin: 40px; background: #f7f7f7; }
        form, table { background: white; padding: 20px; border-radius: 10px; }
        input, textarea { width: 100%; padding: 8px; margin: 8px 0; }
        button { background: #4CAF50; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; }
        th { background: #f2f2f2; }
        a { color: #2196F3; text-decoration: none; }
    </style>
</head>
<body>
<h1>Úly – {{ $slug }}</h1>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<form action="{{ route('beehives.store') }}" method="POST">
    @csrf
    <input type="hidden" name="stanoviste" value="{{ $slug }}">

    <label>Název úlu:</label>
    <input type="text" name="nazev" required>

    <label>Číslo úlu:</label>
    <input type="number" name="cislo">

    <label>Poznámky:</label>
    <textarea name="poznamky"></textarea>

    <button type="submit">Přidat úl</button>
</form>

<table>
    <tr>
        <th>Číslo</th>
        <th>Název</th>
        <th>Poznámky</th>
        <th>Akce</th>
    </tr>
    @forelse($beehives as $b)
        <tr>
            <td>{{ $b->cislo }}</td>
            <td><a href="{{ route('beehives.show', $b) }}">{{ $b->nazev }}</a></td>
            <td>{{ $b->poznamky }}</td>
            <td>
                <form action="{{ route('beehives.destroy', $b) }}" method="POST" onsubmit="return confirm('Smazat úl?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background:red;">Smazat</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">Zatím žádné úly.</td></tr>
    @endforelse
</table>

<p><a href="{{ route('beehives.index') }}">← Zpět na stanoviště</a></p>
</body>
</html>
