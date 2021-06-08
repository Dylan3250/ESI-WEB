<?php
$array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 23, 24, 31];

function splitParity(&$array): array {
    $newArray = array_filter($array, function ($elt) {
        return $elt % 2 == 0;
    });
    return array_merge(array_reverse($newArray), array_filter($array, fn ($elt) => $elt & 1));
}

echo "<pre>";
print_r(splitParity($array));
echo "</pre>";