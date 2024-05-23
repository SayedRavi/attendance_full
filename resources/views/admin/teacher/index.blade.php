@extends('layouts.admin',['title' => 'Teachers'])
@section('body')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">List of Teachers</h4>
                    @if(count($teachers) < 1)
                    <p class="center red-text my-4">No record Found</p>
                    @else
                        <table>
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($teachers as $teacher)
                            <tr>
                                    <td>{{$i=+1}}</td>
                                    <td>
                                        <div style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden" class="z-depth-1">
                                            <img class="lazy" data-src="{{asset('storage/'.$teacher->profile)}}" width="100%" alt="">
                                        </div>
                                    </td>
                                    <td>{{$teacher->user->name}}</td>
                                    <td>{{$teacher->last_name}}</td>
                                    <td>{{$teacher->phone}}</td>
                                    <td>
                                        <button class="btn btn-small btn-floating transparent"
                                                onclick="aem._delete(event,'{{route('teacher.destroy',['teacher'=>$teacher->id, '_token'=>csrf_token()])}}', '$teachers','http')">
                                            <i class="material-icons red-text">delete</i>
                                        </button>
                                        <a href="{{route('teacher.edit',$teacher->id)}}" class="btn btn-small btn-floating transparent">
                                            <i class="material-icons yellow-text">edit</i>
                                        </a>
                                        <a href="{{route('teacher.show',$teacher->id)}}" class="btn btn-small btn-floating transparent">
                                            <i class="material-icons blue-text">remove_red_eye</i>
                                        </a>
                                    </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                    @endif
                    <a href="{{route('teacher.create')}}" class="btn btn-floating transparent mt-3">
                        <i class="material-icons black-text">add</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>
@endpush
{{--@push('css')--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/datatables/datatable.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/datatable/datatable.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/datatable/datatable.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/datatable/responsive.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/datatable/select.datatables.min.css')}}">--}}
{{--@endpush--}}
{{--@push('js')--}}
{{--    <script src="{{asset('plugins/datatables/datatable.min.js')}}"></script>--}}
{{--    <script src="{{asset('plugins/datatable/datatable.min.js')}}"></script>--}}
{{--    <script src="{{asset('plugins/datatable/init.js')}}"></script>--}}
{{--    <script src="{{asset('plugins/datatable/select.datatable.min.js')}}"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--            let table = new DataTable('table');--}}
{{--        })--}}
{{--    </script>--}}
{{--@endpush--}}
