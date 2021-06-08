<?php

function getNumberOfDay(string $day): int {
    $days = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"];
    $search = array_search(strtolower($day), $days);
    return $search === false ? -1 : $search + 1;
}

echo getNumberOfDay("lundi"), "<br>";
echo getNumberOfDay("dimanche"), "<br>";
echo getNumberOfDay("existepas"), "<br>";