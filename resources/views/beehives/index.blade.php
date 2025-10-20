<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Správa Beehives</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f7f7f7; }
        form, table { background: #fff; padding: 20px; border-radius: 10px; }
        input, textarea { width: 100%; padding: 8px; margin: 8px 0; }
        button { padding: 10px; background: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
<h1>Správa Úlů</h1>

@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form action="{{ route('beehives.store') }}" method="POST">
    @csrf
    <label>Název úlu:</label>
    <input type="text" name="nazev" required>

    <label>Poznámky:</label>
    <textarea name="poznamky" rows="4"></textarea>

    <button type="submit">Přidat úl</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Název</th>
        <th>Poznámky</th>
        <th>Datum vytvoření</th>
        <th>Akce</th>
    </tr>
    @forelse ($beehives as $beehive)
        <tr>
            <td>{{ $beehive->id }}</td>
            <td>{{ $beehive->nazev }}</td>
            <td>{{ $beehive->poznamky }}</td>
            <td>{{ $beehive->created_at->format('d.m.Y H:i') }}</td>
            <td>
                <form action="{{ route('beehives.destroy', $beehive) }}" method="POST" onsubmit="return confirm('Opravdu smazat?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="background:red;">Smazat</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">Zatím žádné úly.</td></tr>
    @endforelse
</table>
</body>
</html>
