<?php
require "vendor/autoload.php";

use G54027\NewEcho;

$foo = ["key" => "value",
    "other key" => "other value"];
dump($foo);

(new NewEcho)->NewEcho("Hello !");
