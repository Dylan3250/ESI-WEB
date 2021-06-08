@extends('canvas')
@section('title', 'Accueil')
@section('title_header', "Bienvenue dans l'accueil")

@section('content')
    <select id="usersPae">
        <option value="undefined">Veuillez choisir un utilisateur</option>
        @foreach($students as $student)
            <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->sumCredits }} crédits</option>
        @endforeach
    </select>

    <table id="pae"></table>

    <script>
        function addClick() {
            $("tr").on("click", function () {
                const saveThis = $(this);
                $.getJSON("/api/pae/student/" + $(this).attr("data-id") + "/delete", () => {
                    saveThis.remove();
                    reloadSelect();
                })
            })
        }

        function reloadSelect() {
            $.getJSON("/api/pae/students", (data) => {
                $("#usersPae").empty();
                $("#usersPae").append($('<option>', {
                    value: "undefined",
                    text: 'Veuillez choisir un utilisateur'
                }))
                data.forEach(e => {
                    $("#usersPae").append($('<option>', {
                        value: e.id,
                        text: e.name + " - " + e.sumCredits + " crédits"
                    }))
                })
            })
        }

        $('#usersPae').on('change', function () {
            $.getJSON("/api/pae/student/" + this.value, (data) => {
                $("#pae").empty()
                $("#pae").append($("<tr>")
                    .append($("<th>").text("Sige"))
                    .append($("<th>").text("Titre"))
                    .append($("<th>").text("Crédit")))

                data.forEach(e => {
                    $("#pae").append($("<tr>").attr("data-id", e.progId)
                        .append($("<td>").text(e.courseId))
                        .append($("<td>").text(e.title))
                        .append($("<td>").text(e.credits)))
                })
                addClick();
            })
        })
    </script>
@endsection
