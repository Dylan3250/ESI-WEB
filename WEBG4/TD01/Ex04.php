<?php

$hour = date("H");

if ($hour >= 4 && $hour < 12) {
    echo "Bonne journée !";
} else if ($hour >= 12 && $hour < 16) {
    echo "Bon après-midi !";
} else if ($hour >= 16 && $hour < 20) {
    echo "Bonne soirée !";
} else {
    echo "Bonne nuit !";
}