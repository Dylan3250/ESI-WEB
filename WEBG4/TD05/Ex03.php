<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=valvesdb;charset=utf8",
        "webii",
        "6zNlwgrIk78UWHQw",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de donnée";
    exit(-1);
}

$req = $pdo->query("select title, msg_date, name, message.id id 
from message
    join author on message.author = author.id
order by msg_date desc");

$pdo = NULL;
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des messages</title>
    <style>
        tr, td, th {
            padding: 0.5em;
            text-align: center;
            border: 1px #0080b5 solid;
        }

        th {
            background: #006385;
            color: white;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>Date</th>
        <th>Auteur</th>
        <th>Titre</th>
    </tr>

    <?php foreach ($req as $row) : ?>
        <tr>
            <td><?= $row['msg_date'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><a href='Ex03Traitement.php?id=<?= $row['id'] ?>'><?= $row['title'] ?></a></td>
        </tr>
    <?php endforeach ?>
</table>
</body>
</html>
