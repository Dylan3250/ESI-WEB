<?php

function nbCalled() {
    static $nb = 0;
    return ++$nb;
}

nbCalled();
nbCalled();

echo nbCalled(); // 3