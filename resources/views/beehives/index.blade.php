<main>
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <h1>Stanoviště</h1>
    @foreach($stanoviste as $s)
        <a href="{{ route('beehives.byStanoviste', $s['slug']) }}">{{ $s['nazev'] }}</a>
    @endforeach
</main>
