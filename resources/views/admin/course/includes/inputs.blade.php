<div class="row">
    <div class="col s12 l9 input-field">
        <input type="text" name="course_name" required class="@error('course_name') invalid @enderror" value="{{$course->name ?? old('course_name')}}">
        <label for="course_name">Course Name</label>
        <blockquote>
            @error('course_name')
            {{$message}}
            @enderror
        </blockquote>
    </div>
    <div class="col s12 l3 input-field">
        <i class="material-icons prefix">attach_money</i>
        <input type="text" name="fee" required class="@error('fee') invalid @enderror" value="{{$course->fee ?? old('fee')}}">
        <label for="fee">fee</label>
        <blockquote>
            @error('fee')
            {{$message}}
            @enderror
        </blockquote>
    </div>
    <div class="col s12 l6 input-field">
        <input type="text" name="start_date" required class="datepicker @error('start_date') invalid @enderror" value="{{$course->start_date ?? old('start_date')}}">
        <label for="start_date">Start Date</label>
        <blockquote>
            @error('start_date')
            {{$message}}
            @enderror
        </blockquote>
    </div>
    <div class="col s12 l6 input-field">
        <input type="text" name="end_date" required class="datepicker @error('end_date') invalid @enderror" value="{{$course->end_date ?? old('end_date')}}">
        <label for="end_date">End Date</label>
        <blockquote>
            @error('end_date')
            {{$message}}
            @enderror
        </blockquote>
    </div>
    <div class="col s12 l6 input-field">
        <input type="text" name="start_time" required class="timepicker @error('start_time') invalid @enderror" value="{{$course->start_time ?? old('start_time')}}">
        <label for="start_time">Start Time</label>
        <blockquote>
            @error('start_time')
            {{$message}}
            @enderror
        </blockquote>
    </div>
    <div class="col s12 l6 input-field">
        <input type="text" name="end_time" required class="timepicker @error('end_time') invalid @enderror" value="{{$course->end_time ?? old('end_time')}}">
        <label for="end_time">End Time</label>
        <blockquote>
            @error('end_time')
            {{$message}}
            @enderror
        </blockquote>
    </div>
    <div class="col s12 input-field" id="asset_modal">
        <p>
            <b>List Of Subjects</b>
        </p>
        <select name="subjects[]"  class="browser-default input-parent select2" multiple required onchange="$('#save').removeAttr('disabled')">
            @if($subjects->count() < 1)
                <option value="" disabled >No Teacher Found</option>
            @else
                <option value="" disabled >Select Subject</option>
                @foreach($subjects as $subjects)
                    <option value="{{$subjects->id}}">{{$subjects->name}}</option>
                @endforeach
            @endif
        </select>
        <span class="validation-message"></span>

    </div>
{{--    <div id="subjects">--}}

{{--    </div>--}}
</div>
@include('admin.select2.select2')
