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
    <h1>@yield('title_header')</h1>
</header>

<main>
    @yield('content')
</main>

</body>
