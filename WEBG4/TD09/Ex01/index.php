<?php

$url = 'https://git.esi-bru.be/api/v4/projects/';
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
curl_close($curl);
$decoded = json_decode($curl_response);

foreach ($decoded as $project) : ?>
    <a href="details.php?i=<?= $project->id; ?>"><?= $project->name; ?></a><br>
<?php endforeach; ?>
