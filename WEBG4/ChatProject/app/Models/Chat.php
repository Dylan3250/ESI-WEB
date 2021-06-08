<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Chat {

    public static function getMessages($id) {
        return DB::table('messages')
            ->select('messages.id', 'added_on', 'content', 'author_id', 'chan_id', 'login', 'displayName')
            ->join('chatusers', 'chatusers.id', '=', 'author_id')
            ->where('chan_id', $id)
            ->orderBy("added_on")
            ->get();
    }

    public static function getChannels() {
        return DB::table('channels')
            ->select('id', 'name', 'topic')
            ->get();
    }

    public static function getChannel($id) {
        return DB::table('channels')
            ->select('id')
            ->where('id', $id)
            ->get('id')->first;
    }

    public static function insert($login, $content, $chatRoomId) {
        $user = DB::table('chatusers')
            ->select('id')
            ->where('login', $login)
            ->get('id')->first();

        DB::insert("INSERT INTO messages (content, author_id, chan_id) VALUES (?, ?, ?)", [$content, $user->id, $chatRoomId]);
    }
}
