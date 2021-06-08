<?php
require 'model/messages.php';

function allMessages() {
    $message = new Messages();
    $allMessages = $message->getAllMessages();
    require "view/allMessages.php";
}

function moreDetail() {
    $message = new Messages();
    $oneMessage = $message->getOneMessage();
    require "view/moreDetail.php";
}
