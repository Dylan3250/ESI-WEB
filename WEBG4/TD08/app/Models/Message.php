<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Message {
    public static function getAll() {
        return DB::table('message')
            ->select('message.id', 'msg_date', 'title', 'author.name')
            ->join('author', 'author.id', '=', 'message.author')
            //->order_by('msg_date', 'desc')
            ->get();
    }

    public static function get($id) {
        return DB::table('message')
            ->where('id', $id)
            ->get(['content', 'title', 'msg_date'])->first();
    }
}
