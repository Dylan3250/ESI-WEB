<?php
require 'model.php';

class Messages extends Model {
    function getAllMessages() {
        return $this->request("SELECT Message.msg_date, Author.name, Message.title 
        FROM Message JOIN Author 
        WHERE Message.author = Author.id 
        ORDER BY msg_date DESC");
    }
}

