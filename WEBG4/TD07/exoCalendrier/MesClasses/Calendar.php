<?php

namespace G54027;

class Calendar {
    public static function showTitle($month, $year) {
        $indexMonth = $month - 1;
        $frMonths = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre",
            "Octobre", "Novembre", "Décembre"];
        echo "<tr><th colspan=7>$frMonths[$indexMonth] $year</th></tr>";
    }

    public static function showHeader() {
        $frDays = ["Lu", "Ma", "Me", "Je", "Ve", "Sa", "Di"];
        echo '<tr>';
        foreach ($frDays as $day) {
            echo "<td>$day</td>";
        }
        echo '</tr>';
    }

    public static function showMonth($shift, $nbDays) {
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

    public static function isLeapYear($year) {
        return ($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0;
    }

    public static function numDay($day, $month, $year) {
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

    public static function numberDays($month, $year) {
        $numberDayDefault = 31;
        if ($month == 4
            || $month == 6
            || $month == 9
            || $month == 11) {
            $numberDayDefault = 30;
        } else if ($month == 2) {
            $numberDayDefault = 28;
            if (self::isLeapYear($year)) {
                $numberDayDefault = 29;
            }
        }
        return $numberDayDefault;
    }

    public static function showCalendar($month, $year) {
        echo '<table>';
        self::showTitle($month, $year);
        self::showHeader();
        $nbDays = self::numberDays($month, $year);
        $shift = self::numDay(1, $month, $year);
        self::showMonth($shift, $nbDays);
        echo '</table>';
    }
}