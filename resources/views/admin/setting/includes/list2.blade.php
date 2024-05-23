@if(count($student_courses) < 1)
    <p class="center red-text py-3">No Enrolled Students</p>
@else
    <table>
        <thead>
        <tr>
            <td>Course Name</td>
            <td>Enrolled Students</td>
        </tr>
        </thead>
        <tbody>
        @foreach($student_courses as $course)
            <tr>
                <td>{{$course->course_name}}</td>
                <td>
                    @foreach($course->students() as $student)

                        <div class="chip">
                            <img src="{{asset('storage/'.$student->profile)}}" alt="Contact Person">
                            {{$student->name}} {{$student->last_name}}
                            <i class="material-icons right"
                               onclick="aem._delete(event,'{{route('setting.index',['type'=>'remove_from_enrollment','id'=>$student->sid])}}','#enrollment_list')">close</i>
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
