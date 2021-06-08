<?php
try {
    require 'model/database.php';
    require 'model/messages.php';
    $allMessages = getAllMessages();
    require 'view/allMessages.php';
} catch (Exception $e) {
    require 'view/error.php';
}