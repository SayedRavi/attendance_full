<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSubjects;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\StudentCourse;
use App\Models\TeacherSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function index()
    {
        $subject_ids = TeacherSubjects::where('teacher_id','=',auth()->user()->teacher->id)->select('subject_id')->pluck('subject_id')->toArray();
        $course_ids  = CourseSubjects::whereIn('subject_id',$subject_ids)->selectRaw('DISTINCT(course_id) as course_id')->pluck('course_id')->toArray();
        $courses = Course::whereIn('id',$course_ids)->get();

        $subjects = DB::table('course_subjects')
            ->join('subjects','subjects.id','=','course_subjects.subject_id')
            ->where('course_subjects.course_id','=',\request()->get('course'))->get();


        $students = DB::table('student_courses')
            ->join('students','students.id','=','student_courses.student_id')
            ->where('student_courses.course_id', \request()->get('course'))->get();


        if (\request()->has('partial')){
            switch (\request()->get('partial')){
                case 'load_subjects':

                    if (\request()->get('http')== 'ajax'){
                        return response()->json([
                            'result' => true,
                            'view' => view('teacher.includes.subjects',[
                                'subjects' => $subjects
                            ])->render()
                        ]);
                    }else{
                        return view('teacher.index',[
                            'courses' => $courses,
                            'subjects' => $subjects
                        ]);
                    }
                    break;
                case 'load_students':

                    if (\request()->get('http')== 'ajax'){
                        return response()->json([
                            'result' => true,
                            'view' => view('teacher.includes.students',[
                                'subjects' => $subjects,
                                'students' => $students
                            ])->render()
                        ]);
                    }else{
                        return view('teacher.index',[
                            'courses' => $courses,
                            'subjects' => $subjects,
                            'students' => $students
                        ]);
                    }
                    break;
                default:
                    abort(4040);
            }
        }else{
            return view('teacher.index',[
                'courses' => $courses
            ]);
        }


    }

    public function save_attendance(Request $request)
    {
        $course = Course::find($request->get('course_id'));
        $start_time = strtotime(date('Y-m-d H:i',strtotime($course->start_date .' '.$course->start_time)));
        $end_time = strtotime(date('Y-m-d H:i',strtotime($course->end_date .' '.$course->end_time)));
        $students = DB::table('student_courses')
            ->where('course_id','=', $request->get('course_id'))
            ->join('students','students.id','=','student_courses.student_id')->get();

        if ($start_time <= time() and $end_time > time()) {
            $check = StudentAttendance::where([
                'course_id' => $request->get('course_id'),
                'subject_id' => $request->get('subject_id'),
                'user_id' => auth()->id(),
                'date' => date('Y-m-d')
            ]);
            if ($check->count() > 0) {
                return back()->with([
                    'message' => 'You have already took Attendance at ' . date('Y-m-d h:i', strtotime($check->first()->created_at)) . ' .',
                    'classes' => 'red rounded'
                ]);
            } else {
                foreach ($students as $student) {
                    StudentAttendance::create([
                        'course_id' => $request->get('course_id'),
                        'subject_id' => $request->get('subject_id'),
                        'user_id' => auth()->id(),
                        'student_id' => $student->id,
                        'option' => $request->get('option'.$student->id),
                        'reason' => $request->get('reason'.$student->id),
                        'time' => date('H:i'),
                        'date' => date('Y-m-d')
                    ]);
                }
                return redirect()->route('teacher.dashboard')->with([
                    'message' => 'Attendance Saved Successfully',
                    'classes' => 'green rounded'
                ]);
            }

        }
        else{
            return back()->with([
                'message' => 'You have already took Attendance at ' .date('h:i'). ' .',
                'classes' => 'red rounded'
            ]);
        }
    }


}
