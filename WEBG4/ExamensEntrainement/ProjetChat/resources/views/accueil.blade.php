@extends('canvas')

@section('content')
    <style>
        a {
            display: block;
        }
    </style>
    <h1>Test</h1>

    <div id="channels"></div>

    <form action="/login" method="post">
        @CSRF
        <select name="login">
            @foreach($users as $user)
            <option value="{{ $user->login }}">{{ $user->displayName }}</option>
            @endforeach
        </select>

        <button>Se connecter</button>
    </form>

    @if(isset($_COOKIE["pseudo"]))
    <script>
        $.getJSON("/api/channels/", function (data, status) {

            data.forEach(e => {
                $("#channels").append("<a href='/chat/" + e.id + "'>" + e.name + "</a>");
            })
        })
    </script>
    @endif
@endsection
