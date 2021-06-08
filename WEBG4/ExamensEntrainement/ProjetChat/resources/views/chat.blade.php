@extends('canvas')

@section('content')
    <h1>Voici mon chat</h1>
    <style>
        .name {
            margin-bottom: -1em;
            font-weight: bold;
            background: #c0ccdc;
            padding: .3em;
        }

        .content {
            padding: .3em;
        }

        textarea {
            padding: 1em;
            width: 50%;
            height: 100px;
        }

        button {
            transition: all .3s;
            vertical-align: top;
            padding: 1em;
            border: 1px solid black;
            background: transparent;
            cursor: pointer;
        }

        button:hover {
            transition: all .3s;
            background: #93a9d0;
        }

        .error {
            background: #ea6f6f;
            padding: 1em;
            color: white;
        }
    </style>

    <div id="messages"></div>

    <form id="addMsg">
        @CSRF
        <input type="hidden" name="login" value="{{ $_COOKIE["pseudo"] }}">
        <textarea id="content" name="content"></textarea>
        <button id="btn">Envoyer</button>
    </form>

    <script>

        function loadMsg() {
            $.getJSON("/api/channels/{{ $idRoom }}/messages", function (data, status) {
                $("#messages").empty();
                data.forEach(e => {
                    $("#messages").append($("<div>")
                        .append($("<p class='name'>").text(e.displayName))
                        .append($("<p class='content'>").text(e.content)));
                })
            })
        }

        $('#addMsg').submit(function (e) {
            e.preventDefault();
            $(".error").remove();

            $.post('/api/channels/{{ $idRoom }}/messages',
                $(this).serialize(),
                function (data) {
                    $("#content").val("");
                    let obj = JSON.parse(data);
                    $("#messages").append($("<div>")
                        .append($("<p class='name'>").text(obj.login))
                        .append($("<p class='content'>").text(obj.content)));
                }, 'text'
            ).fail(function () {
                $(".error").remove();
                $("#addMsg").append("<div class='error'>Erreur, veuillez réessayer !</div>")
            });
        });

        loadMsg();
        window.setInterval(loadMsg, 5000);

    </script>
@endsection
