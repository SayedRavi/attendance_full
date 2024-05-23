@extends('layouts.admin',['title' => 'Create a new Course'])
@section('body')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">
                        Create a New Course
                    </h4>
                    <div class="row">
                        <div class="col s12">
                            <form action="{{route('course.store')}}" method="post">
                                @csrf
                                <div class="container">
                                    @include('admin.course.includes.inputs')

                                </div>
                                <button class="btn waves-effect blue darken-3 mt-3" disabled id="save">
                                    <i class="material-icons right">save</i>
                                    Save
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
