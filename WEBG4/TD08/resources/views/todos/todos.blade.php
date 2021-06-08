@extends('todos.canevas')
@section('title', 'TODO')
@section('content')
    <h1>À faire...</h1>
    @if (count($todos) === 0)
        <p>Rien pour le moment ;)</p>
    @else
        <ul>
            @foreach ($todos as $todo)
                <li><a href="/todos/{{$todo->id}}">{{$todo->name}}</a></li>
            @endforeach
        </ul>
    @endif
    @foreach($errors->all() as $error)
        <div class="alert error">{{ $error }}</div>
    @endforeach
    @if(session()->has('message'))
        <div class="alert success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form action="{{ url('todos') }}" method="POST">
        @csrf
        <label>
            <input type="text" value="{{ old('tache') }}" name="tache" placeholder="Nom de la tâche">
        </label>
        <label>
            <input type="text" value="{{ old('description') }}" name="description"
                   placeholder="Description de la tâche">
        </label>
        <button type="submit">Envoyer</button>
    </form>
@endsection
