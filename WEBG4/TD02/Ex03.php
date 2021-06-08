<?php
function maxArray(int ...$nb): int {
    return max($nb);
}

echo maxArray(1, 10, 2871, 9, 2);