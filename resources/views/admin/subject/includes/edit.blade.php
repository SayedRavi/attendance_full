<form action="{{route('subject.update',$subject->id)}}" id="form" onsubmit="aem.formRequest(event)"
      data-effect="#subjects" method="post">
    @csrf
    @method('PATCH')
    <div class="modal-content">
        <h4 class="modal-title">Edit Subject</h4>
        @include('admin.subject.includes.inputs')

    </div>
    <div class="modal-footer">
        <button type="submit" class="btn green waves-effect">
            <i class="material-icons right">edit</i>
            Update
        </button>
        <button type="button" class="btn red modal-close waves-effect">
            <i class="material-icons right">cancel</i>
            Cancel
        </button>
    </div>
</form>
    <script>
        M.updateTextFields();
    </script>

