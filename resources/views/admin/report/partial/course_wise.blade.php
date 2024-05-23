<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Student</th>
        <th>Total Present</th>
        <th>Total Absent</th>
        <th>Total Leave</th>
        <th>Percentage</th>
    </tr>
    </thead>
    <tbody>
    @if($students->count() < 1)
        <tr>
            <td colspan="5" class="center red-text">No Student Found</td>
        </tr>
    @else
    @php $i=1 @endphp
    @foreach($students as $student)
        @php
            $total_present = \App\Models\Student::total_present($course_id, $student->student_id);
            $total_absent = \App\Models\Student::total_absent($course_id, $student->student_id);
            $total_leave = \App\Models\Student::total_leave($course_id, $student->student_id);
            $total_ = \App\Models\Student::total_classes($course_id, $student->student_id);
          @endphp
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
            <td>{{$total_present}}</td>
            <td>{{$total_absent}}</td>
            <td>{{$total_leave}}</td>
            <td>
                @php
                echo round($total_present*100/$total_);
                @endphp
                %
            </td>
        </tr>
    @endforeach
    @endif
    </tbody>
</table>
