<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use mysql_xdevapi\Result;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json([
            'result' => true,
            'view' => view('admin.todo.create')->render()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required'
        ]);
        Todo::create($data);
        return response()->json([
            'result' => true,
            'message' => 'Inserted Successfully',
            'view' => view('admin.todo.index',[
                'todo' => Todo::all()
            ])->render()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {

        $status = $request->get('status') == 'true' ? true : false;
        $todo->update([
            'status' => $status
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json([
            'status' => true,
            'body' => view('admin.todo.index',[
                'todo' => Todo::all()
            ])->render(),
            'message' => 'Deleted Successfully'
        ]);
    }
}
