@extends('layouts.admin',['title' => 'Add Teacher'])
@section('body')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">Add a New Teacher</h4>
                    <form action="{{route('teacher.store')}}" method="post" enctype="multipart/form-data">
                        <div class="container">
                            @include('admin.teacher.includes.inputs')
                        </div>
                        @csrf
                        <button class="btn waves-effect blue darken-3">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

