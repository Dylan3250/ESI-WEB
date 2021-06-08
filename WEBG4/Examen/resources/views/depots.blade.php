@extends('canvas')
@section('title', 'Accueil')
@section('title_header', "WEB II - Gestion des commits")

@section('content')
    <h2>Tous les dépots</h2>

    <table>
        <tr>
            <th>Nom du dépot</th>
            <th>Nom de l'utilisateur</th>
            <th>Nombre de commits</th>
        </tr>
        @foreach($repositories as $repo)
            <tr>
                <td class="titleRepo" data-id="{{ $repo->id }}">{{ $repo->repoName }}</td>
                <td>{{ $repo->userName }}</td>
                <td>{{ $repo->nbCommit }}</td>
            </tr>
        @endforeach
    </table>

    <div id="infoDepot"></div>
@endsection

@section('endJS')
    <script src="{{ asset('js/depots.js') }}"></script>
@endsection
