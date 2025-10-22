<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Stanoviště včel</title>
    <style>
        body { font-family: Arial; margin: 40px; background: #f7f7f7; }
        a { display: block; padding: 15px; background: white; margin-bottom: 10px; border-radius: 10px; text-decoration: none; color: #333; }
        a:hover { background: #e9f5ee; }
        h1 { margin-bottom: 20px; }
    </style>
</head>
<body>
<h1>Stanoviště</h1>
@foreach($stanoviste as $s)
    <a href="{{ route('beehives.byStanoviste', $s['slug']) }}">{{ $s['nazev'] }}</a>
@endforeach
</body>
</html>
