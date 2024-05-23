@extends('layouts.admin', ['title' => 'Settings'])
@section('body')
    <div class="row">
        <div class="col s12">
            <ul class="tabs">
                <li class="tab col s6 m6">
                    <a href="#teacher">Teacher Assigning</a>
                </li>
                <li class="tab col s6 m6">
                    <a class="active" href="#student">Student Assigning</a>
                </li>
            </ul>

        <div id="teacher" class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title center">Settings</h4>
                    <div id="lists">
                        @include('admin.setting.includes.list')
                    </div>
                    <button class="btn waves-effect blue darken-3 mt-3"
                            onclick="aem.modal('{{route('setting.index',['page'=>'assign_subject_to_teacher'])}}')">Assign Subject
                    </button>
                </div>
            </div>
        </div>
        <div id="student" class="col s12">
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card-title">Enrolled Students</h4>
                            <div id="enrollment_list">
                                @include('admin.setting.includes.list2')
                            </div>
                            <button class="btn btn-floating transparent waves-effect" onclick="aem.modal('{{route('setting.index',['page'=>'enroll_students'])}}')">
                                <i class="material-icons black-text">add</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
