<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exercice01</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        td, tr {
            padding: 1em;
            border: 1px solid #64b6f5;
        }
    </style>
</head>
<body>
<form action="Exercice01Traitement.php" method="post">
    <label for="group">Groupe [C111/C112]</label>
    <input type="text" placeholder="Groupe" required name="group" id="group">
    <input type="submit" id="sendGroup" value="Envoyer">
</form>

<table id="answer"></table>

<script>
    $(document).ready(function () {
        $("#sendGroup").click(function (e) {
            e.preventDefault();
            $.post("Exercice01Traitement.php", {group: $("#group").val()}, function (data, status) {
                $("#answer").empty();
                let parsed = JSON.parse(data);
                let row;
                parsed.forEach(ln => {
                    row = $("<tr>");
                    ln.forEach(col => {
                        //row.append($("<td>").append(col));
                        $("<td>").text(col).appendTo(row);
                    });
                    $("#answer").append(row);
                });
            });
        });
    });
</script>
</body>
</html>
