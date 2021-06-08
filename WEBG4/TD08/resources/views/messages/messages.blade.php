@extends('messages.messagesCanevas')
@section('title', 'Tous les messages')
@section('content')
    <h1>Tous les messages</h1>
    <table class="messages">
        <tr>
            <th>Date</th>
            <th>Auteur</th>
            <th>Titre</th>
        </tr>
        @foreach ($messages as $message)
            <tr>
                <td>{{$message->msg_date}}</td>
                <td>{{$message->name}}</td>
                <td><a href="messages/{{$message->id}}">{{$message->title}}</a></td>
            </tr>
        @endforeach
    </table>
@endsection
