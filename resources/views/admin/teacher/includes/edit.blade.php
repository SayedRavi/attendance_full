@extends('layouts.admin',['title' => 'Edit Teacher'])
@section('body')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">Edit Teacher</h4>
                    <form action="{{route('teacher.update',$teacher->id)}}" method="post" enctype="multipart/form-data">
                        <div class="container">
                            @method('PATCH')
                            @include('admin.teacher.includes.inputs')
                        </div>
                        @csrf
                        <button class="btn waves-effect blue darken-3">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

