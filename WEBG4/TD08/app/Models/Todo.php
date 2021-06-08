<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Todo {
    public static function getAll() {
        // $pdo = new PDO(
        //     "mysql:host=localhost;dbname=todobd;charset=utf8", "todobd", "todobd00",
        //     [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        // );

        // $pdo = DB::getPdo();
        // $pdo->query("SELECT name FROM todos")->fetchAll(PDO::FETCH_COLUMN);

        // $result = DB::select("select name from todos");
        // $todos = [];
        // foreach ($result as $todos) {
        //     $todos[] = $todos->name;
        // }
        return DB::table('todos')
            ->get(['name', 'id']);
    }

    public static function get($id) {
        return DB::table('todos')
            ->where('id', $id)
            ->get(['name', 'description'])->first();
    }

    public static function insert($tache, $description) {
        DB::insert("INSERT INTO todos (name, description) VALUES (?, ?)", [$tache, $description]);
    }
}
