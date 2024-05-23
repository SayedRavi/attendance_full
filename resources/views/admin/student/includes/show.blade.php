@extends('layouts.admin',['title' => 'Student Information'])
@section('body')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <a href="" class="btn  blue darken-3 right">Reports
                        <i class="material-icons right">cloud_download</i>
                    </a>

                    <h4 class="card-title">{{$student->name}}'s Information</h4>
                    <div class="row">
                        <div class="col s12 center">
        <span style="display: inline-block; width: 100px; height: 100px; overflow:
            hidden; border-radius: 50%; border: 1px solid @error('profile') red @else black @enderror">
            <img id="profile_preview" class="lazy" data-src="{{asset('storage/'.$student->profile)}}" width="100%" alt="">
        </span>
                            <br>
                            <label for="profile" type="button" class="btn btn-floating transparent z-depth-0">
                                <i class="material-icons black-text" disabled="">edit</i>
                            </label>
                            <input type="file" disabled name="profile" id="profile" class="d-none" accept="image/*">
                        </div>
                        <div class="col s12 l6 input-field">
                            <input type="text" name="name" disabled class="" value="{{$student->name}}">
                            <label for="name">Name</label>

                        </div>
                        <div class="col s12 l6 input-field">
                            <input type="text" name="last_name" class="" disabled value="{{$student->last_name}}">
                            <label for="last_name">Last Name</label>

                        </div>
                        <div class="col s12 l4 input-field">
                            <i class="material-icons prefix">email</i>
                            <input type="email" name="email" class="" disabled value="{{$student->email}}">
                            <label for="email">Email</label>
                        </div>
                        <div class="col s12 l4 input-field">
                            <i class="material-icons prefix">phone</i>
                            <input type="text" name="phone" class="" disabled value="{{$student->phone}}">
                            <label for="phone">Phone</label>

                        </div>

                    </div>
                    @push('js')
                        <script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
                        <script>
                            CKEDITOR.replace( 'bio' );
                        </script>
                    @endpush

                </div>
            </div>
        </div>
    </div>
@endsection


