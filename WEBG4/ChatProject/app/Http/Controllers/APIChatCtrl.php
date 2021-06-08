<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckMessage;
use App\Models\Chat;


class APIChatCtrl extends Controller {

    public function show() {
        $channels = Chat::getChannels();
        return response()->json($channels);
    }

    public static function param($chatRoomId) {
        $messages = Chat::getMessages($chatRoomId);
        return response()->json($messages);
    }

    public static function store($chatRoomId, CheckMessage $request) {
        try {
            Chat::insert($request["login"], $request["content"], $chatRoomId);
        } catch (Exception $e) {
            return response()->json(false, 500);
        }
        return response()->json(true, 201);
    }
}
