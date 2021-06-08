@extends('canvas')
@section('title', 'Utilisation du chat')
@section('title_header', 'Bienvenue dans le chat ' . e(Auth::user()->displayName) . ' !')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chat.css') }}">
@endsection

@section('content')
    <h2></h2>

    <div id="chat">
        <div class="read">
            <div class="lateral"></div>
            <div class="messages"></div>
        </div>

        <div class="alert"></div>

        <div class="write">
            <form id="addMessage" action="/api/channels/{{ $chatRoomId }}/messages" method="POST">
                @CSRF
                <input type="hidden" name="login" value="{{ Auth::user()->login }}">
                <textarea maxlength="2000" minlength="5" name="content" placeholder="Écrivez un message..."></textarea>
                <button>Envoyer</button>
            </form>
        </div>
    </div>
@endsection

<script>
    function getRoomId() {
        return {{ $chatRoomId }};
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script defer src="{{ asset('js/chat.js') }}"></script>
