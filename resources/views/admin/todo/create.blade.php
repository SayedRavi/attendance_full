<form action="{{route('todo.store')}}" method="post" data-effect="#todo" id="form" onsubmit="aem.formRequest(event)">
    <div class="modal-content">
        @csrf
        <h4>Todo List</h4>
        <div class="row">
            <div class="col s12 input-field input-parent">
                <input type="text" name="description" id="description">
                <label for="description">Description</label>
                <span class="validation-message"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect form_button">Save</button>
        <button type="button" class="btn waves-effect modal-close">Close</button>
    </div>
</form>
