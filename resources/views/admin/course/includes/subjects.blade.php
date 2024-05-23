<div class="col s12 input-field" id="asset_modal">
    <p>
        <b>List Of Subjects</b>
    </p>
    <select name="subjects[]"  class="browser-default input-parent select2" multiple required onchange="$('#save').removeAttr('disabled')">
        @foreach($subjects as $subject)
            <option value="{{$subject->id}}">{{$subject->name}}</option>
        @endforeach
    </select>
    <span class="validation-message"></span>
</div>
@include('admin.select2.select2')
