<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function total_present($course_id, $student_id)
    {
        return StudentAttendance::where([
            ['student_id', '=', $student_id],
            ['course_id', '=', $course_id],
            ['option', '=', 1],
        ])->count();
    }
    public static function total_absent($course_id, $student_id)
    {
        return StudentAttendance::where([
            ['student_id', '=', $student_id],
            ['course_id', '=', $course_id],
            ['option', '=', 2],
        ])->count();
    }
    public static function total_leave($course_id, $student_id)
    {
        return StudentAttendance::where([
            ['student_id', '=', $student_id],
            ['course_id', '=', $course_id],
            ['option', '=', 3],
        ])->count();
    }
    public static function total_classes($course_id, $student_id)
    {
        return StudentAttendance::where([
            ['student_id', '=', $student_id],
            ['course_id', '=', $course_id],
        ])->count();
    }
}
