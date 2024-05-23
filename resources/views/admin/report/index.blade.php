@extends('layouts.admin',['title'=>'Reports'])
@section('body')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title center">Reports</h4>
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s3"><a class="active" href="#genral_reports">Course Wise</a></li>
                            </ul>
                        </div>
                        <div id="genral_reports" class="col s12">
                            <div class="col s12 input-field">
                                @if($courses->count() < 1)
                                    <p class="center red-text">No Course Found</p>
                                @else
                                    <select
                                        name="course"
                                        class="browser-default selectize"
                                        onchange="aem.loadAjaxFromSelect(event,'{{route('report.index',['type'=>'course_wise_reports'])}}','#reports',aem.loading(),false)">
                                        <option value="">-- Select Course --</option>
                                        @foreach($courses as $course)
                                            <option value="{{$course->id}}">{{$course->course_name}}</option>
                                        @endforeach
                                    </select>
                                @endif
                            </div>
                        </div>
                        <div id="reports"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
    <script !src="">
        $(function () {
            $(".selectize").selectize({
                create:false,
                sortField: 'text'
            });
        });
    </script>
@endpush
@push('css')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
@endpush
