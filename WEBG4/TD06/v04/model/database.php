<?php

$db = new PDO("mysql:host=localhost;dbname=ValvesDB;charset=utf8", "webii", "6zNlwgrIk78UWHQw",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] // par défaut en PHP8
);
