<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Student {

    public static function getStudents() {
        return DB::select("SELECT student.id, student.name, sum(course.credits) sumCredits
            FROM Student
            JOIN Program on student.id = program.student
            JOIN course on Program.course = Course.id
            GROUP BY student.id, student.name");
    }

    public static function getInfoStudent($id) {
        return DB::select("SELECT Program.id progId, Course.id courseId, title, credits FROM Program
            JOIN Course ON Course.id = Program.course
            WHERE Program.student = ? ORDER BY CourseId ASC", [$id]);
    }

    public static function deletePae($id) {
        return DB::delete("DELETE FROM Program WHERE id = ?", [$id]);
    }
}
