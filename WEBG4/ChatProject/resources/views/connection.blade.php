@extends('canvas')
@section('title', 'Connexion au chat')
@section('title_header', 'Veuillez vous connecter pour accéder au chat.')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/connection.css') }}">
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="" method="POST">
        @CSRF
        <label for="login">Votre login</label><br>
        <input id="login" type="text" name="login" maxlength="3" minlength="3"><br>
        <button>Se connecter</button>
    </form>
@endsection
