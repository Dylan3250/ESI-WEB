<?php
function newSqrt(int $x, int $n = 2): int {
    return pow($x, 1 / $n);
}

echo newSqrt(9, 3);