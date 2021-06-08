<?php

$fruits = ["Apple", "Banana", "Orange", "Pineapple"];
$i = 0;

echo '<table border=1>';
do {
    if (count($fruits) > 0) {
        echo "<tr><td>$fruits[$i]</td></tr>";
    }
    $i++;
} while ($i < count($fruits));
echo '</table>';

echo '<table border=1>';
for ($d = 0; $d < count($fruits); $d++) {
    echo "<tr><td>$fruits[$d]</td></tr>";
}
echo '</table>';

echo '<table border=1>';
foreach ($fruits as $fruit) {
    echo "<tr><td>$fruit</td></tr>";
}
echo '</table>';