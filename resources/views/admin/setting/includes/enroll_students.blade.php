<form action="{{route('setting.index',['type'=>'enroll_students'])}}" method="post"
      data-effect="#enrollment_list" id="form" onsubmit="aem.formRequest(event)">
    @csrf
    <div class="modal-content">
        <h6>Assign Students</h6>
        <div class="row">
            <div class="col s12 input-field input-parent" id="asset_modal">
                <p>
                    <b>List of Courses</b>
                </p>
                <select name="course"  class="browser-default select2" required
                onchange="aem.loadAjaxFromSelect(event,'{{route('setting.index',['page'=>'list_of_students'])}}','#students',aem.loading())"
                >
                    <option value="" selected>-- Select Course --</option>
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                    @endforeach
                </select>
                <span class="validation-message"></span>
            </div>
            <div class="col s12" id="students">

            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect form_button">Save</button>
        <button type="button" class="btn waves-effect red modal-close">Close</button>
    </div>
</form>
@include('admin.select2.select2')
