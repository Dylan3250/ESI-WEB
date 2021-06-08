<?php

namespace App\Http\Controllers;


use App\Models\Chat;

class ChatCtrl extends Controller {

    public function show($chatRoomId) {
        if (Chat::getChannel($chatRoomId)->id == NULL) {
            return redirect()->intended('/channels');
        }
        return view("chat", ['chatRoomId' => $chatRoomId]);
    }

    public function index() {
        $channels = Chat::getChannels();
        return view("channels", ['channels' => $channels]);
    }
}
