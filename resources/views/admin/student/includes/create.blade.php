@extends('layouts.admin',['title' => 'Add Student'])
@section('body')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">Add a New Student</h4>
                    <form action="{{route('student.store')}}" method="post" enctype="multipart/form-data">
                        <div class="container">
                            @include('admin.student.includes.inputs')
                        </div>
                        @csrf
                        <button class="btn waves-effect blue darken-3">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

