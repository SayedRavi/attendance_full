<br>
@if($students->count() < 1)
    <p class="center red-text py-3">No Student Found</p>
@else
    <form action="{{route('save.attendance')}}" method="post">
        @csrf
        <input type="hidden" name="subject_id" value="{{request()->get('subject')}}">
        <input type="hidden" name="course_id" value="{{request()->get('course')}}">
        <table>
            <thead>
            <tr>
                <th>No</th>
                <th>Student Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @php $i=2 @endphp
            @foreach($students as $student)
                <tr>
                    <td>{{$i++}}</td>
                    <td width="50%">
                        <div style="display: flex; flex-direction: row; ">
                            <div style="width: 60px; height: 60px; border-radius: 50px; overflow: hidden" class="z-depth-2">
                                <img src="{{asset('storage/'.$student->profile)}}" width="100%" alt="">
                            </div>
                            <div class="pt-4 ml-3">
                                {{$student->name}} {{$student->last_name}}
                            </div>

                        </div>
                    </td>
                    <td>
                        <div>
                            <p>
                                <label>
                                    <input onchange="aem.hideElement('#reason{{$student->id}}')" name="option{{$student->id}}" value="1" class="with-gap" type="radio"/>
                                    <span>Present</span>
                                </label>
                                <label>
                                    <input onchange="aem.hideElement('#reason{{$student->id}}')" name="option{{$student->id}}" value="2" class="with-gap" type="radio" checked/>
                                    <span>Absent</span>
                                </label>

                                <label>
                                    <input name="option{{$student->id}}" value="3" class="with-gap" type="radio" onchange="aem.toggleElement('#reason{{$student->id}}')"/>
                                    <span>Leave</span>
                                </label>
                            </p>
                            <div class="col s12 input-field" id="reason{{$student->id}}" style="display: none;">
                                <input type="text" name="reason{{$student->id}}" >
                                <label for="reason">Reason</label>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <br>
        </table>
        <br>
        <button class="btn waves-effect black-text transparent">
            Save <i class="material-icons right">save</i>
        </button>
    </form>

@endif

