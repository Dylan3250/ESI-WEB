<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>
<body>
<header>
    <img id="logo" src="{{asset('img/he2b-esi.jpg')}}" alt="HE2B-ESI">
    <h1>@yield('title')</h1>
</header>
<main>
    @yield('content')
</main>
<footer>WEBG4 - WEBII - MCD</footer>
</body>
</html>
