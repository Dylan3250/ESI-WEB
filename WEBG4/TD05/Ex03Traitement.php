<?php
if (!isset($_GET['id']) || !intval($_GET['id'])) {
    header('Location: Ex03.php');
}

try {
    $pdo = new PDO("mysql:host=localhost;dbname=valvesdb;charset=utf8",
        "webii",
        "6zNlwgrIk78UWHQw",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de donnée";
    exit(-1);
}

$req = $pdo->prepare("select content, title, msg_date from message where id = ?");
$req->execute([$_GET['id']]);
$result = $req->fetch();
$pdo = NULL;

if (!$result) {
    // header('Location: Ex03.php');
    header("HTTP/1.0 404 Not Found");
    exit(-1);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Information sur une réponse</title>
</head>
<body>
<?= $result['content']; ?>
<br><br><a href="Ex03.php">Retour à la liste</a>
</body>
</html>
