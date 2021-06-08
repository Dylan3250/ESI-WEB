<?php
require 'model/messages.php';

function allMessages() {
    $message = new Messages();
    $allMessages = $message->getAllMessages();
    require "view/allMessages.php";
}
