<div class="row">
    <div class="col s12 center">
        <span style="display: inline-block; width: 100px; height: 100px; overflow:
            hidden; border-radius: 50%; border: 1px solid @error('profile') red @else black @enderror">
            <img id="profile_preview" class="lazy" data-src="{{isset($teacher)?asset('storage/'.$teacher->profile):asset('images/user.png')}}??asset('images/user.png')}}" width="100%" alt="">
        </span>
        <br>
        <label for="profile" type="button" class="btn btn-floating transparent z-depth-0">
            <i class="material-icons black-text">edit</i>
        </label>
        @error('profile')
        <blockquote>{{$message}}</blockquote>
        @enderror
        <input type="file" name="profile" id="profile" class="d-none" accept="image/*">
    </div>
    <div class="col s12 l6 input-field">
        <input type="text" name="name" class="@error('name') invalid @enderror"
               value="{{isset($teacher)? $teacher->user->name: old('name')}}">
        <label for="name">Name</label>
        @error('name')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
    <div class="col s12 l6 input-field">
        <input type="text" name="last_name" class="@error('last_name') invalid @enderror"
               value="{{$teacher->last_name ?? old('last_name')}}">
        <label for="last_name">Last Name</label>
        @error('last_name')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
    <div class="col s12 l4 input-field">
        <i class="material-icons prefix">email</i>
        <input type="email" name="email" class="@error('email') invalid @enderror"
               @if(isset($teacher)) disabled @endif
               value="{{isset($teacher)?$teacher->user->email:old('email')}}">
        <label for="email">Email</label>
        @error('email')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
    <div class="col s12 l4 input-field">
        <i class="material-icons prefix">phone</i>
        <input type="text" name="phone" class="@error('phone') invalid @enderror"
               value="{{$teacher->phone ?? old('phone')}}">
        <label for="phone">Phone</label>
        @error('phone')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
    <div class="col s12 l4 input-field">
        <i class="material-icons prefix">location_on</i>
        <input type="text" name="address" class="@error('address') invalid @enderror"
               value="{{$teacher->address ?? old('address')}}">
        <label for="address">Address</label>
        @error('address')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
    <div class="col s12">
        <textarea name="bio" id="bio" cols="30" rows="10">{{$teacher->bio ?? old('bio')}}</textarea>
    </div>
{{--    @if(isset($teacher))--}}
{{--        <div class="col s12 m6 input-field">--}}
{{--            <input type="password" name="password" id="password" class="@error('password') invalid @enderror">--}}
{{--            <label for="password">Password</label>--}}
{{--            @error('password')--}}
{{--            <blockquote>{{$message}}</blockquote>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--        <div class="col s12 m6 input-field">--}}
{{--            <input type="password" name="c_password" id="c_password" class="@error('c_password') invalid @enderror">--}}
{{--            <label for="c_password">Confirm Password</label>--}}
{{--            @error('c_password')--}}
{{--            <blockquote>{{$message}}</blockquote>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    @endif--}}
</div>
@push('js')
    <script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'bio' );
        $("input[type='file']").on('change', function (){
            aem.changeImage(this);
        });
    </script>
@endpush
