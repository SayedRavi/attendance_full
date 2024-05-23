<form action="{{route('subject.store')}}" id="form" onsubmit="aem.formRequest(event)"
                                                                    data-effect="#subjects" method="post">
    @csrf
    <div class="modal-content">
        <h4 class="modal-title">Add Subject</h4>
        @include('admin.subject.includes.inputs')

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn green waves-effect">
            <i class="material-icons right">save</i>
            Add
        </button>
        <button type="button" class="btn red modal-close waves-effect">
            <i class="material-icons right">cancel</i>
            Cancel
        </button>
    </div>
</form>
