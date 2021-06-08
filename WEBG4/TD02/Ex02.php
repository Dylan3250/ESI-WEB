<?php
function swap(&$a, &$b) {
    $tmp = $a;
    $a = $b;
    $b = $tmp;

    // $x ^= $y ^= $x ^= $y; -- Opérateur XOR (ne fonctionne que pour les nombres)
}

$a = 2;
$b = 3;
echo "a = $a, b = $b<br>";
swap($a, $b);
echo "a = $a, b = $b<br>";
