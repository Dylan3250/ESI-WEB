<?php

$url = 'https://git.esi-bru.be/api/v4/projects/' . $_GET['i'];
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
curl_close($curl);
$decoded = json_decode($curl_response);
?>

<h1><?= $decoded->name ?></h1>
<ul>
    <li>
        Création : <?= $decoded->created_at ?>
    </li>
    <li>
        URL HTTP : <?= $decoded->http_url_to_repo ?>
    </li>
    <li>
        URL SSH : <?= $decoded->ssh_url_to_repo ?>
    </li>
</ul>

<a href="index.php">Retour</a>
