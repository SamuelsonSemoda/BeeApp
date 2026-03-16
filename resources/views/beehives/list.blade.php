<main>

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
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
            <th>Počet nástavků</th>
            <th>Poznámky</th>
            <th>Akce</th>
        </tr>
        @forelse($beehives as $b)
            <tr>
                <td>{{ $b->cislo }}</td>
                <td><a href="{{ route('beehives.show', $b) }}">{{ $b->nazev }}</a></td>
                <td style="font-weight: bold;text-align: center">{{ $b->pocet_nastavku }}</td>
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
</main>
