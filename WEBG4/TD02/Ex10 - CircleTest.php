<?php
require_once "Ex10 - ClassCircle.php";
$c1 = new Circle();
$c2 = new Circle(20);
$c3 = new Circle(55.2);

echo $c1, $c1->show(), '<br>';
echo $c2, $c2->show(), '<br>';
echo $c3, $c3->show(), '<br>';
