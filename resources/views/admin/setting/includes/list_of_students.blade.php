<p>
    <b>List of Students</b>
</p>
<select name="students[]"  class="browser-default input-parent select2" multiple required>
    @foreach($students as $student)
        <option value="{{$student->id}}">{{$student->name}} {{$student->last_name}}</option>
    @endforeach
</select>
@include('admin.select2.select2')
