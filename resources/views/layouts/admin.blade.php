@extends('layouts.app')
@section('title', 'Admin | '. $title)
@section('content')
@include('layouts.includes.sidenav')
    <div id="container">
        <nav>
            <div class="nav-wrapper blue darken-2">
                <a href="#!" class="brand-logo pl-lg-3" id="logo">Logo</a>
                <a href="#" data-target="sidenav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a class='dropdown-trigger waves-effect mr-lg-5' href='#' data-target='dropdown1'>
                            <i class="material-icons left">person_outline</i>
                            {{auth()->user()->name}}
                            <i class="material-icons right">keyboard_arrow_down</i>
                        </a>
                    </li>
                    <ul id='dropdown1' class='dropdown-content'>
                        <li>
                            <a href="#!">
                                <i class="material-icons left">person</i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <i class="material-icons left">lock_outline</i>
                                Change Password
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" onclick="$('#logout').submit()">
                                <i class="material-icons left">exit_to_app</i>
                                Logout
                            </a>
                        </li>

                    </ul>
                </ul>
            </div>
        </nav>
        @yield('body')
    </div>
    <form action="{{route('logout')}}" id="logout" method="post">
        @csrf
    </form>
@endsection
