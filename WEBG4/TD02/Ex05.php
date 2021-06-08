<?php

function addKeyArray(&$array, $value) {
    $array[$value] = $value;
}

$array = [];

addKeyArray($array, 2);
addKeyArray($array, 10);

var_dump($array);