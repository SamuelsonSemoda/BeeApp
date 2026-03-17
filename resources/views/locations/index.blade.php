<main>
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <h1>Stanoviště</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('locations.store') }}" method="POST">
        @csrf

        <label>Název:</label>
        <input type="text" name="nazev" required>

        <label>Lokace:</label>
        <input type="text" name="lokace">

        <label>Poznámky:</label>
        <textarea name="poznamky"></textarea>

        <button type="submit">Přidat stanoviště</button>

    </form>

    <hr>

    @foreach($locations as $location)

        <li>
            <a href="{{ route('locations.show',$location) }}">
                {{ $location->nazev }}
            </a>
        </li>

    @endforeach
</main>
