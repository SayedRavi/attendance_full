@extends('layouts.teacher',['title'=>'Dashboard'])
@section('body')
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <a href="{{route('teacher.dashboard')}}" class="btn btn-floating waves-effect btn-small transparent right mt-4">
                        <i class="material-icons black-text">refresh</i>
                    </a>
                    <h4 class="center card-title">List of Courses</h4>

                    @if($courses->count() < 1)
                        <p class="center red-text py-3">No Course Found</p>
                        @else
                        <label for="course">List of Courses</label>
                            <select name="course" class="browser-default" id="course"
                                    onchange="aem.loadAjaxFromSelect(event,'{{route('teacher.dashboard',['partial'=>'load_subjects','http'=>'ajax'])}}','#result',aem.loading(),true,)">
                                <option value="" selected >-- Select Course --</option>
                                @foreach($courses as $course)
                                    <option @if(request()->get('course')) {{request()->get('course')== $course->id?'selected':''}} @endif value="{{$course->id}}">{{$course->course_name}}</option>
                                @endforeach
                            </select>
                    @endif
                    <div id="result">
                        @switch(request()->get('partial'))

                            @case('load_subjects')
                        @include('teacher.includes.subjects')
                            @break

                            @case('load_students')
                        @include('teacher.includes.students')
                            @break

                        @endswitch
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
