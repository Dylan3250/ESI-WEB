<?php
try {
    require 'model/messages.php';
    $messages = new Messages();
    $allMessages = $messages->getAllMessages();
    require 'view/allMessages.php';
} catch (Exception $e) {
    require 'view/error.php';
}