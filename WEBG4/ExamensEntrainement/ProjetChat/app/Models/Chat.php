<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Chat {
    public static function getChannels() {
        return DB::select("SELECT id, name, topic FROM channels");
    }

    public static function getUsers() {
        return DB::select("SELECT login, displayName FROM chatusers");
    }

    public static function getDisplayName($login) {
        return DB::selectOne("SELECT displayName FROM chatusers WHERE login = ?", [$login])->displayName;
    }

    public static function getMessages($chatRoomId) {
        return DB::select("SELECT messages.id, added_on, content, author_id, chan_id, chatusers.login, chatusers.displayName FROM messages JOIN chatusers ON chatusers.id = author_id WHERE chan_id = ? ORDER BY added_on ASC", [$chatRoomId]);
    }

    public static function insertMessage($chatRoomId, $login, $content) {
        $user = DB::selectOne("SELECT id FROM chatusers WHERE login = ?", [$login]);
        return DB::insert("INSERT INTO messages(chan_id, author_id, content) VALUES (?, ?, ?)",
            [$chatRoomId, $user->id, $content]);
    }
}
