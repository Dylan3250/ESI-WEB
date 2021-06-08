@extends('canvas')
@section('title', 'Liste des séances')
@section('title_header', 'Liste des séances')

@section('content')
    <table>
        <tr>
            <th>Date</th>
            <th>Heure</th>
            <th>Film</th>
            <th>Salle</th>
            <th>Capacité</th>
            <th>Billeterie</th>
        </tr>
        @foreach($arrayFormatted as $seance)
            <tr>
                <td>{{ $seance["date"] }}</td>
                <td>{{ $seance["hour"] }}</td>
                <td class="titleFilm" data-id="{{ $seance["idShow"] }}">{{ $seance["title"] }}</td>
                <td>{{ $seance["idRoom"] }}</td>
                <td>{{ $seance["dispoPlace"] }}</td>
                <td>
                    <form action="/seance/buyTicket" method="POST">
                        @CSRF
                        <input type="hidden" name="id" value="{{ $seance["idShow"] }}">
                        <input type="number" name="nbTicket">
                        <button>Acheter</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <aside id="asideFilm">
        <div id="asideTitle"></div>
        <div id="asideSynopsis"></div>
        <div id="asideRating"></div>
    </aside>

    <script>
        $(".titleFilm").on("click", function () {
            $.getJSON("/api/seance/film/" + $(this).attr("data-id"), (data) => {
                $("#asideTitle").text(data.title);
                $("#asideSynopsis").text(data.synopsis);
                $("#asideRating").text(data.rating);
            })
        });
    </script>
@endsection
