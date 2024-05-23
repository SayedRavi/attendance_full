@extends('layouts.app')
@section('title', 'login')

@section('content')
    <div class="container" id="parent">
        <div class="row">
            <div class="col s12 l12 mt-lg-4">
                <div class="card">
                    <div class="card-content">
                        <h4 class="card-title" align="center">Login</h4>
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="s12 input-field">
                                    <i class="material-icons prefix">person_outline</i>
                                    <input type="email" name="email" required value="{{old('email')}}" class="@error('email') invalid @enderror">
                                    <label for="email">Email</label>
                                    @error('email')
                                    <blockquote>{{$message}}</blockquote>
                                    @enderror
                                </div>

                                <div class="s12 input-field">
                                    <i class="material-icons prefix">lock_outline</i>
                                    <input type="password" name="password" required value="{{old('password')}}" class="@error('password') invalid @enderror">
                                    <label for="password">Password</label>
                                    @error('password')
                                    <blockquote>{{$message}}</blockquote>
                                    @enderror
                                </div>
                                <div class="col s12">
                                    <button class="btn ml-4">Login</button>
                                    <a href="" class="right">Forget Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
