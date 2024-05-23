
<form action="{{route('setting.index')}}" method="post" data-effect="#lists" id="form" onsubmit="aem.formRequest(event)">
    @csrf
    <div class="modal-content">
        <h6>Assign Subjects To Teachers</h6>
        <div class="row">
            <div class="col s12 input-field input-parent" id="asset_modal">
                <p>
                    <b>List Of Teachers</b>
                </p>
                <select name="teacher"  class="browser-default select2" required>
                    <option value="" selected>-- Select Teacher --</option>
                    @foreach($teachers as $teacher)
                        <option @if(request()->has('teacher_id')) {{$teacher->id == request()->get('teacher_id') ? 'selected' : ''}} @endif
                                value="{{$teacher->id}}">{{$teacher->user->name}} {{$teacher->last_name}}</option>
                    @endforeach
                </select>
                <span class="validation-message"></span>
            </div>

            <div class="col s12 input-field" id="asset_modal">
                <p>
                    <b>List Of Subjects</b>
                </p>
                <select name="subjects[]"  class="browser-default input-parent select2" multiple required>
                @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
                <span class="validation-message"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect form_button">Save</button>
        <button type="button" class="btn waves-effect red modal-close">Close</button>
    </div>
</form>
@include('admin.select2.select2')
