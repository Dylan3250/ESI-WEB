<?php
require 'controllerAction.php';

function routeRequest() {
    $action = isset($_GET['action']) ? $_GET['action'] : "allMessages";
    try {
        switch ($action) {
            case "allMessages":
                allMessages();
                break;
            default:
                require "../view/error.php";
        }
    } catch (Exception $e) {
        require "../view/error.php";
    }
}