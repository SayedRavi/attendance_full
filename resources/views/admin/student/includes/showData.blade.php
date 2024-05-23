<div class="row">
    <div class="col s12 center">
        <span style="display: inline-block; width: 100px; height: 100px; overflow:
            hidden; border-radius: 50%; border: 1px solid @error('profile') red @else black @enderror">
            <img id="profile_preview" class="lazy" data-src="{{asset('storage/'.$teacher->profile)}}" width="100%" alt="">
        </span>
        <br>
        <label for="profile" type="button" class="btn btn-floating transparent z-depth-0">
            <i class="material-icons black-text">edit</i>
        </label>
        <input type="file" name="profile" id="profile" class="d-none" accept="image/*">
    </div>
    <div class="col s12 l6 input-field">
        <input type="text" name="name" class=""
               value="{{$teacher->user->name}}">
        <label for="name">Name</label>

    </div>
    <div class="col s12 l6 input-field">
        <input type="text" name="last_name" class=""
               value="{{$teacher->last_name}}">
        <label for="last_name">Last Name</label>

    </div>
    <div class="col s12 l4 input-field">
        <i class="material-icons prefix">email</i>
        <input type="email" name="email" class=""
               value="{{$teacher->user->email}}">
        <label for="email">Email</label>
    </div>
    <div class="col s12 l4 input-field">
        <i class="material-icons prefix">phone</i>
        <input type="text" name="phone" class=""
               value="{{$teacher->phone}}">
        <label for="phone">Phone</label>

    </div>
    <div class="col s12 l4 input-field">
        <i class="material-icons prefix">location_on</i>
        <input type="text" name="address" class=""
               value="{{$teacher->address }}">
        <label for="address">Address</label>
    </div>
    <div class="col s12">
        <textarea name="bio" id="bio" cols="30" rows="10">{{$teacher->bio}}</textarea>
    </div>

</div>
@push('js')
    <script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'bio' );
    </script>
@endpush
