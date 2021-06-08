<?php

namespace App\Http\Controllers;

use App\Models\Repository;

class CtrlCommits extends Controller {

    public function index() {
        return view("accueil");
    }

    public function showDepots() {
        $repositories = Repository::getRepositories();
        return view("depots", compact("repositories"));
    }
}
