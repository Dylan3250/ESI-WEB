<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Valves</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/theme.css">
</head>
<body>
<header>
    <img id="logo" src="../resources/img/he2b-esi.jpg" alt="HE2B-ESI">
    <h1>WEB II - Valves</h1>
</header>
<main>
    <h1>Tous les messages</h1>
    <?php
    $db = new PDO("mysql:host=localhost;dbname=ValvesDB;charset=utf8", "webii", "6zNlwgrIk78UWHQw");
    $sql = "SELECT Message.msg_date, Author.name, Message.title 
        FROM Message JOIN Author 
        WHERE Message.author = Author.id 
        ORDER BY msg_date DESC"; ?>
    <table class="messages">
        <tr>
            <th>Date</th>
            <th>Auteur</th>
            <th>Titre</th>
        </tr>
        <?php foreach ($db->query($sql) as $row) : ?>
            <tr>
                <td><?= $row["msg_date"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["title"] ?></a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>
<footer>WEBG4 - WEBII - MCD</footer>
</body>
</html>
