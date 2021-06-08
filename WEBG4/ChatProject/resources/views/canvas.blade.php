<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="{{ asset('img/favicon/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    @yield('css')
    <title>@yield('title')</title>
</head>
</html>

<body>

<header>
    @auth
        <h1><a href="/channels">@yield('title_header')</a></h1>
        <a href="/logout">
            <button>Déconnexion</button>
        </a>
    @endauth

    @guest
        <h1>@yield('title_header')</h1>
    @endguest
</header>

<main>
    @yield('content')
</main>

</body>
