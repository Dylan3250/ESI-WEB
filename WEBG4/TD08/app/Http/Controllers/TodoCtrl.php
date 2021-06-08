<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTodo;
use App\Models\Todo;

class TodoCtrl extends Controller {
    public static function index() {
        $todos = Todo::getAll();
        return view('todos\todos', ['todos' => $todos]);
    }

    public static function show($id) {
        $todo = Todo::get($id);
        if (!$todo) {
            abort(404);
        }
        return view('todos\todoSelect', ['todo' => $todo]);
    }

    public static function store(AddTodo $request) {
        Todo::insert($request->tache, $request->description);
        return redirect()->back()->with('message', 'Nouvelle tâche correctement ajoutée !');
    }
}
