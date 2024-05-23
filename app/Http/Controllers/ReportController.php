<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        if (\request()->has('type')){
            switch (\request()->get('type')){
                case 'course_wise_reports':
                    $students = DB::table('student_courses')
                        ->join('students','students.id','=','student_courses.student_id')
                        ->where('student_courses.course_id', \request()->get('course'))
                        ->select('*','students.id as student_id')->get();
                    return response()->json([
                        'result' => true,
                        'view' => view('admin.report.partial.course_wise',[
                            'students' => $students,
                            'course_id' => \request()->get('course'),
                        ])->render()
                    ]);
                    break;
            }
        }else {
            return view('admin.report.index', [
                'active' => 'reports',
                'courses' => Course::all()
            ]);
        }
    }
}
