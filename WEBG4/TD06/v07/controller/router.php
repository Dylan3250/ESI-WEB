<?php
require 'action.php';

function routeRequest() {
    $action = isset($_GET['action']) ? $_GET['action'] : "allMessages";
    try {
        if (function_exists($action)) {
            $action();
        } else {
            require "../view/error.php";
        }
    } catch (Exception $e) {
        require "../view/error.php";
    }
}