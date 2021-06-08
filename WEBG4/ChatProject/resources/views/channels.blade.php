@extends('canvas')
@section('title', 'Utilisation du chat')
@section('title_header', 'Bienvenue dans le chat ' . Auth::user()->displayName . ' !')


@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/channel.css') }}">
@endsection

@section('content')
    @foreach($channels as $channel)
        <a href="/chat/{{ $channel->id }}">
            <div class="channel">{{ $channel->name  }} - {{ $channel->topic }}</div>
        </a>
    @endforeach
@endsection
