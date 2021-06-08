<?php

function getAllMessages() {
    global $db;
    return $db->query("SELECT Message.msg_date, Author.name, Message.title 
        FROM Message JOIN Author 
        WHERE Message.author = Author.id 
        ORDER BY msg_date DESC");
}