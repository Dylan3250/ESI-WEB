<?php

namespace App\Http\Controllers;

class HelloCtrl extends Controller {
    public function index($name = "inconnu") {
        // return view('hello');
        return view('hello', ['name' => $name]);
    }
}
