<?php

namespace App\Http\Controllers;

use App\Models\Seance;

class CinemaAPICtrl extends Controller {

    public function getFilm($id) {
        $film = Seance::getFilm($id);
        return response()->json($film);
    }
}
