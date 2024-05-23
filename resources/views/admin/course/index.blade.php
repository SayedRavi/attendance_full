@extends('layouts.admin',['title' => 'Courses'])
@section('body')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">List Of Courses</h4>
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s3"><a class="active" href="#running">Running</a></li>
                                <li class="tab col s3"><a  href="#upComming">Up Comming</a></li>
                                <li class="tab col s3"><a href="#completed">Completed</a></li>
                            </ul>
                        </div>
                        <div id="running" class="col s12">
                            <table class="mt-4">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Course Name</th>
                                    <th>Total Subjects</th>
                                    <th>Total Students</th>
                                    <th>Start Date</th>
                                    <th>Fee</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if($r_courses->count() < 1)
                                        <tr>
                                            <td colspan="6" class="center red-text">No Record Found!</td>
                                        </tr>
                                    @else
                                        @php $i=1 @endphp
                                        @foreach($r_courses as $running)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$running->course_name}}</td>
                                                <td>
                                                    <button class="btn btn-small transparent waves-effect black-text">
                                                        {{count($running->courses())}}
                                                    </button>
                                                </td>
                                                <td>{{count($running->students())}}</td>
                                                <td>{{$running->start_date}}</td>
                                                <td>{{$running->fee}}</td>
                                                <td>
                                                    <a class="btn btn-small transparent waves-effect black-text"
                                                       href="{{route('course.edit',['course',$running->id])}}">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>

                        </div>
                        <div id="upComming" class="col s12">
                            <table class="mt-4">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Course Name</th>
                                    <th>Total Subjects</th>
                                    <th>Total Students</th>
                                    <th>Start Date</th>
                                    <th>Fee</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($u_courses->count() < 1)
                                    <tr>
                                        <td colspan="6" class="center red-text">No Record Found!</td>
                                    </tr>
                                @else
                                    @php $j=1 @endphp
                                    @foreach($u_courses as $upcomming)
                                        <tr>
                                            <td>{{$j++}}</td>
                                            <td>{{$upcomming->course_name}}</td>
                                            <td>
                                                <button class="btn btn-small transparent waves-effect black-text">
                                                    {{count($upcomming->courses())}}
                                                </button>
                                            </td>
                                            <td>0</td>
                                            <td>{{$upcomming->start_date}}</td>
                                            <td>{{$upcomming->fee}}</td>
                                            <td>
                                                <a class="btn btn-small transparent waves-effect black-text"
                                                   href="{{route('course.edit',['course',$upcomming->id])}}">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>

                        </div>
                        <div id="completed" class="col s12">
                            <table class="mt-4">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Course Name</th>
                                    <th>Total Subjects</th>
                                    <th>Total Students</th>
                                    <th>Start Date</th>
                                    <th>Fee</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($c_courses->count() < 1)
                                    <tr>
                                        <td colspan="6" class="center red-text">No Record Found!</td>
                                    </tr>
                                @else
                                    @php $k=1 @endphp
                                    @foreach($c_courses as $completed)
                                        <tr>
                                            <td>{{$k++}}</td>
                                            <td>{{$completed->course_name}}</td>
                                            <td>
                                                <button class="btn btn-small transparent waves-effect black-text">
                                                    {{count($completed->courses())}}
                                                </button>
                                            </td>
                                            <td>0</td>
                                            <td>{{$completed->start_date}}</td>
                                            <td>{{$completed->fee}}</td>
                                            <td>
                                                <a class="btn btn-small transparent waves-effect black-text"
                                                   href="{{route('course.edit',['course',$running->id])}}">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>

                        </div>
                        <a href="{{route('course.create')}}" class="btn waves-effect blue darken-3 mt-3">
                            Add a new Course
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
