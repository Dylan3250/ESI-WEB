<?php require_once("CalendarLib.php") ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar in PHP</title>
    <style>
        body {
            font-family: Arial, serif;
        }

        table {
            background: #e6f4ff;
            text-align: center;
            margin-top: 1em;
        }

        th {
            background: #64b6f5;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(2) {
            background: #aad0ed;
            font-weight: bold;
        }

        td, tr, th {
            padding: 1em;
        }

        .day {
            border: 0.15em solid #92a2ef;
        }
    </style>
</head>
<body>

<form action="" method="post">
    <label for="prenom">Votre prénom</label>
    <input type="text" name="prenom" id="prenom"><br>

    <label for="nom">Votre nom</label>
    <input type="text" name="nom" id="nom"><br>

    <label for="anniv">Votre anniversaire</label>
    <input type="date" name="anniv" id="anniv"><br><br>

    <button type="submit">Envoyer</button>
</form>

<?php
if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['anniv'])) {
    echo "<h1>Bonjour " . htmlspecialchars($_POST['prenom']) . " " . htmlspecialchars($_POST['nom']) . "</h1>";
    $array = explode("-", $_POST['anniv']);
    showCalendar($array[1], $array[0]);
} else if (isset($_POST['prenom'])) {
    echo "<p style='color: darkred;'>Une erreur est survenue, merci de réessayer en remplissant tous les formulaires !</p>";
}
?>
</body>
</html>