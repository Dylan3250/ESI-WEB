<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use DateTime;
use Illuminate\Http\Request;

class CinemaCtrl extends Controller {

    public function index() {
        $arrayFormatted = [];
        $seances = Seance::getSeances();
        foreach ($seances as $seance) {
            $informations = [];
            foreach ($seance as $key => $value) {
                if ($key == "start") {
                    $date = new DateTime($value);
                    $informations["date"] = $date->format('d/m/Y');
                    $informations["hour"] = $date->format('H:i');
                } else {
                    $informations[$key] = $value;
                }
            }
            $arrayFormatted[] = $informations;
        }
        return view("seance", compact("arrayFormatted"));
    }

    public function edit(Request $request) {
        Seance::update($request->id, $request->nbTicket);
        return redirect()->back();
    }
}
