<?php

namespace App\Http\Controllers;
use App\Models\Message;

class MessageCtrl extends Controller {
    public static function index() {
        $messages = Message::getAll();
        return view('messages\messages', ['messages' => $messages]);
    }

    public static function param($id) {
        $message = Message::get($id);
        if (!$message) {
            abort(404);
        }
        return view('messages.messageSelect', compact('message'));
    }
}
