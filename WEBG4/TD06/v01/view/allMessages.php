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
    <table class="messages">
        <tr>
            <th>Date</th>
            <th>Auteur</th>
            <th>Titre</th>
        </tr>
        <?php foreach ($allMessages as $row) : ?>
            <tr>
                <td><?= $row["msg_date"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["title"] ?></a></td>
            </tr>
        <?php endforeach ?>
    </table>
</main>
<footer>WEBG4 - WEBII - MCD</footer>
</body>
</html>
