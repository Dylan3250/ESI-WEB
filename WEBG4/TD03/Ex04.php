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

        form {
            margin: 1em 0;
        }
    </style>
</head>
<body>
<h1>Ajouter : ?month=[mois]&year=[année] dans l'URL</h1>
<a href="?month=8&year=1998">Cliquez ici par exemple</a>

<form action="" method="get">
    <label for="month">Un mois</label>
    <input type="number" name="month" id="month"><br>

    <label for="year">Une année</label>
    <input type="number" name="year" id="year"><br>

    <button type="submit">Envoyer</button>
</form>

<?php showCalendar(
    !empty($_GET['month']) ? $_GET['month'] : 1,
    !empty($_GET['year']) ? $_GET['year'] : 2012);
?>
</body>
</html>