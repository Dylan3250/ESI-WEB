@extends('todos.canevas')
@section('title', e($todo->name))
@section('content')
    <h1>Tâche : {{$todo->name}}</h1>
    <p>{{$todo->description}}</p>
    <a href="/todos">Retourner au menu</a>
@endsection
