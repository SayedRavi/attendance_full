<?php

namespace App\Http\Controllers;

use App\Events\WhenTeacherCreatedEvent;
use App\Mail\TeacherCreatedEmail;
use App\Models\Teacher;
use App\Models\TeacherSubjects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $active = 'teachers';
     public function index()
    {
        return view('admin.teacher.index',[
            'active' => $this->active,
            'teachers' => Teacher::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teacher.includes.create',[
            'active' => $this->active
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'last_name' => 'required | string | min:3',
            'phone' => 'required ',
            'address' => 'required | string',
            'profile' => 'required | file | image | max: 5000',
            'bio' => 'required | string',
        ]);
        $data2 = $request->validate([
            'name' => 'required | string | min:3 ',
            'email' => 'required | unique:users'
        ]);
        $teacher = Teacher::create($data);
        if ($request->file('profile') != null){
            $teacher->update([
                'profile' => $request->file('profile')->store('teacher_profiles','public')
            ]);
        }
        $password = str_replace(' ', '', $data2['name']).'@'.rand(1,1000).Str::random(3);
        $obj = User::create([
            'name' => $data2['name'],
            'email' => $data2['email'],
            'role' => 'teacher',
            'password' => Hash::make($password),
        ]);

        $teacher->update([
            'user_id' => $obj->id
        ]);
        event(new WhenTeacherCreatedEvent($data2['name'],$data2['email'], $password));
        return redirect()->route('teacher.index')->with([
            'message' => 'User Created Successfully',
            'classes' => 'green rounded'
        ]);
    }

//'email' => 'required | email',

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $active =$this->active;
        return view('admin.teacher.includes.show',compact('teacher','active'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        $active = $this->active;
        return view('admin.teacher.includes.edit',compact('teacher','active'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'last_name' => 'required | string | min:3',
            'phone' => 'required ',
            'address' => 'required | string',
            'bio' => 'required | string',
        ]);
        $data2 = $request->validate([
            'name' => 'required | string | min:3 ',
        ]);
         $request->validate([
            'profile' => 'sometimes | file | image | max: 5000',
        ]);
        User::where('id',$teacher->user_id)->update([
            'name' => $data2['name']
        ]);
        $teacher->update($data);
        if ($request->has('profile') != null){
            if(file_exists('storage/'.$teacher->profile)){
                unlink('storage/'.$teacher->profile);
            }
            if ($request->hasFile('profile')){
                $teacher->update([
                    'profile' => $request->file('profile')->store('teacher_profiles','public')
                ]);
            }
        }
//        if ($request->get('password')!=null){
//            $request->validate([
//                'password' => ' min:8',
//                'c_password' => 'required | same:password '
//            ]);
//            User::where('id',$teacher->user_id)->update([
//                'password' => Hash::make($request->get('password'))
//            ]);
//
//        }
        return redirect()->route('teacher.index')->with([
            'message' => 'User Created Successfully',
            'classes' => 'green rounded'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        if(file_exists('storage/'.$teacher->profile)){
            unlink('storage/'.$teacher->profile);

        }
        $teacher->delete();
        User::where('id',$teacher->user_id)->delete();
        TeacherSubjects::where('id','=',$teacher->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Deleted Successfully',
            'url' => route('teacher.index')
        ]);
    }
}
