<main>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <h1>{{ $location->nazev }}</h1>

    <form action="{{ route('locations.destroy', $location) }}" method="POST" onsubmit="return confirm('Opravdu smazat celé stanoviště?')">
        @csrf
        @method('DELETE')

        <button type="submit">
            Smazat stanoviště
        </button>

    </form>

    <form action="{{ route('beehives.store') }}" method="POST">

        @csrf

        <input type="hidden" name="location_id" value="{{ $location->id }}">

        <label>Název úlu</label>
        <input type="text" name="nazev">

        <label>Číslo</label>
        <input type="number" name="cislo">

        <button type="submit">Přidat úl</button>

    </form>

    <hr>

    @foreach($beehives as $beehive)
        <div>

            <a href="{{ route('beehives.show',$beehive) }}">
                Úl {{ $beehive->cislo }} - {{ $beehive->nazev }}
            </a>

            <form action="{{ route('beehives.destroy',$beehive) }}" method="POST" style="display:inline;" onsubmit="return confirm('Smazat úl?')">

                @csrf
                @method('DELETE')

                <button type="submit" style="background:red;color:white;border:none;padding:4px 8px;border-radius:4px;">
                    Smazat
                </button>

            </form>

        </div>
    @endforeach

    <p>
        <a href="{{ route('locations.index') }}">
            ← Zpět na seznam stanovišť
        </a>
    </p>
</main>
