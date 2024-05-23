<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSubjects;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Clock\get;

class SettingContoller extends Controller
{
    public function index()
    {
        if (\request()->method() == 'GET'){
            if (\request()->has('page')){
                switch (\request()->get('page')){
                    case 'assign_subject_to_teacher':
                        $subjects = Subject::all();
                        if (\request()->has('teacher_id')){
                            $subjects_id = TeacherSubjects::where('teacher_id','=',\request()->get('teacher_id'))
                                ->pluck('subject_id')->toArray();
                            $subjects = Subject::whereNotIn('id',$subjects_id)->get();
                        }
                        return response()->json([
                            'result' => true,
                            'view' => view('admin.setting.includes.assign_subjects_to_teachers',[
                                'teachers' => Teacher::all(),
                                'subjects' => $subjects
                            ])->render()
                        ]);
                        break;
                    case 'enroll_students':
                        return response()->json([
                            'result' => true,
                            'view' => view('admin.setting.includes.enroll_students',[
                                'courses' => Course::where('status','=',Course::$running)->get()
                            ])->render()
                        ]);
                        break;
                    case 'list_of_students':
                        $ids = StudentCourse::where('course_id','=',\request()->get('course'))->pluck('student_id')->toArray();
                        return response()->json([
                            'result' => true,
                            'view' => view('admin.setting.includes.list_of_students',[
                                'students' => Student::whereNotIn('id',$ids)->get()
                            ])->render()
                        ]);
                        break;
                    default :
                        abort(404);
                }
            }
            else
            {

                $course_id = StudentCourse::distinct('course_id')->pluck('course_id')->toArray();
                $student_course = Course::whereIn('id',$course_id)->get();

                return view('admin.setting.index', [
                    'active' => 'settings',
                    'teacher_subjects' => Teacher::all(),
                    'student_courses' => $student_course
                ]);
            }
        }
        elseif(\request()->method() == "POST")
        {
            if (\request()->has('type')){
                switch (\request()->get('type')){
                    case 'enroll_students':
                        foreach (\request()->get('students') as $student){
                            StudentCourse::create([
                                'student_id' => $student,
                                'course_id' => \request()->get('course')
                            ]);
                        }
                        $course_id = StudentCourse::distinct('course_id')->pluck('course_id')->toArray();
                        $student_course = Course::whereIn('id',$course_id)->get();
                        return response()->json([
                            'result' => true,
                            'message' => 'Enrolled Successfully',
                            'view' => view('admin.setting.includes.list2',[
                                'student_courses' => $student_course
                            ])->render()
                        ]);
                        break;
                    default :
                        abort(404);
                }
            }
            \request()->validate([
            'teacher' => 'required'
            ]);
            \request()->validate([
            'subjects' => 'required'
            ]);
            foreach (\request()->get('subjects') as $subject_id){
            TeacherSubjects::create([
                'teacher_id' => \request()->get('teacher'),
                'subject_id' => $subject_id
            ]);
            }
            return response()->json([
            'result' => true,
            'message' => 'Assigned Successfully',
            'view' => view('admin.setting.includes.list',[
                'teacher_subjects' => Teacher::all()
            ])->render(),
            ]);
        }
        elseif (\request()->method() == "DELETE")
        {
            if (\request()->has('type')){
                switch (\request()->get('type')){
                    case 'remove_from_enrollment':
                        StudentCourse::where('id','=',\request()->get('id'))->delete();
                        $course_id = StudentCourse::distinct('course_id')->pluck('course_id')->toArray();
                        $student_course = Course::whereIn('id',$course_id)->get();
                        return response()->json([
                            'status' => true,
                            'message' => 'Removed Successfully',
                            'body' => view('admin.setting.includes.list2',[
                                'student_courses' => $student_course
                            ])->render()
                        ]);
                        break;

                    default :
                        abort(404);
                }

            }
            TeacherSubjects::where('id',\request()->get('id'))->delete();
            return response()->json([
                'status' => true,
                'message' => 'Removed Successfully',
                'body' => view('admin.setting.includes.list',[
                    'teacher_subjects' => Teacher::all()
                ])->render(),
            ]);
        }


    }
}
