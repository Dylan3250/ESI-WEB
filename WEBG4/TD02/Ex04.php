<?php
$array = [10, 20, 30];
echo "<br><pre>";
print_r($array);
echo "</pre>";

/*
    $array = array_map(function (int $elt) : int {
        return 2 * $elt;
    }, $array);
*/

function map(&$array, $param) {
    foreach ($array as $key => $value) {
        $array[$key] = $param($value);
    }
}

map($array, fn ($elt) => $elt * 2);

echo "<br><pre>";
print_r($array);
echo "</pre>";