@if($teacher_subjects->count() < 1)
    <p class="red-text center">No Record Found</p>
@else
    <table>
        <thead>
        <tr>
            <th>Teacher Name</th>
            <th>Subjects Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teacher_subjects as $teacher)
            <tr>
                <td width="30%">{{$teacher->user->name}} {{$teacher->last_name}}</td>
                <td>

                        <ol class="browser-default">
                            @foreach($teacher->subjects() as $subject)
                                <li>{{$subject->name}}
                                    <button type="button" class="btn btn-small btn-floating waves-effect z-depth-0 transparent"
                                        onclick="aem._delete(event,'{{route('setting.index',['id'=>$subject->tid])}}','#lists')">
                                        <i class="material-icons red-text">delete</i>
                                    </button>
                                </li>
                            @endforeach
                        </ol>
                        <button class="btn waves-effect blue darken-3"
                                onclick="aem.modal('{{route('setting.index',['page'=>'assign_subject_to_teacher','teacher_id'=>$teacher->id])}}')">Assign Subject
                        </button>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
