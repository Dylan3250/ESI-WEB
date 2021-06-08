<?php
require_once "Ex09 - ClassPoint.php";
$p1 = new Point(1, 2);
$p2 = new Point();
?>

<h1>Test de Point</h1>

<p>Le point1: <?= $p1 ?></p>
<p>Le point2: <?= $p2 ?></p>

<p>Distance entre les deux points : <?= $p1->distanceTo($p2) ?></p>
<p>Milleu entre les deux points : <?= $p1->middle($p2) ?></p>