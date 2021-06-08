<?php
require 'model.php';

class Messages extends Model {
    function getAllMessages() {
        return $this->request("SELECT Message.id, Message.msg_date, Author.name, Message.title 
        FROM Message JOIN Author 
        WHERE Message.author = Author.id 
        ORDER BY msg_date DESC");
    }

    function getOneMessage() {
        $req = $this->request("SELECT content, title, msg_date 
        FROM message 
        WHERE id = ?", [$_GET['id']], true);
        return $req ? $req : throw new Exception('Data not found');
    }
}

