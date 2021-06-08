<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>@yield('title')</title>
</head>
</html>

<body>

<header>
    <img src="{{ asset('img/he2b-esi.jpg') }}" alt="logo-ESI">
    <h1>@yield('title_header')</h1>
    <nav>
        <a href="/">Home</a>
        <a href="/depots">Dépots</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    WEBG4 - WEBII - NVS
</footer>

@yield('endJS')
</body>
