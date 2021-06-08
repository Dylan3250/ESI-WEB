<?php

function showTitle($month, $year) {
    $indexMonth = $month - 1;
    $frMonths = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre",
        "Octobre", "Novembre", "Décembre"];
    echo "<tr><th colspan=7>$frMonths[$indexMonth] $year</th></tr>";
}

function showHeader() {
    $frDays = ["Lu", "Ma", "Me", "Je", "Ve", "Sa", "Di"];
    echo '<tr>';
    foreach ($frDays as $day) {
        echo "<td>$day</td>";
    }
    echo '</tr>';
}

function showMonth($shift, $nbDays) {
    echo '<tr>';
    for ($i = 0; $i < $shift; $i++) {
        echo '<td></td>';
    }

    $currentDay = 1;
    while ($currentDay <= $nbDays) {
        echo "<td class='day'>$currentDay</td>";
        if (($currentDay + $shift) % 7 == 0) {
            echo '</tr><tr>';
        }
        $currentDay++;
    }
    echo '</tr>';
}

function isLeapYear($year) {
    return ($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0;
}

function numDay($day, $month, $year) {
    // Calcul basé sur la congruence de Zeller
    // https://en.wikipedia.org/wiki/Zeller's_congruence

    $correctedYear = $year;
    $m = $month;
    $q = $day;

    if ($month == 1 || $month == 2) {
        $correctedYear = $year - 1;
        $m = $month + 12;
    }

    $j = intdiv($correctedYear, 100);
    $k = $correctedYear % 100;

    return ($q + intdiv((($m + 1) * 13), 5) + $k + intdiv($k, 4) + intdiv($j, 4) + 5 * $j + 5) % 7;
}

function numberDays($month, $year) {
    $numberDayDefault = 31;
    if ($month == 4
        || $month == 6
        || $month == 9
        || $month == 11) {
        $numberDayDefault = 30;
    } else if ($month == 2) {
        $numberDayDefault = 28;
        if (isLeapYear($year)) {
            $numberDayDefault = 29;
        }
    }
    return $numberDayDefault;
}

function showCalendar($month, $year) {
    echo '<table>';
    showTitle($month, $year);
    showHeader();
    $nbDays = numberDays($month, $year);
    $shift = numDay(1, $month, $year);
    showMonth($shift, $nbDays);
    echo '</table>';
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar in PHP</title>
    <style>
        body {
            font-family: Arial, serif;
        }

        table {
            background: #e6f4ff;
            text-align: center;
            margin-top: 1em;
        }

        th {
            background: #64b6f5;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(2) {
            background: #aad0ed;
            font-weight: bold;
        }

        td, tr, th {
            padding: 1em;
        }

        .day {
            border: 0.15em solid #92a2ef;
        }
    </style>
</head>
<body>
<h1>Ajouter : ?m=[mois]&y=[année] dans l'URL</h1>
<a href="?m=8&y=1998">Cliquez ici par exemple</a>

<?php showCalendar(
    isset($_GET['m']) ? $_GET['m'] : 1,
    isset($_GET['y']) ? $_GET['y'] : 2012);
?>
</body>
</html>