<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChatCtrl extends Controller {

    public function getChannels() {
        $channels = Chat::getChannels();
        return response()->json($channels);
    }

    public function getMessages($chatRoomId) {
        $messages = Chat::getMessages($chatRoomId);
        return response()->json($messages);
    }

    public function postMessage($chatRoomId, Request $request) {
        Chat::insertMessage($chatRoomId, $request["login"], $request["content"]);
        return response()->json([
            "content" => htmlspecialchars($request["content"]),
            "login" => htmlspecialchars(Chat::getDisplayName($request["login"]))
        ]);
    }

    public function index() {
        $users = Chat::getUsers();
        return view("accueil", ["users" => $users]);
    }

    public function showMessages($idRoom) {
        return view("chat", ["idRoom" => $idRoom]);
    }

    public function login(Request $request) {
        setcookie("pseudo", $request->login);
        return redirect()->back();
    }
}

