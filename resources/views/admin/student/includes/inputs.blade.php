<div class="row">
{{------------------ Start of Profile Fieled-------------------}}
    <div class="col s12 center">
        <span style="display: inline-block; width: 100px; height: 100px; overflow:
            hidden; border-radius: 50%; border: 1px solid @error('profile') red @else black @enderror">
            <img id="profile_preview" class="lazy" data-src="{{isset($student)?asset('storage/'.$student->profile):asset('images/user.png')}}??asset('images/user.png')}}" width="100%" alt="">
        </span>
        <br>
        <label for="profile" type="button" class="btn btn-floating transparent z-depth-0">
            <i class="material-icons black-text">edit</i>
        </label>
        @error('profile')
        <blockquote>{{$message}}</blockquote>
        @enderror
        <input type="file" name="profile" id="profile" onchange="aem.changeImage(this)" class="d-none" accept="image/*">
    </div>
    {{------------------ End of Profile Fieled-------------------}}

    {{------------------ Start of Name-Last Name and Father Name Fieled-------------------}}

    <div class="col s12 l4 m4  input-field">
        <input type="text" name="name" class="@error('name') invalid @enderror"
               value="{{isset($student)? $student->name: old('name')}}">
        <label for="name">Name</label>
        @error('name')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
    <div class="col s12 l4 m4 input-field">
        <input type="text" name="last_name" class="@error('last_name') invalid @enderror"
               value="{{$student->last_name ?? old('last_name')}}">
        <label for="last_name">Last Name</label>
        @error('last_name')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
    <div class="col s12 l4 m4 input-field">
        <input type="text" name="father_name" class="@error('father_name') invalid @enderror"
               value="{{$student->father_name ?? old('father_name')}}">
        <label for="father_name">Father Name</label>
        @error('father_name')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>

    {{------------------ End of Name-Last Name and Father Name Fieled-------------------}}

    {{------------------ Start of Email, Phone and Address Fieled-------------------}}

    <div class="col s12 l4 input-field">
        <i class="material-icons prefix">email</i>
        <input type="email" name="email" class="@error('email') invalid @enderror"
               value="{{isset($student)?$student->email:old('email')}}">
        <label for="email">Email</label>
        @error('email')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
    <div class="col s12 l4 input-field">
        <i class="material-icons prefix">phone</i>
        <input type="text" name="phone" class="@error('phone') invalid @enderror"
               value="{{$student->phone ?? old('phone')}}">
        <label for="phone">Phone</label>
        @error('phone')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
    <div class="col s12 l4 input-field">
        <i class="material-icons prefix">location_on</i>
        <input type="text" name="address" class="@error('address') invalid @enderror"
               value="{{$student->address ?? old('address')}}">
        <label for="address">Address</label>
        @error('address')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
    {{------------------ End of Email, Phone and Address Fieled-------------------}}
    <div class="col s12">
        <p>
            <label>
                <input type="checkbox" value="1" name="is_uni_student" @if(isset($student)) {{$student->is_uni_student == true ? 'checked' : ''}} @endif  onchange="aem.toggleElement('#reg_no')"/>
                <span>Is University Student</span>
            </label>
        </p>
    </div>
    <div class="col s12 l4 input-field" id="reg_no" style="display:@if(isset($student)) {{$student->is_uni_student ? 'block' : 'none'}} @else none @endif">
        <input type="text" name="reg_no" class="@error('reg_no') invalid @enderror"
               value="{{$student->reg_no ?? old('reg_no')}}">
        <label for="reg_no">Register Number</label>
        @error('reg_no')
        <blockquote>{{$message}}</blockquote>
        @enderror
    </div>
</div>
