<div class="row">
    <div class="col s12 input-field input-parent">
        <input type="text" name="name" class="@error('name') invalid @enderror" value="{{$subject->name ?? old('name')}}">
        <label for="name">Subject Name</label>
        <span class="validation-message"></span>
    </div>
    @if(isset($subject))
        <div class="col s12">
            <p>
                <label>
                    <input type="checkbox" value="1" name="status" {{$subject->status?'checked': ''}}/>
                    <span>Status</span>
                </label>
            </p>
        </div>
    @endif
</div>
