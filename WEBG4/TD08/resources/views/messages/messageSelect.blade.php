@extends('messages.messagesCanevas')
@section('title', e($message->title))
@section('content')
    <h1>{{$message->title}}</h1>
    <p>{{$message->content}}</p>
    <a href="/messages">Retour en arrière</a>
@endsection
