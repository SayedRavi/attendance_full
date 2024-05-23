<?php

namespace App\Http\Controllers;

use App\Models\CourseSubjects;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $active = 'subjects';

    public function index()
    {
        return view('admin.subject.index',[
            'active' => $this->active,
            'subjects' => Subject::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'result' => true,
            'view' => view('admin.subject.includes.create')->render()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required | unique:subjects'
        ]);
        Subject::create($data);
        return response()->json([
            'result' => true,
            'message' => 'Added Successfully',
            'view' => view('admin.subject.list',[
                'subjects' => Subject::all()
            ])->render()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {

        return response()->json([
            'result' => true,
            'view' => view('admin.subject.includes.edit',[
                'subject' => $subject
            ])->render()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $data = $request->validate([
            'name' => ['required', 'string', Rule::unique('subjects')->ignore($subject->id)]
        ]);
        $data['status'] = ($request->get('status') == null ? false : true);
        $subject->update($data);
        return response()->json([
            'result' => true,
            'message' => 'Added Successfully',
            'view' => view('admin.subject.list',[
                'subjects' => Subject::all()
            ])->render()
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        CourseSubjects::where('subject_id', $subject->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Deleted Successfully',
            'body' => view('admin.subject.list',[
                'subjects' => Subject::all()
            ])->render()
        ]);
    }
}
