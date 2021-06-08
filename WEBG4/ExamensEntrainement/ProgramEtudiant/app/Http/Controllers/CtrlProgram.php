<?php

namespace App\Http\Controllers;

use App\Models\Student;

class CtrlProgram extends Controller {

    public function index() {
        $students = Student::getStudents();
        return view("accueil", compact("students"));
    }

}
