<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSubjects;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubjects;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public $active = 'courses';
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.course.index',[
            'active' => $this->active,
            'r_courses' => Course::where('status','=', Course::$running)->get(),
            'c_courses' => Course::where('status','=', Course::$completed)->get(),
            'u_courses' => Course::where('status','=', Course::$upcoming)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (\request()->has('page') && \request()->get('page') == 'load_teacher_subjects'){
            $subject_ids = TeacherSubjects::where('teacher_id','=',\request()->get('teacher_id'))->pluck('subject_id')->toArray();
            return response()->json([
                'result' => true,
                'view' => view('admin.course.includes.subjects',[
                    'subjects' => Subject::whereIn('id',$subject_ids)->get()
                ])->render()
            ]);
        }
        $teacher_ids = TeacherSubjects::selectRaw('DISTINCT(teacher_id) as teacher_id')->pluck('teacher_id')->toArray();
        return view('admin.course.includes.create',[
            'active' => $this->active,
            'subjects' => Subject::where('status','=',true)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'course_name' => 'required | string ',
            'start_date' => 'required | before:end_date',
            'end_date' => 'required | after:start_date',
            'fee' => 'required ',
            'start_time' => 'required | before:end_time',
            'end_time' => 'required | after:start_time'
        ]);
        $request->validate([
            'subjects' => 'required'
        ]);
        if ($data['start_date'] > date('Y/m/d')){
            $data['status'] = Course::$upcoming;
        }elseif ($data['start_date'] < date('Y/m/d')){
            $data['status'] = Course::$running;
        }
        $obj = Course::create($data);
        foreach (\request()->get('subjects') as $subject){
            CourseSubjects::create([
                'subject_id' => $subject,
                'course_id' => $obj->id
            ]);
        }
        return redirect()->route('course.index')->with([
            'message' => 'Created Successfully',
            'classes' => 'green rounded'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
         //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
