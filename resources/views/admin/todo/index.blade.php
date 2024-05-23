@if($todo->count() < 1 )
    <p align="center" class="my-5 red-text">No Record Found</p>
@else
    <ol>
        @foreach($todo as $item)
        <li>
            <p>
                    <span class="text">
                         @if($item->status)
                             {{$item->description}}
                         @else
                             <del>{{$item->description}}</del>
                         @endif
                        </span>
                <label class="right">
                        <input type="checkbox" {{$item->status ? '' : 'checked'}} onchange="aem.todoRead(event,
                            '{{route('todo.update',['todo'=>$item->id])}}','{{csrf_token()}}')" name="status"/>
                        <span></span>
                </label>
                    <i class="material-icons red-text right mx-2" onclick="aem._delete(event, '{{route('todo.destroy',
                    ['todo' => $item->id])}}', '#todo')">delete</i>
                </p><br>

        </li>
        @endforeach
    </ol>

@endif
