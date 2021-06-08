<?php

function getAllMessages() {
    $db = new PDO("mysql:host=localhost;dbname=ValvesDB;charset=utf8", "webii", "6zNlwgrIk78UWHQw");
    return $db->query("SELECT Message.msg_date, Author.name, Message.title 
        FROM Message JOIN Author 
        WHERE Message.author = Author.id 
        ORDER BY msg_date DESC");
}