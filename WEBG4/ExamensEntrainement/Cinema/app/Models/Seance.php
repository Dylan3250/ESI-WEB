<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Seance {

    public static function getSeances() {
        return DB::select("SELECT start, title, idShow, Shows.idRoom, (capacity - soldTickets) dispoPlace
            FROM Shows
            JOIN Film ON Film.idFilm = Shows.idFilm
            JOIN Room ON Room.idRoom = Shows.idRoom
            WHERE start >= NOW() ORDER BY start, title");
    }

    public static function update($id, $nbTicket) {
        $currentTicket = DB::selectOne("SELECT soldTickets FROM Shows WHERE idShow = ?", [$id]);
        return DB::update("UPDATE Shows SET soldTickets = ? WHERE idShow = ?",
            [$currentTicket->soldTickets + $nbTicket, $id]);
    }

    public static function getFilm($id) {
        return DB::selectOne("SELECT title, synopsis, rating FROM Film WHERE idFilm = ?", [$id]);
    }
}
