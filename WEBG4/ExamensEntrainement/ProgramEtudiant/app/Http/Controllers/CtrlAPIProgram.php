<?php

namespace App\Http\Controllers;

use App\Models\Student;

class CtrlAPIProgram extends Controller {

    public function show() {
        return response()->json(Student::getStudents());
    }

    public function getInfoStudent($id) {
        return response()->json(Student::getInfoStudent($id));
    }

    public function delete($idProgram) {
        return response()->json(Student::deletePae($idProgram));
    }
}
