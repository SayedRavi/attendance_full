@extends('layouts.admin',['title' => 'Dashboard'])
@section('body')
    <div class="row">
        <div class="col s12 m6 l3">
            <div class="card red white-text blue lighten-1">
                <div class="card-content center">
                    <p class="card-title">
                        Total Teachers
                    </p>
                    <b>
                        (10)
                    </b>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card red white-text blue lighten-1">
                <div class="card-content center">
                    <p class="card-title">
                        Total Classes
                    </p>
                    <b>
                        (10)
                    </b>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card red white-text blue lighten-1">
                <div class="card-content center">
                    <p class="card-title">
                        Total Students
                    </p>
                    <b>
                        (10)
                    </b>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card red white-text blue lighten-1">
                <div class="card-content center">
                    <p class="card-title">
                        Running Classes
                    </p>
                    <b>
                        (10)
                    </b>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l8">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">
                        Running Classes
                        <br>
                        <small style="font-size: 14px;" id="date_">
{{--                            {{date('Y/M/d h:i:s',strtotime(now()))}}--}}
                        </small>
                    </h4>
                    <p align="center" class="my-5 red-text">
                    No Class in Current Time
                    </p>
                </div>
            </div>
        </div>
        <div class="col S12 l4 m5">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">Todo</h4>
                        <div id="todo">
                            @include('admin.todo.index')
                        </div>
                        <button class="btn waves-effect blue darken-3" onclick="aem.modal('{{route('todo.create')}}')">
                            <i class="material-icons ">add</i>
                        </button>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('plugins/moment/moment.js')}}"></script>
    <script>
        var update = function() {
            document.getElementById("date_")
                .innerHTML = moment().format('MMMM Do YYYY, h:mm:ss a');
        }
        setInterval(update, 1000);
    </script>
@endpush
