<br>
@if($subjects->count() < 1)
    <p class="center red-text py-3">No Subject Found</p>
@else
    <label for="subject">List of Subjects</label>
    <select name="subject" class="browser-default" id="subject"
            onchange="aem.loadAjaxFromSelect(event,'{{route('teacher.dashboard',['partial'=>'load_students','http'=>'ajax'])}}','#students',aem.loading(),true,)">
        <option value="" selected>-- Select Subject --</option>
        @foreach($subjects as $subject)
            <option @if(request()->has('subject')) {{request()->get('subject')== $subject->id ?'selected':''}} @endif value="{{$subject->id}}&course={{request()->get('course')}}">{{$subject->name}}</option>
        @endforeach
    </select>
@endif
<div id="students">
    @switch(request()->get('partial'))

        @case('load_students')
        @include('teacher.includes.students')
        @break

    @endswitch
</div>
