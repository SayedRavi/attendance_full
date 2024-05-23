<?php

namespace App\Http\Controllers;

use App\Events\WhenTeacherCreatedEvent;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherSubjects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $active = 'students';
    public function index()
    {
        return view('admin.student.index',[
            'active' => $this->active,
            'students' => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.includes.create',[
            'active' => $this->active
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required | string | min:3',
            'last_name' => 'required | string | min:3',
            'father_name' => 'required | string | min:3',
            'email' => 'required | email',
            'phone' => 'required ',
            'address' => 'required | string',
            'profile' => 'required | file | image | max: 5000',
        ]);
        $data['is_uni_student'] = ($request->get('is_uni_student') == null ? false : true);
        if ($data['is_uni_student'] != false){
            $data['reg_no'] = \request()->validate([
                'reg_no' => 'required'
            ])['reg_no'];
        }
        $student = Student::create($data);
        if ($request->file('profile') != null){
            $student->update([
                'profile' => $request->file('profile')->store('student_profiles','public')
            ]);
        }
        return redirect()->route('student.index')->with([
            'message' => 'Student Created Successfully',
            'classes' => 'green rounded'
        ]);
    }

//'email' => 'required | email',

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $active =$this->active;
        return view('admin.student.includes.show',compact('student','active'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $active = $this->active;
        return view('admin.student.includes.edit',compact('student','active'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required | string | min:3',
            'last_name' => 'required | string | min:3',
            'father_name' => 'required | string | min:3',
            'email' => 'required | email',
            'phone' => 'required ',
            'address' => 'required | string',
            'profile' => 'sometimes | file | image | max: 5000',
        ]);
        $data['is_uni_student'] = ($request->get('is_uni_student') == null ? false : true);
        if ($data['is_uni_student'] != false){
            $data['reg_no'] = \request()->validate([
                'reg_no' => 'required'
            ])['reg_no'];
        }
        $student->update($data);
        if ($request->has('profile') != null){
            if(file_exists('storage/'.$student->profile)){
                unlink('storage/'.$student->profile);
            }
            if ($request->hasFile('profile')){
                $student->update([
                    'profile' => $request->file('profile')->store('student_profiles','public')
                ]);
            }
        }
        return redirect()->route('student.index')->with([
            'message' => 'User Updated Successfully',
            'classes' => 'green rounded'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if(file_exists('storage/'.$student->profile)){
            unlink('storage/'.$student->profile);

        }
        $student->delete();
        return response()->json([
            'status' => true,
            'message' => 'Deleted Successfully',
            'url' => route('student.index')
        ]);
    }
}
