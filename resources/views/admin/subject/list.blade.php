@if($subjects->count() < 1)
    <p class="center red-text my-4">No Record Found</p>
@else
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @php $i=1; @endphp

        @foreach($subjects as $subject)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$subject->name}}</td>
                <td>
                    @if($subject->status)
                        <span class="rounded green p-2 white-text z-depth-1" style="border-radius: 10px">Active</span>
                    @else
                        <span class="rounded red p-2 white-text z-depth-1" style="border-radius: 10px">Inactive</span>
                    @endif
                </td>
                <td>
                    <button class="btn btn-small btn-floating transparent" onclick="aem._delete(event,'{{route('subject.destroy',[$subject->id, '_token'=>csrf_token()])}}','#subjects','ajax')">
                        <i class="material-icons red-text">delete</i>
                    </button>
                    <button onclick="aem.modal('{{route('subject.edit',$subject->id)}}')" class="btn btn-small btn-floating transparent form_button">
                        <i class="material-icons yellow-text">edit</i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
