<?php

function insertMultiple(array &$array, int $pos, int $value, int $nbRepeat) {
    // $array_fill = array_fill(0, $nbRepeat, $value);
    // $new_array = array_merge($array_fill, array_slice($array, $pos));
    // array_splice($array, $pos, $pos + count($new_array), $new_array);
    $tab_value = array_fill($pos, $nbRepeat, $value);
    array_splice($array, $pos, 0, $tab_value);
}

$array = [4, 7, 6];
insertMultiple($array, count($array), 8, 5);

echo "<pre>";
print_r($array);
echo "</pre>";