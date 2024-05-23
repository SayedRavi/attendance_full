<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index',[
            'active' => 'dashboard',
            'todo' => Todo::all()
        ]);
    }

    public function modal()
    {
        return response()->json([
            'status' => true,
            'message' => '',
            'html' => 'test'
        ]);
    }
}
